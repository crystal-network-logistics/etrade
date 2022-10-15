<?php
    $c = new \App\Services\comm();
    $roles_data = $c->get_roles_data();

?>
<div class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-white">
                <div class="panel-heading" style="padding: 10px;">
                    <h6 class="panel-title"><i class=" icon-users"></i> &nbsp;&nbsp;角色</h6>
                    <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered datatable-selection-single table-hover table_role">
                        <thead>
                        <tr>
                            <th width="80">序号</th>
                            <th>角色名称</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(count($roles_data)) {?>
                            <?php foreach($roles_data as $key=>$item) {?>
                                    <?php $item = (object) $item ?>
                                <tr id="<?=$item->id?>" data-creator="<?=$item->creatorId?>">
                                    <td><?=($key+1)?></td>
                                    <td>
                                        <?=$item->name?>
                                        <?php if($item->creatorId != (session('id'))){?>
                                            <span class="text-muted text-size-small">(系统分配角色)</span>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php }?>
                        <?php } else {?>
                            <tr>
                                <td colspan="3" style="text-align: center">无角色信息</td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-white">
                <div class="panel-heading"  style="padding: 10px;">
                    <h6 class="panel-title">菜单权限</h6>
                    <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
                </div>
                <div class="table-responsive roles_rights">
                    <?=$c->power_role_menu()?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var roleId = 0;

    $(function(){
        $('.table_role.table-bordered').on('click','tr',function(){
            if($(this).attr('id')) {
                $('.table_role.table-bordered tr.success').removeClass('success') && $(this).addClass('success');
                get_role_rights($(this).attr('id'), $(this).data('creator'));
            }
        });

        $('.menu_rights input[type=checkbox]').on('click',function () {
            set_role_rights($(this).val());
        });

    });

    function get_role_rights(Id,creator){
        var cks = $('.text-primary input[type=checkbox]'),creatorId = '<?=session('id')?>';
        cks.prop('checked',false);cks.prop('disabled',!(parseInt( creatorId ) === parseInt( creator )));
        comm.POST({
            url:'/admin/powers/roles_actions?_=' + Math.random(),
            data:{R:Id},
            callback:function(result) {
                cks.each(function(key,item){
                    var $ele = $(this),itemId = ($ele.val()).split('.')[1];
                    $.each(result.data,function(k,v){
                        if(v.actionId == itemId)
                            $ele[0].checked = true;
                    });
                });
                roleId = Id;
            }
        });
    }
    <?php if( ck_action('admin/powers/set_actions') ) :?>
    function set_role_rights(v){
        if(roleId > 0) {
            comm.POST({
                url: '/admin/powers/set_actions',
                data: {role_id: roleId, menu_id: v.split('.')[0], operation_id: v.split('.')[1]},
                callback: function (result) {
                   comm.Alert(result.msg,result.code);
                }
            });
        }else{
            $('[type=checkbox]:checked').prop('checked',false);
            comm.dAlert('请选择角色!');
        }
    }
    <?php endif;?>
</script>
