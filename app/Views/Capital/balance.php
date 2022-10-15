<div class="panel" style="border-color: #fff;margin-bottom: 0px;">
    <div class="panel-body nav-search" style="padding: 5px 20px">
        <form class="form-horizontal frm_balance">
            <input name="customerid" value="<?=ckAuth()?session('custId'):(isset($data['customerid'])?$data['customerid']:'')?>" type="hidden">
            <div class="col-md-12 text-right">
                <input type="text" class="form-control inline input-220" name="keys" placeholder="业务编号" value="">&nbsp;
                <button type="button" class="btn btn-primary search" onclick="load_balance_data();"><i class="icon icon-search4"></i> 查询</button>
            </div>
        </form>
    </div>
</div>

<table class="table table-hover data_balance">
    <thead>
    <tr>
        <th width="220px">业务编号</th>
        <th width="140px">收入(不含退税)(RMB)</th>
        <th width="140px">退税收入(RMB)</th>
        <th width="140px">支付总计(RMB)</th>
        <th width="120px">余额</th>
        <th width="140px" class="text-right">建单日期</th>
    </tr>
    </thead>
</table>

<script>
    var dt_balance;
    $(function(){
        dt_balance = comm.dt({
            ele : $('.data_balance'),
            url : '/declares/project/load_page?' + $('.frm_balance').serialize(),
            columns: ['BusinessID','receiptsum','tuishui','payamount',null,'createtime'],
            columnDefs : [{
                aTargets:[0],
                    mRender:function(data,full){
                        return `<a href="/declares/${(full.isentrance == '1' ? 'import' : 'project')}/view?id=${full.ID}" target="_blank">${data}</a>`;
                    }
                },
                {
                    aTargets:[1,2,3],
                    mRender:function(data,full){
                        return comm.fMoney(data)
                    }
                },
                {
                    aTargets:[4],
                    mRender:function(data,full){
                        var rsum = full.receiptsum ? parseFloat( full.receiptsum ) :0,
                            tsum = (full.tuishui ? parseFloat( full.tuishui ) : 0 ),
                            psum = (full.payamount ? parseFloat( full.payamount ) : 0 ),
                            result = parseFloat(rsum + tsum - psum)
                        ;
                        return result.toFixed(2);//( result < 0 ) ? (-comm.fMoney(0-result,2)) : comm.fMoney(result);
                    }
                },
                {
                    aTargets:[5],
                    mRender:function(data,full){
                        return `<div class="text-right">${data}</div>`;
                    }
                }
            ]
        });
    });

    function load_balance_data(){
        dt_balance.fnReloadAjax('/declares/project/load_page?' + $('.frm_balance').serialize());
    }
</script>
