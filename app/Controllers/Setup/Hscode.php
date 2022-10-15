<?php
namespace App\Controllers\Setup;
use App\Controllers\Base;

class Hscode extends Base
{
    protected $db;

    function __construct()
    {
        $this->db = new \App\Models\Setup\Hscode();
    }
    // 列表页面
    public function index(){
        $this->actionAuth(true);
        return $this->display();
    }

    // 数据
    public function page(){
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'code,productname,description,declarationelements';

        $data = $this->db
            ->asObject()
            ->where('type',0)
            ->search($P)
            ->paginates( $this->_page() ,$this->_size());
        return $this->toJson($data);
    }

    // 单选
    public function choice(){
        $this->actionAuth();
        return $this->render();
    }

    // 要素
    public function superelements(){
        $this->actionAuth();
        $code = $this->U('code');
        $data = $this->db->where('code',$code)->first();
        $elements = '';
        if ( $data && $data['declarationelements'] ) {
            $d['detail'] = $data;
            $elements = view('/Setup/Hscode/superelements',['data' => $d]);
        }
        return $elements;
    }

    // 详情
    public function view(){
        $this->actionAuth();
        $code = $this->U('code');
        if ( $data = $this->db->where('code',$code)->first() ) {
            $d['detail'] = $data;
            $elements = view('/Setup/Hscode/view',['data' => $d]);
        }
        return $elements;
    }

    // 编辑
    public function update() {
        $this->actionAuth();
        $code = $this->U('code');
        if ( $data = $this->db->where('code',$code)->first() ) {
            $d['detail'] = $data;
            $elements = view('/Setup/Hscode/form',['data' => $d]);
        }
        return $elements;
    }
}
