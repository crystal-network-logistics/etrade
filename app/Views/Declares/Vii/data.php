    <div class="panel panel-flat" style="border-color: #fff;margin-bottom: 0px;">
        <div class="panel-body" style="padding: 5px 20px">
            <form class="form-horizontal frm_vii">
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
    </div>

    <table class="table table-hover tb_vii">
        <thead>
        <tr>
            <th width="120px">业务编号</th>
            <th width="110px">中文品名</th>
            <th width="80px">数量</th>
            <th width="70px">单位</th>
            <th width="100px">开票金额</th>
            <th width="90px">退税率</th>
            <th width="140px">开票人公司名称</th>
            <th width="140px">所属客户</th>
            <th width="90px">货款状态</th>
            <th width="140px">金额</th>
            <th width="80px">日期</th>
            <th width="110px">状态</th>
            <th width="120px">备注</th>
        </tr>
        </thead>
    </table>

<?=script_tag('uploads/js/__VIISTATUS.js')?>

<script>
    var tb_vii_dt
    $(function(){
        tb_vii_dt = comm.dt({
            ele : $('.tb_vii'),
            url : '/declares/vii/load_page/to?' + $('.frm_vii').serialize(),
            columns:['BusinessID','productname','amount','unit','invoiceamount','taxreturnrate','invoicer','customername','paystatus','paystatus','createtime','status','note'],
            columnDefs : [
                { aTargets:[0],
                    mRender:function(data,full){
                        var text = `<a href="/declares/${(full.isentrance == '1' ? 'import' : 'project')}/view?id=${full.projectid}" target="_blank">${data}</a>`;
                        if( data )
                            return comm.ellipsis(text,data,125)
                        return '';
                    }
                },
                { aTargets:[4,9],
                    mRender:function(data,full){
                        return comm.fMoney(data)
                    }
                },
                { aTargets:[6,7],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,140)
                    }
                },
                { aTargets:[8],
                    mRender:function(data,full){
                        if( full.paystatus  > 0 ){
                            return `<span class="label bg-info-300" data-placement="right"  data-popup="tooltip-ellipsis" title="应付 ${comm.fMoney(full.paystatus)} 元"> 应付 </span>`
                        }else if( full.paystatus < 0 ){
                            return `<span class="label bg-orange-300" data-placement="right"  data-popup="tooltip-ellipsis" title="预付 ${comm.fMoney(-full.paystatus)} 元"> 预付 </span>`
                        }else if( full.paystatus === "0" || full.paystatus === 0 ){
                            return '<span  class="label bg-success-300" data-placement="right"  data-popup="tooltip-ellipsis" title="增票与付款金额一致"> 一致 </span>'
                        }
                        return '--';
                    }
                },
                { aTargets:[1],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,140)
                    }
                },
                { aTargets:[3],
                    mRender:function(data,full){
                        return data > 0 ? comm.fMoney(data,2) : data
                    }
                },
                { aTargets:[11],
                    mRender:function(data,full){
                        return comm.dictionary(__VIISTATUS,data)
                    }
                },
                { aTargets:[12],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,120,'left')
                    }
                },
            ],
            drawCallback:function ( setting ) {
                comm.visibleColumn(tb_vii_dt,[9],false);
                <?php if (ckAuth()) :?>
                comm.visibleColumn(tb_vii_dt,[7],false);
                <?php endif;?>
            }
        });
    });

    function load_payment_data(){
        tb_vii_dt.fnReloadAjax('/declares/vii/load_page/to?' + $('.frm_vii').serialize());
    }
</script>
