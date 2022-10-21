<?php
    $model = $data['detail'];
?>
<style>
    .detail-td{padding: 5px 10px;}
</style>
<h6>产品信息</h6>
<table class="table  table-bordered">
    <tr>
        <td width="20%" class="detail-td">所属客户</td>
        <td width="30%" class="detail-td"><?=$model['customer']?></td>

        <td width="20%" class="detail-td">开票人公司</td>
        <td width="30%" class="detail-td">
            <span class="spInvoice">
            <?php if ($model['invoicer']) :?>
                <?=$model['invoicer']?>
            <?php elseif( $model['status'] == 3 && ck_action('setup/products/bind_invoicer') ) :?>
                <a class="label bg-primary-300 hModal" data-size="lg" data-group="invoice" href="/setup/invoicer/choice?cid=<?=$model['customerid']?>" data-text="选择并绑定"> 绑定开票人 </a>
            <?php endif;?>
            </span>
        </td>
    </tr>

    <tr>
        <td  class="detail-td">中文品名</td>
        <td  class="detail-td"><?=$model['name']?></td>
        <td  class="detail-td">英文品名</td>
        <td  class="detail-td"><?=$model['englishname']?></td>
    </tr>

    <tr>
        <td class="detail-td">用途</td>
        <td class="detail-td"><?=$model['usage']?></td>
        <td class="detail-td">品牌</td>
        <td class="detail-td"><?=$model['brand']?></td>
    </tr>
    <tr>
        <td class="detail-td">型号</td>
        <td class="detail-td"><?=$model['model']?></td>
        <td class="detail-td">退税率</td>
        <td class="detail-td"><code><?=($model['taxreturnrate']*100). ' % '?></code></td>
    </tr>
    <tr>
        <td style="vertical-align: middle" class="detail-td">HS要素:</td>
        <td colspan="3" class="detail-td">
            <?php if ( count($model['supelement'])) :?>
                <?php foreach ( $model['supelement'] as $item) :?>
                    <?php foreach ($item as $k=>$v) :?>
                        <span class="text-semibold"><?=$k?></span> : <code class="text-muted  mr-15"><?=$v?:'无'?></code>
                    <?php endforeach;?>
                <?php endforeach;?>
            <?php endif;?>
        </td>
    </tr>
</table>

<?php if ($model['files']) :?>
    <h6 class="mt-20">
        <?php
        $images = $model['files'] ? explode(',',$model['files']) : []
        ?>
        <span>附件信息:</span>
        <?php foreach ( $images as $k=>$v ) :?>
            <a href="<?=$v?>" target="_blank" class="mr-10">附件<?=$k+1?></a>
        <?php endforeach;?>
    </h6>
<?php endif;?>

<?php if ( $model['hs'] ) :?>

<h6 class="mt-20"> HSCode 申报要素</h6>

<table class="table  table-bordered">
    <tr>
        <td style="width: 20%" class="detail-td">HSCode编码</td>
        <td style="width: 30%" class="detail-td"><code><?=$model['hscode']?></code></td>
        <td style="width: 20%" class="detail-td">商品名称</td>
        <td style="width: 30%" class="detail-td"><?=$model['hs']['productname']?></td>
    </tr>

    <tr>
        <td class="detail-td">单位1</td>
        <td class="detail-td"><?=$model['hs']['officialunit1']?></td>
        <td class="detail-td">单位2</td>
        <td class="detail-td"><?=$model['hs']['officialunit2']?></td>
    </tr>

    <tr>
        <td class="detail-td">退税率</td>
        <td class="detail-td"><?=$model['hs']['taxreturnrate']?></td>
        <td class="detail-td">海关监管条件</td>
        <td class="detail-td"><?=$model['hs']['customsupervision']?></td>
    </tr>

    <tr>
        <td style="width:20%" class="detail-td">申报要素</td>
        <td colspan="3" class="detail-td"><?=$model['hs']['declarationelements']?></td>
    </tr>
</table>
<?php endif;?>
<script>
    function  get_invoicer_choice(){
        var data = comm.doChoice( data_choice_tb );
        return comm.doRequest('/setup/products/bind_invoicer',{id:'<?=$model['id']?>',invoicerid:data.id},( resp )=>{
            comm.Alert(resp.msg,resp.code);
            $('.spInvoice').html(data.name);
        },'json');
    }
</script>
