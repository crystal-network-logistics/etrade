<?php
namespace App\Controllers\Admin;

use App\Models\Admin;
use App\Controllers\Base;

class Dict extends Base {
    private $db;
    function __construct(){
        $this->db = new \App\Models\Admin\Dictionary();
    }
    // 列表页
    public function index(){
        $this->actionAuth(true);
        return $this->display();
    }
    // 数据列表
    public function data_list(){
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'code,name';
        if( !$P['parentid'] )
            $P['parentid'] = 0;
        $data = $this->db->search($P)->orderBy('sorting','asc')->paginates($this->_page());
        $data['data'] = $this->build_tree($data['data']);
        return $this->toJson($data);
    }
    // 新增
    public function create(){
        $this->actionAuth(true);
        $d['parentid'] = $this->U('parentid');
        return $this->render(['data'=>$d]);
    }
    // 编辑
    public function edit(){
        $this->actionAuth(true);
        if ($data = $this->db->where('id', $this->U('id'))->first()) {
            return $this->render(['data' => $data]);
        }
    }
    
    // 保存
    public function save(){
        $this->actionAuth(true);
        $entity = new \App\Entities\Forms($this->U());
        $this->db->setValidationMessages($this->db->validationMessages);
        if($this->db->save($entity)){
            if( intval( $entity->parentid > 0 ) ) {
                $PD = $this->db->where('id',$entity->parentid)->first();
                $path = WRITEPATH. 'uploads/js';
                $bl = '__'.$PD->code;
                if(!file_exists($path)) {
                    mkdir($path,0777,true);
                }
                $data = $this->db->where('parentid',$entity->parentid)->findAll();
                $code='var '.$bl.'={};'."\r\n";
                foreach($data as $item){
                    $code = $code.'   '.$bl.'["'.$item->code.'"]={"name":"'.$item->name.'","hidden":'.$item->hidden;
                    if(strlen($item->remark)>0) {
                        $code=$code.',"mark":"'.$item->remark.'"';
                    }
                    $code=$code.'};'."\r\n";
                }
                file_put_contents($path.'/'.$bl.'.js',$code);
            }
            return $this->toJson('保存成功');
        }
        return $this->setError($this->db->errors());
    }
    // 删除
    public function delete(){
        $this->actionAuth(true);
        if( $this->db->where('id',$this->U('id'))->delete() )
            return $this->toJson('已删除');
        return $this->setError('删除失败');
    }
    // 左侧树状数据
    public function data_tree(){
        $this->actionAuth();
        $db = $this->db;
        $data = $db->where('parentid',0)->orderBy('sorting','asc')->findAll();

        $resp_data = $this->build_tree($data);
        $merge_data = [['id'=>0,'title'=>'Root','key'=>'','expanded'=>false,'children'=>$resp_data]];
        return (json_encode($merge_data));
    }
    // 左侧树状数据
    private function build_tree($data){
        foreach ( $data as $row ) {
            $sub_data = $this->db->where('parentid',$row->id)->orderBy('sorting','asc')->findAll();
            $row->title = $row->name;
            $row->key = $row->code;
            $row->expanded = false;
            $child = $this->build_tree($sub_data);
            //if( count($child) )
            $row->children = $child;
        }
        return $data;
    }
}
