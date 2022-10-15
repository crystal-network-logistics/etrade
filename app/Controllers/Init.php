<?php
namespace App\Controllers;
use App\Controllers\Base;
use App\Services\comm;
// 初始化数据
class Init extends Base {
    function __construct(){
    }

    //
    public function run( $run_type = 'users' ){
        if ( $run_type == 'users' )
            $this->_admin_users();

        if ( $run_type == 'products' )
            $this->_products();

        if ( $run_type == 'goods' )
            $this->_goods();
    }

    // 初始化用户信息
    private function _admin_users(){
        $db = new \App\Models\Form();
        $user_db = new \App\Models\Admin\Users();
        $user_role_db = new \App\Models\Admin\UsersRoles();
        $role_db = new \App\Models\Admin\Roles();

        // 保存客户信息
        /**/
        $role_data = $role_db->asArray()->where('code','customer')->first();
        $cus_users_data = $user_db->asArray()->where('type','customer')->findAll();

        // 修改客户用户信息
        foreach ( $cus_users_data as $item ) {
            if ( !$user_role_db->where(['user_id'=>$item['id'] , 'role_id' => $role_data['id']])->first() ) {
                $user_role_db->save(['user_id'=>$item['id'] , 'role_id' => $role_data['id']]);
            }
            $item['power'] = 'customer';
            $user_db->set('power','customer')->where('id',$item['id'])->update();
        }

        //
        $ent_data = $user_db->asArray()->where('type','ent')->findAll();
        //
        foreach ( $ent_data as $item ) {
            $power = '';
            $role_data = $db->select('a.userid,a.roleid,b.role_code as code,b.role_name')
                    ->from('sys_userroles as a',true)
                    ->join('sys_roles as b','a.roleid=b.id')
                    ->where('a.userid',$item['id'])
                    ->findAll();

            // 获取
            foreach ( $role_data as $row ) {
                $rd = $role_db->asArray()->where('code',$row['code'])->first();
                if ( !$user_role_db->where(['user_id'=>$item['id'] , 'role_id' => $rd['id'] ])->first() ) {
                    $user_role_db->save( ['user_id'=>$item['id'] , 'role_id' => $rd['id'] ]);
                }
                if ( !$power ) $power = $row['code'];
            }

            $item['power'] = $power;
            $user_db->save($item);
        }

        // 更新操作员
        $operator_db = new \App\Models\Setup\Operator();
        $operator_data = $operator_db->distinct()->select('userid')->findAll();

        foreach ( $operator_data as $row ) {
            $user_db->set('power','operator')->where('id',$row['userid'])->update();
        }
    }

    // 产品
    private function _products(){
        $product_db = new \App\Models\Setup\Products();
        $product_data = $product_db->findAll();
        foreach ( $product_data as $row ) {
            $supeelements = [];
            for ( $i = 1; $i < 20; $i++ ) {
                if ( $row["supelementlabel{$i}"] ) {
                    $v = $row["supelement{$i}"];
                    $supeelements[] = [
                        $row["supelementlabel{$i}"] => $v?:""
                    ];
                }
            }
            $row['supelement'] = json_encode($supeelements);
            $product_db->save($row);
        }
    }

    // 报关产品
    private function _goods(){
        $goods_db = new \App\Models\Declares\Goods();
        $goods_data = $goods_db->findAll();

        foreach ( $goods_data as $row ) {
            $supeelements = [];
            for ( $i = 1; $i < 20; $i++ ) {
                if ( $row["supelementlabel{$i}"] ) {
                    $v = $row["supelement{$i}"];
                    $supeelements[] = [
                        $row["supelementlabel{$i}"] => $v?:''
                    ];
                }
            }
            $row['supelement'] = json_encode($supeelements);
            $goods_db->save($row);
        }
    }
}
