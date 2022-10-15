<?php
namespace App\Controllers\Others;
use App\Controllers\Base;

class Yunqnar extends Base
{
    private $clentId = '1c604cd6eced7bab39d04df5e98a069d';
    private $clentSecret = 'cf0782ed4d1971a1a3860746d50b5fd2';
    private $private_key = 'MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAJD2B6GdTnuNp24qqEJaz4tzVxgEUcoKdGsuPYDvOPwUW5EdVpZSaNFivfUg5dSrJm63DGhXiACFlBuiScqAqfAjvJnunOILpneoqo95k0FioPoCZG7FQzpdLWBM4tMQnQ8giNA0qgfE074AhyO0D670VZSAnuLkCpo4uNoBFVOhAgMBAAECgYAFtgu67E2pRH1yM7AJXTaMEfE+ev0V7q+DgYDe0Y33MH4jC3rb1UdX6IH/ZFpptIyBFCki+z/adWjOZehuV/9Z7WW5M+VPq5FkblTYiypey4B47qzsC4Mk5jmmN/4VPTjIUzS3xX/1IF3EDJymyg7BdrKrS7+GoAfsVbH+JX4H2QJBANisDApjMqsCe1X3U8sdz13ZobJb8vZzCekMlFB/AzX6zlqdY34eSJqByHSvh9wOJgN6pIZleDa6BzAux1xPb/8CQQCrRdYb5UEJrn7UQlDl5Bkx3VARlZlPlnHBaLv1ni/l7zycLJEtjN/aHsHzrganqrqRqPera1mq4X4NRBcOpTxfAkEAh/C5xTKjsYNnGnKIkiFr3zgSKTNjZpiamSsZSr/FpfJr0ZJ5v8EEUFwpBnyywq/lzbz+yIuVNtDUfbh7wEDexQJAdaFySxhqUc7xtrCRRUMi9rdsbZdUg2/tUwuuxCPP+9kSxKRrVWCCwhkL1mP4mCFPIAlviOEi5ZUXcN8KAvoDewJBANOrjnfobGIgQQpYlMUjcXj6xKfQ/VWrbArEr8c2Jga9Il1bQu6UTUFajKpC2wQ+5FPi+BIaI4SucFpPDhIAfYI=';
    private $host = 'http://api.open.yunquna.com/';

    function __construct(){
    }

    private function _hearder($token = null){
        $header = [
            'Content-Type'=>'application/json',
        ];

        if( $token ) $header['Authorization'] = $token;

        return $header;
    }

    // 获取授权(/channel/outer/auth/accessToken)
    private function _getAccessToken(){
        $path=$_SERVER['DOCUMENT_ROOT']. '/uploads/token/yqn.json';
        $token = '';
        $run = true;

        if(file_exists($path)) {
            $json = json_decode(file_get_contents($path));
            $time = time();
            if( (intval($json->expires_in) + intval($json->time)) < $time ) {
                $run = true;
            }
            else {
                $run = false;
                $token = $json->access_token;
            }
        }
        if( !$run ) return $token;

        $uri = 'channel/outer/auth/accessToken';
        $url = $this->host . $uri;
        $data = [
            'client_id'=>$this->clentId,
            'client_secret'=>$this->clentSecret,
            'grant_type'=>'',
            'scope'=>'',
        ];

        log_message('error','getAccessToken-RequestData: '.json_encode($data));

        $resp = Requests::post($url,$this->_hearder(),$this->json_get($data));

        $resp_data = json_decode($resp->body);

        log_message('error','getAccessToken-ResponseData: '.json_encode($resp_data));

        if(is_object($resp_data) && isset($resp_data->access_token)){
            $resp_data->time = time();
            file_put_contents($path,json_encode($resp_data));

            $token = $resp_data->access_token;
        }
        return $token;
        //$this->out_json(($resp_data));
    }

    private function _base64urlEncode($data){
        return rtrim(strtr(base64_encode($data),'+/','-_'),'=');
    }

    private function _appSecret(){
        $priKey = "-----BEGIN PRIVATE KEY-----\n".wordwrap($this->private_key,64,"\n",true)."\n-----END PRIVATE KEY-----";
        $ras = openssl_get_privatekey($priKey);
        openssl_private_encrypt($this->clentId,$appSecretKey,$ras);
        $appSecret = $this->_base64urlEncode($appSecretKey);
        return ($appSecret);
    }

