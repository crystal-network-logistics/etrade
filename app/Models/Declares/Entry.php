<?php namespace App\Models\Declares;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Entry extends \App\Models\BaseModel
{
    protected $table = 'entryform';
    protected $primaryKey = 'id';
    protected $allowedFields = ['projectid', 'entryform', 'foreigncurrency', 'priceterm', 'supervisionmode', 'taxation', 'specialrelation', 'priceimpact', 'privilegefeeconfirm', 'totalpackageamount', 'status', 'type', 'exportdate', 'transport', 'tranportexpense', 'insurancefee', 'receiver', 'address', 'tel', 'brokerno', 'entryport', 'destionationcountry', 'destionationport', 'brokername', 'currency', 'lcnumber', 'fileno', 'licno', 'businesscountry', 'businessid', 'businessman', 'totalpackagemode', 'totalpackagenote', 'authdeclar', 'clearance', 'totalcube', 'clearancenbr', 'updatereason', 'archives', 'entryfiles', 'entrymark', 'fileht', 'htmark', 'filetrade', 'trademark', 'filepak', 'pakmark', 'production', 'createtime', 'companyid', 'customerid', 'domesticid', 'kama'];

    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];

    protected $afterUpdate = ['data_after'];
    protected $afterInsert = ['data_after'];

    // 保存前
    protected function data_before(array $array) {
        $this->setCustCom( $array );
        // 更新 报关信息
        if ( isset($array['id'])  && $array['id'][0] ) {
            $data = $array['data']; $Id = $array['id'][0];
            $entry_data = $this->where('id',$Id)->first();

            $TOPIC = null;
            $Opt = 1;       // 0: 只读操作 ,1 : 操作
            $RecType = 0;   // 0: 企业, 1: 客户

            $compare = ( $entry_data && $entry_data['status'] != $data['status']);

            if ( array_key_exists('status',$data) && $data['status'] == 1 && $compare ) {
                //退回修改
                 $TOPIC = 'TOPIC_RETURNED_ENTRYFOM';
            }


            // 操作上传报关资料
            if ( array_key_exists('status',$data) && $data['status'] == 3 && $compare ){
                 notice_add('TOPIC_DOWNLOADED_ENTRYFORM',$Id,'entryform','/notices/entryform',1,1);
                 $TOPIC = 'TOPIC_APPROVED_ENTRYFORM';$RecType = 1;
            }

            // 下载报关资料
            if ( array_key_exists('status',$data) && $data['status'] == 4 && $compare ){
                // 消除通知
                delete_notice(['relationid'=>$Id,'topickey' => ['TOPIC_APPROVED_ENTRYFORM','TOPIC_RETURNED_ENTRYFOM','TOPIC_APPROVE_ENTRYFORM'] , 'receiverid' => session('id')]);
            }

            // 确认通关
            if ( array_key_exists('status',$data) && $data['status']==5 && $compare){
                 $TOPIC = 'TOPIC_CONFIRM_CLEARANCE';$Opt = 0; $RecType = 1;
            }

            // 上传备案单据
            if( $data['type'] == 1 && array_key_exists('archives',$data) && $data['archives']==0 && ((array_key_exists('fileht',$data) && $data['fileht']) || (array_key_exists('filetrade',$data) && $data['filetrade']) || (array_key_exists('filepak',$data) && $data['filepak']))){
                if( ckAuth() ) {
                     $TOPIC = 'TOPIC_ENTRYFORM_ARCHIVES';$Opt = 0; $RecType = 0;
                }
            }

            // 确认备案单据
            if( $data['type'] == 2 && array_key_exists('archives',$data) && $data['archives']==1 && ((array_key_exists('fileht',$data) && $data['fileht']) || (array_key_exists('filetrade',$data) && $data['filetrade']) || (array_key_exists('filepak',$data) && $data['filepak']))){
                 $TOPIC = 'TOPIC_ENTRYFORM_ARCHIVES_APPROVE';$Opt = 0; $RecType = 1;
            }
            // 增加通知
            notice_add($TOPIC,$Id,'entryform','/notices/entryform',$Opt,$RecType);
            $array['data'] = $data;
        }
        log_message('error','entry_data_before: '.json_encode($array));
        return $array;
    }

    // 保存后
    protected function data_after(array $array) {
        $data = $array['data']; $Id = $array['id'];  $TOPIC = null;$Opt = 1; $RecType = 0;
        //生成通知
        if ( array_key_exists('status',$data) && $data['status'] == 2) {// 客户提交审核,待操作上传报关资料
            if( ckAuth() ) {    // 客户
                $TOPIC = 'TOPIC_APPROVE_ENTRYFORM';
            }
        }
        // 加入通知 为空时不提交任何通知
        if( !is_null($TOPIC) ){
            notice_add($TOPIC,$Id,'entryform','/notices/entryform',$Opt,$RecType);
        }
        return $array;
    }
}

