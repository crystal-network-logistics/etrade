<?php
    $entry = (object) $data['entry'];
    $project = (object) $data['project'];
    $goods = $data['goods'];
    $company = (object) \App\Libraries\LibForm::company( $project->companyid );
?>
<style>
    .ft{ font-family:宋体 }
    .bottomtd{padding: 10px;width: 50%}
    .div_content{padding: 10px;}
</style>
<div style="text-align:center;">
    <strong><span style="font-size:20px;font-family:黑体">委&nbsp; 托&nbsp; 代&nbsp; 理&nbsp; 进&nbsp; 口&nbsp; 合&nbsp; 同</span></strong>
</div>
<div style="line-height: normal;"></div>

<table width="100%">
    <tr>
        <td width="65%" align="left;" style="padding: 10px;">
            <strong><span class="ft">甲方(受托方) : <?=$company->name?></span></strong>
        </td>
        <td width="35%" align="left"  style="padding: 10px;">
            合同编号: <span style="color:blue"> <?=$project->BusinessID?></span>
        </td>
    </tr>
    <tr>
        <td  style="padding: 10px;vertical-align: bottom">
            <div style=";line-height:normal"></div>
            <strong><span class="ft">乙方(委托方): <?=$entry->production?></span></strong>
        </td>
        <td align="left"  style="padding: 10px;">
            签约日期 : <span style="color:blue"> <?=date('Y-m-d',strtotime($entry->createtime))?></span>
            <br />
            <div style=";line-height:normal">
                签约地点 : <span style="color:blue"> <?=\App\Libraries\LibComp::get_dict('CITYEN',$entry->entryport)?></span>
            </div>
        </td>
    </tr>
</table>

