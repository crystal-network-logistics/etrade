<?php
$is_has_receipt_upfiles = ck_action('declares/receipt/upfiles');
$is_has_receipt_viewdoc = ck_action('declares/receipt/viewdoc');

?>

<table class="table table-hover NoticeReceipt">
    <thead>
    <tr>
        <th width="120px">客户名称</th>
        <th width="110px">业务单</th>
        <th width="110px">收款日期</th>
        <th width="140px">付款人</th>
        <th width="90px">金额</th>
        <th width="80px">汇率</th>
        <th width="80px">折RMB</th>
        <th width="120px">用途</th>
        <th width="120px">备注</th>
        <th width="80px">消息</th>
        <th width="60px" class="text-right">操作</th>
    </tr>
    </thead>
</table>

<script>
$(function(){
    pReceiptDt = comm.dt({
        ele : $('.NoticeReceipt'),
        url :'/message/notify/load_data/receipt?' + $('.frm_search').serialize(),
        columns:['customername','BusinessID', 'receiptdate', 'payername', 'amount', 'exchangerate','id', 'usage','note', 'message'],
        columnDefs:[
            {
                aTargets:[1],
                mRender:function(data,full){
                    if(data) {
                        return `<a href="/declares/${(full.isentrance == 1)?'import':'project'}/view?id=${full.projectid}">${data}</a>`;
                    }

                    if(full.approved == 1)
                        return `<a href="/declares/capital/unc_balance?customerid=${full.customerid}" class="hModal" data-size="lg" data-yes="n" lang="${full.customername} -- 未分配">未分配</a>`;
                    else
                        return '';
                }
            },
            {
                aTargets:[4],
                mRender:function(data,full){
                    return comm.fMoney(full.amount);
                }
            },
            {
                aTargets:[6],
                mRender:function(data,full){
                    return (comm.fMoney(full.amount*full.exchangerate));
                }
            },
            {
                aTargets:[7],
                mRender:function(data,full){
                    return comm.dictionary(__USAGE,data) ;
                }
            },
            {
                aTargets:[3,8],
                mRender:function(data,full){
                    return comm.ellipsis(data,data,125);
                }
            },
            {
                aTargets:[9],
                mRender:function(data,full){
                    return  `<div class="text-muted">${full.message}</div>`;
                }
            },
            {
                aTargets:[10],
                mRender:function(data,full){
                    var buttons = '<div class="text-right">';

                    <?php if( ckAuth('finance') ||  ckAuth('admin') || ckAuth('sa')) :?>
                        if((full.status == 0 || full.status == 1 || full.status == 2) && full.approved == 0)
                            html += `<a href="/declares/receipt/approve?id=${full.id}" class="label bg-primary-300" onclick="return comm.confirmCTL(this.href,'是否审核通过?',(resp)=>{load_income_data()})">审核</a> `;
                    <?php endif; ?>

                    <?php if(ckAuth()) :?>
                        if((full.status == 1 || full.status == 2) && full.approved == 1 && full.transfer == 0 && full.usage != 3)
                            buttons += ` <a href="/declares/receipt/apply?id=${full.id}" class="label bg-info-300" onclick="return comm.confirmCTL(this.href,'确认申请查看水单',(resp)=>{load_receipts_data()})"> 申请水单 </a> `;
                    <?php endif;?>

                    <?php if( $is_has_receipt_upfiles ): ?>
                        if(full.status == 3  && full.usage != 3)
                            buttons += ` <a href="/declares/receipt/upfiles?id=${full.id}" class="label bg-success-300 hModal" data-call="load_receipts_data"> 上传水单 </a> `;
                    <?php endif;?>

                    <?php if( $is_has_receipt_viewdoc ) :?>
                        if(full.status == 4  && full.usage != 3)
                            buttons += ` <a href="/declares/receipt/viewdoc?id=${full.id}" class="label bg-success-300" target="_blank"> 查看水单 </a> `;
                    <?php endif;?>

                    if(full.nt == 0 && full.status != 4 ){
                        buttons += ` <a href="/message/notify/delete?id=${full.noticeid}" onclick="return comm.confirmCTL(this.href,'确认查看 操作?',(resp)=>{load_payment_data()})" class="label bg-primary-300">确认查看</a> `;
                    }
                    buttons += '</div>';

                    return buttons;
                }
            }
        ],drawCallback : function ( setting ){
            $.each(setting.json.badge,function (k,v){$(`.badge_${k}`).text(v);});
            <?php if ( ckAuth() ): ?>
                comm.visibleColumn(dtproducts, 0, false);
            <?php endif;?>
        }
    });
    $('.search').click(function(){
        load_receipt_data();
    });
});

function load_receipt_data(){
    pReceiptDt.fnReloadAjax('/message/notify/load_data/receipt?' + $('.frm_search').serialize());
}
</script>
