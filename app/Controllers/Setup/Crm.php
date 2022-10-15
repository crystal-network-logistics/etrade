<?php
namespace App\Controllers\Setup;
use App\Controllers\Base;

class Crm extends Base
{
    protected $db;
    function __construct() {
        $this->db = new \App\Models\Setup\Crm();
    }
    // 列表页面
    public function index(){
        $this->actionAuth(true);
        return $this->display();
    }

    public function page(){
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'name,shortname,mainproduct,remark';
        $data = $this->db
            ->asObject()
            ->search( $P )
            ->orderBy('createtime','desc')
            ->paginates( $this->_page(), $this->_size() );
        foreach ( $data['data'] as $row ) {
            $row->createtime = date('Y-m-d',strtotime( $row->createtime ));
        }
        return $this->toJson($data);
    }

    // 新增
    public function create(){
        $this->actionAuth(true);
        return $this->display([
            'view_path' => '/Setup/Crm/form'
        ]);
    }

    // 编辑
    public function update(){
        $this->actionAuth(true);
        if ( !$model = $this->db->where('id',$this->U('id'))->first() )
            return exit( '参数错误!' );
        $contract_data = $this->db->from('crm_contact',true)->where('cid',$model['id'])->findAll();
        $track_data = $this->db->from('crm_track',true)->where('cid',$model['id'])->findAll();
        $model['track_data'] = $track_data;
        $model['contract_data'] = $contract_data;
        $data['detail'] = $model;
        return $this->display([
            'view_path' => '/Setup/Crm/form', 'data' => $data
        ]);
    }

    // 设置跟踪
    public function track(){
        $this->actionAuth(true);
        $P = $this->U();
        if ( !$data = $this->db->where('id',$P['id'])->first() || empty($P['value']))
            return exit( '参数错误!' );
        $db = new \App\Models\Setup\Track();
        if ( $db->save(['cid' => $P['id'],'trackid'=>session('id'),'trackor' => session('username') , 'content' => $P['value']]) ) {
            return $this->toJson('保存成功');
        }
        return $this->setError('设置失败');
    }

    // 删除
    public function delete(){
        $this->actionAuth(true);
        $P = $this->U();
        if ( !$data = $this->db->where('id',$P['id'])->first() )
            return exit( '参数错误!' );
        if ( $this->db->delete($P['id']) ) {
            return $this->toJson('删除成功');
        }
        return $this->setError('删除失败');
    }

    // 保存
    public function save(){
        $this->actionAuth(true);

        if ( $this->request->getMethod() == 'post' ) {
            $P = $this->U();
            $P['files'] = $P['files'] ? join(',',$P['files']) : '';

            if ( $this->db->save($P) ) {
                $P['id'] = $P['id'] ?:$this->db->getInsertID();
                $contract_db = new \App\Models\Setup\Contract();
                $contract_db->batch_save( $P );
                return $this->toJson('保存成功');
            }
        }
        return $this->setError('保存失败');
    }

    // 新建联系人
    public function create_contact(){
        $this->actionAuth();
        return $this->render([
            'view_path' => '/Setup/Crm/_contact'
        ]);
    }

    // 详情
    public function view(){
        $this->actionAuth(true);
        if ( !$model = $this->db->where('id',$this->U('id'))->first() )
            return exit( '参数错误!' );

        $contract_data = $this->db->from('crm_contact',true)->where('cid',$model['id'])->findAll();
        $track_data = $this->db->from('crm_track',true)->where('cid',$model['id'])->findAll();
        $cust_data = $this->db->from('customer',true)->where('id',$model['customerid'])->first();
        $user_data = $this->db->from('admin_users',true)->where('id',$model['owner'])->first();

        $model['username'] = $user_data?($user_data['nickname']?:$user_data['username']):'--';
        $model['customerno'] = $cust_data ? ($cust_data['customerno']) : '';
        $model['track_data'] = $track_data;
        $model['contract_data'] = $contract_data;
        $data['detail'] = $model;

        return $this->render([
            'view_path' => '/Setup/Crm/view', 'data' => $data
        ]);
    }
}
