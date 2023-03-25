<?php
    $topics = \App\Libraries\LibForm::get_message(5);
?>
<div class="panel">
    <div class="panel-heading">
        <h6 class="panel-title" style="position: relative">待办通知</h6>
        <div class="heading-elements">
            <a class="label bg-danger-300 heading-text" href="/message/notify/clearall" data-popup="tooltip" data-placement="left" title="清除所有只读或无效通知" onclick="return comm.confirmCTL(this.href,'是否清除无效的通知?',(resp)=>{setTimeout(()=>{window.location.reload()},3000) })">清除无效通知</a>
        </div>
    </div>
    <div class="panel-body" style="max-height: 320px;overflow: auto;min-height: 220px;">
        <div class="list-group list-group-borderless no-padding-top listNotices">
            <?php if(count($topics['data'])) :
                foreach ($topics['data'] as $item) : ?>
                    <a href="<?= $item['url'] ?>" class="list-group-item">
                        <i class="status-mark bg-success"></i> &nbsp;<?= $item['message'] ?>&nbsp;
                        <span class="badge bg-danger-400 pull-right"><?= $item['badge'] ?></span>
                    </a>
                <?php endforeach;
            else: ?>
                <a href="javascript:void(0)" class="list-group-item" style="text-align: center;">
                    暂无待办事项!
                </a>
            <?php endif;?>
        </div>
    </div>
</div>
