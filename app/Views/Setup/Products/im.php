<?php
    $model = $data['detail'];
?>
<form id="frm_isentrance_products" class="form-horizontal" action="/setup/products/isentrance">
    <input type="hidden" name="id" value="<?=$model['id']?:0?>">
    <input type="hidden" name="isentrance" value="1">
    <input type="hidden" name="status" value="1" id="status">

    <input type="hidden" name="customerid" value="<?=$model['customerid']??0?>">

    <div class="form-group">
        <label class="col-lg-2 control-label">中文品名<span style="color: red;">*</span> </label>
        <div class="col-lg-10">
            <input type="text" name="name" class="form-control" required="required"  value="<?=$model['name']??''?>" placeholder="请输入 中文品名">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">英文品名 <span style="color: red;">*</span> </label>
        <div class="col-lg-10">
            <input type="text" name="englishname" value="<?=$model['englishname']??''?>" class="form-control" placeholder="请输入 中文品名" required="required">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">用途<span style="color: red;">*</span></label>
        <div class="col-lg-10">
            <input type="text" name="usage" value="<?=$model['usage']??''?>" class="form-control" placeholder="请输入 商品用途" required="required">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">品牌</label>
        <div class="col-lg-10">
            <input type="text" name="brand" value="<?=$model['brand']??''?>" class="form-control" placeholder="请输入 品牌">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">型号</label>
        <div class="col-lg-10">
            <input type="text" name="model" value="<?=$model['model']??''?>" class="form-control" placeholder="请输入 型号">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">HS编码</label>
        <div class="col-lg-10">
            <input name="hscode" value="<?=$model['hscode']??''?>" class="form-control" placeholder="请输入 HS编码">
        </div>
    </div>

    <div id="dialog_super"> </div>

</form>
<script>
    $(function (){
        $('#frm_isentrance_products input[name=hscode]').on('change',function () {
            console.log($(this).val())
            get_superelements($(this).val());
        });
    });

    function get_superelements( code ){
        if ( code && code.length >= 8)
            return comm.doRequest('/setup/hscode/superelements',{code:code},(resp)=>{ $('#dialog_super').html( resp ) });
        $('#dialog_super').html('');
    }
</script>
