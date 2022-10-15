<?php
namespace App\Libraries;

class LibForm{

    // 获取操作员
    static function company($id = 0){
        $db = new \App\Models\Setup\Company();
        $data = $db->where('id',$id)->first();
        return $data;
    }

    // 获取用户
    static function user($params = []){
        $db = new \App\Models\Admin\Users();
        $data = $db->asArray()->search($params)->first();
        return $data;
    }

    // 获取操作员
    static function owner_data($params = []){
        $db = new \App\Models\Admin\Users();
        $data = $db->where('type','ent')->search( $params )->findAll();
        return $data;
    }

    // 获取操作员
    static function owner( $customerId ){
        $db = new \App\Models\Admin\Users();
        $data = $db->select('a.*')
            ->asArray()
            ->from('admin_users as a')
            ->join('operator as b','a.id=b.userid','left')
            ->where('b.customerid',$customerId)
            ->where('a.type','ent')
            ->first();
        return $data;
    }

    // 获取客户信息
    static function customer_data($params = []) {
        $db = new \App\Models\Setup\Customer();
        return $db->whereAuth('id')->search($params)->findAll();
    }

    // 获取客户
    static function customer($params = []) {
        $db = new \App\Models\Setup\Customer();
        return $db->search($params)->first();
    }

    // 境外贸易商
    static function overseas( $id ){
        $db = new \App\Models\Setup\Overseas();
        return $db->where('id',$id)->first();
    }

    // 生产销售单位
    static function get_invoicer_saler( $projectId ){
        $db = new \App\Models\Form();
        $data = $db->select('pi.invoicername ,pi.taxpayerid,max(a.ProductAmount*a.ProductUnitPrice) as maxtotal')
            ->from('goods a',true)
            ->join('(select products.id as productid, invoicer.name as invoicername ,invoicer.taxpayerid from products right join invoicer on products.invoicerid=invoicer.id) as pi','a.productid=pi.productid','right')
            ->where('a.projectid',$projectId)
            ->groupBy(['pi.invoicername','pi.taxpayerid'])
            ->orderBy('maxtotal','desc')
            ->first();
        return $data;
    }

    // 货源地
    static function get_domestic_sources($projectId){
        $db = new \App\Models\Form();
        $result = $db->select('domesticsource')
            ->from('goods a')
            ->join('(select products.id as productid, invoicer.name as invoicername, invoicer.domesticsource as domesticsource from products right join invoicer on products.invoicerid=invoicer.id) as pi','a.productid=pi.productid','right')
            ->where('a.projectid',$projectId)
            ->first();
        $arr = [];
        foreach($result as $row){
            $arr[] = $row->domesticsource;
        }
        return implode(',',array_unique($arr));
    }

    // 消息
    static function get_message( $limit = 0 ){
        $db = new \App\Models\Message\Notify();
        $form = ['receiverid'=>session('id')];
        $data['nums'] = $db->search($form)->countAllResults();
        $data['data'] = $db->select('relationtb,url,topickey,message,count(topickey) as badge')
            ->from('notification',true )
            ->groupBy('relationtb,message,topickey,url')
            ->search($form)
            //->whereAuth('notification.customerid','notification.companyid')
            ->findAll($limit);
        return $data;
    }

    static function get_articles( $category = 'notices' , $limit = 0){
        $db = new \App\Models\Setup\Articels();
        $companyId = session('company')??1;
        $argc = ['companyid' => [0,$companyId],'category' => $category];
        $data = $db->search( $argc )->findAll($limit);
        return $data;
    }
}
