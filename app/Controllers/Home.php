<?php
namespace App\Controllers;
use App\Controllers\Base;
use App\Libraries\LibComp;
use App\Libraries\LibMenu;
use App\Services\comm;
use CodeIgniter\Config\Services;

class Home extends Base
{
    function __construct(){
    }

    public function index(){
	    if(!$this->session->has('id'))
            return redirect()->to('login');
	    else
            return redirect()->to('main');
	}

	//--------------------------------------------------------------------
	public function main(){
        $this->actionAuth();
	    if(!$this->session->has('id')) {
	        return redirect()->to('login');
        }
        return $this->display(['view_path'=>'main']);
    }

    // 登录界面
    public function login(){
        if($this->session->has('id')) {
            return redirect()->to('main');
        }
        return view('_login3');
    }

    // 登出
    public function logout(){
	    $this->session->destroy();

        return redirect()->to('login');
    }

    // 登录
    public function sigin(){
	    if($this->request->getMethod()=='post') {
            $User = new \App\Entities\Forms($this->U());
            // 返回URL
            $url = base64_decode($this->request->getGet('url'));
            // 图片验证码
            if (!$User->code || strtolower($User->code) != strtolower($_SESSION['authcode'])) return $this->setError('验证码不正确!');
            // 登录操作
            $resp = Login($User->username, $User->password, $this->request);

            if(!is_array($resp)) return $this->setError('登录失败');

            if(!array_key_exists('code',$resp)) {
                $resp['code'] = false;$resp['msg'] = '登录失败';
            }
            if(array_key_exists('password',$resp)) {
                unset($resp['password']);
            }
            $resp['url'] = strlen($url) > 0 ? $url : '/main';
            return $this->toJson($resp);
        }
        return $this->setError('登录失败,请联系管理员!');
    }

    // 图形验证码
    public function captcha(){
        \App\Libraries\LibComm::Captcha();
    }

    //
    public function layout(){
        return $this->display(['view_path'=>'main']);
    }

    public function test(){
        echo phpinfo();
    }
}
