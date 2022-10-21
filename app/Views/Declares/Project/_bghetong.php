<html>
<?php
$project = $data['project']; $entry = $data['entry'];$goods = $data['goods'];
$overseas = \App\Libraries\LibForm::overseas( $entry["businessid"] );
$company = \App\Libraries\LibForm::company( $project['companyid'] );
$http = explode(':',site_url())[0];
$host = $_SERVER['HTTP_HOST'];
$stamper_png = base64_image_data( $company['stamp_zh_en'] );
?>
<head>
    <meta charset="utf-8">
    <style>
        @font-face {
            font-family: SimSun;
            /*src:url("/static/SimSun.ttf");*/
        }
        * { font-family: SimSun }
    </style>
</head>
<body>
<h1 align="center">
    售货合同
    <br />
    SALES CONTRACT
</h1>
<table style="width:100%">
    <?php $time = $project['createtime'];?>
    <tr><td align="left">合同编号(Contract No): <?=$project["BusinessID"]?></td><td align="right">日期(Date): <?=date('Y/m/d',strtotime("$time -1 month"))?></td></tr>
</table>
<br/>
<div>卖方(Seller): <?=($company ? $company["name"] : '--')?></div>
<div style="text-indent: 90px;"> <?=($company ? $company["ename"] : '--')?></div>
<div style="text-indent: 90px;"><?=($company ? $company["enaddr"] : '--')?></div>
<br/>
<div>买方(Buyer): <?=($overseas?$overseas["companyname"]:$entry["businessman"]);?></div>
<div style="text-indent: 90px;"><?=($overseas?$overseas["address"]:'');?></div>
<br />

<div style="text-align: center;">双方同意按下例条款由买方购进卖方售出下列商品</div>
<div style="text-align: center;">The Buyer agrees to buy and the Seller agrees to sell the following goods on terms and conditions as set forth below</div>

