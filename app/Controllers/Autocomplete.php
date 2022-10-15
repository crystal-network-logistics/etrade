<?php
namespace App\Controllers;
use App\Controllers\Base;
use CodeIgniter\Database\BaseBuilder;

class Autocomplete extends Base {
    function __construct() {
    }

    // 下拉搜索框
    public function search(){
        $this->actionAuth();
        $P = $this->U();
        $db = new \App\Models\Form();
        $data['data'] = $resp = [];

        if ( $P['keys'] && strlen( $P['keys'] ) > 2 ) {

            $P['searchField'] = 'name,model,englishname,productid';
            $product_data = $db->from('products', true)->whereAuth('customerid')->where('status', 3)->search($P)->findAll(5);

            $P['searchField'] = 'name,bank,account';
            $invoicer_data = $db->from('invoicer', true)->whereAuth('customerid')->where('status', 3)->search($P)->findAll(5);

            if (ckAuth(false)) {
                $P['searchField'] = 'customername,customerno';
                $customer_data = $db->from('customer', true)->whereAuth('id', 'companyid')->search($P)->findAll(5);
            }

            //$this->session->set('searchKey', $P['keys']);
            $P['searchField'] = 'BusinessID';
            $project_data = $db->from('project', true)
                ->search($P)
                ->whereAuth('customerid')
                ->orderBy('createtime','desc')
                ->findAll(10);

            // 报关商品
            $P['searchField'] = 'model,ProductChineseName';
            $goods_data = $db
                ->select('b.id,b.BusinessID,b.isentrance,model,ProductChineseName')
                ->distinct()
                ->from('goods as a',true)
                ->join('project as b','a.projectid=b.id')
                ->search($P)
                ->orderBy('b.createtime','desc')
                ->whereAuth('a.customerid','a.companyid')
                ->findAll(10);

            // 开票情况
            $P['searchField'] = 'b.name,b.model,c.name';
            $vii_data = $db
                ->select('b.id,d.BusinessID,b.isentrance,b.name,b.model,c.name')
                ->distinct()
                ->from('vii as a',true)
                ->join('products as b', 'a.productid=b.id', 'left')
                ->join('invoicer as c', 'a.invoicerid=c.id', 'left')
                ->join('project as d','a.projectid=d.id')
                ->search($P)
                ->orderBy('d.createtime','desc')
                ->whereAuth('a.customerid','a.companyid')
                ->findAll(10);

            // 收入情况
            $P['searchField'] = 'payername';
            $receipt_data = $db
                ->select('b.id,b.BusinessID,b.isentrance,payername')
                ->distinct()
                ->from('receipt as a',true)
                ->join('project as b','a.projectid=b.id')
                ->search($P)
                ->whereAuth('a.customerid','a.companyid')
                ->orderBy('b.createtime','desc')
                ->findAll(10);

            // 付款情况
            $P['searchField'] = 'receivername,bank,bankaccount';
            $payment_data = $db
                ->select('b.id,BusinessID,b.isentrance,receivername,bank,bankaccount')
                ->distinct()
                ->from('payment as a',true)
                ->join('project as b','a.projectid=b.id')
                ->search($P)
                ->orderBy('b.createtime','desc')
                ->whereAuth('a.customerid','a.companyid')
                ->findAll(10);

            //$this->session->remove('searchKey');

            foreach ( $product_data as $item ) {
                $resp[] = [
                    'tb' => 'products',
                    'id' => $item['id'],
                    'name' =>$item['productid']. '--'. $item['name'] . '--' . $item['model']
                ];
            }

            foreach ( $invoicer_data as $item ) {
                $resp[] = [
                    'tb' => 'invoicer',
                    'id' => $item['id'],
                    'name' => $item['name']
                ];
            }

            // 不为客户
            if ( ckAuth(false) ) {
                foreach ($customer_data as $item) {
                    $resp[] = [
                        'tb' => 'customer',
                        'id' => $item['id'],
                        'name' => $item['customername']
                    ];
                }
            }

            foreach ( $project_data as $item ) {
                $resp[] = [
                    'tb' => 'project',
                    'id' => $item['ID'],
                    'tp' => $item['isentrance'],
                    'name' => $item['BusinessID']
                ];
            }

            foreach ( $goods_data as $item ) {
                $resp[] = [
                    'tb' => 'project',
                    'id' => $item['id'],
                    'tp' => $item['isentrance'],
                    'name' => "报关商品: {$item['BusinessID']} {$item['model']} {$item['ProductChineseName']}"
                ];
            }

            foreach ( $vii_data as $item ) {
                $resp[] = [
                    'tb' => 'project',
                    'id' => $item['id'],
                    'tp' => $item['isentrance'],
                    'name' =>"开票信息: {$item['BusinessID']}  {$item['name']}  {$item['model']} {$item['name']}"
                ];
            }

            foreach ( $receipt_data as $item ) {
                $resp[] = [
                    'tb' => 'project',
                    'id' => $item['id'],
                    'tp' => $item['isentrance'],
                    'name' =>"收入情况: {$item['BusinessID']} {$item['payername']}"
                ];
            }

            foreach ( $payment_data as $item ) {
                $resp[] = [
                    'tb' => 'project', // receivername,bank,bankaccount
                    'id' => $item['id'],
                    'tp' => $item['isentrance'],
                    'name' =>"付款情况: {$item['BusinessID']} {$item['receivername']} {$item['bank']} {$item['bankaccount']}"
                ];
            }

            $data['data'] = $resp;
        }

        return $this->toJson($data);
    }
}
