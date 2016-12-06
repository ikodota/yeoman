<?php
/**=======================================
 * @author ikodota <ikodota@gmail.com>
 * @copyright (c) 2016, ikodota
 * @datetime 2016-12-01 15:54
 *=======================================*/

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    */

    'title' => 'Yeoman Admin Control Panel',

    'admin_path' => 'admin',     //eg: http://localhost/[admin]

    'admin_guard' => 'admin',   //后台独立的登陆认证设定，区别于前台登陆或其他平台。

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    */

    'logo' => '<b>YEOMAN</b>',

    'logo_mini' => '',


    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'admin/dashboard',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'admin/login',

    'register_url' => null,

    'password_reset_url'=>'admin/password/reset',

    'password_email_url'=>'admin/password/email',

];
