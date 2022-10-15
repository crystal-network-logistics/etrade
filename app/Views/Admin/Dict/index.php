
<!-- Content area -->
<div class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">字典</h6>
                </div>
                <div class="panel-body"><div class="tree-checkbox-hierarchical well" style="height: 450px;overflow-y: scroll;"></div></div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <form action="#" class="form-horizontal frm_search">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if(ck_action('admin/dict/create')):?>
                                <a class="btn btn-success btn-xs hModal btn-Add" href="/admin/dict/create" lang="添加">添加</a>
                                <?php endif;?>
                                <div class="nav-search">
                                    <input name="parentid" value="0" type="hidden">
                                    <input type="text" class="form-control inline inputs-md" name="keys" placeholder="关键字" value="">&nbsp;
                                    <button type="button" class="btn btn-primary search btn-xs" id="btn_search">查询</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <table class="table table-hover table_list">
                    <thead>
                    <tr>
                        <th width="40"></th>
                        <th width="120">编码</th>
                        <th width="220">名称</th>
                        <th width="80">排序</th>
                        <th width="220">备注</th>
                        <th width="80" class="text-right">操作</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<?=script_tag('resource/assets/js/core/libraries/jquery_ui/core.min.js')?>
<?=script_tag('resource/assets/js/core/libraries/jquery_ui/effects.min.js')?>
<?=script_tag('resource/assets/js/core/libraries/jquery_ui/interactions.min.js')?>
<?=script_tag('resource/assets/js/plugins/trees/fancytree_all.min.js')?>
<?=script_tag('resource/assets/js/plugins/trees/fancytree_childcounter.js')?>

<?=script_tag('resource/app/dataTables.treeGrid.js')?>

<script>
    var table ,tree;

    $(".tree-checkbox-hierarchical").fancytree({
        selectMode: 2,
        source: {
            url: "/admin/dict/data_tree"
        },
        click: function (event, data) {
            console.log(data.node.data)
            if (data.targetType == 'title') {
                $('input[name=parentid]').val(data.node.data.id);
                var c = $('.btn-Add')
                c.attr('href','/admin/dict/create' + '?parentid=' + data.node.data.id);
                load_data();
            }
        }
    });

    $(function(){
        table = comm.dt({
            ele : $('.table_list'),
            url : '/admin/dict/data_list?' + $('.frm_search').serialize(),
            scrollY : 'auto',
            //paging:false,
            columns:[
                {
                    className: 'treegrid-control',
                    data:function (item) {
                        if (item.children != null && item.children.length > 0) {
                            return '<a class="label bg-grey"> 展开 </a>';
                        }
                        return '';
                    },
                },
                'code','name','sorting','remark'],
            columnDefs : [
                {
                    "defaultContent": "",
                    "targets": "_all"
                },
                {
                    aTargets:[5],
                    mRender:function(data,full){
                        var html = '<div class="text-right">';
                        <?php if(ck_action('admin/dict/edit')):?>
                        html += '<a href="/admin/dict/edit?id='+full.id+'" class="label bg-primary hModal">编辑</a> &nbsp;';
                        <?php endif;?>

                        <?php if(ck_action('admin/dict/delete')):?>
                        html += '<a href="/admin/dict/delete?id='+ full.id +'" onclick="return comm.confirmCTL(this.href,\'确定删除\')" class="label bg-danger">删除</a>';
                        <?php endif;?>
                        return html + '</div>';
                    }
                }
            ]
        });
        tree = new $.fn.DataTable.TreeGrid(table,{
            left: 15,
            expandAll: false,
            expandIcon: '<span class="label bg-grey">展开</span>',
            collapseIcon: '<span class="label bg-orange-300">折叠</span>'
        });

        $('.search').on('click',function () {
            load_data();
        });
    });

    function load_data(){
        table.fnReloadAjax('/admin/dict/data_list?' + $('.frm_search').serialize());
    }

</script>
