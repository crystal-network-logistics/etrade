<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the frameworks
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @link: https://codeigniter4.github.io/CodeIgniter4/
 */


use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\HTTP\RequestInterface;
use Config\Services;

if (! function_exists('display')) {
    /**
     * 输出视图
     * @param string $view 视图名称
     * @param array $array 数据项
     * @param array $options
     */
    function display($data = [],$options = []) {
        $view = array_key_exists('view_path',$data) ? $data['view_path'] :'';
        $layout = (isset($data['layout']) && $data['layout'] === 'Html');
        if(mb_strpos($view , '/')===false
            && $view!= 'main'
        ){
            $routes = Services::router();
            $arr = explode('\\',$routes->controllerName());
            $view = sprintf('/%s/%s/%s',$arr[3],$arr[4],$view?:$routes->methodName());
        }
        unset($data['layout'],$data['view_path']);
        return view(
            ($layout) ? $view :'/Layout/load_template',
            [
                'data' => isset($data['data'])?$data['data']:$data,
                'view' => $view,
                'options' => $options
            ]
        );
    }
}


if(! function_exists('Login')){
    /**
     * 登录
     * @param string $account 用户名
     * @param string $password 密码
     * @return array
     * */
    function Login( $A,$sPass,RequestInterface $request){
        $db = new App\Models\Admin\Users();
        $P = md5(decrypt($sPass));
        if(!$P) exit ('密码错误!');
        $RS = \App\Libraries\LibComp::U($A,$P);
        if(( !$RS || !array_key_exists('code',$RS) ) ) {
            if ($resp_data = $db->select('id,username,nickname,post,power,companyid,customerid,type')->where( $RS )->asArray()->first() ) {
                $session = \CodeIgniter\Config\Services::session();$log = new \App\Models\Admin\LoginLogs();$comm = new \App\Services\comm();
                $ip = $request->getIPAddress();
                // 登录日志
                $log->save(['userId' => $resp_data["id"], 'username' => $resp_data['username'], 'ip' => $request->getIPAddress(), 'ua' => $request->getUserAgent()]);
                // 更新用户最后登录情况
                $db->set('last_ip', $ip)->set('login_lasttime', date('Y-m-d H:i:s'))->where('id', $resp_data['id'])->update();
                // 保存 session
                $session->set(['id' => $resp_data['id'], 'username' => $resp_data['username'], 'name' => ($resp_data['nickname'] ?: $resp_data['username']), 'post' => $resp_data['post'], 'power' => $resp_data['power'], 'company' => $resp_data['companyid'], 'custId' => $resp_data['customerid'] ?: 0]);
                // 保存用户角色
                $session->set('Roles', $comm->get_roles_data());
                //
                $RS = ['code' => true, 'msg' => '登录成功!'];
            }
        }
        return ($RS);
    }
}

if (! function_exists('decrypt')){
    /**
     * 解密
     * @param string $str 解密字符串
     * @return string;
     * */
    function decrypt($str){
        $private_key_file_path = WRITEPATH . 'cert/fbd380a85db64e0d45ce0a71fcec07a5.pem';
        $private_key = file_get_contents($private_key_file_path);
        $is_decrypt = openssl_private_decrypt(base64_decode($str),$decrypted,$private_key);

        if($is_decrypt)
            return $decrypted;

        return $is_decrypt;
    }
}

// 检查权限
function ck_action($uri){
    $comm = new \App\Services\comm();
    return $uri ? $comm->check_auth($uri)   : false;
}

// 检查权限
function check_action($userId = 0,string $uri){
    $db = new \App\Models\Admin\Actions();
    $data = $db->select('id')->where("id in (select operation_id from admin_power where role_id in(select role_id from admin_users_role where user_id=$userId))")
        ->where('uri',$uri)
        ->first();
    return ( ($userId == 0) || $data) ? true : false;
}

/**
 * 根据用户权限
 * */
function where_auth(){
    $db = new \App\Models\Admin\Users();
    $Ids = [];
    if ( ckAuth() ) {
        $Ids[] = session('custId');
    } else {
        $operator_data = $db->asArray()->from('operator',true)->where('userid',session('id'))->findAll();
        if ( $operator_data ) {
            foreach ( $operator_data as $item ) $Ids[] = $item['customerid'];
        }
        if ( hasRole(['admin','finance','sa']) && session('company') ) {
            $customer_data = $db->asArray()->from('customer', true)->where('companyid', session('company'))->findAll();
            foreach ($customer_data as $item) $Ids[] = $item['id'];
        }
    }
    return $Ids;
}

