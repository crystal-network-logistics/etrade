<?=script_tag('uploads/js/__VIISTATUS.js')?>
<?php
    $isentrance = $project?$project['isentrance']:(isset($_REQUEST['isentrance']) ? $_REQUEST['isentrance'] : 0);
    // 业务报关,上传备案单证 权限
    $has_project_download = ck_action('declares/project/download_entry');

    $is_has_vii_create = ck_action('declares/vii/create');
    $is_has_vii_edit = ck_action('declares/vii/update');
    $is_has_vii_confirm = ck_action('declares/vii/confirm');
    $is_has_vii_accept = ck_action('declares/vii/accept');
    $is_has_vii_rollcopy = ck_action('declares/vii/rollcopy');
    $is_has_vii_viewdoc = ck_action('declares/vii/viewdoc');
    $is_has_vii_delete = ck_action('declares/vii/delete');

    // 申请退税
    $is_has_apply_taxrefund = ck_action('declares/project/apply_taxrefund');
    // 确认申请退税
    $is_has_confirm_taxrefund = ck_action('declares/project/confirm_taxrefund');
    // 拒绝申请退税
    $is_has_refuse_taxrefund = ck_action('declares/project/refuse_taxrefund');
    // 增票收齐
    $is_has_finish_vii = ck_action('declares/project/finish_vii');

?>
<div class="content">
    <div class="panel">
        <table class="table table-hover tb_project_vii">
            <thead>
            <tr>
                <th width="110px">中文品名</th>
                <th width="80px">数量</th>
                <th width="60px">单位</th>
                <th width="100px">开票金额</th>
                <th width="60px">退税率</th>
                <th width="140px"><?=((isset($project['isentrance']) && $project['isentrance']==1) ? '收票人' : '开票人')?>公司名称</th>
                <th width="80px">日期</th>
                <th width="60px">货款状态</th>
                <th width="60px">状态</th>
                <th width="130px">备注</th>
                <th width="60px" class="text-right">操作</th>
            </tr>
            </thead>
        </table>
    </div>
    <div>
        <?php if( $project && $project["taxrefund"] != 4 && $project["viistatus"] == 0 && ( $project["status"] != 2 ) && $is_has_vii_create ): ?>
            <a class="btn bg-<?=$project['isentrance']?'indigo-300':'primary'?> hModal" href="/declares/vii/create?projectid=<?=$project['ID']?>&customerid=<?=$project['customerid']?>&isentrance=<?=$isentrance?>" data-call="load_vii_data" data-text="保存">
                <i class="icon icon-add"></i> <?=$isentrance?'申请开票':'添加增票'?>
            </a>
        <?php endif;?>

        <?php if( $has_project_download && $entry && $entry["status"] > 2 && $isentrance == 0 ) :?>
            <?php $buttons =[ ["tag"=>"a","text"=>"打包下载","cssClass"=>"btn btn-success" , "attrs"=> ["href"=>"/declares/project/viipackdownload?id={$project['ID']}","target"=>"_blank"]]];?>
            <a class="btn btn-success hModal" href="/declares/vii/down_vii_invoicer?id=<?=$project['ID']?>" data-buttons='<?=json_encode($buttons)?>'>下载开票资料</a>
        <?php endif;?>

        <?php if( $is_has_apply_taxrefund && vii_apply_taxrefund( $data ) ): ?>
            <?php if($data['entry'] && ( $data['entry']['fileht'] && $data['entry']['filetrade'] && $data['entry']['filepak'] ) && $data['entry']['archives'] == 1 ): ?>
                <a class="btn btn-primary" href="/declares/project/apply_taxrefund?id=<?=$project['ID']?>" onclick="return comm.confirmCTL(this.href,'是否申请退税?',(resp)=>{ setTimeout(()=>{window.location.reload()},3000) })">申请退税</a>
            <?php endif; ?>
        <?php endif; ?>

        <?php if( ckAuth(false) && $project && $project['taxrefund'] == 3 ): ?>
            <?php if( $is_has_confirm_taxrefund ):?>
                <a class="btn btn-primary" href="/declares/project/confirm_taxrefund?id=<?=$project['ID']?>" onclick="return comm.confirmCTL(this.href,'是否确认通过申请退税?',(resp)=>{ setTimeout(()=>{window.location.reload()},3000) })">批准申请退税</a>
            <?php else: ?>
                <a class="btn btn-info" href="javascript:;">退税确认中</a>
            <?php endif;?>

            <?php if( !$is_has_refuse_taxrefund ): ?>
                <a class="btn btn-primary" href="/declares/project/refuse_taxrefund?id=<?=$project['ID']?>" onclick="return comm.confirmCTL(this.href,'是否拒绝申请退税?',(resp)=>{ setTimeout(()=>{window.location.reload()},3000) })">拒绝申请退税</a>
            <?php endif; ?>
        <?php endif;?>

        <?php if(ckAuth() && $project && $project['taxrefund'] == 3):?>
            <a class="btn btn-info" href="javascript:;">退税审核中</a>
        <?php endif;?>

        <?php if($is_has_finish_vii && confirm_finish_vii($data)):?>
            <a class="btn btn-success" href="/declares/project/finish_vii?id=<?=$project['ID']?>" onclick="return comm.confirmCTL(this.href,'是否增票收齐?',(resp)=>{ setTimeout(()=>{window.location.reload()},3000) })">增票收齐</a>
        <?php else: ?>
            <?php if( $project['viistatus'] == 1 ): ?>
                <a class="btn btn-default">增票已收齐</a>
            <?php endif;?>
        <?php endif;?>

        <?php if( $project && $project['taxrefundreason'] ):?>
            <span class="text-danger ml-20">
                <?php if( in_array($project['taxrefund'] , [4,5]) ): ?>
                    退税申请状态: <?=\App\Libraries\LibComp::get_dict('TAXREFUND',$project['taxrefund'])?>
                    <span>，理由：<?=$project['taxrefundreason'];?></span>
                <?php endif;?>
            </span>
        <?php endif;?>
    </div>
