<?php

Route::group(['middleware' => ['web'],'namespace' => 'Ikodota\Yeoman\Controllers'],function ($router)
{
    $router->get('/', function () {
        return view('welcome');
    });
    $router->get('/home', 'HomeController@index');

    $router->get('/login', 'Auth\LoginController@showLoginForm');
    $router->POST('/login', 'Auth\LoginController@login');
    $router->POST('/logout', 'Auth\LoginController@logout');

    $router->get('auth/github', 'Auth\AuthController@redirectToProvider');
    $router->get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');
});

Route::group(['middleware' => ['web'],'prefix' => 'admin','namespace' => 'Ikodota\Yeoman\Controllers\Admin'],function ($router)
{
    //admin auth
    $router->get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    $router->post('login', 'Auth\LoginController@login');
    $router->post('logout', 'Auth\LoginController@logout');


    $router->get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm');
    $router->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    $router->get('password/reset', 'Auth\ResetPasswordController@showResetForm')->name('admin.reset');
    $router->post('password/reset', 'Auth\ResetPasswordController@reset');

    //dashboard
    //$router->get('', 'DashboardController@index')->name('system.role.give');
    $router->get('', function () {
        return view('yeoman::backend.main');
    });
    $router->get('dashboard', 'DashboardController@index')->name('admin.dashboard.index');

    //system
    //system
    Route::resource('system/role','System\RoleController',['as'=>'system']);
    $router->PUT('system/role/{id}/give', 'System\RoleController@give')->name('system.role.give');
    Route::resource('system/permission','System\PermissionController',['as'=>'system']);
    $router->PUT('system/permission/{id}/attach', 'System\PermissionController@attach')->name('system.permission.attach');
    Route::resource('system/menu', 'System\MenuController',['as'=>'system']);
    Route::resource('system/admin','System\AdminController',['as'=>'system']);
    //Route::resource('system/audit','System\AuditController',['as'=>'system']);
    $router->GET('system/audit', 'System\AuditController@index')->name('system.audit.index');
    $router->GET('system/audit/{uuid}/logs', 'System\AuditController@logs')->name('system.audit.logs');

    //Route::get('system/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('system/logviewer', 'System\LogViewerController@index');

    //settings
    $router->get('setting/website', 'Setting\WebsiteController@index')->name('system.website.index');
    $router->POST('setting/website', 'Setting\WebsiteController@save')->name('system.website.update');
    $router->get('setting/attachment', 'Setting\AttachmentController@index')->name('system.attachment.index');
    $router->POST('setting/attachment', 'Setting\AttachmentController@save')->name('system.attachment.update');
    $router->get('setting/attachment/test/qiniu', 'Setting\AttachmentController@testQiniu')->name('system.attachment.test.qiniu');
    $router->get('setting/email', 'Setting\EmailController@index')->name('system.setting.email');
    $router->POST('setting/email', 'Setting\EmailController@save');
    $router->get('setting/attachment/test/qiniu', 'Setting\AttachmentController@testQiniu');

});