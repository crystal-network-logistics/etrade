
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">

        <div class="panel-body">
            <form action="#" class="frm_search form-horizontal">
                <div class="row">
                    <div class="col-md-12">

                        <input class="form-control inline input-220" placeholder="角色名称" name="keys">
                        <button class="btn btn-primary search" type="button">查询</button>

                        <?php if(ck_action('admin/roles/create')):?>
                            <a class="btn btn-success hModal" href="/admin/roles/create" >添加</a> &nbsp;
                        <?php endif;?>
                    </div>
                </div>
            </form>
        </div>

        <table class="table datatable-selection-single table-hover data_list">
            <thead>
            <tr>
                <th width="80px">角色名称</th>
                <th width="100px">角色编码</th>
                <th width="180px">备注</th>
                <th width="90px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>

    </div>
</div>


<script>
    var data_tb ;
    $(function(){
        data_tb = comm.dt({
            ele:$('.data_list'),
            url:'/admin/roles/page?'+$('.frm_search').serialize(),
            columns:['name','code','remark'],
            columnDefs:[{
                aTargets:[3],
                mRender:function(data,full){
                    var html = '<div class="text-right">';
                    <?php if(ck_action('admin/roles/update')):?>
                    html += '<a href="/admin/roles/update?id='+ full.id +'" class="label bg-primary hModal" lang="编辑">编辑</a>&nbsp;';
                    <?php endif;?>

                    <?php if(ck_action('admin/roles/delete')):?>
                    html += '<a href="/admin/roles/delete?id='+ full.id +'" onclick="return comm.confirmCTL(this.href)" class="label bg-danger">删除</a>';
                    <?php endif;?>

                    return html + '</div>';
                }
            }]
        });
        $('.search').click(function(){load_data();});
    });

    function load_data(){
        data_tb.fnReloadAjax('/admin/roles/page?'+$('.frm_search').serialize());
    }

</script>
