<?php
$is_has_paymentcl_approve = ck_action('declares/paymentcl/approve');
?>


    <table class="table table-hover NoticePaymentcl">
        <thead>
        <tr>
            <th width="110px">业务单号</th>
            <th width="80px">付款日期</th>
            <th width="140px">收款人公司</th>
            <th width="120px">开户银行</th>
            <th width="120px">银行账号</th>
            <th width="80px">付款金额</th>
            <th width="80px">汇率</th>
            <th width="80px">折RMB</th>
            <th width="80px">状态</th>
            <th width="120px">消息</th>
            <th width="60px" class="text-right">操作</th>
        </tr>
        </thead>
    </table>

<script>
    $(function(){
        clPaymentDt = comm.dt({
            ele : $('.NoticePaymentcl'),
            url : '/message/notify/load_data/paymentcl?' + $('.frm_search').serialize(),
            columns:['BusinessID', 'paymentdate', 'receivername', 'bank', 'bankaccount', 'amount', 'exchangerate','id', 'status', 'message'],
            columnDefs:[
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        return `<a href="/declares/${(full.isentrance == 1)?'import':'project'}/view?id=${full.projectid}">${data}</a>`;
                    }
                },
                {
                    aTargets:[5],
                    mRender:function(data,full){
                        return (comm.fMoney(data));
                    }
                },
                {
                    aTargets:[6],
                    mRender:function(data,full){
                        <?php if ( $is_has_paymentcl_approve ):?>
                        return (full.status == 0 && !data) ? (`<a href="/declares/paymentcl/set_rate?id=${full.id}" onclick="return comm.doPrompt(this.href,{title:'请输入汇率',type:'number'},()=>{load_paymentcl_data()})" class="text-primary" style="border-bottom: 1px dashed #2196f3;"> 设置汇率 </a>`) : data;
                        <?php endif;?>
                        return ( data > 0 && data ) ? comm.fMoney(data,0) : data
                    }
                },
                {
                    aTargets:[7],
                    mRender:function(data,full){
                        return (comm.fMoney(full.amount*(full.exchangerate?full.exchangerate:0)));
                    }
                },
                {
                    aTargets:[8],
                    mRender:function(data,full){
                        return comm.dictionary(__PAYMENTSTATUS,data);
                    }
                },

                {
                    aTargets:[2,3,4],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,145);
                    }
                },
                {
                    aTargets:[10],
                    mRender:function(data,full){
                        var buttons = '<div class="text-right">';

                        <?php if( $is_has_paymentcl_approve ) {?>
                        if((full.status==0) && full.exchangerate !='' && full.exchangerate != null) {
                            buttons += `<a href="/declares/paymentcl/approve?id=${full.id}" class="label bg-success-300" onclick="return comm.confirmCTL(this.href,'是否确认操作?',(resp)=>{load_paymentcl_data()})"> 确认 </a> `;
                        }
                        <?php }?>

                        if(full.nt == 0 && full.status != 3){
                            buttons += ` <a href="/message/notify/delete?id=${full.noticeid}" onclick="return comm.confirmCTL(this.href,'确认查看 操作?',(resp)=>{load_payment_data()})" class="label bg-primary-300">确认查看</a> `;
                        }
                        buttons += '</div>';

                        return buttons;
                    }
                }
            ],drawCallback : function ( setting ){
                $.each(setting.json.badge,function (k,v){$(`.badge_${k}`).text(v);});
            }
        });
    });
    function load_paymentcl_data(){
        clPaymentDt.fnReloadAjax('/message/notify/load_data/paymentcl?' + $('.frm_search').serialize());
    }
</script>
