<?php
namespace App\Controllers\Declares;
use App\Controllers\Base;
use CodeIgniter\Database\BaseBuilder;

class Vii extends Base
{
    protected $db,$pay_db;
    function __construct() {
        $this->db = new \App\Models\Declares\Vii();
        $this->pay_db = new \App\Models\Declares\Payment();
    }

    // 加载数据
    public function load_page( $action = '' ){
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'BusinessID,vii.productname,b.englishname,b.hscode,vii.invoicer';
        $this->db
            ->asObject()
            ->select("vii.*,a.BusinessID,a.isentrance,ifnull(b.name,vii.productname) as productname,d.customername,b.model,b.brand,b.englishname,b.usage,b.hscode,b.officialunit,b.files as pfiles,ifnull(c.name,vii.invoicer) as invoicer,c.files as ifiles,date_format(vii.createtime,'%Y-%m-%d') as createtime")
            ->join('project as a' , 'vii.projectid=a.id','left')
            ->join('products b', 'vii.productid = b.id', 'left')
            ->join('invoicer c', 'vii.invoicerid = c.id', 'left')
            ->join('customer as d','vii.customerid=d.id','left');
        if ( !$action ) {
            $data['data'] = $this->db
                ->search(['projectid' => $this->U('id')])
                ->findAll();
        } else {
            $P['vii.customerid'] = $P['customerid'];
            unset($P['customerid']);
            $data = $this->db
                ->asObject()
                ->search( $P )
                ->whereAuth('vii.customerid','vii.companyid')
                ->orderBy('vii.createtime','desc')
                ->paginates( $this->_page(), $this->_size() );
        }

        foreach ( $data['data'] as $row ) {
            $row->invoiceamount = round($row->invoiceamount,2);
            $row->paystatus = $row->amount > 0 ? ( $this->_pay_compare(['projectid'=>$row->projectid,'invoicerid'=>$row->invoicerid]) ) : false;
        }
        return $this->toJson($data);
    }

    // 加载应付 与 预付数据列表
    public function load_payin_page(){
        $this->actionAuth();
        $P = $this->U();
        // 获取客户Id
        $customerIds = where_auth();
        $companyId = session('company')??1;
        $size = $this->_size();

        $w1 = $companyId ? " and payment.companyid={$companyId}" : "";
        $w2 = $companyId ? " and vii.companyid={$companyId}" : "";

        $where = " invoicer.status = 3 ";
        $where .= $companyId ? " and invoicer.companyid={$companyId}":"";
        if ( $P['pay'] == 'in' ) {
            $having = " < 0 ";
        }else {
            $having = " > 0 ";
        }

        if ( $customerIds ) {
            $count = count( $customerIds );
            $where .= " and invoicer.customerid in (";
            /**/
            foreach ( $customerIds as $k => $v ) {
                $sep = ($count == ($k+1)) ? '' : ',';
                $where .= "'{$v}' {$sep}";
            }
            $where .= ")";
        }

        if ( $P['customerid'] ) {
            $where .= " and invoicer.customerid={$P['customerid']}";
        }

        if ( $P['keys'] ) {
            $where .= " and ( invoicer.name like '%{$P['keys']}%' or customer.customername like '%{$P['keys']}%' ) ";
        }

        $sub_table_one = " 
            select  sum(payment.amount * payment.exchangerate) as out_amount, invoicer.name as invoicer,invoicer.id,customer.customername
            from invoicer
            left join payment on payment.receivername=invoicer.name and invoicer.customerid=payment.customerid
            left join customer on customer.id=invoicer.customerid
            where {$where} {$w1}
            group by invoicer.name,invoicer.id, customer.customername
            ";

        $sub_table_two = "
            select  sum(vii.invoiceamount) as in_amount,invoicer.id,invoicer.name as invoicer, customer.customername
            from 	invoicer
            left join vii on vii.invoicerid = invoicer.id
            left join customer on customer.id = invoicer.customerid
            where  	 {$where} {$w2}
            group by  invoicer.name,invoicer.id,customer.customername
        ";

        $num_sql = "select a.id,(b.in_amount - a.out_amount) as pay_amount
            from ({$sub_table_one}) as a left join ({$sub_table_two}) as b on a.invoicer = b.invoicer and a.customername = b.customername 
            having pay_amount != 0 and pay_amount {$having}  
            order by pay_amount asc
        ";

        $main_sql = "select a.* ,(b.in_amount - a.out_amount) as pay_amount
                from ({$sub_table_one}) as a left join ({$sub_table_two}) as b on a.invoicer = b.invoicer and a.customername = b.customername having pay_amount != 0 and pay_amount {$having}  order by pay_amount asc
                limit ?,?";

        $sum_data = $this->db->query($num_sql)->getResult("array");

        $total = count( $sum_data );
        $sum_total = 0;
        if ( $total ) {
            foreach ( $sum_data as $row ) {
                $sum_total += round( $row['pay_amount'] ,4);
            }
        }
        $page = $this->_page();
        $data['iTotalDisplayRecords'] = $total;
        $data['sum'] =round( abs ( $sum_total ) ,2);
        $data['data'] = $this->db->query($main_sql,[($page?($page-1):0) * $size, intval( $size ) ])->getResult("array");
        log_message('error',$this->db->getLastQuery());

        //log_message('error',json_encode([($page?:0) * $size, $size ]));

        return $this->toJson($data);
    }

