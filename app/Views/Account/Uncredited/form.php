<?php
$model = $data['detail'];
$power = new \App\Services\comm();
$roles_data = $power->get_roles_data();
?>
<form id="frm_account" class="form-horizontal" action="/account/uncredited/save">
    <input type="hidden" name="id" value="<?=$model?$model["id"]:''?>">
    <div class="custom">
        <div class="form-group">
            <label class="col-lg-2 control-label">归属公司<span class="text-danger">*</span> </label>
            <div class="col-lg-10">
                <?=\App\Libraries\LibComp::get_company(['class'=>'control-primary','required'=>'required','name'=>'companyid'])?>
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-lg-2 control-label">所属客户<span class="text-danger">*</span> </label>
            <div class="col-lg-10">
                <?=\App\Libraries\LibComp::get_customer(['class'=>'control-primary','required'=>'required','name'=>'customerid'])?>
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
        <label class="col-lg-2 control-label">真实名称 <span class="text-danger">*</span> </label>
        <div class="col-lg-10">
            <input type="text" name="realname" required value="<?=$model?($model["realname"]??$model["nickname"]):''?>" class="form-control" placeholder="帐户名称">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2">用户权限<span class="text-danger">*</span> </label>
        <div class="col-lg-10">
            <?=\App\Libraries\LibComp::get_roles_radio(['class'=>'control-primary','required'=>'required','name'=>'role'],'radio',[])?>
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
<?=script_tag('resource/app/custpicker.js')?>
<script>
    $('#frm_account select').select2();

    $('.custom').custpicker();

    <?php if ( $model ) :?>
    setTimeout(function () {
        comm.formload( $('#frm_account') ,{ companyid:'<?=$model['companyid']?>',customerid : '<?=$model['customerid']?>' });
    },200)
    <?php endif;?>
</script>
