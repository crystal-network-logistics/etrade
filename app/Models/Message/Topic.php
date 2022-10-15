<?php namespace App\Models\Message;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Topic extends \App\Models\BaseModel
{
    protected $table = 'noticetopic';
    protected $primaryKey = 'id';
    protected $allowedFields = ['roleid','topic','companyid'];
}
