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

    <title>一贸通行业兄弟账户注册</title>
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

<div class="login ax-shadow-cloud ax-radius-md" style="width: 461px;    background: rgba(141,137,137,0.5);">
    <div class="ax-row ax-radius-md ax-split">
<!--        <div class="ax-col ax-col-14 ax-radius-left ax-radius-md cover"></div>-->
        <div class="ax-col ax-col-12">
            <div class="core">
                <div class="ax-break"></div>
                <div class="ax-tab" axTab>
                    <ul class="ax-row ax-tab-nav ax-menu-tab">
                        <a href="#" class="ax-item" style="color: #fff;font-size: 24px">一贸通行业兄弟账户注册</a>
                        <li class="ax-col"></li>
                    </ul>
                    <ul class="ax-tab-content">
                        <li>
                            <form class="frm_reg" action="/zhuce">
                                <div class="ax-break"></div>
                                <div class="ax-break ax-hide-tel"></div>
                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input">
                                                <span class="ax-pos-left" style="width: 2.4rem;"><i class="ax-iconfont ax-icon-me-f"></i></span>
                                                <input name="username" placeholder="输入 登录帐户" type="text" required="required" minlength="4" maxlength="32" remote="/auth/check/username">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ax-break-md"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input"><span class="ax-pos-left" style="width:2.4rem;"><i class="ax-iconfont ax-icon-lock-f"></i></span>
                                                <input name="password" placeholder="输入 登录密码" type="password" required="required" minlength="6" id="password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ax-break-md"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input"><span class="ax-pos-left" style="width:2.4rem;"><i class="ax-iconfont ax-icon-email"></i></span>
                                                <input name="email" placeholder="电子邮箱" type="email" minlength="4" required="required" remote="/auth/check/email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ax-break-md"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input"><span class="ax-pos-left" style="width:2.4rem;"><i class="ax-iconfont ax-icon-people"></i></span>
                                                <input name="realname" placeholder="请输入 姓名" type="text" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ax-break-md"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input"><span class="ax-pos-left" style="width:2.4rem;"><i class="ax-iconfont ax-icon-telephone"></i></span>
                                                <input name="tel" placeholder="请输入 手机号" type="text" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ax-break-md"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input"><span class="ax-pos-left" style="width:2.4rem;"><i class="ax-iconfont ax-icon-share"></i></span>
                                                <input name="post" placeholder="请输入 职位" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ax-break-md"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input">
                                                <span class="ax-pos-left" style="width:2.4rem;"><i class="ax-iconfont ax-icon-home"></i></span>
                                                <input name="products" placeholder="业务分布" type="text" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ax-break-md"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-flex-block">
                                            <div class="ax-form-input"><button type="submit" class="ax-btn ax-primary ax-full">注册</button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ax-break"></div>
                                <div style="text-align: center;color: #fff">
                                    已有账号,<a href="/gologin" class="btn-reg" style="color: #fff">立即登录</a></div>
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

    $('.frm_reg').toSubmit({
        rules : {
            repasswd: {
                equalTo: "#password"
            }
        },
        messages : {
            username : {
                remote : '帐户名称已存在'
            },
            email : {
                remote : '邮箱已存在'
            },
            tel : {
                remote : '手机号已存在'
            },
        },
        success : function (resp) {
            if ( resp.code ) {
                alert('已成功注册,请耐心等待,我们尽快处理');
                window.location.reload();
            }
        },
        error : function (resp) {
            alert(resp.msg)
        }
    });
</script>
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
        }
    }
</style>
</body>

</html>
