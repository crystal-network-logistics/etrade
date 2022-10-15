<?php
namespace App\Libraries;

class LibMail{
    // 获取Folder
    public static function GetFolder(){
        $db = new \App\Models\Mailbox\GroupModel();
        return $db->where('userid',session('id'))->orderBy('createtime','asc')->findAll();
    }

    public static function GetMailBox(){
        $db = new \App\Models\Mailbox\MailSetting();
        return $db->where('userid',session('id'))->where('status',0)->orderBy('type','desc')->orderBy('id','desc')->findAll();
    }
}