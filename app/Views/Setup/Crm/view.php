<?php
    $data = $data['detail']??false;
    $is_has_crm_track = ck_action('setup/crm/track');

?>
<style>
    .div_detail>table>thead>th,.div_detail>table>tbody>td{padding: 5px}
</style>
<h6>基础信息</h6>
<div class="div_detail">
<table class="table table-bordered">
    <tr>
        <th style="width: 10%">客户名称</th>
        <td style="width: 15%"><?=$data['name']?></td>
        <th style="width: 10%">客户简称</th>
        <td style="width: 15%"><?=$data['shortname']?></td>
        <th style="width: 10%">客户类型</th>
        <td style="width: 15%"><?=App\Libraries\LibComp::get_dict('CTYPE', $data['type'])?></td>
        <th style="width: 10%">客户编号</th>
        <td style="width: 15%"><?=$data['customerno']?></td>
    </tr>

    <tr>
        <th>业务员</th>
        <td><?=$data['username']?></td>
        <th>地区</th>
        <td><?=App\Libraries\LibComp::get_dict('CITY',$data['region'])?></td>
        <th>联系地址</th>
        <td><?=$data['address']?></td>
        <th>邮编</th>
        <td><?=$data['post']?></td>
    </tr>

    <tr>
        <th>固定电话</th>
        <td><?=$data['tel']?></td>
        <th>传真</th>
        <td><?=$data['fax']?></td>
        <th>企业网址</th>
        <td><?=$data['site']?></td>
        <th>主营产品</th>
        <td><?=$data['mainproduct']?></td>
    </tr>

    <tr>
        <th>开户银行</th>
        <td><?=$data['bank']?></td>
        <th>银行帐号</th>
        <td><?=$data['bankaccount']?></td>
        <th>客户来源</th>
        <td><?=\App\Libraries\LibComp::get_dict('CSOURCE', $data['source'])?></td>
        <th>利润提取</th>
        <td><?=\App\Libraries\LibComp::get_dict('PROFITS',$data['profits'])?></td>
    </tr>

    <tr>
        <th>创建人</th>
        <td><?=$data['creator']?></td>
        <th>创建日期</th>
        <td><?=date('Y-m-d',strtotime($data['createtime']))?></td>
        <th>备注</th>
        <td colspan="3"><?=$data['remark']?></td>
    </tr>
</table>

<?php if ( $data['contract_data'] ): ?>
<h6>联系人</h6>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>姓名</th>
        <th>邮箱</th>
        <th>电话</th>
        <th>手机</th>
        <th>性别</th>
        <th>生日</th>
        <th>职务</th>
        <th>QQ</th>
        <th>微信</th>
        <th>联系地址</th>
        <th>状态</th>
        <th>备注</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ( $data['contract_data'] as $item ): ?>
    <tr>
            <td><?=$item['name']?></td>
            <td><?=$item['email']?></td>
            <td><?=$item['tel']?></td>
            <td><?=$item['phone']?></td>
            <td><?=$item['sex']?></td>
            <td><?=$item['birthday']?></td>
            <td><?=$item['position']?></td>
            <td><?=$item['qq']?></td>
            <td><?=$item['weixin']?></td>
            <td><?=$item['address']?></td>
            <td><?=($item['status']==0?'启用':'禁用')?></td>
            <td><?=$item['remark']?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
<?php endif;?>

<?php if ( $data['track_data'] ): ?>
<h6>跟踪情况
    <?php if ( $is_has_crm_track ): ?>
    <small style="float: right"><a class="label bg-primary-300" href="/setup/crm/track?id=<?=$data['id']?>" onclick="return comm.doPrompt(this.href,{title:'请输入跟进信息:'},(resp)=>{load_crm_data()})"><i class="icon icon-add"></i> 新增跟进</a></small>
    <?php endif;?>
</h6>
<table class="table table-bordered">
    <thead>
    <tr>
        <th style="width: 5%;">#</th>
        <th style="width: 15%;">跟进人</th>
        <th style="width: 25%;">跟进时间</th>
        <th style="width: 60%;">跟进内容</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ( $data['track_data'] as $k=>$track ):?>
    <tr>
        <td><?=($k+1)?></td>
        <td><?=$track['trackor']?></td>
        <td><?=$track['createtime']?></td>
        <td><?=$track['content']?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
<?php endif?>

<?php if ( $data['files'] ):?>
    <h6>附件</h6>

    <?php $files = explode(',',$data['files'])?>

    <?php foreach ( $files as $key=>$v ):?>
        <span><a target="_blank" href="<?=$v?>"> 附件<?=($key+1)?> </a></span>
    <?php endforeach;?>
<?php endif;?>
</div>
