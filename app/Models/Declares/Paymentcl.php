<?php namespace App\Models\Declares;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Paymentcl extends \App\Models\BaseModel
{
    protected $table = 'paymentcl';
    protected $primaryKey = 'id';
    protected $allowedFields = ['projectid', 'type', 'receivername', 'amount', 'bank', 'bankaccount', 'currency', 'note', 'paymentdate', 'exchangerate', 'receiverid', 'receiver_tag', 'save_tag', 'status', 'bankreceipt', 'copysessionid', 'transfer', 'createtime', 'companyid', 'customerid', 'approvedt', 'createtor'];

    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];

    protected $afterUpdate = ['data_after'];
    protected $afterInsert = ['data_after'];

    // 保存前
    protected function data_before(array $array) {
        $this->setCustCom( $array );
        $Id = ( isset( $array['id'] ) && $array['id'][0] ) ? $array['id'][0] : 0;

        $TOPIC = null;
        $Opt = 1;       // 0: 只读操作 ,1 : 操作
        $RecType = 0;   // 0: 企业, 1: 客户
        $data = $array['data'];

        $paymentcl_data = $Id ? $this->where('id',$Id)->first() : [];
        $compare = ( !$paymentcl_data || ( $paymentcl_data && $data['status'] != $paymentcl_data['status'] ) ) ? true : false;

        // 已确认支付
        if( array_key_exists("status",$data) && $data['status'] == 1 && $compare ) {
            $TOPIC = 'TOPIC_CONFIRM_PAYMENTCL'; $Opt = 0;
        }
        // 添加消息
        notice_add($TOPIC, $Id ,'paymentcl','/notices/paymentcl',$Opt,$RecType);
        return $array;
    }

    protected function data_after(array $array){
        $TOPIC = null;
        $Opt = 1;       // 0: 只读操作 ,1 : 操作
        $RecType = 0;   // 0: 企业, 1: 客户
        $data = $array['data'];
        $Id = $array['id'];

        // 待审核支付
        if( array_key_exists("status",$data) && $data['status'] == 0 && $Id) {
            $TOPIC = 'TOPIC_APPROVE_PAYMENTCL';
            notice_add($TOPIC, $Id ,'paymentcl','/notices/paymentcl',$Opt,$RecType);
        }
        return $array;
    }
}
