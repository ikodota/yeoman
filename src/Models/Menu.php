<?php

namespace Ikodota\Yeoman\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Menu extends Model
{
    protected $fillable = [
        'parent_id','display_name', 'icon', 'url','permission','is_system','is_display',
    ];
    /**
     * 获取侧边栏菜单
     * @return string
     */
    public static function getSidebar()
    {
        $menu_tree = MenuTree::createNodeTree(Menu::all());
        $sidebar = self::showSidebar($menu_tree);
        return $sidebar;
    }
    
    public static function getBreadcrumb($text='列表')
    {
        $breadcrumb = '<ol class="breadcrumb"><li><a href="/admin"><i class="fa fa-home"></i> 首页</a></li>';

        if(session('curr_menu_id')){
            $menu=Menu::find(session('curr_menu_id'));
            $page_title=$menu->display_name;
            $breadcrumb .= '<li><a href="'.$menu->url.'"><i class="fa '.$menu->icon.'"></i> '.$menu->display_name.'</a></li>';
        }else{
            $page_title='';
            $breadcrumb .= '<li><a href="/admin/dashboard"><i class="fa dashboard"></i> 控制面板</a></li>';
        }
        if($text){
            $breadcrumb .= '<li class="active">'.$text.'</li>';
        }

        $breadcrumb .= '</ol>';
        return '<h1>'.$page_title.'<small>'.$text.'</small></h1>'.$breadcrumb;
    }
    /**
     * 设置侧边栏菜单
     * @param $tree
     *
     * @return string
     */
    public static function showSidebar($tree)
    {
        $html = "";
        /*echo Route:: current()->getPath();
        die();*/
        foreach ($tree as $menu) {

            //if('/index.php/admin/dashboard' == $_SERVER['PHP_SELF']){

            //if (empty($menu->permission) || (Gate::foruser(Auth::guard('admin')->user())->allows($menu->permission)) ) {
                if ($menu->child) {
                    switch (config('yeoman.admin_theme')){
                        case 'adminlte':
                            $html .= '<li class="treeview" ><a ><i class="fa ' . $menu->icon . '"></i><span> ' . $menu->display_name . '</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu">' . self::showSidebar($menu->child) . '</ul></li>';
                            break;
                        case 'sb-admin':
                            $html .= '<li ><a><i class="fa ' . $menu->icon . '"></i> ' . $menu->display_name . ' <span class="fa fa-chevron-down pull-right"></span></a><ul class="nav nav-second-level">' . self::showSidebar($menu->child) . '</ul></li>';
                            break;
                        case 'gentelella':
                            $html .= '<li ><a><i class="fa ' . $menu->icon . '"></i> ' . $menu->display_name . ' <span class="fa fa-chevron-down pull-right"></span></a><ul class="nav child_menu">' . self::showSidebar($menu->child) . '</ul></li>';
                            break;
                    }

                } else {
                    $currpath='//'.Route:: current()->getPath();
                    if(!empty($menu->url) && strpos($currpath,$menu->url) > 0){
                        //echo strpos($currpath,$menu->url);
                        $active_class = 'class="active"';
                        session(['curr_menu_id' => $menu->id]);
                        //这里可以定义个基本的面包屑（网页位置）。。。增加一个事件

                    }else{
                        //echo '0';
                        $active_class = '';
                    }
                    //$html .= '<li><a href="' . route($menu->url) . '"><i class="fa fa-bars"></i><span> ' . $menu->name . '</span></a></li>';

                    switch (config('yeoman.admin_theme')){
                        case 'adminlte':
                            $html .= '<li '.$active_class.'><a class="menuItem" data-id="' . $menu->id . '" href="' . url($menu->url) . '"><i class="fa '.$menu->icon.'"></i>' . $menu->display_name . '</a></li>';
                            break;
                        case 'sb-admin':
                            $html .= '<li><a class="menuItem" data-id="' . $menu->id . '"  href="' . url($menu->url) . '"><i class="fa '.$menu->icon.'"></i>' . $menu->display_name . '</a></li>';
                            break;
                        case 'gentelella':
                            $html .= '<li '.$active_class.'><a class="menuItem" data-id="' . $menu->id . '" href="' . url($menu->url) . '"><i class="fa '.$menu->icon.'"></i>' . $menu->display_name . '</a></li>';
                            break;
                    }


                }

        }
        return $html;
    }

    /**
     * 下拉选择框
     * @param $tree
     * @return string
     */
    public static function showSelectMenu($tree)
    {
        $html = "";
        foreach ($tree as $menu) {
            if (Gate::foruser(Auth::guard('admin')->user())->denies($menu->permission)) {
                if ($menu->child) {
                    $html .= '<li class="treeview">' . '<a><i class="fa fa-bars"></i> <span>' . $menu->display_name . '</span><i class="fa fa-angle-left pull-right"></i></a>' . '<ul class="treeview-menu">' . self::setSidebar($menu->child) . '</ul>' . '</li>';
                } else {
                    $route= empty($menu->url) ? '/admin/dashboard' : $menu->url;
                    $html .= '<li><a href="' . route($route) . '"><i class="fa fa-bars"></i><span> ' . $menu->display_name . '</span></a></li>';
                }
            }
        }
        return $html;
    }
}
