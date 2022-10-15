<link href="/resource/assets/css/filesPlugin.css?_=<?php echo time()?>" type="text/css" rel="stylesheet"/>
<script src="/resource/app/filesPlugin.js?_=<?php echo time()?>"></script>
<link href="/resource/assets/css/project.css" type="text/css" rel="stylesheet"/>

<?php
    $Owner = \App\Libraries\LibComp::get_owner_data(['companyid' => session('company'),'power' => ['owner','operator']]);
    $is_has_crm_save = ck_action('setup/crm/save');
    $data = $data['detail']??false;
?>
<div class="content">
    <form class="form-horizontal frm_crm" action="/setup/crm/save">
        <div class="panel panel-flat">
            <div class="panel-body">
                <fieldset>
                    <legend>
                        <h5> 基本信息</h5>
                    </legend>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" class="form-control" name="id" value="<?=$data?$data['id']:0?>">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">客户名称(<span class="red">*</span>):</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="name" required="true" value="<?=$data?$data['name']:''?>" placeholder="请输入 客户名称">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">客户类型(<span class="red">*</span>):</label>
                                <div class="col-lg-8">
                                    <?=\App\Libraries\LibComp::select('CTYPE',['name'=>'type','id'=>'ctypes','class'=>'select'],$data['type'])?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">业务员(<span class="red">*</span>):</label>
                                <div class="col-lg-8">
                                    <select class="select" name="owner" aria-required="true">
                                        <?php foreach($Owner as $own) {?>
                                            <option value="<?=$own->id?>"><?=$own->realname?:$own->username?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">联系地址:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="address" value="<?=$data?$data['address']:''?>"  placeholder="请输入 联系地址">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">固定电话:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="tel"  value="<?=$data?$data['tel']:''?>" placeholder="请输入 固定电话">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">企业网址:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="site"  value="<?=$data?$data['site']:''?>"  placeholder="请输入 企业网址">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">开户银行:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="bank" value="<?=$data?$data['bank']:''?>" placeholder="请输入 开户银行">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">客户来源:</label>
                                <div class="col-lg-8">
                                    <?=\App\Libraries\LibComp::select('CSOURCE',['name'=>'source','class'=>'select','role'=>'min'],$data?$data['source']:'')?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">创建人:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="creator" readonly value="<?=$data?$data['creator']:session('username')?>" placeholder="请输入 创建人">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">备注:</label>
                                <div class="col-lg-8">
                                    <textarea type="text" class="form-control" name="remark"><?=$data?$data['remark']:''?></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">客户简称:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="shortname" value="<?=$data?$data['shortname']:''?>"  placeholder="请输入 客户简称">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">客户编号:</label>
                                <div class="col-lg-8">
                                    <?=\App\Libraries\LibComp::get_customer(['name'=>'customerid','class' => 'select'],$data?$data['customerid']:'')?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">地区:</label>
                                <div class="col-lg-8">
                                    <?=\App\Libraries\LibComp::select('CITY',['name'=>'region','class'=>'select'],$data?$data['region']:'')?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">邮编:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="post" value="<?=$data?$data['post']:''?>" placeholder="请输入 邮编">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">传真:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="fax" value="<?=$data?$data['fax']:''?>" placeholder="请输入 传真">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">主营产品:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="mainproduct" value="<?=$data?$data['mainproduct']:''?>" placeholder="请输入 主营产品">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">银行帐号:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="bankaccount" value="<?=$data?$data['bankaccount']:''?>" placeholder="请输入 银行帐号">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">利润提取:</label>
                                <div class="col-lg-8">
                                    <?=\App\Libraries\LibComp::select('PROFITS',['name'=>'profits','class'=>'select','role'=>'min'],$data?$data['profits']:'')?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">创建日期:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" readonly value="<?php echo $data ? date('Y-m-d',strtotime($data['createtime'])):date('Y-m-d')?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>


        <div class="panel panel-flat">
            <div class="panel-body">
                <fieldset>
                    <legend>
                        <h5> 联系人 <a class="label bg-primary heading-text" href="/setup/crm/create_contact" onclick="return comm.doRequest('/setup/crm/create_contact',{},(resp)=>{$('#_contact').append(resp);_upx();})"><i class="icon-plus-circle2"></i> 新建</a></h5>
                    </legend>
                    <div id="_contact" style="max-width: 100%;">
                        <?php if ( $data && $data['contract_data'] ) :?>
                        <?php foreach ( $data['contract_data'] as $item ) :?>
                                <?=view('/Setup/Crm/_contact',['item'=>$item])?>
                        <?php endforeach;?>
                        <?php else :?>
                        <?=view('/Setup/Crm/_contact')?>
                        <?php endif;?>
                    </div>
                </fieldset>
            </div>
        </div>

        <div class="panel panel-flat">
            <div class="panel-body">
                <fieldset>
                    <legend><h5>附件</h5></legend>
                    <?=\App\Libraries\LibComp::upload_compents( ['name'=>'files','mini'=>true,'nums'=>9 ], $data && $data['files']?explode(',',$data['files']):[])?>
                </fieldset>
            </div>
        </div>

        <div style="text-align: center">
            <?php if( $is_has_crm_save ) :?>
                <button class="btn btn-primary" type="submit">保存</button> &nbsp;&nbsp;
            <?php endif;?>

            <button type="button" class="btn btn-default" onclick="history.back()">取消</button>
        </div>
    </form>
</div>

<script>

    $('.frm_crm').toSubmit({
        success : function (resp) {
            comm.Alert(resp.msg,true);
            setTimeout(()=>{
                window.location.back();
            },3000)
        },
        error : function (resp) {
            comm.Alert(resp.msg,false);
        }
    });
    function _removed(id){
        $('#'+id).remove(); _upx();
    }

    function _upx(){
        $("div[name=div]").each(function(k,item){
            $('.'+this.id).text((k+1));
        });
    }

    $('#ctypes').change(function(){
        var v = $(this).val(),item = $('.cNo');
        (v=='S' || v=='T')?item.removeAttr('disabled'):(item.attr('disabled','true') && item.val('').trigger('change'));
    });
</script>
