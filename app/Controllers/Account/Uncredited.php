<?php
namespace App\Controllers\Account;

use App\Controllers\Base;
use App\Libraries\LibComp;
use CodeIgniter\Database\BaseBuilder;

class Uncredited extends Base
{
    protected $db;

    function __construct() {
        $this->db = new \App\Models\Admin\Users();
    }

    function index(){
        $this->actionAuth(true );
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
            ->where(" ( ifnull(companyid,0) = 0 and ifnull(customerid,0)=0 ) ")
            ->orderBy('createtime','desc')
            ->paginates( $this->_page() );

        return $this->toJson($data);
    }

    // 保存
    public function save(){
        $this->actionAuth();
        $form = $this->U();

        if ( $form["role"]) {
            $db = new \App\Models\Admin\Roles();
            if( $role_data = $db->asArray()->where('id',$form['role'])->first() ) {
                $form['power'] = $role_data['code'];
                $form['type'] = ( $form['power'] == 'customer' ) ? 'customer' : 'ent';
            }
        }

        $this->db->setValidationMessages($this->db->validationMessages);
        if( $this->db->save($form) ) {
            $db = new \App\Models\Admin\UsersRoles();
            $form["id"] = $form["id"]?$form["id"]:$this->db->getInsertID();
            // 保存用户角色
            $db->batch_save($form["id"] , [$form["role"]]);
            return $this->toJson('已保存');
        }
        return $this->setError($this->db->errors());
    }

    // 编辑
    public function edit(){
        $this->actionAuth(true);
        if ( !$model = $this->db->asArray()->where('id',$this->U('id'))->first())
            exit('参数错误');

        $data['detail'] = $model;
        return $this->render([
            'view_path' => '/Account/Uncredited/form',
            'data'=>$data
        ]);
    }
}
