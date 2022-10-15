<?php
$model = isset( $data['detail'] ) ? $data['detail'] : false;
?>
<aside class="mask works-mask">
    <div class="mask-content">
        <p class="del-p">确定移除文件？</p>
        <p class="check-p"><span class="del-com wsdel-ok" style="cursor: pointer">确定</span><span class="wsdel-no" style="cursor: pointer">取消</span></p>
    </div>
</aside>
<form class="form-horizontal frm_invoicer" action="/setup/invoicer/save">
    <input type="hidden" name="id" value="<?=$model?($model['id']?:''):''?>">
    <input type="hidden" name="status" value="<?=$model?$model['status']:'1'?>">

    <?php if($model){?>
        <?php if(strlen($model["rejectreason"])>0 && ($model["status"] == 2 || $model["status"] == 4)) {?>
            <div class="alert alert-danger alert-styled-left alert-bordered">
                <span class="text-semibold"> 拒绝原因 : </span><?php echo strlen($model["rejectreason"])>0?$model["rejectreason"]:''?>
            </div>
        <?php }?>
    <?php }?>

    <?php if( ckAuth(false) ): ?>
        <div class="form-group">
            <label class="col-md-3 control-label">客户信息 <span style="color: red;">*</span> </label>
            <div class="col-md-9">
                <?=\App\Libraries\LibComp::get_customer(['class' => 'select','name' => 'customerid'],$model ? $model['customerid'] : '')?>
            </div>
        </div>
    <?php endif; ?>


    <div class="form-group">
        <label class="col-md-3 control-label">开票人公司名称 <span style="color: red;">*</span> </label>
        <div class="col-md-9">
            <input type="text" name="name" value="<?=$model?$model['name']:''?>" class="form-control" required="required" placeholder="请输入 开票人公司名称">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">纳税人识别号/营业执照注册号 <span style="color: red;">*</span> </label>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6"><input type="text" name="taxpayerid" value="<?=$model?$model['taxpayerid']:''?>" class="form-control" placeholder="请输入 纳税人识别号" required="required"></div>
                <div class="col-md-6"><input type="text" name="licenseid" value="<?=$model?$model['licenseid']:''?>" class="form-control" placeholder="请输入 营业执照注册号" required="required"></div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">开票人地址 <span style="color: red;">*</span></label>
        <div class="col-md-9">
            <input type="text" name="address" value="<?=$model?$model['address']:''?>" class="form-control" placeholder="请输入 开票人地址" required="required">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">纳税人认定时间/开票人增值税率 <span style="color: red;">*</span> </label>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6"><input type="text" name="taxpayerconfirmdate" value="<?=$model?$model['taxpayerconfirmdate']:''?>" class="form-control" autocomplete="off" placeholder="请输入 一般纳税人认定时间" required="required" onclick="WdatePicker({maxDate:'<?php echo date('Y-m-d')?>'})"></div>
                <div class="col-md-6">
                    <select class="select" name="viirate" id="viirate" required="required">
                        <option value="" > 开票人增值税率 </option>
                        <?php for ( $i = 0 ; $i < 51; $i++ ) :?>
                            <option value="<?=($i/100)?>" <?=($i==13)?'selected':''?> ><?=($i)?> %</option>
                        <?php endfor;?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">开户行/账号(<span style="color: red;">*</span>):</label>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6"><input type="text" name="bank" value="<?=$model?$model['bank']:''?>" class="form-control" placeholder="请输入 开户银行" required="required"></div>
                <div class="col-md-6"><input type="text" name="account" value="<?=$model?$model['account']:''?>" class="form-control" placeholder="请输入 银行账号" required="required"></div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">货源地 <span style="color: red;">*</span> </label>
        <div class="col-md-9">
            <input type="text" name="domesticsource" value="<?=$model?$model['domesticsource']:''?>" class="form-control" placeholder="请输入 货源地" required="required">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">开票人产品 <span style="color: red;">*</span> </label>
        <div class="col-md-9">
            <select name="products[]" class="select select-xs" id="products"  placeholder="请选择 开票人产品" required="required" multiple="multiple"></select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">附件 <span style="color: red;">*</span> </label>
        <div class="col-md-9">
            <small class="text-muted">请上传税务登记证副本、营业执照、一般纳税人认定表、历史发票等.支持 jpg、png格式的图片和pdf文件，最多5个附件</small>
            <?=\App\Libraries\LibComp::upload_compents(['name'=>'files','nums'=>5,'fit'=>'"png","gif","jpg","jpeg","pdf"','required' => 'required'],$model ? (explode(',',$model['files'])):[])?>
        </div>
    </div>

</form>
<script>
    $('.frm_invoicer select[name=customerid],#products').select2();
    $('.frm_invoicer select[name=viirate]').select2({minimumResultsForSearch:-1});

    <?php if( ckAuth(false) ) : ?>
        // 选择客户商品
        $('.frm_invoicer select[name=customerid]').on('change',function ( ) {
            var value = $(this).val();
            if ( value ) get_invoicer_products( value );
        });
    <?php else :?>
        get_invoicer_products( '<?=session('custId')?>' );
    <?php endif;?>

    <?php if( $model ) :?>
        get_invoicer_products('<?=$model['customerid']?>');
    <?php endif;?>

    // 加载产品
    function get_invoicer_products( custId , value ){
        comm.doRequest('/setup/products/get_data_by_invoicer',{ customerid : custId , products : '<?=$model['products']?>' },( resp )=>{
            let options = '';
            $.each( resp.data, function ( k , v ) {
                options += `<option value="${v.id}"> ${ v.name + ' ( HS :' + v.hscode + ' ) ' } </option>`;
            })
            $('#products').html( options );

            <?php if( $model ) :?>
                setTimeout(()=>{comm.formload( $('.frm_invoicer') , { products : <?=json_encode( $model['products'] ? (explode(',', $model['products'])):[] )?>,viirate:'<?=$model['viirate']?>'});},200)
            <?php endif;?>
        },'json');
    }

    // 保存草稿
    function draft(url){
        $('.frm_invoicer input[name=status]').val(0);
        var data = $('.frm_invoicer').serialize();
        comm.doRequest( url,data,( resp )=>{
            if (Object.prototype.toString.call(resp) == '[object String]' ) {
                resp = JSON.parse( resp );
            }
            comm.Alert( resp.msg , resp.code );
            comm.closeModal();
            load_data();
        } ,'json');
        return false;
    }
</script>

