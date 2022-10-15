<?php
namespace App\Controllers\Api;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use App\Services\comm;
use CodeIgniter\Controller;
use Config\Services;
use Firebase\JWT\JWT;
use CodeIgniter\Database\BaseBuilder;


class Basic extends Controller {
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['html'];
    protected $clentId = '168f0bdfd2ef6215';
    protected $secretKey = 'bwa0-TOoAIhAIi-125bPoD-5jyl';

    protected $filed = [
        10001 => '验签失败,请检查参数是否正确!',
        10002=>'AccessToken Exp',
        10004=>'refreshToken Error!',
        10003=>'参数错误!',
        11001=>'访问失败,未授权'
    ];
    /**
     * Session 设置
     */
    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        $this->response->setHeader('Access-Control-Allow-Origin','*');
        $this->response->setHeader('Access-Control-Allow-Headers','Origin, X-Requested-With, Content-Type, Accept,Authorization,x-token,x-user-id');

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        //$this->session = \Config\Services::session();
    }

    private function _set_header(){
        $this->response
            ->removeHeader('Set-Cookie')
        ;
    }



    function toJson($data = array(),$head = [],$status = true,$code = 2000,$message = 'Success'){
        $this->_set_header();
        if(count($head)>0) {
            foreach($head as $k=>$v) {
                $this->response->setHeader($k,$v);
            }
        }
        if (is_array($data)) {
            if (!array_key_exists('status', $data)) {
                $data['status'] = $status;
            }
            if (!array_key_exists('msg', $data)) {
                $data['msg'] = $message;
            }
            if (!array_key_exists('code', $data)) {
                $data['code'] = $code;
            }
        } else{
            $data = ['status' => $status,'code'=>2000,'msg'=>$data];
        }
        $outStr=preg_replace('/":null/', '":""', $this->jsonGet($data));
        return $this->response->setJSON($outStr);
    }

    protected function jsonGet($result) {
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    protected function setError($msg = ''){
        $this->_set_header();
        if(is_object($msg) || is_array($msg)) {
            $message = [];
            foreach ( $msg as $k=>$m ) {
                $message[] = $m;
            }
            $msg = join('  ',$message);
        }
        $data = ['code'=>false, 'status'=>false, 'msg'=>$msg?$msg:'failed!'];
        $outStr=preg_replace('/":null/', '":""', $this->jsonGet($data));
        return $this->response->setJSON($outStr);
    }

    protected function request($index = null,$filter = null){
        if($this->request->getMethod()=='post'){
            return $this->request->getPost($index,$filter);
        }else if($this->request->getMethod()=='get'){
            return $this->request->getGet($index,$filter);
        }else {
            return $this->request->getGetPost($index, $filter);
        }
    }

    protected function U($index = null,$filter = null){
        $resp_data = $this->request($index,$filter);
        return $resp_data;
    }


    // 判断验签及权限
    protected function signature( $arr = [],$chkpromise = false){
        return $code = 10000;
        $data = $this->ckAuthoriztion();
        // 判断权限
        if(is_bool( $chkpromise ) && $data['code'] ) {
            $routes = Services::router();
            $ctln = $routes->controllerName();
            if( $chkpromise && $data->data->id )  {
                $ctl = explode('\\',$ctln);
                $actionKey = sprintf('%s/%s/%s',$ctl[3],$ctl[4],$routes->methodName());
                if(!check_action( $data->data->id ,$actionKey)) return 11001;
            }
        }

        if( !$data['code'] ) {
            $code = 10002;
        }
        return $code;
    }

    // 返回token和refresh_toke
    protected function Authorizations($data = []){
        try {
            $time = time();
            $token = [
                'iat' => $time,
                'data' => $data
            ];
            $access_token = $token;
            $access_token['scopes'] = 'access_token';
            $access_token['exp'] = $time + 86400 * 7;
            $x_token  = JWT::encode($access_token,$this->secretKey);
        }
        catch (\Exception $ex ){
            $x_token = false;
            log_message('error','Authorizations:'.$ex->getMessage());
        }
        return ($x_token);
    }

    // 检测AccessToken是否合法
    protected function ckAuthoriztion(){
        try {
            if($this->request->hasHeader('x-token')) {
                $token = $this->request->getHeader('x-token');
                if (!$token) return ["code" => false, "msg" => '验证失败'];
                $token = $token->getValue();
                $decoded = JWT::decode($token, $this->secretKey, ['HS256']);
                if ($decoded->scopes == 'access_token')
                    return ["code" => true, "data" => $decoded->data];
            }
            return ["code"=>false,"msg"=> '验签失败!'];
        }
        catch (\Exception $ex){
            return ["code"=>false,"msg"=> $ex->getMessage()];
        }
    }

    //
    protected function userId(){
        $userId = 0;
        if($this->request->hasHeader('x-token')) {
            try {
                $token = $this->request->getHeader('x-token');
                if (!$token) return 0;
                $token = $token->getValue();
                $decoded = JWT::decode($token, $this->secretKey, ['HS256']);
                if ($decoded->scopes == 'access_token') $userId = $decoded->data->id;
            }
            catch (\Exception $ex){
                log_message('error','Exception: '.$ex->getMessage());
            }
        }
        return $userId;
    }

    // 分頁码
    protected function _page(){
        $page = $this->request('index');
        $size = $this->request('size');
        return intval(($page?$page:0)/($size?$size:1))+1;
    }
    // 分页大小
    protected function _size(){
        $size = $this->request('size');
        return $size?$size:10;
    }

}
