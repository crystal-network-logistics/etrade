<?php
namespace App\Controllers\Declares;
use App\Controllers\Base;

class Claim extends Base {
    protected $db;
    function __construct() {
        $this->db = new \App\Models\Declares\Claim();
    }

    // 申领保存
    public function save( $action = '' ){
        $this->actionAuth();
        $P = $this->U();
        if ( $this->request->getMethod() == 'post' ) {
            $P['createdat'] = time();
            $P['status'] = 0;
            // 保存申领
            if ( $this->db->save( $P )) {
                if ($P['tag']) {
                    $payer_db = new \App\Models\Setup\Payer();
                    $payer_argc = [
                        'name' => $P['payername'],
                        'region' => $P['payercountry'],
                        'customerid' => $P['customerid'],
                        'bankname' => $P['bank'],
                        'account' => $P['bankaccount'],
                        'createdtype' => 1,
                        'currency' => $P['currency']
                    ];
                    // 保存付款人信息
                    if ($payer_data = $payer_db->where(['name' => $P['payername'], 'customerid' => $P['customerid']])->first()) {
                        $payer_argc['id'] = $payer_data['id'];
                    }
                    $payer_db->save($payer_argc);
                }
                return $this->toJson($action?'申领已保存':'收入申领成功,请耐心等待');
            }
        }
        return $this->setError($action?'申领保存失败':'申领失败');
    }

    // 申领记录
    public function load_page(){
        $this->actionAuth();
        $P = $this->U();

        $argc = [ 'keys' => $P['keys'],
            'searchField' => 'payername,bank,bankaccount'];

        if ( $P['projectid'] ) {
             $sql = "((receiptclaim.customerid='{$P['customerid']}' and ifnull(projectid,0)=0) or projectid='{$P['projectid']}')";
        } else {
            if ( $P['customerid'] ) $sql = "(receiptclaim.customerid='{$P['customerid']}' and projectid=ifnull(projectid,0))";
            else $sql = "(projectid=ifnull(projectid,0))";
        }

        if ( ckAuth(false) ) $this->db->whereAuth('receiptclaim.customerid','receiptclaim.companyid');

        $data = $this->db->select('receiptclaim.*,b.BusinessID,c.customername')->asObject()
            ->join('project as b' , 'receiptclaim.projectid=b.id','left')
            ->join('customer as c' , 'receiptclaim.customerid=c.id','left')
            ->whereIn('receiptclaim.status',[0,1])
            ->where($sql)
            ->search($argc)
            ->orderBy('receiptclaim.createtime','desc')
            ->orderBy('receiptclaim.status','asc')
            ->paginates($this->_page(),$this->_size());
        //log_message('error',$this->db->getLastQuery());
        foreach ( $data['data'] as $row ) {
            $row->createtime = date('Y-m-d',strtotime($row->createtime));
        }

        return $this->toJson($data);
    }

    // 申领审核
    public function approve(){
        $this->actionAuth(true);
        if ( $claim_data = $this->ck_auth_data( $this->db, $P = $this->U()) ) { //$this->db->where('id',$P['id'])->first() ){
            // 审核
            if ($this->request->getMethod() == 'post') {
                $P['claimid'] = $P['id']; unset($P['id']);
                $db = new \App\Models\Declares\Receipt();
                $P['status'] = 1; $P['approved'] = 0; $P['usage'] = $P['usage']??1;
                if ( empty( $P['projectid'] ))  {
                    $P['status'] = 0; $P['projectid'] = null;
                }
                if ( ckAuth('finance') ) $P['approved'] = 1;

                if ( $db->save($P) ) {
                    $claim_data['status'] = 1;
                    $this->db->save( $claim_data );
                    return $this->toJson('审核通过!');
                }
                return $this->setError('审核失败!');
            }

            $db = new \App\Models\Declares\Project();

            if ( $project_data = $db->where('id',$P['projectid'])->first()) {
                $P['isentrance'] = $project_data['isentrance'];
            }

            unset($P['id'],$P['projectid']);
            $P['status'] = 1;
            $P['isentrance'] = $P['isentrance']??0;
            $P['customerid'] = $claim_data['customerid'];
            $data['project'] = $db->available_projects($P);
            $data['claim_data'] = $claim_data;

            return $this->render(
                [ 'view_path' => '/Declares/Claim/approve','data' => $data ]
            );
        }
        return $this->setError('参数错误!');
    }

    // 取消申领
    public function cancel() {
        $this->actionAuth(true);
        if ( $claim_data = $this->ck_auth_data( $this->db, $P = $this->U()) ) { //$this->db->where('id',$this->U('id'))->first() ){
            $claim_data['status'] = -1;
            if ( $this->db->save( $claim_data ) ) {
                delete_notify( $claim_data['id'],['TOPIC_RECEIPTCLAIM_APPROVE']);
                return $this->toJson('申领已取消');
            }
        }
        return $this->setError('取消失败');
    }

    // 删除申领
    public function delete() {
        $this->actionAuth(true);
        if ( $claim_data = $this->ck_auth_data( $this->db, $P = $this->U()) ) { //$this->db->where('id',$this->U('id'))->first() ){
            if (ckAuth() && $claim_data['customerid'] != session('custId'))
                return $this->setError('删除失败');
            // 删除
            if ( $this->db->where('id',$this->U('id'))->delete() ) {
                delete_notify( $claim_data['id'],['TOPIC_RECEIPTCLAIM_APPROVE']);
                return $this->toJson('申领删除');
            }
        }
        return $this->setError('删除失败');
    }

    // 编辑
    public function update(){
        $this->actionAuth(true);
        if ( $claim_data = $this->ck_auth_data( $this->db, $P = $this->U()) ) { //$this->db->where('id',$P['id'])->first() ){
            $data['detail'] = $claim_data;
            return $this->render([
                'data' =>$data
            ]);
        }
        return '编辑失败,请检查参数是否正确';
    }
}
