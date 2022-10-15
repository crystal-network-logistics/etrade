<?php
namespace App\Controllers\Declares;
use App\Controllers\Base;
use App\Services\sms;
use CodeIgniter\Database\BaseBuilder;
use Dompdf\Dompdf;

class Payment extends Base
{
    protected $db,$vii_db;

    function __construct() {
        $this->vii_db = new \App\Models\Declares\Vii();
        $this->db = new \App\Models\Declares\Payment();
    }

    // 加载数据
    public function load_page(  $action = '' ){
        $this->actionAuth();
        $this->db->asObject();
        $P = $this->U();
        $P['searchField'] = 'BusinessID,receivername,bank,bankaccount,note';

        if ( !$action ) {
            $data['data'] = $this->db->where(['projectid'=>$this->U('id')])->findAll();
        } else {
            $P['type'] = ($P['type'] == 4) ? [4,5] : $P['type'];
            $P['payment.customerid'] = $P['customerid'];
            unset($P['customerid']);

            $data = $this->db
                ->select('payment.*,b.BusinessID,c.customername,b.isentrance')
                ->join('project as b' , 'payment.projectid=b.id','left')
                ->join('customer as c','payment.customerid=c.id','left')
                ->where('payment.status >= ',0)
                ->whereAuth('payment.customerid','payment.companyid')
                ->search( $P )
                ->orderBy('payment.createtime','desc')
                ->orderBy('b.BusinessID','desc')
                ->paginates( $this->_page(), $this->_size() );
        }
        foreach ( $data['data'] as $row ) {
            $row->approvedt = $row->approvedt ? date('Y-m-d',strtotime($row->approvedt)) : $row->paymentdate;
            $row->paystatus = ($row->type == 3 ? '其他' : ($row->type == 2 ? '物流' : ($row->type == 5 || $row->type == 4 ? '费用' :  $this->_pay_compare(['receivername'=>$row->receivername,'projectid'=>$row->projectid,'customerid'=>$row->customerid]))));
        }

        return $this->toJson($data);
    }

