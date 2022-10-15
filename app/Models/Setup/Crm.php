<?php namespace App\Models\Setup;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Crm extends \App\Models\BaseModel
{
    protected $table = 'crm';
    protected $primaryKey = 'id';
    protected $allowedFields = ['companyid', 'customerid', 'name', 'shortname', 'type', 'owner', 'region', 'address', 'post', 'tel', 'fax', 'site', 'mainproduct', 'bank', 'bankaccount', 'source', 'profits', 'creator', 'remark', 'files', 'trackdate'];

    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];

    protected function data_before(array $array) {
        $this->setCustCom($array);
        return $array;
    }
}
