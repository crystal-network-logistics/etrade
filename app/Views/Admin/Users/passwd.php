<?php
$power = new \App\Services\comm();
$roles_data = $power->get_roles_data();
?>
<form id="frm_user" class="form-horizontal" action="/admin/users/setpasswd">
    <div class="form-group">
        <label class="col-lg-2 control-label">原密码:</label>
        <div class="col-lg-10">
            <input  type="password" name="o" required="required" class="form-control" minlength="6">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">新密码:</label>
        <div class="col-lg-10">
            <input  type="password" name="n" required="required" class="form-control" minlength="6">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">重复输入:</label>
        <div class="col-lg-10">
            <input  type="password" name="r" required="required" class="form-control" minlength="6">
        </div>
    </div>
</form>