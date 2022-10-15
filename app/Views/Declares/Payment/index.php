<?=script_tag('uploads/js/__PAYMENTSTATUS.js')?>
<?php
$isentrance = $project?$project['isentrance']:(isset($_REQUEST['isentrance']) ? $_REQUEST['isentrance'] : 0);

$is_has_payment_create = ck_action('declares/payment/create');
$is_has_payment_rollcopy = ck_action('declares/payment/rollcopy');
$is_has_payment_upload = ck_action('declares/payment/upload');
$is_has_payment_approve = ck_action('declares/payment/approve');
$is_has_payment_apply = ck_action('declares/payment/apply');
$is_has_payment_delete = ck_action('declares/payment/delete');

$is_has_confirm_payment_con = confirm_payment( $data );
// 确认付清
$is_has_confirm_payment = ck_action('declares/project/confirm_payment');
?>
<div class="content">
    <div class="panel">
        <table class="table table-hover tb_project_payment">
            <thead>
            <tr>
                <th width="100px">付款日期</th>
                <th width="140px">收款人公司名称</th>
                <th width="120px">开户银行</th>
                <th width="100px">银行账号</th>
                <th width="60px">币种</th>
                <th width="80px">付款金额</th>
                <th width="80px">汇率</th>
                <th width="80px">折RMB</th>
                <th width="100px">货款状态</th>
                <th width="100px">状态</th>
                <th width="120px">备注</th>
                <th width="60px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>
    <div>

        <?php if( $project['paymentstatus'] == 0 && $project['status'] != 2 && $is_has_payment_create ): ?>
            <a class="btn bg-<?=$project['isentrance']?'indigo-300':'primary'?> hModal" href="/declares/payment/create?projectid=<?=$project['ID']?>&customerid=<?=$project['customerid']?>&isentrance=<?=$isentrance?>" data-call="load_payment_data"><i class="icon icon-add"></i> 新增支付 </a>
        <?php endif;?>
        
        <?php if( $is_has_confirm_payment && $is_has_confirm_payment_con ) :?>
            <a class="btn btn-success" href="/declares/project/confirm_payment?id=<?=$project['ID']?>"
               onclick="return comm.confirmCTL(this.href,'是否确认付清?',(resp)=>{ if( resp.code ) {setTimeout(()=>{window.location.reload()},3000);} else {_confirm(resp.msg);}})">
                确认付清
            </a>
        <?php endif;?>

    </div>
