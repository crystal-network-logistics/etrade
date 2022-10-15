<?php
$is_has_create = ck_action('setup/customer/create');
$is_has_update = ck_action('setup/customer/edit');
$is_has_delete = ck_action('setup/customer/delete');
$is_has_setup = ck_action('setup/customer/setup');
?>
<link href="/resource/assets/css/filesPlugin.css?_=1" type="text/css" rel="stylesheet"/>
<script src="/resource/app/filesPlugin.js?_=1"></script>
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <form action="#" class="frm_search form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-search">
                            <input class="form-control inline input-320" placeholder=" 客户名称,客户编号,电话或QQ号 " name="keys">

                            <button class="btn btn-primary search" type="button" onclick="load_data();">查询</button>
                        </div>
                        <?php if($is_has_create):?>
                            <a class="btn btn-success hModal" href="/setup/customer/create">新增</a> &nbsp;
                        <?php endif;?>

                    </div>
                </div>
            </form>
        </div>

        <table class="table table-hover data-list">
            <thead>
            <tr>
                <th width="120px">客户编号</th>
                <th width="180px">客户名称</th>
                <th width="80px">代理费(%)</th>
                <th width="80px">退税融资费</th>
                <th width="60px">电话</th>
                <th width="60px">手机号</th>
                <th width="180px">主营产品</th>
                <th width="60px">状态</th>
                <th width="100px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>


    <script type="text/javascript">
        var dtusers ;
        $(function(){
            dtusers = comm.dt({
                ele:$('.data-list'),
                url:'/setup/customer/page?'+$('.frm_search').serialize(),
                // size : 3,
                columns:['customerno','customername','commissionfee','taxrefundfee','tel','phone','mainproducts','status'],
                columnDefs:[
                    {
                        aTargets:[0],
                        mRender:function(data,full){
                            return comm.word_break(data,120);
                        }
                    },
                    {
                        aTargets:[2,3],
                        mRender:function(data,full){
                            var text = comm.fMoney( ( data * 100 ),2) + '%';
                            return text;//comm.ellipsis( text, text, 80);
                        }
                    },
                    {
                        aTargets:[1],
                        mRender:function(data,full){
                            return comm.ellipsis(data,data,180);
                        }
                    },

                    {
                        aTargets:[6],
                        mRender:function(data,full){
                            return comm.word_break(data,180);
                        }
                    },
                    {
                        aTargets:[7],
                        mRender:function(data,full){
                            return (full.status == "0") ? ('<i class="icon-checkmark4 text-success"></i>') : ('<i class="icon-cross2 text-danger"></i>');
                        }
                    },

                    {
                        aTargets:[8],
                        mRender:function(data,full){
                            var buttons = ' <div class="text-right">';

                            <?php if($is_has_setup):?>
                            buttons += '    <a href="/setup/customer/setup?id='+ full.id +'" class="label '+ ((full.status == 0) ? 'bg-danger-300' : 'bg-success-300') +'" onclick="return comm.confirmCTL(this.href,\'确认设置禁用/启用操作?\',function (){load_data();})">'+ ((full.status == 0) ? '禁用' : '启用') +'</a> ';
                            <?php endif;?>

                            <?php if($is_has_update):?>
                            buttons += '    <a href="/setup/customer/edit?id='+ full.id +'" class="label bg-primary hModal">编辑</a>';
                            <?php endif;?>

                            <?php if($is_has_delete):?>
                            buttons += '    <a href="/setup/customer/delete?id='+ full.id +'" class="label bg-danger" onclick="return comm.confirmCTL(this.href,\'确定删除?\')">删除</a>';
                            <?php endif;?>

                            return buttons + '</div>';
                        }
                    }
                ],

                drawCallback : function ( setting ){
                    $('[data-popup=tooltip-ellipsis]').tooltip();
                    setTimeout( ()=> {$('.dataTables_scrollBody').css('height','');},100)

                }
            });
        });

        function load_data(){
            dtusers.fnReloadAjax('/setup/customer/page?'+$('.frm_search').serialize());
        }


    </script>
</div>