// 判断用户角色职位
function ckAuth( $auth = 'customer'){
    if ( $auth !== false && $auth == 'customer' ) return session('power') === $auth;

    if ( $auth === false ) {
        return hasRole(['admin','finance','operator','invoicer','sa','agent']);
    }
    return hasRole( $auth );
}

// 是否包含角色
function hasRole( $code ,$userId = 0 ){
    $db = new \App\Models\Admin\Roles();
    if ( in_array(session('power'),['all','admin','sa']) ) return true;
    is_array( $code ) ? $db->whereIn('a.code',$code ) : $db->where('a.code',$code );
    $data = $db->from('admin_roles as a', true)->join('admin_users_role as b', 'a.id=b.role_id', 'left')
        ->where(['b.user_id' => $userId ?: session('id')])->first();
    return ( $data ) ? true : false;
}

function hasCustom( $custId = 0 ) {
    if ( session('power') == 'all' || session('power') == 'admin' || ckAuth() )
        return true;
    $db = new \App\Models\Setup\Operator();
    return $db->where(['userid' => session('id') , 'customerid' => $custId])->first();
}


function create_guid($namespace = '') {
    $guid = '';
    $uid = uniqid("", true);
    $data = $namespace;
    $data .= $_SERVER['REQUEST_TIME'];
    $data .= $_SERVER['HTTP_USER_AGENT'];
    $data .= $_SERVER['REMOTE_ADDR'];
    $data .= $_SERVER['REMOTE_PORT'];
    $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
    $guid = '' .
        substr($hash,  0,  8) .
        substr($hash,  8,  4) .
        substr($hash, 12,  4) .
        substr($hash, 16,  4) .
        substr($hash, 20, 12) .
        '';
    return strtolower($guid);
}
// 下载
function force_download($filename = '', $data = '', $set_mime = FALSE) {
    if ($filename === '' OR $data === '') return;

    elseif ($data === NULL) {
        if ( ! @is_file($filename) OR ($filesize = @filesize($filename)) === FALSE) {
            return;
        }
        $filepath = $filename;
        $filename = explode('/', str_replace(DIRECTORY_SEPARATOR, '/', $filename));
        $filename = end($filename);
    }
    else {
        $filesize = strlen($data);
    }

    $mime = 'application/octet-stream';

    $x = explode('.', $filename);
    $extension = end($x);

    if ($set_mime === TRUE)
    {
        if (count($x) === 1 OR $extension === '') {
            return;
        }

        if (isset(\Config\Mimes::$mimes[$extension])) {
            $mime = is_array(\Config\Mimes::$mimes[$extension]) ? \Config\Mimes::$mimes[$extension][0] : \Config\Mimes::$mimes[$extension];
        }
    }

    if (count($x) !== 1 && isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/Android\s(1|2\.[01])/', $_SERVER['HTTP_USER_AGENT'])) {
        $x[count($x) - 1] = strtoupper($extension);
        $filename = implode('.', $x);
    }

    if ($data === NULL && ($fp = @fopen($filepath, 'rb')) === FALSE)
    {
        return;
    }

    if (ob_get_level() !== 0 && @ob_end_clean() === FALSE)
    {
        @ob_clean();
    }

    // Generate the server headers
    header('Content-Type: '.$mime);
    header('Content-Disposition: attachment; filename="'.$filename.'"');
    header('Expires: 0');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: '.$filesize);
    header('Cache-Control: private, no-transform, no-store, must-revalidate');

    if ($data !== NULL) {
        exit($data);
    }

    while ( ! feof($fp) && ($data = fread($fp, 1048576)) !== FALSE) {
        echo $data;
    }

    fclose($fp);
    exit;
}

// 隐藏中间手机号
function mobile_hide( $str ) {
    if (!ck_mobile ( $str ) ) return '';
    return preg_replace('/(\d{3})\d{4}(\d{4})/', '$1****$2',$str);
}

// 检测手机号是否
function ck_mobile( $str ) {
    return preg_match("/^1[345789]\d{9}$/", $str );
}

// 检测邮箱是否正确
function ck_email( $email ){
    return preg_match( "/^[a-zA-Z0-9]+([-_.][a-zA-Z0-9]+)*@([a-zA-Z0-9]+[-.])+([a-z]{2,5})$/ims" ,$email ) ;
}

function getMillisecond() {
    list($microsecond , $time) = explode(' ', microtime()); //' '中间是一个空格
    return (float)sprintf('%.0f',(floatval($microsecond)+floatval($time))*1000);
}