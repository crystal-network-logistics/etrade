<?php
    $is_has_copy = ck_action('setup/invoicer/copy');
    $is_has_create = ck_action('setup/invoicer/create');
    $is_has_update = ck_action('setup/invoicer/edit');
    $is_has_delete = ck_action('setup/invoicer/delete');
    $is_has_save = ck_action('setup/invoicer/save');
    $is_has_approve = ck_action('setup/invoicer/approve');
    $is_has_refuse = ck_action('setup/invoicer/refuse');
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
                            <input name="status" value="3" type="hidden">
                            <input type="text" class="form-control inline input-420" name="keys" placeholder="开票人公司名称,纳税人识别号,开户银行,银行帐户" value="">&nbsp;
                            <button type="button" class="btn btn-primary search" id="btn_search" onclick="load_data();"><i class="icon icon-search4"></i> 查询</button>
                        </div>
                        <?php if($is_has_create):?>
                            <a class="btn btn-success hModal" data-size="lg" href="/setup/invoicer/create" id="btnCreate">新增</a> &nbsp;
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
                    <li class=""><a href="#4" data-toggle="tab" data-status="2">审核拒绝 ( <span class="statusC"> 0 </span> ) </a></li>
                    <li class=""><a href="#5" data-toggle="tab" data-status="0">草稿箱 ( <span class="statusD"> 0 </span> ) </a></li>
                </ul>
            </div>
        </div>

        <table class="table table-hover data-list">
            <thead>
            <tr>
                <th width="40px">#</th>
                <th width="180px">开票人公司名称</th>
                <th width="140px">纳税人识别号</th>
                <th width="180px">开户银行</th>
                <th width="140px">银行帐户</th>
                <th width="140px">所属客户</th>
                <th width="100px">创建时间</th>
                <th width="100px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script type="text/javascript">
    var dtproducts ;
    let btns = [
        {tag:"a",text:"保存草稿",cssClass:"btn-default",attrs:{ href:'/setup/invoicer/draft' ,"onclick" : "return draft(this.href)"}},
        <?php if( $is_has_save ): ?>
        {text:"提交",cssClass:"btn-primary btn-submit"},
        <?php endif;?>
    ]

    let ctl_btns = [
        <?php if( $is_has_approve ): ?>
        {tag:'a',text:'核准',cssClass:' btn-success ',attrs: { href : '' , onclick : "return approve(this)"}},
        <?php endif;?>

        <?php if( $is_has_refuse ): ?>
        {tag:'a',text:'拒绝',cssClass:' btn-danger ',attrs: { href : '' , onclick : "return refuse(this)"}},
        <?php endif;?>
    ]

    $(function(){
        dtproducts = comm.dt({
            ele:$('.data-list'),
            url:'/setup/invoicer/page?'+$('.frm_search').serialize(),
            columns:['rownum','name','taxpayerid','bank','account','customer','createtime'],
            columnDefs:[
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        let view_buttons = [];
                        if ( full.status == 1 ) {
                            view_buttons = ctl_btns;
                            console.log(view_buttons[0].attrs)
                            <?php if( $is_has_approve ): ?>
                            view_buttons[0].attrs.href = '/setup/invoicer/approve?id=' + full.id;
                            <?php endif;?>

                            <?php if( $is_has_refuse ): ?>
                            if (view_buttons[1]) {
                                view_buttons[1].attrs.href = '/setup/invoicer/refuse?id=' + full.id;
                            }
                            <?php endif;?>
                        }
                        return '<a class="hModal" data-size="lg" data-yes="N" href="/setup/invoicer/detail?id='+ full.id +'" lang="'+ data +'" data-buttons=\''+ JSON.stringify( view_buttons )+'\'>' + comm.ellipsis(data,data,180) + '</a>'
                    }
                },
                {
                    aTargets:[2,3,4,5],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,140)
                    }
                },
                {
                    aTargets:[7],
                    mRender:function(data,full){
                        var buttons = ' <div class="text-right">',status = full.status,view_buttons = [];
                        if ( status == 1 ) {
                            view_buttons = ctl_btns;
                            <?php if( $is_has_approve ) :?>
                            view_buttons[0].attrs.href = '/setup/invoicer/approve?id=' + full.id;
                            <?php endif;?>

                            <?php if( $is_has_refuse ): ?>
                            if (view_buttons[1]) view_buttons[1].attrs.href = '/setup/invoicer/refuse?id=' + full.id;
                            <?php endif;?>

                        }

                        buttons += '    <a href="/setup/invoicer/detail?id=' + full.id + '" class="label bg-primary-300 hModal" data-size="lg" data-yes="N" data-buttons=\''+ JSON.stringify( view_buttons )+'\'> 详情 </a> ';

                        <?php if( $is_has_copy ):?>
                        if(status == 3) {
                            var bt =  JSON.stringify( btns ) ;
                            buttons += `    <a href="/setup/invoicer/copy?id=${full.id}" class="label bg-success-300 hModal" data-size="lg" data-buttons='${bt}'> 复制 </a> `;
                        }
                        <?php endif;?>

                        <?php if ( $is_has_update ) :?>
                        if(status != 3) {
                            var b =  JSON.stringify( btns ) ;
                            buttons += `    <a href="/setup/invoicer/edit?id=${full.id}" class="label bg-success-300 hModal" data-size="lg" data-buttons="${b}">编辑</a> `;
                        }
                        <?php endif;?>

                        <?php if($is_has_delete):?>
                        if(status != 3) {
                            buttons += `    <a href="/setup/invoicer/delete?id=${full.id}" class="label bg-danger-300" onclick="return comm.confirmCTL(this.href,'确定删除?')">删除</a>`;
                        }
                        <?php endif;?>

                        return buttons + '</div>';
                    }
                }
            ],

            drawCallback : function ( setting ){
                $('[data-popup=tooltip-ellipsis]').tooltip();
                $.each(setting.json,function (k,v){$(`.${k}`).text(v);});
                setTimeout( ()=> {$('.dataTables_scrollBody').css('height','');},50);
            }
        });

        $('.tabbable>ul a').on('click',function () {
            var status = $(this).data('status');
            $('.frm_search input[name=status]').val(status);
            load_data();
        });
        $('#btnCreate').attr('data-buttons',JSON.stringify(btns));
    });

    function load_data(){
        dtproducts.fnReloadAjax('/setup/invoicer/page?'+$('.frm_search').serialize());
    }

    <?php if ( $is_has_refuse ): ?>
    // 拒绝
    function refuse(_this) {
        comm.confirmCTL(_this.href,'确定返回重新编辑?',(resp)=>{
            comm.closeModal();
        });
        return false;
    }
    <?php endif;?>

    <?php if ( $is_has_approve ): ?>
    function approve(_this){
        comm.confirmCTL(_this.href,'确定审核通过?',(resp)=>{
            comm.closeModal();
        });
        return false;
    }
    <?php endif;?>

</script>
