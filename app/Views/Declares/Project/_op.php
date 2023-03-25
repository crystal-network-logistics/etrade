<?php
    $CustomerID = ckAuth() ? session('custId') : (isset($_REQUEST['cid'])?$_REQUEST['cid']:'');
    if($data['project']) $CustomerID = $project["customerid"];
    $user = \App\Libraries\LibForm::user(['customerid'=>$CustomerID]);
    $owner = (array) \App\Libraries\LibForm::owner($CustomerID);

    $cust_data = \App\Libraries\LibForm::customer(['id'=>$CustomerID]);
?>
<div class="panel panel-flat table-responsive">
    <table class="table text-nowrap" style="min-width: 980px;">
        <thead>
        <tr>
            <th width="160px" >业务编号<?= $project ? '<span style="color:red">*</span>' : '' ?></th>
            <th width="140px">建单日期</th>
            <th  width="140px">完成日期</th>
            <th  width="320px">备注</th>

            <th  width="160px">所属客户</th>
            <th  width="160px">联系人</th>
            <th  width="160px">本单操作员</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$project?$project['BusinessID']:''?></td>
                <td>
                    <?=($project && $project['createtime'])?(date('Y-m-d', strtotime($project['createtime']))):date('Y-m-d')?>
                </td>
                <td>
                    <?=($project && $project['donetime'])?date('Y-m-d', strtotime($project['donetime'])):''?>
                </td>
                <td>
                    <?php if($project && $project['status'] != 2):?>
                        <input class="form-control" id="project_mark" value="<?=$project['remark']?>" placeholder="请输入业务备注" onchange="return comm.doRequest('/declares/project/update_remark',{id:'<?=$project['ID']?>',remark : $('#project_mark').val()},( resp )=>{ var mark = $('#project_mark').val(); console.log(mark) ;if( mark ) comm.Alert( resp.msg, resp.code );},'json')">
                    <?php else :?>
                        <?=$project['remark']?>
                    <?php endif;?>
                </td>

                <td><div data-popup="tooltip" data-html="true" title="客户编号:<?php echo $cust_data?$cust_data['customerno']:'';?> <br /> 客户名称: <?php echo $cust_data?$cust_data['customername']:'';?>"><?php echo $cust_data?$cust_data['customerno']:''?></div></td>
                <td>
                    <div data-popup="tooltip" data-html="true" title="姓名: <?php echo $user?($user["realname"]?:($user["nickname"]?:$user["username"])):''?>
                        邮箱:<?php echo $user?$user['email']:''?>
                        电话:<?php echo $user?$user["tel"]:''?><br />QQ:<?php echo $user?$user["qq"]:''?>">
                        <?php echo $user?($user["realname"]?:($user["nickname"]?:$user["username"])):''?>
                    </div>
                </td>

                <td>
                    <div data-popup="tooltip"
                         data-html="true"
                         title="
                         姓名:<?php echo $owner?($owner['realname']?:$owner['nickname']):''?><br />
                         邮箱:<?php echo $owner?$owner['email']:''?><br />电话:<?php echo $owner?$owner['tel']:''?><br />
                         QQ:<?php echo $owner?$owner['qq']:''?>">
                        <?php echo $owner?($owner['realname']?$owner['realname']:$owner['username']):''?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script>

</script>
