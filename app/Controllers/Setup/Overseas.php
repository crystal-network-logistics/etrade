<?php
namespace App\Controllers\Setup;
use App\Controllers\Base;

class Overseas extends Base
{
    protected $db;
    function __construct() {
        $this->db = new \App\Models\Setup\Overseas();
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
        //$P['isentrance'] = 0;
        $P['searchField'] = 'companyname,address,contractor,phone';
        $argc = $P;
        // 境外贸易商
        $argc['type'] = 0;
        $status_a = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        // 境内收货人
        $argc['type'] = 1;
        $status_b = $this->db->whereAuth('customerid')->search($argc)->countAllResults();


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

        return $this->toJson($data);
    }

    public function create(){
        $this->actionAuth(true);
        return $this->render(
            ['view_path' => '/Setup/Overseas/form']
        );
    }

    public function add(){
        $this->actionAuth();
        $data['detail']['cid'] = ckAuth() ? session('custId') :($this->U('cid'));
        $data['detail']['type'] = ($this->U('type'));
        return $this->render(
            ['data' => $data]
        );
    }


    public function edit(){
        $this->actionAuth(true);
        $form = $this->U();
        if (!$model = $this->ck_auth_data( $this->db , $form))
            exit('参数错误');

        $data['detail'] = $model;

        return $this->render(
            ['view_path' => '/Setup/Overseas/form','data' => $data]
        );
    }

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
            ['view_path' => '/Setup/Overseas/detail','data' => $data]
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
        $P = $this->U();
        if ( $data = $this->db->where('companyname',$P['companyname'])->first() ) {
            $P['id'] = $data['id'];
        }
        if( $this->db->save($P) ) {
            return $this->toJson('保存成功');
        }
        return $this->setError($this->db->errors());
    }

    public function get_data(){
        $this->actionAuth();
        $customerId = ckAuth() ? session('custId') : $this->U('customerid');
        $data = $this->db->where(['customerid'=>$customerId,'type'=>$this->U('type')])->orderBy('id','desc')->findAll();
        return $this->toJson(['data' =>$data]);
    }
}
