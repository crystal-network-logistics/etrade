<?php
namespace App\Controllers\Admin;

use App\Controllers\Base;
use PHP_CodeSniffer\Generators\HTML;

class Roles extends Base {
    private $db;
    function __construct(){
        $this->db = new \App\Models\Admin\Roles();
    }
    public function index(){
        $this->actionAuth(true);
        return $this->display();
    }
    
    public function create(){
        $this->actionAuth(true);
        return $this->render();
    }

    public function update(){
        $this->actionAuth(true);
        if( $data = $this->db->where('id',$this->U('id'))->first() ) 
            return $this->render(['data'=>$data]);
    }

    public function page(){
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'name,code';
        $data = $this->db->search($P)->where('creatorId',session('id'))->paginates($this->_page());
        return $this->toJson($data);
    }

    public function save(){
        $this->actionAuth(true);
        $entity = new \App\Entities\Forms($this->U());
        $entity->creatorId = session('id');
        if(!$entity->id) $entity->code = \App\Libraries\LibComp::guid();
        $this->db->setValidationMessages($this->db->validationMessages);
        if($this->db->save($entity)){
            return $this->toJson('保存成功');
        }else{
            return $this->setError($this->db->errors());
        }
    }

    public function delete(){
        $this->actionAuth(true);
        if( $this->db->delete($this->U('id')) )
            return $this->toJson('已删除');
        return $this->setError('删除失败');
    }
}
