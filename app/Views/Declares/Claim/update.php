<?php
$data = $data['detail'];
?>
<form class="form-horizontal" id="frm_receipt_claim_create" action="/declares/claim/save/to">
        <input name="guid" value="<?=create_form()?>" type="hidden">
        <input type="hidden" name="id" value="<?=$data['id']?>">
        <input type="hidden" name="customerid" value="<?=$data['customerid']?>">

        <?php if( ckAuth( false ) ): ?>
            <div class="form-group">
                <label class="col-md-3 control-label"> 客户信息 </label>
                <div class="col-md-9">
                    <?=\App\Libraries\LibComp::get_customer(['class' => 'select','name' => 'customerid'],$data ? $data['customerid'] : '')?>
                </div>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label class="col-md-3 control-label"> 业务单号 </label>
            <div class="col-md-9">
                <?php if ( ckAuth() ): ?>
                    <?=\App\Libraries\LibComp::get_available(['class'=>'select','name'=>'projectid'],['status'=>1,'isentrance'=>0,'customerid'=>session('custId')])?>
                <?php else :?>
                    <select name="projectid" class="select"><option value="">--业务单号--</option></select>
                <?php endif;?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">付款人公司名称<span class="text-danger">*</span> </label>
            <div class="col-lg-9">
                <input id="payerid" name="payerid" type="hidden">
                <input class="form-control" id="pname" type="text" value="<?=$data['payername']?>" name="payername" required="required" placeholder="请输入 付款人公司名称">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">国家及地区<span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <?=\App\Libraries\LibComp::select('COUNTRY',['name'=>'payercountry','required'=>'true','id'=>'payercountry'],$data['payercountry'],false)?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">付款银行<span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <input class="form-control" name="bank" required="required" value="<?=$data['bank']?>"  placeholder="请输入 付款银行">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">银行帐号<span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <input class="form-control" name="bankaccount" required="required" value="<?=$data['bankaccount']?>"  placeholder="请输入 银行帐号">
            </div>
        </div>


        <div class="form-group">
            <label class="col-lg-3 control-label">币种<span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <?=\App\Libraries\LibComp::select('CURRENCY',['name'=>'currency','id'=>'currency','required'=>'true'],$data['currency'],false)?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">计划付款金额<span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <input class="form-control" name="receiptamount" value="<?=$data['receiptamount']?>"  required="required"  onkeypress="return comm.iNum()" placeholder="请输入 计划付款金额">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">计划付款日期<span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <input name="receiptdate" class="form-control" value="<?=$data['receiptdate']?>"  type="text" required="required" autocomplete="off" onclick="WdatePicker({minDate:new Date()})"  placeholder="请输入 计划付款日期">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">备注</label>
            <div class="col-lg-9">
                <input name="note" class="form-control" type="text" value="<?=$data['note']?>"   placeholder="请输入 备注">
            </div>
        </div>
</form>

<script>
    $('#frm_receipt_claim_create select').select2();
    <?php if( ckAuth(false ) ): ?>
    $('#frm_receipt_claim_create select[name=customerid]').on('change',function () {
        var customerid = $(this).val();
        comm.doRequest('/declares/project/available',{customerid:customerid},( resp )=>{
            var opts = '<option value="">--业务单号--</option>';
            $.each(resp.data,function (k,v) {
                opts += `<option value="${v.ID}">${v.BusinessID}</option>`;
            });
            $('#frm_receipt_claim_create select[name=projectid]').html(opts).val('').trigger('change');
        },'json');
    });

    var cb = new Promise((resolve ,reject) => {setTimeout(function(){resolve()},200);});
    cb.then(()=>{$('#frm_receipt_claim_create select[name=customerid]').val('<?=$data['customerid']?>').trigger('change')}).then(()=>{
        $('#frm_receipt_claim_create select[name=projectid]').val('<?=$data['projectid']?>').trigger('change')
    });
    <?php endif; ?>

    var timeout = 0;
    $('#pname').autocomplete({
        minChars: 2,
        lookup: function (query, done) {
            clearTimeout(timeout);
            var keys = $('#pname').val();
            timeout = setTimeout(function (){
                var customerid = $('#frm_receipt_claim_create input[name=customerid]').val()
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
            $('#frm_receipt_claim_create input[name=payername]').val(suggestion.data.name);
            $('#frm_receipt_claim_create input[name=payerid]').val(suggestion.data.id);
            $('#frm_receipt_claim_create input[name=bank]').val(suggestion.data.bankname);
            $('#frm_receipt_claim_create input[name=bankaccount]').val(suggestion.data.account);
        },
    });
</script>
