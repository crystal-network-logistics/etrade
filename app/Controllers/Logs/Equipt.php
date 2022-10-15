<?php
namespace App\Controllers\Logs;
use App\Controllers\Base;
use App\Models\Logs\EquiptConn;

class Equipt extends Base {
    protected $db;
    function __construct() {
        $this->db = new EquiptConn();
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
        $P['searchField'] = 'a.equipment_no,b.name';

        $data = $db
            ->select($db->table . '.*,b.name as equipt_name,c.name as location_name')
            ->join('st_equipments as b',$db->table .'.equipment_no = b.equipment_no','left')
            ->join('st_locations as c','b.location_id=c.id','left')
            ->orderBy('a.createtime','desc')
            ->search($P)
            ->paginates($this->_page());
        return $this->toJson($data);
    }
}
