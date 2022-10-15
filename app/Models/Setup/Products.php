<?php namespace App\Models\Setup;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Products extends \App\Models\BaseModel
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'model', 'brand', 'customer', 'status', 'englishname', 'usage', 'misc', 'taxreturnrate', 'invoicerid', 'hscode', 'productid','officialamount', 'officialunit','productunit', 'reason', 'supelement','originalrecord', 'supplementinstruction', 'customsupervision', 'files', 'type', 'declarationelements', 'companyid', 'customerid', 'isentrance', 'approvedt'];

    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];

    protected $afterInsert = ['data_after'];
    protected $afterUpdate = ['data_after'];

    protected function data_before(array $array){
        $db = new \App\Models\Form();
        $data = $array['data']; $Id = $array['id'][0];  $TOPIC = null;$Opt = 1; $RecType = 0;
        $this->setCustCom( $array );
        $product_data = $Id ? $this->where('id',$Id)->first() : [];
        $compare = $product_data && ($product_data['status'] != $data['status']);

        if ( $array['data']['status'] == 3 ) {
            if ( !$product_data['productid'] || strlen($product_data['productid']) < 4 ) {
                $customer_data = $db->from('customer', true)->where('id', $array['data']['customerid'])->first();
                $cNo = $customer_data['customerno'] . 'PR-';
                $select_filed = "(REPLACE(productid,'$cNo','')) + 0 as PID";
                $max_data = $this->select("$select_filed")->where(['customerid' => $customer_data['id']])->like('productid', $cNo)->orderBy('PID', 'desc')->first();
                $max_productId = $cNo . ($max_data ? ($max_data['PID'] + 1) : '1');
                $array['data']['productid'] = $max_productId;
            }
        }

        // 产品待审核
        if( array_key_exists("status",$data) && $data['status'] == 1 ) {
            $TOPIC = 'TOPIC_APPROVE_PRODUCT';
        }

        //  审核通过
        if( array_key_exists("status",$data) && $data['status'] == 3 && $compare ) {
            $TOPIC = 'TOPIC_APPROVED_PRODUCT'; $Opt = 0; $RecType = 2;
        }

        // 产品待确认
        if( array_key_exists("status",$data) && $data['status'] == 2 && $compare ) {
            $TOPIC = 'TOPIC_CONFIRM_PRODUCT'; $RecType = 1;
        }

        // 补充
        if( array_key_exists("status",$data) && $data['status'] == 4 && $compare ) {
            $TOPIC = 'TOPIC_SUPPLEMENT_MATERIAL'; $RecType = 1;
        }

        // 加入通知
        if( !is_null($TOPIC) ){//为空时不提交任何通知
            notice_add( $TOPIC ,$Id ,'products','/notices/products', $Opt , $RecType );
        }

        return $array;
    }

    protected function data_after(array $array){
        $data = $array['data']; $Id = $array['id'];  $TOPIC = null;$Opt = 1; $RecType = 0;
        // 产品待审核
        if( array_key_exists("status",$data) && $data['status'] == 1 ) {
            $TOPIC = 'TOPIC_APPROVE_PRODUCT';
        }
        // 加入通知
        if( !is_null($TOPIC) ){//为空时不提交任何通知
            notice_add( $TOPIC ,$Id ,'products','/notices/products', $Opt , $RecType );
        }
        log_message('error','products:'. json_encode( $array ));
        return $array;
    }
}
