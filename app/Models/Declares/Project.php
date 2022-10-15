<?php namespace App\Models\Declares;

use App\Libraries\LibForm;
use CodeIgniter\Database;
use CodeIgniter\Model;

class Project extends \App\Models\BaseModel
{
    protected $table = 'project';
    protected $primaryKey = 'id';
    protected $allowedFields = ['BusinessID', 'customerid', 'status', 'taxrefund', 'taxrefundreason', 'taxrefundamount', 'receiptstatus', 'paymentstatus', 'viistatus', 'paymentclstatus', 'remark', 'rate', 'donetime', 'createtime', 'companyid', 'taxrefunddt', 'receiptdt', 'paymentdt', 'paymentctldt', 'viidt', 'isentrance', 'diy', 'chinaport'];

    protected $beforeUpdate = ['data_before'];
    protected $beforeInsert = ['data_before'];

    // 插入前
    protected function data_before(array $array) {
        $this->setCustCom( $array );
        log_message('error','data_before_begin:'.json_encode($array));
        // 判断 生成 businessId
        if (array_key_exists('isentrance', $array['data']) &&array_key_exists('customerid', $array['data']) && array_key_exists('status', $array['data']) ) {
            $businessId = $this->_render_businessId( ['id' => $array['id'][0] , 'isentrance' => $array['data']['isentrance'],'status' => $array['data']['status'] ,'customerid' => $array['data']['customerid']] );
            $array['data']['BusinessID'] = $businessId?$businessId:random_int(100000,999999);
        }

        // 更新 业务单
        if ( isset($array['id'])  && $array['id'][0] ) {
            $data = $array['data'];
            $project_data = $this->where('id', $array['id'][0])->first();

            // 比较状态是否一致
            function compare ( $data ,$project_data , $status = 'status' ) {
                return ( $project_data && $data[$status] != $project_data[$status] ) ? true : false;
            }

            $customer_db = new \App\Models\Setup\Customer();
            // 客户信息
            $customer_data = $customer_db->where('id', $array['data']['customerid'])->first();

            if ( $customer_data && $project_data ) {
                // 获取公司信息
                $comp = get_company($project_data['companyid']);
                //确认收齐
                if( array_key_exists('receiptstatus',$data) && $data['receiptstatus'] == 1 && compare($data,$project_data,"receiptstatus") ){
                    $payment_db = new \App\Models\Declares\Payment();

                    // 代理费
                    $amount = receipt_sum(['projectid'=>$project_data['ID'],'usage'=>1,'approved'=>1 , 'customerid' => $data['customerid'],'status >'=>0],0);
                    // 支付情况
                    $payment = [ 'id'=>0,'projectid'=>$project_data['ID'],
                        'receiver_tag'=>1,'type'=>4,
                        'receivername'=> $comp ? ($comp['shortname']??$comp['acname']) : '--',
                        'bank'=> $comp ? $comp['bkname'] : '--',
                        'bankaccount'=> $comp ? $comp['account'] : '--',
                        'currency'=>'CNY','note'=>'代理费','customerid' => $data['customerid'],
                        'amount'=> ( $customer_data['commissionfeemin'] > $amount ) ? $customer_data['commissionfeemin'] : $amount,
                        'paymentdate'=>date('Y-m-d'),'approvedt'=>date('Y-m-d'),'exchangerate'=>1,'status'=>1,'transfer'=>0
                    ];
                    if ( $payment_data = $payment_db->where(['projectid'=>$project_data['ID'],'note'=>'代理费','type' => 4])->first() ){
                        $payment['id'] = $payment_data['id'];
                    }
                    log_message('error','代理费:'.json_encode($payment));
                    @balancelog_start( $project_data['ID'] );
                    // 保存支付方式
                    $payment_db->save( $payment );
                    @balancelog_end( $project_data['ID'], '费用支付');
                }

                // 已申请退税
                if( array_key_exists("taxrefund",$data) && $data['taxrefund'] == 3 && compare($data,$project_data,"taxrefund") ){ //$data['taxrefund'] != $project_data['taxrefund']
                    notice_add('TOPIC_APPLY_TAXREFUND',$project_data['ID'],'project','/notices/project',0,1);
                }
                // 退税
                if( array_key_exists("taxrefund",$data) && $data['taxrefund'] == 4  && compare($data,$project_data,"taxrefund") ){
                    $payment_db = new \App\Models\Declares\Payment();
                    $receipt_db = new \App\Models\Declares\Receipt();

                    //退税操作
                    $receipt_argc = [
                        'id'=>0,'customerid'=>$data['customerid'] ?? $customer_data['id'],
                        'payername'=>'无','payercountry'=>0,'projectid'=>$project_data['ID'],
                        'amount'=>$this->tax_amount( $project_data ),
                        'currency'=>'CNY','note'=>'退税','exchangerate'=>1,'createdat'=>time(),
                        'receiptdate'=>date('Y-m-d'),'status'=>1,'vii'=>1,'accounttype'=>1,'usage'=>3,'approved'=>1];
                    //判断是否存在
                    if ( $receipt_data = $receipt_db->where(['projectid'=>$project_data['ID'],'usage'=>3,'vii'=>1])->first() ) {
                        $receipt_argc['id'] = $receipt_data['id'];
                    }

                    @balancelog_start( $project_data['ID'] );
                    //退税额更新
                    $data['taxrefundamount'] = $receipt_argc['amount'];
                    //保存,写通知（Code）
                    $receipt_db->save($receipt_argc);
                    @balancelog_end( $project_data['ID'] ,'退税收入',null,null,$receipt_argc['amount']);

                    $second_start = $GLOBALS['balancelog_start'] + $receipt_argc['amount'];

                    //退税融资费
                    $amount = receipt_sum(['projectid'=>$project_data['ID'],'customerid' => $project_data['customerid'],'usage'=>3,'approved'=>1,'status >' => 0],1);
                    $payment_argc = [
                        'id'=>0,'projectid'=>$project_data['ID'],
                        'receivername'=> $comp ? ($comp['shortname']??$comp['acname']) : '--',
                        'bank'=> $comp ? $comp['bkname'] : '--',
                        'bankaccount'=> $comp ? $comp['account'] : '--',
                        'currency'=>'CNY','note'=>'退税融资费','customerid' => $data['customerid'],
                        'amount'=>( $customer_data['taxrefundfeemin'] > $amount ) ? $customer_data['taxrefundfeemin'] : $amount,
                        'paymentdate'=>date('Y-m-d'),'approvedt'=>date('Y-m-d'),
                        'exchangerate'=>1,'status'=>1,'receiver_tag'=>1,'type'=>5,'transfer'=>0];

                    if ( $payment_data = $payment_db->where(['projectid'=>$project_data['ID'],'note'=>'退税融资费','type' => 5,'status'=>1])->first() ){
                        $payment['id'] = $payment_data['id'];
                    }
                    @balancelog_start( $project_data['ID'] );
                    //写通知（Code）
                    $payment_db->save( $payment_argc );

                    @balancelog_end( $project_data['ID'] ,'费用支出',null,null,0 - ( $payment_argc['amount']) ,$second_start);
                    // 通知相关
                    notice_add('TOPIC_APPROVED_TAXREFUND', $project_data['ID'] ,'project','/notices/project',0,2);
                }

                //拒绝退税申请
                if(array_key_exists("taxrefund",$data) && $data['taxrefund'] == 5  && compare($data,$project_data,"taxrefund") ){
                    notice_add('TOPIC_REJECTED_TAXREFUND', $project_data['ID'] ,'project','/notices/project',0,2);
                }

                //确认付清
                if(array_key_exists("paymentstatus",$data) && $data['paymentstatus'] == 1 && compare($data,$project_data,"paymentstatus") ){ // $data['paymentstatus'] != $project_data['paymentstatus']
                    $data['status'] = 2;
                }
            }
            $array['data'] = $data;
        }

        log_message('error','project_data_before:'.json_encode($array));
        return $array;
    }

