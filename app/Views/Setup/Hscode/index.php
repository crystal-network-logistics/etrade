<?php
    $is_has_update = ck_action('setup/hscode/update')
?>

<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body nav-search">
            <form action="#" class="main-search form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control inline input-220" name="keys" placeholder="品名,HSCODE,要素">
                        <button type="button" class="btn btn-primary search">搜索</button>
                    </div>
                </div>
            </form>
        </div>

        <table class="table table-hover hscode">
            <thead>
            <tr>
                <th width="80px">HSCode</th>
                <th width="120px">品名</th>
                <th width="100px">单位1</th>
                <th width="80px">单位2</th>
                <th width="90px">退税率</th>
                <th width="120px">监管条件</th>
                <th width="220px">要素</th>
                <th width="80px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<script>
    var hscode;
    $(function(){
        hscode = comm.dt({
            ele:$('.hscode'),
            url:'/setup/hscode/page?'+$('.frm_search').serialize(),
            columns:['code','productname','officialunit1','officialunit2','taxreturnrate','customsupervision','declarationelements'],
            columnDefs:[
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        return `<a class="hModal" href="/setup/hscode/view?code=${full.code}">${full.code}</a>`;
                    }
                },
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,200);
                    }
                },

                {
                    aTargets:[6],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,200,'left');
                    }
                },
                {
                    aTargets:[4],
                    mRender:function(data,full){
                        return Math.floor(full.taxreturnrate*100) + '%';
                    }
                },
                {
                    aTargets:[7],
                    mRender:function(data,full){
                        <?php if( $is_has_update ) :?>
                            return `<div class="text-right"><a class="label bg-primary-300 hModal" href="/setup/hscode/update?code=${full.code}">编辑</a> </div>`;
                        <?php endif;?>
                        return '';
                    }
                }
            ]
        });
        
        $('.search').click(function(){load_hs_data();});

    });

    function load_hs_data(){
        hscode.fnReloadAjax('/setup/hscode/page?'+$('.main-search').serialize());
    }
</script>