</div>
<script>
    var tbpayment;
    $(function(){
        tbpayment = comm.dt({
            ele : $('.tb_project_payment'),
            url : "/declares/payment/load_page?id=<?=$project['ID']?>",
            paging : false,
            bInfo:false,
            columns:['approvedt','receivername','bank','bankaccount','currency','amount','exchangerate',null,'paystatus','status','note'],
            columnDefs : [
                { aTargets:[1,2],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,140)
                    }
                },{ aTargets:[3],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,100)
                    }
                },
                { aTargets:[5],
                    mRender:function(data,full){
                        return data > 0 ? comm.fMoney(data,0) : data
                    }
                },
                { aTargets:[6],
                    mRender:function(data,full){
                        <?php if ( $is_has_payment_approve ):?>
                            return (full.status == 0 && !data) ? (`<a href="/declares/payment/set_rate?id=${full.id}" onclick="return comm.doPrompt(this.href,{title:'请输入汇率',type:'number'},()=>{load_payment_data()})" class="text-primary" style="border-bottom: 1px dashed #2196f3;"> 设置汇率 </a>`) : data;
                        <?php endif;?>
                        return ( data > 0 && data ) ? comm.fMoney(data,0) : data
                    }
                },
                { aTargets:[7],
                    mRender:function(data,full){
                        return (comm.fMoney( full.amount * full.exchangerate ));
                    }
                },
                {
                    aTargets:[8],
                    mRender:function(data,full){
                        if(full.paystatus == '其他' || full.paystatus  == '物流' || full.paystatus  == '费用'){
                            return `<span class="label bg-indigo-300">${full.paystatus}</span>`;
                        }else if( full.paystatus  > 0 ){
                            return `<span class="label bg-success-300" data-placement="right"  data-popup="tooltip-ellipsis" title="应付${comm.fMoney(full.paystatus)}元">应付</span>`
                        }else if( full.paystatus < 0 ){
                            return `<span class="label bg-orange-300" data-placement="right"  data-popup="tooltip-ellipsis" title="预付${comm.fMoney(-full.paystatus)}元">预付</span>`
                        }else if( full.paystatus === "0" || full.paystatus === 0 ){
                            return '<span  class="label bg-info-300" data-placement="right"  data-popup="tooltip-ellipsis" title="增票与付款金额一致">一致</span>'
                        }
                        return '--';
                    }
                },
                { aTargets:[9],
                    mRender:function(data,full){
                        return comm.dictionary(__PAYMENTSTATUS,data)
                    }
                },
                { aTargets:[10],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,120,'left')
                    }
                },
                {
                    aTargets:[11],
                    mRender:function(data,full){
                        var buttons = '';
                        <?php if( $project['status'] != 2 ): ?>
                        
                            <?php if ( $is_has_payment_create ):?>
                                if( full.status == 0 && full.type != 4 && full.type != 5 && full.amount > 0 )
                                    buttons += `<a href="/declares/payment/create?id=${full.id}" class="label bg-primary hModal" data-call="load_payment_data"> 编辑 </a> `;
                            <?php endif;?>

                            <?php if ( $is_has_payment_approve ): ?>
                                if( ( full.status==0 ) && full.exchangerate != '' && full.exchangerate != null )
                                    buttons += `<a href="/declares/payment/approve?id=${full.id}" class="label bg-success-300" onclick="return comm.confirmCTL(this.href,'是否确认操作?',(resp)=>{load_payment_data()})"> 确认 </a> `;
                            <?php endif;?>

                            <?php if ( $is_has_payment_rollcopy ): ?>
                                if( full.status != 0 && full.type != '4' && full.type != '5' && full.amount > 0)
                                    buttons += ` <a href="/declares/payment/rollcopy?id=${full.id}" class="label bg-primary-300 hModal"  data-call="load_payment_data">转出</a> `;
                            <?php endif; ?>

                            <?php if( $is_has_payment_apply || ($project['customerid'] == session('custId')) ): ?>
                                if( full.type != 4 && full.type != 5 && full.status == 1 && full.amount > 0 )
                                    buttons += ` <a href="/declares/payment/apply?id=${full.id}" class="label bg-success-300" onclick="return comm.confirmCTL(this.href,'确定申请该操作?',(resp)=>{load_payment_data()})"> 申请水单 </a>`;
                            <?php endif;?>


                            <?php if( $is_has_payment_upload ) :?>
                                if(full.type != 4 && full.type != 5 && full.status == 2 && full.amount > 0 )
                                    buttons += ` <a href="/declares/payment/upload?id=${full.id}" class="label bg-primary-300 hModal" data-call="load_payment_data">上传水单</a> `;
                            <?php endif; ?>

                        <?php endif;?>

                        if( full.status > 0 && full.type != 4 && full.type != 5 && full.exchangerate && full.amount > 0 )
                            buttons += ` <a target="_blank" href="/declares/payment/viewdoc?id=${full.id}" class="label bg-success-300">查看水单</a> `;

                        <?php if($is_has_payment_delete) :?>
                            buttons += ` <a href="/declares/payment/delete?id=${full.id}" class="label bg-danger-300" onclick="return comm.confirmCTL(this.href,'确认删除该条记录?',(resp)=>{load_payment_data()})">删除</a>`;
                        <?php endif;?>

                        return `<div class="text-right">${buttons}</div>`;
                    }
                },
            ]
        });
    });
    function load_payment_data(){
        tbpayment.fnReloadAjax("/declares/payment/load_page?id=<?=$project['ID']?>");
    }
    // 确认付清
    function _confirm(msg){
        var notice = new PNotify({
            title: '付清提醒',
            text: msg,
            hide: false,
            type: 'warning',
            confirm: {confirm: true,buttons: [{text: '是',addClass: 'btn-sm'},{text: '否',addClass: 'btn-sm'}]},
            buttons: {closer: false,sticker: false},
            history: {history: false}
        });
        notice.get().on('pnotify.confirm', function() {
            comm.confirmCTL('/declares/project/transform_payment?id=<?=$project['ID']?>',msg,(res)=>{
                if (res.code) {
                    setTimeout(function () {
                        window.location.reload();
                    }, 3000);
                }
            });
        });
        notice.get().on('pnotify.cancel', function() {});
    }
</script>
