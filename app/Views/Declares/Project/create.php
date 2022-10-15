<?php
    $CustomerID = ckAuth() ? session('custId') : (isset($_REQUEST['cid'])?$_REQUEST['cid']:'');
    $project =  false;

    $is_has_vii_create = ck_action('declares/vii/create');
    $is_has_receipt_create = ck_action('declares/receipt/create');
    $is_has_payment_create = ck_action('declares/payment/create');
    $is_has_payment_create = ck_action('declares/payment/create');

?>
<link href="/resource/assets/css/project.css?_=<?php echo time()?>" type="text/css" rel="stylesheet"/>
<link href="/resource/assets/css/filesPlugin.css?_=<?php echo time()?>" type="text/css" rel="stylesheet"/>
<script src="/resource/app/filesPlugin.js?_=<?php echo time()?>"></script>

<div class="content">
    <?=view('/Declares/Project/_op')?>

    <div class="panel">
        <div class="panel-heading bg-primary">
            <h6 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#baoguan">报关资料</a></h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>
        <div id="baoguan" class="panel-collapse collapse in">
            <?=view('/Declares/Entry/form')?>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading bg-indigo-300">
            <h6 class="panel-title">
                <a class="collapsed" data-toggle="collapse" href="#other">新增其它</a>
            </h6>
        </div>

        <div id="other" class="panel-collapse collapse in">
            <div class="panel-body">
                <?php if( $is_has_vii_create ): ?>
                    <a class="btn bg-<?=$project['isentrance']?'indigo-300':'primary'?> hModal" href="/declares/vii/create?projectid=&customerid=<?=$CustomerID?>&isentrance=0" data-call="jump_page" data-text="保存">
                        <i class="icon icon-add"></i> <?=$isentrance?'申请开票':'添加增票'?>
                    </a>
                <?php endif;?>

                <?php if( $is_has_receipt_create ): ?>
                    <?php $buttons =[ ["tag"=>"button","text"=>"保存","cssClass"=>"btn btn-success hide btn_receipt_save" , "attrs"=> ["type"=>"button","onclick"=>"receipt_to_submit()"]]];?>
                    <a class="btn bg-primary hModal" href="/declares/receipt/create?id=&customerid=<?=$CustomerID?>&isentrance=0" data-buttons='<?=json_encode($buttons)?>' data-size="full"><i class="icon icon-add"></i> 新增收入</a>
                <?php endif;?>

                <?php if( $is_has_payment_create ): ?>
                    <a class="btn bg-primary hModal" href="/declares/payment/create?projectid=&customerid=<?=$CustomerID?>&isentrance=0" data-call="jump_page"><i class="icon icon-add"></i> 新增支付 </a>
                <?php endif;?>

                <?php if( $is_has_payment_create ): ?>
                    <a class="btn bg-primary hModal" href="/declares/paymentcl/create?projectid=&customerid=<?=$CustomerID?>&isentrance=0" data-call="jump_page"><i class="icon icon-add"></i> 新增成本支付 </a>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<script>
    function jump_page( resp ){
        //comm.Alert(resp.msg)
        setTimeout(()=>{
            window.location.href = `/declares/project/view?id=${resp.projectid}`
        },3000);
    }
</script>
