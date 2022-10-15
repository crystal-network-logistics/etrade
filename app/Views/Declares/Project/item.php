<div class="panel">
    <div class="panel-heading bg-<?=$project['isentrance']?'indigo-300':'primary'?>">
        <h6 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#vii">增票信息</a>
            <span class="sm">增票总额: <?=$project?number_format($project["vcapital"],2):0?></span>&nbsp;
            <?php if ($project['isentrance'] == 0):?>
            <span class="sm">退税额: <?=number_format($project?$project["tuishui"]:0,2)?></span>&nbsp;
            <?php if( ckAuth(false) && $project["vcapital"] ) : ?>
                <span class="sm">实际退税额:
                        <?php if( ( ckAuth('finance') || ckAuth('admin') || ckAuth('all')) && $project['status'] == 1 ) : ?>
                            <a style="color: #fff;border-bottom: 1px dashed #fff;" href="/declares/project/realityamount?id=<?=$project["ID"]?>"
                               onclick="return comm.doPrompt(this.href,{title:'设置实际退税额',type:'number'},(resp)=>{ setTimeout(()=>{ window.location.reload() },3000) })">
                                <?=$project["realityamount"]??"0.00";?> </a>
                        <?php else: ?>
                            <span class="realts">
                                <?=number_format($project?$project["realityamount"]:0,2)?>
                            </span>
                        <?php endif;?>
                    </span>&nbsp;

                <span class="sm chaer">差额:
                        <?php $am = ($project["realityamount"]-($project?$project["tuishui"]:0));
                        echo number_format($project?($project["realityamount"]==0?0:$am):0,2)?>
                    </span>&nbsp;
            <?php endif;?>

            <span class="sm">
                    <?php
                    $vCap = $project?$project["vtag"]:0;
                    $text = '规则:从出运日期开始,未确认退税的开始预警。<br />30天黄色<br />60天橙色<br />80天红色';
                    ?>
                <?php if($vCap == 1){?>
                    <span class="label yellow" data-popup="tooltip" data-html="true" title="<?=$text?>">增票流程黄色预警</span>
                <?php } else if($vCap == 2){?>
                    <span class="label bg-orange" data-popup="tooltip" data-html="true" title="<?=$text?>">增票流程橙色预警</span>
                <?php } else if($vCap == 3){?>
                    <span class="label bg-warning" data-popup="tooltip" data-html="true" title="<?=$text?>">增票流程红色预警</span>
                <?php }?>
            </span>
            <?php endif;?>
        </h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
    <div id="vii" class="panel-collapse collapse in">
        <?=view('/Declares/Vii/index')?>
    </div>
</div>

<div class="panel">
    <div class="panel-heading bg-<?=$project['isentrance']?'indigo-300':'primary'?>">
        <h6 class="panel-title">
            <a class="collapsed" data-toggle="collapse" href="#receipt">收入情况</a>
            <span class="sm">&nbsp;&nbsp;收入总计(RMB)：<?php echo number_format($project?$project['receiptsum']:0,2)?></span> &nbsp;
            <?php if ($project['isentrance'] == 0):?>
            <span class="sm">
                    <?php $iSre = $project?$project['rtag']:0;$text = '规则:从出运日期开始，未确认收齐的开始预警。<br />30天黄色<br />60天橙色<br />80天红色';?>
                <?php if($iSre == 1): ?>
                    <span class="label yellow" data-popup="tooltip" data-html="true" title="<?=$text?>">收入流程黄色预警</span>
                <?php elseif($iSre == 2): ?>
                    <span class="label bg-orange" data-popup="tooltip" data-html="true" title="<?=$text?>">收入流程橙色预警</span>
                <?php elseif($iSre == 3): ?>
                    <span class="label bg-warning" data-popup="tooltip" data-html="true" title="<?=$text?>">收入流程红色预警</span>
                <?php endif;?>
            </span>
            <?php endif;?>
        </h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
    <div id="receipt" class="panel-collapse collapse in">
        <?=view('/Declares/Receipt/index')?>
    </div>
