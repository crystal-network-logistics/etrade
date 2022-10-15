<?php
$model = $data['detail'];
?>
<table class="table  table-bordered">
    <?php if( ckAuth(false) ):?>
        <tr>
            <td width="20%">客户信息</td>
            <td width="80%" colspan="3"><?=$model['customername']?></td>
        </tr>
    <?php endif;?>
    <tr>
        <td width="20%">类型</td>
        <td width="30%" colspan="3"><?=($model['type']==0 ? '境外贸易商' : '境内收货人')?></td>
    </tr>

    <tr>
        <td width="20%">名称</td>
        <td width="80%" colspan="3"><?=$model['companyname']?></td>
    </tr>

    <tr>
        <td width="20%">地址</td>
        <td width="80%" colspan="3"><?=$model['address']?></td>
    </tr>



    <tr>
        <td width="20%">联系人</td>
        <td width="30%"><?=$model['contractor']?></td>
        <td width="20%">联系电话</td>
        <td width="30%"><?=$model['phone']?></td>
    </tr>

</table>
