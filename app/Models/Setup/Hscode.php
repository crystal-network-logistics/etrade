<?php namespace App\Models\Setup;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Hscode extends \App\Models\BaseModel {
    protected $table = 'hscode';
    protected $primaryKey = 'id';
    protected $allowedFields = ['code', 'productname', 'officialunit1', 'officialunit2', 'taxreturnrate', 'type', 'customsupervision', 'description', 'declarationelements'];
}
