<?php
    $model = $data['detail'];
    $is_has_admin  = ck_action('setup/invoicer/update');
?>

<?php if(strlen($model["rejectreason"])>0 && ($model["status"] == 2 || $model["status"] == 4)) {?>
    <div class="alert alert-danger alert-styled-left alert-bordered">
        <span class="text-semibold"> 拒绝原因 : </span><?php echo strlen($model["rejectreason"])>0?$model["rejectreason"]:''?>
    </div>
<?php }?>

<h6>开票人信息</h6>
<table class="table  table-bordered">
    <?php if( ckAuth(false) ):?>
    <tr>
        <td width="20%">客户信息</td>
        <td width="30%" colspan="3"><?=$model['customername']?></td>
    </tr>
    <?php endif;?>

    <tr>
        <td width="20%">开票人公司名称</td>
        <td width="30%">
            <?=$model['name']?>
            <?php if ( $is_has_admin ) :?>
                <a class="label bg-primary-300" href="/setup/invoicer/update/name?id=<?=$model['id']?>" onclick="return comm.doPrompt(this.href,{title:'请输入需要修改的值:'},(resp)=>{load_data()})">修改</a>
            <?php endif;?>
        </td>
        <td width="20%">开票人地址</td>
        <td width="30%">
            <?=$model['address']?>
            <?php if ( $is_has_admin ) :?>
                <a class="label bg-primary-300" href="/setup/invoicer/update/address?id=<?=$model['id']?>" onclick="return comm.doPrompt(this.href,{title:'请输入需要修改的值:'},(resp)=>{load_data()})">修改</a>
            <?php endif;?>
        </td>
    </tr>
    <tr>
        <td>纳税人识别号</td>
        <td><?=$model['taxpayerid']?></td>
        <td>营业执照注册号</td>
        <td><?=$model['licenseid']?></td>
    </tr>
    <tr>
        <td>纳税人认定时间</td>
        <td><?=$model['taxpayerconfirmdate']?></td>
        <td>开票人增值税率</td>
        <td><code> <?=($model['viirate']*100)?> % </code></td>
    </tr>

    <tr>
        <td>开户银行</td>
        <td>
            <?=$model['bank']?>
            <?php if ( $is_has_admin ) :?>
                <a class="label bg-primary-300" href="/setup/invoicer/update/bank?id=<?=$model['id']?>" onclick="return comm.doPrompt(this.href,{title:'请输入需要修改的值:'},(resp)=>{load_data()})">修改</a>
            <?php endif;?>
        </td>
        <td>银行账号</td>
        <td>
            <label class="label bg-success-300 "> <?=$model['account']?> </label>
            <?php if ( $is_has_admin ) :?>
                <a class="label bg-primary-300" href="/setup/invoicer/update/account?id=<?=$model['id']?>" onclick="return comm.doPrompt(this.href,{title:'请输入需要修改的值:'},(resp)=>{load_data()})">修改</a>
            <?php endif;?>
        </td>
    </tr>

    <tr>
        <td>货源地</td>
        <td><?=$model['domesticsource']?></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td style="vertical-align: middle">开票人产品</td>
        <td colspan="3">
            <?php if($model['products']) :?>
            <?php foreach ( $model['products'] as $k=>$item) :?>
            <label class="label bg-grey-300"> <?=$item['name']?> ( HS: <?=$item['hscode']?> )</label>
            <?php endforeach;?>
            <?php endif;?>
        </td>
    </tr>
</table>

<h6 class="mt-20 mb-20">

    附件 (点击查看):
    <?php if ( $model['files'] ) :?>
        <?php foreach ( explode(',',$model['files']) as $k=>$item ) :?>
            <a class="label bg-primary mr-20" href="<?=$item?>" target="_blank"> 附件<?=$k+1?> </a>
        <?php endforeach;?>
    <?php endif;?>
</h6>
