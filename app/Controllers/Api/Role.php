<?php
namespace App\Controllers\Api;

use App\Controllers\Base;
use PHP_CodeSniffer\Generators\HTML;

class Role extends Basic
{
    private $db;

    function __construct() {
        $this->db = new \App\Models\Admin\Roles();
    }

    // 获取角色数据
    public function get_data(){
        // 验签
        if( ($R = $this->signature( $P = $this->U() ,false)) != 10000 ){
            return $this->setError($this->filed[$R]);
        }
        $P['searchField'] = 'name,code,remark';

        $data = $this->db
            ->search($P)
            //->where('creatorId',session('id'))
            ->page( $this->_page() );

        return $this->toJson($data);
    }
}
