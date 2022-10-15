<?php namespace App\Models\Setup;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Payer extends \App\Models\BaseModel
{
    protected $table = 'payer';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'region', 'customerid', 'createdtype', 'bankname', 'account', 'currency', 'companyid' ];

    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];

    protected function data_before(array $array) {
        $this->setCustCom( $array );
        return $array;
    }
}
