<?php namespace App\Models\Admin;

use CodeIgniter\Model;

class Users extends \App\Models\BaseModel {
    protected $table = 'admin_users';
    protected $primaryKey = 'id';
    protected $allowedFields = [ 'username', 'token', 'password', 'status', 'realname', 'email', 'type', 'tel', 'qq', 'customerid', 'companyname', 'products','phone', 'percentage', 'createtime', 'type', 'openid', 'nickname', 'avatarUrl', 'province', 'city', 'activation_token', 'companyid', 'activated', 'source', 'login_lasttime', 'last_ip', 'comment','remark','power','post'];

    protected $validationRules = [
        'username'     => 'is_unique[admin_users.username,id,{id}]',
        'tel'     => 'is_unique[admin_users.username,id,{id}]|min_length[11]',
        'email'     => 'is_unique[admin_users.email,id,{id}]',
    ];

    protected $validationMessages =[
        'username'=>[
            'is_unique'     => '用户名已存在'
        ],
        'tel'=>[
            'is_unique'     => '手机号已存在',
            'min_length'    => '手机号长度不够'
        ],
        'email'=>[
            'is_unique'     => '邮箱已存在',
        ]
    ];

    protected $returnType    = 'App\Entities\Forms';
    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];

    protected $afterUpdate = ['data_after'];
    protected $afterInsert = ['data_after'];

    protected $afterDelete = ['after_delete'];

    // 保存前操作
    protected function data_before(array $array){
        if( isset($array['data']['password']) ) $array['data']['password'] = md5($array['data']['password']);
        if ( session('power') != 'all' && session('power') && isset($array['data']['username']) ) $array['data']['companyid'] = session('company');
        return $array;
    } 

    protected function after_delete(array $array){
        $id = $array['id'][0];
        if( $id ) {
            // 删除角色
            $this->from('admin_role', true)->where('creatorId', $id)->delete($id);
            // 删除用户角色
            $this->from('admin_users_role', true)->where('user_id', $id)->delete();
        }
        return $array;
    }

    protected function data_after(array $array) {
        $data = $array['data'];
        // 注册通知
        if(array_key_exists('source',$data) && $data['source'] == 'WEB' && $data['status'] == 1 && $data['activated'] == 0){
            notice_add('TOPIC_NEW_USR',$array['id'][0],'users','/notices/user',1);
        }
        return $array;
    }
}
