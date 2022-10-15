<?php
$model = isset( $data['detail'] ) ? $data['detail'] : false;
?>
<form class="form-horizontal frm_payer" action="/setup/payer/save">
    <input type="hidden" name="id" value="<?=$model?$model['id']:'0'?>">
    <?php if( ckAuth(false) ): ?>
        <div class="form-group">
            <label class="col-md-3 control-label">客户信息 <span class="text-danger">*</span> </label>
            <div class="col-md-9">
                <?=\App\Libraries\LibComp::get_customer(['class' => 'select','name' => 'customerid'],$model ? $model['customerid'] : '')?>
            </div>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label class="col-md-3 control-label">付款人国家或地区 <span class="text-danger">*</span> </label>
        <div class="col-md-9">
            <?=\App\Libraries\LibComp::select('COUNTRY',['name' => 'region', 'class'=>'select','required'=>'required'],$model?$model['region']:'')?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">付款人名称 <span class="text-danger">*</span> </label>
        <div class="col-md-9">
            <input name="name" class="form-control" required="required" value="<?=$model?$model['name']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">银行名称 <span class="text-danger">*</span> </label>
        <div class="col-md-9">
            <input name="bankname" class="form-control" required="required" value="<?=$model?$model['bankname']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">银行账户 <span class="text-danger">*</span> </label>
        <div class="col-md-9">
            <input name="account" class="form-control" required="required" value="<?=$model?$model['account']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">币种 <span class="text-danger">*</span> </label>
        <div class="col-md-9">
            <?=\App\Libraries\LibComp::select('CURRENCY',['name' => 'currency', 'class'=>'select','required'=>'required'],$model?$model['currency']:'')?>
        </div>
    </div>
</form>
<script>
    $('.frm_payer select').select2();
</script>
