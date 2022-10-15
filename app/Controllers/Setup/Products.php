<?php
namespace App\Controllers\Setup;
use App\Controllers\Base;

class Products extends Base
{
    protected $db;
    function __construct() {
        $this->db = new \App\Models\Setup\Products();
    }

    // 列表页
    public function index(){
        $this->actionAuth(true);
        return $this->display();
    }

    // 数据
    public function page(){
        $this->actionAuth();
        $db = new \App\Models\Form();
        $P = $this->U();
        $P['isentrance'] = $P['isentrance']??0;
        $P['searchField'] = 'name,model,brand,englishname,productid';
        $argc = $P;

        // 审核通过
        $argc['status'] = 3;
        $status_a = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        // 审核中
        $argc['status'] = 1;
        $status_b = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        // 待确认
        $argc['status'] = 2;
        $status_c = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        // 待补充材料
        $argc['status'] = 4;
        $status_d = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        // 草稿箱
        $argc['status'] = 0;
        $status_e = $this->db->whereAuth('customerid')->search($argc)->countAllResults();

        $data = $this->db
            ->asObject()
            ->search($P)
            ->whereAuth('customerid')
            ->orderBy('createtime','desc')
            ->RPaging( $this->_page() ,$this->_size());

        foreach ( $data['data'] as $row ) {
            unset($row->supelement);
            $customer_data = $db->from('customer',true)->where('id',$row->customerid)->first();
            $invoicer_data = $db->from('invoicer',true)->where('id',$row->invoicerid)->first();
            $row->invoicer = $invoicer_data ? $invoicer_data['name'] : '';
            $row->customer = $customer_data ? $customer_data['customername']:'';
        }

        $data['statusA'] = $status_a;
        $data['statusB'] = $status_b;
        $data['statusC'] = $status_c;
        $data['statusD'] = $status_d;
        $data['statusE'] = $status_e;

        return $this->toJson($data);
    }

    // 创建
    public function create(){
        $this->actionAuth(true);
        return $this->display([
            'view_path' => '/Setup/Products/form'
        ]);
    }

    // 编辑
    public function edit(){
        $this->actionAuth(true);
        if ( !$model = $this->ck_auth_data( $this->db , $this->U() ) ) exit('删除失败,参数错误');

        $model['supelement'] = $model['supelement'] ? json_decode($model['supelement']) : [];
        $data['detail'] = $model;
        return $this->display([
            'view_path' => '/Setup/Products/form',
            'data'=>$data
        ]);
    }

    // 详情
    public function detail(){
        $this->actionAuth(true);
        $db = new \App\Models\Setup\Customer();
        if ( !$model = $this->ck_auth_data( $this->db , $this->U() ) ) exit('查看失败,请检查参数是否正确');

        $customer_data = $db->where('id',$model['customerid'])->first();
        $invoicer_data = $db->from('invoicer',true)->where('id',$model["invoicerid"])->first();
        $hs_data = $db->from('hscode',true)->where('code',$model['hscode'])->first();

        $model['customer'] = $customer_data ? $customer_data['customername'] : '';

        $model['supelement'] = $model['supelement'] ? json_decode($model['supelement']) : [];
        $model['hs'] = $hs_data;
        $model['invoicer'] = $invoicer_data ? $invoicer_data['name'] : '';
        $data['detail'] = $model;
        //删除通知
        delete_notify($model['id'],['TOPIC_APPROVED_PRODUCT'],session('id'),0);
        return $this->render([
            'data'=>$data
        ]);
    }

    private function _save_form( $form ){
        // 上传的文件
        $form['files'] = $form['files'] ? join(',',$form['files']) : '';
        // 要素
        $super_elements = [];
        // 要素Key
        $super_elements_key = $form['supelementlabel'];
        // 要素value
        $super_elements_value = $form['supelement'];
        // 客户Id
        $form['customerid'] = ckAuth() ? session('custId') : $form['customerid'];

        if ($super_elements_key) foreach ($super_elements_key as $k => $v) $super_elements[] = [$v => $super_elements_value[$k]];
        // 保存JSON
        $form['supelement'] = json_encode($super_elements);

        // 退税率
        if ( $form['hscode'] ) {
            $db = new \App\Models\Setup\Hscode();
            $hs_data = $db->where('code',$form['hscode'])->first();
            $form['taxreturnrate'] = $hs_data ? $hs_data['taxreturnrate'] : 0.13;
        }

        if( $this->db->save($form) ) {
            $text = $form['status'] == 3 ? ('审核通过') : '保存成功';
            return $this->toJson($text);
        }
        return $this->setError($this->db->errors());
    }

    // 保存
    public function submits( $type = '' ){
        $this->actionAuth(true);
        $form = $this->U();
        return $this->_save_form($form);
    }

    // 审核
    public function approve(){
        $this->actionAuth(true);
        if ( ckAuth() ) return $this->setError('授权失败!');
        $form = $this->U();
        $form['status'] = 3;

        return $this->_save_form($form);
    }

