<?php
$data = $data['detail'];
?>
<form class="form-horizontal" id="frm_receipt_create" action="/declares/receipt/create/to">
    <input name="guid" value="<?=create_form()?>" type="hidden">
    <input type="hidden" name="id" value="<?=$data['id']?>">
    <input type="hidden" name="projectid" value="<?=$data['projectid']?>">
    <input type="hidden" name="customerid" value="<?=$data['customerid']?>">
    <input type="hidden" name="isentrance" value="<?=$data['isentrance']??0?>">

    <div class="form-group">
        <label class="col-md-2 control-label"> 业务单号 </label>
        <div class="col-md-10">
            <?=\App\Libraries\LibComp::get_available(['class'=>'select','name'=>'projectid'],[ 'status' => 1,'isentrance' => $data['isentrance']??0,'customerid' => $data['customerid'] ],$data['projectid'])?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">收款日期<span class="text-danger">*</span></label>
        <div class="col-md-10">
            <input name="receiptdate" value="<?=$data['receiptdate']?>" class="form-control" type="text" required="required" autocomplete="off" onclick="WdatePicker({})" placeholder="请选择 收款日期">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">付款人<span class="text-danger">*</span></label>
        <div class="col-md-10">
            <input id="payerid" name="payerid" type="hidden" value="<?=$data['payerid']?>">
            <input class="form-control"  value="<?=$data['payername']?>" id="pname" name="payername" type="text" required="required" placeholder="请输入 付款人名称">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">国家及地区<span class="text-danger">*</span></label>
        <div class="col-md-10">
            <?=\App\Libraries\LibComp::select('COUNTRY',['name'=>'payercountry','required'=>'true','id'=>'payercountry'],'',false)?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">币种<span class="text-danger">*</span></label>
        <div class="col-md-10">
            <?=\App\Libraries\LibComp::select('CURRENCY',['name'=>'currency','id'=>'currency','required'=>'true'],$data['currency'],false)?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">帐户类型<span class="text-danger">*</span></label>
        <div class="col-md-10">
            <?=\App\Libraries\LibComp::select('ACCOUNT',['name'=>'accounttype','id'=>'accounttype','required'=>'true'],$data['accounttype'],false)?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">用途<span class="text-danger">*</span></label>
        <div class="col-md-10">
            <?=\App\Libraries\LibComp::select('USAGE',['name'=>'usage','id'=>'rusage','required'=>'true'],$data['usage'],false)?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">金额/汇率<span class="text-danger">*</span></label>
        <div class="col-md-5">
            <input class="form-control" value="<?=$data['amount']?>" name="amount" required="true" placeholder="请输入 付款金额"  onkeypress="return comm.iNum()" >
        </div>
        <div class="col-md-5">
            <input class="form-control"  value="<?=$data['exchangerate']?>" name="exchangerate" placeholder="请输入 汇率"  required="true" onkeypress="return comm.iNum()">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">折RMB</label>
        <div class="col-md-10" style="margin-top: 8px;">
            <span id="lbTotal" class="text-danger"><?=($data['amount']*floatval( $data['exchangerate'] ))?></span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">备注</label>
        <div class="col-md-10">
            <input class="form-control" name="note" placeholder="请输入付款 备注"  value="<?=$data['note']?>">
        </div>
    </div>
</form>


<script>
    var fname = "#frm_receipt_create";
    $(`${fname} select`).select2();
    $('#currency,#accounttype,#rusage').select2({minimumResultsForSearch:-1});
    $(`${fname} input[name=amount],${fname} input[name=exchangerate]`).on('change',function ( ) {
        var amount = $(`${fname} input[name=amount]`).val(), exchange = $(`${fname} input[name=exchangerate]`).val();
        $('#lbTotal').text('￥ '+comm.fMoney(parseFloat(amount) * parseFloat(exchange)));
    });

    var timeout = 0;
    $('#pname').autocomplete({
        minChars: 2,
        lookup: function (query, done) {
            clearTimeout(timeout);
            var keys = $('#pname').val();
            timeout = setTimeout(function (){
                var customerid = $('#frm_receipt_create input[name=customerid]').val()
                comm.doRequest('/setup/payer/auto_data',{ keys : keys ,customerid : customerid }, (resp)=> {
                    console.log(resp.data);
                    var data = [];
                    $.each(resp.data,function (k,v) {
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
            $('#frm_receipt_create input[name=payername]').val(suggestion.data.name);
            $('#frm_receipt_create input[name=payerid]').val(suggestion.data.id);
            // $('#frm_receipt_create input[name=bank]').val(suggestion.data.bankname);
            // $('#frm_receipt_create input[name=bankaccount]').val(suggestion.data.account);
        },
    });
</script>

