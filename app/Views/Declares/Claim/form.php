<?php
$projectId = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
$customerId = (ckAuth()?session('custId'):(isset($_REQUEST['customerid'])?$_REQUEST['customerid']:0))
?>
<form class="form-horizontal" id="frm_receipt_create" action="/declares/claim/save">
    <div class="row">
        <input name="guid" value="<?=create_form()?>" type="hidden">
        <input type="hidden" name="id" value="0">
        <input type="hidden" name="projectid" value="<?=$projectId?>">
        <input type="hidden" name="customerid" value="<?=$customerId?>">
        <input type="hidden" name="isentrance" value="0">
        <div class="col-md-6">

            <div class="form-group">
                <label class="col-lg-3 control-label">付款人公司名称<span class="text-danger">*</span> </label>
                <div class="col-lg-9">
                    <input id="payerid" name="payerid" type="hidden">
                    <input class="form-control" id="pname" type="text" name="payername" required="required" placeholder="请输入 付款人公司名称">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">国家及地区<span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <?=\App\Libraries\LibComp::select('COUNTRY',['name'=>'payercountry','required'=>'true','id'=>'payercountry'],'',false)?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">付款银行<span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <input class="form-control" name="bank" required="required"  placeholder="请输入 付款银行">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">银行帐号<span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <input class="form-control" name="bankaccount" required="required" placeholder="请输入 银行帐号">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label"></label>
                <div class="col-lg-9">
                    <label>
                        <input name="tag" type="checkbox" checked>
                        保存付款人信息
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-lg-3 control-label">币种<span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <?=\App\Libraries\LibComp::select('CURRENCY',['name'=>'currency','id'=>'currency','required'=>'true'],'',false)?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">计划付款金额<span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <input class="form-control" name="receiptamount" required="required"  onkeypress="return comm.iNum()" placeholder="请输入 计划付款金额">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">计划付款日期<span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <input name="receiptdate" class="form-control" type="text" required="required" autocomplete="off" onclick="WdatePicker({minDate:new Date()})"  placeholder="请输入 计划付款日期">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">备注</label>
                <div class="col-lg-9">
                    <input name="note" class="form-control" type="text"   placeholder="请输入 备注">
                </div>
            </div>
        </div>
    </div>
    <button class="btn_receipt_submit hide" type="submit"></button>
</form>

<script>
    var fname = "#frm_receipt_create";
    $(fname).toSubmit({success : function (resp){
            comm.Alert(resp.msg,true); comm.closeModal(); if ( window.load_receipts_data )  load_receipts_data();
        },error:function (resp){
            comm.Alert(resp.msg,false)
        }});
</script>