    // 新增增票
    public function create(){
        $this->actionAuth(true);
        $P = $this->U();
        $data['detail'] = $P;
        return $this->render([
            'view_path' => "/Declares/Vii/form".($P['isentrance']==0?'':'im'),
            'data' => $data
        ]);
    }

    // 编辑增票
    public function update(){
        $this->actionAuth(true);
        $P = $this->U();
        if ( !$vii_data = $this->db->where('id',$P['id'])->first() ) return $this->setError('编辑失败');
        // 获取业务单
        $project_data = $this->db->from('project',true)->where('id',$vii_data['projectid'])->first();
        $vii_data['isentrance'] = $project_data['isentrance'];

        $data['detail'] = $vii_data;
        return $this->render([
            'view_path' => "/Declares/Vii/form".($P['isentrance']==0?'':'im'),
            'data' => $data
        ]);
    }

    // 保存
    public function save(){
        $this->actionAuth(true,'declares/vii/create');
        $P = $this->U();
        if ( !$P['viiimage'] && $P['isentrance'] == 0) return $this->setError('请上传增票');

        $P['status'] = 1;
        $P['confirmer'] = 1;
        $P['viiimage'] = $P['viiimage'] ? join(',',$P['viiimage']) : '';
        $P['invoiceamount'] = str_replace(',','',$P['invoiceamount']);

        if ( ($P['isentrance'] == 0 || !$P['isentrance'] || !$P['invoicerid'])) {
            $db = new \App\Models\Setup\Products();
            if ($product_data = $db->where('id',$P['productid'])->first()) {
                $P['productname'] = $product_data['name'];
                $P['invoicerid'] = $product_data['invoicerid'];
            }
        }

        $tax_rate = floatval($P['taxreturnrate']);

        $P['taxreturnrate'] = ( $P['isentrance'] == 0 && $tax_rate > 1 ) ? ( $tax_rate / 100 ) : ($tax_rate??0);

        $P['type'] = ckAuth() ? 1 : 2;
        // 财务添加
        if ( ckAuth('finance') ) {
            $P['status'] = 2; $P['confirmer'] = 2;
        }

        // 不存在业务号, 则创建新业务单
        if ( $P['projectid'] == "0" || empty( $P['projectid'] )){
            $db = new \App\Models\Declares\Project();
            if ( $db->save( ['id' => 0, 'customerid' => $P['customerid'],'isentrance' => $P['isentrance'],'status' => 1] ) ) {
                $P['projectid'] = $db->getInsertID();
            }
        }

        if ( $this->db->save($P) ) {
            return $this->toJson(['msg'=>'保存成功','projectid'=>$P['projectid']]);
        }

        return $this->setError('保存失败');
    }

    // 删除增票
    public function delete(){
        $this->actionAuth(true);
        if ( $data = $this->db->where('id',$this->U('id'))->first() ) {
            if ( $this->db->where('id',$data['id'])->delete() ) {
                delete_notify($data['id'] , ['TOPIC_APPROVE_VII','TOPIC_EDIT_CONFIRM_VII','TOPIC_CONFIRMED_VII','TOPIC_VIEWED_PROJECT','TOPIC_UPLOADED_VII','TOPIC_VIEWED_VII'],null);
                return $this->toJson('删除成功');
            }
        }
        return $this->setError('删除失败');
    }

    // 增票确认
    public function confirm() {
        $this->actionAuth(true);

        if ( $data = $this->db->where('id',$this->U('id'))->first() ) {
            $data['confirmer'] = 1; $data['status'] = 3;
            if ( $this->db->save( $data ) ) {
                return $this->toJson(ckAuth() ? "已成功认可" : "已确认成功");
            }
        }
        return $this->setError('确认失败');
    }

    // 增票确认
    public function accept() {
        $this->actionAuth(true);

        if ( $data = $this->db->where('id',$this->U('id'))->first() ) {
            $data['status'] = 3; $data['approvedt'] = date('Y-m-d H:i:s');
            if ( $this->db->save( $data ) ) {
                return $this->toJson(ckAuth() ? "已成功认可" : "已确认成功");
            }
        }
        return $this->setError('确认失败');
    }

