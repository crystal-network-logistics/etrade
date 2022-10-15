<?php namespace App\Models\Setup;

use CodeIgniter\Model;

class Company extends \App\Models\BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'company';
    protected $allowedFields = ['guid', 'name', 'ename', 'shortname', 'code', 'province', 'city', 'district', 'address', 'enaddr', 'legal', 'creditno', 'cardno', 'founddt', 'scope', 'acname', 'bkname', 'account', 'expressdt', 'versions', 'amount', 'remark', 'logo', 'licence_url', 'contact', 'fax', 'domain', 'status', 'reason', 'agent', 'icq', 'stamp_zh_en', 'stamp_bgz', 'aprovedt', 'mini', 'qrcode'];

    protected $validationRules = [
        'name'     => 'required|is_unique[company.name,id,{id}]',
    ];
    protected $validationMessages =[
        'name'=>[
            'required'=> '请输入用户名称',
            'is_unique'=> '公司已存在'
        ],
    ];
}
