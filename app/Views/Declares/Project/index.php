<?php
$has_admin = hasRole('admin');
$is_has_create = ck_action('declares/project/create');
$is_has_update = ck_action('declares/project/edit');
$is_has_delete = ck_action('declares/project/delete');
?>

<!-- Content area -->
<div class="content" style="padding: 0 20px;">
    <div class="panel panel-flat" style="margin-bottom: 2px;">
        <div class="panel-body" style="padding: 10px 20px;">
            <form action="#" class="form-horizontal frm_search">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-search">
                            <input name="status" value="1" type="hidden">
                            <input name="isentrance" value="0" type="hidden">
                            <?php if ( ckAuth(false ) ) :?>
                            <?=\App\Libraries\LibComp::get_customer(['name'=>'customerid','class'=>'select inline selects-220'])?>
                            <?php endif;?>
                            <!--input type="text" class="form-control inline input-120" placeholder="开始 出口日期" onclick="WdatePicker({})"-->
                            <!--nput type="text" class="form-control inline input-120" placeholder="结束 出口日期" onclick="WdatePicker({})"-->

                            <input type="text" class="form-control inline input-320" name="keys" placeholder="业务编号,备注等" value="">&nbsp;
                            <button type="button" class="btn btn-primary search" id="btn_search" onclick="load_data();"><i class="icon icon-search4"></i> 查询</button>
                        </div>
                        <?php if($is_has_create):?>
                            <a class="btn btn-success <?=(ckAuth(false) ? 'hModal': '')?>" data-text="确定选择" href="<?=(ckAuth(false)?'/setup/customer/selected':'/declares/project/create')?>" id="btnCreate"><i class="icon icon-add"></i> 新增业务单</a> &nbsp;
                        <?php endif;?>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="panel panel-flat">
        <div class="panel-body" style="padding: 10px 20px">
            <div class="tabbable">
                <ul class="nav nav-pills nav-pills-toolbar text-center nav-xs" style="margin-bottom: 0px">
                    <li class="active"><a href="#1" data-toggle="tab" data-status="1">进行中 ( <span class="statusA"> 0 </span> ) </a></li>
                    <li class=""><a href="#2" data-toggle="tab" data-status="2">已完成 ( <span class="statusB"> 0 </span> ) </a></li>
                    <li class=""><a href="#4" data-toggle="tab" data-status="0">草稿箱 ( <span class="statusC"> 0 </span> ) </a></li>
                </ul>
            </div>
        </div>

        <table class="table table-hover data-list">
            <thead>
            <tr>
                <th width="40px">#</th>
                <th width="140px">业务编号</th>
                <th width="60px">启运/目的港</th>
                <th width="80px">出口日期</th>
                <th width="60px">币种</th>
                <th width="60px">通关状态</th>
                <th width="60px">报关金额</th>
                <th width="80px">增票(RMB)</th>
                <th width="80px">收入(RMB)</th>
                <th width="60px">支付(RMB)</th>
                <th width="60px">建单日期</th>
                <th width="60px">完成日期</th>
                <th width="140px">备注</th>
                <th width="100px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<?=script_tag('uploads/js/__CITY.js')?>
