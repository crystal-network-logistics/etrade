<?php
namespace App\Services;

use App\Libraries\LibComp;
use App\Libraries\LibMenu;
use App\Models\Admin\Menu;
use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model;

class comm {

    protected $temp = [];

    // 获取角色列表
    public function get_roles_data(){
        $db = new \App\Models\Admin\Roles();

        $data = (session('id')) ?
                $db->whereIn('id',function( BaseBuilder $builder) {
                    return $builder->select('role_id')->from('admin_users_role',true)->where('user_id',session('id'));
                })->asArray()->where('creatorId<>',session('id'))->findAll(): [];

        $data2 = $db->where('creatorId',session('id'))
            ->asArray()
            ->findAll();

        if ( session('argc_user_role') ) {
            $temp_data = $db->whereIn('id',function( BaseBuilder $builder) {
                return $builder->select('role_id')->from('admin_users_role',true)->where(session('argc_user_role'));
            })->asArray()->findAll();
            $data = array_merge($data,$temp_data);
        }

        return array_merge($data,$data2);
    }

    // 获取指定角色
    public function get_access_roles($access = ['all']){
        $db = new \App\Models\Admin\Roles();
        if ( session('id') )
            $db->where('creatorId',session('id'));
        $data = $db->whereIn('asscess',$access)->asArray()->findAll();
        return $data;
    }

    // 查找是否有功能( 操作权限 )
    public function check_auth( $uri ){
        $db = new \App\Models\Admin\Actions();
        $data = $db->select('id')->whereIn('id',
            function ( BaseBuilder $builder ) {
                return $builder->select('operation_id')->from('admin_power',true)->whereIn('role_id',
                    function (BaseBuilder $builder){
                        return $builder->select('role_id')->from('admin_users_role',true)->where('user_id',session('id'));
                    });
            })
            ->where('uri',$uri)
            ->first();
        //log_message('error',$db->getLastQuery());
        return ( (session('id') == 0) || session('power') == 'all' || $data ) ? true : false;
    }

    // 菜单( 树形菜单 )
    public function build_menus_tree( $hidden = [0] ){
        $db = new Menu();
        $db->whereIn('hidden',$hidden);
        if (session('id')) {
            $data =$db->whereIn('id',function() {
                $pd = new \App\Models\Admin\Powers();
                return $pd->select('menu_id')->distinct()
                            ->whereIn('role_id',
                                function (BaseBuilder $builder) {
                                    return $builder
                                        ->select('role_id')
                                        ->from('admin_users_role', true)
                                        ->where('user_id', session('id'));
                                });
                        })
                    ->orderBy('sort', 'asc')
                    ->asArray()
                    ->findAll();
        }
        else {
            $data = $db
                ->distinct()
                ->where('(parentid>0 or length(url)>1)')
                //->where('length(url)>1')
                ->orderBy('sort', 'asc')
                ->asArray()
                ->findAll();
        }

        function find_tree($data,$level = 0){
            $db = new Menu();
            $up_data = $up_fd =[];
            // 判断父级结点不为root时
            if( $data && $data['parentid'] > 0 ){
                $fd = $db->where('id',$data['parentid'])->asArray()->first();
                // 查找父级
                $up_fd = find_tree($fd,($level + 1));
            }
            $up_data[] = $data;

            return  (array_merge($up_data,$up_fd));
        }

        $find_data = [];

        foreach ( $data as $row ) {
            $find_data[] = find_tree($row,1);
        }

        $root = [];$T = []; $ALL = [];

        foreach ( $find_data as $item ) {
            $a = array_filter($item,function ($r) {
                return $r['parentid'] == 0 ? $r : [];
            });
            foreach ($a as $v) {
                if (!in_array($v['title'], $T)) {
                    $T[] = $v['title'];
                    $root[] = ($v);
                }
            }
            $b = array_filter($item,function ($r) {
                return $r;
            });
            foreach ($b as $k=>$v) {
                $ALL[] = $v;
            }
        }

        function bm( $data, $all ){
            $child = [];
            foreach ( $all as $row ) {
                if( $data['id'] == $row['parentid'] ) {
                    $child[] = bm($row,$all);
                }
            }
            $data['children'] = $child;
            return $data;
        }
        $tree = [];
        foreach ( $root as $item ){
            $tree[] = bm($item,$ALL);
        }
        // 排序
        usort($tree, function ($a, $b) {
            $al = $a['sort'];
            $bl = $b['sort'];
            if ($al == $bl)
                return 0;
            return ($al < $bl) ? -1 : 1;
        });
        return ($tree);
    }

    // 深层合并
    function array_merge_deep(...$arrs) {
        $merged = [];
        while ($arrs) {
            $array = array_shift($arrs);
            if (!$array)  continue;

            foreach ($array as $key => $value) {
                if (is_string($key)) {
                    if (is_array($value) &&
                        array_key_exists($key, $merged) &&
                        is_array($merged[$key])) {
                        $merged[$key] = $this->array_merge_deep(...[$merged[$key], $value]);
                    } else {
                        $merged[$key] = $value;
                    }
                } else {
                    $merged[] = $value;
                }
            }
        }
        return $merged;
    }

