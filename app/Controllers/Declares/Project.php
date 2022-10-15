<?php
namespace App\Controllers\Declares;
use App\Controllers\Base;
use CodeIgniter\Database\BaseBuilder;
use Dompdf\Dompdf;

class Project extends Base
{
    protected $db ;
    function __construct() {
        $this->db = new \App\Models\Declares\Project();
    }

    // 列表页
    public function index(){
        $this->actionAuth(true);
        return $this->display();
    }

    // 数据
    public function page() {
        $this->actionAuth();
        $db = new \App\Models\Form();
        $P = $this->U();
        $P['searchField'] = 'BusinessID,remark';

        $argc = $P;

        // 进行中
        $argc['status'] = 1;
        $status_a = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        // 已完成
        $argc['status'] = 2;
        $status_b = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        // 草稿箱
        $argc['status'] = 0;
        $status_c = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        $this->db->orderBy( $this->_s_name()??'createtime'  ,$this->_s_dir()??'desc');

        $data = $this->db->asObject()
            ->search($P)
            ->whereAuth('customerid')
            ->RPaging( $this->_page() ,$this->_size());

        foreach ( $data['data'] as $row ) {
            $row = $this->_colunm_data($row , $db );
            $row->createtime = $row->createtime ? date('Y-m-d',strtotime($row->createtime)) : '';
            $row->donetime = $row->donetime ? date('Y-m-d',strtotime($row->donetime)) : '';
        }

        $data['statusA'] = $status_a;
        $data['statusB'] = $status_b;
        $data['statusC'] = $status_c;

        return $this->toJson($data);
    }

    // 数据列表
    public function load_page(){
        $this->actionAuth();
        $P = $this->U();
        $db = new \App\Models\Form();
        $P['searchField'] = 'BusinessID,remark';

        $data = $this->db->asObject()
            ->search($P)
            ->whereAuth('customerid')
            ->orderBy('createtime','desc')
            ->RPaging( $this->_page() , $this->_size() );

        foreach ( $data['data'] as $row ) {
            $row = $this->_colunm_data( $row , $db , true );
            $row->createtime = $row->createtime ? date('Y-m-d',strtotime($row->createtime)) : '';
            $row->donetime = $row->donetime ? date('Y-m-d',strtotime($row->donetime)) : '';
        }

        return $this->toJson($data);
    }

    // 新增
    public function create(){
        $this->actionAuth(true);
        return $this->display();
    }

    // 编辑
    public function update(){
        $this->actionAuth(true);
        $data = $this->_detail_data();
        return $this->display(
            ['data' => $data]
        );
    }

    // 详情页
    public function view(){
        $this->actionAuth(true);
        $data = $this->_detail_data();
        // 删除通知
        $this->_delete_notice($data);
        return $this->display(['data' => $data]);
    }

    // 保存
    public function save( $method = '' ){
        $this->actionAuth();
        $form = $this->U();
        $form['status'] = (($method == '' || $method == 'submits') ? 1 : 0);

        if ( $form['status'] == 1 )  if (!$form['Goods']) return $this->setError('至少选择一件商品!');
        $form['entryfiles'] = $form['entryfiles'] ? join(',',$form['entryfiles']) : '';

        $this->db->setValidationMessages($this->db->validationMessages);
        if ( $resp = $this->db->submits( $form ) ) {
            // 保存报关业务相关数据
            return $this->toJson(['projectid' => $resp,'msg' => $method == 'draft' ? '保存成功': '数据已提交']);
        }
        return $this->setError('保存失败');
    }

    // 更新 业务单备注
    public function update_remark(){
        $this->actionAuth();
        if ( !$this->ck_auth_data( $this->db, $form = $this->U() ) )
            return $this->setError('参数错误');

        if ($this->db->set('remark', $form['remark'])->where('id', $form['id'])->update()) {
            return $this->toJson('备注已更新');
        }
        return $this->setError('更新失败');
    }

    // 报关信息退回修改
    public function back_entry(){
        $this->actionAuth(true);
        if ( !$this->ck_auth_data( $this->db, $form = $this->U() ) )
            return $this->setError('参数错误');
        $db = new \App\Models\Declares\Entry();
        $data = $db->where('projectid',$form['id'])->first();
        if ( $db->save(['id' => $data['id'],'updatereason' => $form['value'],'status' => 1])) {
            return $this->toJson('退回成功');
        }
        return $this->setError('操作失败!');
    }

