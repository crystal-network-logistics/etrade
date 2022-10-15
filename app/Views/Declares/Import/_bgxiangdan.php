<?php

$project = (object) $data['project']; $entry = (object)$data['entry'];$goods = $data['goods'];
$overseas = (object) get_overseas( $entry->businessid );
$domestic = (object) get_overseas( $entry->domesticid );
?>
<style>
    .rowspace{
        margin-bottom:10px;
    }
</style>
<h1 align="center">PACKING LIST</h1>
<br/>
<div class="rowspace" style="position: relative;">
    <span style="float: left; left: 0px;">Invoice No:<strong><?=$project->BusinessID?></strong></span>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span style="position: absolute;right: 0px;">DATE:<?=date('Y-m-d',strtotime($project->createtime))?></span>
</div>

<div>
    <?php if($overseas){?>
        FROM:<strong><?=$overseas->companyname;?> </strong> <br/>
        ADDRESS:<strong><?=$overseas->address;?></strong><br />
        CONTRACT:<strong><?=$overseas->contractor;?></strong><br />
        PHONE:<strong><?=$overseas->phone;?></strong>
    <?php } else {?>
        SHIP TO:<strong><?=$entry->businessman;?></strong>
    <?php }?>
</div>

<br />

<div class="rowspace">
    <?php if($domestic){?>
        TO:<strong><?=$domestic->companyname;?> </strong> <br/>
        ADDRESS:<strong><?=($domestic->address?$domestic->address:'--');?></strong><br />
        CONTRACT:<strong><?=($domestic->contractor?$domestic->contractor:'--');?></strong><br />
        PHONE:<strong><?=($domestic->phone?$domestic->phone:'--');?></strong>
    <?php }?>
</div>

<br/>
<div>FROM: <?=$entry->destionationport.' '. \App\Libraries\LibComp::get_dict('COUNTRYEN',$entry->destionationcountry)?>&nbsp;&nbsp;&nbsp;&nbsp;TO: <?=\App\Libraries\LibComp::get_dict('CITYEN',$entry->entryport)?>&nbsp;&nbsp;&nbsp;&nbsp;BY: <?=$entry->transport?></div>
<table style="width:100%;border-collapse:collapse;">
    <tr>
        <td align="center" style="border:1px solid black">ITEM</td>
        <td align="center" style="border:1px solid black">DESCRIPTION</td>
        <td align="center" style="border:1px solid black">QUANTITY</td>
        <td align="center" style="border:1px solid black" width="40px">PKS</td>
        <td align="center" style="border:1px solid black" width="100px">NET WEIGHT</td>
        <td align="center" style="border:1px solid black" width="100px">GROSS WEIGHT</td>
    </tr>

    <?php
    $totalpks=0;$totalnetweight=0;$totalgrossweight=0;$i=1;$t = count($goods);
    foreach($goods as $row) {
        $row = (object) $row;
        ?>
        <tr>
            <td align="left" style="border-left:1px solid black;border-right:1px solid black;<?=$i==$t?'padding-bottom:50px':''?>">
                <?=$i?>
            </td>
            <td align="left" style="border-right:1px solid black;<?=$i==$t?'padding-bottom:50px':''?>">
                <?php echo $row->ProductEnglishName;?>
            </td>
            <td align="left" style="border-right:1px solid black;<?=$i==$t?'padding-bottom:50px':''?>">
                <?=$row->ProductAmount.' '.(is_numeric($row->productunit)?(\App\Libraries\LibComm::Unit($row->productunit)):$row->productunit)?>
            </td>
            <td align="left" style="border-right:1px solid black;<?=$i==$t?'padding-bottom:50px':''?>">
                <?php echo $row->ProductPackageAmount; $totalpks+=$row->ProductPackageAmount; ?>
            </td>
            <td align="left" style="border-right:1px solid black;<?=$i==$t?'padding-bottom:50px':''?>">
                <?php echo $row->ProductNetWeight; $totalnetweight+=$row->ProductNetWeight; ?>
            </td>
            <td align="left" style="border-right:1px solid black;<?=$i==$t?'padding-bottom:50px':''?>">
                <?php echo $row->ProductGrossWeight; $totalgrossweight+=$row->ProductGrossWeight; ?>
            </td>
        </tr>
        <?php ?>
        <?php $i+=1; } ?>

    <tr>
        <td align="left" style="border:1px solid black;">

        </td>
        <td align="left" style="border:1px solid black">
        </td>
        <td align="left" style="border:1px solid black"></td>
        <td align="left" style="border:1px solid black"></td>
        <td align="left" style="border:1px solid black"><?=$entry->totalcube?>M<sup>3</sup></td>
        <td align="left" style="border:1px solid black"></td>
    </tr>
</table>

<table  style="width:100%;border-collapse:collapse;">
    <tr>
        <td style="border-left:1px solid black;border-top:1px solid black;border-bottom:1px solid black"></td>
        <td style="border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black" width="40px"><?=$totalpks?></td>
        <td style="border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black" width="100px"><?=$totalnetweight?>KG</td>
        <td style="border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black"  width="100px"><?=$totalgrossweight?>KG</td>
    </tr>

    <tr>
        <td style="padding-top:120px" colspan="4">&nbsp;</td>
    </tr>
</table>

