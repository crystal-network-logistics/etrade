<?php
    $model = $data['detail'];
?>
<form id="frm_customer" class="form-horizontal" action="/setup/customer/save">
    <input type="hidden" name="id" value="<?=$model?$model["id"]:''?>">
    <input type="hidden" name="guid" value="<?=create_form()?>">
    <?php if ( session('power') == 'all' ) :?>
    <div class="form-group">
        <label class="col-lg-2 control-label">所属公司 <span class="text-danger">*</span> </label>
        <div class="col-lg-10">
            <?=\App\Libraries\LibComp::get_company(['class'=>'control-primary','required'=>'required','name'=>'companyid'],$model?$model["companyid"]:'')?>
        </div>
    </div>

    <?php else :?>
        <input type="hidden" name="companyid" value="<?=session('company')?>">
    <?php endif;?>

    <div class="form-group">
        <label class="col-lg-2 control-label">客户编号<span class="text-danger">*</span> </label>
        <div class="col-lg-10">
            <input type="text"
                   name="customerno"

                   <?php if( !$model ) :?>
                   remote="/setup/customer/check/customerno"
                   <?php endif;?>

                   value="<?=$model?$model["customerno"]:''?>"
                   class="form-control" required="required"
                   placeholder="请输入客户编号,例: 2017SZ"
            >
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">客户名称<span class="text-danger">*</span> </label>
        <div class="col-lg-10">
            <input type="text" name="customername" value="<?=$model?$model["customername"]:''?>" class="form-control" required="required"  placeholder="请输入客户名称"
                <?php if( !$model ) :?>
                    remote="/setup/customer/check/customername"
                <?php endif;?>
            >
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">代理费用<span class="text-danger">*</span> </label>
        <div class="col-lg-5">
            <input type="text" name="commissionfee" data-popup="tooltip" data-placement="top" title="代理费率" value="<?=$model?$model["commissionfee"]:''?>"  class="form-control" max="1" min="0" placeholder="代理费用,例:0.01" required="required" onkeypress="return comm.iNum()">
        </div>
        <div class="col-lg-5">
            <input type="text" name="commissionfeemin"  data-popup="tooltip" data-placement="top" title="代理费最低收费" value="<?=$model?$model["commissionfeemin"]:''?>"  class="form-control" placeholder="最低收费" required="required" onkeypress="return comm.iNum()">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">退税融资费<span class="text-danger">*</span> </label>
        <div class="col-lg-5">
            <input type="text" name="taxrefundfee" data-popup="tooltip" data-placement="top" title="退税融资费率" value="<?=$model?$model["taxrefundfee"]:''?>"  class="form-control" max="1" min="0" placeholder="退税融资费,例:0.01" required="required" onkeypress="return comm.iNum()">
        </div>
        <div class="col-lg-5">
            <input type="text" name="taxrefundfeemin"  data-popup="tooltip" data-placement="top" title="退税融资最低费用" value="<?=$model?$model["taxrefundfeemin"]:''?>"  class="form-control" placeholder="最低收费" required="required" onkeypress="return comm.iNum()">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">绑定操作员 <span class="text-danger">*</span> </label>
        <div class="col-md-10">
            <select name="operator[]" id="operator" class="select select-xs" multiple="multiple"></select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">手机号 <span class="text-danger">*</span> </label>
        <div class="col-md-10">
            <input type="text" name="phone" value="<?=$model?$model["phone"]:''?>"  class="form-control" digits="digits" placeholder="请输入 手机号 " required="required"
                <?php if( !$model ) :?>
                    remote="/setup/customer/check/phone"
                <?php endif;?>
            >
            <code>注: 该手机号用于支付短信验证</code>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">电话</label>
        <div class="col-md-10">
            <input type="text" name="tel"
                <?php if( !$model ) :?>
                    remote="/setup/customer/check/tel"
                <?php endif;?>
                value="<?=$model?$model["tel"]:''?>"  class="form-control" placeholder="例: 021-88888888">
        </div>
    </div>



    <div class="form-group">
        <label class="col-md-2 control-label">QQ:</label>
        <div class="col-md-10">
            <input type="text" name="qq" value="<?=$model?$model["qq"]:''?>"  class="form-control" placeholder="请输入客户QQ号" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">主营产品:</label>
        <div class="col-md-10">
            <input name="mainproducts" class="form-control" placeholder="请输入客户经营产品" value="<?=$model?$model["mainproducts"]:''?>">
        </div>
    </div>



</form>

<script>
    $('#frm_customer select').select2({minimumResultsForSearch:-1})
    var rules = {
            messages : {
                customerno : {
                    remote: '客户编码已存在'
                },
                customername : {
                    remote: '客户名称已存在'
                },
                phone : {
                    remote: '手机号已存在'
                }
            }
        }
    $(function () {
        console.log(JSON.stringify(rules))
        $('#frm_customer').attr('rules',JSON.stringify(rules));

        <?php if ( $model ) :?>
        setTimeout(function (){load_owner('<?=$model['companyid']?>');},500);
        <?php else :?>
        load_owner('-1');
        <?php endif;?>

        <?php if ( session('power') == 'all' ) :?>
        $('select[name=companyid]').on('change',function () {
            load_owner($(this).val())
        })
        <?php endif;?>
    })

    function load_owner( companyId ){
        comm.GET({
            url : `/account/staff/get_owner?companyId=${companyId}`,
            success : function ( resp ) {
                var option = '';
                $.each(resp.data,function ( k,v ) {
                    option += `<option value="${v.id}">${ v.username }</option>`
                });
                $('#operator').html(option);
                comm.formload( $('#frm_customer') , { operator : <?=json_encode($model['operator'])?>})
            }
        })
    }
</script>