    // 确认报关资料
    public function confirm_file(){
        $this->actionAuth();
        if( $model = $this->db->where('id',$this->U('id'))->first() ){
            $phpWord = new \PhpOffice\PhpWord\PhpWord();

            $templete = $this->_template_doc($model['companyid'],$phpWord);

            $templete->setValue('BUSSINESSID',$model["BusinessID"]);
            $filename = md5(uniqid());
            $templete->saveAs("./uploads/etrades/pdf/{$filename}.docx");

            $PATH = WRITEPATH;
            $exec = "unoconv -f pdf {$PATH}uploads/etrades/pdf/$filename.docx  2>&1";
            exec($exec,$ret,$res);

            $entry_data = $this->db->from('entryform',true)->where('projectid',$model['ID'])->first();
            $entry_data["status"] = 3;
            $entry_data["authdeclar"] = '/uploads/etrades/pdf/'.$filename.'.pdf';
            // 删除通知
            delete_notify($entry_data['id'],['TOPIC_APPROVED_ENTRYFORM'],session('id'),1);
            //
            $entry_db = new \App\Models\Declares\Entry();
            if( $entry_db->set('status',3)->set('authdeclar',$entry_data["authdeclar"])->update( $entry_data['id'] ) ){
                return $this->toJson('确认成功');
            }
            return $this->setError('确认失败');
        }
        return $this->setError('确认失败');
    }

    // 上传页面
    public function upload_entry(){
        $this->actionAuth(true);
        $db = new \App\Models\Declares\Entry();
        if( $entry_data = $db->where('id', $this->U('id'))->first() ) {
            if ( $this->request->getMethod() == 'post' ) {
                $file_name = $this->U('entry_file');
                $argc = ['status' => ( $entry_data['status'] == 2 ) ? 3 : 5 ];
                // $entry_data['status'] = ( ($entry_data['status'] == 2 ) ? 3 : 5);
                if ( $argc['status'] == 3 ) {
                    delete_notify($entry_data['id'],'TOPIC_APPROVED_ENTRYFORM',session('id'),1);
                    $argc['authdeclar'] = $file_name?:'';
                } else {
                    $argc['clearance'] = $file_name?:'';
                }
                log_message('error','$argc:'.json_encode($argc));
                if ( $db->set($argc)->where('id',$entry_data['id'])->update() ) { //save( $entry_data ) ) {
                    return $this->toJson('操作成功!');
                }
                return $this->setError('操作失败!');
            }

            $data['detail'] = $entry_data;
            return $this->render([
                'data' => $data,
                'view_path' => '/Declares/Entry/_up_entry_file'
            ]);
        }
        return '操作失败,请检查参数是否正确';
    }

    // 下载报关资料 ( 列表页 )
    public function download_entry(){
        $this->actionAuth(true);
        if (!$data = $this->ck_auth_data( $this->db, $form = $this->U() ) )
            return $this->setError('参数错误');
        $data['Id'] = $form['id'];
        return $this->render([
            'view_path' => '/Declares/Entry/_fd_entry',
            'data' => $data
        ]);
    }

    // 文件下载
    public function fdownload( $type = '' ){
        $this->actionAuth();
        if ( !$this->ck_auth_data($this->db,$form = $this->U()) ) exit('参数错误');
        // 报关信息数据
        $data = $this->_detail_data();
        require_once(APPPATH . 'Libraries/Mpdf/mpdf.php');

        if (  $type == 5 && $data["project"]["isentrance"] == 0 ) {
            $file = '.' . $data["entry"]["authdeclar"]; $this->_view_authdeclar($data);
            //log_message('error','authdeclar:'. $file);
            if (!file_exists($file)) $this->_update_authdeclar($data);
            $file = '.' . $data['entry']["authdeclar"];
        } else {
            $file = ( in_array($type, ["1", "2", "3", "4", "6"]) || ($type == 5 && $data['project']["isentrance"] == 1)) ? $this->_genfiles($data, $type)['url'] : ($this->_packdownload($data));
        }
        delete_notify($data['entry']['id'],['TOPIC_DOWNLOADED_ENTRYFORM'],session('id'));

        force_download($file,null);
    }

    // 输入通关号
    public function up_entry_clearancenbr(){
        $this->actionAuth(true,'declares/project/upload_entry');
        $P = $this->U();
        if ( empty( $P['value'] ) || strlen( $P['value'] ) < 2 ) return $this->setError('请输入通关号');
        $db = new \App\Models\Declares\Entry();
        if ( $data =  $db->where('id',$P['id'])->first() ){
            // 更新 通关号
            if ( $db->set('clearancenbr',$P['value'])->update($data['id']) ) {
                return $this->toJson('通关号已更新');
            }
        }
        return $this->setError('上传通关号失败');
    }

    // 查看通关单
    public function viewfile(){
        $this->actionAuth();
        $param['projectid'] = $this->U('id');
        if( ckAuth() ){
           $param['customerid'] = session('custId');
        }
        $db = new \App\Models\Declares\Entry();
        if ( !$data = $db->search($param)->first() ) exit('参数错误,请检查!');

        if(file_exists('.' .$data["clearance"])) {
            force_download('.' . $data["clearance"], null);
            return false;
        }
        die('文件无效或已损坏！');
    }

