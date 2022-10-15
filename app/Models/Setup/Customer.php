<?php namespace App\Models\Setup;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Customer extends \App\Models\BaseModel
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customername', 'commissionfee', 'mainproducts', 'tel', 'qq', 'customerno', 'taxrefundfee', 'customercursor', 'projectcursor', 'phone', 'companyid', 'commissionfeemin', 'taxrefundfeemin', 'entrancecursor', 'creditamount', 'creditrate', 'creditamountmin', 'status', 'creditamount_temp', 'usedamout', 'identity_card', 'cardsmark', 'assets', 'assetsmark', 'creditstatus', 'applydate'];

    protected $validationRules = [
        'customername'     => 'required|is_unique[admin_dictionary.customername,id,{id}]',
        'tel'     => 'required|is_unique[admin_dictionary.tel,id,{id}]',
        'phone'     => 'required|is_unique[admin_dictionary.phone,id,{id}]',
    ];

    protected $validationMessages =[
        'name'=>['required'=> '请输入用户名称', 'is_unique'=> '公司已存在'],
        'phone'=>['required'=> '请输入正确的手机号', 'is_unique'=> '手机号已存在'],
    ];
}
