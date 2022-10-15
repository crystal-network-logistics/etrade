<?php
namespace App\Controllers\Setup;
use App\Controllers\Base;

class Company extends Base
{
    protected $db;
    function __construct() {
        $this->db = new \App\Models\Setup\Company();
    }

    // 列表页
    public function index(){
        $this->actionAuth();
        return $this->display();
    }

    // 数据
    public function page(){
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'name,ename,shortname,code,address';

        $data = $this->db
            ->asObject()
            ->search($P)
            ->paginates( $this->_page() ,$this->_size());
        return $this->toJson($data);
    }

    // 创建
    public function create(){
        $this->actionAuth(true);
        return $this->render([
            'view_path' => '/Setup/Company/form'
        ]);
    }

    // 创建
    public function edit(){
        $this->actionAuth(true);
        if ( !$model =
            $this->db->asArray()->where('id',$this->U('id'))->first()
        )
            exit('参数错误');
        $data['detail'] = $model;
        return $this->render([
            'view_path' => '/Setup/Company/form',
            'data'=>$data
        ]);
    }

    // 保存
    public function save(){
        $this->actionAuth(true);
        $form = $this->U();
        $this->db->setValidationMessages($this->db->validationMessages);
        if( $this->db->save($form) ) {
            return $this->toJson('已保存');
        }
        return $this->setError($this->db->errors());
    }

    // 删除
    public function delete(){
        $this->actionAuth(true);
        $db = new \App\Models\Setup\Customer();

        if ($db->where('companyid',$this->request('id'))->first())
            return $this->setError('删除失败,该公司下还有相关的业务没有转移处理!');

        if( $this->db->delete($this->U('id')) )
            return $this->toJson('已删除');
        return $this->setError('删除失败');
    }

    // 详情
    public function detail(){
        $this->actionAuth();
        $data['detail'] = $this->db->where('id',session('company')?:1)->first();
        return $this->display([
            'view_path' => '/Setup/Company/detail',
            'data' => $data
        ]);
    }
    
    // 更新字段
    public function update( $field ){
        $this->actionAuth();
        $form = $this->U();
        $companyId = session('company')?:1;
        if ( $this->db->save(['id' => $companyId , $field => $form['value']]) ) {
            return $this->toJson('已保存!');
        }
        return $this->setError('保存失败!');
    }
}
