
<!-- Page header -->
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">文章管理</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="/"><i class="icon-home2 position-left"></i> 首页</a></li>
            <li><a href="/articles/notices">文章管理</a> / 编辑</li>
        </ul>
    </div>
</div>

<div class="content">
    <?php $this->load->view('/Articles/_form',['data'=>$data]);?>
</div>