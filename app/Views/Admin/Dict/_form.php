<?php
    $model = isset($data) && is_object($data) ? $data : false;

    $pid = ($model && is_object($model)) ? $model->parentid : ($data['parentid']??0);
    ?>
<form class="form-horizontal" action="/admin/dict/save">
    <input type="hidden" name="id" value="<?=$model?$model->id:''?>">
    <div class="form-group">
        <label class="col-lg-2 control-label">上一级:</label>
        <div class="col-lg-10">
            <?=\App\Libraries\LibComp::tree_select(['class'=>'select','name'=>'parentid'],$pid)?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">字典名称 <label class="text-danger">*</label> :</label>
        <div class="col-lg-10">
            <input type="text" name="name" class="form-control" placeholder="字典名称" required="required" value="<?=$model?$model->name:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">字典编码 <label class="text-danger">*</label> :</label>
        <div class="col-lg-10">
            <input type="text" name="code" class="form-control" placeholder="字典编码"  required="required"  value="<?=$model?$model->code:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">排序(降序):</label>
        <div class="col-lg-10">
            <input type="number" name="sorting" class="form-control" placeholder="排序"  value="<?=$model?$model->sorting:'0'?>" min="0" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">备注:</label>
        <div class="col-lg-10">
            <input type="text" name="remark" class="form-control" placeholder=""  value="<?=$model?$model->remark:''?>">
        </div>
    </div>
</form>
<script>
    $('.select').select2();
</script>
