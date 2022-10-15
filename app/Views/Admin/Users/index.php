
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <form action="#" class="frm_search form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-search">
                            <input type="hidden" name="type" value="all">
                            <input class="form-control inline input-320" placeholder="帐户名称,手机号" name="keys">
                            <button class="btn btn-primary search" type="button" onclick="load_data();">查询</button>
                        </div>
                        <?php if(ck_action('admin/users/create')):?>
                            <a class="btn btn-success hModal" href="/admin/users/create">新增</a> &nbsp;
                        <?php endif;?>
                    </div>
                </div>
            </form>
        </div>

        <table class="table table-hover data-list">
            <thead>
            <tr>
                <th width="120px">帐户</th>
                <th width="100px">名称</th>
                <th width="120px">电话</th>
                <th width="60px">状态</th>
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
                url:'/admin/users/data_list?'+$('.frm_search').serialize(),
                columns:['username','realname','tel','status'],
                columnDefs:[
                    {
                        aTargets:[3],
                        mRender:function(data,full){
                            return (full.status == "0") ? ('<i class="icon-checkmark4 text-success"></i>') : ('<i class="icon-cross2 text-danger"></i>');
                        }
                    },
                    {
                        aTargets:[4],
                        mRender:function(data,full){
                            var buttons = ' <div class="text-right">';

                            <?php if(ck_action('admin/users/disabled_enabled')):?>
                            buttons += '    <a href="/admin/users/disabled_enabled?id='+ full.id +'" class="label '+ ((full.status == 0) ? 'bg-danger' : 'bg-success') +'" onclick="return comm.confirmCTL(this.href,\'确认设置禁用/启用操作?\',function (){load_data();})">'+ ((full.status == 0) ? '禁用' : '启用') +'</a> ';
                            <?php endif;?>

                            <?php if(ck_action('admin/users/spasswd')):?>
                            buttons += '    <a href="/admin/users/spasswd?id='+ full.id +'" class="label bg-primary" onclick="return comm.doPrompt(this.href,{title:\'请输入新密码:\',type:\'password\'})">重置</a>';
                            <?php endif;?>

                            <?php if(ck_action('admin/users/edit')):?>
                            buttons += '    <a href="/admin/users/edit?id='+ full.id +'" class="label bg-primary hModal">编辑</a>';
                            <?php endif;?>

                            <?php if(ck_action('admin/users/delete')):?>
                            buttons += '    <a href="/admin/users/delete?id='+ full.id +'" class="label bg-danger" onclick="return comm.confirmCTL(this.href,\'确定删除?\')">删除</a>';
                            <?php endif;?>

                            return buttons + '</div>';
                        }
                    }
                ]
            });
        });

        function load_data(){
            dtusers.fnReloadAjax('/admin/users/data_list?'+$('.frm_search').serialize());
        }
    </script>
</div>
