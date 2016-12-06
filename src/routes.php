<?php


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
    route::get('',function(){
         route::redirect('/dashboard');
    });
    $router->get('dashboard', 'DashboardController@index')->name('admin.dashboard.index');

    //system
    Route::resource('system/role','System\RoleController',['as'=>'admin']);
    $router->PUT('system/role/{id}/give', 'System\RoleController@give')->name('admin.role.give');
    Route::resource('system/permission','System\PermissionController',['as'=>'admin']);
    $router->PUT('system/permission/{id}/attach', 'System\PermissionController@attach')->name('admin.permission.attach');
    Route::resource('system/menu', 'System\MenuController',['as'=>'admin']);
    Route::resource('system/admin','System\AdminController',['as'=>'admin']);
    //Route::resource('system/audit','System\AuditController',['as'=>'system']);
    $router->GET('system/audit', 'System\AuditController@index')->name('admin.auditing');
    $router->GET('system/audit/{uuid}/logs', 'System\AuditController@logs')->name('admin.audit.logs');

    //Route::get('system/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('system/logviewer', 'System\LogViewerController@index')->name('admin.system.logviewer');
    Route::get('system/db/backup', 'System\DbBackupController@index')->name('admin.database.backup');

    //settings
    $router->get('setting/website', 'Setting\WebsiteController@index')->name('admin.setting.website');
    $router->POST('setting/website', 'Setting\WebsiteController@save');
    $router->get('setting/attachment', 'Setting\AttachmentController@index')->name('admin.setting.attachment');
    $router->POST('setting/attachment', 'Setting\AttachmentController@save');
    $router->get('setting/email', 'Setting\EmailController@index')->name('admin.setting.email');
    $router->POST('setting/email', 'Setting\EmailController@save');
    $router->get('setting/attachment/test/qiniu', 'Setting\AttachmentController@testQiniu');

});