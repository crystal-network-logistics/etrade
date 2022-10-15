<link href="/resource/assets/css/filesPlugin.css?_=<?php echo time()?>" type="text/css" rel="stylesheet"/>
<script src="/resource/app/filesPlugin.js?_=<?php echo time()?>"></script>
<link href="/resource/assets/css/project.css?_=<?php echo time()?>" type="text/css" rel="stylesheet"/>

<div class="content">
    <?=view('/Declares/Project/_op')?>
    <div class="panel">
        <div class="panel-heading bg-indigo-300">
            <h6 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#baoguan">报关资料</a></h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>
        <div id="baoguan" class="panel-collapse collapse in">
            <?=view('/Declares/Entry/formim')?>
        </div>
    </div>

    <?=view('/Declares/Project/item')?>
</div>
