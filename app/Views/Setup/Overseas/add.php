<?php
    $type = $data['detail']['type'];
?>
<form class="form-horizontal frm_overseas" action="/setup/overseas/save">
    <input type="hidden" name="id" value="0">
    <input type="hidden" name="type" value="<?=($type??0)?>">
    <input type="hidden" name="customerid" value="<?=$data['detail']['cid']?>">

    <div class="form-group">
        <label class="col-md-2 control-label">名称 <span class="text-danger">*</span> </label>
        <div class="col-md-10">
            <input name="companyname" class="form-control" required="required" placeholder="请输入 贸易商名称">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">地址 <span class="text-danger">*</span> </label>
        <div class="col-md-10">
            <input name="address" class="form-control" required="required" placeholder="请输入 贸易商地址">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">联系人 </label>
        <div class="col-md-10">
            <input name="contractor" class="form-control"  placeholder="请输入 贸易商联系人">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">联系电话 </label>
        <div class="col-md-10">
            <input name="phone" class="form-control"   placeholder="请输入 贸易商联系电话">
        </div>
    </div>
</form>
<script>
    var mGuid = localStorage.getItem('mGuid');
    $(function () {
        setTimeout(()=>{
            $(`#${mGuid} .btn-submit`).unbind().on('click',function ( ) {
                comm.doSubmit(this);
                comm.doRequest('/setup/overseas/get_data',{ customerid : $('.frm_overseas input[name=customerid]').val() , type: $('.frm_overseas input[name=type]').val()},( resp )=>{
                    var opts = '';
                    $.each(resp.data,function (k,item) {
                        opts += `<option value="${item.id}">${item.companyname}</option>`
                    });
                    if ( $('.frm_overseas input[name=type]').val() == 0 ) {
                        $('.entity select[name=businessid]').html(opts);
                    } else {
                        $('.entity select[name=domesticid]').html(opts);
                    }
                },'json');
            });
        },200)
    })

</script>
