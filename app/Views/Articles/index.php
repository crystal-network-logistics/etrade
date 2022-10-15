<?php
$code = new Code();
$auth = new Auth();

$isHasCreate = $auth->checkAction('articles/create','create');
$isHasEdit = $auth->checkAction('articles/update','update');
$isHasDel = $auth->checkAction('articles/del','del');
$category = $code->getbykey('CATEGORY')

?>
<!--<script type="text/javascript" src="/resource/assets/js/plugins/media/fancybox.min.js"></script>-->
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <div class="tabbable">
                <ul class="nav nav-xs nav-tabs nav-tabs-solid nav-tabs-component">
                    <?php
                    $mk = 'notices';
                    foreach($category as $key=>$item) {
                        if($key == 0) $mk = $item->key;
                        ?>

                        <li class="<?=($key==0 ? 'active' : '')?>"><a href="#" data-toggle="tab" v="<?=$item->key?>"><?=$item->name?></a></li>
                    <?php }?>
                </ul>
            </div>

            <form action="#" class="form-horizontal articlesSearch ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="has-feedback has-feedback-left">
                                <input type="hidden" name="category" value="<?=$mk?>" id="primary_keys">
                                <input type="text" class="form-control " name="kes" placeholder="内容名称">
                                <div class="form-control-feedback">
                                    <i class="icon-search4 text-muted text-size-base"></i>
                                </div>
                            </div>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary bSearch">搜索</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <table class="table table-hover articles">
            <thead>
                <tr>
                    <th width="180px">标题</th>
                    <th width="220px">简要</th>
                    <th width="140px">创建日期</th>
                    <th  width="80px">操作</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script type="text/javascript">
    var articlesdt ;
    $(function(){
        articlesdt = comm.dt({
            ele : $('.articles'),
            url : '/articles/page?'+ $('.articlesSearch').serialize(),
            columns : ['title','summary','isread','createtime'],
            columnDefs:[
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        var atx = data;

                        if(full.attachment){
                            atx += ' &nbsp;<span class="text-default"><i class="icon-attachment"></i></span>'
                        }
                        var text = '<a href="/articles/view?id='+ full.id +'">'+ atx +'</a>',tip = data;
                        return comm.ellipsis(text,tip,220);
                    }
                },
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        return comm.ellipsis(data ? data : '(无简要)',data,220);
                    }
                },
                {
                    aTargets:[4],
                    mRender:function(data,full){
                        var html = '';
                        <?php if($isHasEdit) {?>
                            html += '   <a href="/articles/update?id=' + full.id + '">编辑</a> &nbsp;';
                        <?php }?>

                        <?php if($isHasDel) {?>
                            html += '   <a  href="javascript:;" onclick="del(' + full.id + ')">删除</a>';
                        <?php }?>

                        html += '   <a href="/articles/view?id=' + full.id + '">查看</a> &nbsp;';

                        return html;
                    }
                }
            ]

        });

        $('.bSearch').on('click',function(){
            loadData();
        });

    });

    function loadData(){
        articlesdt.fnReloadAjax('/articles/page?'+ $('.articlesSearch').serialize());
    }

    function del(id){
        bootbox.confirm("是否删除选择行?", function(result) {
            if(result) {
                comm.POST({
                    url: '/articles/del?id=' + id,
                    success: function (r) {
                        if (r.retCode) {
                            loadData();
                        }else{
                            comm.dAlert(r.retMsg);
                        }
                    }
                });
            }
        });
    }

    $('.tabbable a').on('click',function(e){
        var primary = $(this).attr('v');$('#primary_keys').val(primary);
        e.preventDefault();
        loadData();
    });

</script>
