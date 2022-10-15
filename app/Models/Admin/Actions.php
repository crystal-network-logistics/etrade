<?php namespace App\Models\Admin;

use CodeIgniter\Model;

class Actions extends \App\Models\BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'admin_operation';
    protected $allowedFields = ['menuid','name','code','uri'];
    protected $returnType = 'App\Entities\Forms';
    protected $afterDelete = ['after_delete'];

    protected function after_delete($data){
        if( $data['id'][0] ) {
            // 删除操作记录
            $this->from('admin_power',true)->where('opration_id',$data['id'][0])->delete();
        }
        return $data;
    }

    // 批量保存
    public function batch_save( $menuid , $data ){
        if( !$data ) return false;
        $this->set('state',1)->where('menuid',$menuid)->update();
        $menu = [];
        if( $data ) {
            foreach ($data['id'] as $k => $v) {
                if ($this->find($v)) {
                    $this->update($v, ['state' => 0, 'name' => $data['name'][$k], 'code' => $data['code'][$k], 'uri' => $data['uri'][$k]]);
                } else {
                    if ($this->where(['menuid' => $menuid, 'code' => $data['code'][$k]])->first()) {
                        $this->where(['menuid' => $menuid, 'code' => $data['code'][$k]])
                            ->update(['state' => 0, 'name' => $data['name'][$k], 'code' => $data['code'][$k], 'uri' => $data['uri'][$k]]);
                    } else {
                        if ($data['name'][$k])
                            $menu[] = array(
                                'menuid' => $menuid,
                                'name' => $data['name'][$k],
                                'code' => $data['code'][$k],
                                'uri' => strtolower($data['uri'][$k])
                            );
                    }
                }
            }
        }
        if ( $menu ) $this->insertBatch( $menu);
    }
}
