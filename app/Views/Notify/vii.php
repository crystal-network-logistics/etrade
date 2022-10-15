<?php
$is_has_vii_confirm = ck_action('declares/vii/confirm');

    // $isFinance = ckAuth('finance');
    //$isOperator = $auth->isHasRole('operator');
?>


<table class="table table-hover NoticeVii">
    <thead>
    <tr>
        <th width="100px">业务单</th>
        <th width="110px">中文品名</th>
        <th width="60px">数量</th>
        <th width="60px">单位</th>
        <th width="80px">开票金额</th>
        <th width="80px">退税率</th>
        <th width="140px">开票人公司名称</th>
        <th width="80px">状态</th>
        <th width="120px">备注</th>
        <th width="120px">消息</th>
        <th width="60px" class="text-right">操作</th>
    </tr>
    </thead>
</table>


<script type="text/javascript">
    var viiDT;
$(function(){
    viiDt = comm.dt({
        ele : $('.NoticeVii'),
        url : '/message/notify/load_data/vii?' + $('.frm_search').serialize(),
        columns:['BusinessID', 'productname', 'amount', 'unit', 'invoiceamount', 'taxreturnrate', 'invoicer', 'status', 'note', 'message'],
        columnDefs:[
            {
                aTargets:[0],
                mRender:function(data,full){
                    if(data)
                        return `<a href="/declares/${(full.isentrance == 1)?'import':'project'}/view?id=${full.projectid}">${data}</a>`;
                    return '--';
                }
            },
            {
                aTargets:[4],
                mRender:function(data,full){
                    return comm.fMoney(data);
                }
            },
            {
                aTargets:[6],
                mRender:function(data,full){
                    return comm.ellipsis(data,data,140);
                }
            },
            {
                aTargets:[7],
                mRender:function(data,full){
                    return comm.dictionary(__VIISTATUS,data);
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

                    <?php if(( $is_has_vii_confirm || ckAuth('finance')) && ckAuth(false) ) :?>
                        if((full.status == 1))
                            buttons += ` <a href="/declares/vii/confirm?id=${full.id}" class="label bg-success-300" onclick="return comm.confirmCTL(this.href,'是否审核通过?',( resp )=>{ load_vii_data(); })">确认</a> `;
                    <?php endif; ?>

                    <?php if( ckAuth() || ckAuth('operator')):?>
                    if((full.status == 2))
                        buttons += ` <a href="/declares/vii/accept?id=${full.id}" class="label bg-success-300" onclick="return comm.confirmCTL(this.href,'是否审核通过?',( resp )=>{ load_vii_data(); })">认可</a> `;
                    <?php endif;?>

                    if(full.status == 5) {
                        buttons += ` <a href="/declares/vii/viewvii?id=${full.id}" class="label bg-success-300">查看增票</a> `;
                    }

                    if(full.nt == 0 && full.status != 5){
                        buttons += ` <a href="/message/notify/delete?id=${full.noticeid}" onclick="return comm.confirmCTL(this.href,'确认查看 操作?',(resp)=>{load_payment_data()})" class="label bg-primary-300">确认查看</a> `;
                    }
                    buttons += '</div>';
                    return buttons;
                }
            }
        ]
    });
    $('.search').click(function(){
        load_vii_data();
    });
});

function load_vii_data(){
    viiDt.fnReloadAjax('/message/notify/load_data/vii?' + $('.frm_search').serialize());
}
</script>
