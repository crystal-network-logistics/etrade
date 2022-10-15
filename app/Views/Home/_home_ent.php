
<style>
    .panel-heading{padding: 10px 15px}
    .tooltip-inner{max-width: inherit}
</style>

<div class="content">
    <div class="row">
        <div class="col-md-8">
            <!--快捷键-->
            <?=view('/Home/_charts')?>
        </div>

        <div class="col-md-4">
            <!--资金-->
            <?=view('/Home/_capital')?>
            <!--待办消息-->
            <?=view('/Home/_affairs')?>
            <!--公告通知-->
            <?=view('/Home/_notice')?>
            <!--货运查询-->
            <?php //$this->load->view('/Home/_ship')?>
        </div>
    </div>
</div>
