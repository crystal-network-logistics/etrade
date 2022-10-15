<?php
$is_has_create = ck_action('setup/company/create');
$is_has_update = ck_action('setup/company/edit');
$is_has_delete = ck_action('setup/company/delete');
$is_has_setup = ck_action('setup/company/setup');
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
                            <input class="form-control inline input-320" placeholder=" 帐户名称,电话或邮箱 " name="keys">

                            <button class="btn btn-primary search" type="button" onclick="load_data();">查询</button>
                        </div>
                        <?php if($is_has_create):?>
                            <a class="btn btn-success hModal" href="/setup/company/create">新增</a> &nbsp;
                        <?php endif;?>

                    </div>
                </div>
            </form>
        </div>

        <table class="table table-hover data-list">
            <thead>
            <tr>
                <th width="120px">公司名称</th>
                <th width="180px">英文名称</th>
                <th width="80px">企业代码</th>
                <th width="140px">详细地址</th>
                <th width="60px">英文地址</th>
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
                url:'/setup/company/page?'+$('.frm_search').serialize(),
                // size : 3,
                columns:['name','ename','code','address','enaddr','company','status'],
                columnDefs:[
                    {
                        aTargets:[0],
                        mRender:function(data,full){
                            return comm.word_break(data,180);
                        }
                    },
                    {
                        aTargets:[1,3],
                        mRender:function(data,full){
                            return comm.word_break(data,220);
                        }
                    },
                    {
                        aTargets:[4],
                        mRender:function(data,full){
                            return comm.word_break(data,320);
                        }
                    },

                    {
                        aTargets:[5],
                        mRender:function(data,full){
                            return (full.status == "1") ? ('<i class="icon-checkmark4 text-success"></i>') : ('<i class="icon-cross2 text-danger"></i>');
                        }
                    },

                    {
                        aTargets:[6],
                        mRender:function(data,full){
                            var buttons = ' <div class="text-right">';

                            <?php if($is_has_setup):?>
                            buttons += '    <a href="/setup/company/setup?id='+ full.id +'" class="label '+ ((full.status == 0) ? 'bg-danger' : 'bg-success') +'" onclick="return comm.confirmCTL(this.href,\'确认设置禁用/启用操作?\',function (){load_data();})">'+ ((full.status == 0) ? '禁用' : '启用') +'</a> ';
                            <?php endif;?>

                            <?php if($is_has_update):?>
                            buttons += '    <a href="/setup/company/edit?id='+ full.id +'" class="label bg-primary hModal">编辑</a>';
                            <?php endif;?>

                            <?php if($is_has_delete):?>
                            buttons += '    <a href="/setup/company/delete?id='+ full.id +'" class="label bg-danger" onclick="return comm.confirmCTL(this.href,\'确定删除?\')">删除</a>';
                            <?php endif;?>

                            return buttons + '</div>';
                        }
                    }
                ],

                drawCallback : function ( setting ){
                    $('[data-popup=tooltip-ellipsis]').tooltip();
                    setTimeout(function () {
                        $('.dataTables_scrollBody').css('height','');
                    },100)

                }
            });
        });

        function load_data(){
            dtusers.fnReloadAjax('/setup/company/page?'+$('.frm_search').serialize());
        }
    </script>
</div>