    // 上传单证( 页 )
    public function archives(){
        $this->actionAuth();
        $db = new \App\Models\Declares\Entry();
        if ( !$data['detail'] = $db->where('id',$this->U('id'))->first() )
            return $this->setError('请检查参数是否正确');
        // 消除通知
        delete_notify($data['detail']['id'],['TOPIC_ENTRYFORM_ARCHIVES_VIEW','TOPIC_ENTRYFORM_ARCHIVES_APPROVE'],session('id'));

        return $this->render(['data' => $data,'view_path' => '/Declares/Entry/_archives']);
    }

    // 提交备案单证
    public function archivesup(){
        $this->actionAuth();
        $db = new \App\Models\Declares\Entry();
        $P = $this->U();
        if ( !$data = $db->where('id',$P['id'])->first() ) return $this->setError('请检查参数是否正确!');

        //客户角色
        if($data && ckAuth() && $data["customerid"] != session('custId')){
            return $this->setError('业务单没权限或数据错误，请联系管理员!');
        }
        $archives = 0;$msg = '备案单证提交成功';
        if( $P['type'] == 2 ){
            $archives = 1; $msg = '备案单证已确认';
            // // 消除通知
            delete_notify($data['id'],['TOPIC_ENTRYFORM_ARCHIVES'],null,1);
        }
        if($P['type'] != 0) {
            if (empty($P["fileht"]) || !count($P["fileht"]) ) return $this->setError('请上传供货合作合同');
            if (empty($P["filetrade"]) || !count($P["filetrade"]) ) return $this->setError('请上传运输单据');
            if (empty($P["filepak"]) || !count($P["filepak"]) ) return $this->setError('请上传装货单/放行条');
        }
        $P['fileht'] = $P["fileht"]?join(',',$P["fileht"]):'';
        $P['filetrade'] = $P["filetrade"]?join(',',$P["filetrade"]):'';
        $P['filepak'] = $P["filepak"]?join(',',$P["filepak"]):'';
        $P['archives'] = $archives;

        if ( $db->set($P)->update($data['id']) ) {
            return $this->toJson($msg);
        }
        return $this->setError('更新失败');
    }

    #region 增票信息

    // 设置实际退税额
    public function realityamount(){
        $this->actionAuth();
        $db = new \App\Models\Declares\Receipt();
        $P = $this->U();
        //
        if( !is_numeric($P['value']) ) return $this->setError('设置失败,请填入有效的退税额！');
        if ( !$data = $this->db->where('id',$P['id'])->first() ) return $this->setError('设置失败,没有相关记录！');
        //
        if ( $recep_data = $db->where(['projectid'=>$P['id'],'usage'=>3])->first() ) {
            $Id = $recep_data['id'];
        }else{
            $form = ['id' => 0,"customerid" => $data['customerid'],"payername" => "无","payercountry" => 0,"projectid" => $data['ID'],
                "vii" => 1,"amount" => 0 ,'', "currency" => "CNY","note" => "退税","exchangerate" => 1,"createdat" => time(),
                "status" => 1,"accounttype" => 1,"usage" => 3, "approved" => 1];
        }
        $form['id'] = $Id;
        $form['realityamount'] = $P['value'];
        $form['realityDate'] = date('Y-m-d');

        if ( $db->save($form) ) {
            return $this->toJson('实际退税已设置成功');
        }
        return $this->setError('设置失败');
    }

    // 申请退税
    public function apply_taxrefund(){
        $this->actionAuth(true);
        if( $data = $this->db->where('id',$this->U('id'))->first() ){
            $data["taxrefund"] = 3;
            $data["id"] = $this->U('id');
            if ( $this->db->save( $data ) ) return $this->toJson('已成功申请退税');
        }
        return $this->setError('申请退税失败');
    }

    // 确认申请退税
    public function confirm_taxrefund(){
        $this->actionAuth(true);
        if( $data = $this->db->where('id',$this->U('id'))->first() ){
            $data["taxrefund"] = 4;
            $data["id"] = $this->U('id');
            if ( $this->db->save( $data ) ) return $this->toJson('已确认申请退税');
        }
        return $this->setError('确认申请退税失败');
    }

    // 拒绝申请退税
    public function refuse_taxrefund(){
        $this->actionAuth(true);
        if( $data = $this->db->where('id',$this->U('id'))->first() ){
            $data["taxrefund"] = 5;
            $data["id"] = $this->U('id');
            $data["taxrefundreason"] = $this->U('id');
            if ( $this->db->save( $data ) ) return $this->toJson('已拒绝申请退税');
        }
        return $this->setError('拒绝申请退税失败');
    }

