<?php
namespace App\Controllers\Declares;
use App\Controllers\Base;
use CodeIgniter\Services;
use think\Image;

class Stamp extends Base{
    protected $db;

    function __construct(){
        $this->db = new \App\Models\Declares\Stamp();
    }

    // 列表页
    public function index(){
        $this->actionAuth(true);
        return $this->display();
    }

    // 数据
    public function page() {
        $this->actionAuth();
        $P = $this->U();
        $P['searchField'] = 'BusinessID,remark';
        $P['stamp.customerid'] = $P['customerid'];
        unset($P['customerid']);
        $data = $this->db
            ->select('stamp.*,a.customername,b.BusinessID')
            ->join('customer as a', 'stamp.customerid=a.id', 'left')
            ->join('project as b', 'stamp.projectid=b.id', 'left')
            ->search( $P )
            ->whereAuth('stamp.customerid','stamp.companyid')
            ->orderBy('stamp.createtime', 'desc')
            ->paginates($this->_page(), $this->_size());
        return $this->toJson($data);
    }

    // 新增
    public function create() {
        $this->actionAuth(true);
        return $this->render(
            ['view_path' => '/Declares/Stamp/form']
        );
    }

    // 编辑
    public function update() {
        $this->actionAuth(true);
        return $this->display();
    }

    // 详情页
    public function view() {
        $this->actionAuth(true);
        $data['detail'] = $model = $this->db->select('stamp.*,a.customername,b.BusinessID')
                                        ->join('customer as a','stamp.customerid=a.id','left')
                                        ->join('project as b','stamp.projectid=b.id','left')
                                        ->where('stamp.id',$this->U('id'))->first();
        $stamper = $this->db->from('stamper',true)->where('companyid',$model['companyid'])->first();

        if($model['status'] == 2){
            delete_notify($model['id'],['TOPIC_STAMP_ING'], session('id'));
        }

        delete_notify($model['id'],'TOPIC_STAMP_ED', session('id'));

        $str_stamper = [];

        foreach ( explode(',' , $stamper['stamper'] ) as $v ) {
            $str_stamper[] = $v;
        }
        $data['stamper'] = $str_stamper;

        return $this->display([
            'data' => $data
        ]);
    }

    // 删除页
    public function delete() {
        $this->actionAuth(true);
        if ( $this->db->where('id',$id = $this->U('id'))->first() ) {
            if ( $this->db->where('id',$id)->delete() ) {
                delete_notify($id, ['TOPIC_STAMP_ING', 'TOPIC_STAMP_ED'], null);
                return $this->toJson('删除成功!');
            }
        }
        return $this->setError('删除失败');
    }

    // 保存操作 新建盖章单
    public function save() {
        $this->actionAuth(true);
        $P = $this->U();
        $P['customerid'] = ckAuth() ? session('custId') : $P['customerid'];

        if ( $this->db->save( $P ) ) {
            return $this->toJson('保存成功');
        }
        return $this->setError('操作失败');
    }

    // 上传更新印章
    public function upload_stamper() {
        $this->actionAuth();
        $P = $this->U();
        if ( $data = $this->db->where('id',$P['id'])->first() ) {
            $db = new \App\Models\Declares\Stamper();
            $stamper_data = $db->where('companyid',$data['companyid'])->first();
            $stamper_data['id'] = $stamper_data ? $stamper_data['id'] : 0;
            $stamper_data['stamper'] = $P['stamper']?join(',',$P['stamper']):'';
            if ( $db->save($stamper_data) ) return $this->toJson('操作成功');
        }
        return $this->setError('操作失败');
    }

    // 设置印章
    public function setup_stamper() {
        $this->actionAuth();
        $P = $this->U();
        if ( $this->db->where('id',$P['id'])->first() ) {
            if ($this->db->save($P))
                return $this->toJson('操作成功');
        }
        return $this->setError('操作失败');
    }

