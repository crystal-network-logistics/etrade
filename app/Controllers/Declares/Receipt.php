<?php
namespace App\Controllers\Declares;
use App\Controllers\Base;
use CodeIgniter\Database\BaseBuilder;
use Dompdf\Dompdf;

class Receipt extends Base
{
    protected $db;
    function __construct() {
        $this->db = new \App\Models\Declares\Receipt();
    }

    // 加载数据 收入列表
    public function load_page( $action = '' ) {
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'BusinessID,payername';
        $P['receipt.status'] = $P['status'];

        $this->db->asObject();
        if ( !$action ) {
            $data['data'] = $this->db->where(['projectid' => $P['id'], 'status >' => 0, 'vii' => 0, 'approved' => 1])->findAll();
        } else {
            $P['receipt.customerid'] = $P['customerid'];
            unset($P['status'],$P['customerid']);
            $data = $this->db
                ->select('receipt.*,b.BusinessID,c.customername,b.isentrance')
                ->join('project as b' , 'receipt.projectid=b.id','left')
                ->join('customer as c','receipt.customerid=c.id','left')
                ->where('receipt.status >=',0)
                ->whereAuth('receipt.customerid','receipt.companyid')
                ->search( $P )
                ->orderBy('receipt.createtime','desc')
                ->orderBy('b.BusinessID','desc')
                ->paginates( $this->_page(), $this->_size() );
        }
        return $this->toJson($data);
    }

    // 加载未分配收入
    public function load_unlocated_page(){
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'payername,note' ;
        $P['approved'] = 1 ;
        $data = $this->db->search($P)->where('( status = 0 or projectid = 0 or projectid is null)')->paginates( $this->_page() , $this->_size() );
        return $this->toJson($data);
    }

    // 新增收入情况
    public function create( $t = '' ) {
        $this->actionAuth(true);
        $P = $this->U();
        // 保存新增收入
        if( $this->request->getMethod() == 'post' ) {
            $P['vii'] = 0; $P['usage'] = 1; $P['status'] = 2; $P['approved'] = 1;
            // 保存创建人
            if ( !$P['id'] ) {
                $P['createtor'] = session('username'); $P['createdat'] = time();
            }
            // 判断是否有权限操作 新增收入情况
            if ( ckAuth() ) return $this->setError('授权失败,没有权限操作');

            // 创建业务单
            if( (!$P['projectid'] || $P['projectid'] == 0) && empty($t) ){
                $db = new \App\Models\Declares\Project();
                if ( $db->save( ['id' => 0, 'customerid' => $P['customerid'],'isentrance' => $P['isentrance']??0,'status' => 1] ) ) {
                    $P['projectid'] = $db->getInsertID();
                }
            }

            @balancelog_start($P['projectid'],$P['customerid']);

            // 不是财务人员
            if ( !ckAuth('finance') ) $P['approved'] = 0;
            // 业务单为空
            if( empty($P['projectid']) ) $P['status'] = 0;
            // 保存收入情况
            if ( $this->db->save( $P ) ) {
                // 记录
                 @balancelog_end($P['projectid'],($P['usage'] == 1 ? '外汇收入':($P['usage'] == 2 ? '其他收入':($P['usage'] == 3 ? '退税收入':''))),$P['customerid']);
                if ( $P['tag'] ) {
                    $payer_db = new \App\Models\Setup\Payer();
                    $payer_argc = [
                        'name' => $P['payername'],
                        'region' => $P['payercountry'],
                        'customerid' => $P['customerid'],
                        'createdtype' => 2,
                        'currency' => $P['currency']];
                    // 保存付款人信息
                    if ( $payer_data = $payer_db->where( ['name'=>$P['payername'],'customerid'=>$P['customerid']] )->first() ) {
                        $payer_argc['id'] = $payer_data['id'];
                    }
                    $payer_db->save($payer_argc);
                }
                return $this->toJson(['msg'=>'新增收入成功,请耐心等待审核!','projectid'=>$P['projectid']]);
            }
        }
        return $this->render([
            'view_path' => '/Declares/Receipt/main','data' => $P
        ]);
    }

