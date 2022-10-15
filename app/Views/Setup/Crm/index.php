<?php

    $Owner = \App\Libraries\LibComp::get_owner_data(['companyid' => session('company'),'power' => 'operator']);

    $is_has_crm_create = ck_action('setup/crm/create');
    $is_has_crm_update = ck_action('setup/crm/update');

    $is_has_crm_track = ck_action('setup/crm/track');
    $is_has_crm_delete = ck_action('setup/crm/delete');
?>

<?=script_tag('uploads/js/__CITY.js')?>
<?=script_tag('uploads/js/__CSOURCE.js')?>

<div class="content">
    <div class="panel">
        <div class="panel-body">

            <div class="tabbable">
                <ul class="nav nav-xs nav-tabs nav-tabs-solid nav-tabs-component">
                    <li class="active"><a href="#" data-toggle="tab"data-column="1" data-val=""> 全部客户 <span class="badge badge-info position-right"></span></a></li>
                    <li><a href="#" data-toggle="tab"  data-column="1" data-val="T">合作客户 <span class="badge badge-info position-right"></span></a> </a></li>
                    <li><a href="#" data-toggle="tab" data-column="1" data-val="S">签约客户 <span class="badge badge-info position-right"></span></a></a></li>
                    <li><a href="#" data-toggle="tab" data-column="1" data-val="P">报价客户 <span class="badge badge-info position-right"></span></a></a></li>
                    <li><a href="#" data-toggle="tab" data-column="1" data-val="Q">潜在客户 <span class="badge badge-info position-right"></span></a></a></li>
                </ul>
            </div>

            <form action="#" class="mainSearch form-horizontal">
                <div class="row">
                    <input type="hidden" id="status" name="type" value="">
                    <div class="col-md-12">
                        <select class="select inline input-120" name="owner" role="min">
                            <option value="">业务员</option>
                            <?php foreach( $Owner as $row ) : ?>
                                <option value="<?=$row->id?>"><?=$row->realname?:$row->username?></option>
                            <?php endforeach;?>
                        </select>
                        <?=\App\Libraries\LibComp::select('CITY',['name'=>'region','class'=>'select inline input-120','role'=>'min'])?>
                        <?=\App\Libraries\LibComp::select('CSOURCE',['name'=>'source','class'=>'select inline input-120','role'=>'min'],'',false)?>
                        <input type="text" class="form-control inline input-220" name="keys" placeholder="关键字">
                        <button type="button" class="btn btn-primary search" onclick="load_crm_data()">搜索</button>

                        <?php if ( $is_has_crm_create ):?>
                            <a href="/setup/crm/create" class="btn btn-success"><i class="icon icon-add"></i> 添加 </a>
                        <?php endif;?>

                    </div>
                </div>
            </form>
        </div>
        <table class="table table-hover customer">
            <thead>
            <tr>
                <th width="120px">客户名称</th>
                <th width="80px">客户简称</th>
                <th width="80px">联系人</th>
                <th width="80px">联系电话</th>
                <th width="80px">邮箱</th>
                <th width="80px">QQ</th>
                <th width="60px">微信</th>
                <th width="80px">业务员</th>
                <th width="60px">地区</th>
                <th width="60px">客户来源</th>
                <th width="100px">创建日期</th>
                <th width="60px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<script type="text/javascript">
    $('.mainSearch .select').select2();
    var productdt,cdate = '<?php echo date('Y-m-d')?>';
    $(function(){
        productdt = comm.dt({
            ele:$('.customer'),
            url:'/setup/crm/page?'+ $('.mainSearch').serialize(),
            columns:['name','shortname','contact','phone','email','qq','weixin','username','region','source','createtime'],

            columnDefs:[
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        return '<a href="/setup/crm/view?id='+ full.id +'" class="hModal" data-size="lg" data-yes="n">'+ full.name +'</a>';
                    }
                },
                {
                    aTargets:[1,2,3,4,5,6,7],
                    fun:function(data,full){
                        return comm.ellipsis(data,data,80);
                    }
                }
                ,
                {
                    aTargets:[8],
                    fun:function(data,full){
                        return comm.dictionary( __CITY , data );
                    }
                }
                ,
                {
                    aTargets:[9],
                    fun:function(data,full){
                        return  comm.dictionary(__CSOURCE,data);//_SOURCE(data);
                    }
                }
                ,
                {
                    aTargets:[11],
                    fun:function(data,full){
                        var html = '<div class="text-right">';
                        html += ` <a href="/setup/crm/view?id=${full.id}" class="label bg-primary-300 hModal" data-size="lg" data-yes="n">详情</a> `;

                        <?php if ( $is_has_crm_update ) :?>
                        html += ` <a href="/setup/crm/update?id=${full.id}" class="label bg-info-300">编辑</a> `;
                        <?php endif;?>

                        <?php if ( $is_has_crm_track ) :?>
                        html += ` <a href="/setup/crm/track?id=${full.id}" class="label bg-success-300" onclick="return comm.doPrompt(this.href,{title:'请输入跟进信息:'},(resp)=>{load_crm_data()})">跟进</a> `;
                        <?php endif;?>

                        <?php if ( $is_has_crm_delete ) :?>
                            html += `<a href="/setup/crm/delete?id=${full.id}" class="label bg-danger-300" onclick="return comm.confirmCTL(this.href,'确认删除?',(resp)=>{load_crm_data()})">删除</a>`;
                        <?php endif;?>
                        html += '</div>';

                        return html;
                    }
                }
            ],
            fnck:function(nRow, aData, iDisplayIndex){
                if(aData.trackdate && aData.trackdate <= cdate){
                    $(nRow).addClass('bg-warning-300');
                }
            },
        });

        $('.tabbable a').on('click',function(e){
            $('#status').val($(this).attr('data-val'));
            load_crm_data();
        });

    });

    function load_crm_data(){
        productdt.fnReloadAjax('/setup/crm/page?'+$('.mainSearch').serialize());
    }
</script>
