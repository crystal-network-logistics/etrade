<div class="panel" style="border-color: #fff;margin-bottom: 0px;border-bottom: 1px solid #eee;">
    <div class="panel-body nav-search" style="padding: 5px 20px">
        <form class="form-horizontal frm_balance_log">
            <input name="flag" value="0" type="hidden">
            <div class="col-md-12 text-right">
                <?php if ( ckAuth(false) ):?>
                    <?=\App\Libraries\LibComp::get_customer([ 'name' => 'customerid','class' => 'select inline selects-320'])?>
                <?php else :?>
                    <input name="customerid" value="<?=ckAuth()?session('custId'):(isset( $_REQUEST['customerid'] ) ? $_REQUEST['customerid'] : '')?>" type="hidden">
                <?php endif;?>
                <input type="text" class="form-control inline input-220" name="keys" placeholder="变动事项" value="">&nbsp;
                <button type="button" class="btn btn-primary search" onclick="load_balance_log_data(0);"><i class="icon icon-search4"></i> 查询</button>
            </div>
        </form>
    </div>
</div>

<table class="table table-hover tb_balance_log_data">
    <thead>
    <tr>
        <th width="140px">变动时间</th>
        <th width="220px">客户名称</th>
        <th width="220px">起始余额</th>
        <th width="140px">变动事项</th>
        <th width="140px">变动金额</th>
        <th width="140px">目标余额</th>
    </tr>
    </thead>
</table>

<script>
    var tb_balance_log_tb
    $(function(){
        tb_balance_log_tb = comm.dt({
            ele : $('.tb_balance_log_data'),
            url : '/declares/capital/balance_log_page?'+ $('.frm_balance_log').serialize(),
            columns: ['created_at','customername','balance_from','comment','amount','balance_to'],
            columnDefs:[
                {
                    aTargets:[2,4,5],
                    mRender:function(data,full){
                        return comm.fMoney(data)
                    }
                }
            ]
        });
    });

    function load_balance_log_data(n){
        var input = $('.frm_balance_log input[name=flag]'),num = input.val();
        console.log(n,num)
        if ( (n == 1 && num == "0") || ( n == 0) ) {
            input.val(n?n:0);
            tb_balance_log_tb.fnReloadAjax('/declares/capital/balance_log_page?' + $('.frm_balance_log').serialize());
        }
    }
</script>
