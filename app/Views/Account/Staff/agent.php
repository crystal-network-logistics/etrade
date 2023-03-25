<?php
$model = $data;
?>
<form id="frm_account" class="form-horizontal" action="/account/staff/agent">
    <input type="hidden" name="id" value="<?=$model?$model["id"]:''?>">
    <input type="hidden" name="type" value="ent">
    <div class="custom">

        <div class="form-group">
            <label class="col-lg-2 control-label">归属公司<span class="text-danger">*</span> </label>
            <div class="col-lg-10">
                <?=\App\Libraries\LibComp::get_company(['class'=>'control-primary','required'=>'required','name'=>'companyid'],$model?$model["companyid"]:'')?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">绑定客户<span class="text-danger">*</span> </label>
            <div class="col-lg-10">
                <select id="customerid" name="cids[]" multiple="multiple" class="select select-xs" required="required"></select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">登录帐户 <span class="text-danger">*</span> </label>
        <div class="col-lg-10">
            <input
                <?=(($model&&$model['username'])?'readonly':'')?>
                type="text"
                value="<?=$model?$model["username"]:''?>"
                name="username"
                class="form-control"
                required="required"
                placeholder="登录帐户:3位字母或数字"
                onkeyup="value=value.replace(/[\W]/g,'')"
                onbeforepaste ="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))">

        </div>
    </div>

    <?php if( !$model ) :?>
        <div class="form-group">
            <label class="col-lg-2 control-label">登录密码 <span class="text-danger">*</span></label>
            <div class="col-lg-10">
                <input type="password" name="password" minlength="6" class="form-control" required="required" placeholder="登录密码:6位以上数字或字母">
            </div>
        </div>
    <?php endif;?>

    <div class="form-group">
        <label class="col-lg-2 control-label">提成比例 <span class="text-danger">*</span></label>
        <div class="col-lg-10">
            <div class="input-group">
                <input required="required" name="percentage" min="0" max="100" class="form-control" placeholder="请输入 提成比例: 例 10" value="<?=$model?$model["percentage"]:''?>" onkeypress="return comm.iNum()">
                <span class="input-group-addon">%</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">真实名称 <span class="text-danger">*</span> </label>
        <div class="col-lg-10">
            <input type="text" name="realname" required value="<?=$model?($model["realname"]??$model["nickname"]):''?>" class="form-control" placeholder="帐户名称">
        </div>
    </div>


    <div class="form-group">
        <label class="col-lg-2 control-label">手机号 <span class="text-danger">*</span></label>
        <div class="col-lg-10">
            <input type="text" required="required" name="tel" digits="digits" maxlength="11" minlength="11" class="form-control" value="<?=$model?$model["tel"]:''?>" placeholder="例：13888888888">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">邮箱 <span class="text-danger">*</span></label>
        <div class="col-lg-10">
            <input type="email" required="required" name="email" minlength="4" class="form-control" value="<?=$model?$model["email"]:''?>" placeholder="例：admin@sina.com">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">备注:</label>
        <div class="col-lg-10">
            <input type="text" name="remark" class="form-control" value="<?=$model?$model["remark"]:''?>" >
        </div>
    </div>

</form>

<?=script_tag('resource/app/custpicker.js?_=4')?>
<script>
    $('#frm_account select').select2();
    $('.custom').custpicker({defaultValue:true});
    <?php if ( $model ) :?>
    setTimeout(() =>{
        comm.formload( $('#frm_account') ,{ cids : <?=json_encode( $model['cids'] )?> });
    },200)
    <?php endif;?>

</script>
