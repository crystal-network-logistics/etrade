<?php
    $model = $data['detail'];
?>
<table class="table table-bordered">
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
        foreach ( $elemnts as $item ) :?>
            <?php foreach ( $item as $k=>$v) :?>
            <tr>
                <td colspan="2" style="50%"><?=$k?></td>
                <td colspan="2"  style="50%"><?=$v?:'--'?></td>
            </tr>
            <?php endforeach;?>
        <?php endforeach;?>
    <?php endif;?>
</table>
