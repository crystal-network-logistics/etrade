<?php
$is_has_create = ck_action('setup/receiver/create');
$is_has_update = ck_action('setup/receiver/edit');
$is_has_delete = ck_action('setup/receiver/delete');
?>

<!-- Content area -->
<div class="content" style="padding: 0 20px;">
    <div class="panel panel-flat" style="margin-bottom: 2px;">
        <div class="panel-body nav-search" style="padding: 10px 20px;">
            <form action="#" class="form-horizontal frm_search">
                <div class="row">
                    <div class="col-md-12">

                        <div class="nav-search">
                            <input name="type" value="1" type="hidden">
                            <input type="text" class="form-control inline input-420" name="keys" placeholder="收款人,开户银行,收款帐号" value="">&nbsp;
                            <button type="button" class="btn btn-primary search" id="btn_search" onclick="load_data();"><i class="icon icon-search4"></i> 查询</button>
                        </div>

                        <?php if($is_has_create):?>
                            <a class="btn btn-success hModal" href="/setup/receiver/create" id="btnCreate">新增</a> &nbsp;
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
                    <li class="active"><a href="#1" data-toggle="tab" data-status="1">开票人收款 ( <span class="statusA"> 0 </span> ) </a></li>
                    <li class=""><a href="#2" data-toggle="tab" data-status="2">物流收款 ( <span class="statusB"> 0 </span> ) </a></li>
                    <li class=""><a href="#4" data-toggle="tab" data-status="3">其它收款 ( <span class="statusC"> 0 </span> ) </a></li>
                </ul>
            </div>
        </div>

        <table class="table table-hover data-list">
            <thead>
            <tr>
                <th width="40px">#</th>
                <th width="180px">收款人</th>
                <th width="180px">开户银行</th>
                <th width="140px">收款帐号</th>
                <th width="80px">币种</th>
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
            url:'/setup/receiver/page?'+$('.frm_search').serialize(),
            columns:['rownum','name','bank','account','currency','customer'],
            columnDefs:[
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        return '<a class="hModal"  data-yes="N" href="/setup/receiver/detail?id='+ full.id +'" lang="'+ data +'">' + comm.ellipsis(data,data,180) + '</a>'
                    }
                },
                {
                    aTargets:[2,3,5],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,160)
                    }
                },
                {
                    aTargets:[6],
                    mRender:function(data,full){
                        var buttons = ' <div class="text-right">',status = full.status;

                        buttons += ' <a href="/setup/receiver/detail?id=' + full.id + '" class="label bg-primary hModal" data-yes="N" > 详情 </a> ';

                        <?php if($is_has_update):?>
                            buttons += '    <a href="/setup/receiver/edit?id='+full.id+'" class="label bg-success hModal">编辑</a> ';
                        <?php endif;?>

                        <?php if($is_has_delete):?>
                            buttons += `    <a href="/setup/receiver/delete?id=${full.id}" class="label bg-danger" onclick="return comm.confirmCTL(this.href,'确定删除?')">删除</a>`;
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
        dtproducts.fnReloadAjax('/setup/receiver/page?'+$('.frm_search').serialize());
    }
</script>
