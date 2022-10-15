<?php
$data = $data['detail'];
?>
<form class="form-horizontal frm_bz_stamp" action="/declares/stamp/merge/bz">
    <input type="hidden" name="id" value="<?=$data?$data['id']:''?>">

    <?php if( ckAuth(false) ): ?>
    <div class="form-group">
        <label class="col-md-2 control-label"> 客户信息 </label>
        <div class="col-md-10">
            <?=\App\Libraries\LibComp::get_customer(['class' => 'select','name' => 'customerid'],$data ? $data['customerid'] : '')?>
        </div>
    </div>
    <?php endif; ?>

    <div class="form-group">
        <label class="col-md-2 control-label"> 业务单号 </label>
        <div class="col-md-10">
            <?php if ( ckAuth() ): ?>
                <?=\App\Libraries\LibComp::get_available(['class'=>'select','name'=>'projectid'],['status'=>1,'isentrance'=>0,'customerid'=>session('custId')])?>
            <?php else :?>
                <select name="projectid" class="select"><option value="">--业务单号--</option></select>
            <?php endif;?>
        </div>
    </div>

</form>

<script>
    $('.frm_bz_stamp select').select2();
    $(function () {
        <?php if( ckAuth(false) ): ?>
        $('.frm_bz_stamp select[name=customerid]').on('change',function () {
            var customerid = $(this).val();
            comm.doRequest('/declares/project/available',{customerid:customerid},( resp )=>{
                var opts = '<option value="">--业务单号--</option>';
                $.each(resp.data,function (k,v) {
                    opts += `<option value="${v.ID}">${v.BusinessID}</option>`;
                });
                $('.frm_bz_stamp select[name=projectid]').html(opts).val('').trigger('change');
            },'json');
        });

        var cb = new Promise((resolve ,reject) => {setTimeout(function(){resolve()},200);});
        cb.then(()=>{$('.frm_bz_stamp select[name=customerid]').val('<?=$data['customerid']?>').trigger('change')}).then(()=>{
            $('.frm_bz_stamp select[name=projectid]').val('<?=$data['projectid']?>').trigger('change')
        });
        <?php endif; ?>
    });
</script>
