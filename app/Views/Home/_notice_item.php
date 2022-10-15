<?php
if(count($data)) {
    foreach ($data as $item) { ?>
        <a href="/setup/articles/view?id=<?=$item['id']?>" class="list-group-item hModal" data-yes="N">
            <span class="status-mark bg-success"></span> &nbsp;<?= $item['title'] ?>&nbsp;
            <?php if($item['attachment']) {?>
                <span class="pull-right text-info"><i class="icon-attachment"></i></span>
            <?php }?>
        </a>
    <?php }
}else{
    ?>
    <span href="#" class="list-group-item" style="text-align: center;">
        暂无公告通知!
    </span>
<?php }?>
