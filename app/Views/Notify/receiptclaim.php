<?php
    $is_has_approve = ck_action('declares/claim/approve');
?>
<table class="table table-hover NoticeReceiptClaim">
        <thead>
        <tr>
            <th width="160px">业务编号</th>
            <th width="210px">付款人公司名称</th>
            <th width="140px">国家及地区</th>
            <th width="120px">付款银行</th>
            <th width="120px">银行账号</th>
            <th width="100px">币种</th>
            <th width="100px">付款金额</th>
            <th width="100px">付款时间</th>
            <th width="130px">所属客户</th>
            <th width="120px">申领时间</th>
            <th width="120px">消息</th>
            <th width="80px">操作</th>
        </tr>
        </thead>
    </table>

    <script>
    $(function(){
        mReceiptClaimDt = comm.dt({
            ele : $('.NoticeReceiptClaim'),
            url : '/message/notify/load_data/receiptclaim?' + $('.frm_search').serialize(),
            columns:['BusinessID', 'payername', 'payerregion', 'bank', 'bankaccount', 'currency', 'receiptamount', 'receiptdate', 'customername', 'createtime', 'message'],
            columnDefs:[
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        if(data) {
                            return `<a href="/declares/${(full.isentrance == 1)?'import':'project'}/view?id=${full.projectid}">${data}</a>`;
                        }else{
                            return '';
                        }
                    }
                },
                {
                    aTargets:[2],
                    mRender:function(data,full){
                        return comm.dictionary(__COUNTRY,data);
                    }
                },
                {
                    aTargets:[6],
                    mRender:function(data,full){
                        return comm.fMoney(data,2);
                    }
                },
                {
                    aTargets:[11],
                    mRender:function(data,full){
                        if(full.status == 0) {
                            <?php if ( $is_has_approve ):?>
                                return `<div class="text-right"> <a href="/declares/claim/approve?id=${full.id}" class="label bg-primary-300 hModal" data-text="审核通过" data-call="load_receipt_claim_data"> 审核 </a> </div>`;
                            <?php else :?>
                                return '--';
                            <?php endif;?>
                        }else if(full.status == 1){
                            return `<span class="label bg-success-300">已审核</span>`;
                        }else{
                            return `<span class="label bg-grey-300">已取消</span>`;
                        }
                    }
                }
            ],drawCallback : function ( setting ){
                $.each(setting.json.badge,function (k,v){$(`.badge_${k}`).text(v);});
            }
        });

        $('.search').click(function(){
            load_receipt_claim_data();
        });
    });

    function load_receipt_claim_data(){
        mReceiptClaimDt.fnReloadAjax('/message/notify/load_data/receiptclaim?' + $('.frm_search').serialize());
    }
</script>
