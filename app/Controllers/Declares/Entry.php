<?php
namespace App\Controllers\Declares;
use App\Controllers\Base;

class Entry extends Base
{
    function __construct() {
    }

    public function attach(){
        $this->actionAuth(true);
        return $this->display(['view_path'=>'/Declares/Project/attachment']);
    }
}
