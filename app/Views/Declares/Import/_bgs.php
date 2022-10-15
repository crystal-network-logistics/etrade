<html>
<style>
    .cell_spacing{
        padding:10px;
    }
    .tb{width:100%;font-size:12px;border-left: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 0px solid black;vertical-align:top;border-collapse:collapse;}
    .td{padding:10px;border-left: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 0px solid black;}
</style>

<head>
<meta charset="utf-8">
</head>
<body>
<?php
    $project = (object) $data['project']; $entry = (object) $data['entry']; $goods = $data['goods'];
    $company = (object) \App\Libraries\LibForm::company( $project->companyid );

?>
<div class="row" style="color:red;font-size:10px;text-align:center">请对单人员务必仔细复核，保证复核表内容与报关单草内容完全一致，尤其注意收发货人和生产销售单位的准确性</div>
<div class="row" style="font-size:20px;text-align:center">中华人民共和国进口货物报关单 <?=$project->BusinessID?></div>
<table style="width:100%;font-size:12px"><tr><td style="padding-left:20px">预录入编号: </td><td>海关编号: </td></tr></table>

<table style="width:100%;font-size:12px;vertical-align:top;border-collapse:collapse; table-layout: fixed">
    <tr>
        <td style="border: 1px solid black; width: 20%;" class="cell_spacing">境内收货人<br />
            <?=((get_overseas($entry->domesticid)['companyname']))?>
        </td>

        <td style="border: 1px solid black; width: 20%" class="cell_spacing">进口关别<br /> <?=\App\Libraries\LibComp::get_dict('CITYEN',$entry->entryport)?></td>
        <td style="border: 1px solid black; width: 20%" class="cell_spacing">进口日期<br/><?=$entry->exportdate?></td>
        <td style="border: 1px solid black; width: 20%" class="cell_spacing">申报日期</td>
        <td style="border: 1px solid black; width: 20%" class="cell_spacing">备案号<br/><span style="display: none;"></span></td>
    </tr>

    <tr>
        <td style="border: 1px solid black; width: 20%;word-break:break-all; word-wrap:break-all;" class="cell_spacing">
            境外发货人<br />
            <?=((get_overseas($entry->businessid)['companyname']))?>
        </td>
        <td style="border: 1px solid black; width: 20%" class="cell_spacing">运输方式<br /><?=$entry->transport?></td>
        <td style="border: 1px solid black; width: 20%" class="cell_spacing">运输工具名称及航次号</td>
        <td style="border: 1px solid black; width: 20%" class="cell_spacing">提运单号</td>
        <td style="border: 1px solid black; width: 20%" class="cell_spacing">货物存放点</td>
    </tr>

    <tr>
        <td style="border: 1px solid black;" class="cell_spacing">消费使用单位<br />
            <?php echo $entry->production?>
        </td>
        <td style="border: 1px solid black;" class="cell_spacing">监管方式<br/><?=\App\Libraries\LibComp::get_dict('JGFS',$entry->supervisionmode)?></td>
        <td style="border: 1px solid black;" class="cell_spacing">征免性质<br/><?=$entry->taxation?\App\Libraries\LibComm::$ZMXZ[$entry->taxation]:''?></td>
        <td style="border: 1px solid black;" class="cell_spacing">许可证号</td>
        <td style="border: 1px solid black;" class="cell_spacing">启运港<br /></td>
    </tr>

    <tr>
        <td style="border: 1px solid black;" class="cell_spacing">合同协议号<br/><?=$project->BusinessID?></td>
        <td style="border: 1px solid black;" class="cell_spacing">贸易国<br/><?=\App\Libraries\LibComp::get_dict('COUNTRYEN',$entry->businesscountry)?></td>
        <td style="border: 1px solid black;" class="cell_spacing">启运国<br/><?=\App\Libraries\LibComp::get_dict('CITYEN',$entry->destionationcountry)?></td>
        <td style="border: 1px solid black;" class="cell_spacing">指运港<br/><?=\App\Libraries\LibComp::get_dict('CITYEN',$entry->destionationport)?></td>
        <td style="border: 1px solid black;" class="cell_spacing">入境口岸<br /><?=\App\Libraries\LibComp::get_dict('CITYEN',$entry->entryport)?></td>
    </tr>
</table>

