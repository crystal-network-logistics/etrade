<?php
    $model = (object) $data['project'];
    $entry = (object) $data['entry'];
    $goods = $data['goods'];
    $company = (object) \App\Libraries\LibForm::company( $model->companyid );
?>
<style>
    table{font-family:新宋体;}
    .tbd{border-right: 1px solid #000;border-bottom: 1px solid #000;padding:7px; font-size: 12px;width: 12.5%}
    .tbd2{border-bottom: 1px solid #000;padding:7px; font-size: 12px;width: 12.5%}
    .tbd1{border-right: 1px solid #000;border-bottom: 1px solid #000;padding:7px; font-size: 12px;width:20%}
</style>
<div style="position: relative">
    <img src="/resource/assets/images/logo.png" width="200" height="35" style="position: absolute;top: 20px;left: 10px;width: 200px;">
    <div style="padding-left: 240px;">
        <p style="line-height:18px;font-size: 13px;">
            <?=($company ? $company->name : '--')?>
           &nbsp;
            <?=($company ? $company->ename : '--')?>
        </p>
        <p style="line-height:18px;font-size: 13px;">
            <?=($company ? $company->address : '--')?>
            &nbsp;
            <?=($company ? $company->eaddr : '--')?>
        </p>
        <p style="line-height:18px;font-size: 13px;">
            电话/TEL: <?=($company ? $company->contact : '--')?>
        </p>
    </div>
</div>
    <p style="text-align: center;font-size: 29px;;font-weight: bold">代理货物出口委托书</p>
    <p>
        <strong style="font-size:16px">
            日期：
        </strong>
        <strong>
           <?php echo date('d').'&nbsp;'.date('F').'&nbsp;'.date('Y')?>
        </strong>
    </p>
<?php
    $goodsName = '';
    $hs = '';
    $cots = '';
    $ckamt = '';
    $jpamt = '';
    $pkcts = '';
    $weight = '';
    $net = '';
    $tj = '<td class="tbd1" colspan="' . count($goods) . '">' . (($entry && ($entry->totalcube)) ? strval($entry->totalcube) : '') . ' 立方</td>';
    if($model && count($goods)) {
        foreach ($goods as $key => $val) {
            $val = (object) $val;
            $goodsName .= '<td class="tbd1">' . strval($key + 1) . '. ' . $val->name . '</td>';
            $hs .= '<td class="tbd1">' . $val->hscode . '</td>';
            $cots .= '<td class="tbd1">' . number_format($val->ProductAmount) . (is_numeric($val->productunit)?(Utility::Unit($val->productunit)):$val->productunit).'</td>';
            $ckamt .= '<td class="tbd1">' . number_format(($val->ProductUnitTotalPrice ?? ($val->ProductAmount *  $val->ProductUnitPrice)),2).' '. ($entry && ($entry->currency) ? $entry->currency : '').'</td>';
            $jpamt .= '<td class="tbd1">' . number_format($val->invoiceamount,2). ' (RMB)</td>';
            $pkcts .= '<td class="tbd1">' . number_format($val->ProductPackageAmount) .' '. ($entry && ($entry->totalpackagemode) ? $entry->totalpackagemode : '').' </td>';
            $weight .= '<td class="tbd1">' . number_format($val->ProductGrossWeight,4) . ' KGS</td>';
            $net .= '<td class="tbd1">' . number_format($val->ProductNetWeight,4) . ' KGS</td>';
        }
    }else{
        $td = '';
        for($i = 0; $i < 6; $i++){
            $goodsName .= '<td class="tbd1">'. strval($i+1) .'</td>';
            $td .= '<td class="tbd1"></td>';
        }
        $hs = $td;
        $cots = $td;
        $ckamt = $td;
        $jpamt = $td;
        $pkcts = $td;
        $weight = $td;
        $net = $td;
        $tj = $td;
    }
?>
<table style="width: 100%;border-left: 1px solid #000;border-top: 1px solid #000;" cellspacing="0" cellpadding="0">
<tbody>
    <tr style=";height:26px" class="firstRow">
        <td class="tbd1">
            货物品名
        </td>
        <?php echo $goodsName?>
    </tr>
    <tr style="height:26px">
        <td class="tbd1">海关HS编码</td>
        <?php echo $hs?>
    </tr>
    <tr style=";height:26px">
        <td class="tbd1">数量单位</td>
        <?php echo $cots?>
    </tr>
    <tr style=";height:26px">
        <td  class="tbd1">出口总价格（外币）</td>
        <?php echo $ckamt?>
    </tr>
    <tr style=";height:26px">
        <td  class="tbd1">国内开增票总价格</td>
        <?php echo $jpamt?>
    </tr>
    <tr style=";height:26px">
        <td  class="tbd1">包装件数</td>
        <?php echo $pkcts?>
    </tr>
    <tr style=";height:26px">
        <td class="tbd1">毛重</td>
        <?php echo $weight;?>
    </tr>
    <tr style=";height:26px">
        <td class="tbd1">净重</td>
        <?php echo $net;?>
    </tr>
    <tr style=";height:26px">
        <td class="tbd1">体积</td>
        <?php echo $tj;?>
    </tr>
    <tr style=";height:17px">
        <td colspan="<?php echo count($goods) > 0 ? (count($goods) + 1) : 6?>" class="tbd1">备注:</td>
    </tr>
    </tbody>
</table>
<table style="width: 100%;border-left: 1px solid #000;border-top: 1px solid #000;" cellspacing="0" cellpadding="0">
    <tbody>
    <tr style=";height:26px">
        <td  class="tbd">拟出口日期</td>
        <td colspan="2" class="tbd"><?php echo ($model && $entry)?$entry->exportdate:''?></td>
        <td colspan="2" class="tbd">起运港口:<?php echo ($model && $entry)?\App\Libraries\LibComp::get_dict('CITY',$entry->entryport):''?></td>
        <td colspan="3" class="tbd">目的港口:<?php echo ($model && $entry)?\App\Libraries\LibComp::get_dict('COUNTRY',$entry->destionationcountry):''?></td>
    </tr>
    <tr style=";height:80px">
        <td  class="tbd">
            收货人信息
        </td>
        <td colspan="3" class="tbd">
            <?php if($model && $entry) {?>
            <?php $Bussniess = $entry?(\App\Libraries\LibForm::overseas( $entry->businessid )):null;?>
            <p><?=($Bussniess?$Bussniess->companyname:($entry?$entry->businessman:''))?></p>
            <p><?=($Bussniess?$Bussniess->address:'')?></p>
            <p><?=($Bussniess?$Bussniess->contractor:'')?></p>
            <p><?=($Bussniess?$Bussniess->phone:'')?></p>
            <?php }?>
        </td>
        <td class="tbd">唛头</td>
        <td colspan="3" class="tbd"></td>
    </tr>
    <tr style=";height:29px">
        <td  class="tbd">
            运输方式
        </td>
        <td class="tbd">
            <p style="text-align:center">
                <span style="font-size:13px;font-family:Wingdings">o</span><span  style="font-size:13px;font-family:新宋体">空运</span>
            </p>
        </td>
        <td class="tbd">
            <p style="text-align:center">
                <span style="font-size:13px;font-family:Wingdings">o</span><span  style="font-size:13px;">海运拼箱</span>
            </p>
        </td>
        <td  class="tbd">
            <p>
                <span style="font-size:13px;">海运整箱*</span>
            </p>
        </td>
        <td colspan="4" class="tbd">
            <p>
                <span >* </span><span>海运整箱箱型及数量：</span>
            </p>
        </td>
    </tr>
    <tr style=";height:29px">
        <td  class="tbd">
            <p style="text-align:center">
                <span >其他信息</span>
            </p>
        </td>
        <td  class="tbd2">
            <p style="text-align:center">
                <span >需做产地证</span>
            </p>
        </td>
        <td  class="tbd2">
            <p style="text-align:center">
                <span style="font-family:Wingdings">o</span><span >需商检</span>
            </p>
        </td>
        <td class="tbd2">
            <p style="text-align:center">
                <span style="font-family:Wingdings">o</span><span >是化工品</span>
            </p>
        </td>
        <td class="tbd2">
            <p style="text-align:center">
                <span style="font-family:Wingdings">o</span><span >是危险品</span>
            </p>
        </td>
        <td class="tbd">
            <p style="text-align:center">
                <span style="font-family:Wingdings">o</span><span >信用证结算</span>
            </p>
        </td>
        <td colspan="2" class="tbd">
            <p>
                <span >其他：</span>
            </p>
        </td>
    </tr>
    <tr style=";height:105px">
        <td  class="tbd">
            <p style="text-align:center">
                <span >货代信息（如有）</span>
            </p>
        </td>
        <td colspan="7" class="tbd">
            <p>
                <span >货代公司名称：</span>
            </p>
            <p>
                <span >联系人：</span>
            </p>
            <p>
                <span >电话/传真：</span>
            </p>
        </td>
    </tr>
</tbody>
</table>