    // 新增支付
    public function create(){
        $this->actionAuth(true);
        $P = $this->U();
        $project_db = new \App\Models\Declares\Project();
        if ( $this->request->getMethod() == 'post') {
            $P['type'] = ($P['type'] == 9)?1:$P['type'];
            if ( empty( $P['amount'] ) || $P['amount'] < 0 ) return $this->setError('请输入有效的付款金额');
            $P['status'] = 0;

            if( empty( $P['receivername'] ) && ( $P['type'] == 2 || $P['type'] == 3 ) ){
                return $this->setError('请输入收款人公司名称!');
            }
            if ( !$P['receiverid'] && ( $P['type'] == 1 )){
                return $this->setError('请输入收款人公司名称!');
            }
            // 客户
            if ( ckAuth() ) {
                if ( !array_key_exists('validcode',$P) ) return $this->setError('请先绑定手机号再进行支付操作!');
                $customer_db = new \App\Models\Setup\Customer();
                $customer_data = $customer_db->where('id',$P['customerid'])->first();
                $sms = new sms();
                // 验证短信是否正确
                $resp = $sms->ck_very_code($P['validcode'],$customer_data['phone']);
                if ( !$resp['code'] ) return $this->setError($resp['msg']);
            }
            // 付款
            $bland = $project_db->balance( $P['customerid'],3,$P['id'] );
            // 打印日志
            log_message('error','payment_balance:'.strval($bland).',csutomerId:'.strval($P['customerid']));
            //
            if($P['amount'] > $bland && !$P['id'] ){
                return $this->setError('支付金额不能大于可用余额(' . number_format($bland, 2) . ' )');
            }
            // 新增
            if( !$P['projectid'] || empty($P['projectid']) ){
                $db = new \App\Models\Declares\Project();
                if ( $db->save( ['id' => 0, 'customerid' => $P['customerid'],'isentrance' => 0,'status' => 1] ) ) {
                    $P['projectid'] = $db->getInsertID();
                }
            }

            // 收款人不为开票人
            if ( $P['is_check'] && $P['type'] != 1) {
                $receiver_db = new \App\Models\Setup\Receiver();
                $argc = ['customerid' => $P['customerid'] , 'name' => $P['receivername'], 'bank' => $P['bank'] ,'account' => $P['bankaccount'],'currency' => $P['currency']];
                // 判断是否存在收款人信息
                if ( (empty( $P['$receiverid'] ) || $P['receiverid'] == 0) && !$receiver_data = $receiver_db->where( $argc )->first() ) {
                    $P['createdtype'] = ckAuth() ? 1 : 2;
                    if ( $receiver_db->save(array_merge(['type' => $P['type']],$argc)) ) {
                        $P['receiverid'] = $receiver_db->getInsertID();
                    }
                }else {
                    $receiver_data  = $receiver_db->where('id',$P['receiverid'])->first();
                    $P['receivername'] = $receiver_data?$receiver_data['name'] : '';
                }
            }

            // 开票人信息
            $invoicer_db = new \App\Models\Setup\Invoicer();
            if ( $P['type'] == 1 && $invoicer_data = $invoicer_db->where('id',$P['receiverid'])->first() ) {
                $P['receivername'] = $invoicer_data['name'];
                $P['bank'] = $invoicer_data['bank'];
                $P['bankaccount'] = $invoicer_data['account'];
            }
            $P['paymentdate'] = date('Y-m-d');

            @balancelog_start($P['projectid']);
            // 保存支付方式
            if ( $this->db->save( $P ) ) {
                @balancelog_end($P['projectid'] ,($P['type'] == 1 ? '货款支付':($P['type'] == 2 ? '运费支付':($P['type'] == 4 ? '费用支付':'其他支付'))));
                //return $this->toJson('已保存成功!');
                return $this->toJson(['msg'=>'已保存成功','projectid'=>$P['projectid']]);
            }
            return $this->setError('保存失败');
        }

        // 判断是否编辑
        if ( array_key_exists('id', $P ) && $P['id'] && $payment_data = $this->db->where('id',$P['id'])->first() ) {
            $payment_data['isentrance'] = 0;
            $data = $payment_data;
        }else {
            // 输出视图数据
            $data = [ 'projectid' => $P['projectid'], 'customerid' => $P['customerid'], 'isentrance' => $P['isentrance'] ];
        }
        // 可用余额
        $data['balance'] = $project_db->balance( $data['customerid'],3,0 );
        // 加载视图
        return $this->render(
            ['view_path' => '/Declares/Payment/form','data' => $data]
        );
    }

    // 支付查看水单申请
    public function apply(){
        $this->actionAuth(true);
        if( $data = $this->ck_auth_data( $this->db, $this->U()) ) { //$this->db->where('id',$this->U('id'))->first() ){
            $data['status'] = 2;
            if ( $this->db->save($data) ) {
                return $this->toJson('查看水单申请成功');
            }
        }
        return $this->setError('查看水单申请失败');
    }

    // 支付确认
    public function approve(){
        $this->actionAuth(true);
        if( $data = $this->ck_auth_data( $this->db, $this->U()) ) { //$this->db->where('id',$this->U('id'))->first() ){
            @balancelog_start( $data['projectid'] );
            $data['status'] = 1;
            $data['approvedt'] = date('Y-m-d H:i:s');
            $data['approvedip'] = $this->request->getIPAddress();
            $data['approvedid'] = session('id');

            if ( $this->db->save($data) ) {
                @balancelog_end( $data['projectid'] ,($data['type'] == 1 ? '货款支付':($data['type'] == 2 ? '运费支付':($data['type'] == 4 ? '费用支付':'其他支付'))));
                return $this->toJson('已确认成功');
            }
        }
        return $this->setError('确认失败');
    }

