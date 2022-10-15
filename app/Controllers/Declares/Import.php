<?php
namespace App\Controllers\Declares;
use App\Controllers\Base;

class Import extends Base
{
    protected $db;

    function __construct()
    {
        $this->db = new \App\Models\Declares\Project();
    }

    // 列表页
    public function index()
    {
        $this->actionAuth(true);
        return $this->display();
    }

    // 新增
    public function create(){
        $this->actionAuth(true);
        return $this->display();
    }

    // 编辑
    public function update(){
        $this->actionAuth(true);
        $data = $this->_detail_data();
        return $this->display(
            ['data' => $data]
        );
    }

    // 详情页
    public function view(){
        $this->actionAuth(true);
        $data = $this->_detail_data();
        return $this->display(
            ['data' => $data]
        );
    }

    // 详情数据
    private function _detail_data(){
        $db = new \App\Models\Form();
        $form = $this->U();
        if (!$this->ck_auth_data( $this->db , $form))
            exit('参数错误');
        //
        $item = $this->db->get_data($form['id']);
        $model = $this->_colunm_data( $item, $db ,true);
        $data['project'] = (array) $model;

        $data["entry"] = $db->select('a.*,b.companyname as businessman')
            ->from('entryform as a',true)
            ->join('overseas as b','a.businessid=b.id','left')
            ->where('a.projectid',$form['id'])->first();
        $data["goods"] = $db->select('a.*,a.id as gid,a.ProductChineseName as name,a.productid as pid,c.name as invoicer,c.domesticsource')
            ->from('goods as a',true)
            ->join('products as b','a.productid=b.id','left')
            ->join('invoicer as c' , 'b.invoicerid=c.id','left')
            ->where('a.projectid',$form['id'])->findAll();
        return $data;
    }

    // 详情数据
    private function _colunm_data( $row , $db , $has = false ){
        if (is_array( $row )) $row = (object) $row;

        $customer_data = $db->from('customer',true)->where('id',$row->customerid)->first();
        $entry_data = $db->from('entryform',true)->where('projectid',$row->ID)->first();
        $goods_data = $db->from('goods',true)->select('sum(ProductUnitPrice*ProductAmount) as bgamount,sum(ProductGrossWeight) as sumgrossweight,sum(ProductNetWeight) as sumnetweight')->where('projectid',$row->ID)->first();

        $vii_data = $db->from('vii',true)->selectSum('invoiceamount')->where(['projectid'=>$row->ID,'status >='=>3])->first();
        $receipt_data = $db->from('receipt',true)->select('sum(case when realityamount > 0 then realityamount else amount end * exchangerate) as isreceipt')->where('status>0')->where(['projectid'=>$row->ID,'approved'=>1])->first();
        $payment_data = $db->from('payment',true)->select('sum(amount*exchangerate) as payamount')->where('status>=1')->where('projectid',$row->ID)->first();
        $tuishui_data = $db->from('vii',true)->select('sum(taxamount) as taxamount')->where(['projectid'=>$row->ID])->first();
        $receipt_sum_data = $db->from('receipt',true)->select('sum(amount * exchangerate) as amount')->where(['status >'=>0,'vii'=>0,'projectid'=>$row->ID,'approved'=>1])->first();    // 不包含退税
        $row->customer = $customer_data ? $customer_data['customername']:'';

        $row->entryport = $entry_data ? $entry_data['entryport'] : '';
        $row->destionationcountry = $entry_data ? $entry_data['destionationcountry'] : '';
        $row->exportdate = $entry_data ? $entry_data['exportdate'] : '';
        $row->currency = $entry_data ? $entry_data['currency'] : '';
        $row->clearance = $entry_data ? $entry_data['clearance'] : '';

        $row->bgamount = $goods_data ? $goods_data['bgamount'] : 0;
        $row->sumgrossweight = $goods_data ? $goods_data['sumgrossweight'] : 0;
        $row->sumnetweight = $goods_data ? $goods_data['sumnetweight'] : 0;

        $row->vcapital = $vii_data ? $vii_data['invoiceamount'] : 0;
        $row->isreceipt = $receipt_data ? $receipt_data['isreceipt'] : 0;
        $row->receiptsum = $receipt_sum_data ? $receipt_sum_data['amount']:0;
        $row->payamount = $payment_data ? $payment_data['payamount'] : 0;
        $row->tuishui = ($row->taxrefund == 4) ? ($tuishui_data?$tuishui_data['taxamount']:0) : 0;

        if ( $has ) {
            $realit_data = $db->from('receipt',true)->select('sum(realityamount) as amt')->where(['projectid'=>$row->ID,'usage'=>3])->first();
            $payment_cl_data = $db->from('paymentcl',true)->select('sum(paymentcl.amount*exchangerate) as amt')->where(['projectid'=>$row->ID,'status >='=>1])->first();
            $usd_data = $db->from('receipt',true)->select('sum(amount) as amt')->where(['projectid'=>$row->ID,'status>'=>0])->where('currency','USD')->first();

            $row->realityamount = $realit_data ? $realit_data['amt']:0;
            $row->paymnet_cl_amount = $payment_cl_data ? $payment_cl_data['amt']:0;
            $row->usd = $usd_data ? $usd_data['amt']:0;
        }
        //
        return $row;
    }
}
