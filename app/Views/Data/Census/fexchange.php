
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat" style="margin-bottom: 2px;">

        <div class="panel-body" style="padding: 10px 20px;">
            <form action="#" class="form-horizontal frm_exchange">
                <div class="col-md-12">
                    <?=\App\Libraries\LibComp::get_customer([ 'name' => 'customerid','class' => 'select inline selects-220'])?>
                    <input type="text" class="form-control inline input-220" name="keys" placeholder="业务号" value="">&nbsp;
                    <button type="button" class="btn btn-primary search" id="btn_search" onclick="load_exchange_data();"><i class="icon icon-search4"></i> 查询</button>

                    <a class="btn btn-success ExExcel" href="/data/census/fexchange_page/export" id="btnCreate" frm=".frm_exchange"> <i class="icon icon-file-excel"></i> 导出Excel </a> &nbsp;
                </div>
            </form>
        </div>

        <table class="table table-hover tb_fexchange_data">
            <thead>
            <tr>
                <th width="80px">期间</th>
                <th width="90px">业务员</th>
                <th width="120px">公司</th>
                <th width="80px">类型</th>
                <th width="120px">客户</th>
                <th width="120px">业务单号</th>
                <th width="120px">报关金额($)</th>
                <th width="120px">收汇金额</th>
                <th width="120px">备注</th>
                <th width="120px">收汇人民币</th>
                <th width="120px">付汇金额</th>
                <th width="120px">结算利润</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<script type="text/javascript">
    var dtexchange ;
    $(function(){
        dtexchange = comm.dt({
            ele:$('.tb_fexchange_data'),
            url:'/data/census/fexchange_page?'+$('.frm_exchange').serialize(),
            columns  :['donetime','owner','company_name','entrance_text','customername','BusinessID','bg_amount','SHAMT','accounttype','SHAMT_CNY','FHAMT_CNY','profit_amount'],

            columnDefs:[
                {
                    aTargets:[5],
                    mRender:function(data,full){
                        if(data) return `<a target="_blank" href="/declares/${full.isentrance==0?'project':'import' }/view?id=${full.id}">${data}</a>`;
                        return '';
                    }
                },
                {
                    aTargets:[4],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,160);
                    }
                },
                {
                    aTargets:[6,7,9,11],
                    mRender:function(data,full){
                        return data ? comm.fMoney(data) : "0";
                    }
                }
            ]
        });
    });

    function load_exchange_data(){
        dtexchange.fnReloadAjax('/data/census/fexchange_page?'+$('.frm_exchange').serialize());
    }
</script>