    // 编辑,审核
    public function update(){
        $this->actionAuth(true);
        if ( $data  = $this->db->where('id',$this->U('id'))->first() ) {
            if ( $data['projectid'] ) {
                $project_data = $this->db->from('project', true)->where('projectid', $this->U('id'))->first();
                $data['isentrance'] = $project_data['isentrance'];
            }
            $data['detail'] = $data;
            return $this->render([
                'view_path' => '/Declares/Receipt/update', 'data' => $data
            ]);
        }
        return '操作失败';
    }

    // 资金转入
    public function pullin(){
        $this->actionAuth();
        $P = $this->U();
        // 保存操作
        if ( $this->request->getMethod() == 'post' ) {
            // 判断金额是否有效
            if( !is_numeric( $P['amount'] ) || (floatval( $P['amount'] ) < 0 ) ) return $this->setError('请输入有效金额');
            // 判断是否存在记录
            if ( !$receipt_data = $this->db->where(['id'=>$P['id']])->first() ) return $this->setError('记录不存在');
            // 判断输入的金额是否大于原有未分配金额
            if ( $P['amount'] > $receipt_data['amount'] ) return $this->setError('输入的金额无效');
            // 创建业务单
            if(!$P['projectid'] || $P['projectid'] == 0){
                $db = new \App\Models\Declares\Project();
                if ( $db->save( ['id' => 0, 'customerid' => $P['customerid'],'isentrance' => $P['isentrance']??0,'status' => 1] ) ) {
                    $P['projectid'] = $db->getInsertID();
                }
            }
            // 更新原有未分配金额
            $receipt_data['amount'] -= $P['amount'];
            //@balancelog_start($model->projectid,$model->customerid);
            if (  $receipt_data['amount'] > 0 && $this->db->save($receipt_data) ) {
                $receipt_data['id'] = 0;
                $receipt_data['createdat'] = time();
            }
            // 新建资金单
            $receipt_data['projectid'] = $P['projectid'];
            $receipt_data['amount'] = $P['amount'];
            $receipt_data['note'] = $P['note'];
            $receipt_data['status'] = 1;
            // 保存新的资金单
            if ( $this->db->save( $receipt_data ) ) {
                // @balancelog_end($model->projectid,($model->usage == 1 ? '外汇收入':($model->usage == 2 ? '其他收入':($model->usage == 3 ? '退税收入':''))),$model->customerid);
                return $this->toJson(['msg'=>'转入成功','projectid'=>$P['projectid']]);
            }
            return $this->setError('输入失败');
        }

        // 打开页面
        if ( !$data = $this->db->where('id',$P['id'])->first() ) return exit('打开失败');
        if ( isset( $P['projectid'] ) && $P['projectid'] && $project_data = $this->db->from('project', true)->where('id', $P['projectid'])->first() ) {
            $data['projectid'] = $P['projectid'];
            $data['isentrance'] = $project_data['isentrance'];
        }
        $data['detail'] = $data;
        return $this->render(['view_path' => '/Declares/Receipt/pullin','data' => $data]);
    }

