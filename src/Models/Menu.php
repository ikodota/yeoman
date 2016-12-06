<?php

namespace Ikodota\Yeoman\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class Menu extends Model
{
    protected $fillable = [
        'parent_id','name', 'icon', 'url','permission',
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

    /**
     * 设置侧边栏菜单
     * @param $tree
     *
     * @return string
     */
    public static function showSidebar($tree)
    {
        /*<li><a><i class="fa fa-dashboard"></i> 控制台 <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i>系统面板</a></li>
            </ul>
        </li>*/
        $html = "";
        foreach ($tree as $menu) {
            if (empty($menu->permission) || (Gate::foruser(Auth::guard('admin')->user())->allows($menu->permission)) ) {
                if ($menu->child) {
                    //$html .= '<li class="treeview">' . '<a><i class="fa fa-bars"></i> <span>' . $menu->name . '</span><i class="fa fa-angle-left pull-right"></i></a>' . '<ul class="treeview-menu">' . self::showSidebar($menu->child) . '</ul>' . '</li>';
                    $html .= '<li style="display: none;"><a><i class="fa ' . $menu->icon . '"></i> ' . $menu->name . ' <span class="fa fa-chevron-down pull-right"></span></a><ul class="nav child_menu">' . self::showSidebar($menu->child) . '</ul></li>';
                } else {
                    //$html .= '<li><a href="' . route($menu->url) . '"><i class="fa fa-bars"></i><span> ' . $menu->name . '</span></a></li>';
                    $html .= '<li><a href="' . url($menu->url) . '"><i class="fa '.$menu->icon.'"></i>' . $menu->name . '</a></li>';
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
                    $html .= '<li class="treeview">' . '<a><i class="fa fa-bars"></i> <span>' . $menu->name . '</span><i class="fa fa-angle-left pull-right"></i></a>' . '<ul class="treeview-menu">' . self::setSidebar($menu->child) . '</ul>' . '</li>';
                } else {
                    $html .= '<li><a href="' . route($menu->url) . '"><i class="fa fa-bars"></i><span> ' . $menu->name . '</span></a></li>';
                }
            }
        }
        return $html;
    }
}
