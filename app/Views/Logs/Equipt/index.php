<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">

        <div class="panel-body">
            <form action="#" class="frm_search form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <input class="form-control inline input-xxs" name="a.sdate" value="<?=date('Y-m-d')?>" autocomplete="off" onclick="WdatePicker({})">
                        <input class="form-control inline input-xxs" name="a.edate" value="<?=date('Y-m-d')?>" autocomplete="off" onclick="WdatePicker({})">
                        <input class="form-control inline inputs-md" placeholder="" name="keys">
                        <button class="btn btn-xs btn-primary search" type="button">查询</button>
                    </div>
                </div>
            </form>
        </div>

        <table class="table datatable-selection-single table-hover data_list">
            <thead>
            <tr>
                <th width="160px">器材名称</th>
                <th width="220px">运动地点</th>
                <th width="130px">器材编号</th>
                <th width="100px">连接状态</th>
                <th width="120px">时间</th>
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
            url:'/logs/equipt/page?'+$('.frm_search').serialize(),
            columns:['equipt_name','location_name','equipment_no','conn_status','createtime'],
            columnDefs:[]
        });
        $('.search').click(function(){load_data();});
    });

    // data-popup="lightbox"
    function load_data(){
        data_tb.fnReloadAjax('/logs/equipt/page?'+$('.frm_search').serialize());
        $('#').before()
    }

</script>
