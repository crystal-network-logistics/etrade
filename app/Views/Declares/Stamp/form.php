<?php
$model = isset( $data['detail'] ) ? $data['detail'] : false;
?>
<link href="/resource/assets/css/filesPlugin.css?_=<?php echo time()?>" type="text/css" rel="stylesheet"/>
<script src="/resource/app/filesPlugin.js?_=<?php echo time()?>"></script>
<form class="form-horizontal frm_stamp" action="/declares/stamp/save">
    <input type="hidden" name="id" value="<?=$model?$model['id']:''?>">

    <?php if( ckAuth(false) ): ?>
        <div class="form-group">
            <label class="col-md-3 control-label"> 客户信息 </label>
            <div class="col-md-9">
                <?=\App\Libraries\LibComp::get_customer(['class' => 'select','name' => 'customerid'],$model ? $model['customerid'] : '')?>
            </div>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label class="col-md-3 control-label"> 业务单号 </label>
        <div class="col-md-9">
            <?php if ( ckAuth() ): ?>
            <?=\App\Libraries\LibComp::get_available(['class'=>'select','name'=>'projectid'],['status'=>1,'isentrance'=>0,'customerid'=>session('custId')])?>
            <?php else :?>
            <select name="projectid" class="select"><option value="">--业务单号--</option></select>
            <?php endif;?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label"> 备注 </label>
        <div class="col-md-9">
            <textarea name="remark" class="form-control" placeholder="盖章备注"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label"> 盖章文件 </label>
        <div class="col-md-9">
            <?=\App\Libraries\LibComp::upload_compents(['name'=>'original','fit'=>'"jpg", "jpeg" , "png", "pdf", "doc", "xls", "xlsx"','nums'=>1,'action' => 'stamp','action'=>'do/stamp'])?>
        </div>
    </div>
</form>

<script>
    $('.frm_stamp select').select2();

    <?php if( ckAuth(false) ): ?>
    $('.frm_stamp select[name=customerid]').on('change',function () {
        var customerid = $(this).val();
        comm.doRequest('/declares/project/available',{customerid:customerid},( resp )=>{
            var opts = '<option value="">--业务单号--</option>';
            $.each(resp.data,function (k,v) {
                opts += `<option value="${v.ID}">${v.BusinessID}</option>`;
            });
            $('.frm_stamp select[name=projectid]').html(opts).val('').trigger('change');
        },'json');
    });
    <?php endif; ?>
</script>
