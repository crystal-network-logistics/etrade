<?php
namespace App\Controllers;

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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Base extends Controller {
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['html','Form','Business'];

    /**
     * Session 设置
     */
    protected $session;
	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
        $this->response->setHeader('Access-Control-Allow-Origin','*');
		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
        $this->session = \Config\Services::session();

	}

	private function _set_header(){
        $this->response
            ->removeHeader('Set-Cookie')
        ;
    }

    function display( $data = [] , $options = []){
        return display($data, $options );
    }
    function render( $data = [] ){
        $data['layout'] = 'Html';
        return display($data);
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
                $data['code'] = $status;
            }
        } else{
            $data = ['status' => $status,'code'=>$status,'msg'=>$data];
        }

        // 销毁
        if ( array_key_exists('code', $data) && ( $data['code'] || $status && $this->request->getMethod() == 'post' ) ) {
            form_destroy_guid( $this->U('guid') );
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

    function actionAuth($chkpromise = false, $action_path = '') {
        header_remove('Server');
        $GET_URI = new \CodeIgniter\HTTP\URI(current_url(true));
        $URI = $GET_URI->getPath();
        if(!$this->session->has('id')) {
            if( !$this->request->isAJAX() ) {
                header('Location:' . ('/login?url=' . base64_encode($_SERVER['REQUEST_URI'])) . '');exit();
            } else {
                exit('登录已过期, 重新 <a href="/login">登录</a><script> setTimeout(()=>{window.location.href = \'/login\'},3000) </script>');
            }
        }
        $aKey = (empty($action_path)||!$action_path) ? (($URI == '/' || empty($URI)) ? 'main' : substr($URI,1)) : $action_path;

        if($chkpromise===TRUE){
            if(!ck_action($aKey)){
                $view = view('/errors/html/error_not_auth');exit($view);
            }
        }

	    function operation_log($data){
            $db = new \App\Models\Admin\OperationsLog();
            return $db->save($data);
        }

        // 判断 是否重复提交数据
        if(array_key_exists('guid',$this->U())){
            if (!check_form_valid($this->U('guid'))) {
                exit('请勿重复提交数据!');
            }
        }

        // 操作日志
        return operation_log(['type'=>'', 'userid'=>$this->session->id,
            'username'=>$this->session->username,
            'controller'=>$aKey,
            'action'=>$aKey,
            'uri'=>json_encode($this->U())]);

	}

	// 判断数据归属
	protected function ck_auth_data( $db , $form ){
        $has = true;
        $form['id'] = array_key_exists('id',$form)?$form['id']:( array_key_exists('ID',$form) ? $form['ID'] : 0);
        $data = $db->where('id',$form['id'])->first();
        if ( !$data ) return false;
        switch ( session('power') ) {
            case 'all':
                $has = true;
                break;
            case 'ent':
                if ( $data['companyid'] != session('company')) $has = false;
                break;
            case 'customer' :
                if ( $data['customerid'] != session('custId')) $has = false;
                break;
        }
        return ( $has && $data ) ? $data : false;
    }

    // 分頁码
    protected function _page(){
        $page = $this->request('iDisplayStart');
        $size = $this->request('iDisplayLength');
        return intval(($page?$page:0)/($size?$size:1))+1;
    }
    // 分页大小
    protected function _size(){
        $size = $this->request('iDisplayLength');
        return $size?:15;
    }
    // 排序字段
    protected function _s_name(){
        $sort_index = $this->request('iSortCol_0');
        $filed = $this->request('mDataProp_'.strval($sort_index));
        return $filed;
    }
    // 排序方向
    protected function _s_dir(){
        $s_dir = $this->request('sSortDir_0');
        return $s_dir;
    }

    // 邮件发送
    protected function sent_mail($options = []){
        $resp = false;
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.mxhichina.com';                   // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'admin@yimaotong.net';                  // SMTP username
            $mail->Password   = 'Asd12345,';                            // SMTP password
            $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->CharSet='UTF-8';
            //Recipients
            $mail->setFrom('admin@yimaotong.net', '一贸通');
            $mail->addAddress( $options["to"]);     // Add a recipient
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $options["subject"];
            $mail->Body    = $options["body"];
            $resp = $mail->send();
        }
        catch ( Exception $ex ){
            log_message('error',"sent_mail:$mail->ErrorInfo");
        }
        return $resp;
    }
}
