<?php
    $model = $data['detail'];
?>
<form id="frm_company" class="form-horizontal" action="/setup/company/save">
    <input type="hidden" name="id" value="<?=$model?$model["id"]:''?>">
    <input type="hidden" name="guid" value="<?=create_form()?>">
    <div class="panel-tabs">
        <ul class="nav nav-tabs nav-tabs-bottom">
            <li class="active"><a href="#panel-tab1" style="padding: 5px 10px" data-toggle="tab" aria-expanded="true"><i class="icon-user-lock position-left"></i> 企业信息 </a></li>
            <li class=""><a href="#panel-tab2"  style="padding: 5px 10px" data-toggle="tab" aria-expanded="false"><i class=" icon-credit-card position-left"></i> 银行信息 </a></li>
            <li class=""><a href="#panel-tab3"  style="padding: 5px 10px" data-toggle="tab" aria-expanded="true"><i class="icon-equalizer3 position-left"></i> 公章/执照 </a></li>
        </ul>
    </div>
    <div class="panel-tab-content tab-content">
        <div class="tab-pane active" id="panel-tab1">
            <div class="form-group">
                <label class="col-md-2 control-label">企业代码 <label class="text-danger">*</label></label>
                <div class="col-md-10">
                    <input type="text" name="code" class="form-control" value="<?=($model?$model["code"]:'')?>" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"> 公司简称 <label class="text-danger">*</label> </label>
                <div class="col-md-10">
                    <input type="text"  class="form-control" value="<?=($model?($model["shortname"]??$model["name"]):'')?>" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"> 企业名称 <label class="text-danger">*</label></label>
                <div class="col-md-10">
                    <input type="text" name="name" class="form-control" placeholder="请输入企业名称"   value="<?=($model?$model["name"]:'')?>" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">英文名称 </label>
                <div class="col-md-10">
                    <input type="text" name="ename" class="form-control" placeholder="请输入英文名称" value="<?=($model?$model["ename"]:'')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">公司地址 </label>
                <div class="col-md-10">
                    <input type="text" name="address" class="form-control" placeholder="请输入公司地址" value="<?=($model?$model["address"]:'')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">英文地址 </label>
                <div class="col-md-10">
                    <input type="text" name="enaddr" class="form-control" placeholder="请输入英文地址" value="<?=($model?$model["enaddr"]:'')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">法人代表:</label>
                <div class="col-md-10">
                    <input type="text" name="legal" class="form-control" placeholder="法人代表" value="<?=($model?$model["legal"]:'')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">企业税号:</label>
                <div class="col-md-10">
                    <input type="text" name="creditno" class="form-control" placeholder="企业税号" value="<?=($model?$model["creditno"]:'')?>">
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-2 control-label">经营范围:</label>
                <div class="col-md-10">
                    <input name="scope" class="form-control" value="<?=($model?$model["scope"]:'')?>">
                </div>
            </div>
        </div>

        <div class="tab-pane" id="panel-tab2">

            <div class="form-group">
                <label class="col-md-2 control-label"> 开户名称 </label>
                <div class="col-md-10">
                    <input type="text" name="acname" class="form-control" value="<?=($model?$model["acname"]:'')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"> 开户银行 </label>
                <div class="col-md-10">
                    <input type="text" name="bkname" class="form-control" value="<?=($model?$model["bkname"]:'')?>" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"> 银行帐户 </label>
                <div class="col-md-10">
                    <input type="text" name="account" class="form-control"  value="<?=($model?$model["account"]:'')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"> 联系方式 </label>
                <div class="col-md-10">
                    <input type="text" name="contact" class="form-control"  value="<?=($model?$model["contact"]:'')?>">
                </div>
            </div>
        </div>

        <div class="tab-pane" id="panel-tab3">
            <div class="form-group">
                <label class="col-md-2 control-label">公司LOGO:</label>
                <div class="col-md-10">
                    <code>(PNG背景透明,规格: 宽度120px * 高度30px,大小不超过100K)</code>
                    <?=\App\Libraries\LibComp::upload_compents(['name'=>'logo','nums'=>1,'fit'=>'"png","gif","jpg","jpeg"','required' => 'required'],$model?explode(',', $model['logo']):[])?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">圆形章:</label>
                <div class="col-md-10">
                    <code>(PNG格式,背景为透明,宽:150px * 高:150px,大小不超过100K)</code>
                    <?=\App\Libraries\LibComp::upload_compents(['name'=>'stamp_zh_en','nums'=>1,'fit'=>'"png","gif","jpg","jpeg"','required' => 'required'],$model?explode(',', $model['stamp_zh_en']):[])?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">报关专用章:</label>
                <div class="col-md-10">
                    <code>(PNG格式,背景为透明 宽:180px * 高:130px,大小不超过100K)</code>
                    <?=\App\Libraries\LibComp::upload_compents(['name'=>'stamp_bgz','nums'=>1,'fit'=>'"png","gif","jpg","jpeg"','required' => 'required'],$model?explode(',', $model['stamp_bgz']):[])?>
                </div>
            </div>
        </div>
    </div>
</form>

<aside class="mask works-mask">
    <div class="mask-content">
        <p class="del-p">确定移除文件？</p>
        <p class="check-p"><span class="del-com wsdel-ok" style="cursor: pointer">确定</span><span class="wsdel-no" style="cursor: pointer">取消</span></p>
    </div>
</aside>
