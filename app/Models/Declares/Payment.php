<?php namespace App\Models\Declares;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Payment extends \App\Models\BaseModel
{
    protected $table = 'payment';
    protected $primaryKey = 'id';
    protected $allowedFields = ['projectid', 'type', 'receivername', 'amount', 'bank', 'bankaccount', 'currency', 'note', 'paymentdate', 'realpaydate', 'exchangerate', 'receiverid', 'receiver_tag', 'save_tag', 'status', 'bankreceipt', 'copysessionid', 'transfer', 'createtime', 'companyid', 'customerid', 'approvedt', 'createtor', 'formId', 'approvedid', 'approvedip','transfer_amount'];

    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];

    protected $afterUpdate = ['data_after'];
    protected $afterInsert = ['data_after'];

    // 保存前
    protected function data_before(array $array) {
        $this->setCustCom( $array );
        log_message('error','payment_data_before_begin:'.json_encode($array));
        $Id = ( isset( $array['id'] ) && $array['id'][0] ) ? $array['id'][0] : 0;
        $TOPIC = null;
        $Opt = 1;       // 0: 只读操作 ,1 : 操作
        $RecType = 0;   // 0: 企业, 1: 客户

        $data = $array['data'];
        $payment_data = $Id ? $this->where('id',$Id)->first() : [];

        $compare = ( ( $payment_data && $data['status'] != $payment_data['status'] ) ) ? true : false;

        // 已确认支付
        if( array_key_exists("status",$data) && $data['status'] == 1 && $compare ) {
            $TOPIC =  'TOPIC_CONFIRM_PAYMENT'; $Opt = 0; $RecType = 2;
        }
        // 申请查看支付水单
        if( array_key_exists("status",$data) && $data['status'] == 2 && $compare ) {
            $TOPIC =  'TOPIC_APPLY_BANK_PAYMENT'; $RecType = 0;
        }
        // 已上传水单
        if( array_key_exists("status",$data) && $data['status'] == 3 ) {
            $TOPIC =  'TOPIC_UPLOADED_BANK_PAYMENT';  $RecType = 1;
        }
        notice_add($TOPIC , $Id,'payment','/notices/payment',$Opt,$RecType);

        $array['data'] = $data;
        log_message('error','payment_data_before_end:'.json_encode($array));
        return $array;
    }

    protected function data_after(array $array) {
        $TOPIC = null; $Opt = 1;       /* 0: 只读操作 ,1 : 操作*/
        $RecType = 0;   // 0: 企业, 1: 客户
        $Id = is_array( $array['id'] ) ? $array['id'][0] : $array['id'] ; $data = $array['data'];

        log_message('error','payment_data_after_Id:'.$Id);
        // 待审核支付
        if( array_key_exists("status",$data) && $data['status'] == 0 && $Id ) {
            $TOPIC = 'TOPIC_APPROVE_PAYMENT';
            notice_add($TOPIC , $Id,'payment','/notices/payment',$Opt,$RecType);
        }
        log_message('error','payment_data_after:'.json_encode($array));

        return $array;
    }

    // 汇总
    public function collect_to( $param ){
        $data = $this->select('sum( amount * exchangerate ) as amount')
            ->search( $param )
            ->where(['type'=>1,'status >'=>0])
            ->first();
        return $data ? $data['amount'] : 0;
    }
}
