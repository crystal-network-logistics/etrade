<?php namespace App\Models\Declares;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Stamp extends \App\Models\BaseModel
{
    protected $table = 'stamp';
    protected $primaryKey = 'id';
    protected $allowedFields = ['companyid', 'projectid', 'customerid', 'original', 'component', 'status', 'stampmark', 'stamper', 'isbz', 'stamptime'];
    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];

    protected $afterUpdate = ['data_after'];
    protected $afterInsert = ['data_after'];

    protected function data_before( array $array ) {
        $this->setCustCom( $array );
        $data = $array['data']; $Id = $array['id'][0];
        if(array_key_exists("status",$data) && $data['status'] == 2 && ckAuth('operator')){
            notice_add('TOPIC_STAMP_ED', $Id ,'stamp','/notices/stamp',1,1);
        }
        return $array;
    }

    protected function data_after( array $array ) {
        $data = $array['data']; $Id = is_array( $array['id'] ) ? $array['id'][0] : $array['id'] ;
        if(array_key_exists("status",$data) && $data['status'] == 1 && ckAuth()){
            notice_add('TOPIC_STAMP_ING', $Id ,'stamp','/notices/stamp',1,0);
        }
        return $array;
    }
}