    public function getLocation(){
        $this->actionAuth();
        $keyword = $this->request('keyword');
        if(!$keyword) $this->out_json([]);

        Requests::register_autoloader();
        $token = $this->_getAccessToken();
        $header = $this->_hearder($token);
        $url = $this->host . 'api/outer/thridparty/common/v1/gis_locations';
        $time = date('Y-m-d H:i:s');
        $reqBody = ["keywords"=>$keyword,"port_type"=>[1,3],"location_type"=>[11]];
        $origin_sign = ((json_encode($reqBody)) . $this->_appSecret() . strval($time)) ;
        $sign = base64_encode(md5($origin_sign,true));

        $param = [
            'req_name'=>'gis_locations',
            'client_id'=>$this->clentId,
            'timestamp'=>$time,
            'sign'=>$sign,
            'v'=> "1.0",
            'req_body'=>json_encode($reqBody),
        ];

        /*log_message('error','hostURL:' .$url);
        log_message('error','H:' .json_encode($header));
        log_message('error','P:'.(json_encode($param,JSON_UNESCAPED_UNICODE)));
        */

        $resp = Requests::post($url,$header,(json_encode($param,JSON_UNESCAPED_UNICODE)));

        $data = json_decode($resp->body);

        $jsonData = [];
        if($data->success && $data->code){
            $content = json_decode($data->data)->content;
            foreach ($content as $item){
                $jsonData[] = $item;
            }
        }

        $this->out_json($jsonData);
    }

    // 打开页面
    public function openpage(){
        $this->actionAuth();
        $hostURL = 'https://open.yunquna.com/third?';
        $page = $this->request('Ypage');

        $model = row('users',['id'=>$this->session->id]);

        if(!$model) exit('查询失败,用户信息不存在!');

        if(!Utility::is_mobile($model->tel)) exit('用户手机号错误!');

        if(!Utility::is_email($model->email)) exit('用户邮箱错误!');

        //$company = row('company',['id'=>$this->session->companyid]);

        //if(!$company) exit('查询失败,企业信息不存在!');

        //20001
        $track_type = $this->request('track_type');
        $lcnumber = $this->request('lcnumber');
        $port_id = $this->request('port_id');

        // 20003
        $polCode = $this->request('polCode');
        $podCode = $this->request('podCode');

        // 30001
        $spolCode = $this->request('spolCode');
        $epodCode = $this->request('epodCode');
        $etd_date = $this->request('etd_date');
        $container_type = $this->request('container_type');
        $count = $this->request('count');

        if($container_type == 2) $container_type = 11;
        if($container_type == 3) $container_type = 12;

        $uri = [
            "page_id"=>$page,
            "username"=>'上海遥通企业服务有限公司',//$model->username,
            "biz_email"=>'James.d@ymtservice.com',//$model->email,
            "biz_open_id"=>'99999',//$model->id,
            "cellphone"=>'18217788867',//$model->tel,
            "client_id"=>$this->clentId,
            "company_name"=>'上海遥通企业服务有限公司',//$company->name,
        ];

        $uri["page_token"] = $this->_get_thirt_token($uri);

        if($page=='20001'){
            $uri["page_params"] = urlencode(http_build_query(['track_type'=>$track_type,'track_number'=>$lcnumber ? $lcnumber : 'OOLU2640763890','port_id'=>$port_id]));
        }

        if($page=='20003'){
            if(!$polCode || strlen($polCode) < 5) exit('请输入起始港');
            if(!$podCode || strlen($podCode) < 5) exit('请输入目的港');
            $arr = explode(',',$polCode);
            $parr = explode(',',$podCode);
            $uri["page_params"] = urlencode(http_build_query(['polCode'=>$arr[0],'polName'=>$arr[1],'polType'=>11,'podCode'=>$parr[0],'podName'=>$parr[1],'podType'=>11]));
        }

        if($page=='30001'){
            if(!$spolCode || strlen($spolCode) < 5) exit('请输入起始港');
            if(!$epodCode || strlen($epodCode) < 5) exit('请输入目的港');

            $arr = explode(',',$spolCode);
            $parr = explode(',',$epodCode);

            $etd_date = strtotime($etd_date.' 00:00:01').'000';

            $url_query = http_build_query([
                    'pol_code'=>$arr[0],
                    'pol_cn_name'=>$arr[1],
                    'pol_en_name'=>$arr[2],
                    'polType'=>11,

                    'pod_code'=>$parr[0],
                    'pod_cn_name'=>$parr[1],
                    'pod_en_name'=>$parr[2],
                    'podType'=>11,
                    'etd_date'=>$etd_date//,
                    //'container_count_info'=>(["container_type"=>$container_type,"count"=>$count]),
                    //'container_type'=>$container_type,
                    //'count'=>$count
                ]);
            $url_query = 'container_count_info=[{"container_type":'. $container_type .',"count":'.($count??1).'}]&' . $url_query;
            $uri["page_params"] = urlencode ( $url_query );

        }



        log_message('error','page_param:'. json_encode($uri));

        $url = $hostURL . urldecode(http_build_query($uri));

        log_message('error','open-url : '. $url);

        $this->load->model('Logs_Model','logs');

        $this->logs->save(['userId'=>$this->session->id,'username'=>$this->session->username,'content'=>json_encode($uri,JSON_UNESCAPED_UNICODE).' , URL: ' .$url],'termrecord');

        $this->out_json(['url'=>$url]);
    }

