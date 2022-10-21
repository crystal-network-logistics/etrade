<?php
$project = (object) $data['project'];
$entry = (object) $data['entry'];
$goods = $data['goods'];

$overseas = (object) get_overseas($entry->businessid);
$domestic = (object) get_overseas($entry->domesticid);

?>
<style>
    .rowspace{
        margin-bottom:10px;
    }
</style>
<h1 align="center">INVOICE</h1>
<br/>
<div class="rowspace" style="position: relative;">
    <span style="float: left; left: 0px;">Invoice No:<strong><?=$project->BusinessID?></strong></span>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span style="position: absolute;right: 0px;">DATE:<?=date('Y-m-d',strtotime($project->createtime))?></span>
</div>

<div class="rowspace">
    <?php if($overseas){?>
        <strong><?=$overseas->companyname;?> </strong> <br/>
        ADDRESS:<strong><?=$overseas->address;?></strong><br />
        CONTRACT:<strong><?=$overseas->contractor;?></strong><br />
        PHONE:<strong><?=$overseas->phone;?></strong>
    <?php } else {?>
        BUYER:<strong><?=$entry->businessman;?></strong>
    <?php }?>
</div>
<br/>
<div class="rowspace">
    <?php if($domestic){?>
        <strong><?=$domestic->companyname;?> </strong> <br/>
        ADDRESS:<strong><?=($domestic->address?$domestic->address:'--');?></strong><br />
        CONTRACT:<strong><?=($domestic->contractor?$domestic->contractor:'--');?></strong><br />
        PHONE:<strong><?=($domestic->phone?$domestic->phone:'--');?></strong>
    <?php }?>
</div>

<br />

<div class="rowspace">
    FROM : <strong><?=\App\Libraries\LibComp::get_dict('COUNTRYEN',$entry->businesscountry)?> </strong> &nbsp;&nbsp;
    TO : <strong><?=\App\Libraries\LibComp::get_dict('CITYEN',$entry->entryport)?> </strong>&nbsp;&nbsp;
    BY : <strong><?=$entry->transport;?></strong>
</div>

<table style="width:100%;border-collapse:collapse;">
    <tr>
        <td align="center" style="border:1px solid black">ITEM</td>
        <td align="center" style="border:1px solid black">DESCRIPTION</td>
        <td align="center" style="border:1px solid black">QUANTITY</td>
        <td align="center" style="border:1px solid black">UNITPRICE</td>
        <td align="center" style="border:1px solid black">AMOUNT</td>
    </tr>
    <tr>
        <td align="center" style="border-left:1px solid black;border-right:1px solid black"></td>
        <td align="center" style="border-right:1px solid black"></td>
        <td align="center" style="border-right:1px solid black"></td>
        <td align="center" style="border-right:1px solid black"></td>
        <td align="left" style="border-right:1px solid black">
            <?php
            if($entry->priceterm == 1)
                echo \App\Libraries\LibComp::get_dict('FOB_CF',$entry->priceterm) . ' ' . \App\Libraries\LibComp::get_dict('COUNTRYEN',$entry->destionationcountry).' '.$entry->currency;
            else
                echo \App\Libraries\LibComp::get_dict('FOB_CF',$entry->priceterm).' '. \App\Libraries\LibComp::get_dict('CITYEN',$entry->entryport).' '.$entry->currency;
            ?>
        </td>
    </tr>
    <?php
    $total=0; $i=1;
    foreach($goods as $item) {
        $row = (object) $item;
        ?>
        <tr>
            <td align="left" style="border-left:1px solid black;border-right:1px solid black;width:20px">
                <?=$i?>
            </td>
            <td align="left" style="border-right:1px solid black"><?php echo $row->ProductEnglishName?:$row->englishname;?></td>
            <td align="left" style="border-right:1px solid black"><?=$row->ProductAmount. '  '. (is_numeric($row->productunit)?(\App\Libraries\LibComm::Unit($row->productunit)):$row->productunit) ?></td>
            <td align="left" style="border-right:1px solid black"><?=number_format($row->ProductUnitPrice,4)?></td>
            <td align="right" style="border-right:1px solid black"><?php $tmp=$row->ProductUnitPrice*$row->ProductAmount; $total+=$tmp; echo number_format($tmp,2); ?></td>
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
<table style="width:100%;border-collapse:collapse;">
    <tr>
        <td style="border-left:1px solid black;border-top:1px solid black;border-bottom:1px solid black;">Freight: <?=number_format($entry->tranportexpense,2)?>&nbsp;&nbsp;&nbsp;&nbsp;Insurance: <?=number_format($entry->insurancefee,2)?></td>
        <td style="border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black" align="right">TOTAL AMOUNT <?=$entry->currency.'  '.number_format($total,2)?></td>
    </tr>

    <tr>
        <td style="padding-top:120px" colspan="2">&nbsp;</td>
    </tr>
</table>

