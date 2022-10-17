<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-touch-fullscreen" content="yes"/>
    <meta name="format-detection" content="email=no" />
    <meta name="wap-font-scale"  content="no" />
    <meta name="viewport" content="user-scalable=no, width=device-width" />
    <meta content="telephone=no" name="format-detection" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=APPNAME?></title>
    <?=view('/Layout/assets')?>
</head>

<body class="ax-align-origin">
<!-- Page container -->
<div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                <!-- Simple login form -->
                <form class="frm_forget">
                    <div class="panel panel-body login-form div_forget">

                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-mail5"></i></div>
                            <h5 class="content-group">忘记密码</h5>
                            <small class="display-block">请输入注册邮箱，系统将会给您发送一封邮件，内含可用于重置密码的链接。</small>
                        </div>

                        <p> </p>

                        <div class="form-group has-feedback has-feedback-left">
                            <div class="form-control-feedback">
                                <i class="icon-mail5 text-muted"></i>
                            </div>
                            <input type="email" class="form-control" placeholder="邮箱地址" name="email" class="form-control" required="required" aria-required="true">
                        </div>

                        <div class="form-group">
                            <a href="/auth/send/<?=create_form()?>" onclick="return comm.doRequest(this.href,{email:$('input[name=email]').val()},(resp)=>{ comm.Alert(resp.msg,resp.code); if ( resp.code ) { setTimeout(()=>{ $('.div_forget').hide(); $('#body2').show(); },1000) } },'json')" class="btn btn-primary btn-block">请求重置<i class="icon-circle-right2 position-right"></i> </a>
                        </div>

                        <div class="text-center">
                            <a href="/login"> 我有密码 </a> | <a href="/login"> 注册帐户 </a>
                        </div>

                    </div>

                    <div class="panel panel-body login-form" id="body2" style="display: none;">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-paperplane"></i></div>
                            <h5 class="content-group">激活链接已发送!</h5>
                            <small class="display-block">链接已发送至您邮箱里,请到邮箱进行帐户激活!</small>
                        </div>
                    </div>

                </form>
                <!-- /simple login form -->

            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</div>
</body>

</html>