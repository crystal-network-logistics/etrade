<?php
$is_has_active = ck_action('account/cust/active')
?>
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body nav-search">
            <form action="#" class="frm_search form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <input class="form-control inline input-220" placeholder=" 帐户名称,电话或邮箱 " name="keys">
                        <button class="btn btn-primary search" type="button" onclick="load_data();">查询</button>
                    </div>
                </div>
            </form>
        </div>

        <table class="table table-hover data-list">
            <thead>
            <tr>
                <th width="120px">帐户</th>
                <th width="180px">名称</th>
                <th width="140px">电话</th>
                <th width="140px">邮箱</th>
                <th width="60px">启/禁用</th>
                <th width="60px">激活</th>
                <th width="60px">注册时间</th>
                <th width="100px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>
    <script type="text/javascript">
        var dtusers ;
        $(function(){
            dtusers = comm.dt({
                ele:$('.data-list'),
                url:'/account/uncredited/page?'+$('.frm_search').serialize(),
                columns:['username','realname','tel','email','status','activated','createtime'],
                columnDefs:[
                    {
                        aTargets:[0],
                        mRender:function(data,full){
                            return comm.ellipsis(data,data,90);
                        }
                    },
                    {
                        aTargets:[1,2],
                        mRender:function(data,full){
                            return comm.ellipsis(data,data,120);
                        }
                    },
                    {
                        aTargets:[4],
                        mRender:function(data,full){
                            return (data == 0) ? ('<i class="icon-checkmark4 text-success"></i>') : ('<i class="icon-cross2 text-danger"></i>');
                        }
                    },
                    {
                        aTargets:[5],
                        mRender:function(data,full){
                            return data==0 ?
                                (`<a
                                <?php if($is_has_active):?>
                                href="/account/cust/active?id=${full.id}"
                                onclick="return comm.confirmCTL(this.href,'是否需要激活帐户?')"
                                <?php endif;?>
                                class="label bg-danger-300">未激活</a>`) :
                                ('<span class="label bg-success-300">已激活</span>');
                        }
                    },
                    {
                        aTargets:[7],
                        mRender:function(data,full){
                            var buttons = ' <div class="text-right">';

                            <?php if(ck_action('account/cust/disabled_enabled')):?>
                            buttons += '    <a href="/account/cust/disabled_enabled?id='+ full.id +'" class="label '+ ((full.status == 0) ? 'bg-danger-300' : 'bg-success-300') +'" onclick="return comm.confirmCTL(this.href,\'确认设置禁用/启用操作?\',function (){load_data();})">'+ ((full.status == 0) ? '禁用' : '启用') +'</a> ';
                            <?php endif;?>

                            <?php if(ck_action('account/cust/spasswd')):?>
                            buttons += '    <a href="/account/cust/spasswd?id='+ full.id +'" class="label bg-primary-300" onclick="return comm.doPrompt(this.href,{title:\'请输入新密码:\',type:\'password\'})">重置</a>';
                            <?php endif;?>

                            <?php if(ck_action('account/uncredited/edit')):?>
                            buttons += '    <a href="/account/uncredited/edit?id='+ full.id +'" class="label bg-primary-300 hModal">编辑</a>';
                            <?php endif;?>

                            <?php if(ck_action('account/cust/delete')):?>
                            buttons += '    <a href="/account/cust/delete?id='+ full.id +'" class="label bg-danger-300" onclick="return comm.confirmCTL(this.href,\'确定删除?\')">删除</a>';
                            <?php endif;?>

                            return buttons + '</div>';
                        }
                    }
                ]
            });
        });

        function load_data(){
            dtusers.fnReloadAjax('/account/uncredited/page?'+$('.frm_search').serialize());
        }
    </script>
</div>
