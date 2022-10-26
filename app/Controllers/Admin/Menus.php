<?php
namespace App\Controllers\Admin;

use App\Controllers\Base;
use App\Libraries\LibMenu;
use App\Services\comm;
use Config\Services;
use phpDocumentor\Reflection\Types\This;

class Menus extends Base {
    private $db;
    
    public function __construct(){
        $this->db = new \App\Models\Admin\Menu();
    }
    
    public function index() {
        $this->actionAuth(true);
        return $this->display();
    }

    // 数据列表
    public function data_list(){
        $this->actionAuth(true,'admin/menus/index');
        // 数据列表
        $data = $this->db
            ->where('parentid',0)
            ->orderBy('sort','asc')
            ->paginates($this->_page());
        $data['data'] = LibMenu:: build_tree_data( $data['data'] );
        return $this->toJson($data);
    }

    // 创建菜单
    public function create() {
        $this->actionAuth();

        return $this->render();
    }

    // 更新菜单信
    public function edit() {
        $this->actionAuth(true);
        if ( $data = $this->db->where('id',$this->U('id'))->first()) {
            $db = new \App\Models\Admin\Actions();
            $data->action = $db->where('menuid',$this->U('id'))->findAll();
            return $this->render(['data' => $data]);
        }
    }
    
    // 保存菜单
    public function save(){
        $this->actionAuth(true);
        $entity = new \App\Entities\Forms($this->U());

        if( $this->db->save( $entity ) ) {
            //log_message('error','OK');
            $db = new \App\Models\Admin\Actions();
            // 获取保存后菜单ID
            $entity->id = ($entity->id > 0) ? $entity->id : $this->db->getInsertID();
            // 批量保存菜单功能权限
            $db->batch_save($entity->id,$entity->action);
            // 保存成功
            return $this->toJson('保存成功');
        }

        return $this->setError($this->db->errors() ??'保存失败');
    }
    
    // 生成 功能操作
    public function action(){
        $this->actionAuth(true);
        return $this->render();
    }

    // 删除 功能操作
    public function delaction(){
        $this->actionAuth(true);
        $db = new \App\Models\Admin\Actions();
        if ($db->delete($this->U('id'))) {
            return $this->toJson('已经删除!');
        }
        return $this->setError('删除失败');
    }
    // 删除菜单
    public function delete(){
        $this->actionAuth(true);
        $db = $this->db;
        if ($db->delete($this->U('id'))) {
            return $this->toJson('已经删除!');
        }
        return $this->setError('删除失败');
    }
    
    // 自动获取 controller 方法
    public function get_controller_action(){
        $this->actionAuth();
        $controller = $this->request('controller');
        $className = 'App\Controllers'.'\\'.$controller;
        $a = new \ReflectionClass($className);
        $b = $a->getMethods();
        $views = '';
        foreach ($b as $item){
            if($item->class == $className && $item->isPublic())
                $views .= view('/Admin/Menus/action',
                    ['model'=>
                        (object)[
                            'id'=>'',
                            'name'=>'',
                            'code'=>$item->name,
                            'uri'=>(str_replace('\\','/',$controller).'/'.$item->name)]
                    ]);
        }
        return $views;
    }

    public function test(){
        $routes = Services::router();
        $c = $routes->controllerName();
        $controller = (substr($c,strripos($c,'\\')+1,strlen($c)));
        $method = ($routes->methodName());
        $URI = new \CodeIgniter\HTTP\URI(current_url(true));
        echo substr($URI->getPath(),1);
    }

    
}