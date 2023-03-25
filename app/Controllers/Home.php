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

    public function gologin(){
        if($this->session->has('id')) {
            return redirect()->to('main');
        }
        return view('agent_login');
    }

    // 图形验证码
    public function captcha(){
        \App\Libraries\LibComm::Captcha();
    }

    //
    public function layout(){
        return $this->display(['view_path'=>'main']);
    }

    public function sign(){
        return $this->toJson('登录成功');
    }

    public function zhuce( $v = '' ) {
        $response = ['code' => false, 'msg' => ''];
        if ($this->request->getMethod() == 'post') {
            $form = $this->U();
            $db = new  \App\Models\Admin\Users();
            $form['type'] = 'ent';
            $form['status'] = 1;
            $form['power'] = 'agent';
            $form['companyid'] = 1;
            $db->setValidationMessages($db->validationMessages);
            if ($db->save($form)) {
                $uRdb = new \App\Models\Admin\UsersRoles();
                $form["id"] = $form["id"] ?: $db->getInsertID();
                if ($role_data = get_role_data(['code' => 'agent'])) {
                    // 保存用户角色
                    $uRdb->batch_save($form["id"], [$role_data['id']]);
                    // 保存绑定操作客户
                    // $operator_db = new \App\Models\Setup\Operator();
                    // $operator_db->batch_bind( $form["id"] , $form['cids'] );
                }
                return $this->toJson('注册成功,请您耐心等待...');
            }

            return $this->setError($db->errors());
        }
        return view('agent_reg',['data' => $response]);
    }

    public function agent(){
        echo view('/agent/index');
    }
}
