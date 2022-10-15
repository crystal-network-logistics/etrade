<?php
namespace App\Controllers\Setup;
use App\Controllers\Base;
use App\Services\sms;

class Customer extends Base
{
    protected $db;
    function __construct() {
        $this->db = new \App\Models\Setup\Customer();
    }

    // 列表页
    public function index(){
        $this->actionAuth();
        return $this->display();
    }

    // 数据
    public function page(){
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'customername,phone,customerno';

        $data = $this->db
            ->asObject()
            ->search($P)
            ->whereAuth('',"companyid")
            ->orderBy('createtime','desc')
            ->paginates( $this->_page() ,$this->_size());
        return $this->toJson($data);
    }

    // 获取客户每单余额数据
    public function load_customer_balance_page(){
        $this->actionAuth();
        $db = new \App\Models\Declares\Project();
        $P = $this->U();
        $P['searchField'] = 'customername,phone,customerno';
        $data = $this->db
            ->select('a.id,a.customername,a.customerno,a.phone,count(b.id) nums')
            ->from('customer as a',true)
            ->join('project as b','a.id=b.customerid','left')
            ->asObject()
            ->search($P)
            ->whereAuth('a.id',"a.companyid")
            ->groupBy(['a.id','a.customername','a.customerno','a.phone'])
            ->orderBy('nums','desc')
            ->orderBy('a.createtime','desc')
            ->paginates( $this->_page() ,$this->_size());
        //log_message('error',$this->db->getLastQuery());
        //
        foreach ( $data['data'] as $row ) {
            $row->per_balance = $db->balance( $row->id,1 );
            $row->ulc_balance = $db->balance( $row->id,0 );
            $row->yet_balance = ( $row->per_balance + $row->ulc_balance );
        }

        return $this->toJson( $data );
    }

    // 创建
    public function create(){
        $this->actionAuth(true);
        return $this->render([
            'view_path' => '/Setup/Customer/form'
        ]);
    }

    // 创建
    public function edit(){
        $this->actionAuth(true);
        if ( !$model =
            $this->db->asArray()->where('id',$this->U('id'))->first()
        )
            exit('参数错误');

        $db = new \App\Models\Setup\Operator();
        $operator_data = $db->where('customerid',$this->U('id'))->findAll();
        $arr = [];
        foreach ( $operator_data as $item )
            $arr[] = $item['userid'];
        $model['operator'] = $arr;

        $data['detail'] = $model;
        return $this->render([
            'view_path' => '/Setup/Customer/form',
            'data'=>$data
        ]);
    }

    // 保存
    public function save(){
        $this->actionAuth(true);
        $form = $this->U();
        $this->db->setValidationMessages($this->db->validationMessages);
        if( $this->db->save($form) ) {
            if ( !$form['id'] ) $form['id'] = $this->db->getInsertID();
            $db = new \App\Models\Setup\Operator();
            // 保存操作员
            $db->batch_save($form['id'],$form['operator']);
            return $this->toJson('已保存');
        }
        return $this->setError($this->db->errors());
    }

    // 删除
    public function delete(){
        $this->actionAuth(true);
        $db = new \App\Models\Setup\Products();

        if ($db->where('customerid',$this->request('id'))->first())
            return $this->setError('删除失败,该客户下还有相关的业务没有转移处理!');

        if( $this->db->delete($this->U('id')) )
            return $this->toJson('已删除');
        return $this->setError('删除失败');
    }

    // 设置启用/禁用
    public function setup(){
        $this->actionAuth(true);
        if ( $data = $this->db->where('id',$this->U('id'))->first()) {
            if($this->db->where('id',$data["id"])->set('status',$data["status"]?0:1)->update())
                return $this->toJson("已设置");
        }
        return $this->setError("设置错误!");
    }

    public function check( $field ){
        try {
            $valid = true;
            $data = $this->db->where($field, $this->U($field))->first();
            if ( $data ) $valid = false;
            return json_encode($valid);
        }
        catch (\Exception $e) {
            return json_encode(false);
        }
    }

    // 选择客户
    public function selected(){
        $this->actionAuth();
        return $this->render();
    }

