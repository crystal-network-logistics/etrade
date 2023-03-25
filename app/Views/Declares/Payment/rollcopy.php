<?php
$payment_data = $data['payment_data'];
$project_data = $data['project_data'];
?>
<form id="frm_payment_rollcopy" class="form-horizontal" action="/declares/payment/rollcopy">
    <input type="hidden" name="id" value="<?=$payment_data['id']?>">
    <input type="hidden" name="isentrance" value="<?=$project_data['isentrance']?>">

    <div class="form-group">
        <label class="col-lg-2">转出到:</label>
        <div class="col-lg-10">
            <label> <input name="roll_type" value="0" type="radio" checked> 已有业务 </label>&nbsp;
            <label> <input name="roll_type" value="1" type="radio"> 新开业务 </label> &nbsp;
        </div>
    </div>

    <div class="form-group" id="receipt_project_rollcopy">
        <label class="col-lg-2 control-label"> 业务单号 </label>
        <div class="col-lg-10">
            <select name="projectid" class="select">
                <option value="">--请选择业务单号--</option>
                <?php foreach ( $project_data as $item ) :?>
                    <option value="<?=$item['ID']?>"><?=$item['BusinessID']?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">转出金额 <span class="text-danger">*</span></label>
        <div class="col-lg-10">
            <div class="input-group">
                <input class="form-control" name="amount" placeholder="可转出金额 <?=($payment_data['amount']-$payment_data["transfer_amount"])?>" onkeypress="return comm.iNum()" required="required" min="0" max="<?=$payment_data['amount']?>">
                <a class="input-group-addon" onclick="$('#frm_payment_rollcopy input[name=amount]').val(<?=($payment_data['amount']-$payment_data["transfer_amount"])?>)">全部转出</a>
            </div>
        </div>
    </div>
</form>

<script>
    $('#frm_payment_rollcopy select').select2();
    $('input[name=roll_type]').on('click',function ( ) {
        var roll = $('#receipt_project_rollcopy') ,select = roll.find('select');
        ( $(this).val() == "0" ) ? (roll.show() && select.attr('required','required')) : ( roll.hide() && (select.val("").trigger('change')) && select.removeAttr('required'));
    })
</script>
