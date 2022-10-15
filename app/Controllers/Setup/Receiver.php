<?php
namespace App\Controllers\Setup;
use App\Controllers\Base;

class Receiver extends Base
{
    protected $db;
    function __construct() {
        $this->db = new \App\Models\Setup\Receiver();
    }

    public function index(){
        $this->actionAuth(true);
        return $this->display();
    }

    // 数据
    public function page() {
        $this->actionAuth();
        $db = new \App\Models\Form();
        $P = $this->U();
        $P['isentrance'] = 0;
        $P['searchField'] = 'name,bank,account,currency';
        $argc = $P;
        // 开票人收款
        $argc['type'] = 1;
        $status_a = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        // 物流收款
        $argc['type'] = 2;
        $status_b = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        // 其它收款
        $argc['type'] = 3;
        $status_c = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        $data = $this->db
            ->asObject()
            ->search($P)
            ->whereAuth('customerid')
            ->orderBy('createtime','desc')
            ->RPaging( $this->_page() ,$this->_size());

        foreach ( $data['data'] as $row ) {
            $customer_data = $db->from('customer',true)->where('id',$row->customerid)->first();
            $row->customer = $customer_data ? $customer_data['customername']:'';
        }

        $data['statusA'] = $status_a;
        $data['statusB'] = $status_b;
        $data['statusC'] = $status_c;

        return $this->toJson($data);
    }

    // 新增
    public function create(){
        $this->actionAuth(true);
        return $this->render(
            ['view_path' => '/Setup/Receiver/form']
        );
    }

    // 编辑
    public function edit(){
        $this->actionAuth(true);
        $form = $this->U();
        if (!$model = $this->ck_auth_data( $this->db , $form))
            exit('参数错误');

        $data['detail'] = $model;

        return $this->render(
            ['view_path' => '/Setup/Receiver/form','data' => $data]
        );
    }

    // 详情
    public function detail(){
        $this->actionAuth(true);
        $form = $this->U();
        if (!$model = $this->ck_auth_data( $this->db , $form))
            exit('参数错误');
        $db = new \App\Models\Setup\Customer();

        if ( $model['customerid'] ) {
            $customer_data = $db->where('id',$model['customerid'])->first();
            $model['customername'] = $customer_data ? $customer_data['customername'] : '--';
        }

        $data['detail'] = $model;
        return $this->render(
            ['view_path' => '/Setup/Receiver/detail','data' => $data]
        );
    }

    // 删除
    public function delete(){
        $this->actionAuth(true);
        if ( !$model = $this->ck_auth_data( $this->db , $this->U()) ) exit('删除失败,参数错误');
        if( $this->db->delete($this->U('id')) ) {
            return $this->toJson('已删除');
        }
        return $this->setError('删除失败');
    }

    // 保存操作
    public function save(){
        $this->actionAuth();
        if( $this->db->save( $this->U()) ) {
            return $this->toJson('保存成功');
        }
        return $this->setError($this->db->errors());
    }

    //
    public function autocomplete_data(){
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'name,bank,account';
        $data['data'] = $this->db
            ->asObject()
            ->search($P)
            ->findAll();

        return $this->toJson($data) ;
    }
}
