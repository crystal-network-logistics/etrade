<?php
    $Id = $project['ID'];
    // 收入收齐
    $is_has_confirm_receipt = ck_action('declares/project/confirm_receipt');
    $is_has_receipt_create = ck_action('declares/receipt/create');
    $is_has_receipt_rollcopy = ck_action('declares/receipt/rollcopy');
    $is_has_receipt_apply = ck_action('declares/receipt/applay');
    $is_has_receipt_upfiles = ck_action('declares/receipt/upfiles');
    $is_has_receipt_viewdoc = ck_action('declares/receipt/viewdoc');
    $is_has_receipt_delete = ck_action('declares/receipt/delete');
    // 撤消
    $is_has_rollback = ck_action('declares/project/rollback');

    $isentrance = $project?$project['isentrance']:(isset($_REQUEST['isentrance']) ? $_REQUEST['isentrance'] : 0);
?>
<div class="content">
    <div class="panel">
        <table class="table table-hover tb_project_receipit">
            <thead>
            <tr>
                <th width="100px">收款日期</th>
                <th width="140px">付款人</th>
                <th width="80px">国家及地区</th>
                <th width="60px">币种</th>
                <th width="90px">金额</th>
                <th width="80px">汇率</th>
                <th width="80px">折RMB</th>
                <th width="110px">用途</th>
                <th width="110px">状态</th>
                <th width="120px">备注</th>
                <th width="60px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>

    <?php if( $project['receiptstatus'] == 0 && $project['status'] != 2 && $is_has_receipt_create ): ?>
        <?php $buttons =[ ["tag"=>"button","text"=>"保存","cssClass"=>"btn btn-success hide btn_receipt_save" , "attrs"=> ["type"=>"button","onclick"=>"receipt_to_submit()"]]];?>
        <a class="btn bg-<?=$project['isentrance']?'indigo-300':'primary'?> hModal" href="/declares/receipt/create?id=<?=$Id?>&customerid=<?=$project['customerid']?>&isentrance=<?=$isentrance?>" data-buttons='<?=json_encode($buttons)?>' data-size="full"><i class="icon icon-add"></i> 新增收入</a>
    <?php endif;?>


    <?php if( $isentrance == 0 ):
        if( $is_has_confirm_receipt && confirm_receipt( $data ) && $project['receiptstatus'] == 0 ) :?>
            <a class="btn btn-success" href="/declares/project/confirm_receipt?id=<?=$Id?>" onclick="return comm.confirmCTL(this.href,'是否确认收齐?',(resp)=>{ setTimeout(()=>{ window.location.reload() },3000) })">确认收齐</a>
        <?php else: ?>
            <?php if( $project && $project['receiptstatus'] == 0 ) :?>
                <a class="btn btn-default" onclick="comm.Alert('没有达到确认收齐的条件，或者您没有确认收齐的权限！',false)">确认收齐</a>
            <?php else: ?>
                <a class="btn btn-default">已收齐</a>

                <?php if ( $is_has_rollback && $project['receiptstatus'] == 1 ):?>
                    <a class="btn btn-danger" href="/declares/project/rollback/receipt?id=<?=$project["ID"]?>"  onclick="return comm.confirmCTL(this.href,'确定撤消收入收齐操作?',(resp)=>{ setTimeout(()=>{window.location.reload()},3000) })"><i class="icon icon-forward"></i> 撤销收入收齐 </a>
                <?php endif;?>
            <?php endif;?>
        <?php endif;
    endif;?>
</div>


<?=script_tag('uploads/js/__RECEIPTSTATUS.js')?>
<?=script_tag('uploads/js/__USAGE.js')?>
<?=script_tag('uploads/js/__COUNTRY.js')?>

<script>
    var tbreceipt;
    $(function(){
        tbreceipt = comm.dt({
            ele : $('.tb_project_receipit'),
            paging : false,
            bInfo:false,
            url : "/declares/receipt/load_page?id=<?=$Id?>",
            columns:['receiptdate','payername','payercountry','currency','amount','exchangerate',null,'usage','status','note'],
            columnDefs : [
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,140)
                    }
                },
                { aTargets:[4],
                    mRender:function(data,full){
                        return data > 0 ? comm.fMoney(data,2) : data
                    }
                },
                { aTargets:[2],
                    mRender:function(data,full){
                        return comm.dictionary(__COUNTRY,data)
                    }
                },
                { aTargets:[7],
                    mRender:function(data,full){
                        return comm.dictionary(__USAGE,data)
                    }
                },
                { aTargets:[6],
                    mRender:function(data,full) {
                        return (comm.fMoney(full.amount * full.exchangerate,2));
                    }
                },
                { aTargets:[8],
                    mRender:function(data,full){
                        return comm.dictionary(__RECEIPTSTATUS,data)
                    }
                },
                { aTargets:[9],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,120,'left')
                    }
                },
                {
                    aTargets:[10],
                    mRender:function(data,full){
                        var buttons = '';
                        <?php if( $project['status'] != 2 ): ?>

                            <?php if( $is_has_receipt_rollcopy ) : ?>
                                buttons += ( full.amount > 0 ) ? ( ` <a href="/declares/receipt/rollcopy?id=${full.id}" class="label bg-primary-300 hModal" data-call="load_receipts_data" lang="收入转出" data-text="确认转出"> 转出 </a> ` ) : '';
                            <?php endif;?>

                            <?php if( $is_has_receipt_apply ) : ?>
                                if ( (full.status == 1 || full.status == 2) && full.amount > 0) {
                                    buttons += ` <a href="/declares/receipt/apply?id=${full.id}" class="label bg-info-300" onclick="return comm.confirmCTL(this.href,'确认申请查看水单',(resp)=>{load_receipts_data()})"> 申请水单 </a> `;
                                }
                            <?php endif;?>

                            <?php if( $is_has_receipt_upfiles ) : ?>
                                if ( full.status == 3 ) {
                                    buttons += ` <a href="/declares/receipt/upfiles?id=${full.id}" class="label bg-success-300 hModal" data-call="load_receipts_data"> 上传水单 </a> `;
                                }
                            <?php endif;?>

                        <?php endif;?>

                        <?php if( $is_has_receipt_viewdoc ) : ?>
                            if ( full.exchangerate > 0 && full.amount > 0 ) {
                                buttons += ` <a href="/declares/receipt/viewdoc?id=${full.id}" class="label bg-success-300" target="_blank"> 查看水单 </a> `;
                            }
                        <?php endif;?>

                        <?php if( $is_has_receipt_delete ) : ?>
                            buttons += ` <a href="/declares/receipt/delete?id=${full.id}" class="label bg-danger-300" onclick="return comm.confirmCTL(this.href,'确认删除该记录?',(resp)=>{load_receipts_data()})"> 删除 </a> `;
                        <?php endif;?>

                        return `<div class="text-right">${buttons}</div>`;
                    }
                },
            ]
        });
    });
    function load_receipts_data(){
        tbreceipt.fnReloadAjax("/declares/receipt/load_page?id=<?=$Id?>");
    }
</script>