    // 转出操作
    public function rollcopy(){
        $this->actionAuth(true);
        if ( $receipt_data = $this->db->where('id',$this->U('id'))->first() ) {
            $P = $this->U();
            $project_db = new \App\Models\Declares\Project();
            // 保存操作
            if ( $this->request->getMethod() == 'post' ) {
                $receipt_data['transfertext'] = 'TRANSFER';     // 转出标识

                $old_project_id = $receipt_data['projectid'];
                $valid_amount = $this->_available_receipt_balance( $receipt_data['id'] );

                if ( $valid_amount < $P['amount'] ) {
                    return $this->toJson('可转金额不足,可转金额:(' . number_format($valid_amount) . ')');
                }

                if ( empty($receipt_data['copysessionid']) || $receipt_data['copysessionid'] == 0 ) {
                    $receipt_data['copysessionid'] = $receipt_data['id'];
                    $receipt_data['transfer_amount'] = $P['amount'];
                    $this->db->save( $receipt_data );
                }
                $receipt_data['transfer_amount'] = 0;
                if ( !$receipt_data['usage'] ) $receipt_data['usage'] = 2;

                $receipt_data['amount'] = (-1) * $P['amount'];
                $receipt_data['transfer'] = 1;
                $receipt_data['copysessionid'] = $receipt_data['id'];
                $receipt_data['id'] = 0;

                //新业务,创建
                if ( empty( $P['projectid'] ) || $P['projectid'] == 0) {
                    $project_data = $project_db->where('id',$receipt_data['projectid'])->first();
                    $project_db->save(['id'=>0,'customerid'=>$project_data['customerid'],'status'=>1,'isentrance' => $project_data['isentrance']]);
                    $P['projectid'] = $project_db->getInsertID();
                }

                // 新业务
                $new_project_data = $project_db->where('id',$P['projectid'])->first();
                // 操作
                $receipt_data['note'] = "转入到业务 ". $new_project_data['BusinessID'];
                // 保存
                $this->db->save( $receipt_data );
                // 原业务
                $old_project_data = $project_db->where('id',$old_project_id)->first();

                $receipt_data['projectid'] = $P['projectid'];
                $receipt_data['amount'] = $P['amount'];
                $receipt_data['copysessionid'] = null;
                $receipt_data['id'] = 0;
                $receipt_data['note'] = '转出自业务 ' . $old_project_data['BusinessID'];
                $receipt_data['transfer'] = 1;
                // 保存新转出业务
                if ( $this->db->save( $receipt_data ) ) {
                    $id = $this->db->getInsertID();
                    // 成功添加通知
                    notice_add('TOPIC_TRANSFERED_RECEIPT',$id, 'receipt', '/notices/receipt', 0, 0);
                    return $this->toJson('转出成功');
                }
                return $this->setError('转出失败');
            }
            // 打开页
            $data['receipt_data'] = $receipt_data;
            $data['project_data'] = $project_db->available_projects( $receipt_data['projectid'] );
            return $this->render(
                ['view_path' => '/Declares/Receipt/rollcopy','data' => $data]);
        }
        return exit('操作失败');
    }

    // 申请查看水单
    public function apply(){
        $this->actionAuth(true);
        if( $receipt_data = $this->db->where('id',$this->U('id'))->first() ){
            $receipt_data['status'] = 3;
            if ( $this->db->save( $receipt_data ) )
                return $this->toJson('查看水单申请成功');
        }
        return $this->setError('查看水单申请失败');
    }

    // 上传水单
    public function upfiles() {
        $this->actionAuth(true);
        $P = $this->U();
        if ( $receipt_data = $this->db->where('id',$P['id'])->first() ){
            if ( $this->request->getMethod() == 'post' ) {
                if( $P['file'] ){
                    $receipt_data['status'] = 4;  $receipt_data['bankreceipt'] = $P['file'];
                    if ( $this->db->save( $receipt_data ) )
                        return $this->toJson('水单已上传成功');
                }
            }
            $data['detail'] = $receipt_data;
            return $this->render(['view_path' => '/Declares/Receipt/upload','data' => $data]);
        }
        return $this->setError('水单上传失败');
    }

