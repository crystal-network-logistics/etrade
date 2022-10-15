<?php
$is_has_confirm = ck_action('setup/products/confirm');
$is_has_update = ck_action('setup/products/edit');

?>
<table class="table table-hover NoticeProducts">
    <thead>
    <tr>
        <th width="120px">品名</th>
        <th width="100px">产品编号</th>
        <th width="80px">品牌</th>
        <th width="90px">退税率</th>
        <th width="80px">HSCode</th>
        <th width="120px">监管条件</th>
        <th width="100px">状态</th>
        <th width="140px">创建日期</th>
        <th width="100px">消息</th>
        <th width="120px" class="text-right">操作</th>
    </tr>
    </thead>
</table>

<script type="text/javascript">
    var productdt ;
    $(function(){
        productdt = comm.dt({
            ele : $('.NoticeProducts'),
            url : '/message/notify/load_data/products?' + $('.frm_search').serialize(),
            columns:['name', 'productid', 'brand', 'taxreturnrate', 'hscode', 'customsupervision', 'status', 'createtime', 'message'],
            columnDefs:[
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        return `<a href="/setup/products/detail?id=${full.relationid}" class="hModal" data-size="lg" data-yes="N">${data}</a>`;
                    }
                },
                {
                    aTargets:[3],
                    mRender:function(data,full){
                        return Math.floor( data * 100 ) + '%';
                    }
                },
                {
                    aTargets:[6],
                    mRender:function(data,full){
                        return comm.dictionary(__PRODUCT_STATUS,data);
                    }
                },
                {
                    aTargets:[9],
                    mRender:function(data,full){
                        var buttons = '<div class="text-right">';

                        <?php if($is_has_confirm) {?>
                        if(full.status == 2) {
                            buttons += `<a href="/setup/products/confirm?id=${full.id}" class="label bg-success-300" onclick="return comm.confirmCTL(this.href,'审核通过?',(resp)=>{load_prduct_data()})"> 审核通过 </a>`;
                        }
                        <?php }?>

                        <?php if($is_has_update) {?>
                            if(full.status != 2 && full.status != 3) {
                                buttons += ` <a href="/setup/products/edit?id=${full.id}" class="label bg-blue-300"> 编辑 </a>`;
                            }
                        <?php } ?>

                        if(full.nt == 0){
                            buttons += `<a href="/message/notify/delete?id=${full.noticeid}" onclick="return comm.confirmCTL(this.href,'确认查看 操作?',(resp)=>{load_prduct_data()})" class="label bg-primary-300">确认查看</a> `;
                        }
                        buttons += '</div>'
                        return buttons;
                    }
                }
            ],drawCallback : function ( setting ){
                $.each(setting.json.badge,function (k,v){$(`.badge_${k}`).text(v);});
            }
        });
        $('.search').click(function(){
            load_prduct_data();
        });
    });

    function load_prduct_data(){
        productdt.fnReloadAjax('/message/notify/load_data/products?' + $('.frm_search').serialize());
    }

</script>
