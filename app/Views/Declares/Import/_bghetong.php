<?php
    $project = (object) $data['project'];
    $entry = (object) $data['entry'];
    $goods = $data['goods'];

    $company = (object) \App\Libraries\LibForm::company( $project->companyid );
    $overseas = (object) get_overseas($entry->businessid);
    $domestic = (object) get_overseas($entry->domesticid);

?>
<h1 align="center">CONTRACT</h1>
<br/>
<table style="width:100%">
    <tr>
        <td align="left">Contract No: <?=$project->BusinessID?></td>
        <td align="right">Date: <?=date('Y-m-d',strtotime("-1 month $project->createtime"))?></td>
    </tr>
</table>

<br/>

<div><strong>SELLER: </strong> <?=($overseas?$overseas->companyname:$entry->businessman);?></div>
<div><strong>ADD: </strong><?=($overseas?$overseas->address:'');?></div>
<div><strong>TEL: </strong><?=$overseas?$overseas->phone:'';?></div>

<br/>

<div><strong>BY: </strong> <?=($domestic?$domestic->companyname: '')?></div>
<div><strong>ADD: </strong> <?=($domestic?$domestic->address: '')?></div>
<div><strong>TEL: </strong> <?=($domestic?$domestic->phone: '')?></div>

<!--<div>电话:8621-61119980 传真: 8621-65213882</div>-->
<br />
<div>The Buyer agrees to buy and the Seller agrees to sell the following goods on terms and conditions as set forth below </div>
<br />
<div class="rowspace">
    FROM : <strong><?=\App\Libraries\LibComp::get_dict('COUNTRYEN',$entry->businesscountry)?> </strong> &nbsp;&nbsp;
    TO : <strong><?=\App\Libraries\LibComp::get_dict('CITYEN',$entry->entryport)?> </strong>&nbsp;&nbsp;
    BY : <strong><?=$entry->transport;?></strong>
</div>
<table style="width:100%;border-collapse:collapse;">
    <tr>
        <td align="center" style="border:1px solid black">Shipping Mark</td>
        <td align="center" style="border:1px solid black">Name of Commodity and Specifications</td>
        <td align="center" style="border:1px solid black">Quantity and Unit</td>
        <td align="center" style="border:1px solid black">Unit Price(<?=$entry->currency?>)</td>
        <td align="center" style="border:1px solid black">Total Amount(<?=$entry->currency?>)</td>
    </tr>

    <?php $total=0;
    foreach($goods as $item) {
        $row = (object) $item;
        ?>
        <tr>
            <td align="left" style="border-left:1px solid black;border-right:1px solid black">
                <?php echo $row->transport; ?>
            </td>

            <td align="left" style="border-left:1px solid black;border-right:1px solid black">
                <?php echo $row->ProductEnglishName; ?>
            </td>

            <td align="left" style="border-right:1px solid black"><?=$row->ProductAmount. ' '.(is_numeric($row->productunit)?(\App\Libraries\LibComm::Unit($row->productunit)):$row->productunit) ?></td>

            <td align="left" style="border-right:1px solid black"><?=number_format($row->ProductUnitPrice,2)?></td>

            <td align="right" style="border-right:1px solid black">
                <?php $tmp=$row->ProductUnitPrice*$row->ProductAmount; $total+=$tmp;
                echo number_format($tmp,2); ?>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td align="left" style="border-left:1px solid black;border-right:1px solid black"></td>
        <td style="border-left:1px solid black;border-right:1px solid black"><br/><br/></td>
        <td align="left" style="border-right:1px solid black"></td>
        <td align="left" style="border-right:1px solid black"></td>
        <td align="right" style="border-right:1px solid black"></td>
    </tr>
    <tr>
        <td style="border:1px solid black"> </td>
        <td style="border:1px solid black"> </td>
        <td style="border:1px solid black"> </td>
        <td align="right" style="border:1px solid black">TOTAL: </td>
        <td style="border:1px solid black">
            <?=$entry->currency. number_format($total,2)?>
            <br />
            <?php
            if($entry->priceterm == 1){
                echo \App\Libraries\LibComp::get_dict('FOB_CF',$entry->priceterm).' ' . \App\Libraries\LibComp::get_dict('COUNTRYEN',$entry->destionationcountry).' '.$entry->currency;
            }else{
                echo \App\Libraries\LibComp::get_dict('FOB_CF',$entry->priceterm).' ' . \App\Libraries\LibComp::get_dict('CITYEN',$entry->entryport).' '.$entry->currency;
            }
            ?>
        </td>
    </tr>
</table>
<br/>

<table width="100%">
    <tr>
        <td width="50%" colspan="2">1: Time of shipment: <?=$entry->exportdate?></td>
    </tr>
    <tr>
        <td colspan="2">2: Port of Destination: <?=\App\Libraries\LibComp::get_dict('CITYEN',$entry->entryport)?>,CHINA</td>
    </tr>
    <tr>
        <td>3: Port of Loading: <?=\App\Libraries\LibComp::get_dict('COUNTRYEN',$entry->destionationcountry)?></td>
    </tr>
    <tr>
        <td>4: Terms of Payment: <?=\App\Libraries\LibComp::get_dict('SHFS',$entry->foreigncurrency); ?></td>
    </tr>
    <tr>
        <td colspan=2>5: Special Clauses :</td>
    </tr>
    <tr>
        <td colspan=2>  ALL LICENSES AND QUOTA ETC. TO BE FOR BUYER'S ACCOUNT AND RESPONSIBILITIES.FAILURE TO OBTAIN LINENSES AND QUOTA ETC. CAN NOT CONSTITUTE A REASON TO DECLARE FORCE MAJEURE. </td>
    </tr>
    <tr>
        <td colspan=2>6: General Terms & Conditions (Please see overleaf).</td>
    </tr>
    <tr>
        <td colspan=2></td>
    </tr>
    <tr>
        <td valign="top" style="padding-top:30px">
            <div><strong>SELLER: </strong> </div>
            <div style="text-decoration:underline"><?=($overseas?$overseas->companyname:$entry->businessman);?></div>
            <div><strong>ADD: </strong><?=($overseas?$overseas->address:'');?></div>
            <div><strong>TEL: </strong><?=$overseas?$overseas->phone:'';?></div>
        </td>
        <td style="<?=$entry->entryform==0?"background-image:url('".($company ? $company->stamp_zh_en : '')."');background-repeat:no-repeat;background-position: 40px,-20px;":""?>padding-top:30px ">
            <div><strong>BY :</strong> </div>
            <div style="text-decoration:underline"><?=($domestic?$domestic->companyname: '')?></div>
            <div><strong>ADD: </strong> <?=($domestic?$domestic->address: '')?></div>
            <div><strong>TEL: </strong> <?=($domestic?$domestic->phone: '')?></div>
            <br/>
            <br/>
            <br/>
            <br/>
        </td>
    </tr>

</table>
