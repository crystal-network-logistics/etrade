<form class="form-horizontal" action="/admin/roles/save">
    <input type="hidden" name="id" value="">

    <div class="form-group">
        <label class="col-lg-3 control-label">角色名称:</label>
        <div class="col-lg-9">
            <input type="text" name="name" class="form-control" placeholder="请输入角色名称" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">备注:</label>
        <div class="col-lg-9">
            <input type="text" name="remark" class="form-control" placeholder="">
        </div>
    </div>
</form>