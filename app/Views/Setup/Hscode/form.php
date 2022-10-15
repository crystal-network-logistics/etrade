<?php
$data = $data['detail']??false;
?>
<form class="form-horizontal frm_hscode" action="/setup/hscode/save">
    <input type="hidden" name="id" value="<?=$data?$data['id']:'0'?>">
    <div class="form-group">
        <label class="col-lg-2 control-label">HS编码<span style="color: red;">*</span></label>
        <div class="col-lg-10">
            <input type="text" name="code" class="form-control" required="required" placeholder="请输入 HS编码" value="<?=$data?$data['code']:''?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">产品名称<span style="color: red;">*</span></label>
        <div class="col-lg-10">
            <input type="text" name="productname"  value="<?=$data?$data['productname']:''?>" class="form-control" placeholder="" required="required">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">单位1<span style="color: red;">*</span></label>
        <div class="col-lg-10">
            <?=\App\Libraries\LibComp::select('UNIT',['name'=>'officialunit1','class'=>'select','id'=>'officialunit1'],$data?$data['officialunit1']:'')?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">单位2<span style="color: red;">*</span></label>
        <div class="col-lg-10">
            <?=\App\Libraries\LibComp::select('UNIT',['name'=>'officialunit2','class'=>'select','id'=>'officialunit2'],$data?$data['officialunit2']:'')?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">退税率<span style="color: red;">*</span></label>
        <div class="col-lg-10">
            <select class="select" name="taxreturnrate">
                <?php for($i=0;$i<=100;$i++) {
                    $rate = ($i/100); ?>
                    <option value="<?=$rate?>" <?=$rate==$data['taxreturnrate']?'selected':''?> ><?=$i?>%</option>
                <?php }?>
            </select>
        </div>
    </div>


    <div class="form-group">
        <label class="col-lg-2 control-label">监管条件<span style="color: red;">*</span></label>
        <div class="col-lg-10">
            <input type="text" name="customsupervision" value="<?=$data?$data['customsupervision']:''?>" class="form-control" placeholder="请输入 监管条件" required="required">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">要素<span style="color: red;">*</span></label>
        <div class="col-lg-10">
            <input type="text" name="declarationelements"  value="<?=$data?$data['declarationelements']:''?>" class="form-control" placeholder="请输入 要素" required="required">
            <code>注：要素之间以半角符(;)隔开。</code>
        </div>
    </div>
</form>
<script>
    $('.frm_hscode select').select2({minimumResultsForSearch:-1});
</script>
