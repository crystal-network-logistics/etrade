<?php
    $company = get_company();
?>
<!-- Main navbar -->
<div class="navbar navbar-default header-highlight" style="border-width:0;background-color: #fbfafa;">
    <div class="navbar-header">
        <div class="navbar-brand text-bold" style="color: #fff;">
            <?php if ( $company && file_exists(".{$company['logo']}") ): ?>
                <img src="<?=$company['logo']?>" style="width: 120px;height: auto;">
            <?php else: ?>
                <?=($company?$company['shortname']:APPNAME)?>
            <?php endif;?>

        </div>
        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li>
                <a class="sidebar-control sidebar-main-toggle hidden-xs">
                    <i class="icon-indent-decrease"></i>
                </a>
            </li>
        </ul>



        <div class="navbar-text nav-search">
           <div class="text-muted">
               <?php $bread = \App\Libraries\LibMenu::breadcrumb();?>

               <?php if(!$bread):?>
                   <a href="/" class="text-grey"> <i class="icon-home2 position-left"></i> 数据面板 </a>
               <?php else:?>
                <?=$bread?>
               <?php endif;?>
            </div>
        </div>

        <ul class="nav navbar-nav navbar-right" >

            <form class="navbar-form navbar-left mr-20 breadcrumb-item" style="margin-top: 12px">
                <div class="form-group has-feedback">
                    <input type="search" class="form-control" placeholder="请输入搜索内容" id="search_key_word" style="min-width: 320px;">
                    <div class="form-control-feedback">
                        <i class="icon-search4 text-muted text-size-base"></i>
                    </div>
                </div>
            </form>

            <li class="dropdown iNotices">
                <?=view('/Notify/notices')?>
            </li>

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-user"></i>
                    <span><?=session('name')?></span>
                    <i class="caret"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="/admin/users/passwd" class="hModal"><i class="icon-lock2"></i> 重置密码</a></li>
                    <li><a href=""><i class="icon-cog5"></i> 帐户设置</a></li>
                    <li><a href="/logout"><i class="icon-switch2"></i> 退出</a></li>
                </ul>

            </li>
        </ul>
    </div>
</div>
