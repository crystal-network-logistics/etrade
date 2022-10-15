<?php
namespace App\Controllers\Api;

class Auth extends Basic {
    protected $db;

    function __construct() {
        $this->db = new \App\Models\Admin\Users();
    }

    // 登录
    public function login(){
        if($this->request->getMethod()=='post') {
            $P = $this->U();
            // 登录操作
            $resp = $this->_sign($P);
            // 判断是否正确
            if(!is_array($resp)) return $this->setError('登录失败');
            /**/
            // 判断是否正确
            if(!array_key_exists('code',$resp)) {
                unset( $resp['password'] );
                $resp['code'] = false;
                $resp['msg'] = '登录失败,请检查帐户或密码是否正确';
            }
            //
            if ( $resp['code'] ) {
                $temp_data = $resp['data'];
                $data = [
                    'id' => $temp_data['id'],
                    'userName' => $temp_data['username'],
                    'nickName' => $temp_data['name'],
                    'headerImg' => 'https://qmplusimg.henrongyi.top/gva_header.jpg',
                    'phone' => isset( $temp_data['phone'] ) ? '13888888888' : '',
                    'email' => '',
                    'defaultRouter' => 'dashboard'
                ];

                $resp['data'] = [
                    'user' => $data,
                    'token' => $this->Authorizations($data),
                    'expiresAt' => strtotime('+7 day')
                ];
            }
            return $this->toJson($resp);
        }

        return $this->setError('登录失败,请联系管理员!');
    }

    private function _sign( $P ){
        if(!$P['password']) return $this->setError('密码错误!');
        $resp = \App\Libraries\LibComp::U($P['username'],md5( $P['password'] ) );
        if((!$resp ||!array_key_exists('code',$resp)) && $data = $this->db->asArray()->where($resp)->first()) {
            $log = new \App\Models\Admin\LoginLogs();
            // 登录日志
            $log->save(['userId' => $data['id'],'username' => $data['username'],'ip' => $this->request->getIPAddress(),'ua' => $this->request->getUserAgent()]);
            $resp = ['code'=>true,'msg'=>'Success!','data'=> $data];
        }
        return $resp;
    }
}
