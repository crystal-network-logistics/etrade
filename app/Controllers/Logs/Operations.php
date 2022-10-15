<?php
namespace App\Controllers\Logs;
use App\Controllers\Base;
use App\Models\Admin\OperationsLog;

class Operations extends Base {
    protected $db;
    function __construct() {
        $this->db = new OperationsLog();
    }

    public function index(){
        $this->actionAuth();
        return $this->display();
    }

    // 分页数据
    public function page(){
        $this->actionAuth();
        $db = $this->db;
        $P = $this->U();
        $P['searchField'] = 'username,controller,uri';

        if( session('id') )$db->where('userid',session('id'));
        $data = $db
            ->search($P)
            ->orderBy('createtime','desc')
            ->paginates($this->_page());

        return $this->toJson($data);
    }
}
