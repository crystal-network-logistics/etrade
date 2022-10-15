
<?php
if(isset($data['project'])){
    if($data['project']){
        $CustomerID = $data['project']->CustomerID;
    }
}


$code = new Code();
$auth = new Auth();
$Operators = $code->GetOperator($CustomerID);
$Operator = count($Operators) ? $Operators : false ;
$Owner = $Operator;//$code->GetOwner($CustomerID);
$User = $code->GetUser();
$entry = $data['entry'];

$totalpackageamount = 0;
$pnw = 0; $pgw = 0; $pa = 0; $sum = 0;
$bussiness = $code->GetBussinessDetail($entry->businessid);
?>
<style>
    .panel {
        margin-bottom: 20px;
        border-color: #ddd;
        color: #333;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 3px;
    }
    .panel-heading[class*=bg-], .panel-primary .panel-heading, .panel-danger .panel-heading, .panel-success .panel-heading, .panel-warning .panel-heading, .panel-info .panel-heading {
        margin: -1px -1px 0 -1px;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
    }
    .bg-primary {
        background-color: #2196f3;
        border-color: #2196f3;
        color: #fff;
    }
    .bg-info {
        background-color: #00bcd4;
        border-color: #00bcd4;
        color: #fff;
    }
    .sm {
        font-size: 12px;
    }
    label {
        margin-bottom: 6px;
        font-weight: 400;
    }
    label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .col-md-3 {
        width: 25%;
    }
    .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
        float: left;
    }
    .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
        position: relative;
        min-height: 1px;
        padding-left: 10px;
        padding-right: 10px;
    }
    .panel-body{padding: 10px 0px;}
    th,td{padding: 10px;}
    .entity{font-size: 12px;}
    .entity label{font-weight: bold;}
    .customtextbox{float:left;margin-right:40px;}
    .customrow{overflow:auto;margin-bottom:10px;}
    .idblock{background-color:rgb(175,204,238);float:left;padding:10px;display: block; width: 25px;height: 25px;}
    .productname{padding-left:50px;padding-top:10px;float:left;}
    .linkarea{float:right;padding-top:10px;}
    .link{margin-left:20px;margin-right:20px;}
    .stats{margin-right:20px;}
    .text-primary{font-weight: bold; padding: 5px;background-color: #f9f2f4; color: #2196f3;}
    .hidden{display:none;}
    .red{color: red;}
    .z_photo{;border: 0px;}
    .upimg-div .up-section{width: 40px;height: 40px;}
</style>
<div class="content">
    <div class="panel panel-flat">
        <table style="width:100%;border-collapse:collapse;font-size: 12px;">
            <thead>
            <tr>
                <th align="center" style="border-bottom:1px solid darkgray">业务编号</th>
                <th align="center" style="border-bottom:1px solid darkgray">建单日期</th>
                <th align="center" style="border-bottom:1px solid darkgray">完成日期</th>
                <th align="center" style="border-bottom:1px solid darkgray">备注</th>
                <th align="center" style="border-bottom:1px solid darkgray">所属客户</th>
                <th align="center" style="border-bottom:1px solid darkgray">联系人</th>
                <th align="center" style="border-bottom:1px solid darkgray">业务员</th>
                <th align="center" style="border-bottom:1px solid darkgray">操作员</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td align="center" ><?php
                    if(isset($data['project'])) {
                        if ($data['project']) {
                            echo $data['project']->BusinessID;
                        }
                    }
                    ?></td>
                <td align="center" >
                    <?php
                    if(isset($data['project'])) {
                        if($data['project'] && $data['project']->createtime) {
                            echo date('Y-m-d', strtotime($data['project']->createtime));
                        }
                    }else{
                        echo date('Y-m-d');
                    }
                    ?>
                </td>
                <td align="center" >
                    <?php
                    if(isset($data['project'])) {
                        if($data['project'] && $data['project']->donetime) {
                            echo date('Y-m-d', strtotime($data['project']->donetime));
                        }
                    }
                    ?>
                </td>
                <td align="center" >
                    <?php
                    if(isset($data['project'])) {

                        echo $data['project']->remark;

                    }
                    ?>
                </td>

                <td align="center" ><?php echo $Operator?$Operator->CustomerNo:''?></td>
                <td align="center" ><?php echo $User?$User->realname:$this->session->username?></td>
                <td align="center" ><?php echo $Owner?($Owner->realname?$Owner->realname:$Owner->username):''?></td>
                <td align="center" ><?php echo $Operator?($Operator->realname?$Operator->realname:$Operator->username):''?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="panel">
        <div class="panel-heading bg-primary">
            <h6 class="panel-title" style="padding-left:12px; "><a class="collapsed" style="font-size:22px;">报关资料</a>
                <?php if(isset($data['entry'])) {?>
                    <label class="sm">启运港: <?php echo Code::GetCategory('CITY',$entry->entryport) ?></label>&nbsp;&nbsp;
                    <label class="sm">运抵国: <?php echo Code::GetCategory('COUNTRY',$entry->destionationcountry) ?></label>&nbsp;&nbsp;
                    <label class="sm">出运时间: <?php echo $entry->exportdate; ?></label>&nbsp;&nbsp;
                    <label class="sm">报关金额: <label id="lbSum"></label></label>&nbsp;&nbsp;
                    <label class="sm">通关单号: <?php echo $entry->clearancenbr; ?></label> &nbsp;&nbsp;
                <?php }?>
            </h6>
        </div>

        <div class="panel-body entity">
            <div class="row">
                <div class="col-md-3">
                    <label>报关口岸: </label>
                    <span class="text-primary"><?php echo Code::GetCategory('CITY',$entry->entryport)?></span>
                </div>

                <div class="col-md-3">
                    <label>运抵国(地区):</label>
                    <span class="text-primary"><?php echo Code::GetCategory('COUNTRY',$entry->destionationcountry); ?></span>
                </div>
                <div class="col-md-3">
                    <label>预计出货日期:</label>
                    <span class="text-primary"><?php echo $entry->exportdate; ?></span>
                </div>

                <div class="col-md-3">
                    <label>贸易国(地区):</label>
                    <span class="text-primary"><?php echo Code::GetCategory('COUNTRY',$entry->businesscountry); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label>币种:</label>
                    <span class="text-primary"><?php echo $entry->currency; ?></span>
                </div>
                <div class="col-md-3">
                    <label>运输方式:</label>
                    <span class="text-primary"><?php echo $entry->transport; ?></span>
                </div>
                <div class="col-md-6">
                    <label>境外贸易商:</label>
                    <span class="text-primary">
                        <?php echo $bussiness?$bussiness->companyname:$entry->businessman; ?>
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label>报关形式:</label>
                    <span class="text-primary"><?php echo Code::GetCategory('BGXS',$entry->entryform); ?></span>
                </div>
                <div class="noPaper" style="display: <?php echo $entry->entryform==0?'':'none'?>">
                    <div class="col-md-3">
                        <label>10位报关行代码:</label>
                        <span class="text-primary"><?php echo $entry->brokerno; ?></span>
                    </div>

                    <div class="col-md-3">
                        <label>报关行名称:</label>
                        <span class="text-primary"><?php echo $entry->brokername; ?></span>
                    </div>
                </div>
                <div class="hasPaper" style="display: <?php echo $entry->entryform==0?'none':''?>">
                    <div class="col-md-3">
                        <label>收件人:</label>
                        <span class="text-primary"><?php echo $entry->receiver; ?></span>
                    </div>

                    <div class="col-md-2">
                        <label>联系电话:</label>
                        <span class="text-primary">
                            <?php echo $entry->tel; ?>
                        </span>
                    </div>

                    <div class="col-md-4">
                        <label>地址:</label>
                        <span class="text-primary"><?php echo $entry->address; ?></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label>监管方式:</label>
                    <span class="text-primary"><?php echo Code::GetCategory('JGFS',$entry->supervisionmode); ?></span>
                </div>
                <div class="col-md-3">
                    <label>征免性质:</label>
                    <span class="text-primary"><?=$entry->taxation?Code::$ZMXZ[$entry->taxation]:''?></span>
                </div>
                <div class="col-md-3">
                    <label>备案号:</label>
                    <span class="text-primary"><?php echo $entry->fileno; ?></span>
                </div>
                <div class="col-md-3">
                    <label>许可证号:</label>
                    <span class="text-primary"><?php echo $entry->licno; ?></span>
                </div>

            </div>

            <div class="row">
                <div class="col-md-2">
                    <label>价格条款:</label>
                    <span class="text-primary"><?php echo Code::GetCategory('FOB_CF',$entry->priceterm); ?></span>
                </div>
                <div class="col-md-2" id="yfei" style="display: <?php if($entry->priceterm == 2 || $entry->priceterm == 3){echo '';}else{ echo 'none';}?>;">
                    <label>运费(USD):</label>
                    <span class="text-primary"><?php echo $entry->tranportexpense; ?></span>
                </div>
                <div class="col-md-2" id="bfei" style="display: <?php if($entry->priceterm == 2){echo '';}else{ echo 'none';}?>;">
                    <label>保费(USD):</label>
                    <span class="text-primary"><?php echo $entry->insurancefee; ?></span>
                </div>
                <div class="col-md-3">
                    <label>收汇方式:</label>
                    <span class="text-primary"><?php echo Code::GetCategory('SHFS',$entry->foreigncurrency); ?></span>
                </div>
                <div class="col-md-3 shfs" style="display:<?=$entry->foreigncurrency==3?'':'none'?>;">
                    <label>信用证号:</label>
                    <span class="text-primary"><?php echo $entry->lcnumber; ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label>特殊关系确认:</label>
                    <span class="text-primary"><?php echo $entry->specialrelation == 0?'否':'是'; ?></span>
                </div>
                <div class="col-md-3">
                    <label>价格影响确认:</label>
                    <span class="text-primary">
                        <?php echo $entry->priceimpact == 0?'否':'是'; ?>
                    </span>
                </div>
                <div class="col-md-3">
                    <label>支付特许权使用费确认:</label>
                    <span class="text-primary">
                        <?php echo $entry->privilegefeeconfirm == 0?'否':'是'; ?>
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label>整体包装件数:</label>
                    <span class="text-primary"><?=$entry->totalpackageamount?></span>
                </div>

                <div class="col-md-3">
                    <label>整体包装种类:</label>
                    <span class="text-primary"><?=$entry->totalpackagemode?></span>
                </div>

                <div class="col-md-3">
                    <label>包装说明:</label>
                    <span class="text-primary"><?=$entry->totalpackagenote?></span>
                </div>

                <div class="col-md-3">
                    <label>总体积:</label>
                    <span class="text-primary"><?=$entry->totalcube?> M³</span>
                </div>
            </div>

            <?php if(isset($data['goods'])){?>
                    <?php
                    $i = 1;
                    foreach($data['goods'] as $row) {
                        $tag = time() + (float)microtime()*1000000;
                        ?>
                        <div class="row" id="<?=$tag?>" style="margin-top: 8px;">
                            <div style="background-color:rgb(243,245,249);margin-left:12px;margin-right:12px;margin-bottom:15px;border: 1px solid white;">
                                <div class="customrow">
                                    <span class="idblock <?=$tag?>"><?=$i?></span>
                                    <span class="productname text-primary">
                                        <?=$row->name?>
                                    </span>
                                </div>
                                <div class="customrow">
                                    <span class="customtextbox text-primary"><label>品牌:</label><?=$row->brand?></span>
                                    <span class="customtextbox text-primary"><label>型号:</label><?=$row->model?></span>
                                    <span class="customtextbox text-primary"><label>英文名:</label><?=$row->ProductEnglishName?></span>
                                </div>
                                <div class="customrow">
                                    <table style="border:1px solid rgb(210,220,233);width: 100%;font-size: 10px;">
                                        <thead style="background-color:rgb(210,220,233)"><tr>
                                            <th style="padding:5px">最大包装件数</th>
                                            <th style="padding:5px">总净重(KG)</th>
                                            <th style="padding:5px">总毛重(KG)</th>
                                            <th style="padding:5px">产品数量</th>
                                            <th style="padding:5px">产品单位</th>
                                            <th style="padding:5px">单价(<span name="currencyname" color="red"><?php echo $entry->currency; ?></span>)</th>
                                            <th style="padding:5px">货值(<span name="currencyname" color="red"><?php echo $entry->currency; ?></span>)</th>
                                            <th colspan="2" style="padding:5px">法定数量和单位</th>
                                            <th style="padding:5px">开票人</th>
                                            <th style="padding:5px">开票金额(RMB)</th></tr>
                                        </thead>
                                        <tbody>
                                        <tr>

                                            <td style="padding:5px"><?=number_format($row->ProductPackageAmount,2)?><?php $totalpackageamount += $row->ProductPackageAmount?></td>
                                            <td style="padding:5px"><?=number_format($row->ProductNetWeight,2)?> <?php $pnw += $row->ProductNetWeight?> </td>
                                            <td style="padding:5px"><?=number_format($row->ProductGrossWeight,2)?> <?php $pgw += $row->ProductGrossWeight?></td>
                                            <td style="padding:5px"><?=number_format($row->ProductAmount,2)?><?php $pa += $row->ProductAmount?></td>
                                            <td style="padding:5px"><?=(is_numeric($row->productunit)?Utility::Unit($row->productunit):$row->productunit) ?></td>
                                            <td style="padding:5px"><?=$row->ProductUnitPrice?></td>
                                            <td style="padding:5px;color:red" id="sum<?=$tag?>"><?=number_format($row->ProductUnitTotalPrice ?? ($row->ProductAmount * $row->ProductUnitPrice),2)?><?php $sum += ( $row->ProductUnitTotalPrice ?? ($row->ProductAmount * $row->ProductUnitPrice))?></td>
                                            <td style="padding:5px;"><?=$row->officialamount?></td>
                                            <td style="padding:5px" ><?=$row->officialunit?></td>
                                            <td style="padding:5px"><?=$row->invoicer?></td>
                                            <td style="padding:5px"><?=number_format($row->invoiceamount,2)?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <?php $i++; }?>
                <?php }?>

            <div class="row">
                <div style="background-color:rgb(243,245,249);margin-left:12px;margin-right:12px;margin-bottom:15px;overflow:auto;padding:8px">
                    <div style="float:right">
                        <label>该批总净重：</label>
                        <span class="stats" id="totalnw"><?=$pnw?>kg</span>
                        <label>总毛重：</label>
                        <span class="stats" id="totalgw"><?=$pgw?>kg</span>
                        <label>总产品数量：</label>
                        <span class="stats" id="totalpa"><?=$pa?></span>
                <span class="stats" style="color:red" >总货值：
                    <span name="currencyname"><?php echo $entry->currency; ?></span> <span id="totalsum"><?=number_format($sum,2)?></span>
                </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading bg-primary">
            <h6 class="panel-title" style="padding-left:12px; "><a class="collapsed" style="font-size:22px;">增票信息</a>
                <label class="sm">增票总额: <?php echo $data['project']?$data['project']->vcapital:0?></label>&nbsp;
                <label class="sm">退税额: <?php echo number_format($data['project']?$data['project']->tuishui:0,2)?></label>&nbsp;
            </h6>
        </div>
        <div id="vii" class="panel-body collapse" style="padding: 10px;">
            <div class="panel panel-flat">
                <table style="width:100%;border-collapse:collapse;font-size: 10px;">
                    <thead>
                    <tr>
                        <th align="left" style="border-bottom:1px solid darkgray">中文品名</th>
                        <th align="left" style="border-bottom:1px solid darkgray">数量</th>
                        <th align="left" style="border-bottom:1px solid darkgray">单位</th>
                        <th align="left" style="border-bottom:1px solid darkgray">开票金额</th>
                        <th align="left" style="border-bottom:1px solid darkgray">退税率</th>
                        <th align="left" style="border-bottom:1px solid darkgray">开票公司</th>
                        <th align="left" style="border-bottom:1px solid darkgray">备注</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data['vii'] as $vii) {?>
                        <tr>
                            <td style="border-bottom:1px solid darkgray"><?=$vii->productname?></td>
                            <td style="border-bottom:1px solid darkgray"><?=number_format($vii->amount,2)?></td>
                            <td style="border-bottom:1px solid darkgray"><?=$vii->unit?></td>
                            <td style="border-bottom:1px solid darkgray"><?=number_format($vii->invoiceamount,2)?></td>
                            <td style="border-bottom:1px solid darkgray"><?=$vii->taxreturnrate?></td>
                            <td style="border-bottom:1px solid darkgray"><?=$vii->invoicer?></td>
                            <td style="border-bottom:1px solid darkgray"><?=$vii->note?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading bg-primary">
            <h6 class="panel-title" style="padding-left:12px; "><a class="collapsed" style="font-size:22px;">收入情况</a>
                <label class="sm">&nbsp;&nbsp;收入总计(RMB):<?php echo number_format($data['project']?$data['project']->receiptsum:0,2)?></label> &nbsp;
            </h6>
        </div>
        <div id="vii" class="panel-body collapse" style="padding: 10px;">
            <div class="panel panel-flat">
                <table style="width:100%;border-collapse:collapse;font-size: 10px;">
                    <thead>
                    <tr>
                        <th align="left" style="border-bottom:1px solid darkgray">收款日期</th>
                        <th align="left" style="border-bottom:1px solid darkgray">付款人</th>
                        <th align="left" style="border-bottom:1px solid darkgray">地区</th>
                        <th align="left" style="border-bottom:1px solid darkgray">币种</th>
                        <th align="left" style="border-bottom:1px solid darkgray">金额</th>
                        <th align="left" style="border-bottom:1px solid darkgray">汇率</th>
                        <th align="left" style="border-bottom:1px solid darkgray">折RMB</th>
                        <th align="left" style="border-bottom:1px solid darkgray">用途</th>
                        <th align="left" style="border-bottom:1px solid darkgray">备注</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data['receipt'] as $receipt) {?>
                        <tr>
                            <td style="border-bottom:1px solid darkgray"><?=$receipt->receiptdate?></td>

                            <td style="border-bottom:1px solid darkgray"><?=$receipt->payername?></td>
                            <td style="border-bottom:1px solid darkgray"><?=Code::GetCategory('COUNTRY',$receipt->payercountry)?></td>
                            <td style="border-bottom:1px solid darkgray"><?=$receipt->currency?></td>
                            <td style="border-bottom:1px solid darkgray"><?=number_format($receipt->amount,2)?></td>
                            <td style="border-bottom:1px solid darkgray"><?=$receipt->exchangerate?></td>
                            <td style="border-bottom:1px solid darkgray"><?=number_format($receipt->amount*$receipt->exchangerate,2)?></td>
                            <td style="border-bottom:1px solid darkgray"><?=Code::GetCategory('USAGE',$receipt->usage)?></td>
                            <td style="border-bottom:1px solid darkgray"><?=$receipt->note?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading bg-primary">
            <h6 class="panel-title" style="padding-left:12px; "><a class="collapsed" style="font-size:22px;">支付情况</a>
                <label class="sm">&nbsp;&nbsp;支付总计(RMB):<?php echo number_format($data['project']?$data['project']->payamout:0 ,2)?></label>
            </h6>
        </div>
        <div id="vii" class="panel-body collapse" style="padding: 10px;">
            <div class="panel panel-flat">
                <table style="width:100%;border-collapse:collapse;font-size: 10px;">
                    <thead>
                    <tr>
                        <th align="left" style="border-bottom:1px solid darkgray">付款日期</th>
                        <th align="left" style="border-bottom:1px solid darkgray">收款人</th>
                        <th align="left" style="border-bottom:1px solid darkgray">开户银行</th>
                        <th align="left" style="border-bottom:1px solid darkgray">银行账号</th>
                        <th align="left" style="border-bottom:1px solid darkgray">币种</th>
                        <th align="left" style="border-bottom:1px solid darkgray">付款金额</th>
                        <th align="left" style="border-bottom:1px solid darkgray">汇率</th>
                        <th align="left" style="border-bottom:1px solid darkgray">折RMB</th>
                        <th align="left" style="border-bottom:1px solid darkgray">备注</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data['payment'] as $payment) {?>
                        <tr>
                            <td style="border-bottom:1px solid darkgray"><?=$payment->paymentdate?></td>

                            <td style="border-bottom:1px solid darkgray"><?=$payment->receivername?></td>
                            <td style="border-bottom:1px solid darkgray"><?=$payment->bank?></td>
                            <td style="border-bottom:1px solid darkgray"><?=$payment->bankaccount?></td>
                            <td style="border-bottom:1px solid darkgray"><?=$payment->currency?></td>
                            <td style="border-bottom:1px solid darkgray"><?=number_format($payment->amount,2)?></td>
                            <td style="border-bottom:1px solid darkgray"><?=$payment->exchangerate?></td>
                            <td style="border-bottom:1px solid darkgray"><?=number_format($payment->amount*$payment->exchangerate,2)?></td>

                            <td style="border-bottom:1px solid darkgray"><?=$payment->note?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading bg-primary">
            <h6 class="panel-title"  style="padding-left:12px;">
                <span class="statisticsleft"><span>本单余额</span><span id="spanSum">(<?php echo number_format((($data['project']?$data['project']->receiptsum:0) + ($data['project']?$data['project']->tuishui:0) - ($data['project']?$data['project']->payamout:0)),2)?>)</span></span>
                <span class="statisticsleft"><span>=</span><span></span></span>
                <span class="statisticsleft"><span>收入总计</span><span id="spanRsum">(<?php echo number_format(($data['project']?$data['project']->receiptsum:0),2)?>)</span></span>
                <span class="statisticsleft"><span>+</span><span></span></span>
                <span class="statisticsleft"><span>退税额</span><span id="spanTaxrate">(<?php echo number_format($data['project']?$data['project']->tuishui:0,2)?>)</span></span>
                <span class="statisticsleft"><span>-</span><span></span></span>
                <span class="statisticsleft"><span>支付总额</span><span id="spanPsum">(<?php echo number_format($data['project']?$data['project']->payamout:0 ,2)?>)</span></span>
            </h6>
        </div>
    </div>

    <?php if(!$auth->isHasRole('customer')) {?>
        <div class="panel">
            <div class="panel-heading bg-info">
                <h6 class="panel-title" style="padding-left:12px; "><a class="collapsed" style="font-size:22px;">成本支付情况</a>
                    <label class="sm">&nbsp;&nbsp;支付总计(RMB):<?php echo number_format($data['project']?$data['project']->clAmount:0 ,2)?></label>
                </h6>
            </div>
            <div id="vii" class="panel-body collapse" style="padding: 10px;">
                <div class="panel panel-flat">
                    <table style="width:100%;border-collapse:collapse;font-size: 10px;">
                        <thead>
                        <tr>
                            <th align="left" style="border-bottom:1px solid darkgray">付款日期</th>
                            <th align="left" style="border-bottom:1px solid darkgray">收款人</th>
                            <th align="left" style="border-bottom:1px solid darkgray">开户银行</th>
                            <th align="left" style="border-bottom:1px solid darkgray">银行账号</th>
                            <th align="left" style="border-bottom:1px solid darkgray">币种</th>
                            <th align="left" style="border-bottom:1px solid darkgray">付款金额</th>
                            <th align="left" style="border-bottom:1px solid darkgray">汇率</th>
                            <th align="left" style="border-bottom:1px solid darkgray">折RMB</th>
                            <th align="left" style="border-bottom:1px solid darkgray">备注</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data['paymentcl'] as $paymentcl) {?>
                            <tr>
                                <td style="border-bottom:1px solid darkgray"><?=$paymentcl->paymentdate?></td>

                                <td style="border-bottom:1px solid darkgray"><?=$paymentcl->receivername?></td>
                                <td style="border-bottom:1px solid darkgray"><?=$paymentcl->bank?></td>
                                <td style="border-bottom:1px solid darkgray"><?=$paymentcl->bankaccount?></td>
                                <td style="border-bottom:1px solid darkgray"><?=$paymentcl->currency?></td>
                                <td style="border-bottom:1px solid darkgray"><?=number_format($paymentcl->amount,2)?></td>
                                <td style="border-bottom:1px solid darkgray"><?=$paymentcl->exchangerate?></td>
                                <td style="border-bottom:1px solid darkgray"><?=number_format($paymentcl->amount*$paymentcl->exchangerate,2)?></td>

                                <td style="border-bottom:1px solid darkgray"><?=$paymentcl->note?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading bg-info">
                <h6 class="panel-title"  style="padding-left:12px;">
                    <span class="statisticsleft"><span>本单毛利</span><span>(<?php echo number_format((($data['project']?$data['project']->ymtAmount:0) - ($data['project']?$data['project']->clAmount:0) + (($data['project']?$data['project']->usd:0) * ($data['project']?$data['project']->rate:0))),2)?>)</span></span>
                    <span class="statisticsleft"><span>=</span><span></span></span>
                    <span class="statisticsleft"><span>一贸通收款</span><span>(<?php echo number_format(($data['project']?$data['project']->ymtAmount:0),2)?>)</span></span>
                    <span class="statisticsleft"><span>-</span><span></span></span>
                    <span class="statisticsleft"><span>成本支付总额</span><span>(<?php echo number_format($data['project']?$data['project']->clAmount:0 ,2)?>)</span></span>
                    <span class="statisticsleft"><span>+</span><span></span></span>
                    <span class="statisticsleft"><span>结汇补贴</span><span> (<span id="tjh"><?php echo ($data['project']?$data['project']->usd:0) * ($data['project']?$data['project']->rate:0)?></span> = $ <?php echo number_format(($data['project']?$data['project']->usd:0) ,2)?>  *  系数: <?=$data['project']->rate?>)</span></span>
                </h6>
            </div>
        </div>
    <?php }?>
</div>
