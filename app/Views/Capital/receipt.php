<?php
    $is_has_receipt_approve = ck_action('declares/receipt/approve');
    $is_has_receipt_delete = ck_action('declares/receipt/delete');
?>
<div class="content div_income">
    <div class="panel panel-flat">
        <div class="panel-body" style="padding: 10px 20px">
            <div class="tabbable">
                <ul class="nav nav-pills nav-pills-toolbar text-center nav-xs" style="margin-bottom: 0px">
                    <li class="active"><a href="#" data-toggle="tab" data-info=""> 全部收入</a></li>
                    <li><a href="#" data-toggle="tab" data-info="1"> 货款收入 </a></li>
                    <li><a href="#" data-toggle="tab" data-info="3"> 退税收入 </a></li>
                    <li><a href="#" data-toggle="tab" data-info="2"> 其它收入 </a></li>
                </ul>
            </div>
            <form class="form-horizontal frm_income nav-search" style="margin-top: 5px;">
                <input type="hidden" name="usage" id="selUsage">
                <div class="col-md-12 text-right">
                    <?php if ( ckAuth(false) ):?>
                        <select class="select inline selects-120" name="approved" role="min"><option value="">--是否审核--</option><option value="0">未审核</option><option value="1">已审核</option></select>
                        <?=\App\Libraries\LibComp::select('RECEIPTSTATUS',['name'=>'status','class'=>'select inline selects-220','role'=>'min'],'',true)?>
                        <?=\App\Libraries\LibComp::get_customer([ 'name' => 'customerid','class' => 'select inline selects-220'])?>
                    <?php else :?>
                        <input name="customerid" value="<?=ckAuth()?session('custId'):(isset( $_REQUEST['customerid'] ) ? $_REQUEST['customerid'] : '')?>" type="hidden">
                    <?php endif;?>
                    <input type="text" class="form-control inline input-220" name="keys" placeholder="业务单,付款人名称" value="">&nbsp;
                    <button type="button" class="btn btn-primary search" onclick="load_income_data();"><i class="icon icon-search4"></i> 查询</button>
                </div>

            </form>
        </div>

        <table class="table table-hover tb_income">
            <thead>
            <tr>
                <th width="120px">业务编号</th>
                <th width="140px">收款日期</th>
                <th width="140px">付款人</th>
                <th width="110px">国家及地区</th>
                <th width="80px">币种</th>
                <th width="90px">金额</th>
                <th width="100px">汇率</th>
                <th width="120px">折RMB</th>
                <th width="120px">账户类型</th>
                <th width="120px">所属客户</th>
                <th width="120px">备注</th>
                <th width="120px">状态</th>
                <th width="120px">审核状态</th>
                <th width="120px">实际退税日期</th>
                <th width="100px">实际退税</th>
                <th width="120px">差额</th>
                <th width="60px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<?=script_tag('uploads/js/__COUNTRY.js')?>
<?=script_tag('uploads/js/__RECEIPTSTATUS.js')?>
<?=script_tag('uploads/js/__ACCOUNT.js')?>

