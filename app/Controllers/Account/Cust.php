<?php
namespace App\Controllers\Account;

use App\Controllers\Base;
use CodeIgniter\Database\BaseBuilder;

class Cust extends Base
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
    public function page(){
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'username,tel,email,realname';

        $data = $this->db
            ->asObject()
            ->search($P)
            ->whereAuth('customerid')
            ->whereNotIn('type',['ent','work'])
            ->orderBy('createtime','desc')
            ->paginates( $this->_page() );
        $db = new \App\Models\Form();

        foreach ( $data['data'] as $item ) {
            $this->session->set('Uid',$item->id);
            $role_data = $db->from('admin_roles',true)->whereIn('id',function ( BaseBuilder $builder) {
                return $builder->select('role_id')->from('admin_users_role',true)->where('user_id',session("Uid"));
            })->findAll();
            $this->session->remove('Uid');
            $arr = [];
            foreach ( $role_data as $row ) {
                $arr[] = $row['name'];
            }
            $item->role = join(',',$arr);

            // 公司信息
            $company_data = $db->from('company',true)->where('id',$item->companyid)->first();
            $item->company = $company_data ? $company_data['name'] : '';

            // 客户信息
            $customer_data = $db->from('customer',true)->where('id',$item->customerid)->first();
            $item->customer = $customer_data? $customer_data['customername'] : '';
        }

        return $this->toJson($data);
    }

    // 创建
    public function create(){
        $this->actionAuth(true);
        return $this->render([
            'view_path' => '/Account/Cust/form'
        ]);
    }

    // 编辑
    public function edit(){
        $this->actionAuth(true);
        if ( !$model =
            $this->db->asArray()->where('id',$this->U('id'))->first()
        )
            exit('参数错误');
        $db = new \App\Models\Admin\UsersRoles();

        $ur_data = $db->where('user_id',$this->U('id'))->first();
        $model['roleId'] = $ur_data ? $ur_data['role_id'] : 0;

        $data['detail'] = $model;
        return $this->render([
            'view_path' => '/Account/Cust/form',
            'data'=>$data
        ]);
    }

    // 保存
    public function save(){
        $this->actionAuth(true);
        $form = $this->U();
        $form['type'] = 'customer'; $form['power'] = 'customer';
        $this->db->setValidationMessages($this->db->validationMessages);
        if( $this->db->save($form) ) {
            $db = new \App\Models\Admin\UsersRoles();
            $form["id"] = $form["id"]?$form["id"]:$this->db->getInsertID();
            $role_data = $this->db->asArray()->from('admin_roles',true)->where('code','customer')->first();
            // 保存用户角色
            $db->batch_save($form["id"] , [$role_data ? $role_data['id'] : 0]);
            // 返回消息
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

    // 帐户激活
    public function active(){
        $this->actionAuth(true);

        if ( $data = $this->db->where(['id'=>$this->U('id'),'activated'=>0])->first()) {
            if($this->db->where('id',$data->id)->set('activated',1)->update())
                return $this->toJson("已激活成功");
        }
        return $this->setError("激活失败");
    }
}
