<?php
    $vii_data = $data['vii_data'];
    $project_data = $data['project_data'];
?>
<form id="frm_vii_rollcopy" class="form-horizontal" action="/declares/vii/rollcopy">
    <input type="hidden" name="id" value="<?=$vii_data['id']?>">
    <input type="hidden" name="isentrance" value="<?=$project_data['isentrance']?>">
    <div class="form-group">
        <label class="col-lg-2">转出到:</label>
        <div class="col-lg-10">
            <label> <input name="roll_type" value="0" type="radio" checked> 已有业务 </label>&nbsp;
            <label> <input name="roll_type" value="1" type="radio"> 新开业务 </label> &nbsp;
        </div>
    </div>

    <div class="form-group" id="vii_project_rollcopy">
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
                <input class="form-control" name="amt" placeholder="可转出金额 <?=$vii_data['invoiceamount']?>" onkeypress="return comm.iNum()" required="required" min="0" max="<?=$vii_data['invoiceamount']?>">
                <a class="input-group-addon" onclick="$('#frm_vii_rollcopy input[name=amt]').val(<?=$vii_data['invoiceamount']?>)">全部转出</a>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">转出数量 <span class="text-danger">*</span></label>
        <div class="col-lg-10">
            <div class="input-group">
                <input class="form-control" digits="digits" placeholder="可转出转出数量 <?=$vii_data['amount']?>" name="count" onkeypress="return comm.iNum()"  min="0" max="<?=$vii_data['amount']?>" required="required">
                <a class="input-group-addon" onclick="$('#frm_vii_rollcopy input[name=count]').val(<?=$vii_data['amount']?>)">全部转出</a>
            </div>
        </div>
    </div>
</form>

<script>
    $('#frm_vii_rollcopy select').select2();
    $('input[name=roll_type]').on('click',function ( ) {
        var roll = $('#vii_project_rollcopy');
        ( $(this).val() == "0" ) ? (roll.show()) : roll.hide() && (roll.find('select').val("").trigger('change'));
    })
</script>
