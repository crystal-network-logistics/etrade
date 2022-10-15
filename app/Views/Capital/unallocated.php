
<div class="panel nav-search" style="border-color: #fff;margin-bottom: 0px;">
    <div class="panel-body" style="padding: 5px 20px">
        <form class="form-horizontal frm_unallocated">
            <input name="customerid" value="<?=ckAuth()?session('custId'):(isset($data['customerid'])?$data['customerid']:'')?>" type="hidden">
            <div class="col-md-12 text-right">
                <input type="text" class="form-control inline input-220" name="keys" placeholder="付款人,备注" value="">&nbsp;
                <button type="button" class="btn btn-primary search" onclick="load_unallocate_data();"><i class="icon icon-search4"></i> 查询</button>
            </div>
        </form>
    </div>
</div>

<table class="table table-hover tb_unallocated_data">
    <thead>
    <tr>
        <th width="100px">收款日期</th>
        <th width="220px">付款人</th>
        <th width="120px">付款人国家及地区</th>
        <th width="100px">币种</th>
        <th width="100px">金额</th>
        <th width="100px">汇率</th>
        <th width="120px">折RMB</th>
        <th width="120px" class="text-right">备注</th>
    </tr>
    </thead>
</table>

<script>
    var tb_unallocated
    $(function(){
        tb_unallocated = comm.dt({
            ele : $('.tb_unallocated_data'),
            url : '/declares/receipt/load_unlocated_page?'+ $('.frm_unallocated').serialize(),
            columns:['receiptdate', 'payername', 'payercountry', 'currency', 'amount', 'exchangerate', 'note'],
            columnDefs:[
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,220);
                    }
                },
                {
                    aTargets:[2],
                    mRender:function(data,full){
                        return comm.dictionary(__COUNTRY,data);
                    }
                },
                {
                    aTargets:[4,5],
                    mRender:function(data,full){
                        return comm.fMoney(data);
                    }
                },
                {
                    aTargets:[6],
                    mRender:function(data,full){
                        return comm.fMoney(full.amount * (full.exchangerate?full.exchangerate:0));
                    }
                }
                ,
                {
                    aTargets:[7],
                    mRender:function(data,full){
                        return `<div class="text-right">${comm.ellipsis(full.note,full.note,140,'left')}</div>`;
                    }
                },
            ],
            drawCallback:function ( setting ) {
                setTimeout(()=>{
                    $('.dataTables_scrollHeadInner,.tb_unallocated_data').css('width','')
                },30)
            }
        });
    });

    function load_unallocate_data(){
        tb_unallocated.fnReloadAjax('/declares/receipt/load_unlocated_page?' + $('.frm_unallocated').serialize());
    }
</script>
