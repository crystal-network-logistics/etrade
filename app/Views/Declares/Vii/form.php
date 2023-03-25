<?php
    $vii_data = isset( $data['detail'] ) ? $data['detail'] : false;
?>
<style>.up-section .close-upimg{width: 20px; top: 0px; right: 0px;}</style>

<form class="form-horizontal" id="frm_vii" action="/declares/vii/save">
    <input type="hidden" name="id" value="<?=$vii_data?$vii_data['id']:'0'?>">
    <input name="guid" value="<?=create_form()?>" type="hidden">
    <input type="hidden" name="projectid" value="<?=$vii_data?$vii_data['projectid']:''?>">
    <input type="hidden" name="isentrance" value="<?=$vii_data['isentrance']?:0?>">
    <input type="hidden" name="customerid" value="<?=$vii_data['customerid']?:0?>">
    <div class="form-group">
        <label class="col-lg-3 control-label">是否已做报关资料:</label>
        <div class="col-lg-9" style="margin-top: 8px;">
            <label><input name="entryform" value="1" type="radio" <?=$vii_data?($vii_data['entryform']==1?'checked':''):'checked'?>> 已做报关材料</label> &nbsp;&nbsp;
            <label><input name="entryform" value="0" type="radio" <?=$vii_data?($vii_data['entryform']==0?'checked':''):''?>> 未做报关材料</label>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">品名<span class="text-danger">*</span>:</label>
        <div class="col-lg-9">
            <select name="productid" required="required">
                <option value="">--请选择商品--</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">开票人:</label>
        <div class="col-lg-9">
            <input name="invoicer" class="form-control" readonly value="<?=$vii_data?$vii_data['invoicer']:''?>">
            <input name="invoicerid" class="form-control" type="hidden" value="<?=$vii_data?$vii_data['invoicerid']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">退税率:</label>
        <div class="col-lg-9">
            <div class="input-group">
                <input name="taxreturnrate" id="vTaxReturnRate" class="form-control" value="<?=$vii_data?$vii_data['taxreturnrate']:''?>" digits="digits" type="text" onkeypress="return comm.iNum();"><span class="input-group-addon">%</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">数量<span class="text-danger">*</span>:</label>
        <div class="col-lg-9">
            <input name="amount" class="form-control" value="<?=$vii_data?$vii_data['amount']:''?>" onkeypress="return comm.iNum()" required="required" type="text">
        </div>
    </div>

    <div class="form-group">

        <label class="col-lg-3 control-label">单位:</label>
        <div class="col-lg-9">
            <input name="unit" class="form-control" required="required" value="<?=$vii_data?$vii_data['unit']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">开票金额<span class="text-danger">*</span>:</label>
        <label class="col-lg-9">
            <div class="input-group">
                <input name="invoiceamount" required="required" class="form-control" onkeypress="return comm.iNum()" value="<?=$vii_data?$vii_data['invoiceamount']:''?>">
                <span class="input-group-addon">RMB</span>
            </div>
        </label>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">上传增票<span class="text-danger">*</span>:</label>
        <label class="col-lg-9">
            <?=\App\Libraries\LibComp::upload_compents(['name'=>'viiimage','mini'=>true,'nums'=>3,'fit'=>'"jpg","jpeg","git","pdf","png","xls","xlsx","doc","docx","txt"'],$vii_data ? (explode(',',$vii_data['viiimage'])):[])?>
        </label>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">备注:</label>
        <label class="col-lg-9">
            <input name="note" class="form-control" type="text" value="<?=$vii_data?$vii_data['note']:''?>">
        </label>
    </div>
</form>
<script>
    $('#frm_vii select').select2();
    $(function(){
        $('#frm_vii input[type=radio]').change(function(){
            var v = $(this).val();
            load_vii_products(v);
        });

        $('#frm_vii select[name=productid]').change(function(){
            var data = $(this).find('option:selected').data('json');
            console.log(data);
            if(data == '' || data === undefined) data = {invoicerid:0,invoicer:'',taxreturnrate:'',unit:''}
            comm.formload($('#frm_vii'),data);
        });

        <?php if ( $vii_data ) :?>
            load_vii_products(<?=$vii_data['entryform']?>);
            setTimeout(()=>{
                    comm.formload($('#frm_vii'),{ productid:'<?=$vii_data['productid']?>',taxreturnrate:'<?=$vii_data['taxreturnrate']*100?>',unit:'<?=$vii_data['unit']?>'});
                },300)
        <?php else :?>
            load_vii_products(1);
        <?php endif;?>

    });
    function load_vii_products( v ){
        var product = $('#frm_vii select[name=productid]');
        comm.doRequest('/declares/goods/load_vii_goods_products',
            {projectid:$('#frm_vii input[name=projectid]').val(),entryform:v,customer:$('#frm_vii input[name=customerid]').val()},
            (resp) =>{
                product.html(resp);
                product.val("").trigger('change');
            }
        )
    }
</script>
