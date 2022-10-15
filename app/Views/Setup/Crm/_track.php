<?php if(isset($data) && count($data['track'])> 0) {?>
    <?php foreach($data['track'] as $item) {?>
        <div class="panel panel-flat border-top-default border-bottom-default" style="padding: 18px;">
            <p>
                <span style="margin-right: 10px;">跟进人:</span> <span style="margin-right: 30px;width: 60px;display: inline"> <?=$item->trackor?></span>
                <span style="margin-right: 10px">跟进时间:</span><span style="margin-right: 10px"> <?=$item->createtime?></span>
            </p>
            <p>
                跟进内容:<?=$item->content?>
            </p>
        </div>
    <?php }?>
<?php } else{?>
    <div class="panel panel-flat border-top-default border-bottom-default" style="padding: 18px;">
        <p style="font-size: 16px; text-align: center;">
          暂无跟进内容!
        </p>
    </div>
<?php }?>