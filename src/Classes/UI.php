<?php
namespace Ikodota\Yeoman\Classes;
/**=======================================
 * @author ikodota <28341847@qq.com>
 * @copyright (c) 2016, runger.net
 * @datetime 2016-12-21 10:31
 *=======================================*/
use Ikodota\Yeoman\Models\Menu;

class ui
{
    /**
     * 当前页面位置
     * @param int $menu_id ，如果没有传入$menu_id，则通过页面的菜单列表获取当前页缓存menu_id
     * @param string $text
     * @return string
     */
   public static function breadCrumb($menu_id=0,$text='')
   {
       if(empty($menu_id)){
           $menu_id=session('curr_menu_id');
       }

       $breadcrumb = '<ol class="breadcrumb"><li><a href="/admin"><i class="fa fa-home"></i> 首页</a></li>';
       if($menu_id){
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


    /**box UI
     *
     * @return string
     */
    public static function box_start()
    {
        if(config('yeoman.admin_theme') == 'gentelella'){
            $classname = 'x_panel';
        }elseif(config('yeoman.admin_theme') == 'adminlte') {
            $classname = 'box-default box';
        }elseif(config('yeoman.admin_theme') == 'sb-admin') {
            $classname = 'panel panel-default';
        }

        $html='<div class="'.$classname.'">';
        return $html;
    }

    public  static function box_stop()
    {
        return '</div>';
    }

    public  static function box_header($box_title,$minimize=false,$collapse=false,$close=false)
    {
        if(config('yeoman.admin_theme') == 'gentelella'){
            $html = '<div class="x_title">
                            <h2>'.$box_title.'<small></small></h2>
                            <div class="clearfix"></div>
                        </div>';
        }elseif(config('yeoman.admin_theme') == 'adminlte') {
            $html = '<div class="box-header with-border">
                            <h3 class="box-title">'.$box_title.'</h3>
                        </div>';
        }elseif(config('yeoman.admin_theme') == 'sb-admin') {
            $html = '<div class="panel-heading">'.$box_title.'</div>';
        }

        return $html;
    }


    public static function box_content_start()
    {
        if(config('yeoman.admin_theme') == 'gentelella'){
            $classname = 'x_content';
        }elseif(config('yeoman.admin_theme') == 'adminlte') {
            $classname = 'box-body';
        }elseif(config('yeoman.admin_theme') == 'sb-admin') {
            $classname = 'panel-body';
        }
        return '<div class="'.$classname.'">';
    }
    public static function box_content_stop()
    {
        if(config('yeoman.admin_theme') == 'gentelella'){
            return ' <div class="ln_solid"></div> </div>';
        }else{
            return '</div>';
        }
    }

    public static function box_footer_start()
    {
        if(config('yeoman.admin_theme') == 'gentelella'){
            $classname = '';
        }elseif(config('yeoman.admin_theme') == 'adminlte') {
            $classname = 'box-footer';
        }elseif(config('yeoman.admin_theme') == 'sb-admin') {
            $classname = 'clearfix panel-footer';
        }
        return '<div class="'.$classname.'">';
    }

    public static function box_footer_stop()
    {
        return '</div>';
    }


    public static function modal_alert($message='',$title='提示')
    {
        return '<!-- Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="myAlertLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">'.$title.'</h4>
            </div>
            <div class="modal-body">
                <p>'.$message.'</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->';
    }
}

