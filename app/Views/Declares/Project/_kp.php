<?php

    $model = (object)$data['project'];
    $invoicer = (object) $data['invoicer'];
    $goods = (object) $data['goods'];
    $company = (object) \App\Libraries\LibForm::company( $model->companyid );
    $Operators = \App\Libraries\LibComp::get_owner_data(['companyid' => $model->companyid,'power' => ['owner','operator']]);
    $owner = (array) \App\Libraries\LibForm::owner($model->customerid);//count($Operators) > 0 ? ( (array) $Operators[0] ) : false;
?>
<style>
    * { font-family: SimSun }
    .secondcol{padding-right:10px;}
    .rowpadding{padding-bottom:30px;padding-top:30px;}
    .td{padding: 5px;text-align: right}
</style>

<h4 align="center" style="font-size: 18px;">增值税专用发票开票信息</h4>
<br/>



<table style="width:100%;border-collapse:collapse;border: 1px solid #000000;">
    <tr class="rowpadding">
        <td vertical-align="middle" align="right" width="40" class="secondcol">购货<br/>单位</td>
        <td align="left" class="td">
            名称:<?=($company ? $company->name : '--')?><br/>
            纳税人识别号:<?=($company ? $company->creditno : '--')?><br/>
            地址、电话:<?=($company ? $company->address : '--')?>&nbsp;&nbsp;&nbsp;&nbsp;<?=($company ? $company->contact : '--')?><br/>
            开户行及账号：<?=($company ? $company->bkname : '--')?>&nbsp;&nbsp;&nbsp;&nbsp;<?=($company ? $company->account : '--')?>
        </td>
    </tr>
</table>
<br />
<table width="100%">
    <tr>
        <td></td>
        <th class="td">货物名称</th>
        <th class="td">型号规格</th>
        <th class="td">单位</th>
        <th class="td">数量</th>
        <th class="td">开票金额(RMB)</th>
    </tr>
<?php $i = 1; foreach($goods as $row) {?>
        <?php $row = (object) $row;?>
        <tr>
            <td style="font-size: 16px"><i><?=$i?></i></td>
            <td class="td"><?= str_replace('：',':',$row->ProductChineseName) ?></td>
            <td class="td"><?=$row->model?></td>
            <td class="td"><?=(is_numeric($row->productunit)?(\App\Libraries\LibComm::Unit($row->productunit)):$row->productunit)?></td>
            <td class="td"><?=number_format($row->ProductAmount,2)?></td>
            <td class="td"><?=number_format($row->invoiceamount,2)?></td>
        </tr>

    <?php $i++; }?>
</table>
<br />

<table style="width:100%;border-collapse:collapse;border: 1px solid #000000;">
    <tr class="rowpadding">
        <td vertical-align="middle" align="right" width="40" class="secondcol">销货<br/>单位</td>
        <td align="left" colspan="2" style="text-align: left">
            名称: &nbsp;<?=($invoicer?$invoicer->name:'')?><br/>
            纳税人识别号: &nbsp;<?=($invoicer?$invoicer->taxpayerid:'')?><br/>
            地址、电话:  &nbsp;<?=($invoicer?$invoicer->address:'')?>&nbsp;&nbsp;&nbsp;&nbsp;<br/>
            开户行及账号:  &nbsp;<?=($invoicer?$invoicer->bank:'')?>&nbsp;&nbsp;&nbsp;&nbsp;<?=($invoicer?$invoicer->account:'')?>
        </td>
    </tr>

</table>
<br />

<p style="font-size: 18px;font-weight: bold;">请将业务号  <?php echo $model->BusinessID;?>  打在备注中,并连同已盖章的采购合同一并寄到我司.</p>
<table width="100%">
    <tr>
        <td vertical-align="middle" align="right" width="120" class="secondcol" >寄票地址：</td>
        <td>

            <?=$company->name?><br/>
            <?=$company->address?><br/>

            <?php if ($owner && $owner['tel'] && $owner['nickname']) :?>
                收件人：<?=$owner['nickname']?>&nbsp;&nbsp;电话：<?=$owner['tel']?>
            <?php else :?>
                收件人：黄欣&nbsp;&nbsp;电话：021-61112962
            <?php endif;?>

        </td>
    </tr>
</table>
