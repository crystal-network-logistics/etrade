<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">

        <div class="panel-body">
            <form action="#" class="frm_search form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <input class="form-control inline input-120" name="sdate" value="<?=date('Y-m-d')?>" autocomplete="off" autocomplete="off" onclick="WdatePicker({})">
                        <input class="form-control inline input-120" name="edate" value="<?=date('Y-m-d')?>" autocomplete="off" onclick="WdatePicker({})">
                        <input class="form-control inline input-220" placeholder="用户名" name="keys">
                        <button class="btn btn-primary search" type="button"><i class="icon icon-search4"></i> 查询</button>
                    </div>
                </div>
            </form>
        </div>

        <table class="table datatable-selection-single table-hover data_list">
            <thead>
            <tr>
                <th width="160px">用户名</th>
                <th width="100px">Controller</th>
                <th width="650px">REQDATA</th>
                <th width="120px">操作时间</th>
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
            url:'/logs/operations/page?'+$('.frm_search').serialize(),
            columns:['username','controller','uri','createtime'],
            columnDefs:[{
                aTargets:[2],
                mRender:function(data,full){
                    return comm.ellipsis(data,data,650)
                }
            }]
        });
        $('.search').click(function(){load_data();});
    });

    function load_data(){
        data_tb.fnReloadAjax('/logs/operations/page?'+$('.frm_search').serialize());
    }

</script>
