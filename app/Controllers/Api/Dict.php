<?php
namespace App\Controllers\Api;

use App\Models\Admin;
use App\Controllers\Base;

class Dict extends Basic{
    private $db;
    function __construct() {
        $this->db = new \App\Models\Admin\Dictionary();
    }
}
