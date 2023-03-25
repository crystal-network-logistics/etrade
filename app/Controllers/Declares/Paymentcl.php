<?php
namespace App\Controllers\Declares;
use App\Controllers\Base;
use App\Services\sms;
use CodeIgniter\Database\BaseBuilder;

class Paymentcl extends Base {
    protected $db;
    function __construct() {
        $this->db = new \App\Models\Declares\Paymentcl();
    }

    // 加载数据
    public function load_page( $action = '' ){
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'BusinessID,receivername,bank,bankaccount,note';
        $this->db->asObject();

        if ( !$action ) {
            $data['data'] = $this->db->where(['projectid'=>$this->U('id')])->findAll();
        } else {
            $P['paymentcl.customerid'] = $P['customerid'];
            unset($P['customerid']);
            $data = $this->db
                ->select('paymentcl.*,b.BusinessID,c.customername,b.isentrance')
                ->join('project as b' , 'paymentcl.projectid=b.id','left')
                ->join('customer as c','paymentcl.customerid=c.id','left')
                ->where('paymentcl.status >= ',0)
                ->whereAuth('paymentcl.customerid','paymentcl.companyid')
                ->search( $P )
                ->orderBy('paymentcl.createtime','desc')
                ->orderBy('b.BusinessID','desc')
                ->paginates( $this->_page(), $this->_size() );
        }
        //log_message('error',json_encode( $P ));
        //log_message('error',$this->db->getLastQuery());
        foreach ( $data['data'] as $row ) {
            $row->approvedt = $row->approvedt ? date('Y-m-d',strtotime($row->approvedt)) : $row->paymentdate;
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

            // 新增
            if( !$P['projectid'] || empty($P['projectid']) ){
                $db = new \App\Models\Declares\Project();
                if ( $db->save( ['id' => 0, 'customerid' => $P['customerid'],'isentrance' => $P['isentrance'],'status' => 1] ) ) {
                    $P['projectid'] = $db->getInsertID();
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

            // 保存支付方式
            if ( $this->db->save( $P ) ) {
                return $this->toJson(['msg'=>'已保存成功!','projectid'=>$P['projectid']]);
            }
            return $this->setError('保存失败');
        }

        // 判断是否编辑
        if ( array_key_exists('id', $P ) && $P['id'] && $payment_data = $this->db->where('id',$P['id'])->first() ) {
            $payment_data['isentrance'] = 0;
            $data = $payment_data;
        }else {
            // 输出视图数据
            $data = ['projectid' => $P['projectid'], 'customerid' => $P['customerid'], 'isentrance' => $P['isentrance'] ];
        }
        // 加载视图
        return $this->render(
            ['view_path' => '/Declares/Paymentcl/form','data' => $data]
        );
    }

    // 支付确认
    public function approve(){
        $this->actionAuth(true);
        if( $data = $this->db->where('id',$this->U('id'))->first() ){
            //@balancelog_start($Payment->projectid);
            $data['status'] = 1;
            $data['approvedt'] = date('Y-m-d H:i:s');
            $data['approvedip'] = $this->request->getIPAddress();
            $data['approvedid'] = session('id');

            if ( $this->db->save($data) ) {
                //@balancelog_end($Payment->projectid,($Payment->type == 1 ? '货款支付':($Payment->type == 2 ? '运费支付':($Payment->type == 4 ? '费用支付':'其他支付'))));
                return $this->toJson('已确认成功');
            }
        }
        return $this->setError('确认失败');
    }

    // 转出
    public function rollcopy(){
        $this->actionAuth(true);

        if ( $payment_data = $this->db->where('id',$this->U('id'))->first() ) {
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
                    return $this->toJson('转出成功');
                }
                return $this->setError('转出失败');
            }
            // 打开页
            $data['payment_data'] = $payment_data;
            $data['project_data'] = $project_db->available_projects( $payment_data['projectid'] );
            return $this->render(
                ['view_path' => '/Declares/Paymentcl/rollcopy','data' => $data]);
        }
        return exit('操作失败');
    }

    //删除支付
    public function delete(){
        $this->actionAuth(true);
        if( $data = $this->db->where('id',$this->U('id'))->first() ){
            if ( $this->db->delete($this->U('id')) ) {
                //Notice::delNotice($id,['TOPIC_APPROVE_PAYMENT','TOPIC_CONFIRM_PAYMENT','TOPIC_APPLY_BANK_PAYMENT','TOPIC_UPLOADED_BANK_PAYMENT'],null);
                return $this->toJson('删除成功');
            }
        }
        return $this->setError('删除失败,没有找到相应记录');
    }

    // 设置汇率
    public function set_rate(){
        $this->actionAuth(true,'declares/paymentcl/approve');
        $P = $this->U();
        if(!is_numeric($P['value'])){
            return $this->setError('设置失败,请输入正确的汇率！');
        }
        if($payment_data = $this->db->where('id',$P['id'])->first()){
            $payment_data['exchangerate'] = $P['value'];
            if( $this->db->save($payment_data) ) return $this->toJson('汇率已设置');
        }
        return $this->setError('设置失败,请输入正确的汇率！');
    }

    // 支付成本(资金) 明细 页面
    public function paymentcl(){
        $this->actionAuth();
        return $this->display([
            'view_path' => '/Capital/paymentcl'
        ]);
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
