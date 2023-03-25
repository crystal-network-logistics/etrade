<?php
$project = isset($data['project']) ? $data['project'] : false;
$entry = isset($data['entry']) ? $data['entry'] : false;
$goods = isset($data['goods']) ? $data['goods'] : false;
$overseas = get_overseas( $entry?$entry['businessid']:0 );
$pnw = 0; $pgw = 0; $pa = 0; $sum = 0;
$CustomerID = ckAuth() ? session('custId') : (isset($_REQUEST['cid'])?$_REQUEST['cid']:($project?$project["customerid"]:""));
?>

<?php
    // 业务编辑 权限
    $has_project_update = ck_action('declares/project/update');
    // 业务退回个性 权限
    $has_project_back_update = ck_action('declares/project/back_entry');
    // 业务报关,上传备案单证 权限
    $has_project_download = ck_action('declares/project/download_entry');
    // 上传通关单权限
    $has_project_upload_entry = ck_action('declares/project/upload_entry');

    // 撤消
    $is_has_rollback = ck_action('declares/project/rollback');
?>
<div class="panel-body">
    <form class="entity">
        <?php if( $entry["updatereason"] && $entry["status"] == 1 ) {?>
            <div class="row">
                <div class="alert alert-warning alert-styled-left">
                    <span class="text-semibold">退回原因:</span> <?=$entry["updatereason"]?>
                </div>
            </div>
        <?php }?>

        <div class="row">
            <div class="col-md-3">
                <span>报关口岸: </span>
                <span class="text-primary"><?=\App\Libraries\Libcomp::get_dict('CITY',$entry["entryport"])?></span>
            </div>

            <div class="col-md-3">
                <span>运抵国(地区):</span>
                <span class="text-primary"><?=\App\Libraries\Libcomp::get_dict('COUNTRY',$entry["destionationcountry"])?></span>
            </div>
            <div class="col-md-3">
                <span>预计出货日期:</span>
                <span class="text-primary"><?=$entry["exportdate"]; ?></span>
            </div>

            <div class="col-md-3">
                <span>贸易国(地区):</span>
                <span class="text-primary"><?=\App\Libraries\Libcomp::get_dict('COUNTRY',$entry["businesscountry"])?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <span>币种:</span>
                <span class="text-primary"><?=$entry["currency"]?></span>
            </div>
            <div class="col-md-3">
                <span>运输方式:</span>
                <span class="text-primary"><?=$entry["transport"]; ?></span>
            </div>

            <div class="col-md-3">
                <span>境外贸易商:</span>
                <span class="text-primary">
                    <?=$overseas?$overseas['companyname']:'--' ?>
                </span>
            </div>

            <div class="col-md-3">
                <span>生产单位:</span>
                <span class="text-primary"><?=\App\Libraries\Libcomp::get_dict('PRODUCTION',isset($entry["production"])?$entry["production"]:''); ?></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <span>报关形式:</span>
                <span class="text-primary"><?=\App\Libraries\Libcomp::get_dict('BGXS',$entry["entryform"]); ?></span>
            </div>
            <div class="noPaper" style="display: <?=$entry["entryform"]==0?'':'none'?>">
                <div class="col-md-3">
                    <span>10位报关行代码:</span>
                    <span class="text-primary"><?=$entry["brokerno"]; ?></span>
                </div>

                <div class="col-md-3">
                    <span>报关行名称:</span>
                    <span class="text-primary"><?=$entry["brokername"]; ?></span>
                </div>
            </div>
            <div class="hasPaper" style="display: <?=($entry["entryform"]==0?'none':'')?>">
                <div class="col-md-3">
                    <span>收件人:</span>
                    <span class="text-primary"><?=$entry["receiver"]; ?></span>
                </div>

                <div class="col-md-2">
                    <span>联系电话:</span>
                    <span class="text-primary">
                        <?=$entry["tel"]; ?>
                    </span>
                </div>

                <div class="col-md-4">
                    <span>地址:</span>
                    <span class="text-primary"><?=$entry["address"]; ?></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <span>监管方式:</span>
                <span class="text-primary"><?=\App\Libraries\Libcomp::get_dict('JGFS',$entry["supervisionmode"]); ?></span>
            </div>
            <div class="col-md-3">
                <span>征免性质:</span>
                <span class="text-primary"><?=($entry["taxation"])?(\App\Libraries\LibComm::$ZMXZ[$entry["taxation"]]):''?></span>
            </div>
            <div class="col-md-3">
                <span>备案号:</span>
                <span class="text-primary"><?=$entry["fileno"]; ?></span>
            </div>
            <div class="col-md-3">
                <span>许可证号:</span>
                <span class="text-primary"><?=$entry["licno"]; ?></span>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3">
                <span>价格条款:</span>
                <span class="text-primary"><?=\App\Libraries\Libcomp::get_dict('FOB_CF',$entry["priceterm"]); ?></span>
            </div>
            <div class="col-md-3" id="yfei" style="display: <?php if($entry["priceterm"] == 2 || $entry["priceterm"] == 3){echo '';}else{ echo 'none';}?>;">
                <span>运费(USD):</span>
                <span class="text-primary"><?=$entry["tranportexpense"]; ?></span>
            </div>
            <div class="col-md-3" id="bfei" style="display: <?php if($entry["priceterm"] == 2){echo '';}else{ echo 'none';}?>;">
                <span>保费(USD):</span>
                <span class="text-primary"><?=$entry["insurancefee"]; ?></span>
            </div>
            <div class="col-md-3">
                <span>收汇方式:</span>
                <span class="text-primary"><?=\App\Libraries\Libcomp::get_dict('SHFS',$entry["foreigncurrency"]); ?></span>
            </div>
            <div class="col-md-3 shfs" style="display:<?=$entry["foreigncurrency"]==3?'':'none'?>;">
                <span>信用证号:</span>
                <span class="text-primary"><?=$entry["lcnumber"]; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <span>特殊关系确认:</span>
                <span class="text-primary"><?=$entry["specialrelation"] == 0?'否':'是'; ?></span>
            </div>
            <div class="col-md-3">
                <span>价格影响确认:</span>
                <span class="text-primary">
                    <?=$entry["priceimpact"] == 0?'否':'是'; ?>
                </span>
            </div>
            <div class="col-md-3">
                <span>支付特许权使用费确认:</span>
                <span class="text-primary">
                    <?=$entry["privilegefeeconfirm"] == 0?'否':'是'; ?>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <span>整体包装件数:</span>
                <span class="text-primary"><?=$entry["totalpackageamount"]?></span>
            </div>

            <div class="col-md-3">
                <span>整体包装种类:</span>
                <span class="text-primary"><?=$entry["totalpackagemode"]?></span>
            </div>

            <div class="col-md-3">
                <span>包装说明:</span>
                <span class="text-primary"><?=$entry["totalpackagenote"]?></span>
            </div>

            <div class="col-md-3">
                <span>总体积:</span>
                <span class="text-primary"><?=$entry["totalcube"]?> M³</span>
            </div>
        </div>

        <?php if ( count( $goods ) > 2) :?>
            <div class="row text-right" style="padding: 10px;">
                <a class="label bg-green-300 expanded"> 展开所有商品 </a>
            </div>
            <?php $expanded = true;?>
            <script>
                var expanded = false
                $('.expanded').on('click',function () {
                    var ele = $('#products');
                    $(this).text(!expanded?'折叠所有商品':'展开所有商品');
                    expanded ? (ele.css({"max-height":"300px","overflow-y":"auto","overflow-x":"hidden"})):ele.css({"max-height":"","overflow-y":""});
                    expanded = !expanded;
                });
            </script>

        <?php endif;?>

        <div class="row" id="products" style="<?=$expanded?'overflow-x: hidden;overflow-y:auto;max-height: 300px;':''?>">
            <?=view('/Declares/Goods/vitem')?>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="img-box full min_up" style="margin-bottom: 0px;">
                    <section class=" img-section">
                        <p class="up-p" style="font-weight: bold;margin-bottom:0px;">报关附件：<span class="up-span"></span></p>

                        <?=\App\Libraries\LibComp::upload_compents(['name'=>'entryfiles','display'=>true,'mini' => true],explode(',', $entry["entryfiles"]))?>

                        <p class="up-p">报关备注:<span class="text-primary"><?=$entry?$entry["entrymark"]:'';?></span></p>
                    </section>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img-box" style="margin-bottom: 0px;">
                    <span>标注唛码及备注:</span>
                    <span class="text-primary" >
                        <?=$entry["kama"] ? $entry["kama"] : 'N/M'; ?>
                    </span>
                </div>
            </div>
        </div>

        <?php if ( in_array( $entry['status'] , [0,1] ) && $has_project_update) : ?>
            <a class="btn btn-primary" href="/declares/project/update?id=<?php echo $project?$project["ID"]:0?>">编辑</a>
        <?php endif;?>

        <?php if ($entry['status'] == 2) :?>
            <a class="btn btn-info" href="javascript:;">审核中...</a>
        <?php endif;?>

        <?php if ($project['status'] == 1 && in_array( $entry['status'] , [3,4] ) && $has_project_back_update) : ?>
            <!--退回修改操作-->
            <a class="btn btn-danger" href="/declares/project/back_entry?id=<?=$project?$project["ID"]:0?>" onclick="return comm.doPrompt(this.href,{ title : '请填写退回原因'},(resp) =>{ if ( resp.code ) {setTimeout(()=>{window.location.reload()},3000)} })">退回修改</a>
        <?php endif;?>

        <!--下载报关资料,上传备案单证 等操作-->
        <?php if ($has_project_download && $entry['status'] > 2) :?>
            <?php $can_download = ( ( ckAuth() && $entry['status'] != 5) ? true: ( ckAuth() ? false : true) ) ?>

            <?php if( $can_download ) :?>
                <?php
                $down_buttons =[
                    ["tag"=>"a","text"=>"打包下载","cssClass"=>"btn btn-success" ,"attrs" => ["href"=>"/declares/project/fdownload?id={$project['ID']}","target"=>"_blank"]],
                ];
                ?>
                <!--下载报关资料-->
                <a class="btn btn-success hModal" href="/declares/project/download_entry?id=<?=$project['ID']?>"
                data-buttons='<?=json_encode($down_buttons)?>'
                > 下载报关资料 </a>
            <?php endif;?>

            <?php
                $buttons = [];
                if ( $entry['archives'] == 0 ) {
                    $buttons =[
                        ["tag"=>"a","text"=>"提交备案单据","cssClass"=>"btn btn-primary" ,"attrs" => ["onclick"=>"return archivesup(1)"]],
                        ["tag"=>"a","text"=>"保存并退出","cssClass"=>"btn btn-info" ,"attrs" => ["onclick"=>"return archivesup(0)"]],
                        ["tag"=>"a","text"=>"确认备案单据","cssClass"=>"btn btn-success" ,"attrs" => ["onclick"=>"return archivesup(2)"]]
                    ];
                    if ( ckAuth() ) {
                        $buttons = array_slice($buttons,0,2);
                    }
                }
            ?>

            <!--上传备案单证等操作-->
            <a class="btn btn-primary hModal"
               href="/declares/project/archives?id=<?=$entry['id']?>"
               data-buttons='<?=json_encode($buttons)?>'>
                <?=($data['entry']['archives'] == 1)?'查看备案单证':'上传备案单证'?>
            </a>

        <?php endif;?>

        <!--上传单证 及 通关号-->
        <?php if ( $has_project_upload_entry ) : ?>
            <?php if( in_array( $entry['status'] , [2,4] ) ): ?>
                <!--确认报关资料 操作-->
                <?php if ( $entry["status"] == 2 ):?>
                    <a class="btn btn-primary" href="/declares/project/confirm_file?id=<?=$project['ID']?>" onclick="return comm.confirmCTL(this.href,'是否确认报关资料?',(resp)=>{setTimeout(()=>{window.location.reload()},3000)})" lang="上传报关委托书">确认报关资料</a>
                <?php else :?>
                    <a class="btn btn-primary hModal" href="/declares/project/upload_entry?id=<?=$entry['id']?>" lang="确认并上传预录单" data-call="comm.reload_page" >
                        上传预录单
                    </a>
                <?php endif;?>

            <?php else :?>
                <?php if ( empty( $entry["clearancenbr"] ) && $entry["status"] > 1 ): ?>
                    <!--输入通关号 操作-->
                    <a href="/declares/project/up_entry_clearancenbr?id=<?=$entry['id']?>" class="btn btn-info" onclick="return comm.doPrompt(this.href,{ title : '请输入通关号'},( resp )=>{ setTimeout(()=>{window.location.reload();},3000) })"> 输入通关号 </a>
                <?php endif;?>

                <?php if ( $entry["status"] > 1 && $entry["status"] != 2 && ( strlen( $entry["authdeclar"] ) == 0 || strlen( $entry["clearance"] ) == 0 ) ): ?>
                    <!--确认通关 操作-->
                    <a href="/declares/project/upload_entry?id=<?=$entry['id']?>" class="btn btn-primary hModal" lang="确认并上传预录单" data-call="comm.reload_page"> 确认通关 </a>
                <?php endif;?>

            <?php endif;?>
        <?php endif;?>

        <?php if( ($entry["clearance"])) :?>
            <a class="btn btn-primary" href="/declares/project/viewfile?id=<?=$project["ID"]?>" target="_blank">查看通关单</a>
        <?php endif;?>

        <?php if($data['entry']  && $entry["status"] != 5 ) {?>
            <a class="btn btn-primary" href="/declares/project/downbooking?id=<?=$project["ID"]?>" target="_blank">下载托书</a>
        <?php }?>

        <?php if ( $is_has_rollback && $project['status'] == 2 ):?>
            <a class="btn btn-danger" href="/declares/project/rollback?id=<?=$project["ID"]?>"  onclick="return comm.confirmCTL(this.href,'确定撤消回退操作?',(resp)=>{ setTimeout(()=>{window.location.reload()},3000) })"><i class="icon icon-forward"></i> 撤销完成 </a>
        <?php endif;?>
    </form>
</div>
