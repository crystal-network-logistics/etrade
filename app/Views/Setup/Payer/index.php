<?php
$is_has_create = ck_action('setup/payer/create');
$is_has_update = ck_action('setup/payer/edit');
$is_has_delete = ck_action('setup/payer/delete');
?>

<!-- Content area -->
<div class="content">
    <div class="panel panel-flat" style="margin-bottom: 2px;">
        <div class="panel-body" style="padding: 10px 20px;">
            <form action="#" class="form-horizontal frm_search">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-search">
                            <input type="text" class="form-control inline input-420" name="keys" placeholder="收款人,开户银行,收款帐号" value="">&nbsp;
                            <button type="button" class="btn btn-primary search" id="btn_search" onclick="load_data();"><i class="icon icon-search4"></i> 查询</button>
                        </div>
                        <?php if($is_has_create):?>
                            <a class="btn btn-success hModal" href="/setup/payer/create" id="btnCreate">新增</a> &nbsp;
                        <?php endif;?>

                    </div>
                </div>
            </form>
        </div>

        <table class="table table-hover data-list">
            <thead>
            <tr>
                <th width="40px">#</th>
                <th width="180px">收款人</th>
                <th width="180px">开户银行</th>
                <th width="140px">付款帐号</th>
                <th width="80px">币种</th>
                <th width="80px">国家或地区</th>
                <th width="100px">所属客户</th>
                <th width="100px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<?=script_tag('uploads/js/__COUNTRY.js')?>
<script type="text/javascript">
    var dtproducts ;
    $(function(){
        dtproducts = comm.dt({
            ele:$('.data-list'),
            url:'/setup/payer/page?'+$('.frm_search').serialize(),
            columns:['rownum','name','bankname','account','currency','region','customer'],
            columnDefs:[
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        return '<a class="hModal"  data-yes="N" href="/setup/payer/detail?id='+ full.id +'" lang="'+ data +'">' + comm.ellipsis(data,data,180) + '</a>'
                    }
                },
                {
                    aTargets:[2,3,6],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,160)
                    }
                },
                {
                    aTargets:[5],
                    mRender:function(data,full){
                        return comm.dictionary(__COUNTRY,data)
                    }
                },
                {
                    aTargets:[7],
                    mRender:function(data,full){
                        var buttons = ' <div class="text-right">',status = full.status;

                        buttons += ' <a href="/setup/payer/detail?id=' + full.id + '" class="label bg-primary hModal" data-yes="N" > 详情 </a> ';

                        <?php if($is_has_update):?>
                        buttons += '    <a href="/setup/payer/edit?id='+full.id+'" class="label bg-success hModal">编辑</a> ';
                        <?php endif;?>

                        <?php if($is_has_delete):?>
                        buttons += `    <a href="/setup/payer/delete?id=${full.id}" class="label bg-danger" onclick="return comm.confirmCTL(this.href,'确定删除?')">删除</a>`;
                        <?php endif;?>

                        return buttons + '</div>';
                    }
                }
            ],

            drawCallback : function ( setting ){
                $('[data-popup=tooltip-ellipsis]').tooltip();
                setTimeout( ()=> {
                    $('.dataTables_scrollBody').css('height','');
                    <?php if( ckAuth() ) :?>
                    comm.visibleColumn(dtproducts,[6],false);
                    <?php endif;?>
                },100);
            }
        });
    });

    function load_data(){
        dtproducts.fnReloadAjax('/setup/payer/page?'+$('.frm_search').serialize());
    }
</script>