    // 获取业务单详情
    public function get_data($id,$companyname = '一贸通'){
        $db = new \App\Models\Setup\Company();
        $company_data = $db->where('id',session('company'))->first();
        $origin = '';
        if( $company_data ){
            $companyname = $company_data["shortname"]?:$company_data["name"];
            if(strpos($companyname,'澳陆') !== false || strpos($companyname,'遥通') !== false){
                $origin = $companyname;
                $companyname = '一贸通';
            }
        }
        //trim(replace(payment.receivername,' ','')) = '一贸通' or  trim(replace(payment.receivername,' ','')) = '上海澳陆供应链管理有限公司'
        $data = $this->where('id',$id)->first();
        $where = " trim(replace(payment.receivername,' ',''))='$companyname' or ".($origin ? (" trim(replace(payment.receivername,' ',''))='{$origin}'" ) : "");
        //log_message('error','where:'.$where);
        $amt = $db->select('sum(payment.amount*exchangerate) as amt')
                ->from('payment',true)
                ->where(['status>='=>1,'projectid'=>$id])
                //->where('(type in(4,5) or trim(replace(receivername," ",""))= \''.$companyname.($origin ? ("' or trim(replace(receivername,' ','')) =  '".$origin) : '' ).'\' )')
                ->where("( $where )")
                ->first();
        //log_message('error',$this->getLastQuery());

        $data['ymt_amount'] = $amt ? $amt['amt'] : 0;
        return $data;
    }

