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

<script type="text/javascript" src="/resource/assets/js/plugins/forms/inputs/passy.js"></script>
<body>
<!-- Page container -->
<div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                <!-- Simple login form -->
                <form class="frm_passwd" action="/passwd/<?=$token?>">
                    <div class="panel panel-body login-form" id="body1">
                        <input type="hidden" name="token" value="<?=$token?>">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-hour-glass"></i></div>
                            <h5 class="content-group">密码重置</h5>
                            <small class="display-block">请输入新密码进行重置!</small>
                        </div>

                        <p></p>

                        <div class="form-group has-feedback has-feedback-left label-indicator-absolute">
                            <div class="form-control-feedback">
                                <i class="icon-user-block text-muted"></i>
                            </div>
                            <input class="form-control" placeholder="登录帐户" disabled aria-required="true" value="<?=substr($data["username"],0,1).'***'.substr($data["username"],-1)?>">
                        </div>

                        <div class="form-group has-feedback has-feedback-left label-indicator-absolute">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            <input type="password" class="form-control" placeholder="新密码" name="newpasswd" id="newpasswd" required="required" aria-required="true">
                            <span class="label password-indicator-label-absolute"></span>
                        </div>

                        <div class="form-group has-feedback has-feedback-left label-indicator-absolute">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            <input type="password" class="form-control" placeholder="重复密码" name="repasswd" required="required" aria-required="true">
                            <span class="label password-indicator-label-absolute"></span>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">重置密码<i class="icon-circle-right2 position-right"></i></button>
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

<script>

    $('.frm_passwd').toSubmit({
        rules : {
            repasswd: {
                equalTo: "#newpasswd"
            }
        },
        messages : {
            repasswd : {
                equalTo:'两次密码输入不一致'
            }
        },
        success : function (resp) {
            comm.Alert(resp.msg);
            if ( resp.code ) {
                setTimeout(()=>{
                    window.location.href = '/login'
                },3000);
            }
        },
        error : function (resp) {
            comm.Alert(resp.msg,false)
        }
    })
</script>

</body>
</html>