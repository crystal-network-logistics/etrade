<?php
$model = isset( $data['detail'] ) ? $data['detail'] : false;
?>
<form class="form-horizontal frm_receiver" action="/setup/receiver/save">
    <input type="hidden" name="id" value="<?=$model?$model['id']:'0'?>">
    <?php if( ckAuth(false) ): ?>
        <div class="form-group">
            <label class="col-md-2 control-label">客户信息 <span class="text-danger">*</span> </label>
            <div class="col-md-10">
                <?=\App\Libraries\LibComp::get_customer(['class' => 'select','name' => 'customerid'],$model ? $model['customerid'] : '')?>
            </div>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label class="col-md-2">账号类型 <span class="text-danger">*</span> </label>
        <div class="col-md-10">
            <label><input type="radio" name="type" value="2" required="required"  <?=($model?($model['type']==2?'checked':''):'')?>> 物流收款</label> &nbsp;&nbsp;
            <label><input type="radio" name="type" value="3" required="required"  <?=($model?($model['type']==3?'checked':''):'')?>> 其它收款</label> &nbsp;&nbsp;
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">收款人名称 <span class="text-danger">*</span> </label>
        <div class="col-md-10">
            <input name="name" class="form-control" required="required" value="<?=$model?$model['name']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">开户银行 <span class="text-danger">*</span> </label>
        <div class="col-md-10">
            <input name="bank" class="form-control" required="required" value="<?=$model?$model['bank']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">收款账号 <span class="text-danger">*</span> </label>
        <div class="col-md-10">
            <input name="account"  class="form-control"  required="required" value="<?=$model?$model['account']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">币种 <span class="text-danger">*</span> </label>
        <div class="col-md-10">
            <?=\App\Libraries\LibComp::select('CURRENCY',['name' => 'currency', 'class'=>'select','required'=>'required'],$model?$model['currency']:'')?>
        </div>
    </div>
</form>
<script>
    $('.frm_receiver select').select2();
    $(function () {
        <?php if ( $model && $model['type'] == 1 ): ?>
            $('.frm_receiver input select').attr('disabled',true);
        <?php endif; ?>
    })
</script>
