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
    </style>
</head>

<body class="ax-align-origin">

<div class="login ax-shadow-cloud ax-radius-md">
    <div class="ax-row ax-radius-md ax-split">
        <div class="ax-col ax-col-14 ax-radius-left ax-radius-md cover"></div>
        <div class="ax-col ax-col-12">
            <div class="core">
                <div class="ax-break"></div>
                <div class="ax-tab" axTab>
                    <ul class="ax-row ax-tab-nav ax-menu-tab">
                        <a href="#" class="ax-item">登录账号</a>
                        <a href="#" class="ax-item">注册新用户</a>
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
                                                    <a href="###" class="ax-form-img"><img src="/home/captcha?_=<?=time()?>" onclick="this.src='/home/captcha?_=<?=time()?>'"></a>
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
                                                        <label class="ax-checkbox"><input name="free_agree" type="checkbox"><span>记住密码</span></label>
                                                    </div>
                                                    <a href="/forget" class="ax-form-txt ax-color-ignore">忘记了密码？</a>
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
                        <li>
                            <form class="frm_reg" action="/register">
                                <div class="ax-break"></div>
                                <div class="ax-break ax-hide-tel"></div>
                                <input name="guid" type="hidden" value="<?=create_form()?>">
                                <input name="sid" type="hidden" value="<?=(isset($_REQUEST['sid']) && $_REQUEST['sid']) ? $_REQUEST['sid'] : 'etrade' ?>">

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input">
                                                <span class="ax-pos-left" style="width: 2.4rem;"><i class="ax-iconfont ax-icon-me-f"></i></span>
                                                <input name="username" placeholder="输入帐户名称" type="text" required="required" minlength="4" maxlength="32" remote="/auth/check/username">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ax-break-md"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input"><span class="ax-pos-left" style="width:2.4rem;"><i class="ax-iconfont ax-icon-lock-f"></i></span>
                                                <input name="password" placeholder="输入密码" type="password" required="required" minlength="6" id="password">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ax-break-md"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input"><span class="ax-pos-left" style="width:2.4rem;"><i class="ax-iconfont ax-icon-lock-f"></i></span>
                                                <input name="repasswd" placeholder="再次输入密码" type="password" required="required" minlength="6">
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
                                            <div class="ax-form-input">
                                                <div class="ax-row">
                                                    <div class="ax-flex-block">
                                                        <span class="ax-pos-left" style="width:2.4rem;"><i class="ax-iconfont ax-icon-telephone"></i></span>
                                                        <input name="tel" placeholder="手机号" digits="digits" type="text" minlength="11" required="required" maxlength="11" remote="/auth/check/tel">
                                                    </div>

                                                    <div class="ax-form-btn ">
                                                        <button class="ax-btn ax-success btn-code" type="button"> 发送短信 </button>
                                                    </div>

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
                                                <span class="ax-pos-left" style="width:2.4rem;"><i class="ax-iconfont ax-icon-shield-f"></i></span>
                                                <input name="code" placeholder="输入验证码..." value="" digits="digits" type="text" minlength="6" maxlength="6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ax-break-md"></div>

                                <div class="ax-form-group">
                                    <div class="ax-flex-row">
                                        <div class="ax-form-con">
                                            <div class="ax-form-input">
                                                <span class="ax-pos-left" style="width:2.4rem;"><i class="ax-iconfont ax-icon-home"></i>
                                                </span>
                                                <input name="companyname" placeholder="公司名称(SOHO请注明)" type="text" required="required">
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
            repasswd : {
                equalTo:'两次密码输入不一致'
            }
        },
        success : function (resp) {
            if ( resp.code ) {
                alert(resp.msg);
                window.location.reload();
            }
        },
        error : function (resp) {
            alert(resp.msg)
        }
    })

    var btn = document.querySelector('.btn-code');
    btn.addEventListener('click', function() {
        if (comm.time == 60) {
            var tel = $('.frm_reg input[name=tel]').val();
            $('.frm_reg input[name=code]').removeAttrs('required');
            var regPhone = /^1[3456789]{1}\d{9}$/; //手机正则
            if (tel && regPhone.test(tel) && $('.frm_reg').validate().form()) {
                btn.disabled = true;
                $('.frm_reg input[name=code]').attr('required', 'required');
                comm.countdown(btn, function () {comm.doRequest('/auth/sms/reg',{tel:tel},(resp)=>{ alert(resp.msg);},'json');});
            } else {
                alert('请填写正确的手机号 或 必填项')
            }
        }
    });

    $(function () {
        var oUser = $('.frm_login input[name=username]');
        var oPswd = $('.frm_login input[name=password]');
        var oRemember = $('.frm_login input[name=free_agree]');
        comm.init_keep_passwd(oUser,oPswd,oRemember);
    });
</script>
</body>

</html>
