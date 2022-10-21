<?php
$project = (object)$data['project']; $entry = (object)$data['entry'];$goods = $data['goods'];
$company =(object) \App\Libraries\LibForm::company( $project->companyid );
$overseas =(object) \App\Libraries\LibForm::overseas( $entry->businessid );

$http = explode(':',site_url())[0];
$host = $_SERVER['HTTP_HOST'];
//$stamper_png = "$http://$host{$company->stamp_zh_en}";
$stamper_png = base64_image_data( $company->stamp_zh_en );

?>
<style>
    * { font-family: SimSun }
    .rowspace{margin-bottom:10px;}
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
    <strong>
        <?=($company ? $company->name : '--')?>
        <br/>
        <?=($company ? $company->ename : '--')?>
    </strong>
</div>
<div>
    地址: <?=($company ? $company->address : '--')?><br/>ADD: <?=($company ? $company->enaddr : '--')?>
</div>
<br/>
<div>
    <?php if($overseas){?>
        SHIP TO:<strong><?=$overseas->companyname;?> </strong> <br/>
        ADDRESS:<strong><?=$overseas->address;?></strong><br />
        CONTRACT:<strong><?=$overseas->contractor;?></strong><br />
        PHONE:<strong><?=$overseas->phone;?></strong>
    <?php } else {?>
        SHIP TO:<strong><?=$entry->businessman;?></strong>
    <?php }?>
</div>

<br/>
<div>起运港: <?=\App\Libraries\LibComp::get_dict('CITY',$entry->entryport)?>&nbsp;&nbsp;&nbsp;&nbsp;目的港: <?=$entry->destionationport.' '.\App\Libraries\LibComp::get_dict('COUNTRY',$entry->destionationcountry)?>&nbsp;&nbsp;&nbsp;&nbsp;运输方式: <?=$entry->transport?></div>
<table style="width:100%;border-collapse:collapse;">
    <tr>
        <td align="center" style="border:1px solid black">ITEM<br/>型号</td>
        <td align="center" style="border:1px solid black">DESCRIPTION<br/>产品及型号</td>
        <td align="center" style="border:1px solid black">QUANTITY<br/>数量</td>
        <td align="center" style="border:1px solid black" width="40px">PKS<br/>件数</td>
        <td align="center" style="border:1px solid black" width="100px">NET WEIGHT<br/>净重</td>
        <td align="center" style="border:1px solid black" width="100px">GROSS WEIGHT<br/>毛重</td>
    </tr>

    <?php
    $totalpks=0;$totalnetweight=0;$totalgrossweight=0;$i=1;
    $t = count($goods);
    foreach($goods as $k => $item) {?>
            <?php $row = (object) $item?>
        <tr>
            <td align="center" style="border-left:1px solid black;border-right:1px solid black;<?=$i==$t?'padding-bottom:50px':''?>">
                <?=$i?>
            </td>
            <td align="left" style="border-right:1px solid black;<?=$i==$t?'padding-bottom:50px':''?>">
                <?= $row->name.' '.$row->ProductEnglishName?:$row->englishname;?>
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
        <?php if($k == count($goods) - 1){?>
            <tr>
                <td style="border-left:1px solid black;border-right:1px solid black;"></td>
                <td style="border-right:1px solid black;"><?= ($entry->entrymark ? 'MARKS:'.$entry->entrymark : '') ?></td>
                <td style="border-right:1px solid black;"></td>
                <td style="border-right:1px solid black;"></td>
                <td style="border-right:1px solid black;"></td>
                <td style="border-right:1px solid black;"></td>
            </tr>
        <?php }?>
        <?php ?>
        <?php $i+=1; } ?>

    <tr>
        <td align="left" style="border:1px solid black;">

        </td>
        <td align="left" style="border:1px solid black">目的国: <?=\App\Libraries\LibComp::get_dict('COUNTRY',$entry->destionationcountry)?>
        </td>
        <td align="left" style="border:1px solid black"></td>
        <td align="left" style="border:1px solid black"></td>
        <td align="left" style="border:1px solid black">体积: <?=$entry->totalcube?>M<sup>3</sup></td>
        <td align="left" style="border:1px solid black"></td>
    </tr>
</table>

<table  style="width:100%;border-collapse:collapse;<?=($entry->entryform==0?("background-image:url('$stamper_png');background-repeat:no-repeat;"):"")?>">
    <tr>
        <td style="border-left:1px solid black;border-top:1px solid black;border-bottom:1px solid black"></td>
        <td style="border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black" width="40px"><?=$totalpks?><?= $entry->totalpackagemode ?? '件'?></td>
        <td style="border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black" width="100px"><?=$totalnetweight?>KG</td>
        <td style="border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black"  width="100px"><?=$totalgrossweight?>KG</td>
    </tr>

    <tr>
        <td style="padding-top:120px" colspan="4">&nbsp;</td>
    </tr>
</table>

