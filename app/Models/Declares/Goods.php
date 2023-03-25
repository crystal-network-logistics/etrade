<?php namespace App\Models\Declares;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Goods extends \App\Models\BaseModel
{
    protected $table = 'goods';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customerid', 'createtime', 'type', 'region', 'productunit', 'invoiceamount', 'brandtype', 'yhqk', 'ProductEnglishName', 'ProductChineseName', 'officialamount', 'officialunit', 'ProductAmount', 'ProductUnitTotalPrice', 'ProductGrossWeight', 'ProductNetWeight', 'ProductUnitPrice', 'productid', 'ProductPackageAmount', 'projectid', 'brand', 'model', 'companyid','supelement'];

    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];

    // 保存前
    protected function data_before(array $array) {
        $this->setCustCom( $array );
        return $array;
    }

    // 批量保存 商品
    public function batch_save( $projectId , $customerId , $form ){
        if ( $projectId ) {
            $colunms = [];
            foreach ( $form['tags'] as $k => $v ) {
                $form['projectid'][$k] = $projectId;$form['customerid'][$k] = $customerId;
            }
            // 需要插入的字段
            foreach ( $form as $k=>$v ) {
                if ( in_array( $k, $this->allowedFields ) || ($k == 'id') ) $colunms[] = $k;
            }
            // 组成数据
            foreach ( $form['tags'] as $k => $v ) {
                $fd = [];
                foreach ( $colunms as $filed ) {
                    $temp = ( in_array($filed,['ProductUnitPrice','ProductUnitTotalPrice','invoiceamount','ProductAmount']) ) ? ( [$filed =>str_replace(',','', $form[$filed][$k])] ): [$filed => $form[$filed][$k]];
                    $fd = array_merge($fd,$temp);
                }
             $this->save($fd);
            }
            return true;
        }
        return false;
    }

    // 商品信息
    public function get_data( $param ) {
        $data = $this->select('
                    goods.*,
                    goods.ProductChineseName as name,
                    b.supelement,
                    b.taxreturnrate,
                    b.hscode,
                    b.usage,
                    b.invoicerid,
                    b.id as prodId,
                    b.customsupervision,
                    c.name as invoicer,
                    c.domesticsource,
                    goods.officialunit as unit')
            ->join('products as b', 'goods.productid=b.id','left')
            ->join('invoicer c','b.invoicerid=c.id','left')
            ->whereAuth('','goods.companyid')
            ->search($param)
            ->findAll();
        return $data;
    }

    // 获取开票人信息
    public function get_invoicers($projectid){
        return $this->select('c.name,c.id')
            ->from('goods a',true)
            ->join('products b','a.productid=b.id')
            ->join('invoicer c','b.invoicerid=c.id')
            ->where('a.projectid',$projectid)
            ->groupBy('c.name,c.id')
            ->findAll();
    }
}