<?php
    $model = isset( $data['detail'] ) ? $data['detail'] : false;
    $isvalid = $model?(($model['status'] == 2 || $model['status'] == 4)?true:false):false;

    $is_has_approve = ck_action('setup/products/approve');
    $is_has_confirm = ck_action('setup/products/confirm');
    $is_has_tosuplemt = ck_action('setup/products/tosuplemt');
    ?>
<link href="/resource/assets/css/filesPlugin.css?_=1" type="text/css" rel="stylesheet"/>
<script src="/resource/app/filesPlugin.js?_=1"></script>

<aside class="mask works-mask">
    <div class="mask-content">
        <p class="del-p">确定移除文件？</p>
        <p class="check-p"><span class="del-com wsdel-ok" style="cursor: pointer">确定</span><span class="wsdel-no" style="cursor: pointer">取消</span></p>
    </div>
</aside>

<div class="content">
    <form id="frm_products" class="form-horizontal" action="/setup/products/submits">
        <input type="hidden" name="id" value="<?=$model?$model['id']:''?>">
        <input type="hidden" name="status" value="<?=$model?$model['status']:'0'?>" id="status">
        <input type="hidden" name="isentrance" value="<?=$model?$model['isentrance']:'0'?>">
        <input type="hidden" name="guid" value="<?=create_form()?>">

        <div class="panel panel-flat">
            <div class="panel-body" style="padding: 20px">
                <?php if($model){?>
                    <?php if(strlen($model["reason"])>0 && ($model["status"] == 2 || $model["status"] == 4)) {?>
                        <div class="alert alert-danger alert-styled-left alert-bordered">
                            <span class="text-semibold"> 备注/原因 : </span><?php echo strlen($model["reason"])>0?$model["reason"]:''?>
                        </div>
                    <?php }?>
                <?php }?>

                <?php if( ckAuth(false) ): ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label">客户信息 <span style="color: red;">*</span> </label>
                        <div class="col-md-10">
                            <?=\App\Libraries\LibComp::get_customer(['class' => 'select','name' => 'customerid'],$model ? $model['customerid'] : '')?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label class="col-md-2 control-label">中文品名<span style="color: red;">*</span></label>
                    <div class="col-md-10">
                        <input type="text" name="name" value="<?=$model?$model['name']:''?>" class="form-control" required="required" placeholder="请输入 中文品名">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">英文品名<span style="color: red;">*</span></label>
                    <div class="col-md-10">
                        <input type="text" name="englishname" value="<?=$model?$model['englishname']:''?>"  class="form-control" placeholder="请输入 英文品名" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">用途<span style="color: red;">*</span></label>
                    <div class="col-md-10">
                        <input type="text" name="usage" value="<?=$model?$model['usage']:''?>"  class="form-control" placeholder="请输入 用途" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">品牌
                        <?php if($isvalid) {?>
                            <span style="color: red;">*</span>
                        <?php }?>
                    </label>
                    <div class="col-md-10">
                        <input type="text" name="brand" value="<?=$model?$model['brand']:''?>" class="form-control" placeholder="请输入 品牌" <?php echo $isvalid?('required="required"'):''?>>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">型号
                        <?php if($isvalid) {?>
                            <span style="color: red;">*</span>
                        <?php }?>
                    </label>
                    <div class="col-md-10">
                        <input type="text" name="model" value="<?=$model?$model['model']:''?>"  class="form-control" placeholder="请输入 型号" <?php echo $isvalid?('required="required"'):''?>>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">HSCode
                        <?php if($isvalid) {?>
                            <span style="color: red;">*</span>
                        <?php }?>:</label>
                    <div class="col-md-10">
                        <input type="text" name="hscode" value="<?=$model?$model['hscode']:''?>"  class="form-control" placeholder="请输入 HSCode" id="hscodes"  <?php echo $isvalid?('required="required"'):''?>>
                        <code>
                            如果您不清楚产品对应的 HSCode, 请先<a href="/setup/hscode/choice" class="hModal" data-size="lg" lang="选择Hscode" data-text=" 选择 ">检索HSCode</a>
                        </code>
                    </div>
                </div>


                <div id="supers">
                    <?php if ( $model && $model['supelement'] ) :?>
                        <?=view('/Setup/Products/elements',['data'=>$model['supelement'],'other' =>$model])?>
                    <?php endif;?>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">其他</label>
                    <div class="col-lg-10">
                        <input type="text" name="misc" class="form-control" value="<?=$model?$model['misc']:''?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">商品文件上传</label>
                    <div class="col-lg-10">
                        <code>上传历史报关单、产品图片、铭牌、说明书等(支持 jpg、png 格式的图片和 pdf 文件，最多上传 5 个文件，大小不超过 10M) </code>
                        <?=\App\Libraries\LibComp::upload_compents(['name'=>'files','nums'=>5,'fit'=>'"png","gif","jpg","jpeg","pdf"','required' => 'required'],$model ? (explode(',',$model['files'])):[])?>
                    </div>
                </div>

                <div class="text-left">

                    <button class="hidden" type="submit"></button>
                    <?php if ((!$model || $model['status'] == 0 || $model['status'] == 1) && $model['status'] != 3) :?>
                    <button type="button" class="btn" onclick="bSubmit(0,'')"> 保存草稿 </button>
                    <?php endif;?>

                    <?php if( ( ckAuth() || (session('custId') == $model["customerid"] || hasRole('admin') || hasCustom( $model["customerid"] ) ) && ( $model["status"] == 0 || $model["status"] == 4 )) || !$model ) { ?>
                        <button type="button" class="btn btn-primary" onclick="bSubmit(1,'submits')">提交</button>
                    <?php } ?>

                    <?php if(($model['status'] == 1) && $is_has_approve && ckAuth(false)) {?>
                        <button type="button" onclick="bSubmit(3,'approve')" class="btn btn-primary">审核通过</button>
                    <?php }?>

                    <?php if(($model['status'] == 1) && $is_has_confirm && ckAuth(false)) {?>
                        <a href="/setup/products/confirm/v?id=<?=$model['id']?>"  onclick="return comm.doPrompt(this.href,{title : '请填写备注(原因)'},( resp )=>{ if( resp.code ) setTimeout(()=> { window.history.back() },3000) })"  class="btn btn-primary">请客户确认</a>
                    <?php }?>

                    <?php if(($model['status'] == 2) && $is_has_confirm && ckAuth()) {?>
                        <a href="/setup/products/confirm?id=<?=$model['id']?>"  onclick="return comm.confirmCTL(this.href,'确定该操作?',( resp )=>{ if( resp.code ) setTimeout(()=> { window.history.back() },3000) })"  class="btn btn-success"> 确认 </a>
                    <?php }?>

                    <?php if(($model['status'] == 1) && $is_has_tosuplemt && ckAuth(false)) {?>
                        <a href="/setup/products/tosuplemt?id=<?=$model['id']?>" onclick="return comm.doPrompt(this.href,{ title : '请填写备注(原因)' },(resp)=>{ if( resp.code ) setTimeout(()=> { window.history.back() },3000) } )" class="btn btn-primary" >请客户补充</a>
                    <?php }?>

                    <a class="btn btn-pink" href="javascript:history.back()">返回 <i class="icon-circle-left2"></i></a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $('#frm_products').toSubmit({
        success : function (resp) {
            comm.Alert('保存成功');
            setTimeout(()=>{window.history.back()},3000)
        },
        error : function (resp) {
            comm.Alert(resp.msg,false);
        }
    });

    // 提交
    function bSubmit( status , method ){
        var frm = $('#frm_products');
        if (method) frm.attr('action', `/setup/products/${method}`);
        $('#frm_products #status').val(status);
        frm.find('button[type=submit]').click();
    }

    $(function () {
        $('#hscodes').on('blur',function () {
            var code = $(this).val();
            get_superelements(code);
        });
        <?php if( $model && ( $model['status'] == 3 || ($model['status'] == 2 && ckAuth()))) :?>
        $('form input,select').attr('disabled','disabled');
        <?php endif;?>
    })

    function  get_hscode_choice(){
        var data = comm.doChoice(data_choice_tb);
        $('#hscodes').val(data.code);
        $('input[name=officialunit]').val(data.officialunit1)
        $.each(data,function (k,v) {
            if ( k != 'id') {
                $(`#lb${k}`).text(v);
                $(`input[name=${k}]`).val(v);
            }
        });
        if ( data ) get_superelements(data.code)
    }

    function get_superelements( code ){
        if ( code && code.length >= 8)
            return comm.doRequest('/setup/hscode/superelements',{code:code},(resp)=>{ $('#supers').html( resp ) });
        $('#supers').html('');
    }
</script>
