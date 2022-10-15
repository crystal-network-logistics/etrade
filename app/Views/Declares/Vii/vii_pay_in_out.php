<?php

?>
<div class="panel panel-flat" style="border-color: #fff;margin-bottom: 0px;">
    <div class="panel-body nav-search" style="padding: 5px 20px">
        <form class="form-horizontal frm_pay<?=$pay?>_vii">
            <input type="hidden" name="pay" value="<?=$pay?>">
            <div class="col-md-12 text-right">
                <?php if ( ckAuth(false) ):?>
                    <?=\App\Libraries\LibComp::get_customer([ 'name' => 'customerid','class' => 'select inline selects-220'])?>
                <?php endif;?>
                <input type="text" class="form-control inline input-220" name="keys" placeholder="收款人公司名称" value="">&nbsp;
                <button type="button" class="btn btn-primary search" onclick="load_vii_<?=$pay?>_data();"><i class="icon icon-search4"></i> 查询</button>

                <div class="btn btn-info btnsum">合计: 0</div>
            </div>

        </form>
    </div>
</div>

<table class="table table-hover tb_pay<?=$pay?>_vii">
    <thead>
    <tr>
        <th width="240px">开票人公司名称</th>
        <th width="240px">所属客户</th>
        <th width="90px">货款状态</th>
        <th width="140px" class="text-right">金额</th>
    </tr>
    </thead>
</table>

<script>
    var tb_<?=$pay?>_vii_dt
    $(function(){
        tb_<?=$pay?>_vii_dt = comm.dt({
            ele : $('.tb_pay<?=$pay?>_vii'),
            url : '/declares/vii/load_payin_page?' + $('.frm_pay<?=$pay?>_vii').serialize(),
            columns:['invoicer','customername','pay_amount','pay_amount'],
            columnDefs : [
                { aTargets:[2],
                    mRender:function(data,full){
                        if( full.pay_amount  > 0 ){
                            return `<span class="label bg-info-300" data-placement="right"  data-popup="tooltip-ellipsis" title="应付 ${comm.fMoney(full.pay_amount)} 元"> 应付 </span>`
                        }else if( full.pay_amount < 0 ){
                            return `<span class="label bg-orange-300" data-placement="right"  data-popup="tooltip-ellipsis" title="预付 ${comm.fMoney(0-full.pay_amount)} 元"> 预付 </span>`
                        }
                        return '--';
                    }
                },
                {
                    aTargets:[3],
                    mRender:function(data,full){
                        return `<div class="text-right">${comm.fMoney( data )}</div>`
                    }
                }
            ],
            drawCallback : function ( setting ) {
                $('.btnsum').text(`合计: ${setting.json.sum}`)
            }
        });
    });

    function load_vii_<?=$pay?>_data(n){
        tb_<?=$pay?>_vii_dt.fnReloadAjax('/declares/vii/load_payin_page?' + $('.frm_pay<?=$pay?>_vii').serialize());
    }
</script>
