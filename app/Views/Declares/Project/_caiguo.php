<?php
$project = (object) $data['project'];  $invoicer = (object) $data['invoicer']; $goods = $data['goods'];$entry = (object) $data['entry'];
$company = (object) \App\Libraries\LibForm::company( $project->companyid );
$http = explode(':',site_url())[0];
$host = $_SERVER['HTTP_HOST'];

$stamper_png = base64_image_data( $company->stamp_zh_en );
?>

<style>
    * { font-family: SimSun; }
    .td{ border: 1px solid #dcdcdc;padding: 10px;}
    .bm{ border: 1px solid #dcdcdc; padding: 10px;}
</style>
<?php

$total=0;$i=1;$row = count($goods);

$exportdate = $entry?($entry->exportdate):$project->createtime

?>
<table style="width: 100%;font-size: 12px;line-height: 15px;" cellpadding="0" cellspacing="0">
    <tbody>
    <tr class="firstRow" >
        <td colspan="5" valign="top" rowspan="4" style="width:58%;text-align: right;font-size: 25px;font-weight: bold;padding-right: 50px;">
            购销合同
        </td>
        <td colspan="3" style="width: 42%">
            合同编号：<span style=""><?=$project->BusinessID?></span>
        </td>
    </tr>
    <tr>
        <td colspan="3" >
            日&nbsp;&nbsp;&nbsp; 期：<span style=""><?=date('Y-m-d',strtotime('-30 day '.$exportdate))?></span>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            签订地点：上海
        </td>
    </tr>

    <tr>
        <td colspan="3"><br /></td>
    </tr>
    <tr>
        <td colspan="4" style="width: 58%">
            买方：<?=($company?$company->name:'--')?>
        </td>
        <td colspan="4" style="width: 42%">
            卖方：<span style=""><?=$invoicer?$invoicer->name:''?></span>
        </td>
    </tr>
    <tr style="height:35px">
        <td colspan="4" style="word-wrap: break-word">
            地址：<?=($company?$company->address:'--')?>
        </td>
        <td colspan="4" style="word-wrap: break-word">
            地址：<?=$invoicer?$invoicer->address:''?>
        </td>
    </tr>
    <tr style="height:24px">
        <td colspan="4">
            电话：<?=$invoicer?$invoicer->contact:''?>
        </td>
        <td colspan="4" >
            电话：
        </td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td colspan="4" style=""></td>
    </tr>
    <tr style="height:128px">
        <td colspan="4" style="word-wrap: break-word">
            银行信息：<br/>
            公司名称：<?=($company ? $company->name : '--')?><br/>
            公司地址：<?=($company ? $company->address : '--')?><br/>
            电话：<?=($company ? $company->contact : '--')?><br/>
            税号: <?=($company ? $company->creditno : '--')?><br/>
            开户银行：<?=($company ? $company->bkname : '--')?><br/>
            账号：<?=($company ? $company->account : '--')?><br/>
        </td>
        <td colspan="4"  style="word-wrap: break-word">
            银行信息:<br/>
            公司名称:<?=$invoicer?$invoicer->name:''?><br/>
            公司地址:<?=$invoicer?$invoicer->address:''?><br/>
            电话: <br/>
            税号: <?=$invoicer?$invoicer->taxpayerid:''?><br/>
            开户银行:<?=$invoicer?$invoicer->bank:''?> <br/>
            帐号:<?=$invoicer?$invoicer->account:''?><br/>
        </td>
    </tr>
    <tr>
        <td colspan="8">
            <br />
            兹经买卖双方同意成交下列商品，订立条款如下：
        </td>
    </tr>
    <tr>
        <td colspan="8" >
            一、品名、规格、数量、价格、金额和交货期：
        </td>
    </tr>
    <tr>
        <td colspan="8" style="padding:5px;"></td>
    </tr>
    <tr>
        <td colspan="3" class="td" style="border-left: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 1px solid black;">
            品<span style="">名</span><span style="">和</span><span style="">规</span><span style="">格</span>
        </td>
        <td  class="td" style="border-left: 0px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 1px solid black;">
            数量
        </td>
        <td  class="td" style="width:80px;border-left: 0px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 1px solid black;">
            单位
        </td>
        <td class="td" style="width:100px;border-left: 0px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 1px solid black;">
            单价(RMB)
        </td>
        <td colspan="2"  class="td" style="border-left: 0px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 1px solid black;">
            金额(RMB)
        </td>
    </tr>
    <?php foreach($goods as $item) {?>
            <?php $row = (object) $item ?>
        <tr>
            <td colspan="3" class="td"  style="border-left: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 0px solid black;">
                <?=$row->ProductChineseName.'   '.$row->model?>
            </td>
            <td  class="td" style="border-left: 0px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 0px solid black;">
                <?=number_format($row->ProductAmount,2)?>
            </td>
            <td  class="td" style="border-left: 0px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 0px solid black;">
                <?=(is_numeric($row->productunit)?(\App\Libraries\LibComm::Unit($row->productunit)):$row->productunit)?>
            </td>
            <td  class="td" style="border-left: 0px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 0px solid black;">
                <?=number_format(($row->invoiceamount?($row->invoiceamount/$row->ProductAmount):0),2)?>
            </td>
            <td colspan="2" class="td" style="border-left: 0px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 0px solid black;">
                <?=number_format($row->invoiceamount,2)?>
            </td>
        </tr>
        <?php $i++; $amt = $row->invoiceamount?$row->invoiceamount:0; $total+=$amt;}?>
    <tr>
        <td colspan="6" class="bm" style="border-left: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 0px solid black;">
            总计：
        </td>
        <td colspan="2"  class="bm" style="border-left: 0px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 0px solid black;">
            <?=number_format($total,2);?>
        </td>
    </tr>
    <tr>
        <td colspan="8" style="padding:5px;"></td>
    </tr>
    <tr>
        <td colspan="8" >
            付款方式: 卖方需根据买方要求开具13%增值税发票，买方收到美金和增票后付清。
        </td>
    </tr>
    <tr>
        <td colspan="8">
            二、包装：按外商要求包装。
        </td>
    </tr>
    <tr>
        <td colspan="8">
            三、质量要求：由外商和卖方约定。
        </td>
    </tr>
    <tr>
        <td colspan="8">
            四、验收标准和方法：由外商和卖方约定。
        </td>
    </tr>
    <tr>
        <td colspan="8">
            五、交货地点：由外商<span style="">与卖方商议决定</span>
        </td>
    </tr>
    <tr>
        <td colspan="8" >
            六、结算方法：买方仅在收到外商<span style="">外汇款项和付款指示后才会支付货款给卖方。买方不承担收汇风险。</span>
        </td>
    </tr>
    <tr>
        <td colspan="8" >
            七、违约责任：如果买方或卖方违约，均应按《中华人民共和国合同法》等法律法规的有关规定承担责任。
        </td>
    </tr>
    <tr>
        <td colspan="8"  style="word-wrap: break-word">
            八、不可抗力：由于不可抗力的事故造成合同部分或全部不能履行时，应及时向双方通报，并向对方提供有关的合法证明，根据实际情况，部分或全部免除违约责任。
        </td>
    </tr>
    <tr>
        <td colspan="8" style="word-wrap: break-word">
            九、争议的解决：凡因本合同引起的或与本合同有关的争议，双方应通过友好协商解决，如果协商不能解决，应提交上海市仲裁委员会仲裁。仲裁裁决是终局的，对双方均有约束力，仲裁费由败诉方承担。
        </td>
    </tr>
    <tr>
        <td colspan="8">
            十、本合同项下的样品、附件和其他有关资料均为本合同的组成部分。
        </td>
    </tr>
    <tr>
        <td colspan="8" style="word-wrap: break-word">
            十一、凡买方或外商提供的商标、挂牌或专利等，卖方不能挪作他用或仿冒，如果挪作他用或仿冒，卖方必须承担侵权的法律责任和经济责任。
        </td>
    </tr>
    <tr>
        <td colspan="8">
            十二、本合同正本一式两份，双方各执一份。合同经双方签字并加盖公章后生效。
        </td>
    </tr>
    <tr>
        <td colspan="8" >
            十三、其他事项：－－
        </td>
    </tr>

    <tr >
        <td colspan="4" style="background-image:url('<?=$stamper_png?>');background-repeat:no-repeat;height: 150px;">
            买&nbsp;&nbsp; 方<br /><br />
            <?=($company ? $company->name : '--')?>
        </td>
        <td></td>
        <td colspan="3">
            卖&nbsp;&nbsp;方<br /><br />
            <?=$invoicer?$invoicer->name:''?>
        </td>
    </tr>
    </tbody>
</table>
