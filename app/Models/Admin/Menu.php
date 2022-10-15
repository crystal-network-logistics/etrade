<?php namespace App\Models\Admin;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Menu extends \App\Models\BaseModel{
    protected $table = 'admin_menu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['code','title','parentid','icon','target','url','status','sort','remark','hidden'];
    protected $returnType = 'App\Entities\Forms';

    protected $beforeUpdate = ['action_before'];
    protected $beforeInsert = ['action_before'];
    protected $afterDelete = ['after_delete'];

    protected function after_delete($data){
        if( $data['id'][0] ) {
            // 删除功能 操作
            $this->from('admin_operation',true)->where('menuid',$data['id'][0])->delete();
            // 删除权限 操作
            $this->from('admin_power',true)->where('menu_id',$data['id'][0])->delete();
        }
        return $data;
    }

    protected function action_before(array $array){
        $max = $this->selectMax('sort')->where('parentid',$array['data']['parentid'])->asArray()->first();
        if( !$array['id'] || !$array['data']['sort'] ) {
            $array['data']['sort'] = ( $max['sort'] ? ( intval( $max['sort'] ) + 1 ) : 1 );
        }
        return $array;
    }

}
