<?php
$invoicer_data = get_invoicer_data( $data['customerid'] );
$customer_data = get_customer_data($data['customerid']);
?>
<form class="form-horizontal" id="frm_payment" action="/declares/paymentcl/create">
    <input name="guid" value="<?=create_form()?>" type="hidden">
    <input type="hidden" name="id" value="<?=(isset($data['id'])?$data['id']:0)?>">
    <input type="hidden" name="projectid"  value="<?=$data['projectid']?>">
    <input type="hidden" name="customerid" value="<?=$data['customerid']?>">
    <input type="hidden" name="isentrance" value="<?=$data['isentrance'] ?>">

    <div class="form-group">
        <label class="col-lg-3 control-label">收款人类型<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <?=\App\Libraries\LibComp::select('RECEIVER_TYPE',['name'=>'type','class'=>'select','id'=>'receipttype'],(isset($data['type']) ? $data['type'] : ''),false)?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">收款人公司名称<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <div id="rInput">
                <input name="receiverid" type="hidden" value="<?=$data['receiverid']?>" id="iReceiptId">
                <input id="fname" name="receivername"  value="<?=$data['receivername']?>" class="form-control" placeholder="请输入 收款人公司名称">
            </div>

            <div id="rSelected" style="display: none">
                <select id="sReceiptId" class="select">
                    <option value="">--请选择--</option>
                    <?php foreach( $invoicer_data as $row ) :?>
                        <option value="<?=$row['id']?>" <?=($data['receiverid']==$row['id']?'selected':'')?> data-json='<?=json_encode(['name'=>$row['name'],'bank'=>$row['bank'],'account'=>$row['account']])?>'><?=$row['name']?></option>
                    <?php endforeach;?>
                </select>
            </div>

        </div>

    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">开户银行<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input name="bank" value="<?=$data['bank']?>" id="vBank" placeholder="请输入 开户银行" class="form-control" type="text" required="required">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">银行账号<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input name="bankaccount" value="<?=$data['bankaccount']?>" id="vBankAccount" placeholder="请输入 银行账号" class="form-control" required="required">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">币种</label>
        <div class="col-lg-9">
            <?=\App\Libraries\LibComp::select('CURRENCY',['name'=>'currency','id'=>'vCurrency','class'=>'select',"required"=>"required"],($data['currency']??'CNY'))?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">付款金额<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input name="amount" required="required" value="<?=$data['amount']?>" placeholder="请输入 付款金额" class="form-control" onkeypress="return comm.iNum()">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">备注</label>
        <div class="col-lg-9">
            <input name="note" class="form-control" type="text"  placeholder="请输入 备注" value="<?=$data['note']?>">
        </div>
    </div>

</form>


<script>
    $('#frm_payment select').select2()
    $('#frm_payment select[name=currency]').select2({minimumResultsForSearch:-1})
    var timeout = 0;
    $('#fname').autocomplete({
        minChars: 2,
        lookup: function (query, done) {
            clearTimeout(timeout);
            var keys = $('#fname').val();
            timeout = setTimeout(function (){
                var customerid = $('#frm_payment input[name=customerid]').val()
                comm.doRequest('/setup/receiver/autocomplete_data',{ keys : keys ,customerid : customerid }, (resp)=> {
                    console.log(resp.data);
                    var data = [];
                    $.each(resp.data,function (k,v) {
                        //console.log()
                        data.push({ value : `${v.name}${ v.bankname?('('+ v.bankname + v.account +')') : '' } `, data : v })
                    });
                    var result = {
                        suggestions : data
                    };
                    done(result);
                },'json');
            },300);
        },
        onSelect: function(suggestion) {
            var frm = 'frm_payment';
            $(`#${frm} input[name=receivername]`).val(suggestion.data.name);
            $(`#${frm} input[name=receiverid]`).val(suggestion.data.id);
            $(`#${frm} input[name=bank]`).val(suggestion.data.bank);
            $(`#${frm} input[name=bankaccount]`).val(suggestion.data.account);
            $(`#${frm} select[name=currency]`).val(suggestion.data.currency).trigger('change');
        },
    });
    $(function () {
        $('#receipttype').change(function(){
            var obj = this; var v = $(obj).val(); set_pay(v);
        });
        $('#sReceiptId').change(function(){
            var obj = this,json = $(obj).find("option:selected").data('json'),frm = 'frm_payment';
            if ( json ) {
                var data = json;//JSON.parse(json);
                console.log(data);
                $(`#${frm} input[name=bank]`).val(data.bank);
                $(`#${frm} input[name=bankaccount]`).val(data.account);
                $(`#${frm} select[name=currency]`).val(data.currency).trigger('change');
            }
        });
    });

    function set_pay(v){
        if(v == 2 || v == 3 || v == 9){
            $('#rInput').show() && $('#rCode').show() &&
            $('#iReceiptId').attr('name','receiverid') && $('#fname').attr('name','receivername') ;
            $('#rSelected').hide() && $('#sReceiptId').removeAttr('name') && $('#vBank').removeAttr('readonly') && $('#vBankAccount').removeAttr('readonly');
        }else{
            $('#rInput').hide() && $('#rCode').hide() && $('#iReceiptId').removeAttr('name') && $('#fname').removeAttr('name');
            $('#rSelected').show() && $('#sReceiptId').attr('name','receiverid') && $('#vBank').attr('readonly','true') && $('#vBankAccount').attr('readonly','true');
        }
        $('#vBank').val('') && $('#vBankAccount').val('') && $('#fname').val('') && $('#sReceiptId').val('').trigger('change') && $('#vCurrency').val('USD').trigger('change')&&    $('#iReceiptId').val('');
    }

</script>
