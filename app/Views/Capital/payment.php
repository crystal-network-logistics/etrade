<?php
    $is_has_receipt_delete = ck_action('declares/payment/delete');
    $is_has_payment_approve = ck_action('declares/payment/approve');

?>
<div class="content div_payment">
    <div class="panel panel-flat">
        <div class="panel-body" style="padding: 10px 20px">
            <div class="tabbable">
                <ul class="nav nav-pills nav-pills-toolbar text-center nav-xs" style="margin-bottom: 0px">
                    <li class="active"><a href="#" data-toggle="tab" data-info=""> 全部支付</a></li>
                    <li><a href="#" data-toggle="tab" data-info="1"> 货款支付 </a></li>
                    <li><a href="#" data-toggle="tab" data-info="2"> 运费支付 </a></li>
                    <li><a href="#" data-toggle="tab" data-info="4"> 费用支付 </a></li>
                    <li><a href="#" data-toggle="tab" data-info="3"> 其它支付 </a></li>
                </ul>
            </div>
            <form class="form-horizontal frm_payment nav-search" style="margin-top: 5px;">
                <input type="hidden" name="type" id="sel_type">
                <div class="col-md-12 text-right">
                    <?php if ( ckAuth(false) ):?>
                        <?=\App\Libraries\LibComp::get_customer([ 'name' => 'customerid','class' => 'select inline selects-220'])?>
                    <?php else :?>
                        <input name="customerid" value="<?=ckAuth()?session('custId'):(isset( $_REQUEST['customerid'] ) ? $_REQUEST['customerid'] : '')?>" type="hidden">
                    <?php endif;?>
                    <input type="text" class="form-control inline input-220" name="keys" placeholder="业务单,收款人公司名称" value="">&nbsp;
                    <button type="button" class="btn btn-primary search" onclick="load_payment_data();"><i class="icon icon-search4"></i> 查询</button>
                </div>

            </form>
        </div>

        <table class="table table-hover tb_payment">
            <thead>
            <tr>
                <th width="120px">业务编号</th>
                <th width="100px">实际付款日期</th>
                <th width="140px">收款人公司名称</th>
                <th width="120px">开户银行</th>
                <th width="120px">银行账号</th>
                <th width="70px">币种</th>
                <th width="80px">付款金额</th>
                <th width="80px">汇率</th>
                <th width="80px">折RMB</th>
                <th width="100px">状态</th>
                <th width="120px">备注</th>
                <?php if ( ckAuth(false) ):?>
                <th width="60px" class="text-right">操作</th>
                <?php endif;?>
            </tr>
            </thead>
        </table>
    </div>
</div>

<?=script_tag('uploads/js/__COUNTRY.js')?>
<?=script_tag('uploads/js/__PAYMENTSTATUS.js')?>
<script>
    var tb_payment_dt
    $(function(){
        tb_payment_dt = comm.dt({
            ele : $('.tb_payment'),
            url : '/declares/payment/load_page/pay?' + $('.frm_payment').serialize(),
            columns : ['BusinessID', 'approvedt', 'receivername', 'bank', 'bankaccount', 'currency', 'amount', 'exchangerate', 'status', 'note'],
            columnDefs : [
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        if( data )
                            return `<a href="/declares/${(full.isentrance == '1' ? 'import' : 'project')}/view?id=${full.projectid}" target="_blank">${data}</a>`;
                        return '';
                    }
                },
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        return data ? data.substring(0,10) : '暂无付款日期';
                    }
                },
                {
                    aTargets:[2,3,4],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,130);
                    }
                },
                {
                    aTargets:[6],
                    mRender:function(data,full){
                        return ( comm.fMoney(full.amount) );
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
                        return ( comm.fMoney( full.amount * full.exchangerate ) );
                    }
                },
                {
                    aTargets:[9],
                    mRender:function(data,full){
                        return comm.dictionary(__PAYMENTSTATUS,full.status);
                    }
                },
                {
                    aTargets:[10],
                    mRender:function(data,full){
                        return comm.ellipsis( full.note , full.note, 120,'left');
                    }
                },
                <?php if ( ckAuth(false) ):?>
                {
                    aTargets:[11],
                    mRender:function(data,full){
                        var html = '<div class="text-right">';

                        <?php if ( $is_has_payment_approve ): ?>
                        if( ( full.status==0 ) && full.exchangerate != '' && full.exchangerate != null)
                            html += `<a href="/declares/payment/approve?id=${full.id}" class="label bg-success-300" onclick="return comm.confirmCTL(this.href,'是否确认操作?',(resp)=>{load_payment_data()})"> 确认 </a> `;
                        <?php endif;?>

                        <?php if($is_has_receipt_delete) {?>
                            html += `<a href="/declares/payment/delete?id=${full.id}" class="label bg-danger-300" onclick="return comm.confirmCTL(this.href,'是否删除该条记录?',(resp)=>{load_payment_data();})">删除</a>`;
                        <?php }?>
                        return html + '</div>';
                    }
                }
                <?php endif;?>
            ]
        });
    });
    $('.div_payment .tabbable a').on('click',function(e){
        var state = $(this).attr('data-info');
        $('#sel_type').val(state);
        e.preventDefault();
        load_payment_data();
    });
    function load_payment_data(){
        tb_payment_dt.fnReloadAjax('/declares/payment/load_page/pay?' + $('.frm_payment').serialize());
    }
</script>
