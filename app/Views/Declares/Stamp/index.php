<?php
$is_has_create = ck_action('declares/stamp/create');
$is_has_beizheng = ck_action('declares/stamp/beiz');
$is_has_delete = ck_action('declares/stamp/delete');
$is_has_view = ck_action('declares/stamp/view');
?>
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat" style="margin-bottom: 2px;">
        <div class="panel-body" style="padding: 10px 20px;">
            <form action="#" class="form-horizontal frm_search">
                <div class="row">
                    <div class="col-md-12">
                        <?=\App\Libraries\LibComp::get_customer(['name'=>'customerid','class' => 'select inline selects-320'])?>
                        <input type="text" class="form-control inline input-420" name="keys" placeholder="业务单号" value="">&nbsp;
                        <button type="button" class="btn btn-primary search" id="btn_search" onclick="load_data();"><i class="icon icon-search4"></i> 查询</button>

                        <?php if($is_has_create):?>
                            <a class="btn btn-success hModal" href="/declares/stamp/create" id="btnCreate"><i class="icon icon-add"></i> 新增盖章</a> &nbsp;
                        <?php endif;?>

                    </div>
                </div>
            </form>
        </div>

        <table class="table table-hover data_stamp">
            <thead>
            <tr>
                <th width="130px">业务编号</th>
                <th width="180px">客户</th>
                <th width="200px">备注</th>
                <th width="90px">申请日期</th>
                <th width="90px">盖章日期</th>
                <th width="100px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script type="text/javascript">
    var dtstamp ;
    $(function(){
        dtstamp = comm.dt({
            ele:$('.data_stamp'),
            url:'/declares/stamp/page?'+$('.frm_search').serialize(),
            columns:['BusinessID','customername','stampmark','createtime','stamptime'],
            columnDefs:[
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        return data ? comm.ellipsis(`<a href="/declares/stamp/view?id=${full.id}">${data}</a>` , data,180): '无业务单';
                    }
                },
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,180);
                    }
                },
                {
                    aTargets:[2],
                    mRender:function(data,full){
                        return comm.ellipsis( data , data , 320 );
                    }
                },
                {
                    aTargets:[5],
                    mRender:function(data,full){
                        var buttons = ' <div class="text-right">';
                        buttons += ' <a href="/declares/stamp/view?id=' + full.id + '" class="label bg-primary" > 查看 </a> ';
                        <?php if($is_has_beizheng):?>
                            if(full.status == 2 && full.isbz == 0)
                                buttons += `    <a href="/declares/stamp/selected?id=${full.id}" class="label bg-success hModal">添加到备案单证</a> `;
                        <?php endif;?>

                        <?php if($is_has_delete):?>
                        buttons += `    <a href="/declares/stamp/delete?id=${full.id}" class="label bg-danger" onclick="return comm.confirmCTL(this.href,'确定删除?',(resp)=>{load_data()})">删除</a>`;
                        <?php endif;?>

                        return buttons + '</div>';
                    }
                }
            ]
        });
    });
    function load_data(){
        dtstamp.fnReloadAjax('/declares/stamp/page?'+$('.frm_search').serialize());
    }
</script>
