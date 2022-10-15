<form class="form-horizontal frm_cust_selected">
    <div class="form-group">
        <div class="col-md-12">
            <label class="control-label">请选择客户</label>
            <?=\App\Libraries\LibComp::get_customer(['name'=>'customerid','class'=>'select'])?>
        </div>
    </div>
</form>
<script>
    $('.frm_cust_selected select').select2();
</script>
