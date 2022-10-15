<div class="panel" style="border-color: #fff;margin-bottom: 0px; border-bottom: 1px solid #eee;">
    <div class="panel-body nav-search" style="padding: 5px 20px">
        <form class="form-horizontal frm_customer_balance">
            <div class="col-md-12 text-right">
                <input type="text" class="form-control inline input-220" name="keys" placeholder="客户编号,客户名称,手机号" value="">&nbsp;
                <button type="button" class="btn btn-primary search" onclick="load_balance_customer_data();"><i class="icon icon-search4"></i> 查询</button>
            </div>
        </form>
    </div>
</div>
<table class="table table-hover data_customer_balance">
    <thead>
    <tr>
        <th width="220px">客户名称</th>
        <th width="120px">可用余额</th>
        <th width="120px">每单余额</th>
        <th width="120px">未分配资金</th>
    </tr>
    </thead>
</table>

<script>
    var tb_customer_data;
    $(function(){
        tb_customer_data = comm.dt({
            ele : $('.data_customer_balance'),
            url : '/setup/customer/load_customer_balance_page?' + $('.frm_customer_balance').serialize(),
            columns : ['customername', 'yet_balance', 'per_balance', 'ulc_balance'],
            columnDefs :
                [
                    {
                        aTargets:[1],
                        mRender:function(data,full){
                            return comm.fMoney( data );
                        }
                    },
                    {
                        aTargets:[2],
                        mRender:function(data,full){
                            return `<a href="/declares/capital/per_balance?customerid=${full.id}" class="hModal" lang="${full.customername} -- 每单余额" data-size="lg" data-yes="n">${comm.fMoney(data)}</a>`;
                        }
                    },
                    {
                        aTargets:[3],
                        mRender:function(data,full){
                            return  `<a href="/declares/capital/unc_balance?customerid=${full.id}" class="hModal" lang="${full.customername} -- 未分配资金" data-size="lg" data-yes="n">${comm.fMoney(data)}</a>`;
                        }
                    }
                ]
        });
    });

    function load_balance_customer_data(){
        tb_customer_data.fnReloadAjax('/setup/customer/load_customer_balance_page?' + $('.frm_customer_balance').serialize());
    }
</script>
