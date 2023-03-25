<?php namespace App\Models\Declares;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Receipt extends \App\Models\BaseModel
{
    protected $table = 'receipt';
    protected $primaryKey = 'id';
    protected $allowedFields = ['batchid', 'customerid', 'projectid', 'payerid', 'payername', 'payercountry', 'realityamount', 'amount', 'exchangerate', 'createdat', 'receiptdate', 'realityDate', 'claimid', 'note', 'currency', 'item', 'status', 'vii', 'bankreceipt', 'accounttype', 'usage', 'approved', 'copysessionid', 'transfer', 'companyid', 'approvedt', 'createtorid', 'createtor', 'formId', 'approvedid', 'approvedip','realityDate','transfer_amount'];

    protected $beforeInsert = ['data_before'];
    protected $beforeUpdate = ['data_before'];

    protected $afterInsert = ['data_after'];
    protected $afterUpdate = ['data_after'];

    // 插入前
    protected function data_before(array $array) {
        $this->setCustCom( $array );
        //log_message('error','data_before: '.json_encode($array));
        return $array;
    }

    // 保存后
    protected function data_after(array $data) {
        $Id = is_array( $data['id'] ) ? $data['id'][0] : $data['id'];
        $argc = $data['data'];
        log_message('error','receipt_data_after: '.json_encode($data));
        if(array_key_exists('transfertext',$argc)){
            return $data;
        }

        //新分配的收入
        if( array_key_exists("status",$argc) && $argc['status'] == 0 ) {
             $this->_set_receipt( $data );
        }

        //新分配的收入
        if( array_key_exists("status",$argc) && $argc['status'] == 1) {
             notice_add('TOPIC_ALLOCATE_RECEIPT',$Id,'receipt','/notices/receipt',0,0);
             $this->_set_receipt($data);
        }

        //新分配的收入
        if( array_key_exists("status",$argc) && $argc['status'] == 2) {
             $this->_set_receipt($data);
        }

        //申请查看水单
        if( array_key_exists("status",$argc) && $argc['status'] == 3 ) {
            notice_add('TOPIC_APPLY_BANK_RECEIPT',$Id,'receipt','/notices/receipt',1,0);
        }

        //上传收入水单
        if( array_key_exists("status",$argc) && $argc['status'] == 4 ) {
            notice_add('TOPIC_UPLOADED_BANK_RECEIPT',$Id,'receipt','/notices/receipt',1,1);
        }
        log_message('error','receipt_data_after:'.json_encode( $data ));
        return $data;
    }

    // 确认收齐判断 条件
    public function confirm_receipt( $data ){
        $rec_sum = 0; $goods_sum = 0;
        $receipt = $this->select('sum(amount) as amt')
            ->where(['projectid'=>$data['project']['ID'],'approved'=>1,'usage'=>1])->whereIn('status',[1,2,3,4])->first();
        if( $receipt ) $rec_sum = $receipt["amt"];
        // 商品金额
        $goods = $this->select('sum(ifnull(productunittotalprice,productunitprice*productamount)) as amt')
            ->from('goods',true)
            ->where(['projectid'=>$data['project']['ID']])->first();
        if($goods) $goods_sum = $goods["amt"];
        return $receipt && ( $rec_sum >= $goods_sum * 0.95 ) && ( $rec_sum <= $goods_sum * 1.15 ) && ($goods_sum>0) && ( $rec_sum > 0 );
    }

    // 收入情况 汇总
    public function receipt_sum( $argc , $fee = 0 ){
        if ( $receipt_data = $this->select( 'sum( amount * exchangerate ) as statsum' )->where('status > ',0)->search( $argc )->first() ) {
            // 客户信息
            $customer_data = $this->from('customer',true )->where('id',$argc['customerid'])->first();
            $statsum = $receipt_data['statsum']?:0;
            // 计划退税
            return ($fee == 0)? (($customer_data['commissionfeemin'] > 0 && $customer_data['commissionfeemin'] > $statsum ) ? $customer_data['commissionfeemin'] : ( $statsum * $customer_data['commissionfee'] ) )
                : (($customer_data['taxrefundfeemin'] > 0 && $customer_data['taxrefundfeemin'] > $statsum ) ? ($customer_data['taxrefundfeemin']) : ( $statsum * $customer_data['taxrefundfee'] ) );
        }
        return 0;
    }

    // 通知
    private function _set_receipt( $param ){
        $Id = is_array( $param['id'] )  ? $param['id'][0] : $param['id'];
        // 操作新增收入
        if( array_key_exists("approved",$param) && $param['approved'] == 0 ) {
             notice_add('TOPIC_APPROVE_RECEIPT',$Id,'receipt','/notices/receipt',1,0);
        }

        // 财务新增收入
        if( array_key_exists("approved",$param) && $param['approved'] == 1 ) {
            if( ckAuth('finance') ) {
                if ( $param['projectid'] != null ) {
                    notice_add('TOPIC_NEW_RECEIPT',$Id,'receipt','/notices/receipt',0,2);
                }
            }
        }
    }
}