    // 获取
    public function get_cust_picker(){
        $this->actionAuth();
        $db = new \App\Models\Form();
        $data = [];
        $db->from('company',true);

        if ( session('power') != 'all' ) $db->where('id',session('company'));

        $company_data = $db->findAll();

        $db->from('customer',true);
        if ( session('power') != 'all' )
            $db->where('companyid',session('company'));
        $cust_data = $db->findAll();

        foreach ( $company_data as $item ) {
            $data[86][ $item['id'] ] = $item['name'];
            foreach ( $cust_data as $row ) {
                if ( $item['id'] == $row['companyid'] ) $data[$item['id']][$row['id']] = $row['customername'];
            }
        }

        return $this->toJson(['data' => $data]);
    }

    // 更换客户手机号
    public function change(){
        $this->actionAuth();
        $P = $this->U();
        $customerid = isset( $P['customerid'] ) ? $P['customerid'] : session('custId');
        // 判断客户信息是否存在
        if ($customer_data = $this->db->where('id',$customerid )->first() ) {
            // 保存
            if ($this->request->getMethod() == 'post') {
                // 图片验证码
                $captcha = strtolower($_SESSION['authcode']);
                if (strtolower($P['captcha']) != $captcha) return $this->setError('请输入正确的图片验证码');
                // 对比原手机号是否一致
                if ($customer_data['phone'] != $P['original_phone']) return $this->setError('原手机不一致, 更新失败!');
                // 判断更新手机是否与现有手机一致
                if ($customer_data['phone'] == $P['new_phone']) return $this->setError('更新失败,新手机号与现有手机一致!');
                // 匹配手机号是否正确
                if (!preg_match("/^1[345789]\d{9}$/", $P['new_phone'])) return $this->setError('更新失败 , 手机号错误');
                // 匹配手机号是否已存在
                if ($this->db->where('phone',$P['new_phone'])->first()) return $this->setError('更新失败,手机号码已存在');

                // 只有当前用户为客户时
                if ( ckAuth() ) {
                    $sms = new sms();
                    // 检测验证码是否正确
                    $resp = $sms->ck_very_code($P['code'], $P['new_phone']);
                    if (!$resp['code']) return $this->setError($resp['msg']);
                    $customer_data['phone'] = $P['new_phone'];
                    // 更新客户手机号
                    if ($this->db->save($customer_data)) {
                        return $this->toJson('手机号已更新');
                    }
                }
            }
            return $this->render(
                ['data' => $customer_data]
            );
        }
        return '请检查参数是否正确';
    }

    // 绑定手机号
    public function binder(){
        $this->actionAuth();
        $P = $this->U();
        $customerid = isset( $P['customerid'] ) ? $P['customerid'] : session('custId');
        // 判断客户信息是否存在
        if ($customer_data = $this->db->where('id',$customerid )->first() ) {
            if ($this->request->getMethod() == 'post') {
                // 图片验证码
                $captcha = strtolower($_SESSION['authcode']);
                if (strtolower($P['captcha']) != $captcha) return $this->setError('请输入正确的图片验证码');
                // 匹配手机号是否正确
                if (!preg_match("/^1[345789]\d{9}$/", $P['phone'])) return $this->setError('更新失败,手机号错误!');
                // 匹配手机号是否已存在
                if ($this->db->where('phone',$P['phone'])->first()) return $this->setError('更新失败,手机号码已存在');

                // 只有当前用户为客户时
                if (ckAuth()) {
                    $sms = new sms();
                    // 检测验证码是否正确
                    $resp = $sms->ck_very_code($P['code'], $P['phone']);
                    if (!$resp['code']) return $this->setError($resp['msg']);
                    $customer_data['phone'] = $P['phone'];
                    // 更新客户手机号
                    if ($this->db->save($customer_data)) {
                        return $this->toJson('手机号已绑定');
                    }
                }
            }
            return $this->render(
                ['data' => $customer_data]
            );
        }
        return '请检查参数是否正确';
    }

    public function view(){
        $this->actionAuth();

        if ( !$model = $this->db->asArray()->where('id',$this->U('id'))->first() ) return $this->setError('参数错误!');

        $db = new \App\Models\Setup\Operator();
        $operator_data = $db->select(' admin_users.username , admin_users.nickname ')
            ->join('admin_users','operator.userid=admin_users.id')
            ->where('customerid',$this->U('id'))->findAll();
        $arr = [];

        foreach ( $operator_data as $item )
            $arr[] = $item['nickname']?:$item['username'];
        $model['operators'] = $arr?join(',',$arr):'--';

        $data['detail'] = $model;

        return $this->render(
            ['data' => $data]
        );
    }
}
