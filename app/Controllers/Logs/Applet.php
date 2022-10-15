<?php
namespace App\Controllers\Logs;
use App\Controllers\Base;
use App\Models\Logs\AppletLogin;

class Applet extends Base {
    protected $db;
    function __construct() {
        $this->db = new AppletLogin();
    }

    public function index(){
        $this->actionAuth();
        return $this->display();
    }

    // 分页数据
    public function page(){
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'name';
        $data = $this->db->search($P)->paginates($this->_page());
        return $this->toJson($data);
    }
}