</div>
<script>
    var tbvii;
    $(function(){
        tbvii = comm.dt({
            ele : $('.tb_project_vii'),
            url : "/declares/vii/load_page?id=<?=$project['ID']?>",
            paging : false,
            bInfo:false,
            columns : ['productname','amount','unit','invoiceamount','taxreturnrate','invoicer','createtime','paystatus','status','note'],
            columnDefs : [
                { aTargets:[0,5],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,160)
                    }
                },
                { aTargets:[1],
                    mRender:function(data,full){
                        return data > 0 ? comm.fMoney(data,0) : data
                    }
                },
                { aTargets:[3],
                    mRender:function(data,full){
                        return data > 0 ? comm.fMoney(data,2) : data
                    }
                },
                {
                    aTargets:[7],
                    mRender:function(data,full){
                        if( full.paystatus  > 0 ){
                            return `<span class="label bg-info-300" data-placement="right"  data-popup="tooltip-ellipsis" title="应付${comm.fMoney(full.paystatus)}元">应付</span>`
                        }else if( full.paystatus < 0 ){
                            return `<span class="label bg-orange-300" data-placement="right"  data-popup="tooltip-ellipsis" title="预付${comm.fMoney(-full.paystatus)}元">预付</span>`
                        }else if( full.paystatus === "0" || full.paystatus === 0 ){
                            return '<span  class="label bg-success-300" data-placement="right"  data-popup="tooltip-ellipsis" title="增票与付款金额一致">一致</span>'
                        }
                        return '--';
                    }
                },
                { aTargets:[8],
                    mRender:function(data,full){
                        return comm.dictionary(__VIISTATUS,data)
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
                        <?php if( $project['status'] != 2 ) :?>
                            if ( full.status == "1" && full.amount > 0) {
                                <?php if( $is_has_vii_edit ) :?>
                                    buttons += ` <a href="/declares/vii/update?id=${full.id}" class="label bg-primary-300 hModal" data-call="load_vii_data">编辑</a> `;
                                <?php endif;?>

                                <?php if( ( ckAuth('finance') || $is_has_vii_confirm )) : ?>
                                    buttons += ` <a href="/declares/vii/confirm?id=${full.id}" class="label bg-success-300" onclick="return comm.confirmCTL(this.href,'是否审核通过?',( resp )=>{ load_vii_data(); })">确认</a> `;
                                <?php endif;?>
                            }
                            if (full.status == "2") {
                                <?php if( ( ckAuth('operator') || ckAuth() ) && $is_has_vii_accept) : ?>
                                    buttons += ` <a href="/declares/vii/accept?id=${full.id}" class="label bg-success-300" onclick="return comm.confirmCTL(this.href,'是否确认通过?',( resp )=>{ load_vii_data(); })">认可</a> `;
                                <?php endif;?>
                            }
                            if(full.status >= 3 && full.amount > 0) {
                                <?php if( $is_has_vii_rollcopy && $project["taxrefund"] != 4) :?>
                                buttons += ` <a href="/declares/vii/rollcopy?id=${full.id}" class="label bg-primary-300 hModal" data-call="load_vii_data" lang="${full.productname} 转出">转出</a> `;
                                <?php endif;?>
                            }
                        <?php endif;?>

                        if (full.status > 2) {
                            buttons += ` <a href="/declares/vii/viewvii?id=${full.id}" class="label bg-success-300">查看</a> `;
                        }
                        <?php if( $is_has_vii_delete ) :?>
                            buttons += `<a href="/declares/vii/delete?id=${full.id}" class="label bg-danger-300" onclick="return comm.confirmCTL(this.href,'是否删除该记录',(resp)=>{load_vii_data();})">删除</a>`;
                        <?php endif;?>

                        return `<div class="text-right">${buttons}</div>`;
                    }
                },
            ]
        });
    });
    function load_vii_data(){
        tbvii.fnReloadAjax("/declares/vii/load_page?id=<?=$project['ID']?>");
    }
</script>
