<?php namespace App\Models\Declares;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Balance extends \App\Models\BaseModel
{
    protected $table = 'balance_log';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customerid', 'balance_from', 'amount', 'balance_to', 'comment', 'companyid'];

    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];

    // 保存前
    protected function data_before(array $array) {
        $this->setCustCom( $array );
        return $array;
    }
}
