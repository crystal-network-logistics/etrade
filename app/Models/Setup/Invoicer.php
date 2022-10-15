<?php namespace App\Models\Setup;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Invoicer extends \App\Models\BaseModel
{
    protected $table = 'invoicer';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'taxpayerid', 'licenseid', 'taxpayerconfirmdate', 'address', 'domesticsource', 'viirate', 'customerid', 'status', 'type', 'bank', 'account', 'rejectreason', 'posbit', 'products', 'files', 'companyid', 'id'];

    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];

    protected $afterInsert = ['data_after'];
    protected $afterUpdate = ['data_after'];

    protected function data_before(array $array) {
        $this->setCustCom( $array );
        $Id = $array['id'][0]; $data = $array['data'];
        $TOPIC = null; $Opt = 1;       // 0: 只读操作 ,1 : 操作
        $RecType = 0;   // 0: 企业, 1: 客户
        $invoicer_data = $Id ? $this->where('id',$Id)->first() : [];
        // 与现有数据进行对比
        $compare = $invoicer_data && ($invoicer_data['status'] != $data['status']);

        log_message('error','compare:'. $compare);
        //  开票人被拒绝
        if( array_key_exists("status",$data) && $data['status'] == 2 && $compare ) {
            $TOPIC = 'TOPIC_REJECTED_INVOICER'; $Opt = 0; $RecType = 1;
        }

        // 开票人审核通过
        if( array_key_exists("status",$data) && $data['status'] == 3 && $compare ) {
            $TOPIC = 'TOPIC_APPROVED_INVOICER'; $Opt = 0; $RecType = 1;
        }


        // 增加通知
        notice_add($TOPIC,$Id,'invoicer','/notices/invoicer',$Opt,$RecType);

        log_message('error','invoicer_data_before'.json_encode($array));

        return $array;
    }

    protected function data_after(array $array){
        $data = $array['data']; $Id = $array['id'];  $TOPIC = null;$Opt = 1; $RecType = 0;
        // 开票人待审核
        if( array_key_exists("status",$data) && $data['status'] == 1 ) {
            $TOPIC = 'TOPIC_APPROVE_INVOICER';
        }

        // 加入通知
        if( !is_null($TOPIC) ){//为空时不提交任何通知
            notice_add($TOPIC,$Id,'invoicer','/notices/invoicer',$Opt,$RecType);
        }

        return $array;
    }
}