    // 转出页面
    public function rollcopy(){
        $this->actionAuth(true);
        if ( $vii_data = $this->db->where('id',$this->U('id'))->first() ) {
            $project_db = new \App\Models\Declares\Project();
            // 保存操作
            if ( $this->request->getMethod() == 'post' ) {
                $P = $this->U();
                $vii_data['transfertext'] = 'TRANSFER';
                // 更新转出标识
                if( empty($vii_data['copysessionid']) || $vii_data['copysessionid'] == 0 ){
                    $vii_data['copysessionid'] = $vii_data['id'];
                    $this->db->save( $vii_data );
                }

                // 判断数量及金额是否足额
                if ( !$valid = $this->db->available_vii_balance( $vii_data['id'],$P['amt'],$P['count']) )
                    return $this->toJson('可转出数量或者金额不足');

                $old_project_id = $vii_data['projectid'];

                $vii_data['invoiceamount'] = (-1) * $P['amt'];
                $vii_data['amount'] = (-1) * $P['count'];
                $vii_data['copysessionid'] = $vii_data['id'];
                $vii_data['id'] = 0;

                //新业务,创建
                if( empty( $P['projectid'] ) || $P['projectid'] == 0 ){
                    $project_data = $project_db->where('id',$vii_data['projectid'])->first();
                    $project_db->save(['id'=>0,'customerid'=>$project_data['customerid'],'status'=>1,'isentrance' => $project_data['isentrance']]);
                    $P['projectid'] = $project_db->getInsertID();
                }

                // 新建业务单
                $new_project_data = $project_db->where('id',$P['projectid'])->first();
                $vii_data['note'] = "转入到业务 ". $new_project_data['BusinessID'];
                //保存
                $this->db->save( $vii_data );
                // 创建新业务
                $vii_data['projectid'] = $P['projectid'];
                $vii_data['invoiceamount'] = $P['amt'];
                $vii_data['amount'] = $P['count'];
                $vii_data['copysessionid'] = null;
                $vii_data['id'] = 0;

                $old_project_data = $project_db->where('id',$old_project_id)->first();
                $vii_data['note'] = '转出自业务 '. $old_project_data['BusinessID'];
                // 保存新转出增票
                if ( $this->db->save( $vii_data ) )
                    return $this->toJson('保存成功!');
                return $this->setError('转出失败');
            }
            // 打开页
            $data['vii_data'] = $vii_data;
            $data['project_data'] = $project_db->available_projects( $vii_data['projectid'] );
            return $this->render(
                ['view_path' => '/Declares/Vii/rollcopy','data' => $data]
            );
        }
        return '参数错误,检查后再试!';
    }

    // 查看水单
    public function viewvii(){
        $this->actionAuth();
        $data = $this->db->where('id',$this->U('id'))->first();
        if( $data && ( $data['customerid'] == session('custId') || strlen($data['viiimage']) > 0) ) {
            delete_notify($data['id'],['TOPIC_VIEWED_VII'],session('id'));
            $filename='./uploads/etrades/pdf/'. md5(time()) .'.zip';
            //重新生成文件
            $zip = new \ZipArchive();
            if ($zip->open($filename, \ZIPARCHIVE::CREATE)!==TRUE) {
                exit('无法打开文件，或者文件创建失败');
            }

            $arr = explode(',',$data['viiimage']);
            foreach($arr as $key => $val) {
                $ext = explode('.',$val)[1];
                $file = '.'.$val; $fname =md5(time().($key+1));
                if(file_exists($file)){
                    $zip->addFile($file,"$fname.$ext");
                }
            }
            $zip->close();
            if(!file_exists($filename)){
                exit("无法找到文件");
            }
            force_download($filename,null);
        }else{
            exit('水单不存在或没有权限,请联系管理员!');
        }
    }

    // 下载开票资料
    public function down_vii_invoicer(){
        $this->actionAuth();
        $db = new \App\Models\Declares\Goods();
        $data['projectid'] = $this->U('id');
        $data['detail'] = $db->get_invoicers( $data['projectid'] );
        return $this->render(
            ['view_path' => '/Declares/Vii/invoicers','data' => $data]
        );
    }

    // 资金 ,明细
    public function vdata(){
        $this->actionAuth();
        return $this->display(
            ['view_path' => '/Declares/Vii/main']
        );
    }

    // 支付对比
    private function _pay_compare( $argc ){
        $db = new \App\Models\Form();

        $invoicer_data = $db->from('invoicer',true)->where('id',$argc['invoicerid'])->first();
        $payment_amount = $this->pay_db->collect_to( ['receivername' => $invoicer_data ? $invoicer_data['name']:'','projectid' => $argc['projectid']] );
        $vii_amount = $this->db->collect_to( $argc );

        if ( $vii_amount &&  $payment_amount )
            $resp = ($vii_amount - $payment_amount);
        else if ( $vii_amount ) $resp = $vii_amount;
        else if ( $payment_amount ) $resp =( 0 - $payment_amount );
        else $resp = false;
        return  $resp;
    }
}