    // 确认
    public function confirm( $v = '' ){
        $this->actionAuth(true,'setup/products/confirm');
        $form = $this->U();
        if ( !$model = $this->ck_auth_data( $this->db , $form) ) exit('确认失败,参数错误');

        if ( $form['value'] )
            $model['reason'] = $form['value'] ?? '';

        if ( $model['status'] != 3) {
            if ($v) $model['status'] = 2;
            else $model['status'] = 3;
        }

        if ( $this->db->save( $model ) ) {
            return $this->toJson('确认成功');
        }

        return $this->setError('确认失败');
    }

    // 请客户补充
    public function tosuplemt(){
        $this->actionAuth(true);
        $form = $this->U();
        if ( !($model = $this->ck_auth_data( $this->db , $form)) || ckAuth() ) exit('操作失败,参数错误');

        $model['status'] = 4;
        $model['reason'] = $form['value'];
        if ( $this->db->save( $model ) ) {
            return $this->toJson('保存成功');
        }
        return $this->setError('保存失败');
    }

    // 删除
    public function delete(){
        $this->actionAuth(true);
        if ( !$this->ck_auth_data( $this->db , $this->U()) ) exit('删除失败,参数错误');

        if( $this->db->delete($this->U('id')) ) {

            return $this->toJson('已删除');
        }
        return $this->setError('删除失败');
    }

    // 商品下架
    public function off_shelves(){
        $this->actionAuth(true);
        if ( !$data = $this->ck_auth_data( $this->db , $this->U()) ) exit('参数错误');

        $data['status'] = 0;
        if ( $this->db->save( $data ) )
            return $this->toJson('操作成功 , 商品已下架');
        return $this->setError('操作失败');
    }

    // copy 复制
    public function copy(){
        $this->actionAuth(true);
        if ( !$model = $this->ck_auth_data( $this->db , $this->U()) ) exit('参数错误');

        $model['supelement'] = $model['supelement'] ? json_decode($model['supelement']) : [];
        $model['status'] = 0;
        unset( $model['id'] );

        $data['detail'] = $model;
        return $this->display([
            'view_path' => '/Setup/Products/form',
            'data'=>$data
        ]);
    }

    // 绑定开票人
    public function bind_invoicer(){
        $this->actionAuth(true);
        $form = $this->U();
        //
        if ( !$model = $this->ck_auth_data( $this->db ,$form ) )
            exit('参数错误');

        if ( $this->db->set('invoicerid',$form['invoicerid'])->where('id',$form['id'])->update() ) {
            $db = new \App\Models\Setup\Invoicer();
            $invoice_data = $db->where('id',$form['invoicerid'])->first();
            if ( $invoice_data ) {
                $products = explode(',',$invoice_data['products']);
                array_push($products,$form['invoicerid']);
                $products = array_unique($products);
                // 更新 开票人产品信息
                $db->set('products',$products ? join(',',$products) : '')->where('id',$form['invoicerid'])->update();
            }
            return $this->toJson('绑定成功');
        }
        return $this->setError('操作失败');
    }

    // 选择报关产品 弹出窗
    public function selected(){
        $this->actionAuth();
        $data = $this->U();
        return $this->render(
            ['data' => $data]
        );
    }

    // 选择商品元素
    public function get_choice_data(){
        $this->actionAuth();
        $db = new \App\Models\Setup\Invoicer();
        $form = $this->U();
        $ids = $form['ids'];
        $data['currency'] = $form['currency'];
        $data['isentrance'] = $form['isentrance']??0;
        $query = [];
        if ( $ids ) $query = $this->db->select('*,id as pid')->whereIn('id',$ids)->findAll();
        $elements = '';

        foreach ( $query as $item ) {
            $invoice_data = $db->where('id',$item['invoicerid'])->first();
            $item['invoicer'] = $invoice_data ? $invoice_data['name'] : '';
            $data['item'] = $item;
            $elements .= view('/Declares/Goods/items',['data'=>$data]);
        }
        return $elements;
    }

    // 元素详情
    public function elements_detail(){
        $this->actionAuth();
        $id = $this->U('id');
        if ( !$model = $this->db->where('id',$id)->first() )
            exit('参数错误 !');
        $data['detail'] = $model;
        return $this->render([
            'data' => $data
        ]);
    }

    // 根据开票人获取产品
    public function get_data_by_invoicer(){
        $this->actionAuth();
        $form = $this->U();
        $form['isentrance'] = 0 ;
        $form['status'] = 3 ;
        if ( ckAuth() ) {
            $form['customerid'] = session('custId');
        }
        $sql = "invoicerid = 0 or invoicerid is null";
        if ( $form['products'] ) {
            $products = $form['products'];
            $sql .= " or id in ( $products )";
        }
        $data = $this->db->search( $form )->where("($sql)")->findAll();
        return $this->toJson(['data'=>$data]);
    }

    // 创建进口商品
    public function isentrance(){
        $this->actionAuth();
        if ( $this->request->getMethod() == 'post' ) {
            $form = $this->U(); $hs = new \App\Models\Setup\Hscode();
            if ( $form['hscode'] && $data = $hs->where('code',$form['hscode'])->first() ) {
                $form['customsupervision'] = $data['customsupervision'];
                $form['officialunit'] = $data['officialunit1'];
                $form['taxreturnrate'] = $data['taxreturnrate'];
            }
            return $this->_save_form( $form );
        }

        $data['detail'] = $this->U();
        return $this->render(
            ['view_path' => '/Setup/Products/im','data' => $data]
        );
    }
}