<table class="tb">
    <tr>
        <td style="width: 20%" class="td">包装种类<br/>
            <?=$entry->totalpackagemode?> | <?=$entry->totalpackagenote?></td>
        <td style="width: 10%" class="td">件数<br/><?=$entry->totalpackageamount?></td>
        <td style="width: 10%" class="td">毛重(千克)<br/><?php echo $project->sumgrossweight;?></td>
        <td style="width: 10%" class="td">净重(千克)<br/><?php echo number_format($project->sumnetweight,2);?></td>
        <td style="width: 10%" class="td">成交方式<br/><?=\App\Libraries\LibComp::get_dict('FOB_CF',$entry->priceterm)?></td>
        <td style="width: 13.33%" class="td">运费<br/><?=($entry->tranportexpense?($entry->currency.' '. $entry->tranportexpense):"")?></td>
        <td style="width: 13.33%" class="td">保费<br/><?=($entry->insurancefee ? ($entry->currency . ' '. $entry->insurancefee):"") ?></td>
        <td style="width: 13.33%" class="td">杂费</td>
    </tr>
    <tr>
        <td colspan="8" class="cell_spacing">随附单证</td>
    </tr>
    <tr>
        <td colspan="4" class="cell_spacing">随附单证1:</td>
        <td colspan="4" class="cell_spacing">随附单证2: 合同; 发票; 装箱单</td>
    </tr>
    <tr>
        <td colspan="8" style="padding:10px;border-left: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 1px solid black;">
            标记唛码及备注:
            <?=\App\Libraries\LibComp::get_dict('BGXS',$entry->entryform)?><br >
            <?=($entry->kama ?$entry->kama : 'N/M' )?>
        </td>
    </tr>
</table>

<table class="tb" style="font-size:14px;">
    <thead>
    <tr>
        <td class="td" >项号</td>
        <td class="td" >商品编号</td>
        <td class="td" >商品名称及规格型号</td>
        <td class="td" >数量及单位</td>
        <td class="td" >单价/总价/币制</td>
        <td class="td" >原产国(地区)</td>
        <td class="td" >最终目的国(地区)</td>
        <td class="td" >境内目的地</td>
        <td class="td" >征免</td>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    <?php foreach( $goods as $key=>$item ) {
        $row = (object) $item;
        ?>
        <tr>
            <td align="center" class="td" style="width: 5%"><?=$i?></td>
            <td align="center" class="td" style="width: 10%"><?=$row->hscode?></td>
            <td align="left" class="td" style="width: 18%">
                <?php echo $row->name.' | 用途: '.$row->usage.' | 品牌: '.$row->brand.' | 型号: '.$row->model.' | 品牌类型: '. \App\Libraries\LibComp::get_dict('BRANDS',$row->brandtype).' | 享惠情况: '. \App\Libraries\LibComp::get_dict('YHQK',$row->yhqk);?>
                <?php if ( $row->supelement ) {
                    $supelements = json_decode($row->supelement);
                }
                if ( $supelements ) {
                    for($n = 0; $n < count($supelements) ; $n++) { ?>
                        <?php foreach ( $supelements[$n] as $k=>$v ) :?>
                            <?=$v?('| '.$k.':'.$v):''?>
                        <?php endforeach;?>
                    <?php } }
                ?>
            </td>
            <td align="center" class="td" style="width: 12%"><?php echo number_format($row->officialamount,2). $row->officialunit.'<br/>'.number_format($row->ProductAmount,2). (is_numeric($row->productunit)?(\App\Libraries\LibComm::Unit($row->productunit)):$row->productunit)?></td>
            <td align="center" class="td" style="width: 14%"><?=number_format($row->ProductUnitPrice,4)?> <br /> <?=number_format($row->ProductUnitPrice*$row->ProductAmount,2)?> <br /> <?=$entry->currency?></td>

            <td align="center" class="td" style="width: 13%"><?=\App\Libraries\LibComp::get_dict('COUNTRYEN',$entry->destionationcountry)?></td>
            <td align="center" class="td" style="width: 13%">中国</td>
            <td align="center" class="td" style="width: 10%"> <?=$row->domesticsource?> </td>
            <td align="center" class="td" style="width: 5%">照章</td>
        </tr>

    <?php $i++;}?>
    </tbody>
    <tfoot>
        <tr>
            <td class="td" colspan="2" style="border-top: 1px solid black;">特殊关系确认:<?=$entry->specialrelation==0?'否':'是'?></td>
            <td class="td" colspan="2" style="border-top: 1px solid black;">价格影响确认:<?=$entry->priceimpact==0?'否':'是'?></td>
            <td class="td" colspan="2" style="border-top: 1px solid black;">支付特许权使用费确认:<?=$entry->privilegefeeconfirm==0?'否':'是'?></td>
            <td class="td" colspan="3" style="border-top: 1px solid black;">自报自缴:</td>
        </tr>
    </tfoot>
</table>

<table class="tb" style="margin-bottom:20px;">
    <tr>
        <td style="width:30%;text-align: left;" class="cell_spacing">申报人员:<br />申报人员证号:<br />电话:</td>
        <td style="width:30%;text-align: center;" class="cell_spacing">兹申明对以上内容承担如实申报、依法纳税责任</td>
        <td class="cell_spacing" rowspan="2" style="border-left: 1px solid black;width:40%;">海关批注及签章</td>
    </tr>
    <tr>
        <td class="cell_spacing">申报单位:</td>
        <td style="text-align: left;<?php echo $entry->entryform==0?"height:130px;background-position: 45px 0px;background-image:url(". ($company ? $company->stamp_bgz : '') .");background-repeat:no-repeat;":''?>" class="cell_spacing">申报单位:</td>
    </tr>
</table>
</body>
</html>
