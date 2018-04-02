<?php

namespace Ikodota\Yeoman\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct()
    {
        //后端采用basic认证时使用
        //$this->middleware('auth.basic:'.$this->guardName());

        //前端与后端分开登陆认证时使用。
        $this->middleware('auth.admin:'.$this->guardName());

        //前后台统一的登陆登出时使用(laravel自带)
        //$this->middleware('auth:'.$this->guardName());

    }
    protected function guardName()
    {
        return 'admin';
    }

    protected function guard()
    {
        return Auth::guard($this->guardName());
    }

    protected function loggedUser()
    {
        return  $this->guard()->user();
    }


}
