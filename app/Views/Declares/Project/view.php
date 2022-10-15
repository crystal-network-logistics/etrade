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
        <div class="panel-heading bg-primary">
            <h6 class="panel-title">
                <a class="collapsed" data-toggle="collapse" href="#baoguan">报关资料</a>
                <?php if($entry) {?>
                    <span class="sm">启运港:<?=\App\Libraries\LibComp::get_dict('CITY',$entry['entryport'])?></span>&nbsp;&nbsp;
                    <span class="sm">运抵国: <?=\App\Libraries\LibComp::get_dict('COUNTRY',$entry['destionationcountry'])?></span>&nbsp;&nbsp;
                    <span class="sm">出运时间: <?=$entry["exportdate"]?></span>&nbsp;&nbsp;
                    <span class="sm">报关金额: <?=round( $project["bgamount"],2)?></span>&nbsp;&nbsp;
                    <span class="sm">通关单号: <?=$entry["clearancenbr"]?></span> &nbsp;&nbsp;
                    <span class="sm">
                        <?php
                            $btag = $project?$project['btag']:0;$text = '通关规则:是从出运日期开始计算。<br />10天为黄色<br />20天为橙色<br />30天为红色';
                        ?>
                        <?php if($btag == 1){?>
                            <span class="yellow label" data-popup="tooltip" data-html="true" title="<?=$text?>">报关流程黄色预警</span>
                        <?php } else if($btag == 2){?>
                            <span class="bg-orange label" data-popup="tooltip" data-html="true" title="<?=$text?>">报关流程橙色预警</span>
                        <?php } else if($btag == 3){?>
                            <span class="bg-warning label" data-popup="tooltip" data-html="true" title="<?=$text?>">报关流程红色预警</span>
                        <?php }?>
                    </span>
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
                <?=view('/Declares/Entry/view')?>
            <?php else :?>
                <?=view('/Declares/Entry/form')?>
            <?php endif;?>
        </div>
    </div>
    <?=view('/Declares/Project/item')?>
</div>
