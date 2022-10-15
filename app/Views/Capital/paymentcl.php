<?php
$is_has_create = ck_action('declares/paymentcl/create');
$is_has_update = ck_action('declares/paymentcl/update');
$is_has_delete = ck_action('declares/paymentcl/delete');

$is_has_payment_approve = ck_action('declares/paymentcl/approve');

?>

<!-- Content area -->
<div class="content">
    <div class="panel panel-flat" style="margin-bottom: 2px;">

        <div class="panel-body nav-search" style="padding: 10px 20px;">
            <form action="#" class="form-horizontal frm_paymentcl">
                <div class="col-md-12">
                    <?=\App\Libraries\LibComp::get_customer([ 'name' => 'customerid','class' => 'select inline selects-220'])?>
                    <input type="text" class="form-control inline input-420" name="keys" placeholder="收款人,开户银行,收款帐号" value="">&nbsp;
                    <button type="button" class="btn btn-primary search" id="btn_search" onclick="load_paymentcl_data();"><i class="icon icon-search4"></i> 查询</button>
                    <?php if($is_has_create):?>
                        <a class="btn btn-success hModal" href="/declares/paymentcl/create" id="btnCreate"> <i class="icon icon-add"></i> 新增 </a> &nbsp;
                    <?php endif;?>
                </div>
            </form>
        </div>

        <table class="table table-hover tb_paymentcl">
            <thead>
            <tr>
                <th width="120px">业务编号</th>
                <th width="110px">付款日期</th>
                <th width="140px">收款人公司名称</th>
                <th width="120px">开户银行</th>
                <th width="120px">银行账号</th>
                <th width="70px">币种</th>
                <th width="80px">付款金额</th>
                <th width="80px">汇率</th>
                <th width="80px">折RMB</th>
                <th width="100px">状态</th>
                <th width="120px">备注</th>
                <th  width="60px">操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<?=script_tag('uploads/js/__COUNTRY.js')?>
<?=script_tag('uploads/js/__PAYMENTSTATUS.js')?>

<script type="text/javascript">
    var dtpaymentcl ;
    $(function(){
        dtpaymentcl = comm.dt({
            ele:$('.tb_paymentcl'),
            url:'/declares/paymentcl/load_page/to?'+$('.frm_paymentcl').serialize(),
            columns:['BusinessID', 'paymentdate', 'receivername', 'bank', 'bankaccount', 'currency', 'amount', 'exchangerate', 'status', 'note'],
            columnDefs:[
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        if(data) return `<a target="_blank" href="/declares/${full.isentrance==0?'project':'import' }/view?id=${full.projectid}">${data}</a>`;
                        return '';
                    }
                },
                {
                    aTargets:[2,3,4],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,120);
                    }
                },
                { aTargets:[7],
                    mRender:function(data,full){
                        <?php if ( $is_has_payment_approve ):?>
                            return (full.status == 0 && !data) ? (`<a href="/declares/paymentcl/set_rate?id=${full.id}" onclick="return comm.doPrompt(this.href,{title:'请输入汇率',type:'number'},()=>{load_paymentcl_data()})" class="text-primary" style="border-bottom: 1px dashed #2196f3;"> 设置汇率 </a>`) : data;
                        <?php endif;?>

                        return ( data > 0 && data ) ? comm.fMoney(data,0) : data
                    }
                },
                {
                    aTargets:[6],
                    mRender:function(data,full){
                        return (comm.fMoney(full.amount));
                    }
                },
                {
                    aTargets:[8],
                    mRender:function(data,full){
                        return (comm.fMoney(full.amount*full.exchangerate));
                    }
                },
                {
                    aTargets:[9],
                    mRender:function(data,full){
                        return comm.dictionary(__PAYMENTSTATUS, full.status );
                    }
                },
                {
                    aTargets:[10],
                    mRender:function(data,full){
                        return comm.ellipsis( data , data , 'left',120 );
                    }
                }
                ,
                {
                    aTargets:[11],
                    mRender:function(data,full){
                        var html = '';

                        <?php if ( $is_has_payment_approve ): ?>
                        if( ( full.status==0 ) && full.exchangerate != '' && full.exchangerate != null)
                            buttons += `<a href="/declares/paymentcl/approve?id=${full.id}" class="label bg-success-300" onclick="return comm.confirmCTL(this.href,'是否确认操作?',(resp)=>{load_paymentcl_data()})"> 确认 </a> `;
                        <?php endif;?>

                        <?php if ( $is_has_delete ) : ?>
                            html += `<a href="/declares/paymentcl/delete?id=${full.id}" class="label bg-danger-300" onclick="return comm.confirmCTL(this.href,'确认删除?',()=>{load_paymentcl_data()})">删除</a>`;
                        <?php endif; ?>

                        return html;
                    }
                }
            ]
        });
    });

    function load_paymentcl_data(){
        dtpaymentcl.fnReloadAjax('/declares/paymentcl/load_page/to?'+$('.frm_paymentcl').serialize());
    }
</script>
