
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <?php if(ck_action('admin/backup/backupall')):?>
                <a href="/admin/backup/backupall" class="btn btn-success btnbackup" onclick="return comm.confirmCTL(this.href,'确认备份',function(){load_data()})" >备份</a>
            <?php endif;?>
        </div>
        <table class="table datatable-selection-single table-hover backup">
            <thead>
            <tr>
                <th width="80px">文件名称</th>
                <th width="100px">大小(KB)</th>
                <th width="180px">备份日期</th>
                <th width="180px">路径</th>
                <th width="90px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<script>
    $(function(){
        dtrole = comm.dt({
            ele:$('.backup'),
            url:'/admin/backup/getfileinfo?_='+Math.random(),
            paging:false,
            bInfo:false,
            columns:['name','size','time','path'],
            columnDefs:[{
                aTargets:4,
                mRender:function(data,full){
                    var html = '<div class="text-right">';

                    <?php if(ck_action('admin/backup/restore')):?>
                    html += '<a href="/admin/backup/restore?file='+ full.name +'" class="label bg-primary" onclick="return comm.confirmCTL(this.href,\'确认还原当前文件?\',function (){})">还原</a>&nbsp;&nbsp;';
                    <?php endif;?>

                    <?php if(ck_action('admin/backup/delfile')):?>
                    html += '<a href="/admin/backup/delfile?file='+ full.name + '" class="label bg-danger" onclick="return comm.confirmCTL(this.href,\'确认删除\',function (){load_data()})">删除</a>';
                    <?php endif;?>

                    return html + '</div>';
                }
            }]
        });
    });
    function load_data(){
        dtrole.fnReloadAjax('/admin/backup/getfileinfo?_='+Math.random());
    }
</script>