    // 有效业务单
    public function available_projects( $Id ){
        
        if ( is_numeric($Id) && $data = $this->where('id',$Id)->first() ) {
            $this->where([ 'customerid'=>$data['customerid'],'isentrance' => $data['isentrance'] , 'status' => 1, 'id <>'=>$Id]);
        }
        
        if ( is_array( $Id ) ) {
            $this->search($Id);
        }
        $data = $this->orderBy('BusinessID','desc')->findAll();
        return $data;
    }

    //获取本单余额信息
    public function get_project_amount( $id ){
        $receipt_sum = $payment_sum = $vii_sum = $vii_taxrate_sum = 0;

        if ( $receipt_data = $this->select('sum( amount * exchangerate ) as amount')->from('receipt',true)
            ->where(['status>'=>0,'approved'=>1,'projectid' => $id,'vii' => 0])->first() )
            $receipt_sum = $receipt_data['amount']??0;

        if ( $payment_data = $this->select('sum( amount * exchangerate ) as amount')->from('payment',true)
            ->where(['status>='=>0,'projectid'=>$id])->first() )
            $payment_sum = $payment_data['amount'];

        if ( $vii_data = $this->select('sum( invoiceamount ) as amount,sum(invoiceamount/(1+c.viirate) * a.taxreturnrate) as TaxSum,sum(a.taxamount) as taxamount')
            ->from('vii a',true)
            ->join('project b','a.projectid=b.id')
            ->join('invoicer c','a.invoicerid=c.id','left')
            ->where(['a.projectid'=>$id,'b.taxrefund'=>4])
            ->first()) {
            $vii_taxrate_sum = $vii_data ? $vii_data['taxamount'] : 0;
        }

        return ['receipt_sum'=>($receipt_sum),'payment_sum'=>($payment_sum),'vii_taxrate_sum' => ($vii_taxrate_sum),'total_sum'=>( $receipt_sum + $vii_taxrate_sum - $payment_sum )];
    }

    // 保存
    public function submits( $form ){
        // 保存业务单相关
        if( $this->save( ['id'=>$form['ID'],'customerid' => $form['customerid'],'status' => $form['status'],'isentrance' => $form['isentrance']] ) ) {
            $form['projectid'] = $form['ID'] ?$form['ID']:$this->getInsertID();
            $form['status'] = ( $form['status'] == 0 ) ? 1 : 2;

            $entry_db = new \App\Models\Declares\Entry();
            $goods_db = new \App\Models\Declares\Goods();
            unset( $form['id'] ,$form['ID'] );

            $form['id'] = 0;    // 清空 业务 ID
            if ( $enty = $entry_db->where('projectid',$form['projectid'])->first() ) {
                $form['id'] = $enty['id'];
            }
            // 保存报关信息
            $entry_db->save( $form );
            // 保存商品信息
            if ( $form['Goods'] ) $goods_db->batch_save( $form['projectid'] , $form['customerid'] ,$form['Goods'] );
            
            return $form['projectid'];
        }
        
        return false;
    }

    // 退税额
    public function tax_amount( $project_data ){
        if( $project_data['taxrefund'] == 4 ){
            $db = new \App\Models\Declares\Vii();
            $data = $db->select('sum(taxamount) as vsum')->where('projectid',$project_data ['id'])->first();
            return $data ? $data['vsum'] : 0;
        }
        return 0;
    }

