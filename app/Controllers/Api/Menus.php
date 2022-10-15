<?php
namespace App\Controllers\Api;

use App\Controllers\Base;
use App\Libraries\LibMenu;
use App\Services\comm;
use Config\Services;
use phpDocumentor\Reflection\Types\This;

class Menus extends Basic
{
    private $db;

    public function __construct()
    {
        $this->db = new \App\Models\Admin\Menu();
    }


}
