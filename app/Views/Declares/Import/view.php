<link href="/resource/assets/css/filesPlugin.css?_=<?php echo time()?>" type="text/css" rel="stylesheet"/>
<link href="/resource/assets/css/project.css?_=<?php echo time()?>" type="text/css" rel="stylesheet"/>
<script src="/resource/app/filesPlugin.js?_=<?php echo time()?>"></script>
<?php
$project = isset($data['project'])?($data['project']??false):false;
$entry = isset($data['entry'])?($data['entry']??false):false;
$goods = isset($data['goods'])?($data['goods']??false):false;
$company = get_company($project['companyid']);
?>

<div class="content">
    <?=view('/Declares/Project/_op')?>
    <div class="panel">
        <div class="panel-heading bg-indigo-300">
            <h6 class="panel-title">
                <a class="collapsed" data-toggle="collapse" href="#baoguan">报关资料</a>
                <?php if($entry) {?>
                    <span class="sm">报关口岸:<?=\App\Libraries\LibComp::get_dict('CITYEN',$entry['entryport'])?></span>&nbsp;&nbsp;
                    <span class="sm">启运国: <?=\App\Libraries\LibComp::get_dict('COUNTRYEN',$entry['destionationcountry'])?></span>&nbsp;&nbsp;
                    <span class="sm">出运时间: <?=$entry["exportdate"]?></span>&nbsp;&nbsp;
                    <span class="sm">报关金额: <?=round( $project["bgamount"],2)?></span>&nbsp;&nbsp;
                    <span class="sm">通关单号: <?=$entry["clearancenbr"]?></span> &nbsp;&nbsp;
                <?php }?>
            </h6>

            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div id="baoguan" class="panel-collapse collapse in">
            <?php if( $entry ) :?>
                <?=view('/Declares/Entry/viewim')?>
            <?php else :?>
                <?=view('/Declares/Entry/formim')?>
            <?php endif;?>
        </div>
    </div>

    <?=view('/Declares/Project/item')?>

</div>
