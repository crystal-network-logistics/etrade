<?php

?>
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        
        <div class="panel-body">
            <button class="btn btn-xs btn-success search" onclick="load_data()">刷新</button>
            <?php if(ck_action('admin/menus/create')):?>
            <a href="/admin/menus/create" class="btn btn-xs  btn-primary hModal" data-yes="<?=ck_action('admin/menus/save')?'Y':'N'?>" data-size="full">新增菜单</a>
            <?php endif;?>
        </div>

        <table class="table table-hover menu">
            <thead>
            <tr>
                <th width="40px;"></th>
                <th width="110px">菜单名称</th>
                <th width="140px">菜单地址</th>
                <th width="80px">图标</th>
                <th width="80px">排序</th>
                <th width="90px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

    <?=script_tag('resource/app/dataTables.treeGrid.js')?>
    <script type="text/javascript">
        var table ,tree;
        $(function(){
            table = comm.dt({
                ele : $('.menu'),
                url : '/admin/menus/data_list?',
                scrollY : 'auto',
                paging:false,
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
                    'title','url','icon','sort','target'],
                columnDefs : [
                    {
                        "defaultContent": "",
                        "targets": "_all"
                    },

                    {
                        aTargets:[1],
                        mRender:function(data,full){
                            return '<i class="'+ (full.icon ? full.icon : ' icon-arrow-right22') +'"></i> &nbsp;&nbsp;' + data
                        }
                    },
                    {
                        aTargets:[5],
                        mRender:function(data,full){
                            var html = '<div class="text-right">';
                            <?php if(ck_action('admin/menus/edit')):?>
                            html += '<a href="/admin/menus/edit?id='+full.id+'" class="label bg-primary hModal" data-size="full">编辑</a> &nbsp;';
                            <?php endif;?>

                            <?php if(ck_action('admin/menus/delete')):?>
                            html += '<a href="/admin/menus/delete?id='+ full.id +'" onclick="return comm.confirmCTL(this.href,\'确定删除\',function (){load_data()})" class="label bg-danger">删除</a>';
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
        });

        function load_data(){
            table.fnReloadAjax('/admin/menus/data_list?');
        }
    </script>
