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
    <?=script_tag('resource/assets/js/core/libraries/jquery.min.js')?>
    <?=script_tag('resource/app/form_validation.js')?>
    <?=script_tag('resource/assets/js/plugins/forms/validation/validate.min.js')?>
    <?=script_tag('resource/assets/js/plugins/forms/validation/localization/messages_zh.js')?>
    <?=script_tag('resource/app/form_validation.js')?>
    <?=script_tag('resource/app/jsent.min.js')?>
    <?=script_tag('resource/app/comm.js')?>

    <link href="/resource/assets/css/ax.css" rel="stylesheet" type="text/css" >
    <link href="/resource/assets/css/ax-response.css" rel="stylesheet" type="text/css" >
    <link href="/resource/assets/css/ax-login-main.css" rel="stylesheet" type="text/css">
    <style>
        input.error,textarea.error,.select.error  {border: 1px solid rgba(248, 63, 5, 0.66); transition: border-color ease-in-out .45s, box-shadow ease-in-out .45s;background-color:#e49e8814;}
        label.error,.validation-error{border-radius: 3px;padding:1px 5px;top: 18%;right: 10px; color: #820909;/*border: 1px solid rgba(248, 63, 5, 0.66);*/ transition: border-color ease-in-out .45s, box-shadow ease-in-out .45s;background-color:#e49e8814;position: absolute;}
        label.error{}
        input{ background: rgba(0,0,0,0.7); }

    </style>
</head>

<body class="ax-align-origin" style="background-image: url('/resource/zhuce/images/new_bg.png');justify-content:center;">

<div class="login ax-shadow-cloud ax-radius-md" style="width: 461px;background: rgba(141,137,137,0.5);">
    <div class="ax-row ax-radius-md ax-split">
<!--        <div class="ax-col ax-col-14 ax-radius-left ax-radius-md cover"></div>-->
        <div class="ax-col ax-col-12">
            <div class="core">
                <div class="ax-break"></div>
                <div class="ax-tab" axTab>
                    <ul class="ax-row ax-tab-nav ax-menu-tab">
                        <a href="#" class="ax-item" style="color: #fff;font-size: 24px;">行业兄弟登录</a>
                        <li class="ax-col"></li>
                    </ul>

                    <ul class="ax-tab-content">
                        <li>
                            <form class="form-horizontal frm_login" action="/sigin">
                                <input type="hidden" name="url" id="url">
                                <div class="ax-break"></div>
                                <div class="ax-break ax-hide-tel"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input">
                                                <span class="ax-pos-left" style="width: 2.4rem;"><i class="ax-iconfont ax-icon-me-f"></i></span>
                                                <input name="username" value="admin" placeholder="输入登录名称" type="text" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ax-break-md"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input">
                                                <span class="ax-pos-left" style="width:2.4rem;"><i class="ax-iconfont ax-icon-lock-f"></i></span>
                                                <input name="password" placeholder="输入密码" type="password" required="required"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ax-break-md"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input">
                                                <div class="ax-row">
                                                    <div class="ax-flex-block">
                                                        <span class="ax-pos-left" style="width:2.4rem;"><i class="ax-iconfont ax-icon-shield-f"></i></span>
                                                        <input name="code" placeholder="输入验证码..." required="required" value="" autocomplete="off" type="text" minlength="4" maxlength="4">
                                                    </div>
                                                    <a class="ax-form-img" href="javascript:;"><img src="/home/captcha?_=<?=time()?>" onclick="this.src='/home/captcha?_=<?=time()?>'"></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="ax-break-md"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input">
                                                <div class="ax-row">
                                                    <div class="ax-flex-block">
                                                        <label class="ax-checkbox ax-color-white"><input name="free_agree" type="checkbox" ><span>记住密码</span></label>
                                                    </div>
                                                    <a href="/forget" class="ax-form-txt ax-color-white" >忘记了密码？</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ax-break-md"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-flex-block">
                                            <div class="ax-form-input"><button type="submit" class="ax-btn ax-primary ax-full">登录</button></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ax-break"></div>
                                <div class="ax-break ax-hide-tel"></div>
                                <div class="ax-break ax-hide-tel"></div>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="/resource/app/ax.min.js" type="text/javascript"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script>
    let not_en_passwd , username;
    $('.frm_login').toSubmit({
        before : function ( form ) {
            var passwd = $('.frm_login').find('input[name=password]');
            not_en_passwd = passwd.val();
            passwd.val(comm.encrypt(passwd.val()));
            username = $('.frm_login input[name=username]').val();
            $('#url').val((comm.queryString('url') ? comm.queryString('url') : ''));
        },
        success : function ( resp ) {
            comm.keep_passwd($('input[name=free_agree]') , username , not_en_passwd );
            window.location.href = resp.url;
        },
        error : function (resp){
            alert(resp.msg);
            $('.frm_login input[name=password]').val('')
        }
    });

</script>
</body>
<style>
    @media screen and (max-width: 900px) {
        body.ax-align-origin {
            /*background-image: none;*/
            display: flex;
        }
        .ax-row{
            border-radius: 10px;
        }
        .ax-shadow-cloud{
            margin-right: 0px
        }
    }
</style>
</html>
