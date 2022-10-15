<?php
$projectId = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
$customerId = (ckAuth()?session('custId'):(isset($_REQUEST['customerid'])?$_REQUEST['customerid']:0));
$isentrance = isset( $data['isentrance'] ) ? $data['isentrance'] : 0;
?>
<form class="form-horizontal" id="frm_receipt_create" action="/declares/receipt/create">
    <input name="guid" value="<?=create_form()?>" type="hidden">
    <input type="hidden" name="id" value="0">
    <input type="hidden" name="projectid" value="<?=$projectId?>">
    <input type="hidden" name="customerid" value="<?=$customerId?>">
    <input type="hidden" name="isentrance" value="<?=$isentrance??0?>">

    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-3 control-label">收款日期<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input name="receiptdate" class="form-control" type="text" required="required" onclick="WdatePicker({})" autocomplete="off" placeholder="请选择 收款日期">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">付款人<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input id="payerid" name="payerid" type="hidden">
                        <input class="form-control" id="pname" name="payername" type="text" required="required" placeholder="请输入 付款人名称">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">国家及地区<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <?=\App\Libraries\LibComp::select('COUNTRY',['name'=>'payercountry','required'=>'true','id'=>'payercountry'],'',false)?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">币种<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <?=\App\Libraries\LibComp::select('CURRENCY',['name'=>'currency','id'=>'currency','required'=>'true'],'CNY',false)?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">帐户类型<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <?=\App\Libraries\LibComp::select('ACCOUNT',['name'=>'accounttype','id'=>'accounttype','required'=>'true'],'',false)?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-9">
                        <label> <input name="tag" type="checkbox" checked> 保存付款人信息 </label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-3 control-label">用途<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <?=\App\Libraries\LibComp::select('USAGE',['name'=>'usage','id'=>'Rusage','required'=>'true'],'',false)?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">金额<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input class="form-control" name="amount" required="true" placeholder="请输入 付款金额"  onkeypress="return comm.iNum()" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">汇率<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input class="form-control" name="exchangerate" placeholder="请输入 汇率"  required="true" onkeypress="return comm.iNum()">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">折RMB</label>
                    <div class="col-lg-9" style="margin-top: 8px;">
                        <span id="lbTotal" class="text-danger"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">备注</label>
                    <div class="col-lg-9">
                        <input class="form-control" name="note" placeholder="请输入付款 备注">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn_receipt_submit hide" type="submit"> </button>
</form>
<script>
    var fname = "#frm_receipt_create";
    $(fname).toSubmit({success : function (resp){
            comm.Alert(resp.msg,true);
            comm.closeModal();
            if ( window.load_receipts_data ) load_receipts_data();
        },error:function (resp){
            comm.Alert(resp.msg,false)
        }});
    $(`${fname} input[name=amount],${fname} input[name=exchangerate]`).on('change',function ( ) {
        var amount = $(`${fname} input[name=amount]`).val(), exchange = $(`${fname} input[name=exchangerate]`).val();
        $('#lbTotal').text('￥ '+comm.fMoney(parseFloat(amount) * parseFloat(exchange)));
    })
</script>