</div>

<div class="panel">
    <div class="panel-heading bg-<?=$project['isentrance']?'indigo-300':'primary'?>">
        <h6 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#pay">支付情况</a>
            <span class="sm">&nbsp;&nbsp;支付总计(RMB)：<?php echo number_format($project?$project['payamount']:0 ,2)?></span>
        </h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
    <div id="pay" class="panel-collapse collapse in">
        <?=view('/Declares/Payment/index')?>
    </div>
</div>

<div class="panel">
    <div class="panel-heading bg-<?=$project['isentrance']?'indigo-300':'primary'?>" style="border-radius: 3px;">
        <h6 class="panel-title">
            <span class="statisticsleft"><span>本单余额</span><span id="spanSum">(<?php echo number_format((($project['receiptsum']) + ($project['tuishui']) - ($project['payamount'])),2)?>)</span></span>
            <span class="statisticsleft"><span>=</span><span></span></span>
            <span class="statisticsleft"><span>收入总计</span><span id="spanRsum">(<?php echo number_format(($project['receiptsum']),2)?>)</span></span>
            <span class="statisticsleft"><span>+</span><span></span></span>
            <span class="statisticsleft"><span>退税额</span><span id="spanTaxrate">(<?php echo number_format($project['tuishui'],2)?>)</span></span>
            <span class="statisticsleft"><span>-</span><span></span></span>
            <span class="statisticsleft"><span>支付总额</span><span id="spanPsum">(<?php echo number_format($project['payamount'] ,2)?>)</span></span>
        </h6>
    </div>
</div>

<?php if (ckAuth(false)):?>
    <div class="panel">
        <div class="panel-heading bg-<?=!$project['isentrance']?'indigo-300':'primary'?>">
            <h6 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#paycl">成本支付情况</a>
                <span class="sm">&nbsp;&nbsp;支付总计(RMB)：<?php echo number_format($project?$project['paymnet_cl_amount']:0 ,2)?></span>
            </h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>
        <div id="paycl" class="panel-collapse collapse in">
            <?=view('/Declares/Paymentcl/index')?>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading bg-<?=!$project['isentrance']?'indigo-300':'primary'?>" style="border-radius: 3px;">
            <h6 class="panel-title">
                <span class="statisticsleft"> <span>本单毛利</span><span>(<span id="maoli"><?php echo number_format((($project?$project['ymt_amount']:0) - ($project?$project['paymnet_cl_amount']:0)) + ($project?($project['usd']*$project['rate']):0),2)?></span>)</span></span>
                <span class="statisticsleft"><span>=</span><span></span></span>
                <span class="statisticsleft"><span><?= $company?($company['shortname']?$company['shortname']:$company['name']):'一贸通' ?>收款</span><span>(<?php echo number_format(($project?$project['ymt_amount']:0),2)?>)</span></span>
                <span class="statisticsleft"><span>-</span><span></span></span>
                <span class="statisticsleft"><span>成本支付总额</span><span>(<?php echo number_format($project?$project['paymnet_cl_amount']:0 ,2)?>)</span></span>
                <span class="statisticsleft"><span>+</span><span></span></span>
                <span class="statisticsleft"><span>结汇补贴</span><span> (  <span id="tjh"><?php echo ($project?$project['usd']:0) * ($project?$project['rate']:0)?></span> = $ <?php echo number_format(($project?$project['usd']:0) ,2)?>  *  系数: <input type="text" id="jhrate" size="8" value="<?=$project['rate']?>" style="width: 65px;display: inline-block;border: 1px solid #eee; height: 22px; color: #000;padding: 2px 5px;border-radius: 2px;" onchange="return comm.doRequest('/declares/project/allowance',{id:'<?=$project['ID']?>',rate : $('#jhrate').val()},(resp)=>{comm.Alert(resp.msg,resp.code); setTimeout(()=>{window.location.reload()},3000)},'json')" onkeypress="return comm.iNum()"> )</span></span>
            </h6>
        </div>
    </div>
<?php endif;?>
