<?php
namespace App\Controllers\Declares;
use App\Controllers\Base;

class Goods extends Base
{
    protected $db;
    function __construct() {
        $this->db = new \App\Models\Declares\Goods();
    }

    // 删除商品
    public function delete(){
        $this->actionAuth();
        if (!$model = $this->ck_auth_data( $this->db , $this->U()))
            exit('参数错误');
        if( $this->db->delete($this->U('id')) ) {
            return $this->toJson('已删除');
        }
        return $this->setError('删除失败');
    }

    // 加载已报关或未报关商品
    public function load_vii_goods_products(){
        $this->actionAuth();
        $P = $this->U();

        if ( $P['entryform'] == 0 ) {
            $data = $this->db
                ->select('products.*,products.id as prodId,officialunit as unit,b.name as invoicer')
                ->whereAuth('','products.companyid')
                ->search([ 'products.status' => 3,'products.customerid' => $P['customer'] , 'invoicerid >' => 0])
                ->from('products',true)
                ->join('invoicer b','products.invoicerid=b.id','left')
                ->findAll();
        }else {
            $data = $this->db->get_data(['projectid' => $P['projectid']?:'-9999' ]);
        }
        $options = '<option value="">--请选择商品--</option>';

        foreach ( $data as $item ) {
            $taxrate = $item['taxreturnrate'] * 100;
            $json = json_encode(['invoicerid' => $item['invoicerid'],'invoicer'=>$item['invoicer'],'taxreturnrate' => ($taxrate),'unit' => $item['unit']]);
            $options .= "<option value='{$item['prodId']}' data-json='{$json}'>{$item['name']} ( 用途: {$item['usage']} , 退税率 : {$taxrate})</option>";
        }

        return $options;
    }

    // 元素详情
    public function supelement(){
        $this->actionAuth();
        $id = $this->U('id');
        if ( !$this->db->where('id',$id)->first() ) {
            $model = $this->db->from('products',true)->where('id',$this->U('pid'))->first();
        } else {
            if (!$model = $this->db->select('goods.*,ifnull( goods.supelement,b.supelement ) as supelement ,b.hscode,b.taxreturnrate,b.customsupervision')
                ->join('products as b', 'goods.productid=b.id', 'left')
                ->where('goods.id', $id)->first())
                exit('参数错误 !');
        }
        $model['tag'] = $this->U('tag') ?? false;
        $data['detail'] = $model;

        return $this->render([
            'data' => $data
        ]);
    }
}
