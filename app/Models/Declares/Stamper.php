<?php namespace App\Models\Declares;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Stamper extends \App\Models\BaseModel {
    protected $table = 'stamper';
    protected $primaryKey = 'id';
    protected $allowedFields = ['companyid', 'stamper'];
}