    // 增票收齐
    public function finish_vii(){
        $this->actionAuth(true);
        if( $data = $this->db->where('id',$this->U('id'))->first() ){
            $data["id"] = $this->U('id');
            $data["viistatus"] = 1;
            $data["viidt"] = date('Y-m-d H:i:s');
            $data["id"] = $this->U('id');
            if ( $this->db->save( $data ) ) return $this->toJson('增票已成功收齐');
        }
        return $this->setError('增票收齐失败');
    }

    // 下载开票人信息
    public function viidownload( $type = '' ){
        $this->actionAuth();
        $P = $this->U();
        if( !$project_data = $this->db->where('id',$P['id'])->first() ) return $this->setError('参数错误,请检查！');
        require(APPPATH . 'Libraries/Mpdf/mpdf.php');
        $goods_db = new \App\Models\Declares\Goods();
        // 项目实体
        $data['project'] = $project_data;
        // 获取报关资料信息
        $data['entry'] = $this->db->from('entryform',true)->where('projectid',$project_data['id'])->first();
        // 开票人
        $data['invoicer'] = $this->db->from('invoicer',true)->where('id', $P['invoicerId'])->first();
        // 报关商品信息
        $data['goods'] = $goods_db->get_data(['projectid'=>$P['id'],'b.invoicerid' => $P['invoicerId']]);
        // 下载开票信息
        $file = ( in_array( $type,[1,2] ))  ? ( $this->_ViiKP($data,$type)['url'] ) : ( $this->_packdownload($data) );

        force_download($file, null);
    }

    // 增票打包下载
    public function viipackdownload(){
        $this->actionAuth();
        // require(APPPATH . 'Libraries/Mpdf/mpdf.php');
        $projectId = $this->U('id');
        if(!$data = $this->db->where('id',$projectId )->first() ) return $this->setError('参数错误,请检查！');
        $db = new \App\Models\Declares\Goods();
        $invoicer_data = $db->get_invoicers( $projectId );
        $name = md5(time());
        $filename = "./uploads/etrades/pdf/$name.zip";
        //重新生成文件
        $zip = new \ZipArchive();

        if ($zip->open($filename, \ZIPARCHIVE::CREATE | \ZipArchive::OVERWRITE)!==TRUE) {
            exit('无法打开文件，或者文件创建失败');
        }

        foreach($invoicer_data as $row){
            $file1 = $this->_viidownload(1,$projectId,$row['id']);
            $file2 = $this->_viidownload(2,$projectId,$row['id']);
            if(file_exists($file1) && file_exists($file2)) {
                $zip->addFile($file1, "{$row["name"]}--开票信息.pdf");
                $zip->addFile($file2, "{$row["name"]}--采购合同.pdf");
            }
        }
        $zip->close();
        force_download($filename,null);
    }
    #endregion

    #region  收入情况
    // 已确认收齐
    public function confirm_receipt(){
        $this->actionAuth( true );
        if ( $data = $this->db->where('id',$this->U('id'))->first() ) {
            $data['id'] = $this->U('id');
            $data['receiptstatus'] = 1;
            $data['receiptdt'] = date('Y-m-d H:i:s');
            if ( $this->db->save($data) ) return $this->toJson('已确认收齐!');
        }
        return $this->setError('操作失败!');
    }
    #endregion

    #region 付款情况
    // 确认付清
    public function confirm_payment(){
        $this->actionAuth(true);
        $P = $this->U();
        if ( $data = $this->db->where('id',$P['id'])->first() ) {
            $vii_db = new \App\Models\Declares\Vii();
            // 本单余额
            $amount_data = $this->db->get_project_amount($P['id']);
            // 增票总额
            if ( !$vii_data = $vii_db->select('sum( invoiceamount ) as amount')->where('projectid',$P['id'])->first() )
                return $this->setError('开票信息不能为空');

            if ( $amount_data['payment_sum'] < $vii_data['amount'] )
                return $this->setError('付款金额不能小于开票金额');

            if ( $amount_data['total_sum'] < -1 )
                return $this->setError('本单余额不能小于-1元，请联系业务员操作');

            if($amount_data['total_sum'] > 0.05 ){
                return $this->setError("本单余额还剩余:{$amount_data['total_sum']},是否将此金额转入未分配资金，并完成此单,完成后将不可再对本单业务进行编辑?");
            }

            $data['id'] = $P['id'];
            $data["paymentstatus"] = 1;
            $data["paymentdt"] = date('Y-m-d H:i:s');
            $data["donetime"] = date('Y-m-d H:i:s');
            // 保存
            if ( $this->db->save($data) ) {
                return $this->setError('确认成功!');
            }
        }
        return $this->setError('确认失败!');
    }

