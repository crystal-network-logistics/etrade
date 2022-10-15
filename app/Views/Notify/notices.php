    <?php
        $data = \App\Libraries\LibForm::get_message();
    ?>
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="icon-bubbles4"></i>
        <span class="visible-xs-inline-block position-right">消息通知</span>
        <?php if ( $data['nums'] ):?>
        <span class="badge bg-warning-400 message"><?=$data['nums']?></span>
        <?php endif;?>
    </a>

    <div class="dropdown-menu dropdown-content width-300">
        <div class="dropdown-content-heading">
            消息通知
        </div>
        <ul class="media-list dropdown-content-body messagels">
            <?php if(count($data['data'])>0) :?>
                <?php foreach($data['data'] as $item) {?>
                    <?php if(isset($item['topickey']) && $item['topickey']) {?>
                        <li class="media">

                            <div class="media-left" style="padding-top: 5px;">
                                <a href="<?=$item['url']?>" class="badge bg-warning-400">
                                    <span class="letter-icon"><?=$item['badge']?></span>
                                </a>
                            </div>

                            <div class="media-body">
                                <a href="<?=($item['url'])?>" class="media-heading">
                                    <span class="text-semibold"><?=$item['message']?></span>
                                </a>
                                <span class="text-muted"><?=$item['message']?>,点击进入</span>
                            </div>
                        </li>
                    <?php }?>
                <?php }?>
            <?php  else :?>
                <li class="media" style="text-align: center;">
                    暂无消息通知
                </li>
            <?php endif;?>
        </ul>
        <div class="dropdown-content-footer">
            <a href="/message/notify/index" data-popup="tooltip" title="更多消息"><i class="icon-menu display-block"></i></a>
        </div>
    </div>
