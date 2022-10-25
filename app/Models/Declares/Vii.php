<?php namespace App\Models\Declares;

use CodeIgniter\Database;
use CodeIgniter\Model;

class Vii extends \App\Models\BaseModel
{
    protected $table = 'vii';
    protected $primaryKey = 'id';
    protected $allowedFields = ['projectid', 'companyid', 'customerid','productid', 'invoicerid', 'amount', 'entryform', 'status', 'taxreturnrate', 'taxaddrate', 'invoiceamount', 'taxamount', 'unit', 'type', 'confirmer', 'viiimage', 'copysessionid', 'note', 'productname', 'contactbank', 'contactaddress', 'taxno', 'approvedt', 'createtor', 'invoicer'];

    protected $beforeInsert = ['data_before'];
    protected $beforeUpdate = ['data_before'];

    protected $afterInsert = ['after'];
    protected $afterUpdate = ['after'];

    // 保存前
    protected function data_before(array $array) {
        $this->setCustCom( $array );
        $taxrate = 1.13;
        if ( array_key_exists('invoicerid',$array['data']) ) {
            $db = new \App\Models\Setup\Invoicer();
            $taxrate_data = $db->where('id',$array['data']['invoicerid'])->first() ;
            $taxrate = ($taxrate_data ? (1 + floatval( $taxrate_data["viirate"] ) ) : 1.13);
        }

        // 退税
        if ( array_key_exists('invoiceamount',$array['data']) ) {
            $array['data']['taxamount'] = ( ($array['data']['invoiceamount'] / $taxrate) * $array['data']['taxreturnrate'] );
        }
        // log_message('error','vii_data_before:'.json_encode($array));

        return $array;
    }

    // 保存后 ( 通知 )
    protected function after(array $arr){
        $isentrance = $arr['data']['isentrance'] ?? 0;
        $data = $arr['data']; $Id = is_array( $arr['id'] ) ? $arr['id'][0] : $arr['id'] ; $TOPIC = null;  $Opt = 1; // 0: 只读操作 ,1 : 操作
        $RecType = 0;             // 0: 企业, 1: 客户
        log_message('error','vii_after:'.json_encode($arr['data']));
        // 是否存状态
        if ( array_key_exists('status', $data ) ) {
            switch ( $data['status'] ) {
                case '1':       // 客户提交增票,待财务编辑或确认
                    if ( $data['isentrance'] == 1 ) {
                        $TOPIC = 'TOPIC_APPLY_VII_ENTRANCE';
                    } else {
                        //先为客户添加查看型通知
                        $TOPIC = 'TOPIC_APPROVE_VII';
                        notice_add($TOPIC,$Id, 'vii', '/notices/vii', 0, 1);
                    }
                    break;
                case '2':       // 客户提交增票,待财务编辑或确认
                    if ( ckAuth('finance') ) {
                        $TOPIC = 'TOPIC_CONFIRM_VII'; $RecType = 2;
                    } else {
                        $TOPIC = 'TOPIC_CONFIRM_VII';
                    }
                    break;
                case '3':       // 已确认增票
                    $TOPIC = 'TOPIC_CONFIRMED_VII';$Opt = 0;$RecType = 2;
                    break;
                case '4':       // 申请查看增票
                    $TOPIC = 'TOPIC_APPLY_VII';
                    break;
                case '5':       // 已上传增票
                    $TOPIC = 'TOPIC_UPLOADED_VII'; $RecType = 1;
                    break;
                default:
                    break;
            }
            if (array_key_exists("status", $data ) && $data['status'] == 1 && !$isentrance){
                // 增加通知
                notice_add($TOPIC, $Id, 'vii', '/notices/vii', $Opt, $RecType);
            }else{
                // 增加通知
                notice_add($TOPIC, $Id, 'vii', '/notices/vii', $Opt, $RecType);
            }
        }
        return $arr;
    }

    // 转出转入 金额数量有效校验
    public function available_vii_balance($id, $amount, $count){
        if ( $data = $this->where('id',$id)->first() ) {
            if ( (empty($data['copysessionid']) || $data['copysessionid'] == 0 ) ) {
                return $data['invoiceamount'] >= $amount && $data['amount'] >= $count;
            }
            $temp_data = $this->select('sum(invoiceamount) as usum,sum(amount) as amount')->where('copysessionid',$data['copysessionid'])->first();
            return $temp_data && ( $temp_data['usum'] >= $amount ) && ( $temp_data['amount'] >= $count );
        }
        return false;
    }

    // 汇总增票总额
    public function collect_to( $param ){
        $data = $this->select('sum( invoiceamount ) as amount')
            ->search( $param )
            ->where('status >',0)->first();
        return $data ? $data['amount'] : 0;
    }
}