    // 页面token
    private function _get_thirt_token($a = array()){

        $path=$_SERVER['DOCUMENT_ROOT']. '/uploads/token/thirt_token.json';
        $run = true;
        if(file_exists($path)) {
            $json = json_decode(file_get_contents($path));
            $time = time();

            if(!$json || ( (intval($json->time)) < $time ) ){
                $run = true;
            }

            else {
                $run = false;

                $ticket = $json->auth_ticket;
            }
        }

        if( !$run ) return $ticket;

        Requests::register_autoloader();

        $token = $this->_getAccessToken();

        $header = $this->_hearder($token);

        $url = $this->host . 'api/outer/channelOpenPlatform/get_third_token';

        $time = date('Y-m-d H:i:s');

        $reqBody = [
            "account"=>'18217788867',//$a["cellphone"],                 // 第三方平台用户手机号
            "company_name"=>'上海遥通企业服务有限公司',//$a["company_name"],         // 第三方平台用户对应客户的公司名全称
            "company_tax"=>'91310115MA1K3KBH79',$a["company_name"],          // 第三方平台用户对应客户的企业社会统一信用代码（税号）
            "biz_open_id"=>'99999',//$a["biz_open_id"],           //第三方平台用户唯一序列
            "name"=>'上海遥通企业服务有限公司',//$a["username"],                     //第三方平台用户名称
            "email"=>'James.d@ymtservice.com',//$a["biz_email"]                    //第三方平台用户邮箱
        ];

        $origin_sign = ((json_encode($reqBody)) . $this->_appSecret() . strval($time)) ;

        log_message('error','thirt_token_origin_sign:' .$origin_sign);

        $sign = base64_encode(md5($origin_sign,true));

        $param = [
            'req_name'=>'get_third_token',
            'client_id'=>$this->clentId,
            'timestamp'=>$time,
            'sign'=>$sign,
            'v'=> "1.0",
            'req_body'=>json_encode($reqBody),
        ];

        log_message('error','get_thirt_token_RequestData: '.json_encode($param));

        $resp = Requests::post($url,$header,json_encode($param,JSON_UNESCAPED_UNICODE));

        $resp_data = json_decode($resp->body);
        log_message('error','get_thirt_tokenn-ResponseData: '.json_encode($resp_data));

        if(is_object($resp_data) && isset($resp_data->data)){

            $d = json_decode($resp_data->data);

            $data = ["time"=>strtotime('30 day'),"auth_ticket"=>($d->auth_ticket)];

            file_put_contents($path,json_encode($data));

            $ticket = $data["auth_ticket"];
        }

        return $ticket;
    }

    public function test(){
        $url = 'page_id=30001&username=%E4%B8%8A%E6%B5%B7%E9%81%A5%E9%80%9A%E4%BC%81%E4%B8%9A%E6%9C%8D%E5%8A%A1%E6%9C%89%E9%99%90%E5%85%AC%E5%8F%B8&biz_email=James.d%40ymtservice.com&biz_open_id=99999&cellphone=18217788867&client_id=1c604cd6eced7bab39d04df5e98a069d&company_name=%E4%B8%8A%E6%B5%B7%E9%81%A5%E9%80%9A%E4%BC%81%E4%B8%9A%E6%9C%8D%E5%8A%A1%E6%9C%89%E9%99%90%E5%85%AC%E5%8F%B8&page_token=0241693e9ab7009cbd66f63724f896e9&page_params=pol_code%253DCNSHA%2526pol_cn_name%253D%2525E4%2525B8%25258A%2525E6%2525B5%2525B7%2525E6%2525B8%2525AF%2526pol_en_name%253DSHANGHAI%2526polType%253D11%2526pod_code%253DDEHAM%2526pod_cn_name%253D%2525E6%2525B1%252589%2525E5%2525A0%2525A1%2526pod_en_name%253DHAMBURG%2526podType%253D11%2526etd_date%253D1623081601000%2526container_count_info%25255Bcontainer_type%25255D%253D2%2526container_count_info%25255Bcount%25255D%253D1';


        var_dump(urldecode( $url ));
    }
}
