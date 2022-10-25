<?php
namespace App\Controllers\Admin;

use App\Controllers\Base;
use App\Libraries\LibMenu;
use phpDocumentor\Reflection\Types\This;

class Powers extends Base
{
    function __construct(){
    }

    public function index(){
        $this->actionAuth(true);
        return $this->display();
    }
    // 获取角色功能操作
    public function roles_actions(){
        $this->actionAuth(true);
        $db = new \App\Models\Admin\Powers();
        $U = $this->U();
        $data = $db->select('operation_id as actionId')->where('role_id',$U['R'])->findAll();
        return $this->toJson(['data'=>$data]);
    }
    // 设置功能操作
    public function set_actions(){
        $this->actionAuth(true );
        $pw = new \App\Models\Admin\Powers();
        $role = new \App\Models\Admin\Roles();
        $U = $this->U();
        
        if ( !$role->where('creatorId',session('id'))->first() ) return $this->setError('设置权限失败,没有相应角色信息');
        
        if ( $pw->where($U)->first() ){
            $pw->where($U)->delete();
        }else{
            $pw->save($U);
        }
        return $this->toJson('设置成功');
    }
}