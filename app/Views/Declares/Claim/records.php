<?php
$projectId = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
$customerId = (ckAuth()?session('custId'):(isset($_REQUEST['customerid'])?$_REQUEST['customerid']:0));
$is_has_receipt_claim_approve = ck_action('declares/claim/approve');
?>

<div class="panel">
    <div class="panel-body nav-search" style="padding: 2px">
        <div class="form-horizontal frm_receipt_claim_search" action="#">
            <div class="row">
                <div class="col-md-12">
                    <input name="customerid" type="hidden" value="<?=$customerId?>">
                    <input name="keys" class="form-control inline input-220" placeholder="输入查询 关键字">
                    <button class="btn btn-sm btn-success" type="button" onclick="load_receipt_claim_data()"><i class="icon icon-search4"></i> 查询</button>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-hover tb_receipt_claim">
        <thead>
        <tr>
            <th width="120px">业务编号</th>
            <th width="130px">付款人公司名称</th>
            <th width="100px">国家及地区</th>
            <th width="120px">付款银行</th>
            <th width="120px">银行账号</th>
            <th width="80px">币种</th>
            <th width="80px">计划付款金额</th>
            <th width="100px">计划付款时间</th>
            <th width="100px">所属客户</th>
            <th width="100px">申领时间</th>
            <th width="80px" class="text-right">操作</th>
        </tr>
        </thead>
    </table>
</div>


<script>
    var tb_receipt_claim ;
    $(function(){
        tb_receipt_claim = comm.dt({
            ele : $('.tb_receipt_claim'),
            size : 8,
            url : '/declares/claim/load_page?customerid=<?=$customerId?>&projectid=<?=$projectId?>',
            columns:['BusinessID', 'payername', 'payerregion', 'bank', 'bankaccount', 'currency', 'receiptamount', 'receiptdate', 'customername', 'createtime'],
            columnDefs : [
                { aTargets:[2],
                    mRender:function(data,full){
                        return comm.dictionary(__COUNTRY,data)
                    }
                },
                { aTargets:[10],
                    mRender:function(data,full){
                        var buttons = '<div class="text-right">';

                        if ( full.status == '0' ) {
                            <?php if (ckAuth()) :?>
                            buttons += `<a class="label bg-info-300">审核中</a> `;
                            <?php else: ?>
                                <?php if( $is_has_receipt_claim_approve ):?>
                                    buttons += `<a class="label bg-primary hModal" href="/declares/claim/approve?id=${full.id}&customerid=<?=$customerId?>&projectid=<?=$projectId?>" data-group="claim" data-call="load_receipt_claim_data" lang="收入申领审核"  data-text="审核通过"> 审核 </a> `;
                                <?php endif;?>
                            <?php endif;?>
                            buttons += `<a href="/declares/claim/cancel?id=${full.id}" onclick="return comm.confirmCTL(this.href,'确认取消申领?',(resp)=>{load_receipt_claim_data()})" class="label bg-orange">取消申领</a> `;
                            buttons += `<a href="/declares/claim/delete?id=${full.id}" onclick="return comm.confirmCTL(this.href,'确认删除该申领记录?',(resp)=>{load_receipt_claim_data()})" class="label bg-danger">删除</a> `;
                        }
                        if ( full.status == '1' ) {
                            buttons += `<a class="label bg-info-300">已审核</a> `;
                        }
                        buttons += '</div>';

                        return buttons;
                    }
                },
            ],
            drawCallback:function ( setting ) {
                var mGuid = localStorage.getItem('mGuid');
                setTimeout( ()=> {$('.dataTables_scrollBody').css('height','');$(`#${mGuid} .dataTables_scrollHeadInner,#${mGuid} .tb_receipt_claim`).css('width','')},50);
                $('[data-popup=tooltip-ellipsis]').tooltip();
            }
        });
        <?php if ( ckAuth()) :?>
        comm.visibleColumn(tb_receipt_claim,8,true);
        <?php endif;?>
    });

    function load_receipt_claim_data(){
        var keys = $('.frm_receipt_claim_search input[name=keys]').val();
        tb_receipt_claim.fnReloadAjax(`/declares/claim/load_page?customerid=<?=$customerId?>&projectid=<?=$projectId?>&keys=${keys}`);
    }
</script>
