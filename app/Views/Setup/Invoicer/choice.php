<!-- Content area -->
<div class="divChoice">
    <div class="panel panel-flat">
        <div class="panel-body" style="padding: 10px">
            <form action="#" class="frm_choice_search form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="has-feedback has-feedback-left">
                                <input name="customerid" type="hidden" value="<?=$data['cid']?>">
                                <input class="form-control" placeholder="开票人公司名称,纳税人识别号,开户银行,银行帐户" name="keys">
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
                <th width="180px">开票人公司名称</th>
                <th width="140px">纳税人识别号</th>
                <th width="180px">开户银行</th>
                <th width="140px">银行帐户</th>
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
            url:'/setup/invoicer/page?'+$('.frm_choice_search').serialize(),
            columns:[null,'name','taxpayerid','bank','account'],
            columnDefs:[
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        return `<input name="ck" type="radio" value="${full.id}">`;
                    }
                },
                {
                    aTargets:[1,3],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,200)
                    }
                },
                {
                    aTargets:[2,4],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,160,'left')
                    }
                }
                ],
            drawCallback : function ( setting ){
                var mId = localStorage.getItem('groupGuid')
                $(`#${mId} .btn-submit`).unbind().on('click',function ( ) {
                    get_invoicer_choice()
                })
            }
        });
        setTimeout(()=>{load_choice_data()},200)
    });

    function load_choice_data(){
        data_choice_tb.fnReloadAjax('/setup/invoicer/page?'+$('.frm_choice_search').serialize());
    }

</script>
