<?php
namespace App\Controllers\Logs;
use App\Controllers\Base;

class SysLogin extends Base {
    protected $db;

    function __construct() {
        $this->db = new \App\Models\Admin\LoginLogs();
    }

    public function index(){
        $this->actionAuth();
        return $this->display();
    }

    // 分页数据
    public function page(){
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'username';
        if( session('id') )$this->db->where('userId',session('id'));
        $data = $this->db->search($P)->orderBy('createtime','desc')->paginates($this->_page());
        return $this->toJson($data);
    }
}
