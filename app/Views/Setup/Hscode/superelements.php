<?php
$model = $data['detail'];
?>
<div class="form-group">
    <label class="col-md-2">退税率</label>
    <div class="col-md-10">
        <label id="lbtaxreturnrate">
            <?php if($model):?>
                <?=($model['taxreturnrate']*100).' % '?>
            <?php endif;?>
        </label>
        <input name="taxreturnrate" type="hidden" value="<?=($model['taxreturnrate']?:0.13)?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2">海关监管条件</label>
    <div class="col-md-10">
        <label id="lbcustomsupervision">
            <?=($model?$model['customsupervision']:'')?>
        </label>
        <input name="customsupervision" type="hidden" value="<?=($model['customsupervision']?:'')?>">
    </div>
</div>

<input name="officialunit" type="hidden" value="<?=($model['officialunit1']?:'')?>">

<?php
if(strlen($model['declarationelements'])) {
    $elements = explode(';',$model['declarationelements']);
    foreach($elements as $key=>$item){
        $item = trim($item);
        if(trim($item) && mb_strpos($item,"品名")===false && mb_strpos($item,'型号')===false && mb_strpos($item,'品牌')===false && mb_strpos($item,'享惠')===false && mb_strpos($item,'用途')===false && mb_strpos(trim( $item ),'其他')===false){
            $lbt = '<span style="color: red;">*</span>'; $rq = 'required="required"'; $isRq = true;
            if($item == 'GTIN' || $item == 'CAS'){
                $lbt = ''; $isRq = false; $rq = '';
            }
            if(mb_strpos($item,"品牌")===false){ ?>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $item . ($isRq ? $lbt : $lbt) ;?></label>
                    <div class="col-lg-10">
                        <input type="hidden" name="supelementlabel[]" class="form-control" value="<?=$item?>">
                        <input type="text" name="supelement[]" class="form-control" placeholder="请输入 <?=$item?>">
                    </div>
                </div>
                <?php $i++; }
        }
    }
    ?>
<?php }?>
