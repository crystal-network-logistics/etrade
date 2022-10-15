<?php
namespace App\Controllers\Api;

use App\Controllers\Base;
class User extends Basic {
    protected $db;

    function __construct() {
        $this->db = new \App\Models\Admin\Users();
    }
    
    // 获取用户信息
    public function get_user_info(){
        // 验签
        if( ($R = $this->signature( $P = $this->U() ,false)) != 10000 ){
            return $this->setError($this->filed[$R]);
        }
        $resp['data']['userInfo'] = [];
        $data = $this->ckAuthoriztion();
        if ( $data['code'] ) {
            $resp['data']['userInfo'] = $data['data'];
        }
        return $this->toJson($resp);
    }
}
