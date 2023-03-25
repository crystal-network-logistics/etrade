<?php namespace App\Models\Setup;

use CodeIgniter\Model;

class Operator extends \App\Models\BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'operator';
    protected $allowedFields = ['customerid','userid'];

    public function batch_save( $customerId, $userIds = [] ){
        // 删除
        $this->where('customerid',$customerId)->delete();
        $argc = [];
        // 循环
        foreach ( $userIds as $k => $v ) {
            $argc[] = ['id'=>0,'customerid' => $customerId,'userid' => $v];
        }
        $this->insertBatch($argc);
    }

    // 绑定客户
    public function batch_bind( $userId = 0,$customerIds = []){
        $this->where('userid',$userId)->delete();$argc = [];
        foreach ( $customerIds as $k => $v ) {
            if ( $v ) $argc[] = ['id'=>0,'customerid' => $v,'userid' => $userId];
        }
        $this->insertBatch($argc);
    }
}
