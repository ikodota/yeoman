<?php

namespace Ikodota\Yeoman\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Ikodota\Yeoman\Http\Controllers\Admin\Controller;

class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('当前用户名：'.auth()->user()->name.'是否为管理员：'.auth()->user()->isAdmin());
        return view('admin.dashboard');
    }
}
