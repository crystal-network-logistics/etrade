<?php
namespace App\Controllers\Setup;
use App\Controllers\Base;

class Articles extends Base
{
    protected $db;
    function __construct(){
        $this->db = new \App\Models\Setup\Articels();
    }

    public function view(){
        $this->actionAuth();
        if ( $data['detail'] = $this->db->where('id',$this->U('id'))->first() ) {
            $this->db->where('id' , $this->U('id'))->set('isread',($data['detail']['isread'] + 1)) ->update();
            return $this->render(['view_path' => '/Articles/view','data'=>$data]);
        }
        return '查看失败, 请检查参数是否正确';
    }
}