<script>
    var tb_receipt_claimdt
    $(function(){
        tb_receipt_claimdt = comm.dt({
            ele : $('.tb_income'),
            url : '/declares/receipt/load_page/income?' + $('.frm_income').serialize(),
            columns : ['BusinessID','receiptdate','payername','payercountry','currency','amount','exchangerate','accounttype','customername','note','status','approved','realityDate','realityamount'],
            columnDefs : [
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        if( full.BusinessID && full.BusinessID.trim().length > 0)
                            return `<a href="/declares/${(full.isentrance == '1' ? 'import' : 'project')}/view?id=${full.projectid}" target="_blank">${data}</a>`;
                        else if(full.status == 0 && full.approved == 1)
                            return `<a href="/declares/capital/unc_balance?customerid=${full.customerid}" class="hModal" data-size="lg" data-yes="n" lang="${full.customername} -- 未分配">未分配</a>`;
                        else return '';

                    }
                },
                {
                    aTargets:[2],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,125);
                    }
                },
                {
                    aTargets:[3],
                    mRender:function(data,full){
                        return comm.dictionary(__COUNTRY,data);
                    }
                },
                {
                    aTargets:[5],
                    mRender:function(data,full){
                        return comm.fMoney(data);
                    }
                },
                {
                    aTargets:[7],
                    mRender:function(data,full){
                        return comm.fMoney(full.amount * full.exchangerate);
                    }
                },
                {
                    aTargets:[8],
                    mRender:function(data,full){
                        return comm.dictionary(__ACCOUNT,full.accounttype);
                    }
                }
                ,
                {
                    aTargets:[9],
                    mRender:function(data,full){
                        return comm.ellipsis(full.customername,full.customername,120)
                    }
                },
                {
                    aTargets:[10],
                    mRender:function(data,full){
                        return comm.ellipsis(full.note,full.note,100,'left');
                    }
                },
                {
                    aTargets:[11],
                    mRender:function(data,full){
                        return comm.dictionary(__RECEIPTSTATUS,full.status);
                    }
                },
                {
                    aTargets:[12],
                    mRender:function(data,full){
                        return full.approved==0?'未审核':'已审核';
                    }
                }
                ,
                {
                    aTargets:[13],
                    orderable: true,
                    mRender:function(data,full){
                        return full.realityDate ? full.realityDate : '';
                    },
                    visible:false,
                }
                ,
                {
                    aTargets:[14],
                    mRender:function(data,full){
                        <?php if( !ckAuth('finance') && $is_has_receipt_approve ) : ?>
                            return `<a href="/declares/receipt/reality_amount?id=${full.id}" onclick="return comm.doPrompt(this.href,{title:'请输入实际退税额',type:'number'},()=>{load_income_data()})" class="text-primary" style="border-bottom: 1px dashed #2196f3;"> 实际退税 </a>`;
                        <?php else :?>
                            return full.realityamount;
                        <?php endif; ?>
                    },
                    visible:false,
                }
                ,
                {
                    aTargets:[15],
                    mRender:function(data,full){
                        var cer = full.realityamount - (full.amount * full.exchangerate);
                        return (full.realityamount==0 || full.realityamount == null)?0: comm.fMoney(cer);
                    }
                } ,
                {
                    aTargets:[16],
                    mRender:function(data,full){
                        var html = '<div class="text-right">';
                        <?php if ( ckAuth(false) ): ?>
                            if((full.status == 0 || full.approved == 0)) {
                                if( full.BusinessID ) {
                                    <?php if( $is_has_receipt_approve ) {?>
                                        html += `<a href="/declares/receipt/approve?id=${full.id}" class="label bg-primary-300" onclick="return comm.confirmCTL(this.href,'是否审核通过?',(resp)=>{load_income_data()})">审核</a> `;
                                    <?php }?>
                                }else{
                                    html += `<a href="/declares/receipt/update?id=${full.id}" class="label bg-primary-300 hModal" data-call="load_income_data"> 审核 </a> `;
                                }
                            }
                            <?php if( $is_has_receipt_delete ) : ?>
                                html += ` <a href="/declares/receipt/delete?id=${full.id}" class="label bg-danger-300" onclick="return comm.confirmCTL(this.href,'确认删除该记录?',(resp)=>{load_income_data()})"> 删除 </a> `;
                            <?php endif;?>
                        <?php endif;;?>

                        return html + '</div>';
                    }
                }
            ]
        });

        <?php if ( ckAuth(false) ):?>
            comm.visibleColumn(tb_receipt_claimdt,[13,14],false);
        <?php else :?>
            comm.visibleColumn(tb_receipt_claimdt,[8,9,14,15,16],false);
        <?php endif;?>

    });

    $('.div_income .tabbable a').on('click',function(e){
        var state = $(this).attr('data-info');
        $('#selUsage').val(state);
        e.preventDefault();
        if(state == 3){
            <?php if(ckAuth('finance') || ckAuth('admin') || ckAuth('sa') || ckAuth('all')) :?>
            comm.visibleColumn(tb_receipt_claimdt,[13,14,15],true);
            <?php  else :?>
            comm.visibleColumn(tb_receipt_claimdt,[13,14,15],false);
            <?php endif; ?>

            comm.visibleColumn(tb_receipt_claimdt,[2,3,4,5,6,9,10,11,12],false);
        }else{
            comm.visibleColumn(tb_receipt_claimdt,[13,14],false);
            var vc = [2,3,4,5,6,9,10,11,12];
            <?php if ( ckAuth() ):?>
            vc = [2,3,4,5,6,10,11,12];
            <?php endif; ?>
            comm.visibleColumn(tb_receipt_claimdt,vc,true);
        }
        load_income_data();
    });

    function load_income_data(){
        tb_receipt_claimdt.fnReloadAjax('/declares/receipt/load_page/income?' + $('.frm_income').serialize());
    }
</script>
