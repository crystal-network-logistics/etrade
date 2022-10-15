<?php
namespace App\Controllers\Admin;

use App\Controllers\Base;
class Users extends Base
{
    protected $db;
    function __construct(){
        $this->db = new \App\Models\Admin\Users();
    }

    // 列表页
    public function index(){
        $this->actionAuth();
        return $this->display();
    }

    // 数据
    public function data_list(){
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'username,tel';

        $data = $this->db
            ->search($P)
            ->paginates($this->_page());

        return $this->toJson($data);
    }

    // 创建
    public function create(){
        $this->actionAuth(true);

        return $this->render();
    }

    // 编辑
    public function edit(){
        $this->actionAuth(true);
        if ( !$data =
            $this->db->where('id',$this->U('id'))->first()
        )
            exit('参数错误');
        $db = new \App\Models\Admin\UsersRoles();
        $ur_data = $db->select()->where('user_id',$this->U('id'))->findAll();
        $ids = [];
        foreach ( $ur_data as $item )
            $ids[] = $item['role_id'];
        $data->user_roles = join(',',$ids);

        return $this->render(['data'=>$data]);
    }

    // 保存
    public function save(){
        $this->actionAuth(true);
        $form = $this->U();
        $this->db->setValidationMessages($this->db->validationMessages);
        if( $this->db->save($form) ) {
            $db = new \App\Models\Admin\UsersRoles();
            $form["id"] = $form["id"]?$form["id"]:$this->db->getInsertID();
            // 保存用户角色
            $db->batch_save($form["id"] , $form["roles"]);
            return $this->toJson('已保存');
        }
        return $this->setError($this->db->errors());
    }

    // 删除
    public function delete(){
        $this->actionAuth(true);
        if( $this->db->delete($this->U('id')) )
            return $this->toJson('已删除');
        return $this->setError('删除失败');
    }

    // 密码重置
    public function spasswd(){
        $this->actionAuth(true);
        $v = $this->U('value');
        if ( $data = $this->db->where('id',$this->U('id'))->first()) {
            $data->password = $v;
            if($this->db->save($data))
                return $this->toJson('密码已重置为:'.$v);
        }
        return $this->setError('重置失败');
    }

    // 设置启用/禁用
    public function disabled_enabled(){
        $this->actionAuth(true);
        if ( $data = $this->db->where('id',$this->U('id'))->first()) {
            if($this->db->where('id',$data->id)->set('status',$data->status?0:1)->update())
                return $this->toJson("已设置");
        }
        return $this->setError("设置错误!");
    }

    // 修改密码
    public function passwd(){
        $this->actionAuth();

        return $this->render();
    }

    // 重置密码
    public function setpasswd(){
        $this->actionAuth();
        $U = $this->U();
        if( session('id') == 0 ) return $this->setError('系统管理改不了密码');
        $model = $this->db->find(session('id'));
        if(md5($U['o'])  != $model->password)
            return $this->setError('原密码不正确');

        if($U['n'] != $U['r'])
            return $this->setError('原密码不正确');
        if( $this->db->save(['id'=>session('id'),'password'=>$U['n']]) ){
            return $this->toJson('密码已设置!');
        }
        return $this->setError('密码设置失败');
    }
}
