
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body " style="padding: 10px 20px;" >
            <form action="#" class="form-horizontal frm_search">
                <?=\App\Libraries\LibComp::select('CITY',['name'=>'entryport','class'=>'select inline selects-160', 'data-placeholder'=>'启运港'],'',true)?>
                <?=\App\Libraries\LibComp::select('COUNTRY',['name'=>'destionationcountry','class'=>'select inline selects-160', 'data-placeholder'=>'目的港'],'',true)?>
                <input name="keys" class="form-control inline input-320" placeholder="请输入业务单号">
                <button class="btn btn-primary search" type="button" onclick="load_data();">查询</button>

            </form>
        </div>

        <table class="table table-hover attachmenttb">
            <thead>
            <tr>
                <th width="140px">业务编号</th>
                <th width="80px">启运港</th>
                <th width="80px">目的国</th>
                <th width="90px">通关单</th>
                <th width="90px">增票</th>
                <th width="90px">采购合同</th>
                <th width="90px">输运单据</th>
                <th width="90px">放行单</th>
                <th width="90px" class="text-right">建单时间</th>
            </tr>
            </thead>
        </table>

    </div>
</div>
<script src="/uploads/js/__PROJECT_STATE.sj"></script>
<script src="/uploads/js/__CITY.js"></script>
<script src="/uploads/js/__COUNTRY.js"></script>
<script>
    $(function(){
        $('.main-search select').select2({minimumResultsForSearch: "-1" });
        filedt = comm.dt({
            ele : $('.attachmenttb'),
            url : '/declares/project/files_page?'+ $('.frm_search').serialize(),
            columns:['BusinessID', 'entryport', 'destionationcountry', 'clearance', 'viiimage', 'fileht', 'filetrade', 'filepak','createtime'],
            columnDefs:[
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        return `<a href="/declares/${(full.isentrance==1)?'import':'project'}/view?id=${full.id}">${data}</a>`;
                    }
                },
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        return comm.dictionary(__CITY,data);
                    }
                }
                ,
                {
                    aTargets:[2],
                    mRender:function(data,full){
                        return comm.dictionary(__COUNTRY,data);
                    }
                },
                {
                    aTargets:[8],
                    mRender:function(data,full){
                        return `<div class="text-right">${data}</div>`;
                    }
                },
                {
                    aTargets:[3,4,5,6,7],
                    mRender:function(data,full){
                        return data?'<i class="icon-checkmark4 text-success"></i>':'<code>未上传</code>';
                    }
                }
            ]
        });
        $('.search').click(function(){load_files_page();});
    });

    function load_files_page(){
        filedt.fnReloadAjax('/declares/project/files_page?'+$('.frm_search').serialize());
    }
</script>
