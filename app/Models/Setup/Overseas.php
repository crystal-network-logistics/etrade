<?php namespace App\Models\Setup;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Overseas extends \App\Models\BaseModel
{
    protected $table = 'overseas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['companyname', 'address', 'contractor', 'phone', 'customerid', 'companyid', 'type'];

    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];

    protected function data_before(array $array) {
        $this->setCustCom( $array );
        return $array;
    }
}