    // 查看水单
    public function viewdoc() {
        $this->actionAuth();
        if( $receipt_data = $this->db->where('id',$this->U('id'))->first() ){
            if ( $receipt_data['exchangerate'] == 0 ) exit('汇率还未设置');
            if ( ( ckAuth() && $receipt_data['customerid'] == session('custId') ) && !empty( $receipt_data['bankreceipt'] )) {
                $files = '.'.$receipt_data['bankreceipt'];
                if( !file_exists($files) ) exit('水单不存在');
                force_download($files,null); return false;
            }
            // 消除通知
            delete_notify( $receipt_data['id'],['TOPIC_UPLOADED_BANK_RECEIPT'], session('id') );

            // 付款人
            $payer_data = $this->db->from('payer',true)->where(['customerid' => $receipt_data['customerid'],'payername' => $receipt_data['payername'],'region' => $receipt_data['payercountry']])->first();

            $receipt_data['bankname'] = $payer_data ? $payer_data['bankname'] : '';
            $receipt_data['account'] = $payer_data ? $payer_data['account'] : '';
            $html = view('/Declares/Project/_receiptsd',['data'=>$receipt_data]);
            $name = md5(date('YmdHis').rand(1,10000));
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html,"UTF-8");
            $dompdf->setPaper('A4' );
            $dompdf->render();
            $dompdf->stream("$name.pdf");
            /*
            require(APPPATH.'Libraries/Mpdf/mpdf.php');
            $pdf = new \mPDF('utf-8','A4','','',25,25,16,16);
            $pdf->useAdobeCJK = TRUE;
            $pdf->autoScriptToLang = true;
            $pdf->autoLangToFont = true;
            $pdf->SetDisplayMode('fullpage');
            $pdf->SetFont('sun-exta');
            $pdf->writeHTML($html);
            $pdf->Output('uploads/etrades/pdf/' . $name . '.pdf', 'F');
            $url = './uploads/etrades/pdf/'.$name.'.pdf';
            force_download($url,null);*/
        }
        return exit('查看失败');
    }

    // 删除 收入
    public function delete(){
        $this->actionAuth(true);
        if ( $receipt_data = $this->db->where('id',$this->U('id'))->first() ){
            @balancelog_start($receipt_data['projectid']);
            if ( $this->db->delete($this->U('id')) ) {
                @balancelog_end($receipt_data['projectid'], ($receipt_data['usage'] == 1 ? '删除外汇收入' : ($receipt_data['usage'] == 2 ? '删除其他收入' : ($receipt_data['usage'] == 3 ? '删除退税收入' : ''))), $receipt_data['customerid']);
                delete_notify($receipt_data['id'], ['TOPIC_ALLOCATE_RECEIPT', 'TOPIC_APPLY_BANK_RECEIPT', 'TOPIC_UPLOADED_BANK_RECEIPT', 'TOPIC_APPROVE_RECEIPT', 'TOPIC_NEW_RECEIPT'], null);
                return $this->toJson('收入已成功删除');
            }
        }
        return $this->setError('操作失败');
    }

    // 审核 收入
    public function approve(){
        $this->actionAuth(true);
        $id = $this->U('id');

        if( !ckAuth('finance') || !ckAuth('admin') || !ckAuth('all')) return $this->setError('审核失败,无权限操作!');

        if( !$data = $this->db->where('id',$id)->first() ) return $this->setError('审核失败,该收入已审核或不存在!');

        $data['approved'] = 1;
        $data['status'] = 1;
        $data['approvedip'] = $this->request->getIPAddress();
        $data['approvedid'] = session('id');
        $data['approvedt'] = date('Y-m-d H:i:s');

        @balancelog_start( $data['projectid'] , $data['customerid'] );
        $this->db->save( $data );
        @balancelog_end($data['projectid'],($data['usage'] == 1 ? '外汇收入':($data['usage'] == 2 ? '其他收入':($data['usage'] == 3 ? '退税收入':''))),$data['customerid'] );
        return $this->toJson('审核通过');
    }

    // 设置退税
    public function reality_amount(){
        $this->actionAuth(true);
        $P = $this->U();
        if( $data = $this->db->where('id',$P['id'])->first() ) {
            if ($data['usage'] != 3) return $this->setError('设置失败,只有退税收入才能设置!');
            $P['realityamount'] = $P['value'];
            $P['realityDate'] = date('Y-m-d');
            if ($this->db->save($P)) {
                //log_message('error',$this->db->getLastQuery());
                return $this->toJson('实际退税已设置成功！');
            }
        }
        return $this->setError('设置失败,没有相关记录!');
    }

    // 收入明细(资金)
    public function income(){
        $this->actionAuth();
        return $this->display([
            'view_path' => '/Capital/receipt'
        ]);
    }

    // 转出金额判断
    private function _available_receipt_balance( $id ){
        $receipt_data = $this->db->where('id',$id)->first();
        if( empty( $receipt_data['copysessionid'] ) || $receipt_data['copysessionid'] == 0 ){
            return $receipt_data['amount'];
        }
        $data = $this->db->select('sum(amount) as amount')->where('copysessionid',$receipt_data['copysessionid'])->first();
        return $data['amount'];
    }
}
