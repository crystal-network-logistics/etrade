<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=APPNAME?></title>
    <?= $this->include('/Layout/assets')?>
</head>
<body>
<aside class="mask works-mask" style="display: none;">
    <div class="mask-content">
        <p class="del-p">确定移除文件？</p>
        <p class="check-p"><span class="del-com wsdel-ok" style="cursor: pointer">确定</span><span class="wsdel-no" style="cursor: pointer">取消</span></p>
    </div>
</aside>
<?= $this->include('/Layout/nav')?>
<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <?=\App\Libraries\LibMenu::init_menu(); ?>
        <!-- Main content -->
        <div class="content-wrapper">
            <?=$this->renderSection('content')?>
        </div>
    </div>
</div>
    <div class="navbar-default navbar-sm" style="width: 100%;bottom: 0px">
        <div class="navbar-collapse collapse">
            <div class="navbar-text">
                © <?php echo date('Y')?>. <a href="#"><?php echo $_SERVER['HTTP_HOST']?></a> by <a href="http://<?php echo $_SERVER['HTTP_HOST']?>" target="_blank"></a>
            </div>
            <div class="navbar-right"></div>
        </div>
    </div>
</body>
<?=script_tag("resource/app/search.js")?>
</html>
