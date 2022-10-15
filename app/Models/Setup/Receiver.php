<?php namespace App\Models\Setup;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Receiver extends \App\Models\BaseModel
{
    protected $table = 'receiver';
    protected $primaryKey = 'id';
    protected $allowedFields = ['type', 'name', 'bank', 'account', 'currency', 'customerid', 'createdtype', 'companyid'];

    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];
    
    protected function data_before(array $array) {
        $this->setCustCom( $array );
        return $array;
    }
}