    // 转入未分配
    public function transform_payment(){
        $this->actionAuth();
        if( $data = $this->db->where('id',$this->U('id'))->first() ) {
            $amount_data = $this->db->get_project_amount($this->U('id'));
            if ( $amount_data['total_sum'] >= 0.01 ) {
                $db = new \App\Models\Declares\Receipt();
                $receipt = [
                    'customerid'=>$data['customerid'],
                    'companyid'=>$data['companyid'],
                    'projectid'=>$data['ID'],
                    'payername'=>'业务单余额结算',
                    'payercountry'=>142,
                    'amount'=>(-$amount_data['total_sum'] ),
                    'exchangerate'=>1,'createdat'=>time(),'receiptdate'=>date('Y-m-d'),
                    'note'=>'业务单余额结算兑冲',
                    'currency'=>'CNY','status'=>2,'vii'=>0,'usage'=>2,'approved'=>1,'transfer'=>1,
                ];
                $db->save($receipt);

                $receipt['projectid'] = null;
                $receipt['amount'] = $amount_data['total_sum'];
                $receipt['payername'] = $data["BusinessID"].'业务单余额结算';
                $receipt['usage'] = 2;
                $db->save($receipt);

                $data['id'] = $data['ID'];
                $data['paymentstatus'] = 1;
                $data['donetime'] = date('Y-m-d H:i:s');

                if ( $this->db->save( $data ) ) {
                    return $this->toJson('确认付清成功');
                }
            }
        }
        return $this->setError('分配失败');
    }

    //支付成本确认付清
    public function confirm_paymentcl(){
        $this->actionAuth(true);
        if( $data = $this->db->where('id',$this->U('id'))->first()) {
            $db = new \App\Models\Declares\Paymentcl();
            $paymentcl_data = $db->select('sum( amount * exchangerate ) as amount')->where(['projectid'=>$data['ID']])->first();
            $data['id'] = $this->U('id');
            $data['paymentclstatus'] = 1;
            if ( $this->db->save($data) ) return $this->toJson('成本确认成功!');
        }
        return $this->setError('成本确认付清失败');
    }
    #endregion

    // 文件管理
    public function files_page(){
        $this->actionAuth();
        $db = new \App\Models\Declares\Entry();
        $P = $this->U();
        $P['searchField'] = 'project.BusinessID';
        $data = $db->select("project.id,project.BusinessID,b.entryport,b.destionationcountry,
        (select viiimage from vii where vii.projectid=project.id and length(vii.viiimage)>0 limit 1) as viiimage,
        b.clearance,b.fileht,b.filetrade,b.filepak,project.isentrance,date_format(project.createtime,'%Y-%m-%d') as createtime")
            ->from('entryform as b',true)
            ->join('project','project.id=b.projectid','left')
            ->search($P)
            ->whereAuth('project.customerid','project.companyid')
            ->orderBy('project.createtime','desc')
            ->orderBy('project.donetime','desc')
            ->paginates($this->_page(),$this->_size());
        return $this->toJson($data);
    }

    // 下载托书
    public function downbooking(){
        $this->actionAuth();
        $P = $this->U();
        if( $project_data = $this->db->where('id',$P['id'])->first() && ckAuth() ){
            if(session('custId') != $project_data['customerid']) return $this->setError('参数错误!');
        }
        $goods_db = new \App\Models\Declares\Goods();
        $data['project'] = $project_data;
        $data['entry'] = $this->db->from('entryform',true)->where('projectid',$P['id'] )->first();
        $data['goods'] = $goods_db->get_data( ['projectid' => $P['id']] );

        $content = view('/Declares/Project/_ckwt',['data'=>$data]);
        $content = str_replace("src=\"/", "src=\"". site_url() ."",$content);
        $filename = iconv('utf-8', 'gb2312', time());
        header('pragma:public');
        header('Content-type:application/vnd.ms-word;charset=utf-8;name="'.$filename.'".doc');
        header("Content-Disposition:attachment;filename=$filename.doc");
        $html = '<html xmlns:o="urn:schemas-microsoft-com:office:office"  xmlns:w="urn:schemas-microsoft-com:office:word"  xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>';
        echo $html.$content.'</html>';
    }

    // 结汇补贴 系数
    public function allowance(){
        $this->actionAuth();
        $P = $this->U();
        if ( ckAuth('customer',false) && $data = $this->db->where('id',$P['id'])->first() ) {
            if ( !is_numeric($P['rate']) ) $this->setError('请输入有效的系数');
            if ( $this->db->where('id',$P['id'])->set('rate',$P['rate'])->update() ) {
                return $this->toJson('设置成功');
            }
        }
        return $this->setError('设置失败');
    }

    // 获取有效业务单
    public function available(){
        $this->actionAuth();
        $customerId = $this->U('customerid');
        $data['data'] = $this->db->available_projects(['customerid' => $customerId,'isentrance' => 0,'status' => 1]);
        return $this->toJson($data);
    }

    // 开票人生成pdf
    private function _ViiKP($data,$type = ''){
        $name = md5(date('YmdHis').rand(1,10000));
        $view = ["1"=>"_kp","2"=>"_caiguo"];
        $html = view("/Declares/Project/{$view[$type]}",['data'=>$data]);
        /*
        $pdf = new \mPDF('utf-8','A4','','',25,25,16,16);
        $pdf->useAdobeCJK = TRUE;
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        $pdf->SetDisplayMode('fullpage');
        $pdf->SetFont('sun-exta');
        $pdf->writeHTML($html);
        $pdf->Output('uploads/etrades/pdf/' . $name . '.pdf', 'F');*/
        $pname = "uploads/etrades/pdf/$name.pdf";
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html,"UTF-8");
        $dompdf->setPaper('A4' );
        $dompdf->render();
        //$dompdf->stream();
        $out = $dompdf->output();
        file_put_contents("./$pname",$out);
        return ['name'=>$name.'pdf','url'=>"./$pname"];
    }

