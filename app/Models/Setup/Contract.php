<?php namespace App\Models\Setup;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Contract extends \App\Models\BaseModel
{
    protected $table = 'crm_contact';
    protected $primaryKey = 'id';
    protected $allowedFields = ['cid', 'name', 'phone', 'tel', 'weixin', 'email', 'sex', 'birthday', 'qq', 'position', 'address', 'status', 'remark', 'isdefault'];

    // 批量保存
    public function batch_save( $argc ){
        if ( $argc['id'] ) {
            $colunms = [];
            $form = $argc['contact'];

            foreach ( $form['tags'] as $k => $v ) {
                $form['cid'][$k] = $argc['id'] ;
            }
            // 需要插入的字段
            foreach ( $form as $k=>$v ) {
                if ( in_array( $k, $this->allowedFields ) || ($k == 'id') ) $colunms[] = $k;
            }
            // 组成数据
            foreach ( $form['tags'] as $k => $v ) {
                $fd = [];
                foreach ( $colunms as $filed ) {
                    $temp = [$filed => $form[$filed][$k]]; $fd = array_merge($fd,$temp);
                }
                $this->save($fd);
            }
            return true;
        }
        return false;
    }
}
