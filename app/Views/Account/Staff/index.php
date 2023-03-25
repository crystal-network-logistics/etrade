<?php
    $is_has_active = ck_action('account/staff/active')
?>
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">

            <form action="#" class="frm_search form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-search">
                        <input class="form-control inline input-220" placeholder=" 帐户名称,电话或邮箱 " name="keys">

                        <select class="select selects-120" role="min" name="activated">
                            <option value=""> 激活状态 </option>
                            <option value="1"> 已激活 </option>
                            <option value="0"> 未激活 </option>
                        </select>

                        <?=\App\Libraries\LibComp::get_customer(['name'=>'customerid','class'=>'select inline selects-220'])?>
                        <!--input name="type" type="hidden" value="ent"-->
                        <button class="btn btn-primary search" type="button" onclick="load_data();"> <i class="icon icon-search4"></i> 查询 </button>
                        </div>

                        <?php if(ck_action('account/staff/create')):?>
                            <a class="btn btn-success hModal" href="/account/staff/create"> <i class="icon icon-add"></i> 新增员工 </a>
                            <a class="btn btn-info hModal" href="/account/staff/agent"> <i class="icon icon-add"></i> 新增代理 </a>
                        <?php endif;?>

                    </div>
                </div>
            </form>
        </div>

        <table class="table table-hover data-list">
            <thead>
            <tr>
                <th width="120px">帐户</th>
                <th width="180px">名称</th>
                <th width="140px">电话</th>
                <th width="140px">邮箱</th>
                <th width="60px">角色</th>
                <th width="60px">归属公司</th>
                <th width="60px">状态</th>
                <th width="60px">是否激活</th>
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
                url:'/account/staff/page?'+$('.frm_search').serialize(),
                columns:['username','realname','tel','email','role','company','status','activated'],
                columnDefs:[
                    {
                        aTargets:[0],
                        mRender:function(data,full){
                            return comm.ellipsis(data,data,100);
                        }
                    },
                    {
                        aTargets:[1],
                        mRender:function(data,full){
                            var name = data ? data : full.nickname;
                            return comm.ellipsis(name,name,120);
                        }
                    },
                    {
                        aTargets:[2],
                        mRender:function(data,full){
                            return comm.ellipsis(data,data,110);
                        }
                    },
                    {
                        aTargets:[3,4,5],
                        mRender:function(data,full){
                            return comm.ellipsis(data,data,160);
                        }
                    },
                    {
                        aTargets:[6],
                        mRender:function(data,full){
                            return (data == 0) ? ('<i class="icon-checkmark4 text-success-300"></i>') : ('<i class="icon-cross2 text-danger-300"></i>');
                        }
                    },
                    {
                        aTargets:[7],
                        mRender:function(data,full){
                            return data==0 ?
                                (`<a
                                <?php if($is_has_active):?>
                                href="/account/staff/active?id=${full.id}"
                                onclick="return comm.confirmCTL(this.href,'是否需要激活帐户?')"
                                <?php endif;?>
                                class="label bg-danger-300">未激活</a>`) : ('<span class="label bg-success-300">已激活</span>');
                        }
                    },
                    {
                        aTargets:[8],
                        mRender:function(data,full){
                            var buttons = ' <div class="text-right">';

                            <?php if(ck_action('account/staff/disabled_enabled')):?>
                            buttons += '    <a href="/account/staff/disabled_enabled?id='+ full.id +'" class="label '+ ((full.status == 0) ? 'bg-danger-300' : 'bg-success-300') +'" onclick="return comm.confirmCTL(this.href,\'确认设置禁用/启用操作?\',function (){load_data();})">'+ ((full.status == 0) ? '禁用' : '启用') +'</a> ';
                            <?php endif;?>

                            <?php if(ck_action('account/staff/spasswd')):?>
                            buttons += '    <a href="/account/staff/spasswd?id='+ full.id +'" class="label bg-info-300" onclick="return comm.doPrompt(this.href,{title:\'请输入新密码:\',type:\'password\'})">重置</a>';
                            <?php endif;?>

                            <?php if(ck_action('account/staff/edit')):?>
                            var action = 'edit' , text = '编辑';
                            if ( full.role.includes('代理') ) {
                                action = 'agent';
                            }
                            buttons += `    <a href="/account/staff/${action}?id=${full.id}" class="label bg-primary-300 hModal">${text}</a>`;
                            <?php endif;?>

                            if ( full.role.includes('操作人员') ) {
                                buttons += `    <a href="/account/staff/binder?id=${full.id}" class="label bg-primary-300 hModal" data-yes="N">查看</a> `;
                            }

                            return buttons + '</div>';
                        }
                    }
                ],

                drawCallback : function ( setting ){
                    $('[data-popup=tooltip-ellipsis]').tooltip();
                }
            });
        });

        function load_data(){
            dtusers.fnReloadAjax('/account/staff/page?'+$('.frm_search').serialize());
        }
    </script>
</div>
