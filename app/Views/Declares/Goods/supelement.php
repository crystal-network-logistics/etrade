<?php
    $model = $data['detail'];
    $is_has_tag = $model['tag'];
?>
<table class="table table-bordered" id="tb_<?=$model['tag']?>">
    <tr>
        <td width="20%">HSCode</td>
        <td width="30%"><code> <?=$model['hscode']?> </code></td>
        <td width="20%">退税率</td>
        <td width="30%"><code><?=($model['taxreturnrate']*100)?>%</code></td>
    </tr>

    <tr>
        <td>监管条件</td>
        <td><?=$model['customsupervision']?></td>
        <td></td>
        <td></td>
    </tr>

    <?php if( $model['supelement'] ) :?>
        <?php $elemnts = json_decode( $model['supelement'] );
        foreach ( $elemnts as $key=>$item ) :?>
            <?php foreach ( $item as $k=>$v) :?>
                <tr class="element_<?=$model['tag']?>">
                    <td colspan="2" style="50%">
                        <?=$k?>
                    </td>
                    <td colspan="2"  style="50%">
                        <?php if ($is_has_tag) :?>
                        <input type="hidden" name="element_label" value="<?=trim($k)?>">
                        <input name="element_value" value="<?=$v?>" class="form-control" placeholder="请输入 <?=$k?>" onchange="update_elements(<?=$model['tag']?>)">
                        <?php else:?>
                        <?=$v?:'--'?>
                        <?php endif;?>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php endforeach;?>
    <?php endif;?>
</table>
<?php if ($is_has_tag) :?>
<code>注: 修改完之后,关闭本弹窗口即可. </code>
<?php endif;?>