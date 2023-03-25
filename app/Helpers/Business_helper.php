<?php
function vii_apply_taxrefund( $data ) {

    if ( !$data['project'] || !$data['entry'] ||
        $data['project']['taxrefund'] == 3 ||
        $data['project']['taxrefund'] == 4 ||
        $data['project']['receiptstatus'] == 0 ||
        $data['project']['viistatus'] == 0 ||
        $data['entry']['status'] != 5 )
        return false;

    $db = new \App\Models\Declares\Vii();

    if ( $db->where(['projectid'=>$data['project']['ID'], 'status <'=>3])->first() || !$db->where(['projectid'=>$data['project']['ID'], 'status >='=>3])->first() ) return false;

    if ( !$db->where(['projectid'=>$data['project']['ID'], 'status >='=>5])->first() ) return true;

    if ( ckAuth('admin') || ckAuth('all') ) return true;

    return true;
}

// 确认增票收齐判断
function confirm_finish_vii( $data ){
    if(!$data['project']) return false;

    if( $data['project']['viistatus'] == 1 ) return false;

    $db = new \App\Models\Declares\Vii();

    if($db->where(['projectid'=>$data['project']['ID'],'status<='=>2])) return false;

    if($db->where(['projectid'=>$data['project']['ID'],'status>'=>2])) return false;

    return true;
}

// 确认收齐权限判断
function confirm_receipt( $data ){
    if( !$data['project'] ) return false;
    $db = new \App\Models\Declares\Receipt();

    if( $db->where(['projectid'=>$data['project']['ID'],'approved' => 0])->first() ) return false;

    if( ckAuth('admin') || ckAuth('operator') || ckAuth('finance') || ckAuth('all')) {
        $receipt = $db->where(['projectid'=>$data['project']['ID']])->first();
        return $receipt && ( $data['entry'] ? true : false);
    }

    if( session('custId') == $data['project']['customerid'] ) {
        return $db->confirm_receipt($data);
    }
    return false;
}

// 确认收齐汇总
function receipt_sum( $argc , $fee = 0 ) {
    $db = new \App\Models\Declares\Receipt();
    return $db->receipt_sum( $argc , $fee );
}
// 确认付清
function confirm_payment($data,$im = null){
    if( !$data['project'] ) return false;
    $db = new \App\Models\Form();
    $is_has_not = $db->from('payment',true)->where(['projectid'=>$data['project']['ID'],'status'=>0])->first();
    $is_has = $db->from('payment',true)->where(['projectid'=>$data['project']['ID'],'status >='=>1])->first();
    if ( is_null($im) ){
        return !$is_has_not && $is_has && $data['project']['taxrefund'] == 4 && $data['project']['paymentstatus'] == 0;
    } else {
        return !$is_has_not && $is_has && $im >= 0 && $data['project']['paymentstatus'] == 0;
    }
}

// 余额日志
function balancelog( $pid = null , $amount = 0 , $comment = '' , $amount_to = 0 , $cid = null , $companyid = null ){
    $balance_db = new \App\Models\Declares\Balance();
    $project_db = new \App\Models\Declares\Project();

    if ( abs($amount) <= 0.01 ) return false;
    if ( $pid ) {
        if ( !is_numeric($amount) ) return false;
        if ( !$project_data = $project_db->where('id',$pid)->first() ) return false;
        $param = [
            'customerid' => $project_data['customerid'],
            //'companyid' => $project_data['companyid'],
            'balance_to' => $amount_to,
            'amount' => $amount,
            'comment' => $project_data['BusinessID'].'-'.$comment,];

        $param['balance_from'] = $param['balance_to'] - $param['amount'];
        $balance_db->save( $param );
    }else{
        if(!is_numeric($amount)) return false;
        $param = [
            'customerid' => $cid,
            //'companyid' => $companyid,
            'balance_to' => $amount_to,
            'amount' => $amount,
            'comment' => '暂未分配'.'-'.$comment,];
        $param['balance_from'] = $param['balance_to'] - $param['amount'];
        $balance_db->save( $param );
    }
    return true;
}

