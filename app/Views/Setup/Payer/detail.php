<?php
$model = $data['detail'];
?>
<table class="table  table-bordered">
    <?php if( ckAuth() ):?>
        <tr>
            <td width="20%">客户信息</td>
            <td width="80%" colspan="3"><?=$model['customername']?></td>
        </tr>
    <?php endif;?>

    <tr>
        <td width="20%">付款人</td>
        <td width="80%" colspan="3"><?=$model['name']?></td>
    </tr>

    <tr>
        <td>开户银行</td>
        <td colspan="3"><?=$model['bankname']?></td>
    </tr>
    <tr>
        <td>银行账号</td>
        <td colspan="3"><label class="label bg-success"> <?=$model['account'] ?? '--'?> </label></td>
    </tr>

    <tr>
        <td width="20%">币种</td>
        <td width="20%"><label class="label bg-primary-300"> <?=$model['currency']?> </label></td>
        <td width="30%">付款人国家或地区</td>
        <td width="30%"><?= \App\Libraries\LibComp::get_dict('COUNTRY', $model['region'])?></td>
    </tr>

</table>
