<?php
namespace App\Controllers\Data;
use App\Controllers\Base;
use App\Libraries\LibComm;
use App\Libraries\LibComp;
use App\Libraries\LibForm;
use CodeIgniter\Database\BaseBuilder;

class Census extends Base {
    function __construct() {
    }

    #region 收汇业务 数据列表

    // 收汇
    public function fexchange(){
        $this->actionAuth(true);

        return $this->display();
    }

    // 收汇数据表
    public function fexchange_page( $action = ''){
        $this->actionAuth();
        $P = $this->U();
        $db = new \App\Models\Declares\Project();
        $company =  $this->_company_data();
        $origin = $company[1];
        $companyname = $company[0];


        $P['searchField'] = "BusinessID";

        $db->select("
            project.id,
            date_format(donetime ,'%Y-%m-%d') as donetime ,
            project.isentrance,
            BusinessID,
            a.customername ,
            customerid,
            project.rate,
            case when isentrance = 0 then '出口' else '进口' end as entrance_text
        ")
            ->asObject()
            ->where('project.status',2)
            ->search( $P )
            ->join('customer as a','project.customerid=a.id','left')
            ->orderBy('donetime','desc')
            ->whereAuth('project.customerid','project.companyid');

        if ( $action == 'export' ) {
            $data['data'] = $db->findAll(1500);
        } else {
            $data = $db->paginates( $this->_page() , $this->_size() );
        }
        $arr_data = [];
        foreach ( $data['data'] as $k=>$row ) {
            $row =(array) $this->_data( $row ,$db ,$companyname , $origin);
            $arr_data[$k] = [
                'id' => $row['id'],
                'donetime' => $row['donetime'],
                'owner' => $row['owner'],
                'company_name' => $companyname,
                'isentrance' => $row['isentrance'],
                'entrance_text' => $row['entrance_text'],
                'customername' => $row['customername'],
                'BusinessID' => $row['BusinessID'],
                'bg_amount' => $row['bg_amount'],
                'SHAMT' => $row['SHAMT'],
                'SHAMT_CNY' => $row['SHAMT_CNY'],
                'FHAMT_CNY' => $row['FHAMT_CNY'],
                'profit_amount' => $row['profit_amount'],
                'accounttype' => $row['accounttype'],
            ];
            if ( $action == 'export' ) {
                unset($arr_data[$k]['id'],$arr_data[$k]['isentrance']);
            }
        }
        $data['data'] = $arr_data;
        if ( $action == 'export' ) {
            $real_path = $this->_mk();

            LibComm::ExportExcel(['期间','业务员','公司','类型','客户','业务单号','报关金额($)','收汇金额','收汇人民币','付汇金额','结算利润','备注'],$data['data']);
            return false;
        }
        return $this->toJson($data);
    }

    // 数据
    private function _data( $row , \App\Models\Declares\Project $db ,$companyname, $origin){
        // 业务员
        $owner = LibForm::owner( $row->customerid );
        // 报关数据
        $goods_data = $db->select("sum(ifnull(ProductUnitTotalPrice,ProductUnitPrice*ProductAmount)) as amount")->from('goods',true)->where('projectid',$row->id)->first();
        // 帐户类型
        $account_receipt_data = $db->select("case when accounttype = 1 then '国内账号' when accounttype = 2 then '离岸账号' else '个人账号' end acctype")->from('receipt',true )->where(['projectid'=>$row->id,'status >'=>0,'usage'=>1])->first();
        // 收汇
        $shamt_receipt_data = $db->select("sum( amount ) as SHAMT, sum(amount*exchangerate) TSHAMT")->from('receipt',true )->where(['projectid'=>$row->id,'usage'=>1,'status >'=>0,'amount >'=>0])->first();
        // 结算利润
        $amount_receipt_data = $db->select("sum( amount ) amount")->from('receipt',true )->where(['projectid'=>$row->id,'status >'=>0,'currency'=>'USD'])->first();

        $where = " trim(replace(receivername,' ','')) = '$companyname' " . ($origin ? (" or trim(replace(receivername,' ',''))='$origin'") : "");
        // 付款数据
        $payment_data = $db->select('sum( amount * exchangerate ) as amount')->from('payment',true)->where(['status >='=>1,'projectid'=>$row->id])->where("( type in(4,5) or ( $where ))")->first();

        // 付款情况
        $paymentcl_data = $db->select('sum( amount * exchangerate ) as amount')->from('paymentcl',true)->where(['status >='=>1,'projectid'=>$row->id])->first();

        // 业务员
        $row->owner = $owner?($owner['nickname']??$owner['username']):'--';
        // 公司
        $row->company_name = $companyname;
        // 报关金额
        $row->bg_amount = $goods_data?$goods_data['amount']:0;
        // 收汇金额
        $row->SHAMT = $shamt_receipt_data?$shamt_receipt_data["SHAMT"]:0;
        // 帐号类型
        $row->accounttype = $account_receipt_data?$account_receipt_data["acctype"]:'-';
        // 收汇人民币
        $row->SHAMT_CNY = $row->isentrance == 0 ? ($shamt_receipt_data["TSHAMT"]??0) : 0;
        // 付汇金额
        $row->FHAMT_CNY = $row->isentrance == 1 ? ($shamt_receipt_data["TSHAMT"]??0) : 0;
        // 结算利润
        $row->profit_amount = ($payment_data?$payment_data["amount"]:0) - ($paymentcl_data?$paymentcl_data['amount']:0) + (($amount_receipt_data?$amount_receipt_data['amount']:0) * ($row->rate??1));

        unset($row->customerid,$row->rate);

        return $row;
    }

    private function _company_data($compId = 1){
        $company_data = get_company(['id'=>session('company')??$compId]);
        $origin = '';
        if($company_data){
            $companyname = $company_data["shortname"]?$company_data["shortname"]:$company_data["name"];
            if(strpos($companyname,'澳陆') !== false || strpos($companyname,'遥通') !== false){
                $origin = $companyname;
                $companyname = '一贸通';
            }
        }
        return [$companyname,$origin];
    }
    #endregion


    #region 数据统计

    // 数据统计 主页面
    public function index(){
        $this->actionAuth(true);

        return $this->display();
    }

    // 加载页面展示
    public function todo(){
        $this->actionAuth();
        $P = $this->U();
        switch ($P['project']) {
            case 'allreceipt':
            case 'dkreceipt':
            case 'odreceipt':
            case 'bkreceipt':
                $P['project'] = 'receipt';
                break;
            case 'allpayment':
            case 'hkpayment':
            case 'yfpayment':
            case 'feepayment':
            case 'odpayment':
                $P['project'] = 'payment';
                break;

            default:
                $P['project'] = $P['project']?:'empty';
        }
        return $this->render([
            'view_path' => "/Data/Census/_{$P['project']}"
        ]);
    }

    // 导出操作
    public function export(){
        $P = $this->U();
        $action = "load_{$P['project']}_data";

        if ( $P['project'] ) {
            switch ( $P['project'] ) {

                case 'allreceipt':
                case 'dkreceipt':
                case 'odreceipt':
                case 'bkreceipt':
                    $this->load_receipt_data('export');
                    break;
                case 'allpayment':
                case 'hkpayment':
                case 'yfpayment':
                case 'feepayment':
                case 'odpayment':
                    $this->load_payment_data('export');
                    break;
                default:
                    $this->$action('export');
                    break;
            }
        }
        return false;
    }

    // 加载报关数据
    public function load_baoguan_data( $action = '' ){
        $this->actionAuth();
        $db = new \App\Models\Declares\Project();
        $P = $this->U();
        $argc = ['b.currency' => $P['currency'],'project.customerid'=>$P['customerid'],'b.exportdate >='=> $P['sdate'] ,'b.exportdate <=' => $P['edate']?($P['edate'] . ' 23:59:59'):''];
        $sql = "select goods.projectid,sum(goods.ProductUnitPrice * goods.ProductAmount) as amount from goods group by goods.projectid";
        $db->asObject()->select('project.id,b.exportdate,c.customername,project.BusinessID,b.currency,v.amount,project.isentrance')
            ->join("($sql) as v","project.id=v.projectid")
            ->join('entryform as b','project.id=b.projectid','left')
            ->join('customer as c','project.customerid=c.id')
            ->where('project.status >',0)
            ->where('project.isentrance',$P['isentrance']??0)
            ->whereAuth('project.customerid','project.companyid')
            ->search( $argc )
            ->orderBy('b.exportdate','desc');
        if ( $action == 'export' ) {
            $data = $db->asObject()->findAll();
            foreach ( $data as $row ) {
                unset($row->id,$row->isentrance);
            }
            $real_path = $this->_mk();
            LibComm::ExportExcel(['客户', '业务单号', '出运日期', '币种', '报关金额']);return false;
        } else {
            $data = $db->paginates( $this->_page(), $this->_size() );
            $sum_data = $db->selectSum('v.amount','amount')
                ->join("($sql) as v","project.id=v.projectid")
                ->join('entryform as b','project.id=b.projectid','left')
                ->join('customer as c','project.customerid=c.id')
                ->where('project.status >',0)
                ->where('project.isentrance',$P['isentrance']??0)
                ->whereAuth('project.customerid','project.companyid')
                ->search( $argc )
                ->first();
            $data['sum'] = $sum_data ? $sum_data['amount'] : 0;
        }
        return $this->toJson($data);
    }

    // 加载增票数据
    public function load_vii_data( $action = '' ){
        $this->actionAuth();
        $db = new \App\Models\Declares\Project();

        $P = $this->U();
        $argc = ['project.customerid'=>$P['customerid'],'v.datetime >='=> $P['sdate'] ,'v.datetime <=' => $P['edate']?($P['edate'] . ' 23:59:59'):''];
        $sql = "select vii.projectid,date_format(vii.createtime,'%Y-%m-%d') as datetime,sum(invoiceamount) as amount from vii where vii.status > 0 group by vii.projectid , datetime";
        $db->asObject()
            ->select("project.id,c.customername,project.BusinessID,v.datetime,v.amount,project.isentrance")
            ->join('customer as c','project.customerid=c.id')
            ->join("($sql) as v",'v.projectid=project.id','inner')
            ->whereAuth('project.customerid','project.companyid')
            ->where('project.status >',0)
            ->where('project.isentrance',0)
            ->search( $argc )
            ->orderBy('project.createtime','desc');
        if ( $action == 'export' ) {
            $data = $db->asObject()->findAll();
            foreach ( $data as $row ) {
                unset($row->id);
            }
            $real_path = $this->_mk();
            LibComm::ExportExcel(['客户', '业务单号', '建单日期', '开票金额'],$data);return false;
        } else {
            $data = $db->paginates( $this->_page(), $this->_size() );
            $sum_data = $db->asArray()->select("sum(v.amount) as amount")
                ->join('customer as c','project.customerid=c.id')
                ->join("($sql) as v",'v.projectid=project.id','inner')
                ->whereAuth('project.customerid','project.companyid')
                ->where('project.status >',0)
                ->where('project.isentrance',0)
                ->search( $argc )->first();

            $data['sum'] = $sum_data ? $sum_data['amount'] : 0;
        }
        return $this->toJson($data);
    }

    // 加载收入数据
    public function load_receipt_data( $action = '' ){
        $this->actionAuth();
        $db = new \App\Models\Declares\Project();
        $arr = ["allreceipt"=>"","dkreceipt"=>'1','odreceipt'=>'2','bkreceipt'=>'3'];
        $P = $this->U();
        $argc = ['v.currency' => $P['currency'],'project.customerid'=>$P['customerid'],'v.datetime >='=> $P['sdate'] ,'v.datetime <=' => $P['edate']?($P['edate'] . ' 23:59:59'):''];
        $argc["v.usage"] = $arr[$P['project']];

        $sql = "select projectid,receiptdate as datetime,currency,receipt.usage,exchangerate,sum(receipt.amount) as amount,sum(amount * exchangerate) total_amount
                from receipt where status > 0 and approved = 1
                group by projectid,datetime,currency,exchangerate,receipt.usage";

        $db->asObject()
            ->select("project.id,c.customername,project.BusinessID,v.datetime,v.currency,v.exchangerate,v.amount,v.total_amount")
            ->join('customer as c','project.customerid=c.id')
            ->join("($sql) as v",'v.projectid=project.id','inner')
            ->whereAuth('project.customerid','project.companyid')
            ->where('project.status >',0)
            ->where('project.isentrance',0)
            ->search( $argc )
            ->orderBy('v.datetime','desc');
        if ( $action == 'export' ) {
            $data = $db->asObject()->findAll();
            foreach ( $data as $row ) {
                unset($row->id,$row->usage);
            }
            $real_path = $this->_mk();
            LibComm::ExportExcel(['客户', '业务单号', '收款日期', '币种','汇率','金额','折RMB'],$data);return false;
        } else {
            $data = $db->paginates( $this->_page(), $this->_size() );
            $sum_data = $db->asArray()->select("sum(v.total_amount) as amount")
                ->join('customer as c','project.customerid=c.id')
                ->join("($sql) as v",'v.projectid=project.id','inner')
                ->whereAuth('project.customerid','project.companyid')
                ->where('project.status >',0)
                ->where('project.isentrance',0)
                ->search( $argc )->first();

            $data['sum'] = $sum_data ? $sum_data['amount'] : 0;
        }

        return $this->toJson($data);
    }

    // 加载支付数据
    public function load_payment_data( $action = '' ){
        $this->actionAuth();
        $db = new \App\Models\Declares\Project();
        $arr = ["allpayment"=>"","hkpayment"=>'1','yfpayment'=>'2','feepayment'=>'4','odpayment'=>'3'];
        $P = $this->U();
        $argc = ['v.currency' => $P['currency'],'project.customerid'=>$P['customerid'],'v.datetime >='=> $P['sdate'] ,'v.datetime <=' => $P['edate']?($P['edate'] . ' 23:59:59'):''];
        $tp = $arr[$P['project']];
        $argc["v.type"] = ($tp == "4") ? [4,5]:$tp;

        $sql = "select projectid,paymentdate as datetime,currency,payment.type,exchangerate,sum(amount) as amount,sum(amount * exchangerate) total_amount,
                case when type = 1 then '货款支付' when type=2 then '运费支付' when type=3 then '其它支付' else '费用支付'end as tp
                from payment where status > 0
                group by projectid,datetime,currency,exchangerate,type";

        $db->asObject()
            ->select("project.id,c.customername,project.BusinessID,v.datetime,v.tp,v.currency,v.exchangerate,v.amount,v.total_amount")
            ->join('customer as c','project.customerid=c.id')
            ->join("($sql) as v",'v.projectid=project.id','inner')
            ->whereAuth('project.customerid','project.companyid')

            ->where('project.status >',0)
            ->where('project.isentrance',0)
            ->search( $argc )
            ->orderBy('v.datetime','desc');
        if ( $action == 'export' ) {
            $data = $db->asObject()->findAll();
            foreach ( $data as $row ) {
                unset($row->id);
            }
            $real_path = $this->_mk();
            LibComm::ExportExcel(['客户', '业务单号', '付款日期', '类型','币种','汇率','金额','折RMB'],$data);return false;
        } else {
            $data = $db->paginates( $this->_page(), $this->_size() );
            log_message('error',$db->getLastQuery());
            $sum_data = $db->asArray()->select("sum(v.total_amount) as amount")
                ->join('customer as c','project.customerid=c.id')
                ->join("($sql) as v",'v.projectid=project.id','inner')
                ->whereAuth('project.customerid','project.companyid')
                ->where('project.status >',0)
                ->where('project.isentrance',0)
                ->search( $argc )->first();

            $data['sum'] = $sum_data ? $sum_data['amount'] : 0;
        }

        return $this->toJson($data);
    }

    // 加载支付成本 数据
    public function load_paymentcl_data( $action = '' ){
        $this->actionAuth();
        $db = new \App\Models\Declares\Project();
        $P = $this->U();

        $argc = ['v.currency' => $P['currency'],'project.customerid'=>$P['customerid'],'v.datetime >='=> $P['sdate'] ,'v.datetime <=' => $P['edate']?($P['edate'] . ' 23:59:59'):''];

        $sql = "select projectid,paymentdate as datetime,currency,exchangerate,sum(amount) as amount,sum(amount * exchangerate) total_amount
                from paymentcl where status > 0
                group by projectid,datetime,currency,exchangerate";

        $db->asObject()
            ->select("project.id,c.customername,project.BusinessID,v.datetime,v.currency,v.exchangerate,v.amount,v.total_amount")
            ->join('customer as c','project.customerid=c.id')
            ->join("($sql) as v",'v.projectid=project.id','inner')
            ->whereAuth('project.customerid','project.companyid')
            ->where('project.status >',0)
            ->where('project.isentrance',0)
            ->search( $argc )
            ->orderBy('v.datetime','desc');
        if ( $action == 'export' ) {
            $data = $db->asObject()->findAll();
            foreach ( $data as $row ) {
                unset($row->id);
            }
            $real_path = $this->_mk();
            LibComm::ExportExcel(['客户', '业务单号', '付款日期', '类型','币种','汇率','金额','折RMB'],$data);return false;
        } else {
            $data = $db->paginates( $this->_page(), $this->_size() );
            $sum_data = $db->asArray()->select("sum(v.total_amount) as amount")
                ->join('customer as c','project.customerid=c.id')
                ->join("($sql) as v",'v.projectid=project.id','inner')
                ->whereAuth('project.customerid','project.companyid')
                ->where('project.status >',0)
                ->where('project.isentrance',0)
                ->search( $argc )->first();

            $data['sum'] = $sum_data ? $sum_data['amount'] : 0;
        }

        return $this->toJson($data);
    }

    // 加载毛利成本 数据
    public function load_maoli_data( $action = '' ){
        $this->actionAuth();
        $db = new \App\Models\Declares\Project();
        $P = $this->U();
        $company = $this->_company_data();
        $origin = $company[1];
        $companyname = $company[0];
        $argc = ['v.customerid'=>$P['customerid'],'v.datetime >='=> $P['sdate'] ,'v.datetime <=' => $P['edate']?($P['edate'] . ' 23:59:59'):''];

        $where = " trim(replace(payment.receivername,' ',''))='$companyname' or ".($origin ? (" trim(replace(payment.receivername,' ',''))='{$origin}'" ) : "");

        $sql = "select a.id,a.companyid,a.customerid,date_format(donetime,'%Y-%m-%d') as datetime,a.BusinessID,
                (
                    ifnull( (select sum(payment.amount * payment.exchangerate) from payment where payment.status > 0 and a.id=payment.projectid and (payment.type in(4,5) or ( $where ))) ,0) -
                    ifnull( (select sum(paymentcl.amount * paymentcl.exchangerate) from paymentcl where paymentcl.projectid=a.id) ,0) +
                    ifnull( (select sum(receipt.amount) from receipt where a.id=receipt.projectid and receipt.status > 0 and receipt.currency='USD') ,0) * ifnull(a.rate,0)
                ) as amount
                from project as a
                where a.status = 2
                group by a.id,a.BusinessID,a.companyid,a.customerid,datetime";

        $db->asObject()
            ->select("v.id,c.customername,v.BusinessID,v.datetime,'CNY' as currency,v.amount")
            ->from("($sql) as v",true)
            ->join('customer as c','v.customerid=c.id')
            ->search( $argc )
            ->whereAuth('v.customerid','v.companyid')
            ->orderBy('v.datetime','desc');
        if ( $action == 'export' ) {
            $data = $db->asObject()->findAll();
            foreach ( $data as $row ) {
                unset($row->id);
            }
            $real_path = $this->_mk();
            LibComm::ExportExcel(['客户', '业务单号', '完成日期','币种','毛利'],$data);return false;
        } else {
            $data = $db->paginates( $this->_page(), $this->_size() );
            $sum_data = $db->asArray()->select("sum(v.amount) as amount")
                ->from("($sql) as v",true)
                ->join('customer as c','v.customerid=c.id')
                ->whereAuth('v.customerid','v.companyid')
                ->search( $argc )->first();

            $data['sum'] = $sum_data ? $sum_data['amount'] : 0;
        }

        return $this->toJson($data);
    }

    // 加载实际退税 数据
    public function load_flatbk_data( $action = '' ){
        $this->actionAuth();
        $db = new \App\Models\Declares\Project();
        $P = $this->U();
        $argc = ['project.customerid'=>$P['customerid'],'a.exportdate >='=> $P['sdate'] ,'a.exportdate <=' => $P['edate']?($P['edate'] . ' 23:59:59'):''];

        $sql = "select projectid,sum(realityamount) as amount
                from receipt where status > 0 and realityamount > 0
                group by projectid";

        $db->asObject()
            ->select("project.id,c.customername,project.BusinessID,a.exportdate as datetime,'CNY' as currency,v.amount")
            ->join('entryform as a','a.projectid=project.id')
            ->join('customer as c','project.customerid=c.id')
            ->join("($sql) as v",'v.projectid=project.id','inner')
            ->whereAuth('project.customerid','project.companyid')
            ->where('project.status >',0)
            ->where('a.status >',0)
            ->where('project.isentrance',0)
            ->search( $argc )
            ->orderBy('a.exportdate','desc');
        if ( $action == 'export' ) {
            $data = $db->asObject()->findAll();
            foreach ( $data as $row ) {
                unset($row->id,$row->usage);
            }
            $real_path = $this->_mk();
            LibComm::ExportExcel(['客户', '业务单号', '出运日期', '币种','实际退税额'],$data);return false;
        } else {
            $data = $db->paginates( $this->_page(), $this->_size() );
            $sum_data = $db->asArray()->select("sum(v.amount) as amount")
                ->join('entryform as a','a.projectid=project.id')
                ->join('customer as c','project.customerid=c.id')
                ->join("($sql) as v",'v.projectid=project.id','inner')
                ->whereAuth('project.customerid','project.companyid')
                ->where('project.status >',0)
                ->where('a.status >',0)
                ->where('project.isentrance',0)
                ->search( $argc )->first();

            $data['sum'] = $sum_data ? $sum_data['amount'] : 0;
        }

        return $this->toJson($data);
    }

    // 加载 应退税额 数据
    public function load_viirefund_data($action = '' ) {
        $this->actionAuth();
        $db = new \App\Models\Declares\Project();
        $P = $this->U();
        $argc = ['project.customerid'=>$P['customerid'],'a.exportdate >='=> $P['sdate'] ,'a.exportdate <=' => $P['edate']?($P['edate'] . ' 23:59:59'):''];

        $sql = "select vii.projectid,sum((invoiceamount/ifnull((1+invoicer.viirate) ,1.13)) * vii.taxreturnrate) as amount
                from vii 
                left join invoicer on vii.invoicerid=invoicer.id
                where vii.status>0 
                group by projectid";

        $db->asObject()
            ->select("project.id,c.customername,project.BusinessID,a.exportdate as datetime,'CNY' as currency,v.amount")
            ->join('entryform as a','a.projectid=project.id')
            ->join('customer as c','project.customerid=c.id')
            ->join("($sql) as v",'v.projectid=project.id','inner')
            ->whereAuth('project.customerid','project.companyid')
            ->where('project.status >',0)
            ->where('project.viistatus',1)
            ->where('project.isentrance',0)
            ->search( $argc )
            ->orderBy('a.exportdate','desc');
        if ( $action == 'export' ) {
            $data = $db->asObject()->findAll();
            foreach ( $data as $row ) {
                unset($row->id,$row->usage);
            }
            $real_path = $this->_mk();
            LibComm::ExportExcel(['客户', '业务单号', '出运日期', '币种','应退税额'],$data);return false;
        } else {
            $data = $db->paginates( $this->_page(), $this->_size() );
            $sum_data = $db->asArray()->select("sum(v.amount) as amount")
                ->join('entryform as a','a.projectid=project.id')
                ->join('customer as c','project.customerid=c.id')
                ->join("($sql) as v",'v.projectid=project.id','inner')
                ->whereAuth('project.customerid','project.companyid')
                ->where('project.status >',0)
                ->where('project.viistatus',1)
                ->where('project.isentrance',0)
                ->search( $argc )->first();
            $data['sum'] = $sum_data ? $sum_data['amount'] : 0;
        }

        return $this->toJson($data);
    }

    // 加载 应退税额 数据
    public function load_viinotrefund_data($action = '' ) {
        $this->actionAuth();
        $db = new \App\Models\Declares\Project();
        $P = $this->U();
        $argc = ['project.customerid'=>$P['customerid'],'a.exportdate >='=> $P['sdate'] ,'a.exportdate <=' => $P['edate']?($P['edate'] . ' 23:59:59'):''];

        $sql2 = "select e.projectid from receipt e where e.usage=3 and e.status > 0 and realityamount = 0 group by e.projectid";

        $sql = "select vii.projectid,sum((invoiceamount/ifnull((1+invoicer.viirate) ,1.13)) * vii.taxreturnrate) as amount
                from vii 
                left join invoicer on vii.invoicerid=invoicer.id
                where vii.status>0 
                group by projectid";

        $db->asObject()
            ->select("project.id,c.customername,project.BusinessID,a.exportdate as datetime,'CNY' as currency,v.amount")
            ->join('entryform as a','a.projectid=project.id')
            ->join('customer as c','project.customerid=c.id')
            ->join("($sql) as v",'v.projectid=project.id')
            ->join("($sql2) as d",'d.projectid=project.id')
            ->whereAuth('project.customerid','project.companyid')
            ->where('project.status >',0)
            ->where('project.viistatus',1)
            ->where('project.isentrance',0)
            ->search( $argc )
            ->orderBy('a.exportdate','desc');
        if ( $action == 'export' ) {
            $data = $db->asObject()->findAll();
            foreach ( $data as $row ) {
                unset($row->id,$row->usage);
            }
            $real_path = $this->_mk();
            LibComm::ExportExcel(['客户', '业务单号', '出运日期', '币种','未退税额'],$data);return false;
        } else {
            $data = $db->paginates( $this->_page(), $this->_size() );

            $sum_data = $db->asArray()->select("sum(v.amount) as amount")
                ->join('entryform as a','a.projectid=project.id')
                ->join('customer as c','project.customerid=c.id')
                ->join("($sql) as v",'v.projectid=project.id')
                ->join("($sql2) as d",'d.projectid=project.id')
                ->whereAuth('project.customerid','project.companyid')
                ->where('project.status >',0)
                ->where('project.viistatus',1)
                ->where('project.isentrance',0)
                ->search( $argc )->first();
            $data['sum'] = $sum_data ? $sum_data['amount'] : 0;
        }
        return $this->toJson($data);
    }

    // 加载 应退税额 数据
    public function load_advancereceipt_data($action = '' ) {
        $this->actionAuth();
        $db = new \App\Models\Declares\Project();
        $P = $this->U();
        $argc = ['project.customerid'=>$P['customerid'],'a.exportdate >='=> $P['sdate'] ,'a.exportdate <=' => $P['edate']?($P['edate'] . ' 23:59:59'):''];

        $sql = "select receipt.projectid,receipt.currency,receipt.exchangerate,sum(receipt.amount) as amount,sum(receipt.amount * receipt.exchangerate) as total_amount
                from receipt 
                where receipt.status>0 and receipt.usage = 1
                group by receipt.projectid,receipt.currency,receipt.exchangerate";

        $db->asObject()
            ->select("project.id,c.customername,project.BusinessID,a.exportdate as datetime,v.currency,v.exchangerate,v.amount,v.total_amount")
            ->join('entryform as a','a.projectid=project.id')
            ->join('customer as c','project.customerid=c.id')
            ->join("($sql) as v",'v.projectid=project.id')
            ->whereAuth('project.customerid','project.companyid')
            ->where('project.status >',0)
            ->where('a.status >',0)
            ->where('project.isentrance',0)
            ->search( $argc )
            ->orderBy('a.exportdate','desc');
        if ( $action == 'export' ) {
            $data = $db->asObject()->findAll();
            foreach ( $data as $row ) {
                unset($row->id,$row->usage);
            }
            $real_path = $this->_mk();
            LibComm::ExportExcel(['客户', '业务单号', '出运日期', '币种','汇率','预收货款','折RMB'],$data);return false;
        } else {
            $data = $db->paginates( $this->_page(), $this->_size() );
            $sum_data = $db->asArray()->select("sum(v.total_amount) as amount")
                ->join('entryform as a','a.projectid=project.id')
                ->join('customer as c','project.customerid=c.id')
                ->join("($sql) as v",'v.projectid=project.id')
                ->whereAuth('project.customerid','project.companyid')
                ->where('project.status >',0)
                ->where('a.status >',0)
                ->where('project.isentrance',0)
                ->search( $argc )->first();
            $data['sum'] = $sum_data ? $sum_data['amount'] : 0;
        }
        return $this->toJson($data);
    }

    #endregion

    #region 图表
    public function charts(){
        $this->actionAuth();
        $data['charts_entry'] = $this->charts_total(0);
        $data['charts_vii'] = $this->charts_total(1);

        $data['charts_entry_recently'] = $this->charts_recently_last(0);
        $data['charts_vii_recently'] = $this->charts_recently_last(1);

        $data['charts_payer_limit'] = $this->charts_limit(0);
        $data['charts_receiver_limit'] = $this->charts_limit(1);

        return $this->toJson($data);
    }

    // 报关总额
    protected function charts_total( $type = 0 ){
        $db = new \App\Models\Form();
        if($type == 0) {
            $db->select("
            round(sum((select sum(goods.ProductUnitPrice*goods.ProductAmount) from goods where goods.projectid=a.projectid and a.currency = 'USD')),2) as bgamt,
            round(sum((select sum(receipt.amount) from receipt where receipt.projectid = a.projectid and receipt.currency = 'USD' and receipt.status>0)),2) as ramt
            ");

        }else{
            $db->select("
                round(sum( (select sum(vii.invoiceamount) from vii where vii.projectid=a.projectid)),2) as viiamt,
                round(sum( (select sum(receipt.amount * receipt.exchangerate) from receipt where receipt.projectid = a.projectid and receipt.status>0)),2) as ramt
            ");
        }

        $data['data'] = $db
            ->from('entryform a',true)
            ->join('project b','a.projectid = b.id')
            ->whereIn('b.status',[1,2])
            ->whereAuth('b.customerid','b.companyid')
            ->first();

        return ($data);
    }
    //
    protected function charts_recently_last($type = 0){
        $db = new \App\Models\Form();
        if($type == 0){
            $result1 = $db->select("
            date_format(a.exportdate,'%Y-%m') as dt,
            round(sum((select sum(goods.ProductUnitPrice*goods.ProductAmount) from goods where goods.projectid=a.projectid and a.currency = 'USD')),2) as amt")
                ->asArray()
                ->from('entryform as a',true)
                ->join('project as b','a.projectid = b.id')
                ->whereIn('b.status',[1,2])
                ->where('a.exportdate > date_add(now(),INTERVAL -7 MONTH)')
                ->where('a.exportdate < date_add(curdate(), interval - day(curdate()) + 1 day)')
                ->whereAuth('b.customerid','b.companyid')
                ->groupBy('dt')->findAll();

            $result2 = $db->select("date_format(a.receiptdate,'%Y-%m') as dt,sum(a.amount) as ramt")
                ->from('receipt as a',true)
                ->asArray()
                ->where(['a.currency' => 'USD' , 'a.status'=>0])
                ->where("a.receiptdate > date_add(now(),INTERVAL -7 MONTH)")
                ->where('a.receiptdate < date_add(curdate(), interval - day(curdate()) + 1 day)')
                ->whereAuth('a.customerid','a.companyid')
                ->groupBy('dt')->findAll();


        }elseif($type == 1){
            $result1 = $db->select("date_format(createtime,'%Y-%m') as dt,round(sum(invoiceamount)) as amt")
                ->from('vii',true)
                ->asArray()
                ->where('createtime > date_add(now(),INTERVAL -7 MONTH)')
                ->where('createtime < date_add(curdate(), interval - day(curdate()) + 1 day)')
                ->whereAuth('customerid','companyid')
                ->groupBy('dt')->findAll();

            $result2 = $db->select("date_format(paymentdate,'%Y-%m') as dt,round(sum(amount * exchangerate)) as ramt")
                ->from('payment',true)
                ->asArray()
                ->where('paymentdate > date_add(now(),INTERVAL -7 MONTH)')
                ->where('paymentdate < date_add(curdate(), interval - day(curdate()) + 1 day)')
                ->whereAuth('customerid','companyid')
                ->groupBy('dt')->findAll();
        }


        $m6 = $this->_get_datew(6);

        $resp = [];

        $sk = $type ? 'viiamt' : 'bgamt';

        foreach($m6 as $k=>$v){
            $resp[$k]['dt'] = $v;
            $resp[$k][$sk] = 0;
            $resp[$k]['ramt'] = 0;

            foreach($result1 as $row1){
                if($row1['dt'] == $v) {
                    $resp[$k][$sk] = $row1['amt'];
                }
            }

            foreach($result2 as $row2){
                if($row2['dt'] == $v) {
                    $resp[$k]['ramt'] = $row2['ramt'];
                }
            }
        }

        return $resp;
    }

    // 排行
    protected function charts_limit($type = 0){
        $db = new \App\Models\Form();
        if($type == 0){
            $data = $db->select('payername as name,round(sum(amount),2) as value,count(1) as c')
                ->from('receipt',true )
                ->where('status > 0')
                ->where('currency','USD')
                ->orderBy('value','desc')
                ->whereAuth('customerid')
                ->groupBy('payername')->findAll(10);
        } else {
            $data = $db->select('receivername as name,round(sum(amount*exchangerate),2) as value,count(1) as c')
                ->from('payment' ,true )
                ->where('status > 0')
                ->where('type',1)
                ->whereAuth('customerid')
                ->orderBy('value','desc')
                ->groupBy('receivername')->findAll(10);
        }
        return $data;
    }
    //
    private function _get_datew($month = 6){
        $months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $arr = []; $current_month = date('m',time()); $year = date('Y',time());
        $pos = find_by_array_flip($months,$current_month);

        for($i = 1;$i <= $month;$i++){
            if($pos - $i >= 0){
                $arr[] = $year.'-'.$months[($pos-$i)];
            }else{
                $arr[] = ($year-1).'-'.$months[12-($i-$pos)];
            }
        }
        $arr = array_reverse($arr);
        return $arr;
    }


    #endregion

    private function _mk(){
        $real_path = WRITEPATH.'uploads/download/';
        if (!file_exists($real_path))  mkdir($real_path, 0777, true);
        return $real_path;
    }
}
