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
        <td width="20%">收款人</td>
        <td width="80%" colspan="3"><?=$model['name']?></td>
    </tr>
    <tr>
        <td width="20%">账号类型</td>
        <td width="30%"><?=($model['type']==1 ? '发票人收款' : ($model['type']==2 ? '物流收款':'其它收款'))?></td>
        <td width="20%">币种</td>
        <td width="30%"><label class="label bg-primary-300"> <?=$model['currency']?> </label></td>
    </tr>

    <tr>
        <td>开户银行</td>
        <td colspan="3"><?=$model['bank']?></td>
    </tr>
    <tr>
        <td>银行账号</td>
        <td colspan="3"><label class="label bg-success"> <?=$model['account']?> </label></td>
    </tr>


</table>
