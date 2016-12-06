<?php


Route::group(['prefix' => 'admin','namespace' => 'Ikodota\Yeoman\Controllers\Admin'],function ($router)
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
    $router->get('', 'DashboardController@index');
    $router->get('dashboard', 'DashboardController@index');

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
    $router->get('setting/website', 'Setting\WebsiteController@index');
    $router->POST('setting/website', 'Setting\WebsiteController@save');
    $router->get('setting/attachment', 'Setting\AttachmentController@index');
    $router->POST('setting/attachment', 'Setting\AttachmentController@save');
    $router->get('setting/attachment/test/qiniu', 'Setting\AttachmentController@testQiniu');

});