    // 转出
    public function rollcopy(){
        $this->actionAuth(true);

        if ( $payment_data = $this->ck_auth_data($this->db , $this->U()) ) { // $this->db->where('id',$this->U('id'))->first() ) {
            $P = $this->U();
            $project_db = new \App\Models\Declares\Project();
            // 保存操作
            if ( $this->request->getMethod() == 'post' ) {
                $payment_data['transfertext'] = 'TRANSFER';     // 转出标识
                if ( empty($payment_data['copysessionid']) || $payment_data['copysessionid'] == 0 ) {
                    $payment_data['copysessionid'] = $payment_data['id'];
                    $this->db->save( $payment_data );
                }
                $old_project_id = $payment_data['projectid'];
                $valid_amount = $this->_available_payment_balance( $payment_data['id'] );

                if ( $valid_amount < $P['amount'] ) {
                    return $this->toJson('可转金额不足,可转金额:(' . number_format($valid_amount) . ')');
                }

                if ( !$payment_data['usage'] ) $payment_data['usage'] = 2;
                $payment_data['amount'] = (-1) * $P['amount'];
                $payment_data['transfer'] = 1;
                $payment_data['copysessionid'] = $payment_data['id'];
                $payment_data['id'] = 0;

                //新业务,创建
                if ( empty( $P['projectid'] ) || $P['projectid'] == 0) {
                    $project_data = $project_db->where('id',$payment_data['projectid'])->first();
                    $project_db->save(['id'=>0,'customerid'=>$project_data['customerid'],'status'=>1,'isentrance' => $project_data['isentrance']]);
                    $P['projectid'] = $project_db->getInsertID();
                }

                // 新业务
                $new_project_data = $project_db->where('id',$P['projectid'])->first();
                // 操作
                $payment_data['note'] = "转入到业务 ". $new_project_data['BusinessID'];
                // 保存
                $this->db->save( $payment_data );
                // 原业务
                $old_project_data = $project_db->where('id',$old_project_id)->first();

                $payment_data['projectid'] = $P['projectid'];
                $payment_data['amount'] = $P['amount'];
                $payment_data['copysessionid'] = null;
                $payment_data['id'] = 0;
                $payment_data['note'] = '转出自业务 ' . $old_project_data['BusinessID'];
                $payment_data['transfer'] = 1;
                // 保存新转出业务
                if ( $this->db->save( $payment_data ) ) {
                    $Id = $payment_data['id']??$this->db->getInsertID();
                    // 成功添加通知
                    notice_add( $Id, 'TOPIC_TRANSFERED_RECEIPT', 'receipt', '/notices/project',0, 0);
                    return $this->toJson('转出成功');
                }
                return $this->setError('转出失败');
            }
            // 打开页
            $data['payment_data'] = $payment_data;
            $data['project_data'] = $project_db->available_projects( $payment_data['projectid'] );
            return $this->render(['view_path' => '/Declares/Payment/rollcopy','data' => $data]);
        }
        return exit('操作失败');
    }

    //  上传水单
    public function upload(){
        $this->actionAuth(true);
        if( $data = $this->ck_auth_data($this->db , $this->U()) ){ //$this->db->where('id',$this->U('id'))->first() ){
            if ( $this->request->getMethod() == 'post' && $this->U('file') ) {
                $data['bankreceipt'] = $this->U('file') ;
                $data['status'] = 3;
                if ($this->db->save($data)) return $this->toJson('上传水单成功');
            }

            $data['detail'] = $data;
            return $this->render(['view_path' => '/Declares/Payment/upload','data' => $data]);
        }
        return $this->setError('操作失败');
    }

    //删除支付
    public function delete(){
        $this->actionAuth(true);
        if( $data = $this->db->where('id',$this->U('id'))->first() ){
            if ( $this->db->delete($this->U('id')) ) {
                // 消除通知
                delete_notify($data['id'],['TOPIC_APPROVE_PAYMENT','TOPIC_CONFIRM_PAYMENT','TOPIC_APPLY_BANK_PAYMENT','TOPIC_UPLOADED_BANK_PAYMENT'],null);
                return $this->toJson('删除成功');
            }
        }
        return $this->setError('删除失败,没有找到相应记录');
    }

