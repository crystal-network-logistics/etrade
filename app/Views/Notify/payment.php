<?php
$is_has_payment_confirm = ck_action('declares/payment/confirm');
$is_has_payment_upload = ck_action('declares/payment/upload');
$is_has_payment_approve = ck_action('declares/payment/approve');
$is_has_payment_apply = ck_action('declares/payment/apply');
?>
<link href="/resource/assets/css/filesPlugin.css?_=<?php echo time()?>" type="text/css" rel="stylesheet"/>
<script src="/resource/app/filesPlugin.js?_=<?php echo time()?>"></script>

<table class="table table-hover NoticePayment">
    <thead>
    <tr>
        <th width="120px">客户名称</th>
        <th width="110px">业务单号</th>
        <th width="80px">付款日期</th>
        <th width="140px">收款人公司</th>
        <th width="120px">开户银行</th>
        <th width="120px">银行账号</th>
        <th width="80px">付款金额</th>
        <th width="80px">汇率</th>
        <th width="80px">折RMB</th>
        <th width="80px">状态</th>
        <th width="80px">支付类型</th>
        <th width="120px">消息</th>
        <th width="60px" class="text-right">操作</th>
    </tr>
    </thead>
</table>

<script>
    var pPaymentDt;

    TYPES = {
        '1':'开票人收款',
        '2':'物流收款',
        '3':'其他收款',
        '4':'系统收款',
        '5':'费用',
    };
    $(function(){
        pPaymentDt = comm.dt({
            ele : $('.NoticePayment'),
            url : '/message/notify/load_data/payment?' + $('.frm_search').serialize(),
            columns:['customername','BusinessID', 'paymentdate', 'receivername', 'bank', 'bankaccount', 'amount', 'exchangerate','id', 'status','type', 'message'],
            columnDefs:[
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        return `<a href="/declares/${(full.isentrance == 1)?'import':'project'}/view?id=${full.projectid}">${data}</a>`;
                    }
                },
                {
                    aTargets:[6],
                    mRender:function(data,full){
                        return (comm.fMoney(data));
                    }
                },
                {
                    aTargets:[7],
                    mRender:function(data,full){
                        <?php if ( $is_has_payment_approve ):?>
                        return (full.status == 0 && !data) ? (`<a href="/declares/payment/set_rate?id=${full.id}" onclick="return comm.doPrompt(this.href,{title:'请输入汇率',type:'number'},()=>{load_payment_data()})" class="text-primary" style="border-bottom: 1px dashed #2196f3;"> 设置汇率 </a>`) : data;
                        <?php endif;?>
                        return ( data > 0 && data ) ? comm.fMoney(data,0) : data
                    }
                },
                {
                    aTargets:[8],
                    mRender:function(data,full){
                        return (comm.fMoney(full.amount*(full.exchangerate?full.exchangerate:0)));
                    }
                },
                {
                    aTargets:[9],
                    mRender:function(data,full){
                        return comm.dictionary(__PAYMENTSTATUS,data);
                    }
                },

                {
                    aTargets:[5,3,4],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,145);
                    }
                },
                {
                    aTargets:[10],
                    mRender:function(data,full){
                        return TYPES[(full.type)];
                    }
                },
                {
                    aTargets:[12],
                    mRender:function(data,full){
                        var buttons = '<div class="text-right">';

                        <?php if( $is_has_payment_confirm ) :?>
                            if( (full.status==0) && full.exchangerate !='' && full.exchangerate != null )
                                buttons += ` <a href="/declares/payment/approve?id=${full.id}" class="label bg-success-300" onclick="return comm.confirmCTL(this.href,'是否确认操作?',(resp)=>{load_payment_data()})"> 确认 </a> `;
                        <?php endif;?>

                        <?php if( $is_has_payment_apply ) :?>
                            if( full.type != 4 && full.type != 5 && full.status == 1 && full.transfer == 0 )
                                buttons += ` <a href="/declares/payment/apply?id=${full.id}" class="label bg-success-300" onclick="return comm.confirmCTL(this.href,'确定申请该操作?',(resp)=>{load_payment_data()})"> 申请水单 </a> `;
                        <?php endif;?>


                        <?php if( $is_has_payment_upload ) :?>
                        if( full.type != 4 && full.type != 5 && full.status == 2 )
                            buttons += ` <a href="/declares/payment/upload?id=${full.id}" class="label bg-primary-300 hModal" data-call="load_payment_data">上传水单</a> `;
                        <?php endif;?>

                        if( full.type != 4 && full.type != 5 && full.status == 3 )
                            buttons += ` <a target="_blank" href="/declares/payment/viewdoc?id=${full.id}">查看水单 </a>`;

                        if( full.nt == 0 && full.status != 3 ) {
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
            load_payment_data();
        });
    });


    function load_payment_data(){
        pPaymentDt.fnReloadAjax('/message/notify/load_data/payment?' + $('.frm_search').serialize());
    }
</script>
