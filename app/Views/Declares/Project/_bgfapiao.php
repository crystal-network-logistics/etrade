<?php
$project = $data['project']; $entry = $data['entry']; $goods = $data['goods'];
$debug = $data['debug'] ?? false;
$overseas = \App\Libraries\LibForm::overseas( $entry["businessid"] );
$company = \App\Libraries\LibForm::company( $project['companyid'] );

$http = explode(':',site_url())[0];
$host = $_SERVER['HTTP_HOST'];
//$stamper_png = "$http://$host{$company['stamp_zh_en']}";
$stamper_png = base64_image_data( $company['stamp_zh_en'] );

?>
<html>
<head>
    <meta charset="utf-8">
    <style>* { font-family: SimSun }</style>

</head>
<body>
<style>
    .rowspace{
        /*margin-bottom:10px;*/
    }
</style>
<h1 align="center">INVOICE</h1>
<br/>
<table style="width: 100%">
    <tr>
        <td style="width: 50%; text-align: left">Invoice No:<strong><?=$project["BusinessID"]?></td>
        <td style="width: 50%;text-align: right">DATE:<?=date('Y-m-d',strtotime($project["createtime"]))?></td>
    </tr>
</table>

<div class="rowspace">
    <strong>
        <?=($company ? $company["name"] : '--')?>
        <br/>
        <?=($company ? strtoupper( $company["ename"] ): '--')?>
    </strong>
</div>
<div class="rowspace">
    地址: <?=($company ? $company["address"] : '--')?>
    <br/>
    ADD: <?=($company ? strtoupper( $company["enaddr"] ) : '--')?>
</div>
<br/>
<div class="rowspace">

    <?php if($overseas){?>
        BUYER:<strong><?=$overseas["companyname"];?> </strong> <br/>
        ADDRESS:<strong><?=$overseas["address"];?></strong><br />
        CONTACT:<strong><?=$overseas['contractor'];?></strong><br />
        PHONE:<strong><?=$overseas['phone'];?></strong>
    <?php } else {?>
        SHIP TO:<strong><?=$entry->businessman;?></strong>
    <?php }?>
</div>


<table style="width:100%;border-collapse:collapse;margin-top: 20px;">
    <tr>
        <td align="center" style="border:1px solid black">ITEM<br/>序号</td>
        <td align="center" style="border:1px solid black">DESCRIPTION<br/>产品及型号</td>
        <td align="center" style="border:1px solid black">QUANTITY<br/>数量</td>
        <td align="center" style="border:1px solid black">UNIT PRICE<br/>单价</td>
        <td align="center" style="border:1px solid black">AMOUNT<br/>总价</td>
    </tr>
    <tr>
        <td align="center" style="border-left:1px solid black;border-right:1px solid black"></td>
        <td align="center" style="border-right:1px solid black"></td>
        <td align="center" style="border-right:1px solid black"></td>
        <td align="center" style="border-right:1px solid black"></td>
        <td align="left" style="border-right:1px solid black">
            <?php if($entry["priceterm"] == 1): ?>
                <?=\App\Libraries\LibComp::get_dict('FOB_CF',$entry["priceterm"])?>
                &nbsp;
                <?=\App\Libraries\LibComp::get_dict('CITY',$entry["entryport"])?>
            <?php else :?>
                <?=\App\Libraries\LibComp::get_dict('FOB_CF',$entry["priceterm"])?>
                &nbsp;
                <?=\App\Libraries\LibComp::get_dict('COUNTRY',$entry["destionationcountry"])?>
            <?php endif;?>
                &nbsp;
            <?=$entry["currency"]?>
        </td>
    </tr>
    <?php
    $total=0; $i=1;
    foreach($goods as $row) {
        $row = (array) $row;
        ?>
        <tr>
            <td align="center" style="border-left:1px solid black;border-right:1px solid black;width:20px">
                <?=$i?>
            </td>
            <td align="left" style="border-right:1px solid black"><?=$row["name"].' '.$row["ProductEnglishName"]?:$row["englishname"];?></td>
            <td align="left" style="border-right:1px solid black"><?=$row["ProductAmount"]. '  '. (is_numeric($row["productunit"])?(\App\Libraries\LibComm::Unit($row["productunit"])):$row["productunit"]) ?></td>
            <td align="left" style="border-right:1px solid black"><?=number_format($row["ProductUnitPrice"],4)?></td>
            <td align="right" style="border-right:1px solid black"><?php $tmp = $row["ProductUnitTotalPrice"]??($row["ProductUnitPrice"]*$row["ProductAmount"]); $total+=$tmp; echo number_format($tmp,2); ?></td>
        </tr>
        <?php $i+=1;}?>
    <tr>
        <td align="left" style="border-left:1px solid black;border-right:1px solid black;width:20px;padding-bottom:50px"></td>
        <td align="left" style="border-right:1px solid black;padding-bottom:50px"></td>
        <td align="left" style="border-right:1px solid black;padding-bottom:50px"></td>
        <td align="left" style="border-right:1px solid black;padding-bottom:50px"></td>
        <td align="right" style="border-right:1px solid black;padding-bottom:50px"></td>
    </tr>
</table>
<table style="width:100%;border-collapse:collapse;<?=($entry["entryform"]==0?("background-image:url('$stamper_png');background-repeat:no-repeat;"):"")?>">
    <tr style="">
        <td style="border-left:1px solid black;border-top:1px solid black;border-bottom:1px solid black;">运费: <?=number_format($entry["tranportexpense"],4)?>&nbsp;&nbsp;&nbsp;&nbsp;保费: <?=number_format($entry["insurancefee"],4)?></td>
        <td style="border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black" align="right">TOTAL AMOUNT <?=$entry["currency"].'  '.number_format($total,2)?></td>
    </tr>

    <tr>
        <td style="padding-top:120px" colspan="2">&nbsp;</td>
    </tr>
</table>
</body>
</html>