    // 查看水单
    public function viewdoc(){
        $this->actionAuth();

        if( $data = $this->ck_auth_data($this->db , $this->U())){ //$this->db->where('id',$this->U('id'))->first() ) {
            if ( $data['exchangerate'] == 0 ) return $this->setError('汇率还未设置');

            if ( ( ckAuth() && $data['customerid'] == session('custId') ) && !empty( $data['bankreceipt'] )) {
                // 消除
                delete_notify($data['id'], ['TOPIC_CONFIRM_PAYMENT', 'TOPIC_APPLY_BANK_PAYMENT'], session('id'), 0);
                $files = '.' . $data['bankreceipt'];
                if (!file_exists($files)) exit('水单不存在');
                force_download($files, null);
            } else {
                $html = view('/Declares/Project/_paymentsd', ['data' => $data ]);
                $name = md5(date('YmdHis') . rand(1, 10000));
                /*
                require(APPPATH . 'Libraries/Mpdf/mpdf.php');
                $pdf = new \mPDF('utf-8', 'A4', '', '', 25, 25, 16, 16);
                $pdf->useAdobeCJK = TRUE;
                $pdf->autoScriptToLang = true;
                $pdf->autoLangToFont = true;
                $pdf->SetDisplayMode('fullpage');
                $pdf->SetFont('sun-exta');
                $pdf->writeHTML($html);
                $pdf->Output('uploads/etrades/pdf/' . $name . '.pdf', 'F');
                $url = './uploads/etrades/pdf/' . $name . '.pdf';*/
                $dompdf = new Dompdf();
                $dompdf->loadHtml($html,"UTF-8");
                $dompdf->setPaper('A4' );
                $dompdf->render();
                $dompdf->stream("$name.pdf");
                //force_download($url, null);
                //exit('水单不存在或没有权限,请联系管理员!');
                //echo $html;
            }
        }
    }

    // 支付情况明细
    public function payment(){
        $this->actionAuth();
        return $this->display([
            'view_path' => '/Capital/payment'
        ]);
    }

    // 设置汇率
    public function set_rate(){
        $this->actionAuth(true,'declares/payment/approve');
        $P = $this->U();
        if(!is_numeric($P['value'])){
            return $this->setError('设置失败,请输入正确的汇率！');
        }
        if($payment_data =  $this->ck_auth_data($this->db,$this->U()) ) {   //$this->db->where('id',$P['id'])->first()){
            $payment_data['exchangerate'] = $P['value'];
            if( $this->db->save($payment_data) ) return $this->toJson('汇率已设置');
        }
        return $this->setError('设置失败,请输入正确的汇率！');
    }

    // 支付对比
    private function _pay_compare( $argc ){
        $db = new \App\Models\Form();
        $invoicer_data = $db->from('invoicer',true)->where('name',$argc['receivername'])->findAll();
        $arr = [];
        foreach ( $invoicer_data as $item ) {
            $arr[] = $item['id'];
        }
        $vii_amount = $this->vii_db->collect_to( ['projectid' => $argc['projectid'], 'invoicerid' => $arr] );
        $payment_amount = $this->db->collect_to( $argc );
        if ( $vii_amount &&  $payment_amount ) $resp = ($vii_amount - $payment_amount);
        else if ( $vii_amount ) $resp = $vii_amount;
        else if ( $payment_amount ) $resp =( 0 - $payment_amount );
        else $resp = false;
        return  $resp;
    }

    // 转出金额判断
    private function _available_payment_balance( $id ){
        $payment_data = $this->db->where('id',$id)->first();
        if( empty( $payment_data['copysessionid'] ) || $payment_data['copysessionid'] == 0 ){
            return $payment_data['amount'];
        }
        $data = $this->db->select('sum(amount) as amount')->where('copysessionid',$payment_data['copysessionid'])->first();
        return $data['amount'];
    }
}
