<form id="frm_change_phone" action="/declares/customer/change" class="form-horizontal">
    <input type="hidden" value="<?=$data['id']?>" name="customerid">
    <div class="form-group">
        <label class="control-label col-lg-3">原手机号<span class="text-danger">*</span> </label>
        <div class="col-lg-9">
            <input class="form-control" placeholder="请输入需要原手机号 <?=mobile_hide($data['phone'])?>" name="original_phone" required="required" maxlength="11">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-lg-3">图片验证码 <span class="text-danger">*</span> </label>
        <div class="col-lg-9">
            <div class="input-group">
                <input class="form-control" placeholder="请输入 图片验证码" name="captcha" required="required" maxlength="4">
                <a type="button" class="input-group-addon btn_send_sms" style="padding: 0px">
                    <img src="/home/captcha?_=<?=time()?>" onclick="this.src='/home/captcha?_=<?=time()?>'" style="height: 33px;">
                </a>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-lg-3">新手机号码<span class="text-danger">*</span> </label>
        <div class="col-lg-9">
            <div class="input-group">
                <input class="form-control" placeholder="请输入需要绑定的手机号" name="new_phone" required="required" maxlength="11">
                <a type="button" class="input-group-addon btn_change_send_sms">获取验证码</a>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-lg-3">短信验证码<span class="text-danger">*</span> </label>
        <div class="col-lg-9">
            <input class="form-control" placeholder="请输入 短信验证码" name="code" required="required" maxlength="6">
        </div>
    </div>
</form>
<script>
    var btn_sms = document.querySelector('.btn_change_send_sms');
    btn_sms.addEventListener('click', function() {
        var reg = (/^1[3456789]{1}\d{9}$/) ,original = $('#frm_change_phone input[name=original_phone]').val(), phone = $('#frm_change_phone input[name=new_phone]').val() , captcha = $('#frm_change_phone input[name=captcha]').val();
        if ( !original || reg.test(original) ) {comm.Alert('请输入原手机号',false); return false;}
        if ( !captcha ) {comm.Alert('请输入图片字符验证码');return false;}
        if ( !reg.test(phone) ) {comm.Alert('请输入正确的手机号',false); return false;}
        comm.countdown( btn_sms , function () {
            comm.doRequest('/auth/change_bind_sms',{phone : phone , captcha : $('#frm_change_phone input[name=captcha]').val() },(resp)=>{comm.Alert(resp.msg,resp.code)},'json');
        });
    });
</script>
