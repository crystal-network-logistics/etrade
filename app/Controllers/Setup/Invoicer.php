<?php
namespace App\Controllers\Setup;
use App\Controllers\Base;

class Invoicer extends Base
{
    protected $db;
    function __construct() {
        $this->db = new \App\Models\Setup\Invoicer();
    }
    // 列表页面
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
        $P['searchField'] = 'name,taxpayerid,bank,account';
        $argc = $P;
        // 审核通过
        $argc['status'] = 3;
        $status_a = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        // 审核中
        $argc['status'] = 1;
        $status_b = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        // 拒绝
        $argc['status'] = 2;
        $status_c = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        // 草稿箱
        $argc['status'] = 0;
        $status_d = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

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
        $data['statusD'] = $status_d;

        return $this->toJson($data);
    }

    // 新增
    public function create(){
        $this->actionAuth(true);
        return $this->render(
            ['view_path' => '/Setup/Invoicer/form']
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
            ['view_path' => '/Setup/Invoicer/form','data' => $data]
        );
    }

    // 复制商品
    public function copy(){
        $this->actionAuth(true);
        $form = $this->U();
        if (!$model = $this->ck_auth_data( $this->db , $form))
            exit('参数错误');
        $model['id'] = 0;
        $model['status'] = 1;
        $model['products'] = '';$model['rejectreason'] = '';

        $data['detail'] = $model;

        return $this->render(
            ['view_path' => '/Setup/Invoicer/form','data' => $data]
        );
    }


    // 详情
    public function detail(){
        $this->actionAuth(true);
        if (!$model = $this->ck_auth_data( $this->db , $form = $this->U() )) exit('参数错误');

        $db = new \App\Models\Setup\Products();

        $product_data = $db->select('name,hscode')->distinct()->where('invoicerid', $this->U("id") )->findAll();
        $model['products'] = $product_data;

        if ( $model['customerid'] ) {
            $customer_data = $db->from('customer',true)->where('id',$model['customerid'])->first();
            $model['customername'] = $customer_data ? $customer_data['customername'] : '--';
        }

        // 删除通知
        delete_notify($model['id'],['TOPIC_REJECTED_INVOICER','TOPIC_APPROVED_INVOICER'],session('id'),0);

        $data['detail'] = $model;
        return $this->render(
            ['view_path' => '/Setup/Invoicer/detail','data' => $data]
        );
    }

    // 保存
    public function save(){
        $this->actionAuth(true);
        $form = $this->U();
        $form['status'] = 1;
        return $this->_save($form);
    }

    // 草稿箱
    public function draft(){
        $this->actionAuth();
        $form = $this->U();
        $form['status'] = 0;
        return $this->_save($form);
    }

    // 保存操作
    private function _save( $form ){
        $products = $form['products'];
        // 上传的文件
        $form['files'] = $form['files'] ? join(',',$form['files']) : '';
        // 产品
        $form['products'] = $products ? join(',',$products) : '';
        if( $this->db->save($form) ) {
            $text = $form['status'] == 3 ? ('审核通过') : '保存成功';
            $form['id'] = $form['id'] ? $form['id'] : $this->db->getInsertID();
            // 更新产品中开票人ID
            if ( $products ) {
                $db = new \App\Models\Setup\Products();
                $db->set('invoicerid',$form['id'])->whereIn('id',$products)->update();
            }
            return $this->toJson($text);
        }
        return $this->setError($this->db->errors());
    }
    // 选择开票人
    public function choice(){
        $this->actionAuth();
        $data['cid'] = $this->U('cid');
        return $this->render([
            'data' => $data
        ]);
    }

    // 删除
    public function delete(){
        $this->actionAuth(true);
        if ( !$model = $this->ck_auth_data( $this->db , $this->U()) ) exit('删除失败,参数错误');
        $products = $model['products'];
        if( $this->db->delete($this->U('id')) ) {
            // 更新 开票人产品
            if ( $products ) {
                $db = new \App\Models\Setup\Products();
                $db->set('invoicerid',0)->whereIn('id',explode(',',$products))->update();
            }

            delete_notify($model['id'],['TOPIC_APPROVE_INVOICER', 'TOPIC_REJECTED_INVOICER', 'TOPIC_APPROVED_INVOICER']);

            return $this->toJson('已删除');
        }
        return $this->setError('删除失败');
    }

    // 拒绝通过
    public function refuse(){
        $this->actionAuth(true);
        if ( !$model = $this->ck_auth_data( $this->db , $this->U()) ) exit('操作失败,参数错误');
        if ($this->db->set('status',2)->where('id',$model['id'])->update())
            return $this->toJson('操作成功!');
        return $this->setError('操作失败');
    }

    // 审核通过
    public function approve(){
        $this->actionAuth(true);
        if ( !$model = $this->ck_auth_data( $this->db , $this->U()) ) exit('操作失败,参数错误');

        if ( $this->db->set('status',3)->update($model['id']) )
            return $this->toJson('操作成功!');

        return $this->setError('操作失败');
    }

    // 更新字段值
    public function update( $filed = '' ){
        $this->actionAuth(true);
        // 更新
        if ( $filed && $data = $this->db->where('id',$this->U('id'))->first() ) {
            // 更新
            if ( $this->db->set($filed,$this->U('value'))->where('id',$data['id'])->update() ) {
                return $this->toJson('已更新,请关闭本窗口再打开!');
            }
        }
        return $this->setError('更新失败');
    }
}
