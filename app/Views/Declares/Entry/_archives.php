<?php
    $model = isset( $data['detail'] ) ? $data['detail'] : false;
?>
<form id="frm_archives_upload" action="/declares/project/archivesup">
    <input name="id" value="<?=$model['id']?>" type="hidden">

    <div class="form-group">
        <p class="text-semibold">供货合作合同：<span class="text-muted">下载开票处可下载《供货合作合同》,请打印并盖章后在此处上传。</span></p>
        <?=\App\Libraries\LibComp::upload_compents(['name'=>'fileht','nums'=>9,'fit'=>'"pdf","doc","docx","xls","xlsx","jpg","jpeg","png","gif"','display'=>($model['archives']==1)], explode(',', $model['fileht'] ) )?>
        <p class="mt-10"><input  class="form-control" type="text" name="htmark" value="<?=$model["htmark"];?>" placeholder="供货合作合同 "></p>
    </div>

    <div class="form-group">
        <p class="text-semibold" style="font-weight: bold;">运输单据：<span class="text-muted">此运输单据是指由港口运输至国外的物流单据,请在通关办理完毕后30天内上传。</span></p>
        <?=\App\Libraries\LibComp::upload_compents(['name'=>'filetrade','nums'=>9,'fit'=>'"pdf","doc","docx","xls","xlsx","jpg","jpeg","png","gif"','display'=>($model['archives']==1)], explode(',', $model['filetrade'] ) )?>
        <p class="mt-10"><input  class="form-control" type="text" name="trademark" value="<?=$model["trademark"];?>" placeholder="供货合作合同 备注"></p>
    </div>

    <div class="form-group">
        <p class="text-semibold" style="font-weight: bold;">装货单/放行条：<span class="text-muted"></span></p>
        <?=\App\Libraries\LibComp::upload_compents(['name'=>'filepak','nums'=>9,'fit'=>'"pdf","doc","docx","xls","xlsx","jpg","jpeg","png","gif"','display'=>($model['archives']==1)], explode(',', $model['filepak'] ) )?>
        <p class="mt-10"><input  class="form-control" type="text" name="pakmark" value="<?=$model["pakmark"];?>"  placeholder="装货单/放行条 备注"></p>
    </div>
    <input type="hidden" name="type" id="htype">
    <button type="submit" style="display: none;" class="btn_archives_submit"></button>
</form>
<script>
    $('#frm_archives_upload').toSubmit({
        success : function ( resp ) {
            comm.Alert(resp.msg);
            comm.closeModal();
        },
        error : function ( resp ) {
            comm.Alert(resp.msg,false);
        }
    });
    function archivesup( type ){
        $('#htype').val(type);
        $('.btn_archives_submit').click();
    }
</script>
