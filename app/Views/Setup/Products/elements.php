<div class="form-group">
    <label class="col-md-2">退税率</label>
    <div class="col-md-10">
        <label id="lbtaxreturnrate">
            <?php if($other):?>
                <?=($other['taxreturnrate']*100).' % '?>
            <?php endif;?>
        </label>
        <input name="taxreturnrate" type="hidden" value="<?=($other['taxreturnrate']?:0.13)?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2">海关监管条件</label>
    <div class="col-md-10">
        <label id="lbcustomsupervision">
            <?=($other?$other['customsupervision']:'')?>
        </label>
        <input name="customsupervision" type="hidden" value="<?=($other['customsupervision']??'')?>">
    </div>
</div>

<input name="officialunit" type="hidden" value="<?=($other['officialunit']?:'')?>">


<?php foreach ($data as $item) {
    foreach ( $item as $k => $v ) {
            if(trim($k) && mb_strpos($k,"品名")===false && mb_strpos($k,'型号')===false && mb_strpos($k,'品牌')===false && mb_strpos($k,'享惠')===false && mb_strpos($k,'用途')===false && mb_strpos(trim( $k ),'其他')===false){
                $lbt = '<span style="color: red;">*</span>'; $rq = 'required="required"'; $isRq = true;
                if($k == 'GTIN' || $k == 'CAS'){
                    $lbt = ''; $isRq = false; $rq = '';
                }
                if(mb_strpos($k,"品牌")===false){ ?>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?php echo $k . ($isRq ? $lbt : $lbt) ;?></label>
                        <div class="col-lg-10">
                            <input type="hidden" name="supelementlabel[]" class="form-control" value="<?=$k?>">
                            <input type="text" name="supelement[]" class="form-control" value="<?=$v?>" placeholder="请输入 <?=$k?>">
                        </div>
                    </div>
                    <?php } }
        }?>
<?php } ?>