<table style="width:100%;border-collapse:collapse;">
    <tr>
        <td align="center" style="border:1px solid black">唛头 <br />Shipping Mark</td>
        <td align="center" style="border:1px solid black">货物名称，规格及包装<br />Name of Commodity, Specifications and Packing</td>
        <td align="center" style="border:1px solid black">数量(PCS)<br />Quantity</td>
        <td align="center" style="border:1px solid black">单价(<?= $entry["currency"]; ?>)<br />Unit Price</td>
        <td align="center" style="border:1px solid black">总价(<?= $entry["currency"]; ?>)</td>
    </tr>

    <?php $total=0;
    foreach($goods as $K=>$row) {
        ?>
        <tr>
            <?php if($K==0) {?>
            <td rowspan="<?=count($goods)?>" style="text-align: center;vertical-align:middle;border-left:1px solid black;border-right:1px solid black"><?=($entry["kama"] ? $entry["kama"] : 'N/M') ?></td>
            <?php }?>

            <td align="center" style="border-left:1px solid black;border-right:1px solid black;text-align: center;vertical-align:middle;">
                <?php echo $row["name"].' '. $row["ProductEnglishName"]?:$row["englishname"]; ?>
            </td>
            <td align="center" style="text-align: center;vertical-align:middle;border-right:1px solid black"><?=$row["ProductAmount"]. ' '.(is_numeric($row["productunit"])?(\App\Libraries\LibComm::Unit($row["productunit"])):$row["productunit"]) ?></td>
            <td align="center" style="text-align: center;vertical-align:middle;border-right:1px solid black"><?=number_format($row["ProductUnitPrice"],2)?></td>
            <td align="center" style="border-right:1px solid black;text-align: center;vertical-align:middle;">
                <?php $tmp = $row["ProductUnitTotalPrice"] ?? ($row["ProductUnitPrice"]*$row["ProductAmount"]); $total+=$tmp;
                echo number_format($tmp,2); ?>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td style="border-left:1px solid black;border-right:1px solid black"><br/><br/></td>
        <td style="border-left:1px solid black;border-right:1px solid black"><br/><br/></td>
        <td align="left" style="border-right:1px solid black"></td>
        <td align="left" style="border-right:1px solid black"></td>
        <td align="right" style="border-right:1px solid black"></td>
    </tr>
    <tr>
        <td style="border-left:1px solid black;border-bottom:1px solid black;border-top:1px solid black;"> </td>
        <td style="border-bottom:1px solid black;border-top:1px solid black;border-top:1px solid black;"> </td>
        <td style="border-bottom:1px solid black;border-top:1px solid black;border-top:1px solid black;"> </td>
        <td align="right" style="border-bottom:1px solid black;border-top:1px solid black;">TOTAL: </td>
        <td style="border-bottom:1px solid black;border-top:1px solid black;border-right:1px solid black;"><?=$entry["currency"]. number_format($total,2)?></td>
    </tr>

    <tr>
        <td style="border-left:1px solid black;border-bottom:1px solid black;"> </td>
        <td style="border-bottom:1px solid black"> </td>
        <td style="border-bottom:1px solid black"> </td>
        <td style="border-bottom:1px solid black;text-align: right;border-right:1px solid black;" colspan="2" >
            <?php if($entry["priceterm"] == 1): ?>
                <?=\App\Libraries\LibComp::get_dict('FOB_CF',$entry["priceterm"])?>
                &nbsp;
                <?=\App\Libraries\LibComp::get_dict('CITYEN',$entry["entryport"])?>
            <?php else :?>
                <?=\App\Libraries\LibComp::get_dict('FOB_CF',$entry["priceterm"])?>
                &nbsp;
                <?=\App\Libraries\LibComp::get_dict('COUNTRYEN',$entry["destionationcountry"])?>
            <?php endif;?>
        </td>
    </tr>

</table>
<br/>
<table style="width: 100%">
    <tr>
        <td  colspan="2">装运期限 Time of shipment : <?=$entry["exportdate"]?></td>
    </tr>

    <tr>
        <td  colspan="2">目的地 Port of Destination : <?=\App\Libraries\LibComp::get_dict('COUNTRYEN',$entry["destionationcountry"])?></td>
    </tr>

    <tr>
        <td  colspan="2">装运口岸 Port of Loading : <?=\App\Libraries\LibComp::get_dict('CITYEN',$entry["entryport"])?>,CHINA</td>
    </tr>

    <tr>
        <td  colspan="2">付款条件 Terms of Payment : <?=\App\Libraries\LibComp::get_dict('SHFS',$entry["foreigncurrency"])?></td>
    </tr>

    <tr>
        <td  colspan="2">
            特约条款 Special Clauses :
            <div style="width: 100%; text-indent: 30px;">
                ALL LICENSES AND QUOTA ETC. TO BE FOR BUYER'S ACCOUNT AND RESPONSIBILITIES.FAILURE TO OBTAIN LINENSES AND QUOTA ETC. CAN NOT CONSTITUTE A REASON TO DECLARE FORCE MAJEURE.
            </div>
        </td>
    </tr>

    <tr>
        <td  colspan="2">一般条款 General Terms & Conditions (Please see overleaf) </td>
    </tr>

    <tr>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td style="<?php echo(($entry['entryform']==0)?("background-repeat:no-repeat;background-image:url($stamper_png)"):""); ?> ;padding-top:30px;width: 55%; ">
            <div>卖 方:  <?=($company ? $company["name"] : '--')?>  </div>
            <div>The Seller: <?=($company ? $company["ename"] : '--')?></div>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
        </td>

        <td valign="top" style="padding-top:30px;width: 45%;">
            <div>买 方: <?=($overseas?$overseas["companyname"]:$entry["businessman"]);?></div>
            <div>The Buyer: </div>
        </td>

    </tr>

</table>
</body>
</html>