// 余额记录开始
function balancelog_start($projectId = null,$cid = null){
    $project_db = new \App\Models\Declares\Project();
    if ( $projectId ){
        if( !$project_data = $project_db->where('id',$projectId)->first()){
            return false;
        }
        global $balancelog_start;

        $balancelog_start = $project_db->balance( $project_data['customerid'] ,1 ) + $project_db->balance( $project_data['customerid'] ,0 );
    } else {
        global $balancelog_start;
        $balancelog_start = $project_db->balance($cid,1) + $project_db->balance($cid,0);
    }
    return true;
}

// 余额记录结束
function balancelog_end( $projectId = null , $comment = '', $cid = null , $companyid = null , $amount = null , $start = null ){
    $project_db = new \App\Models\Declares\Project();
    if ( $projectId ){
        if( !$project_data = $project_db->where('id',$projectId)->first()){
            return false;
        }
        $balancelog_end = $project_db->balance( $project_data['customerid'] ,1 ) + $project_db->balance( $project_data['customerid'] ,0);
        if($GLOBALS['balancelog_start'] != $balancelog_end || $amount){
            if($amount) @balancelog($projectId,$amount,$comment,($start ? $start : $balancelog_end) + $amount);
            else @balancelog($projectId,$balancelog_end-$GLOBALS['balancelog_start'],$comment,$balancelog_end);
        }
    }else{
        $balancelog_end = $project_db->balance($cid,1) + $project_db->balance($cid,0);
        if($GLOBALS['balancelog_start'] != $balancelog_end){
            @balancelog($projectId,$balancelog_end-$GLOBALS['balancelog_start'],$comment,$balancelog_end,$cid,$companyid);
        }
    }
    return true;
}

// 添加通知
function notice_add(
    $Key,
    $RelationId,    // 关联ID
    $Relationtalbe, // 关联表
    $Url,           // 通知地址
    $Opt = 0,       // 操作类型  0: 只读, 1 : 操作
    $RecType = 0    // 接收端  0 : 企业端, 1 : 客户端,2 : 都有
){
    if( $Key && $RelationId ) {
        $notice_db = new \App\Models\Message\Notify();
        $argc = [
            'id' => 0,
            'notificationid' => rand(100000, 999999),
            'topickey' => $Key,
            'message' => \App\Libraries\LibComm::$tipic[$Key]['name'],
            'url' => $Url,
            'type' => $Opt,
            'relationid' => $RelationId,
            'relationtb' => $Relationtalbe
        ];

        $Users = notice_role_users($RelationId, $Relationtalbe, $Key, $RecType);

        foreach ($Users as $row) {
            if ( $row['receiverid'] && $row['receiverid'] != session('id') ) {
                $argc = array_merge($argc,$row);
                log_message('error','notice_add_argc:'.json_encode($argc));
                $notice_db->save($argc);
            }
        }
    }
}

