<?php
$model = isset( $data['detail'] ) ? $data['detail'] : false;
?>
<form class="form-horizontal frm_receiver" action="/setup/overseas/save">
    <input type="hidden" name="id" value="<?=$model?$model['id']:'0'?>">

    <?php if( ckAuth(false) ): ?>
        <div class="form-group">
            <label class="col-md-2 control-label">客户信息 <span class="text-danger">*</span> </label>
            <div class="col-md-10">
                <?=\App\Libraries\LibComp::get_customer(['class' => 'select','name' => 'customerid',"required"=>"required"],$model ? $model['customerid'] : '')?>
            </div>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label class="col-md-2">类型 <span class="text-danger">*</span> </label>
        <div class="col-md-10">
            <label><input type="radio" name="type" value="0" required="required" <?=($model?($model['type']==0?'checked':''):'')?>> 境外贸易商 </label> &nbsp;&nbsp;
            <label><input type="radio" name="type" value="1" required="required" <?=($model?($model['type']==1?'checked':''):'')?>> 境内收货人</label> &nbsp;&nbsp;
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">名称 <span class="text-danger">*</span> </label>
        <div class="col-md-10">
            <input name="companyname" class="form-control" required="required" value="<?=$model?$model['companyname']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">地址 <span class="text-danger">*</span> </label>
        <div class="col-md-10">
            <input name="address" class="form-control" required="required" value="<?=$model?$model['address']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">联系人 </label>
        <div class="col-md-10">
            <input name="contractor" class="form-control" value="<?=$model?$model['contractor']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">联系电话 </label>
        <div class="col-md-10">
            <input name="phone" class="form-control" value="<?=$model?$model['phone']:''?>">
        </div>
    </div>
</form>

<script>
    $('.frm_receiver select').select2();
</script>
