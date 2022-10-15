<link href="/resource/assets/css/filesPlugin.css?_=<?php echo time()?>" type="text/css" rel="stylesheet"/>
<script src="/resource/app/filesPlugin.js?_=<?php echo time()?>"></script>

<?php
    $model = isset($data['detail']) ? $data['detail'] : false;
?>
<style>
    .z_photo{padding:5px;border: 0px;}
    .upimg-div .up-section{width: 40px;height: 40px;}
    .img-box{  border: 1px solid gainsboro;  }
    .fl,.z_file{width: 40px;height: 40px;}
    .close-upimg{top: 0px;right: 0px; width: 23px;}
</style>

<div class="content">
    <div class="panel">
        <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-cogs"></i> 参数设置</h6>
            <div class="heading-elements panel-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="active"><a href="#panel-tab4" data-toggle="tab" aria-expanded="true"><i class="icon-equalizer3 position-left"></i> 系统参数</a></li>
                    <li class=""><a href="#panel-tab1" data-toggle="tab" aria-expanded="true"><i class="icon-user-lock position-left"></i> 企业信息</a></li>
                    <li class=""><a href="#panel-tab2" data-toggle="tab" aria-expanded="false"><i class=" icon-credit-card position-left"></i> 银行信息</a></li>
                    <li class=""><a href="#panel-tab5" data-toggle="tab" aria-expanded="false"><i class="  icon-bubbles4 position-left"></i> 通知设置</a></li>
                </ul>
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
        </div>
        <div class="panel-tab-content tab-content">
            <div class="tab-pane has-padding active" id="panel-tab4">
                <form class="form-horizontal frm_one">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="col-md-3 control-label">公司简称:</label>
                                <div class="col-md-9">
                                    <input type="text"  disabled readonly class="form-control" value="<?=($model?$model['shortname']:$model['name'])?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">企业LOGO:</label>
                                <div class="col-md-9">
                                    <code>LOGO(PNG背景透明,规格: 宽度120px * 高度30px,大小不超过100K)</code>
                                    <?=\App\Libraries\LibComp::upload_compents(['name'=>'logo','nums'=>1,'fit'=>'"png","jpg","jpeg"','mini'=>true,'callback'=>'update_logo'],($model && $model['logo'] ? explode(',',$model['logo']) : []))?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3">圆形章</label>
                                <div class="col-md-9">
                                    <code>(最多1张PNG格式,背景为透明,宽:150px * 高:150px,大小不超过100K)</code>
                                    <?=\App\Libraries\LibComp::upload_compents(['name'=>'stamp_zh_en','nums'=>1,'fit'=>'"png","jpg","jpeg"','mini'=>true,'callback'=>'update_stamp_zh_en'],($model && $model['stamp_zh_en'] ? explode(',',$model['stamp_zh_en']) : []))?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3">报关专用章</label>
                                <div class="col-md-9">
                                    <code>(最多1张PNG格式,背景为透明 宽:180px * 高:130px,大小不超过100K)</code>
                                    <?=\App\Libraries\LibComp::upload_compents(['name'=>'stamp_bgz','nums'=>1,'fit'=>'"png","jpg","jpeg"','mini'=>true,'callback'=>'update_stamp_bgz'],($model && $model['stamp_zh_en'] ? explode(',',$model['stamp_bgz']) : []))?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="tab-pane has-padding" id="panel-tab1">
                <form class="form-horizontal frm_two">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">企业代码:</label>
                                <div class="col-md-9">
                                    <input type="text" name="code" class="form-control" value="<?=($model && $model['code']?$model['code']:'')?>" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id" value="0">
                                <label class="col-md-2 control-label">企业名称:</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" value="<?=($model && $model['name']?$model['name']:'--')?>"  <?=($model['name']?'readonly':'')?>>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">英文名称:</label>
                                <div class="col-md-9">
                                    <input type="text" name="ename" class="form-control" value="<?=($model && $model['ename']?$model['ename']:'--')?>" <?=($model['ename']?'readonly':'')?>>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">公司地址:</label>
                                <div class="col-md-9">
                                    <input type="text" name="address" class="form-control" placeholder="公司地址" value="<?=( $model && $model['address'] ? $model['address']:'--')?>" <?=($model['address']?'readonly':'')?>>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">英文地址:</label>
                                <div class="col-md-9">
                                    <input type="text" name="enaddr" class="form-control" placeholder="英文地址" value="<?=($model && $model['enaddr']?$model['enaddr']:'--')?>" <?=($model['enaddr']?'readonly':'')?>>
                                </div>
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary btn_two">保存</i></button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">法人代表:</label>
                                <div class="col-md-9">
                                    <input type="text" name="legal" class="form-control" placeholder="法人代表" value="<?=($model&&$model['legal']?$model['legal']:'--')?>" <?=($model['legal']?'readonly':'')?>>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">企业税号:</label>
                                <div class="col-md-9">
                                    <input type="text" name="creditno" class="form-control" placeholder="企业税号" value="<?=($model&&$model['creditno']?$model['creditno']:'--')?>" <?=($model['creditno']?'readonly':'')?>>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2">营业执照</label>
                                <div class="col-md-9">
                                    <?=\App\Libraries\LibComp::upload_compents(['name'=>'licence_url','nums'=>1,'fit'=>'"png","jpg","jpeg"','mini'=>true,'callback'=>'update_licence_url'],($model && $model['stamp_zh_en'] ? explode(',',$model['licence_url']) : []))?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="tab-pane has-padding" id="panel-tab2">

                <form class="form-horizontal frm_three">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">开户名称:</label>
                                <div class="col-md-9">
                                    <input type="text" name="acname" class="form-control" value="<?=($model&&$model['acname']?$model['acname']:'--')?>"  <?=($model['acname']?'readonly':'')?>>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">开户银行:</label>
                                <div class="col-md-9">
                                    <input type="text" name="bkname" class="form-control" value="<?=($model&&$model['bkname']?$model['bkname']:'--')?>"  <?=($model['bkname']?'readonly':'')?> >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">银行帐户:</label>
                                <div class="col-md-9">
                                    <input type="text" name="account" class="form-control"  value="<?=($model&&$model['account']?$model['account']:'--')?>"  <?=($model['account']?'readonly':'')?> >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">联系方式:</label>
                                <div class="col-md-9">
                                    <input type="text" name="contact" class="form-control"  value="<?=($model&&$model['contact']?$model->contact:'--')?>"  <?=($model['contact']?'readonly':'')?> >
                                </div>
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-success btn_three">保存</i></button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="tab-pane has-padding" id="panel-tab5">
                <?=view('/Notify/role_notice')?>
            </div>
        </div>
    </div>
</div>
<script>
    const host_url = '/setup/company/update/';
    // 更新LOGO
    function update_logo(resp) {
        update_images( 'logo' , resp )
    }

    // 更新stamp_zh_en
    function update_stamp_zh_en(resp) {
        update_images( 'stamp_zh_en' , resp )
    }

    // 更新stamp_bgz
    function update_stamp_bgz(resp) {
        update_images( 'stamp_bgz' , resp )
    }

    // 更新licence_url
    function update_licence_url(resp) {
        update_images( 'licence_url' , resp )
    }

    function update_images( field , resp ){
        comm.doRequest(host_url+field,{value:resp.url},(res)=>{
            comm.Alert(res.msg,res.code);
        },'json');
    }

    // 
    $('.frm_one input[type=text],.frm_tow input[type=text],.frm_three input[type=text]').on('change',function () {
        var $fieldname = $(this).attr('name'), value = $(this).val();
        comm.doRequest(`${host_url+$fieldname}`,{value:value},(resp)=>{comm.Alert(resp.msg,resp.code)},'json')
    });
</script>
