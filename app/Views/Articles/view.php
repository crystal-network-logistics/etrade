<?php
    $model =(object) $data['detail'];
?>
<style>
    hr{margin-top: 5px; margin-bottom: 5px;}
</style>
<span class="text-muted text-size-small">
    <?=$model->createtime?>
</span>

<span class="pull-right">
<?php if($model->attachment) { foreach(explode(',',$model->attachment) as $key=>$val){?>
        <small class="text-info" style="font-size: 14px;"><a href="<?=$val?>" target="_blank"><i class="icon-attachment"></i> 附件(<?=($key+1)?>)</a></small> &nbsp;&nbsp;
<?php }
}?>
</span>

<?php if($model->summary) {?>
    <h6 class="panel-title"><?=$model->summary?></h6>
<hr>
<?php }?>
<p>
    <?=$model->desc?>
</p>