// 获取需要发送通知的用户ID
function notice_role_users($RelationId,$RelationTb,$key,$RecType){
    $session = \CodeIgniter\Config\Services::session();
    $user_db = new \App\Models\Admin\Users();
    $db = new \App\Models\Form();
    // 删除通知
    delete_notice(['relationid'=>$RelationId,'relationtb'=>$RelationTb]);
    // 表信息
    $data = $db->from($RelationTb,true)->where(['id'=>$RelationId])->first();
    $argc = ['companyid'=>$data['companyid'],'customerid'=>($data['customerid']?:0),'type'=>($RecType == 2) ? ['ent','customer'] : (($RecType == 0) ? 'ent' : 'customer')];
    log_message('error','users_argc:'.json_encode($argc));
    if ( $RelationTb == 'customer') {
        $argc['customerid'] = $data['id']; $data['customerid'] = $data['id'];
    }
    if ( $RecType == 0 ){
        unset($argc['customerid']);
    }
    if ( $RecType != 2 ){
        $user_data = $user_db->asArray()->search( $argc )->findAll();
    }
    if( $RecType == 2 ){
        $user_data = $user_db->asArray()->where("companyid='{$data['companyid']}' and ( ( type = 'ent') or ( type='customer' and customerid='{$data['customerid']}'))")->findAll();
    }
    $users = [];
    foreach( $user_data as $items ){
        // 判断是否存在 业务员或操作员 或 客户用户
        $has_operator = $db->from('operator',true)->where( ['userid' => $items['id'],'customerid' => $data['customerid'] ] )->first();
        // 是否拥有操作员
        $is_operator = hasRole('operator',$items['id']);
        // 是否管理员角色
        $is_admin = hasRole('admin',$items['id']);
        // 获取用户角色
        $user_role_data = get_user_roles( $items['id'] );
        $temp_json = json_encode($has_operator);
        log_message('error',"帐号: {$items['username']} , ID: {$items['id']},has_operator:$temp_json, is_operator:$is_operator, is_admin:$is_admin");
        foreach($user_role_data as $row){
            if( $topic_data = $db->from('noticetopic',true)->where(['topic' => $key,'roleid' => $row['id']])->whereIn('companyid',[$items['companyid'],0])->first() ) {
                if( ( $has_operator && $is_operator ) || !$is_operator || ( $is_admin && !$has_operator && !$is_operator )) {
                    $users[] = ['companyid' => $items['companyid'], 'customerid' => $items['customerid'],'receiverid' => $items['id']];
                }
            }
        }
    }
    log_message('error','USERS : ' . json_encode($users));
    return array_unique($users,SORT_REGULAR);
}

function get_user_roles($userId = 0) {
    $session = \CodeIgniter\Config\Services::session();
    $db = new \App\Models\Admin\Roles();
    $session->set('ruId',$userId);
    $data = $userId ?
        $db->whereIn('id',function( \CodeIgniter\Database\BaseBuilder $builder) {
            return $builder->select('role_id')->from('admin_users_role',true)->where('user_id',session('ruId'));
        })->asArray()->where('creatorId<>',$userId)->findAll(): [];

    $data2 = $db->where('creatorId',$userId)->asArray()->findAll();
    return array_merge($data,$data2);
}

// 删除通知
function delete_notice( $argc ) {
    $notice_db = new \App\Models\Message\Notify();
    log_message('error','delete_notice_before:'.json_encode($argc));
    if ( $notice_db->search( $argc )->delete() ) {
        log_message('error','delete_notice_sql:'.$notice_db->getLastQuery());
        return true;
    }
    return false;
}

// 删除通知
function delete_notify( $relationId , $topic , $receiverId = null,$type = '') {
    return delete_notice(['relationid' => $relationId, 'topickey' => $topic, 'receiverid' => $receiverId, 'type' => $type]);
}

// 批量删除通知
function batch_delete( $argc , $tipics = [] ){
    $notice_db = new \App\Models\Message\Notify();
    if ( is_array( $tipics ) && $tipics) {
        if ( $notice_db->where( $argc )->whereIn('topickey', $tipics )->delete() ) {
            return true;
        }
    }
    return delete_notice($argc);
}

// 资金
function balance( $customerId =  null , $allocated = 2 , $id = 0 ) {
    $db = new \App\Models\Declares\Project();
    return $db->balance( $customerId?:session('custId'), $allocated , $id );
}

// 角色消息通知
function get_notice_roles($topic = '', $roleid = 0, $userId = 0){
    $db = new \App\Models\Message\Topic();
    $user_data = $db->asArray()->from('admin_users',true)->where('id',$userId)->first();
    if($data = $db->from('noticetopic as a',true)->search(['topic' => $topic,'roleid'=>$roleid,'a.companyid'=>($user_data['companyid']??0)])->first()){
        return $data;
    }
    return false;
}
