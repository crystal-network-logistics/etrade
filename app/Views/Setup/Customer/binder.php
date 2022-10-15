<form id="frm_customer_bind_phone" action="/declares/customer/binder" class="form-horizontal">
    <input type="hidden" value="<?=$data['id']?>" name="customerid">

    <div class="form-group">
        <label class="control-label col-lg-3">图片验证码 <span class="text-danger">*</span> </label>
        <div class="col-lg-9">
            <div class="input-group">
                <input class="form-control" placeholder="请输入 图片验证码" name="captcha">
                <a type="button" class="input-group-addon" style="padding: 0px"><img src="/home/captcha?_=<?=time()?>" onclick="this.src='/home/captcha?_=<?=time()?>'" style="height: 33px;"></a>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-lg-3">手机号码<span class="text-danger">*</span> </label>
        <div class="col-lg-9">
            <div class="input-group">
                <input class="form-control" placeholder="请输入需要 绑定的手机号" name="phone" required="required">
                <a type="button" class="input-group-addon btn_binder_send_sms">获取验证码</a>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-lg-3">短信验证码<span class="text-danger">*</span> </label>
        <div class="col-lg-9">
            <input class="form-control" placeholder="请输入 短信验证码" name="code" required="required">
        </div>
    </div>

</form>

<script>
    var btn_binder_sms = document.querySelector('.btn_binder_send_sms');
    btn_binder_sms.addEventListener('click', function() {
        var reg = (/^1[3456789]{1}\d{9}$/) , phone = $('#frm_customer_bind_phone input[name=phone]').val() , captcha = $('#frm_customer_bind_phone input[name=captcha]').val();

        if ( !captcha ) {comm.Alert('请输入图片字符验证码');return false;}
        if ( !reg.test(phone) ) {comm.Alert('请输入正确的手机号',false); return false;}

        comm.countdown( btn_binder_sms , function () {
            comm.doRequest('/auth/change_bind_sms',{phone : phone , captcha : $('#frm_customer_bind_phone input[name=captcha]').val() },(resp)=>{comm.Alert(resp.msg,resp.code)},'json');
        });
    });
</script>