<?=script_tag('uploads/js/__COUNTRY.js')?>
<script type="text/javascript">
    var dtproducts ;
    $(function(){
        dtproducts = comm.dt({
            ele:$('.data-list'),
            sort:true,
            order:[[10,'desc'],[1,'desc'],[11,'desc']], //[2,'desc'],[3,'desc'],[4,'desc'],
            url:'/declares/project/page?'+$('.frm_search').serialize(),
            columns:['rownum','BusinessID','entryport','exportdate','currency','clearance','bgamount','vcapital','isreceipt','payamount','createtime','donetime','remark'],
            columnDefs:[
                {
                    aTargets:[0,3,4],
                    mRender:function(data,full){
                        return data;
                    },
                    orderable:false
                },

                {
                    aTargets:[1],
                    mRender:function(data,full){
                        return `<a  href="/declares/project/view?id=${full.ID}" target="_blank">${comm.ellipsis(data,data,125)}</a>`
                    },
                    orderable:true
                },
                {
                    aTargets:[2],
                    mRender:function(data,full){
                        var sText = (data?comm.dictionary(__CITY,data):""),eText = (full.destionationcountry ? comm.dictionary(__COUNTRY,full.destionationcountry):'')
                        var text = (sText?sText:'') + ((sText&&eText)?'->':'') + (eText?eText:''),tip = '启运港:' + (sText?sText:'') + ((sText&&eText)?' , ':'') + '目的港:' + (eText?eText:'');
                        return comm.ellipsis( text ,tip ,120 );
                    },
                    orderable:false
                },
                {
                    aTargets:[12],
                    mRender:function(data,full){
                        return comm.ellipsis( data ,data ,110 ,'left');
                    },
                    orderable:false
                },

                {
                    aTargets:[5],
                    mRender:function(data,full){
                        var label = data ? 'success-300' : 'danger-300', text = data ? '是' : '否';
                        return `<span class="label bg-${label}">${text}</span>`;
                    },
                    orderable:false
                },
                {
                    aTargets:[6,7,8,9],
                    mRender:function(data,full){
                        var text = comm.fMoney(data,2);
                        return comm.ellipsis(text,text,80);
                    },
                    orderable:false
                },
                {
                    aTargets:[13],
                    mRender:function(data,full){
                        var buttons = ' <div class="text-right">',status = full.status;

                        buttons += ` <a href="/declares/project/view?id=${full.ID}" class="label bg-primary"> 详情 </a> `;

                        <?php if( $has_admin ) : ?>
                            buttons += `    <a href="/declares/project/delete?id=${full.ID}" class="label bg-danger" onclick="return comm.confirmCTL(this.href,'确定删除?')">删除</a>`;
                        <?php else: ?>
                            if ( status == 0 ) {
                                buttons += `    <a href="/declares/project/delete?id=${full.ID}" class="label bg-danger" onclick="return comm.confirmCTL(this.href,'确定删除?')">删除</a>`;
                            }
                        <?php endif;?>
                        return buttons + '</div>';
                    }
                }
            ],
            fnck:function (nRow, aData, iDisplayIndex){
                var B = $(nRow).find('td:eq(5)>div'),V = $(nRow).find('td:eq(6)>div'),R = $(nRow).find('td:eq(7)>div'),
                    css = {"border-radius":"2px","padding":"0px 5px"};
                if ( aData.btag == 1 ) B.addClass('bg-yellow').css(css);
                if ( aData.btag == 2 ) B.addClass('bg-orange').css(css);
                if ( aData.btag == 3 ) B.addClass('bg-warning').css(css);

                if ( aData.vtag == 1 ) V.addClass('bg-yellow').css(css);
                if ( aData.vtag == 2 ) V.addClass('bg-orange').css(css);
                if ( aData.vtag == 3 ) V.addClass('bg-warning').css(css);

                if ( aData.rtag == 1 ) R.addClass('bg-yellow').css(css);
                if ( aData.rtag == 2 ) R.addClass('bg-orange').css(css);
                if ( aData.rtag == 3 ) R.addClass('bg-warning').css(css);
            },
            drawCallback : function ( setting ){
                $.each(setting.json,function (k,v){$(`.${k}`).text(v);});
            }
        });
        comm.visibleColumn(dtproducts, 11, false);
        $('.tabbable>ul a').on('click',function () {
            var status = $(this).data('status');
            $('.frm_search input[name=status]').val(status);
            load_data();
            if ( status == 2 ) {
                comm.visibleColumn(dtproducts, 10, false);
                comm.visibleColumn(dtproducts, 11, true);
            } else {
                comm.visibleColumn(dtproducts, 11, false);
                comm.visibleColumn(dtproducts, 10, true);
            }
        });

        setInterval(()=>{
            var mGuid =localStorage.getItem('mGuid');
            $(`#${mGuid} .btn-submit`).unbind().on('click',function () {
                var custId = $(`#${mGuid} select`).val();
                if ( !custId ) {
                    comm.Alert('请选择客户进行业务单创建',false);return false;
                }
                window.location.href = '/declares/project/create?cid=' + custId
            })
        },1000)
    });

    // 回车查询
    $(".frm_search").bind("keydown",function(e){
        var theEvent = e || window.event;
        var code = theEvent.keyCode || theEvent.which || theEvent.charCode;
        if (code === 13) {
            //回车执行查询
            $(".search").click();
            return false;
        }
    });

    function load_data(){
        dtproducts.fnReloadAjax('/declares/project/page?'+$('.frm_search').serialize());
    }
</script>
