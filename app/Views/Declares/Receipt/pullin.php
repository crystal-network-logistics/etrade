<?php
    $unlocated_data = $data['detail'];
    $isentrance = isset($_REQUEST['isentrance'])?$_REQUEST['isentrance']:0;

?>
<form id="frm_receipt_pullin" class="form-horizontal" action="/declares/receipt/pullin">
    <input name="id" type="hidden" value="<?=$unlocated_data['id']?>">
    <input name="projectid" type="hidden" value="<?=$unlocated_data['projectid']?>">
    <input name="customerid" type="hidden" value="<?=$unlocated_data['customerid']?>">
    <input name="isentrance" type="hidden" value="<?=$unlocated_data['isentrance']??($isentrance)?>">

    <div class="form-group">
        <label class="col-lg-3 control-label">收款日期<span class="red">*</span>:</label>
        <div class="col-lg-9">
            <input type="text" name="receiptdate" class="form-control" readonly  required="required" value="<?=$unlocated_data['receiptdate']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">付款人<span class="red">*</span>:</label>
        <div class="col-lg-9">
            <input name="payername" class="form-control" readonly required="true"  value="<?=$unlocated_data['payername']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">地区<span class="red">*</span>:</label>
        <div class="col-lg-9">
            <input name="country" class="form-control" readonly  required="required"  value="<?=\App\Libraries\LibComp::get_dict('COUNTRY',$unlocated_data['payercountry'])?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">币种<span class="red">*</span>:</label>
        <div class="col-lg-9">
            <input class="form-control" name="currency" readonly  required="required" value="<?=$unlocated_data['currency']?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">金额<span class="red">*</span>:</label>
        <div class="col-lg-9">
            <input class="form-control" name="amount" placeholder="最大可转入资金 <?=$unlocated_data['amount']?>" value="<?=$unlocated_data['amount']?>" min="0" max="<?=$unlocated_data['amount']?>" onkeypress="return comm.iNum()" required="required">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">汇率<span class="red">*</span>:</label>
        <div class="col-lg-9">
            <input class="form-control"  name="exchangerate"  value="<?=$unlocated_data['exchangerate']?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">折RMB:</label>
        <div class="col-lg-9">
            <input class="form-control" id="receiptTotal" name="receiptTotal" value="<?=number_format($unlocated_data['amount']*$unlocated_data['exchangerate'],2)?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">用途<span class="red">*</span>:</label>
        <div class="col-lg-9">
            <input class="form-control" readonly value="<?=\App\Libraries\LibComp::get_dict('USAGE',$unlocated_data['usage'])?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">备注:</label>
        <div class="col-lg-9">
            <input class="form-control" name="note" value="<?=$unlocated_data['note']?>">
        </div>
    </div>
</form>
<script>
    $('#frm_receipt_pullin input[name=amount]').on('change',function (){
        var frm_receipt_pullin = $('#frm_receipt_pullin'),
            amount = frm_receipt_pullin.find('input[name=amount]').val(),
            exchange = frm_receipt_pullin.find('input[name=exchangerate]').val()
        ;
        $('#receiptTotal').val( comm.fMoney(parseFloat(amount) * parseFloat(exchange)) )
    })
</script>

