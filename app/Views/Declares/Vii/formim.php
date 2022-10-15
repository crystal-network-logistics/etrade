<?php
$vii_data = isset( $data['detail'] ) ? $data['detail'] : false;
?>

<form class="form-horizontal" id="frm_vii" action="/declares/vii/save">
    <input type="hidden" name="id" value="<?=$vii_data?$vii_data['id']:'0'?>">
    <input name="guid" value="<?=create_form()?>" type="hidden">
    <input type="hidden" name="projectid" value="<?=$vii_data?$vii_data['projectid']:''?>">
    <input type="hidden" name="isentrance" value="<?=$vii_data['isentrance']??0?>">
    <input type="hidden" name="customerid" value="<?=$vii_data['customerid']??0?>">

    <div class="form-group">
        <label class="col-lg-3 control-label">品名<span class="text-danger">*</span>:</label>
        <div class="col-lg-9">
            <input name="productname" class="form-control" required="true" placeholder="请输入 品名">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">开票人:</label>
        <div class="col-lg-9">
            <input name="invoicer" class="form-control" value="<?=$vii_data?$vii_data['invoicer']:''?>" placeholder="请输入 开票人">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">数量<span class="text-danger">*</span>:</label>
        <div class="col-lg-9">
            <input name="amount" class="form-control" placeholder="请输入 数量" value="<?=$vii_data?$vii_data['amount']:''?>" onkeypress="return comm.iNum()" required="required" type="text">
        </div>
    </div>

    <div class="form-group">

        <label class="col-lg-3 control-label">单位:</label>
        <div class="col-lg-9">
            <input name="unit" class="form-control" placeholder="请输入 单位" required="required" value="<?=$vii_data?$vii_data['unit']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">开票金额<span class="text-danger">*</span>:</label>
        <label class="col-lg-9">
            <div class="input-group">
                <input name="invoiceamount" required="required"  placeholder="请输入 开票金额" class="form-control" onkeypress="return comm.iNum()" value="<?=$vii_data?$vii_data['invoiceamount']:''?>">
                <span class="input-group-addon">RMB</span>
            </div>
        </label>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">税号<span class="text-danger">*</span>:</label>
        <div class="col-lg-9">
            <input name="taxno" id="taxno" placeholder="请输入 税号" required="required" class="form-control" value="<?=$vii_data?$vii_data['taxno']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">地址,电话<span class="text-danger">*</span>:</label>
        <div class="col-lg-9">
            <input name="contactaddress" placeholder="请输入 地址,电话" id="contactaddress" required="required" class="form-control" value="<?=$vii_data?$vii_data['contactaddress']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">开户行及账号<span class="text-danger">*</span>:</label>
        <div class="col-lg-9">
            <input name="contactbank" placeholder="请输入 开户行及账号" id="contactbank" required="required" class="form-control"  value="<?=$vii_data?$vii_data['contactbank']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">备注:</label>
        <label class="col-lg-9">
            <input name="note" placeholder="请输入 备注" class="form-control" type="text" value="<?=$vii_data?$vii_data['note']:''?>">
        </label>
    </div>

</form>
<script>
    $('#frm_vii select').select2();
</script>
