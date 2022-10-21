<?php
namespace App\Controllers;

use App\Controllers\Base;
use App\Services\sms;

class Auth extends Base
{
    function __construct() {
    }

    // 判断是否存在记录
    public function check($field = ''){
        try {
            $valid = true;
            $db = new \App\Models\Admin\Users();
            $data = $db->where($field, $this->U($field))->first();
            if ( $data ) $valid = false;
            return json_encode($valid);
        }
        catch (\Exception $e) {
            return json_encode(false);
        }
    }

    // 发送短信
    public function sms( $type = '' ){
        try{
            $tel = $this->U('tel');
            if (!$tel) return $this->setError('请填写正确的手机号');
            $db = new \App\Models\Form();
            $code = rand(100000, 999999);
            $can_sms = false;
            $sms = new sms();
            // 注册
            if ( $type == 'reg' && !$db->from('admin_users',true)->where('tel',$tel)->first() ) {
                // 保存验证码
                $sms->create_very_code($code,$tel,$this->request);
                $can_sms = true;
            }
            // 发送短信
            $resp = $sms->send_verify($tel,'SMS_56570275',[$code,'一贸通']);
            if ( $can_sms ) return $this->toJson('短信已发送,请注意查收!');
            return $this->setError('短信发送失败');
        }catch (\Exception $e) {
            return $this->setError($e->getMessage());
        }
    }



    // 注册
    public function register(){
        try {
            $db = new \App\Models\Form();
            $sms = new sms();
            $P = $this->U();
            if ( !$P['code'] )  return $this->setError( '短信验证码错误' );

            $data = $db->where('code',$P['sid'])->first();
            $P['companyid'] = $data ? $data['id'] : 0;
            $P['source'] = 'WEB';
            $P['status'] = 1; $P['activated'] = 0 ;
            $resp = $sms->ck_very_code( $P['code'] , $P['tel'] ) ;
            // 验证码判断
            if ( !$resp['code'] )  return $this->setError( $resp['msg']);

            $udb = new \App\Models\Admin\Users();
            $udb->setValidationMessages($udb->validationMessages);

            if ( $udb->save( $P ) ) {
                return $this->toJson('注册成功, 感谢您的关注, 我们尽快与您联系');
            }
            return $this->setError( $udb->errors() );
        } catch ( \Exception $e ) {
            return $this->setError( $e->getMessage() );
        }
    }


    // 支付短信
    public function verification(){
        $this->actionAuth();
        try {
            $db = new \App\Models\Setup\Customer();
            $P = $this->U('customerid');
            $customerid = isset( $P['customerid'] ) ? $P['customerid'] : session('custId');
            if ( $customer_data = $db->where('id',$customerid)->first() ) {
                // 判断手机号是否正确
                if ( $customer_data['phone'] && ck_mobile( $customer_data['phone'] )  ) {
                    $sms = new sms();
                    $code = rand(100000, 999999);
                    // 保存验证码
                    $sms->create_very_code( $code,$customer_data['phone'],$this->request );
                    // 发送短信
                    $sms->send_verify($customer_data['phone'],'SMS_57190146',[$code,'一贸通']);
                    return $this->toJson('短信已发送,请注意查收!');
                }
            }
            return $this->setError('发送失败');
        }
        catch (\Exception $e) {
            return $this->setError($e->getMessage());
        }
    }

    // 更新新手机号 短信验证码
    public function change_bind_sms(){
        $this->actionAuth();
        try {
            $db = new \App\Models\Setup\Customer();
            $P = $this->U();
            $customerid = isset( $P['customerid'] ) ? $P['customerid'] : session('custId');
            // 判断难码是否正确
            if ( strtolower($_SESSION['authcode']) != strtolower($P['captcha']) ) return $this->setError('验证码错误,请重新输入!');
            // 判断手机号是否正确
            if ( !ck_mobile( $P['phone']) ) return $this->setError('请输入正确的手机号');
            // 判断手机号是否存在
            if ( $db->where('phone',$P['phone'])->first() ) return $this->setError('发送失败, 绑定的手机号已存在');
            // 判断客户信息是否存在
            if ( $customer_data = $db->where('id',$customerid)->first() ) {
                if ( $P['phone'] && ck_mobile( $P['phone'] ) ) {
                    $sms = new sms();
                    $code = rand(100000, 999999);
                    // 保存验证码
                    $sms->create_very_code( $code,$P['phone'],$this->request );
                    // 发送短信
                    $sms->send_verify($customer_data['phone'],'SMS_56570272',[$code,'一贸通']);
                    //
                    return $this->toJson('短信已发送,请注意查收!');
                }
            }
            return $this->setError('发送失败');
        } catch (\Exception $e) {
            return $this->setError($e->getMessage());
        }
    }

    // 忘记密码
    public function forget(){
        return view('forget');
    }

    // 忘记密码
    public function passwd( $token = '' ){
        $db = new \App\Models\Admin\Users();
        if ( $data = $db->where('token',$token)->asArray()->first() ) {
            if ( $this->request->getMethod() == 'post' ) {
                $P = $this->U();
                if ( strlen($P['newpasswd']) < 6 ) return $this->setError('密码长度小于6位');
                if ( $P['newpasswd'] != $P['repasswd'] ) return $this->setError('两次输入密码不一致');
                if ( $db->save(['id' => $data['id'] , 'password' => $P['password'] , 'token' => null]) ) {
                    return $this->toJson('已重置成功');
                }
                return $this->setError('密码重置失败!');
            }
        } else {
            exit('页面出错了~');
        }

        return view('passwd',['token' => $token,'data' => $data]);
    }

    // 发送邮件
    public function send(){
        $email = $this->U('email');
        $db = new \App\Models\Admin\Users();
        if ( !$email ) return $this->setError('请填写正确的邮箱地址!');
        if ($data = $db->where('email',$email)->asArray()->first() ) {
                $token = create_guid();
                $url = base_url()."/passwd/$token";
                $config = [
                    'subject' => '一贸通密码重置',
                    'body' => "您好 $email , <br /> 请点击进入链接重置密码:<a href='$url' target='_blank'>$url</a>",
                    'to' => $email
                ];
                if ( $this->sent_mail($config) ) {
                    $db->set('token',$token)->where('id',$data["id"])->update();
                    return $this->toJson("重置链接已发送至: $email , 请登录邮箱进行重置!");
                }
                return $this->setError('发送失败');
        }
        return $this->setError('发送失败, 邮箱地址没有被注册绑定');
    }
}