    // 合并盖章文件
    public function merge( $action = '' ){
        $this->actionAuth(true,'declares/stamp/save');
        $P = $this->U();

        if ( $data = $this->db->where('id',$P['id'])->first() ) {
            if ( !$action ) {
                if ( !$data['stamper'] ) return $this->setError('请选择印章戳');
                $water = '.'.$data['stamper'];
                $file = '.'.$data['original'];
                //$filename = substr($file,strrpos($file,'/')+1,strlen( $file ));
                $div_width = $P['width'];
                $posX = str_replace('px','',$P['left']);
                $posY = str_replace('px','',$P['top']);
                // 打开原图
                $image = Image::open($file);
                // 原始图像宽度
                $width = $image->width();
                // 放大倍数
                $multiple = round( $width / ( (is_numeric( $div_width ) && $div_width > 0 ) ? $div_width : 512 )  , 4 );
                log_message('error', "width:$width , div_width : $div_width , multiple : $multiple , posX: $posX" );
                // 保存合并图片文件
                $image->water($water,[round( $posX * $multiple),round($posY * $multiple)])->save($file,'png',70);
                //
                return $this->toJson('操作成功');
            }

            // 完成盖章
            if ( $action == 'accomplish' ) {
                $data['status'] = 2;
                $data['stamptime'] = date('Y-m-d H:i:s');
                if ($this->db->save($data))
                    return $this->toJson('盖章已完成');
            }

            // 添加到备证单
            if ( $action == 'bz' ) {
                $db = new \App\Models\Declares\Entry();
                if ( !$entry_data = $db->where('projectid',$P['projectid'])->first() )
                    return $this->setError('操作失败, 没有相关业务单号');

                // 更新盖章单
                if ( !$data['project'] && $this->db->set('projectid',$P['projectid'])->set('isbz',1)->where('id',$P['id'])->update() ) {

                    $fileht = $entry_data['fileht'] ? ($entry_data['fileht'] . ','.$data['original']): $data['original'];
                    $db->set('fileht' , $fileht)->where('id',$entry_data['id'])->update();
                    return $this->toJson('操作成功,已添加到备证单!');
                }
            }
        }
        return $this->setError('操作失败,请检查参数是否正确!');
    }

    // 选择业务单
    public function selected(){
        $this->actionAuth();
        if ($model = $this->db->where('id',$this->U('id'))->first()) {
            $data['detail'] = $model;
            return $this->render([
                'data' => $data
            ]);
        }
        return '请检查参数是否正确定';
    }

    // 导出PDF
    public function export_pdf(){
        //$this->actionAuth();
        $P = $this->U();
        if ( $data = $this->db->where('id',$P['id'])->first() ) {
            $info = pathinfo('.'.$data['original']);
            $pdf = str_replace('.'.$info['extension'],'1.pdf',$data['original']);

            if ( !$P['type'] ) {
                log_message('error','OK');
                $html = "<html style='margin: 0;padding: 0;'><body style='margin: 0;padding: 0;'><div><img style='width:100%;' src='{$data['original']}'></div></body></html>";
                echo $html;
                exit();
            }
            $http = explode(':',site_url())[0];                $host = $_SERVER['HTTP_HOST'];
            if(file_exists('.'.$pdf)){
                log_message('error','export-file_exists:'.$pdf);
                header("Location: $http://$host$pdf",TRUE,301);exit();
            }else{
                $nfile = substr($pdf,1);
                $exec = " wkhtmltopdf -s A4 $http://$host/declares/stamp/export_pdf?id={$P['id']} '{$nfile}'";
                log_message('error','export-file-exec:'.$exec);
                exec($exec,$ret,$out);
                if(!$ret){
                    log_message('error','export-file-:'. ($pdf));
                    header("Location: $http://$host$pdf",TRUE,301); exit();
                }else{
                    exit('导出PDF错误！');
                }
            }
        }
        return $this->setError('导出失败');
    }
}
