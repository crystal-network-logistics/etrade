<form id="frm_menus" class="form-horizontal" action="/admin/menus/save">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-white">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">菜单名称:</label>
                        <div class="col-lg-8">
                            <input type="hidden" name="id" value="<?=$data?$data->id:0?>">
                            <input type="text" name="title" class="form-control" placeholder="" value="<?=$data?$data->title:""?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">上级菜单:</label>
                        <div class="col-lg-8">
                           <?=\App\Libraries\LibMenu::build_menu_select_tree(['class'=>'select','name'=>'parentid','role'=>'min'],$data?$data->parentid:0)?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">显示平台:</label>
                        <div class="col-lg-8">
                            <?=\App\Libraries\LibComp::select('TARGET',['class'=>'select','name'=>'target'],$data?$data->target:'all',false)?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">页面地址:</label>
                        <div class="col-lg-8">
                            <input type="text" name="url" class="form-control" placeholder="" value="<?=$data?$data->url:''?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">编码:</label>
                        <div class="col-lg-8">
                            <input type="text" name="code" class="form-control" placeholder="" value="<?=$data?$data->code:''?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">图标:</label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input type="text" name="icon" class="form-control" placeholder="" id="set_icon"  value="<?=$data?$data->icon:''?>">
                                <span class="input-group-btn">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#mIcon"><i class=" icon-image2"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4">是否隐藏:</label>
                        <div class="col-lg-8">
                            <label class="mr-15">
                                <input type="radio" name="hidden"  <?=$data?($data->hidden==1?'':'checked'):'checked'?> value="0"> 否
                            </label>
                            <label>
                                <input type="radio" name="hidden" <?=$data?($data->hidden==1?'checked':''):''?> value="1"> 是
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">优先级:</label>
                        <div class="col-lg-8">
                            <input type="number" name="sort" class="form-control" placeholder="" value="<?=$data?$data->sort:1?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">备注:</label>
                        <div class="col-lg-8">
                            <input type="text" name="remark" class="form-control"  value="<?=$data?$data->remark:''?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h5 class="panel-title">菜单权限:</h5>
                    <div class="heading-elements" style="top:34%">
                        <ul class="icons-list">

                            <li><input class="form-control inputController" placeholder="控制器" style="120px;"></li>

                            <li><a class="btn btn-primary btn-sm" style="color: #fff" onclick="_addAuth()">添加权限</a></li>
                        </ul>
                    </div>
                    <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
                </div>
                <div class="table-responsive" style="max-height: 450px;">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="80px" class="text-center">序号</th>
                            <th>名称</th>
                            <th>编码</th>
                            <th>URI</th>
                            <th CLASS="text-right">操作</th>
                        </tr>
                        </thead>
                        <tbody class="actions">
                        <?php
                            if(isset($data->action)) {
                                foreach($data->action as $key=>$val) {?>
                                    <?php echo view('/Admin/Menus/action',['model'=>$val])?>
                                <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>

<?php echo view('/Admin/Menus/_icon')?>

<script>
    $(function(){
        update_index();
        $('#frm_menus select').select2({minimumResultsForSearch:-1});
        $('.row.glyphs>div').on('click',function(){
            var className = $(this).find('i').attr('class');
            $('#set_icon').val(className);$('#mIcon').modal('hide');
        });

        $('input[name=url]').on('blur',function(){
            var val = $(this).val();
            $('input[name=code]').val(val?(val.substring(1,val.length)):'');
        });


        $('.inputController').on('blur',function (){
            var text = $(this).val();
            if(!text) return false;
            comm.POST({
                    url:'/admin/menus/get_controller_action',
                    data:{controller:text},
                    datatype : 'html',
                    success:function (resp){
                        if( $('.actions') )
                        $('.actions').html(resp);
                        update_index();
                    }
            });
        });

    });

    function _addAuth(){
        comm.GET({
            url : '/admin/menus/action',
            datatype : 'html',
            success : function (resp){
                $('.actions').append(resp);
                update_index();
            }
        });
    }

    function update_index(){
        $("div[name=div]").each(function(k,item){$(this).text((k+1));});
    }
    function _rm(tag){
        console.log(tag)
        $('.' + tag).remove();update_index();
    }
</script>