    // 菜单(左侧)
    public function render_menu(){
        $session = \CodeIgniter\Config\Services::session();
        $is_has_select = false;
        $GET_URI = new \CodeIgniter\HTTP\URI(current_url(true));
        $url_path = $URI = substr($GET_URI->getPath(),1);
        $controller_path  =  $method = $str_path ='' ;
        if( count(explode('/', $URI)) ) {
            $controller_path = substr($url_path, 0, strripos($url_path, '/'));
            $method = substr($url_path, strripos($url_path, '/') + 1, strlen($url_path));
            $str_path = substr($url_path, strpos($url_path, '/')+1,strlen($url_path));
        }

        $actions = LibMenu::get_action();

        if( !$session->menu_data ) {
            $data = $this->build_menus_tree();
            $session->set('menu_data',$data);
        }else{
            $data = $session->menu_data;
        }
        $elems = '<div class="sidebar sidebar-main  affix"><div class="sidebar-content"><div class="sidebar-category sidebar-category-visible"><div class="category-content no-padding"><ul class="navigation navigation-main navigation-accordion">';

        $elems .= '<li class="'.((!$url_path || $url_path=='home' || $url_path=='main')?'active':'').'"><a href="/"><i class="icon-home4"></i> <span>数据面板</span></a></li>';

        function sub_menu( $data ,$url_path,$controller_path,$method,$actions , $is_has_select){
            $sub_has_select = false;
            if ( $url_path == $data['code'] )
                $is_has_select = true;
            if ( !$is_has_select )
                $sub_has_select = (($controller_path == (substr($data['code'],0,strripos($data['code'],'/'))) && array_search($method,$actions)));

            $html = '<li class="' . ( $is_has_select || ( $sub_has_select ) ? 'active' : '') . '">';
            $html .= '  <a href="'.($data["url"]?:'#').'"> <i class="icon '.($data["icon"]?$data["icon"]:'icon-arrow-right22').'"></i> ' . ($data["title"]) .'</a>';

            if( isset($data["children"]) && count($data["children"])) {
                $html .= '<ul>';
                foreach ( $data["children"] as $item )
                    $html .= sub_menu($item,$url_path,$controller_path,$method,$actions , $is_has_select);
                $html .= '</ul>';
            }
            $html .= '</li>';

            return $html;
        }

        foreach ( $data as $item ) {
            $elems .= sub_menu($item,$url_path,$controller_path,$method ,$actions , $is_has_select);
        }
        $elems .= '</ul></div></div></div></div>';

        return $elems;
    }

    // 角色授权
    public function power_role_menu(){
        $pw_db = new \App\Models\Admin\Powers();
        $ac_db = new \App\Models\Admin\Actions();
        $menu_data = $this->build_menus_tree([0,1]);
        $ck = ck_action('admin/powers/set_actions');
        if (session('id')) {
            $menuIds = $pw_db->select('menu_id as menuid,operation_id as id')
                ->distinct()
                ->whereIn('role_id',
                    function (BaseBuilder $builder) {
                        return $builder
                            ->select('role_id')
                            ->from('admin_users_role', true)
                            ->where('user_id', session('id'));
                    })
                ->orderBy('menu_id', 'asc')
                ->asArray()
                ->findAll();
        } else {
            $menuIds = $ac_db->select('id,menuid')
                ->distinct()
                ->asArray()
                ->findAll();
        }

        function sub_data($menu,$menuIds,$level = 1,$ck = true){
            $tr = '';$indent = '';
            $c = $level;
            while ($c > 0){
                $indent = '├ &nbsp; ';
                $c--;
            }
            if( $menu['children'] ) {
                foreach ($menu['children'] as $item) {
                    if (isset($item['children']) && count($item['children'])) {
                        $tr .= $indent . ' ' . ($item['title']);
                        $tr .= sub_data($item['children'], $menuIds, ($level + 1), $ck);
                    } else {
                        $tr .= $indent . ' ' . ($item['title']) . ' [ ';
                        $tr .= rights($item, $menuIds, $ck);
                        $tr .= ' ] ';
                        $tr .= '<br />';
                    }
                }
            }else{
                $tr .= '<br />';
                $tr .= $indent . ' ';
                foreach ($menu as $item) {
                    if (isset($item['children']) && count($item['children'])) {
                        $tr .= $indent . ' ' . ($item['title']);
                        $tr .= sub_data($item['children'], $menuIds, ($level + 1), $ck);
                    } else {
                        $tr .= $indent . ' ' . ($item['title']) . ' [ ';
                        $tr .= rights($item, $menuIds, $ck);
                        $tr .= ' ] ';
                        $tr .= '<br />';
                    }
                }
            }
            return $tr;
        }
        // 权限
        function rights($menu,$menuIds,$ck = true){
            $db = new \App\Models\Admin\Actions();
            $action = $db->where('menuid',$menu['id'])->asArray()->findAll();
            $html = '';
            foreach ( $action as $row ) {
                foreach ( $menuIds as $d ){
                    if( $row['id'] == $d['id']) {
                        $html .= '<label class="text-primary mr-10">';
                        $html .= ($ck ? ( '    <input type="checkbox" name="rights[]" value="'.(($row['menuid'].'.'.$row['id'])).'"> '): ' ') .  $row['name'];
                        $html .= '</label>';
                    }
                }
            }
            return $html;
        }
        $tables = '<table class="table table-bordered datatable-selection-single table-hover menu_rights"><thead><tr><th width="70" class="text-center">序号</th><th>菜单(权限)</th></tr></thead><tbody>';
        foreach ( $menu_data as $k=>$item ) {
            $tables .= '<tr>';
            $tables .= '<td class="text-center"><h5>'.($k+1).'</h5></td>';
            if ( isset($item['children'] ) && count($item['children']) ) {
                $tables .= '<td>';
                $tables .= ($item['title']);
                $tables .= '<br>';
                $tables .= sub_data($item,$menuIds,1,$ck);
                $tables .= '</td>';
            }else{
                $tables .= '<td>';
                $tables .= ($item['title']). ' [ ';
                $tables .= rights($item,$menuIds,$ck);
                $tables .= ' ] ';
                $tables .= '</td>';
            }
            $tables .= '</tr>';
        }
        $tables .= '</table>';
        return ($tables);
    }
}