    // 下载增票
    private function _viidownload($type = '',$id = 0,$invoiceId = 0){
        //$this->actionAuth();
        $goods_db = new \App\Models\Declares\Goods();
        //项目实体
        $data['project'] = $this->db->from('project',true)->where('id',$id )->first();
        //获取报关资料信息
        $data['entry'] = $this->db->from('entryform',true)->where('projectid',$id)->first();
        //开票人
        $data['invoicer'] = $this->db->from('invoicer',true)->where('id',$invoiceId)->first();
        //报关商品信息
        $data['goods'] = $goods_db->get_data(['projectid'=>$id,'b.invoicerid' => $invoiceId]);;
        // 获取文件
        $file = $this->_ViiKP($data,$type)['url'];
        // 返回文件
        return $file;
    }

    // 报关资料生成PDF
    private function _genfiles($data, $type = '',$force = true){
        $name = md5(date('YmdHis').rand(1,10000));
        $view_data = ['1'=>'_bgs','2'=>'_bgfapiao','3'=>'_bghetong','4'=>'_bgxiangdan','5'=>'_xiyi','6'=>'_bgswd'];
        $isentrance = $data['project']["isentrance"]; $view = ($isentrance == 1) ? 'import' : 'Project';
        $paper = 'A4';
        if ( in_array($type,["1","6"])) $paper = "A3";
        $view_path = "/Declares/$view/{$view_data[$type]}";

        $html = view($view_path,['data'=>$data]);

        $hname = "uploads/etrades/pdf/$name.html"; $pname = "uploads/etrades/pdf/$name.pdf";

        if ( ! $fp = fopen("./$hname", 'w+')) return FALSE;
        fwrite($fp, $html);
        fclose($fp);

        if( $type == 1 ){
            $str = sprintf("wkhtmltopdf -O Landscape -s A4 %s/$hname  $pname",base_url());
            exec($str); unlink($hname);
            if( $force ) force_download("./$pname",null);
            return ['name'=>$name.'pdf','url'=>"./$pname"];
        }else{
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html,"UTF-8");
            $dompdf->setPaper('A4' );
            $dompdf->render();
            //$dompdf->stream();
            $out = $dompdf->output();
            file_put_contents("./$pname",$out);
            
            /*$pdf = new \mPDF('UTF-8',$paper,'','',25,25,16,16);
            $pdf->useAdobeCJK = TRUE;
            $pdf->autoScriptToLang = true;
            $pdf->autoLangToFont = true;
            $pdf->SetDisplayMode('fullpage');
            $pdf->SetFont('sun-exta');
            $pdf->writeHTML($html);
            $pdf->Output($pname, 'F');*/
            return ['name'=>$name.'pdf','url'=>"./$pname"];
        }
    }

    // 打包下载
    private function _packdownload($data){
        $packet_files = ["1" => '报关单草单',"2"=>"报关资料发票","3"=>"报关资料合同","4"=>"报关资料箱单"];
        $name = md5(time());
        $filename="./uploads/etrades/pdf/{$name}.zip";
        //重新生成文件
        $zip = new \ZipArchive();
        if ($zip->open($filename, \ZIPARCHIVE::CREATE)!==TRUE) {
            exit('无法打开文件，或者文件创建失败');
        }

        foreach ( $packet_files as $k => $v ) {
            $file = $this->_genfiles($data,$k,false);
            $attachfile = $file['url']; //获取原始文件路径
            if(file_exists($attachfile)) {
                $zip->addFile($attachfile, $v.'.pdf');
            }
        }

        $file5 = '.'.$data['entry']['authdeclar'];
        if(file_exists($file5) && $data['entry']['authdeclar']){
            $this->_view_authdeclar($data); $dname = '报关委托书.'.explode('.',$data['entry']['authdeclar'])[1];
            $zip->addFile($file5,$dname);
        }

        $zip->close();

        if(!file_exists($filename)){
            exit("无法找到文件"); //即使创建，仍有可能失败。。。。
        }
        return ($filename);
    }

    // 更新通关
    private function _update_authdeclar( $data ){
        if($data['project']){
            $db = new \App\Models\Declares\Entry();
            $model = $data['project'];
            $phpWord = new \PhpOffice\PhpWord\PhpWord();
            $templete = $this->_template_doc( $model['companyid'],$phpWord );

            $templete->setValue('BUSSINESSID',$model["BusinessID"]);
            $filename = md5(uniqid());
            $templete->saveAs("./uploads/etrades/pdf/{$filename}.docx");
            $exec = "unoconv -f pdf ".WRITEPATH."uploads/etrades/pdf/$filename.docx  2>&1";
            exec($exec,$ret,$res);
            $entry = $data["entry"];
            $entry["authdeclar"] = '/uploads/etrades/pdf/'.$filename.'.pdf';

            $db->save( $entry );
        }
    }

    // 更新 查看 托书
    private function _view_authdeclar($data){
        //查看委托书
        if($data['entry'] && $data['entry']["status"] == 3){
            $db = new \App\Models\Declares\Entry();
            $entry = $data['entry'];
            $entry["status"] = 4;
            $db->save( $entry );
        }
    }

    // 详情数据
    private function _detail_data(){
        $db = new \App\Models\Form();
        $form = $this->U();
        if (!$this->ck_auth_data( $this->db , $form))
            exit('参数错误');
        //
        $item = $this->db->get_data($form['id']);
        $model = $this->_colunm_data( $item, $db ,true);
        $data['project'] = (array) $model;

        $data["entry"] = $db->select('a.*,b.companyname as businessman')
                ->from('entryform as a',true)
                ->join('overseas as b','a.businessid=b.id','left')
                ->where('a.projectid',$form['id'])->first();
        $data["goods"] = $db->select('a.*,ifnull( a.supelement,b.supelement ) as supelement ,b.hscode,a.id as gid,a.ProductChineseName as name,a.productid as pid,c.name as invoicer,c.domesticsource')
                ->from('goods as a',true)
                ->join('products as b','a.productid=b.id','left')
                ->join('invoicer as c' , 'b.invoicerid=c.id','left')
                ->where('a.projectid',$form['id'])->findAll();
        return $data;
    }

    // 详情数据
    private function _colunm_data( $row , $db , $has = false ){
        if (is_array( $row )) $row = (object) $row;

        $customer_data = $db->from('customer',true)->where('id',$row->customerid)->first();
        $entry_data = $db->from('entryform',true)->where('projectid',$row->ID)->first();
        $goods_data = $db->from('goods',true)->select('sum(ProductUnitPrice*ProductAmount) as bgamount,sum(ProductGrossWeight) as sumgrossweight,sum(ProductNetWeight) as sumnetweight')->where('projectid',$row->ID)->first();
        
        if ( $row->isentrance )  
            $db->where('status >=',0);
        else  
            $db->where('status >=',3);
        
        $vii_data = $db->from('vii',true)->selectSum('invoiceamount')->where(['projectid'=>$row->ID])->first();

        if ( $row->isentrance == 0 ) $db->where('approved',1);
        $receipt_data = $db->from('receipt',true)->select('sum(case when realityamount > 0 then realityamount else amount end * exchangerate) as isreceipt')->where('status>0')->where(['projectid'=>$row->ID])->first();
        
        $payment_data = $db->from('payment',true)->select('sum(amount*exchangerate) as payamount')->where('status>=1')->where('projectid',$row->ID)->first();
        $tuishui_data = $db->from('vii',true)->select('sum(taxamount) as taxamount')->where(['projectid'=>$row->ID])->first();

        if ( $row->isentrance == 0 ) $db->where('approved',1);
        $receipt_sum_data = $db->from('receipt',true)->select('sum(amount * exchangerate) as amount')->where(['status >'=>0,'vii'=>0,'projectid'=>$row->ID])->first();    // 不包含退税

        $row->customer = $customer_data ? $customer_data['customername']:'';

        $row->entryport = $entry_data ? $entry_data['entryport'] : '';
        $row->destionationcountry = $entry_data ? $entry_data['destionationcountry'] : '';
        $row->exportdate = $entry_data ? $entry_data['exportdate'] : '';
        $row->currency = $entry_data ? $entry_data['currency'] : '';
        $row->clearance = $entry_data ? $entry_data['clearance'] : '';

        $row->bgamount = $goods_data ? $goods_data['bgamount'] : 0;
        $row->sumgrossweight = $goods_data ? $goods_data['sumgrossweight'] : 0;
        $row->sumnetweight = $goods_data ? $goods_data['sumnetweight'] : 0;

        $row->vcapital = $vii_data ? $vii_data['invoiceamount'] : 0;
        $row->isreceipt = $receipt_data ? $receipt_data['isreceipt'] : 0;
        $row->receiptsum = $receipt_sum_data ? $receipt_sum_data['amount']:0;
        $row->payamount = $payment_data ? $payment_data['payamount'] : 0;
        $row->tuishui = ($row->taxrefund == 4) ? ($tuishui_data?$tuishui_data['taxamount']:0) : 0;

        if ( $has ) {
            $realit_data = $db->from('receipt',true)->select('sum(realityamount) as amt')->where(['projectid'=>$row->ID,'usage'=>3])->first();
            $payment_cl_data = $db->from('paymentcl',true)->select('sum(paymentcl.amount*exchangerate) as amt')->where(['projectid'=>$row->ID,'status >='=>1])->first();
            $usd_data = $db->from('receipt',true)->select('sum(amount) as amt')->where(['projectid'=>$row->ID,'status>'=>0])->where('currency','USD')->first();

            $row->realityamount = $realit_data ? $realit_data['amt']:0;
            $row->paymnet_cl_amount = $payment_cl_data ? $payment_cl_data['amt']:0;
            $row->usd = $usd_data ? $usd_data['amt']:0;
        }

        // 报关标签
        $row->btag = $this->_bg_tag($row->status,$row->clearance,$row->exportdate);
        // 增票
        $row->vtag = $this->_vii_tag($row->status,$row->tuishui,$row->taxrefund,$row->exportdate);
        // 收入
        $row->rtag = $this->_receipt_tag($row->status , $row->receiptstatus,$row->exportdate);
        //
        return $row;
    }

    // 报关标签提醒
    private function _bg_tag($stauts,$clearance,$date){
        $tag = 0;
        $day = $this->_exchange_time( $date );
        if($day > 0 && $day > 9 && $stauts == 1 && strlen($clearance) < 10)
            $tag = ($day >=10 && $day<20) ? 1 : (($day >= 20 && $day  < 30) ? 2 : ( $day >= 30 ? 3 : 0));
        return $tag;
    }

    // 增票提醒
    private function _vii_tag($status, $vcal , $taxrefund , $date ){
        $tag = 0;
        $day = $this->_exchange_time( $date );
        if( $vcal==0 && $taxrefund != 4 &&  $status == 1)
            $tag = ($day >=30 && $day<60) ? 1 : (($day >= 60 && $day  < 80) ? 2 : ( $day >= 80 ? 3 : 0));
        return $tag;
    }

    // 收入提醒
    private function _receipt_tag($status ,$receiptstatus,$date){
        $tag = 0;
        $day = $this->_exchange_time( $date );
        if ( $status == 1 && $receiptstatus == 0 ) $tag = ($day >=30 && $day<60) ? 1 : (($day >= 60 && $day  < 80) ? 2 : ( $day >= 80 ? 3 : 0));
        return $tag;
    }

    // 时间转换
    private function _exchange_time( $date = '' ){
        return !$date ? 0 : ((strtotime(date("Y-m-d")) - strtotime($date))/3600/24);
    }

    // 格式转换
    private function _template_doc($companyId = '' , \PhpOffice\PhpWord\PhpWord $phpWord){
        $doc = ['1'=>'etrade','2'=>'allroad','5'=>'etradetech','9'=>'xz','10'=>'zihao'];
        return $phpWord->loadTemplate(WRITEPATH."uploads/template/{$doc[$companyId]}.docx");
    }

    // 删除通知
    private function _delete_notice( $data ) {
        $id = $data['project']['ID'];
        // 删除增票消息
        $vii_data = $this->db->from('vii',true)->where('projectid', $id)->findAll();
        // 删除收入通知
        $receipt_data = $this->db->from('receipt',true)->where('projectid',$id)->findAll();
        // 删除支付通知
        $payment_data = $this->db->from('payment',true)->where('projectid',$id)->findAll();

        function _del( $data ,$topic){
            $arr = [];
            foreach ( $data  as $row ) {
                $arr[] = $row['id'];
            }
            delete_notify( $arr, $topic,session('id'),0);
        }

        // 消除业务单消息
        delete_notify([$id,$data['entry']['id']],['TOPIC_CONFIRM_CLEARANCE','TOPIC_ENTRYFORM_ARCHIVES_APPROVE','TOPIC_APPROVED_TAXREFUND','TOPIC_REJECTED_TAXREFUND'], session('id') ,0);
        // 删除增票
        _del($vii_data,['TOPIC_CONFIRMED_VII']);
        // 删除收入通知
        _del($receipt_data,['TOPIC_NEW_RECEIPT','TOPIC_ALLOCATE_RECEIPT']);
        // 删除支付通知
        _del($payment_data,['TOPIC_CONFIRM_PAYMENT']);
    }
}
