<?php
$is_has_create = ck_action('setup/products/create');
$is_has_update = ck_action('setup/products/edit');
$is_has_delete = ck_action('setup/products/delete');
$is_has_setup = ck_action('setup/products/setup');
$is_has_copy = ck_action('setup/products/copy');
$is_has_confirm = ck_action('setup/products/confirm');
$is_has_off_shelves = ck_action('setup/products/off_shelves');
?>
<link href="/resource/assets/css/filesPlugin.css?_=1" type="text/css" rel="stylesheet"/>
<script src="/resource/app/filesPlugin.js?_=1"></script>
<!-- Content area -->
<div class="content" style="padding: 0 20px;">
    <div class="panel panel-flat" style="margin-bottom: 2px;">
        <div class="panel-body" style="padding: 10px 20px;">
            <form action="#" class="form-horizontal frm_search">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-search">
                            <input name="isentrance" value="0" type="hidden">
                            <input name="status" value="3" type="hidden">
                            <input type="text" class="form-control inline input-420" name="keys" placeholder="产品编号,产品名称,HSCode等" value="">&nbsp;
                            <button type="button" class="btn btn-primary search" id="btn_search" onclick="load_data();"><i class="icon icon-search4"></i> 查询</button>
                        </div>
                        <?php if($is_has_create):?>
                            <a class="btn btn-success" href="/setup/products/create" id="btnCreate">新增</a> &nbsp;
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
                    <li class="active"><a href="#1" data-toggle="tab" data-status="3">审核通过 ( <span class="statusA"> 0 </span> ) </a></li>
                    <li class=""><a href="#2" data-toggle="tab" data-status="1">审核中 ( <span class="statusB"> 0 </span> ) </a></li>
                    <li class=""><a href="#3" data-toggle="tab" data-status="2">待确认 ( <span class="statusC"> 0 </span> ) </a></li>
                    <li class=""><a href="#4" data-toggle="tab" data-status="4">待补充材料 ( <span class="statusD"> 0 </span> ) </a></li>
                    <li class=""><a href="#5" data-toggle="tab" data-status="0">草稿箱 ( <span class="statusE"> 0 </span> ) </a></li>
                </ul>
            </div>
        </div>

        <table class="table table-hover data-list">
            <thead>
            <tr>
                <th width="40px">#</th>
                <th width="140px">品名</th>
                <th width="120px">产品编码</th>
                <th width="120px">品牌</th>
                <th width="60px">退税率</th>
                <th width="60px">HSCode</th>
                <th width="60px">监管条件</th>
                <th width="140px">开票人</th>
                <th width="180px">客户</th>
                <th width="60px">创建时间</th>
                <th width="100px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
    <script type="text/javascript">
        var dtproducts ;
        $(function(){
            dtproducts = comm.dt({
                ele:$('.data-list'),
                url:'/setup/products/page?'+$('.frm_search').serialize(),
                columns:['rownum','name','productid','brand','taxreturnrate','hscode','customsupervision','invoicer','customer','createtime'],
                columnDefs:[
                    {
                        aTargets:[1],
                        mRender:function(data,full){
                            return '<a class="hModal" data-size="lg" data-yes="N" href="/setup/products/detail?id='+ full.id +'" lang="'+ data +'">' + comm.ellipsis(data,data,120) + '</a>'
                        }
                    },
                    {
                        aTargets:[4],
                        mRender:function(data,full){
                            return ((data || data == 0) ? ( parseFloat(data) * 100 + '%' ) : '--');
                        }
                    },
                    {
                        aTargets:[7],
                        mRender:function(data,full){
                            return comm.ellipsis(data,data,160)
                        }
                    },
                    {
                        aTargets:[8],
                        mRender:function(data,full){
                            return comm.ellipsis(data,data,160)
                        }
                    },
                    {
                        aTargets:[10],
                        mRender:function(data,full){
                            var buttons = ' <div class="text-right">',status = full.status;

                            <?php if ($is_has_confirm) :?>
                            if(status == 2) {
                                buttons += ` <a href="/setup/products/confirm?id=${full.id}" onclick="return comm.confirmCTL(this.href,'是否确认操作?')" class="label bg-success-300"> 确认 </a> `;
                            }
                            <?php endif;?>

                            <?php if($is_has_update):?>
                            if(status != 2 && status != 3) {
                                buttons += '    <a href="/setup/products/edit?id=' + full.id + '" class="label bg-primary">编辑</a> ';
                            }
                            <?php endif;?>

                            <?php if($is_has_copy):?>
                            if(status != 4 && status != 2 && status != 0) {
                                buttons += '    <a href="/setup/products/copy?id=' + full.id + '" class="label bg-info">复制</a> ';
                            }
                            <?php endif;?>

                            <?php if($is_has_delete):?>
                            if( status == 0 ) {
                                buttons += `    <a href="/setup/products/delete?id=${full.id}" class="label bg-danger" onclick="return comm.confirmCTL(this.href,'确定删除?')">删除</a>`;
                            }
                            <?php endif;?>

                            <?php if ($is_has_off_shelves) :?>
                            if(status == 3) {
                                buttons += `   <a  href="/setup/products/off_shelves?id=${full.id}" class="label bg-danger-300" onclick="return comm.confirmCTL(this.href,'确定下架该商品?')">下架</a>`;
                            }
                            <?php endif;?>

                            return buttons + '</div>';
                        }
                    }
                ],

                drawCallback : function ( setting ){
                    $('[data-popup=tooltip-ellipsis]').tooltip();
                    $.each(setting.json,function (k,v){$(`.${k}`).text(v);});
                    setTimeout( ()=> {
                        $('.dataTables_scrollBody').css('height','');
                        <?php if( ckAuth() ) :?>
                            comm.visibleColumn(dtproducts,[8],false);
                        <?php endif;?>
                        },100);
                }
            });

            $('.tabbable>ul a').on('click',function () {
                var status = $(this).data('status');
                $('input[name=status]').val(status);
                if(status != 3){
                    comm.visibleColumn(dtproducts,2,false);
                }else{
                    comm.visibleColumn(dtproducts,2,true);
                }
                load_data();
            });
        });

        function load_data(){
            dtproducts.fnReloadAjax('/setup/products/page?'+$('.frm_search').serialize());
        }
    </script>

