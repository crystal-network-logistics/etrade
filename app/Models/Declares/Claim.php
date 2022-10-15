<?php namespace App\Models\Declares;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Claim extends \App\Models\BaseModel
{
    protected $table = 'receiptclaim';
    protected $primaryKey = 'id';
    protected $allowedFields = ['payername', 'payerregion', 'currency', 'receiptamount', 'receiptdate', 'customerid', 'createdat', 'status', 'save_tag', 'bank', 'bankaccount', 'projectid', 'createtime', 'note', 'formId', 'companyid', 'approvedt', 'createtor'];

    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];

    protected $afterUpdate = ['data_after'];
    protected $afterInsert = ['data_after'];

    // 保存前
    protected function data_before(array $array) {
        $this->setCustCom( $array );

        $Opt = 1;       // 0: 只读操作 ,1 : 操作
        $RecType = 0;   // 0: 企业, 1: 客户

        //取消或审核通过
        if(array_key_exists("status",$array['data']) && ($array['data']['status']==-1 || $array['data']['status'] == 1 )) {
            delete_notice(['relationid' => $array['id'][0],'topickey' => 'TOPIC_RECEIPTCLAIM_APPROVE']);
        }
        return $array;
    }

    protected function data_after(array $array){
        $Opt = 1;       // 0: 只读操作 ,1 : 操作
        $RecType = 0;   // 0: 企业, 1: 客户
        
        //创建收入申领
        if ( array_key_exists("status",$array['data']) && $array['data']['status'] == 0 ) {
            notice_add('TOPIC_RECEIPTCLAIM', $array['id'] ,'receiptclaim','/notices/receiptclaim',$Opt,$RecType);
        }
    }
}
