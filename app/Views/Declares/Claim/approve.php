<?php
    $project_data = $data['project'];
    $claim_data = $data['claim_data'];
?>
<form class="form-horizontal" id="frm_receipt_claim_approve" action="/declares/claim/approve">
    <input type="hidden" name="guid" value="<?=create_form()?>">
    <input type="hidden" name="id" value="<?=$claim_data['id']?>">
    <input type="hidden" name="customerid"  value="<?=$claim_data['customerid']?>">

    <div class="form-group">
        <label class="col-md-2 control-label">业务号<span class="text-danger">*</span>:</label>
        <div class="col-md-10">
            <select name="projectid" class="select">
                <option value="">--不指定业务号--</option>
                <?php foreach($project_data as $item) {?>
                    <option value="<?=$item['ID']?>" <?=($item['ID']==$claim_data['projectid']) ? 'selected' : ''?>><?=$item['BusinessID']?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">收款日期<span class="text-danger">*</span>:</label>
        <div class="col-md-10">
            <input name="receiptdate" class="form-control" value="<?=$claim_data['receiptdate']?>" type="text"  placeholder="请输入 收款日期" required="required"  autocomplete="off" onclick="WdatePicker({})">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">付款人<span class="text-danger">*</span>:</label>
        <div class="col-md-10">
            <input name="payername" class="form-control" required="required" id="claim_pname" type="text" placeholder="请输入 付款人名称" value="<?=$claim_data['payername']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">国家及地区<span class="text-danger">*</span>:</label>
        <div class="col-md-10">
            <?=\App\Libraries\LibComp::select('COUNTRY',['name'=>'payercountry','required'=>'true','id'=>'payercountry'],$claim_data['payerregion'],false)?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">币种<span class="text-danger">*</span>:</label>
        <div class="col-md-10">
            <?=\App\Libraries\LibComp::select('CURRENCY',['name'=>'currency','id'=>'currency','required'=>'true'],$claim_data['currency'],false)?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">帐户类型<span class="text-danger">*</span>:</label>
        <div class="col-md-10">
            <?=\App\Libraries\LibComp::select('ACCOUNT',['name'=>'accounttype','id'=>'accounttype','required'=>'true'],'',false)?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">用途<span class="text-danger">*</span>:</label>
        <div class="col-md-10">
            <?=\App\Libraries\LibComp::select('USAGE',['name'=>'usage','id'=>'Rusage','required'=>'true'],'',false)?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">金额/汇率<span class="text-danger">*</span>:</label>
        <div class="col-md-5">
            <input class="form-control" name="amount"  placeholder="请输入 金额" required="required" value="<?=$claim_data['receiptamount']?>"  onkeypress="return comm.iNum()" >
        </div>

        <div class="col-md-5">
            <input class="form-control" name="exchangerate" required="required" onkeypress="return comm.iNum()" placeholder="请输入 汇率">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">折RMB:</label>
        <div class="col-md-10" style="margin-top: 8px;"><span id="lb_total" class="text-danger"></span></div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">备注:</label>
        <div class="col-md-10">
            <input class="form-control" name="note" value="<?=$claim_data['note']?>" placeholder="请输入 备注">
        </div>
    </div>
</form>
<script>
    var frm_name = '#frm_receipt_claim_approve'
    $(`${frm_name} select`).select2();
    $(`${frm_name} select[name=accounttype] ,${frm_name} select[name=usage],${frm_name} select[name=currency]`).select2({ minimumResultsForSearch:-1 });
    $(`${frm_name} input[name=amount],${frm_name} input[name=exchangerate]`).on('change',function ( ) {
        var amount = $(`${frm_name} input[name=amount]`).val(), exchange = $(`${frm_name} input[name=exchangerate]`).val();
        $('#lb_total').text('￥ '+comm.fMoney(parseFloat(amount) * parseFloat(exchange)));
    })
    var timeout = 0;
    $('#claim_pname').autocomplete({
        minChars: 2,
        lookup: function (query, done) {
            clearTimeout(timeout);
            var keys = $('#claim_pname').val();
            timeout = setTimeout(function (){
                var customerid = $('#frm_receipt_claim_approve input[name=customerid]').val();

                comm.doRequest('/setup/payer/auto_data',{ keys : keys ,customerid : customerid }, (resp)=> {
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
            $(`${frm_name} input[name=payername]`).val(suggestion.data.name);
        },
    });
</script>