    // 可用资金
    public function balance( $customerId , $allocated = 2,$Id = 0 ) {
        $paymentsum = 0;$receiptsum=0;$tuishui = 0;

        $this->select('ifnull(sum(amount*exchangerate),0) as psum')
            ->from('payment a',true)
            ->join('project b', 'b.ID = a.projectid')
            ->where(['b.status'=>1,'a.status>='=>1]);

        if( $customerId ){
            $this->where('a.customerid',$customerId);
        }  else {
            $this->whereAuth('a.customerid','a.companyid');
        }

        $payment = $this->first();

        $paymentsum = $payment?$payment['psum']:0;

        // 退税额
        $this->select('ifnull(sum( invoiceamount/ (1 + c.viirate) * taxreturnrate ),0) as tamt ,ifnull(sum(taxamount),0) as taxamount')
            ->from('vii a',true)
            ->join('project b', 'b.ID = a.projectid','left')
            ->join('invoicer c','a.invoicerid=c.id','left')
            ->where(['b.status'=>1,'b.taxrefund'=>4]);
        if ( $customerId ){
            $this->where('b.customerid',$customerId);
        } else {
            $this->whereAuth('a.customerid','a.companyid');
        }
        $vii = $this->first();

        $tuishui = $vii?($vii['taxamount']):0;

        //  每单余额
        if($allocated==1) {
            $this->select('ifnull(sum(amount*exchangerate),0) as rsum')
                ->from('receipt',true)
                ->join('project','receipt.projectid=project.id')
                ->where('receipt.status > 0')
                ->where('project.status',1)
                ->where('vii',0)
                ->where('projectid is not null and projectid > 0')
                ->where('approved',1);
            if( $customerId > 0 ){
                $this->where('receipt.customerid',$customerId);
            } else {
                $this->whereAuth('receipt.customerid','receipt.companyid');
            }

            $receipt = $this->first();

            if( $receipt )
                $receiptsum = $receipt['rsum'];
        }

        //已分配
        else if( $allocated == 2 ) {
            if (!$customerId) {
                $this->whereAuth('customerid','companyid');
            } else {
                $this->where('customerid',$customerId);
            }
            $receipt = $this->select('ifnull(sum(amount*exchangerate),0) as rsum')
                ->from('receipt',true)
                ->where(['status >='=>0,'approved'=>1])
                ->first();
            if( $receipt ) {
                $receiptsum = $receipt['rsum'];$tuishui = 0;
            }
        }
        //付款与可用余额比较
        else if( $allocated == 3 ){
            $perBalance = $this->balance($customerId,1);
            $ulcBalance = $this->balance($customerId,0);
            $amt = $perBalance + $ulcBalance;

            $this->select('ifnull(sum(a.amount),0) as psum')
                ->from('payment a',true)
                ->join('project b', 'b.ID = a.projectid')
                ->where(['b.status'=>1,'a.status'=>0,'a.id <>'=>$Id]);
            if($customerId){
                $this->where('a.customerid',$customerId);
            } else {
                $this->whereAuth('a.customerid','a.companyid');
            }
            $notpay = $this->first();
            $temp_amount = $amt - ( $notpay ? ($notpay['psum']) : 0 );
            return $temp_amount;
        } else {
            //未分配
            $this->select('ifnull(sum(amount*exchangerate),0) as rsum')
                ->from('receipt',true)
                ->where(['vii'=>0,'approved'=>1])
                ->where('((status=0 or projectid is null or projectid = 0) and status != -1)');
            if($customerId){
                $this->where('customerid',$customerId);
            } else {
                $this->whereAuth('customerid','companyid');
            }
            $receipt = $this->first();
            if($receipt) {
                $receiptsum = $receipt['rsum'];
            }
            $paymentsum = 0; $tuishui = 0;
        }

        $amount = ( $receiptsum + $tuishui ) - $paymentsum;

        //log_message('error',"allocated:$allocated , customerId:$customerId ,  paymentsum:$paymentsum, receiptsum:$receiptsum , tuishui:$tuishui");

        return $amount;
    }

    // 生成业务单ID
    private function _render_businessId( $form ){
        $businessId = '';
        // 标识进口或出口
        if ( !array_key_exists('isentrance',$form) ) $form['isentrance'] = 0;
        $db = new \App\Models\Setup\Customer();
        // 判断是否存在业务单
        $data = $this->where('id',$form['id'])->first();
        // 业务单id
        $busId = $data ? ( strrpos($data["BusinessID"],'-') ) : false;
        // 符合条件
        if ( ( $data && $form['status'] > 0 && !$busId && $data["status"] == 0 ) || ( !$data && $form['status'] == 0 ) || ( !$data && $form['status'] == 1 )) {
            // 客户信息
            if ( ($customer_data = $db->where('id',$form['customerid'])->first()) && ( $form['status'] > 0 )) {
                $cust_no = $customer_data['customerno'] . ( intval( $form['isentrance'] == 1 ) ? '-IM' : '-' );
                $select_filed = "(REPLACE(BusinessID,'$cust_no','')) + 0 as PID";
                $max_data = $this->select("$select_filed")->where(['customerid' => $customer_data['id']])->like('BusinessID', $cust_no)->orderBy('PID', 'desc')->first();
                $businessId = $cust_no . ( $max_data ? ( $max_data['PID'] + 1 ) : '1' );
            }
        }
        return ( ($businessId && $data) || (!$data && $businessId)) ? $businessId : ($data ? $data['BusinessID'] : '');
    }
}
