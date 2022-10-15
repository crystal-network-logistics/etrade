<?php namespace App\Models\Message;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Notify extends \App\Models\BaseModel
{
    protected $table = 'notification';
    protected $primaryKey = 'id';
    protected $allowedFields = ['notificationid', 'receiverid', 'customerid', 'companyid', 'topickey', 'message', 'url', 'type', 'relationid', 'relationtb'];
}