<div class="div_content">
    <div style="line-height:normal">
        <strong><span class="ft">一、乙方委托甲方代理进口下列货物：</span></strong>
    </div>
    <table style="width:100%;border-collapse:collapse;">
        <tr>
            <td align="center" style="border:1px solid black">Name of Commodity and Specifications</td>
            <td align="center" style="border:1px solid black">Quantity and Unit</td>
            <td align="center" style="border:1px solid black">Unit Price(<?=$entry->currency?>)</td>
            <td align="center" style="border:1px solid black">Total Amount(<?=$entry->currency?>)</td>
        </tr>
        <?php $total=0;
        foreach($goods as $row) {
            $row = (object) $row;
            ?>
            <tr>

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
            <td style="border:1px solid black"> </td>
            <td style="border:1px solid black"> </td>
            <td align="right" style="border:1px solid black">TOTAL: </td>
            <td style="border:1px solid black">
                <?=$entry->currency. number_format($total,2)?>
                <br />
                <?php
                if($entry->priceterm == 1){
                    echo \App\Libraries\LibComp::get_dict('FOB_CF',$entry->priceterm).' '. \App\Libraries\LibComp::get_dict('COUNTRYEN',$entry->destionationcountry).' '.$entry->currency;
                }else{
                    echo \App\Libraries\LibComp::get_dict('FOB_CF',$entry->priceterm).' '. \App\Libraries\LibComp::get_dict('CITYEN',$entry->entryport).' '.$entry->currency;
                }
                ?>
            </td>
        </tr>
    </table>

    <div style="line-height:normal">
        <strong><span class="ft">二、交货要求 : <?php
                if($entry->priceterm == 1){
                    echo \App\Libraries\LibComp::get_dict('FOB_CF',$entry->priceterm).' '. \App\Libraries\LibComp::get_dict('COUNTRYEN',$entry->destionationcountry);
                }else{
                    echo \App\Libraries\LibComp::get_dict('FOB_CF',$entry->priceterm).' '.\App\Libraries\LibComp::get_dict('CITYEN',$entry->entryport);
                }
                ?></span>
        </strong>
    </div>

    <div style="text-indent:30px;line-height:normal">
        <strong><span class="ft">运输方式 :BY <?=$entry->transport?> </span></strong>
    </div>
    <div style="line-height:normal">
        <strong><span class="ft">三、委托代理进口贷款及代理手续费用的支付：</span></strong>
    </div>
    <div style="margin-left:28px;line-height: normal">
        <strong><span class="ft">1.<span style="font-size:9px;Times New Roman;">&nbsp;&nbsp; </span></span></strong><strong><span class="ft">甲方按进口合同的
                <?php echo \App\Libraries\LibComp::get_dict('FOB_CF',$entry->priceterm)?>总价，向乙方收取1% 代理手续费。</span></strong>
    </div>
    <div style="margin-top:0;margin-bottom: 0;margin-left:28px;line-height: normal">
        <strong><span class="ft">2.<span style="font-size:9px;Times New Roman;">&nbsp;&nbsp; </span></span></strong><strong><span class="ft">乙方可委托甲方进口清关，税单出来之后，乙方须将税款划入甲方账户，甲方须及时为乙方付清税款及办理清关。</span></strong>
    </div>
    <div style="margin-top:0;margin-bottom: 0;margin-left:28px;line-height: normal">
        <strong><span class="ft">3.<span style="font-size:9px;Times New Roman;">&nbsp;&nbsp; </span></span></strong><strong><span class="ft">乙方应在进口合同对外付款日前<span style="text-decoration:underline;"> &nbsp;2个 </span>工作日内,将全额货款及代理手续费划入甲方帐户.</span></strong>
    </div>
    <div style="margin-top:0;margin-bottom: 0;margin-left:28px;line-height: normal">
        <strong><span class="ft">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 9px; line-height: normal; font-family:Times New Roman;">&nbsp;&nbsp;</span></span></strong><strong><span class="ft">乙方应向甲方支付本合同的约定的外币或人民币。如支付人民币的，先按约定的价款支付，最后则以支付的银行最后结帐日的国家外汇牌价为准结算，银行手续费实报实销。</span></strong>
    </div>
    <div style="margin-top:0;margin-bottom: 0;margin-left:28px;line-height: normal">
        <strong><span class="ft">4.<span style="font-size:9px;Times New Roman;">&nbsp;&nbsp; </span></span></strong><strong><span class="ft">甲方有义务协助乙方办理清关的手续，及为乙方支付货款</span></strong>
    </div>
    <div style=";line-height:normal">
        <a><strong><span class="ft">四、本合同系双方依据《中华人民共和国合同法》和《关于对外贸易代理制的暂行规定》， 由甲方以自己的</span></strong></a>
    </div>
    <div style="margin-right:3px;text-indent:30px;line-height:normal">
        <strong><span class="ft">名义代乙方与外商<span style="text-decoration:underline;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>签订进口合同。在任何情况下，</span></strong><strong><span class="ft">甲方只是接受乙方的委托办理外贸代理业务。 </span></strong>
    </div>
    <div style="margin-top:0;margin-bottom: 0;margin-left:30px;line-height:normal">
        <strong><span class="ft">五、本合同在履行过程中，如发生争议时，应协商解决。如协商不成，任何一方均可依法向人民法院起诉。</span></strong>
    </div>
    <div style="margin-top:0;margin-bottom: 0;margin-left:30px;line-height:normal">
        <strong><span class="ft">六、本合同一式二份，经双方盖章后生效。</span></strong>
    </div>
    <div style="margin-top:0;margin-bottom: 0;margin-left:30px;line-height:normal">
        <strong><span class="ft">七、合同有效期为一年</span></strong>
    </div>
    <div style=";line-height:normal">
        <strong><span class="ft">八、双方其他约定的条款：</span></strong>
    </div>
    <div style=";line-height:normal">
        <strong><span class="ft">&nbsp;</span></strong>
    </div>
    <div style=";line-height:normal">
        <strong><span class="ft">注意：</span></strong><span class="ft">甲方业务员如以传真、电子邮件、信件等方式签订或变更合同，需附有由所属部门经理签字并</span><span class="ft">盖有合同章的书面授权委托书。未经书面授权所签订或变更合同的行为均属个人行为，对甲方不发生任何法律效力。</span>
    </div>
    <div style="margin-top:0;margin-right:1px;margin-bottom:0;margin-left:18px;text-align:left;line-height:normal;text-autospace:none;">
        <strong><span class="ft">&nbsp;</span></strong>
    </div>
</div>
<table style="width: 100%;">
    <tr>
        <td class="bottomtd">甲方: <?=$company->name?></td>
        <td class="bottomtd">乙方: <?=$entry->production?></td>
    </tr>

    <tr>
        <td class="bottomtd">法定代表人:</td>
        <td class="bottomtd">法定代表人:</td>
    </tr>

    <tr>
        <td class="bottomtd">或</td>
        <td class="bottomtd">或</td>
    </tr>

    <tr>
        <td class="bottomtd">委托代理人</td>
        <td class="bottomtd">委托代理人</td>
    </tr>

    <tr>
        <td class="bottomtd">地址: <?=$company->address?></td>
        <td class="bottomtd">地址: </td>
    </tr>

    <tr>
        <td class="bottomtd">电话: <?=$company->contact?></td>
        <td class="bottomtd">电话: </td>
    </tr>

    <tr>
        <td class="bottomtd">传真: <?=$company->fax?></td>
        <td class="bottomtd">电话: </td>
    </tr>

    <tr>
        <td class="bottomtd">电报挂号: --</td>
        <td class="bottomtd">电报挂号: </td>
    </tr>

    <tr>
        <td class="bottomtd">开户银行: --</td>
        <td class="bottomtd">开户银行: </td>
    </tr>

</table>
