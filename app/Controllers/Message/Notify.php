<?php
namespace App\Controllers\Message;
use App\Controllers\Base;

class Notify extends Base
{
    protected $db;
    function __construct() {
        $this->db = new \App\Models\Message\Notify();
    }
    // 消息通知主页面
    public function index(){
        $this->actionAuth();
        return $this->display(['view_path' => '/Notify/main']);
    }

    // 兼容老版本消息 notices/????
    public function show( $action = '' ){
        $this->actionAuth();
        $data['view'] = view("Notify/$action");
        return $this->display([
            'view_path' => "/Notify/message",'data' => $data
        ]);
    }

    // 新版本消息
    public function message( $action = 'project' ){
        $this->actionAuth();
        $data['view'] = view("Notify/$action");
        return $this->display([
            'view_path' => "/Notify/message",'data' => $data
        ]);
    }

    // 加载页
    public function load( $action = 'project' ){
        $this->actionAuth();
        return $this->render([
            'view_path' => "/Notify/$action"
        ]);
    }

    // 加载新注册用户数据
    public function load_data($tb = 'project'){
        $this->actionAuth();
        $P = $this->U();
        $P['receiverid'] = session('id') ;
        $data = $this->_item_column($tb, $P);
        $data['badge'] = $this->_badge( $P );
        return $this->toJson( $data );
    }
    // 加载各业务数据
    private function _item_column($tb , $form){
        $data = [];
        switch($tb){
            case 'project' : $data = $this->_project( $form );
                break;
            case 'products' : $data = $this->_products( $form );
                break;
            case 'invoicer' : $data = $this->_invoices( $form );
                break;
            case 'entryform' :  $data = $this->_entry( $form );
                break;
            case 'vii' :    $data = $this->_vii( $form );
                break;
            case 'receipt': $data = $this->_receipt( $form );
                break;
            case 'receiptclaim':    $data = $this->_receiptclaim( $form );
                break;
            case 'payment':
            case 'paymentcl':   $data = $this->_payment( $tb , $form );
                break;
            case 'stamp' :  $data = $this->_stamp( $form );
                break;
            case 'user' :  $data = $this->_users( $form );
                break;
            default:
                break;
        }
        return $data;
    }
    // 业务数据
    private function _project( $form ){
        $form['searchField'] = 'BusinessID,project.remark';

        $data = $this->db
            ->select("
            notification.*,
            b.BusinessID,
            c.exportdate,
            c.destionationcountry,
            c.destionationport,
            c.currency,
            b.isentrance,
            d.customername,
            format(ifnull((select sum( ProductUnitPrice * ProductAmount ) from goods where b.id=goods.projectid),0),2) as bgamount
            ")
            ->search( $form )
            ->join("project as b",'notification.relationid=b.id')
            ->join("entryform as c",'b.id=c.projectid')
            ->join('customer d','b.customerid=d.id','left')
            ->orderBy('notification.createtime','desc')
            ->paginates($this->_page(),$this->_size());
        return $data ;
    }
    // 报关数据
    private function _entry( $form ){
        $form['searchField'] = 'c.BusinessID,c.remark';
        $data = $this->db->select('
        b.*,
        a.id as noticeid,
        a.message,
        a.type as nt,
        c.BusinessID,
        c.isentrance,
        ifnull((select sum(ProductUnitPrice*ProductAmount) from goods where b.projectid=goods.projectid),0) as bgamount,
        a.createtime')
            ->from('notification a',true)
            ->join('entryform b','a.relationid=b.id')
            ->join('project c','b.projectid=c.id','left')
            ->where('a.relationtb','entryform')
            ->orderBy('a.createtime','desc')
            ->search( $form )
            ->paginates($this->_page(),$this->_size());
        return $data;
    }
    // 增票数据
    private function _vii( $form ){
        $form['searchField'] = 'b.productname,e.name,c.BusinessID';
        $data = $this->db->select(
            'b.*,c.isentrance,c.BusinessID,a.id as noticeid,a.type as nt,a.id as nid,ifnull(d.name,b.productname) as productname,ifnull(e.name,b.invoicer) as invoicer,c.isentrance,
            a.createtime,a.message,f.customername')
            ->from('notification a',true)
            ->join('vii b','a.relationid=b.id')
            ->join('products d','b.productid=d.id','left')
            ->join('invoicer e','b.invoicerid=e.id','left')
            ->join('project c','b.projectid=c.id','left')
            ->join('customer f','c.customerid=f.id','left')
            ->where('a.relationtb','vii')
            ->orderBy('a.createtime','desc')
            ->search( $form )
            ->paginates($this->_page(),$this->_size());
        //log_message('error',$this->db->getLastQuery());
        return $data;
    }
    // 收入数据
    private function _receipt( $form ){
        $form['searchField'] = 'b.payername,c.BusinessID';
        $data = $this->db->select('b.*,a.id as noticeid,a.type as nt,a.id as nid,c.BusinessID,a.createtime,a.message,d.customername,c.isentrance')
            ->from('notification a',true)
            ->join('receipt b','a.relationid=b.id')
            ->join('project c','b.projectid=c.id','left')
            ->join('customer d','b.customerid=d.id','left')
            ->where('relationtb','receipt')
            ->orderBy('a.createtime','desc')
            ->search( $form )
            ->paginates($this->_page(),$this->_size());
        return $data;
    }
    // 支付数据
    private function _payment( $tb,$form ){
        $form['searchField'] = 'b.receivername,b.bank,b.bankaccount,c.BusinessID';
        $form['a.receiverid'] = session('id'); unset($form['receiverid']);
        $data = $this->db->select('b.*,a.id as noticeid,a.type as nt,a.id as nid,c.BusinessID,a.message,c.isentrance,d.customername,a.createtime')
            ->from('notification a',true)
            ->join($tb.' b','a.relationid=b.id')
            ->join('project c','b.projectid=c.id','left')
            ->join('customer d','b.customerid=d.id','left')
            ->where('a.relationtb',$tb)
            ->orderBy('a.createtime','desc')
            ->search( $form )
            ->paginates($this->_page(),$this->_size());
        //log_message('error',$this->db->getLastQuery());
        return $data;
    }
    // 盖章数据
    private function _stamp( $form ){
        $form['searchField'] = 'c.BusinessID';
        $data = $this->db->select('a.id as noticeid,a.*,b.*,c.BusinessID,d.customername,c.isentrance')
            ->from('notification a',true)
            ->join('stamp b','a.relationid=b.id')
            ->join('project c','b.projectid=c.id','left')
            ->join('customer d','b.customerid=d.id','left')
            ->where('a.relationtb','stamp')
            ->orderBy('a.createtime','desc')
            ->search( $form )
            ->paginates($this->_page(),$this->_size());
        return $data;
    }
    // 产品数据
    private function _products($form){
        $form['searchField'] = 'b.name,b.hscode,b.brand,b.englishname';
        $data = $this->db->select('a.*,
        a.type as nt,a.id as nid,a.id as noticeid,b.productid,b.id,b.name,b.brand,b.status,taxreturnrate,hscode,b.type,customsupervision,a.createtime')
            ->from('notification a',true)
            ->join('products b','a.relationid=b.id')
            ->where('a.relationtb','products')
            ->search( $form )
            ->orderBy('a.createtime','desc')
            ->paginates($this->_page(),$this->_size());
        return $data;
    }
    // 开票人数据
    private function _invoices( $form ){
        $form['searchField'] = 'b.name,taxpayerid,c.customername,licenseid';
        $data = $this->db->select('a.*,a.type as nt,a.id as nid,a.id as noticeid,b.*,a.createtime,c.customername')
            ->from('notification a',true)
            ->join('invoicer b','a.relationid=b.id')
            ->join('customer c','c.id=b.customerid','left')
            ->where('a.relationtb','invoicer')
            ->search( $form )
            ->orderBy('a.createtime','desc')
            ->paginates($this->_page(),$this->_size());
        return $data;
    }
    // 收入申领
    private function _receiptclaim( $form ){
        $form['searchField'] = 'b.payername,b.bank,b.bankaccount,d.BusinessID';
        $data = $this->db->select('a.id as noticeid,b.*,a.type as nt,a.id as nid,a.message,a.createtime,c.customername,d.BusinessID,d.isentrance',
            false)
            ->from('notification a',true)
            ->join('receiptclaim b','a.relationid=b.id')
            ->join('customer c','b.customerid=c.id','left')
            ->join('project d','b.projectid=d.id','left')
            ->where('a.relationtb','receiptclaim')
            ->search( $form )
            ->orderBy('a.createtime','desc')
            ->paginates($this->_page(),$this->_size());
        return $data;
    }
    // 新注册用户数据
    private function _users( $form ){
        $form['searchField'] = 'b.username,b.nickname';
        $data = $this->db->select('a.id as noticeid,b.*,a.message,a.createtime,a.type as nt',
            false)
            ->from('notification a')
            ->join('users b','a.relationid=b.id')
            ->where('a.relationtb','users')
            ->orderBy('a.createtime','desc')
            ->search( $form )
            ->paginates($this->_page(),$this->_size());
        return $data;
    }

    // 下标读数
    private function _badge( $form = [] ) {
        $data = $this->db->select('relationtb,count(0) as nums')->groupBy('relationtb')
            //->whereAuth('customerid')
            ->search($form)
            ->findAll();
        $badge = [];
        foreach ( $data as $row ) {
            $badge["{$row["relationtb"]}"] = $row["nums"];
        }
        return ($badge);
    }

    private function _message_title(){
        $form = ['receiverid'=>session('id')];
        $data['nums'] = $this->db->search($form)->countAllResults();
        $data['data'] = $this->db->select('relationtb,url,topickey,message,count(topickey) as badge')
            ->from('notification',true )
            ->whereAuth('customerid')
            ->groupBy('relationtb,message,topickey,url')
            ->search($form)
            ->findAll();
        return $data ;
    }

    // 删除消息
    public function delete(){
        $this->actionAuth();
        if( $data = $this->db->where('id',$this->U('id'))->first() ) {
            delete_notify($data['relationid'], $data['topickey'], session('id')?:$data['receiverid'], 0);
            return $this->toJson('已查看成功!');
        }
        return $this->setError('操作失败');
    }

    public function save_notice_roles(){
        $this->actionAuth();
        $role_db = new \App\Models\Admin\Roles();
        $topic_db = new \App\Models\Message\Topic();

        $P = $this->U();

        $companyid = session('company')??0;

        if ( !$role_data = $role_db->asArray()->where('id',$P['roleid'])->first() )
            return $this->setError('设置失败,请检查参数是否正确.!');

        if( $role_data['creatorId'] != session('id'))
            return $this->setError('设置失败,无权操作!');

        $argc = ['topic'=>$P['topic'],'roleid'=>$P['roleid'],'companyid'=>$companyid];
        if( $data = $topic_db->search( $argc )->first() ) {
            $topic_db->search($argc)->delete();
            return $this->toJson('设置成功');
        }

        if( $topic_db->save( $argc )) {
            return $this->toJson('设置成功');
        }

        return $this->setError('设置失败,无权操作!');
    }
}
