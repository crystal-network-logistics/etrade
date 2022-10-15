<?php
    $is_has_update = ck_action('declares/claim/update');
    $is_has_cancel = ck_action('declares/claim/cancel');
    $is_has_delete = ck_action('declares/claim/delete');
    $is_has_approve= ck_action('declares/claim/approve');
?>
<div class="panel" style="border-color: #fff;margin-bottom: 0px;border-bottom: 1px solid #eee;">
    <div class="panel-body nav-search" style="padding: 5px 20px">
        <form class="form-horizontal frm_receipt_claim">
            <input name="flag" value="0" type="hidden">
            <div class="col-md-12 text-right">

                <?php if ( ckAuth(false) ):?>
                    <?=\App\Libraries\LibComp::get_customer([ 'name' => 'customerid','class' => 'select inline selects-320'])?>
                <?php else :?>
                    <input name="customerid" value="<?=ckAuth()?session('custId'):(isset( $_REQUEST['customerid'] ) ? $_REQUEST['customerid'] : '')?>" type="hidden">
                <?php endif;?>

                <input type="text" class="form-control inline input-220" name="keys" placeholder="付款人公司名称,付款银行,银行账号" value="">&nbsp;

                <button type="button" class="btn btn-primary search" onclick="load_receipt_claim_data(0);"><i class="icon icon-search4"></i> 查询</button>
            </div>
        </form>
    </div>
</div>

<table class="table table-hover tb_receipt_claim">
    <thead>
    <tr>
        <th width="100px">业务编号</th>
        <th width="200px">付款人公司名称</th>
        <th width="90px">国家地区</th>
        <th width="110px">付款银行</th>
        <th width="110px">银行账号</th>
        <th width="80px">币种</th>
        <th width="110px">计划付款金额</th>
        <th width="100px">计划付款时间</th>
        <th width="120px">所属客户</th>
        <th width="120px">申领时间</th>
        <th width="80px" class="text-right">操作</th>
    </tr>
    </thead>
</table>

<script>
    var tb_receipt_claimdt
    $(function(){
        tb_receipt_claimdt = comm.dt({
            ele : $('.tb_receipt_claim'),
            url : '/declares/claim/load_page?'+ $('.frm_receipt_claim').serialize(),
            columns:['BusinessID', 'payername', 'payerregion', 'bank', 'bankaccount', 'currency', 'receiptamount', 'receiptdate', 'customername', 'createtime'],
            columnDefs  : [
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        if ( data )
                            return `<a href="/declares/${(full.isentrance == '1' ? 'import' : 'project')}/view?id=${full.projectid}" target="_blank">${data}</a>`;
                        return '';
                    }
                },
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,140);
                    }
                },
                {
                    aTargets:[8],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,110,'left');
                    }
                },
                {
                    aTargets:[3,4],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,100);
                    }
                },
                {
                    aTargets:[2],
                    mRender:function(data,full){
                        var text = comm.dictionary(__COUNTRY,data);
                        return comm.ellipsis(text,text,90);
                    }
                },
                {
                    aTargets:[6],
                    mRender:function(data,full){
                        return comm.fMoney(data,2);
                    }
                }                ,
                {
                    aTargets:[10],
                    mRender:function(data,full){
                        if(full.status == 0) {
                            var html = ` <div class="text-right">
                                <?php if ( $is_has_update && ckAuth() ):?>
                                     <a href="/declares/claim/update?id=${full.id}" class="label bg-primary-300 hModal" data-text="保存" data-call="loadc_receipt_claim_data"> 编辑 </a>
                                <?php elseif( $is_has_approve ) :?>
                                     <a href="/declares/claim/approve?id=${full.id}" class="label bg-primary-300 hModal" data-text="审核通过" data-call="loadc_receipt_claim_data"> 审核 </a>
                                <?php endif;?>

                                <?php if ( $is_has_cancel ):?>
                                    <a href="/declares/claim/cancel?id=${full.id}" class="label bg-grey-300" onclick="return comm.confirmCTL(this.href,'确定取消申领?',(resp)=>{loadc_receipt_claim_data()})"> 取消 </a>
                                <?php endif;?>

                                <?php if ( $is_has_delete ):?>
                                    <a href="/declares/claim/delete?id=${full.id}" class="label bg-danger-300" onclick="return comm.confirmCTL(this.href,'确定删除申领?',(resp)=>{loadc_receipt_claim_data()})"> 删除 </a>
                                <?php endif;?>
                            </div>`;

                            return html + '</div>';
                        }
                        return '<div class="text-right">' +( full.status == 1 ? '<span class="label bg-success-300"> 已审核 </span>' : '<span class="label bg-grey"> 已取消 </span>' ) + '</div>'
                    }
                }
            ],
            drawCallback:function ( setting ) {
            }
        });

        <?php if ( ckAuth() ):?>
            comm.visibleColumn(tb_receipt_claimdt,[8],false);
        <?php endif;?>
    });

    function load_receipt_claim_data(n){
        var input = $('.frm_receipt_claim input[name=flag]'),num = input.val();
        if ( (n == 1 && num == 0) || n == 0 ) {
            input.val(n?n:0);
            tb_receipt_claimdt.fnReloadAjax('/declares/claim/load_page?' + $('.frm_receipt_claim').serialize());
        }
    }

</script>
