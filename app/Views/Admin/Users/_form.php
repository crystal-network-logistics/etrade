<?php
    $power = new \App\Services\comm();
    $roles_data = $power->get_roles_data();
?>
<form id="frm_user" class="form-horizontal" action="/admin/users/save">
    <input type="hidden" name="id" value="<?=$data?$data->id:''?>">

    <div class="form-group">
        <label class="col-lg-2 control-label">登录帐户:</label>
        <div class="col-lg-10">
            <input type="text" 
                   value="<?=$data?$data->username:''?>"
                   <?=$data?'readonly':''?>
                   name="username" 
                   class="form-control"
                   required="required"
                   placeholder="登录帐户:3位字母或数字"  onkeyup="value=value.replace(/[\W]/g,'')"
                   onbeforepaste ="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"
            >
        </div>
    </div>
    
    <?php if( !$data ) :?>
    <div class="form-group">
        <label class="col-lg-2 control-label">登录密码:</label>
        <div class="col-lg-10">
            <input type="password" name="password" class="form-control" required="required" placeholder="登录密码:6位以上数字或字母">
        </div>
    </div>
    <?php endif;?>

    <div class="form-group">
        <label class="col-lg-2 control-label">名称:</label>
        <div class="col-lg-10">
            <input type="text" name="name" value="<?=$data?$data->name:''?>" class="form-control" placeholder="">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">角色:</label>
        <div class="col-lg-10" style="padding-top: 8px;">
            <?php
                $R = $data ? explode(',',$data->user_roles):[];
            ?>
            <?php foreach ($roles_data as $item) :?>
                <?php $isd = ($data&&in_array($item['id'],$R) && ($item['creatorId'] != $data->id && $item['creatorId'] != session('id')));?>
                <label style="margin-right: 10px;">
                    <?php if($isd) :?>
                    <input name="roles[]" value="<?=$item["id"]?>" type="hidden">
                    <?php endif;?>
                    <input type="checkbox" name="roles[]"
                        <?php echo ($isd ? 'disabled' : '')?>
                        <?=($data&&in_array($item["id"],$R) ? 'checked':'')?>
                           value="<?=$item["id"]?>">
                    
                    <?=$item["name"]?>
                </label>
            <?php endforeach;?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">手机号:</label>
        <div class="col-lg-10">
            <input type="text" name="phone" class="form-control" value="<?=$data?$data->phone:''?>" placeholder="例：13888888888">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">备注:</label>
        <div class="col-lg-10">
            <input type="text" name="remark" class="form-control"value="<?=$data?$data->remark:''?>" >
        </div>
    </div>
</form>
