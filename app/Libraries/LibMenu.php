<?php

namespace App\Libraries;

use App\Services\comm;

class LibMenu{
    // select 控件菜单
    public static function build_menu_select_tree($attrs = [],$selectId = ''){
        $attr = ''; $code = '';
        foreach ($attrs as $k => $v) {
            $attr = $attr . ' ' . $k . '="' . $v . '"';
        }
        $select = '<select ' . $attr . '>';
        $select = $select . ' <option value="0">Root</option>';

        $db = new \App\Models\Admin\Menu();
        $data = $db->where('parentid',0)->orderBy('sort','asc')->findAll();

        function build_select( $data ,$selectId = '',$level = 0){
            $db = new \App\Models\Admin\Menu();
            $options = '';
            if( count($data) == 0 ) return "";
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
                $options = $options . '<option value="' . $row->id . '" ' . $is . '>' . $sLevel . $row->title . '</option>';
                if($sub_data = $db->where( 'parentid',$row->id )->orderBy('sort','asc')->where('status',0)->findAll() ) {
                    $level++;
                    $options .= build_select($sub_data,$selectId,$level);
                    $level--;
                }
            }
            return $options;
        }

        foreach ( $data as $item ) {
            $sub_data = $db->where('parentid',$item->id)->findAll();
            $is = ($selectId == $item->id ? 'selected' : '');
            $select .= '<option value="'. $item->id .'" ' . $is . '>' . $item->title . '</option>';
            $select .= build_select($sub_data,$selectId,1);
        }
        $select .= '</select>';

        return $select;
    }

    // 树形结构
    public static function build_tree_data( $data ){
        $db = new \App\Models\Admin\Menu();
        foreach ( $data as $row ) {
            $sub_data = $db->where('parentid',$row->id)->orderBy('sort','asc')->findAll();
            $row->children = LibMenu::build_tree_data($sub_data);
        }
        return $data;
    }

    // 面包屑
    public static function breadcrumb(){
        $menu = new \App\Models\Admin\Menu();
        $action = new \App\Models\Admin\Actions();
        $GET_URI = new \CodeIgniter\HTTP\URI(current_url(true));
        $URI = substr($GET_URI->getPath(),1);
        $node_nav = '<a href="/" class="text-grey"> <i class="icon-home2 position-left"></i> 数据面板 </a>';

        $nav = [];
        function find_nav( $sub_data ){
            $db = new \App\Models\Admin\Menu();
            $n = [];
            $nv[] = ['code'=>$sub_data['code'],'name'=>$sub_data['title']];
            if($sub_data && $sub_data['parentid'] > 0){
                $d = $db->asArray()->where('id',$sub_data['parentid'])->first();
                $n = find_nav($d);
            }
            $nv = array_merge($nv,$n);
            return $nv;
        }
        $data = $action->where('uri',$URI)->first();
        if( $data ) {
            $h[] = ['code'=>'main','name'=>"数据面板"];
            $nav[] = ['code'=>$data->code,'name'=>$data->name];
            $m = $menu->where('id',$data->menuid)->asArray()->first();
            $F = array_reverse(find_nav($m));
            $nav = array_merge($h,$F,$nav);
        }
        $nav_view = [];
        foreach ($nav as $k=>$v) {
            if( $v['code'] == 'main' ) {
                $nav_view[] = $node_nav;
            }else{
                if($v["name"])
                    $nav_view[] = '<span href="#">'. $v["name"] .'</span>';
            }
        }
        return join(' / ',$nav_view);
    }

    // 初始化菜单
    public static function init_menu(){
        $comm = new comm();
        return $comm->render_menu();
    }

    // 获取操作功能代码
    public static function get_action(){
        $session = \CodeIgniter\Config\Services::session();
        if ( $session->has('id') && !$session->actions ) {
            $db = new \App\Models\Admin\Actions();
            $data = $db->select('code')->distinct()->findAll();
            foreach ( $data as $item ) {
                $arr[] = $item->code;
            }
            $session->set('actions', $arr);
        } else {
            $arr = $session->actions;
        }
        return $arr;
    }
}
