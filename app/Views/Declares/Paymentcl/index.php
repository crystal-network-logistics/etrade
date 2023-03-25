<?=script_tag('uploads/js/__PAYMENTSTATUS.js')?>
<?php
$isentrance = $project?$project['isentrance']:(isset($_REQUEST['isentrance']) ? $_REQUEST['isentrance'] : 0);

$is_has_payment_create = ck_action('declares/paymentcl/create');
$is_has_payment_rollcopy = ck_action('declares/paymentcl/rollcopy');
$is_has_payment_approve = ck_action('declares/paymentcl/approve');
$is_has_payment_delete = ck_action('declares/paymentcl/delete');

// 确认付清
$is_has_confirm_paymentcl = ck_action('declares/project/confirm_paymentcl');
?>
<div class="content">
    <div class="panel">
        <table class="table table-hover tb_projectcl_payment">
            <thead>
            <tr>
                <th width="90px">付款日期</th>
                <th width="140px">收款人公司名称</th>
                <th width="120px">开户银行</th>
                <th width="120px">银行账号</th>
                <th width="60px">币种</th>
                <th width="60px">付款金额</th>
                <th width="80px">汇率</th>
                <th width="80px">折RMB</th>
                <th width="80px">状态</th>
                <th width="120px">备注</th>
                <th width="60px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>

    <div>
        <?php if( $project['paymentstatus'] == 0 && $project['status'] != 2 && $is_has_payment_create ): ?>
            <a class="btn bg-<?=!$project['isentrance']?'indigo-300':'primary'?> hModal" href="/declares/paymentcl/create?projectid=<?=$project['ID']?>&customerid=<?=$project['customerid']?>&isentrance=<?=$isentrance?>" data-call="load_paymentcl_data"><i class="icon icon-add"></i> 新增成本支付 </a>
        <?php endif;?>

        <?php if( $is_has_confirm_paymentcl
            //&& confirm_payment( $data )
        ) :?>
            <a class="btn btn-success" href="/declares/project/confirm_paymentcl?id=<?=$project['ID']?>"
               onclick="return comm.confirmCTL(this.href,'是否确认付清?',(resp)=>{ if( resp.code ) {setTimeout(()=>{window.location.reload()},3000);} else {_confirm(resp.msg);}})">
                成本确认付清</a>
        <?php endif;?>
    </div>
</div>
<script>
    var tbpaymentcl;
    $(function(){
        tbpaymentcl = comm.dt({
            ele : $('.tb_projectcl_payment'),
            url : "/declares/paymentcl/load_page?id=<?=$project['ID']?>",
            paging : false,
            bInfo:false,
            columns:['paymentdate','receivername','bank','bankaccount','currency','amount','exchangerate',null,'status','note'],
            columnDefs : [
                { aTargets:[1,2],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,140)
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
                            return (full.status == 0 && !data) ? (`<a href="/declares/paymentcl/set_rate?id=${full.id}" onclick="return comm.doPrompt(this.href,{title:'请输入汇率',type:'number'},()=>{load_paymentcl_data()})" class="text-primary" style="border-bottom: 1px dashed #2196f3;"> 设置汇率 </a>`) : data;
                        <?php endif;?>
                        return ( data > 0 && data ) ? comm.fMoney(data,0) : data
                    }
                },
                { aTargets:[7],
                    mRender:function(data,full){
                        return (comm.fMoney( full.amount * full.exchangerate ));
                    }
                },
                { aTargets:[8],
                    mRender:function(data,full){
                        return comm.dictionary(__PAYMENTSTATUS,data)
                    }
                },
                { aTargets:[9],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,120,'left')
                    }
                },

                {
                    aTargets:[10],
                    mRender:function(data,full){
                        var buttons = '';
                        <?php if( $project['status'] != 2 ): ?>

                            <?php if ( $is_has_payment_create ):?>
                            if(full.status == 0 && full.type != 4 && full.type != 5 && full.amount > 0) buttons += `<a href="/declares/paymentcl/create?id=${full.id}" class="label bg-primary hModal" data-call="load_paymentcl_data"> 编辑 </a> `;
                            <?php endif;?>

                            <?php if ( $is_has_payment_approve ): ?>
                            if( ( full.status==0 ) && full.exchangerate != '' && full.exchangerate != null)
                                buttons += `<a href="/declares/paymentcl/approve?id=${full.id}" class="label bg-success-300" onclick="return comm.confirmCTL(this.href,'是否确认操作?',(resp)=>{load_paymentcl_data()})"> 确认 </a> `;
                            <?php endif;?>

                            <?php if ( $is_has_payment_rollcopy ): ?>
                            if( full.status != 0 && full.type != '4' && full.type != '5' && full.amount > 0 )
                                buttons += ` <a href="/declares/paymentcl/rollcopy?id=${full.id}" class="label bg-primary-300 hModal"  data-call="load_paymentcl_data">转出</a> `;
                            <?php endif; ?>

                        <?php endif;?>

                        <?php if($is_has_payment_delete) :?>
                            buttons += ` <a href="/declares/paymentcl/delete?id=${full.id}" class="label bg-danger-300" onclick="return comm.confirmCTL(this.href,'确认删除该条记录?',(resp)=>{load_paymentcl_data()})">删除</a>`;
                        <?php endif;?>

                        return `<div class="text-right">${buttons}</div>`;
                    }
                },
            ],
        });
    });
    function load_paymentcl_data(){
        tbpaymentcl.fnReloadAjax("/declares/paymentcl/load_page?id=<?=$project['ID']?>");
    }
</script>
