<?php
$is_has_create = ck_action('setup/overseas/create');
$is_has_update = ck_action('setup/overseas/edit');
$is_has_delete = ck_action('setup/overseas/delete');
?>

<!-- Content area -->
<div class="content" style="padding: 0 20px;">
    <div class="panel panel-flat" style="margin-bottom: 2px;">
        <div class="panel-body" style="padding: 10px 20px;">
            <form action="#" class="form-horizontal frm_search">
                <div class="row">
                    <div class="col-md-12">
                        <div class=" nav-search">
                            <input name="type" value="0" type="hidden">
                            <input type="text" class="form-control inline input-420" name="keys" placeholder="收款人,开户银行,收款帐号" value="">&nbsp;
                            <button type="button" class="btn btn-primary search" id="btn_search" onclick="load_data();"><i class="icon icon-search4"></i> 查询</button>
                        </div>
                        <?php if($is_has_create):?>
                            <a class="btn btn-success hModal" href="/setup/overseas/create" id="btnCreate">新增</a> &nbsp;
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
                    <li class="active"><a href="#1" data-toggle="tab" data-status="0">境外贸易商 ( <span class="statusA"> 0 </span> ) </a></li>
                    <li class=""><a href="#2" data-toggle="tab" data-status="1">境内收货人 ( <span class="statusB"> 0 </span> ) </a></li>
                </ul>
            </div>
        </div>

        <table class="table table-hover data-list">
            <thead>
            <tr>
                <th width="40px">#</th>
                <th width="180px">境外商名称</th>
                <th width="180px">境外商地址</th>
                <th width="80px">联系人</th>
                <th width="80px">联系电话</th>
                <th width="100px">所属客户</th>
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
            url:'/setup/overseas/page?'+$('.frm_search').serialize(),
            columns:['rownum','companyname','address','contractor','phone','customer'],
            columnDefs:[
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        return '<a class="hModal"  data-yes="N" href="/setup/overseas/detail?id='+ full.id +'" lang="'+ data +'">' + comm.ellipsis(data,data,200) + '</a>'
                    }
                },
                {
                    aTargets:[2],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,180)
                    }
                },
                {
                    aTargets:[5],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,180,'left')
                    }
                },
                {
                    aTargets:[3,4],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,120)
                    }
                },
                {
                    aTargets:[6],
                    mRender:function(data,full){
                        var buttons = ' <div class="text-right">',status = full.status;

                        buttons += ' <a href="/setup/overseas/detail?id=' + full.id + '" class="label bg-primary hModal" data-yes="N" > 详情 </a> ';

                        <?php if($is_has_update):?>
                        buttons += '    <a href="/setup/overseas/edit?id='+full.id+'" class="label bg-success hModal">编辑</a> ';
                        <?php endif;?>

                        <?php if($is_has_delete):?>
                        buttons += `    <a href="/setup/overseas/delete?id=${full.id}" class="label bg-danger" onclick="return comm.confirmCTL(this.href,'确定删除?')">删除</a>`;
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
                    comm.visibleColumn(dtproducts,[5],false);
                    <?php endif;?>
                },50);
            }
        });

        $('.tabbable>ul a').on('click',function () {
            var type = $(this).data('status');
            $('.frm_search input[name=type]').val(type);
            load_data();
        });
    });

    function load_data(){
        dtproducts.fnReloadAjax('/setup/overseas/page?'+$('.frm_search').serialize());
    }
</script>
