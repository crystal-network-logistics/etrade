<?php namespace App\Models\Setup;

use CodeIgniter\Model;

class Articels extends \App\Models\BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'articles';
    protected $allowedFields = ['guid', 'title', 'companyid', 'category', 'summary', 'attachment', 'imgs', 'outlink', 'desc', 'createtor', 'isread', 'istop'];
}
