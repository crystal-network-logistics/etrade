<?php namespace App\Models\Setup;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Track extends \App\Models\BaseModel
{
    protected $table = 'crm_track';
    protected $primaryKey = 'id';
    protected $allowedFields = [ 'cid', 'trackid', 'trackor', 'content'];
}
