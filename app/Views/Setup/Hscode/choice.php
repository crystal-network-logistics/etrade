
<!-- Content area -->
<div class="divChoice">
    <div class="panel panel-flat">
        <div class="panel-body" style="padding: 10px">
            <form action="#" class="frm_choice_search form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="has-feedback has-feedback-left">
                                <input class="form-control" placeholder="HSCode编码,名称" name="keys">
                                <div class="form-control-feedback">
                                    <i class="icon-search4 text-muted text-size-base"></i>
                                </div>
                            </div>
                            <div class="input-group-btn">
                                <button class="btn btn-primary subSearch" type="button"  onclick="load_choice_data()"><i class="icon icon-search4"></i> 查询</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <table class="table datatable-selection-single table-hover data_choice_list">
            <thead>
            <tr>
                <th width="40px">#</th>
                <th width="80px">HSCode</th>
                <th width="120px">产品名称</th>
                <th width="60px">退税率</th>
                <th width="40px">海关监管条件</th>
                <th width="250px">要素</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    var data_choice_tb ;

    $(function(){
        data_choice_tb = comm.dt({
            ele:$('.data_choice_list'),
            url:'/setup/hscode/page?'+$('.frm_choice_search').serialize(),
            columns:[null,'code','productname','taxreturnrate','customsupervision','declarationelements'],
            columnDefs:[
            {
                aTargets:[0],
                mRender:function(data,full){
                    return `<input name="ck" type="radio" value="${full.id}">`;
                }
            },
            {
                aTargets:[2],
                mRender:function(data,full){
                    return comm.ellipsis(data,data,250);
                }
            },
                {
                    aTargets:[5],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,250,'left');
                    }
                }],
            drawCallback : function ( setting ){
                var mId = localStorage.getItem('mGuid')
                $(`#${mId} .btn-submit`).unbind().on('click',function ( ) {
                    get_hscode_choice()
                })
            }
        });
        setTimeout(()=>{load_choice_data()},200)
    });

    function load_choice_data(){
        data_choice_tb.fnReloadAjax('/setup/hscode/page?'+$('.frm_choice_search').serialize());
    }

</script>
