<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * //认证不成功重定向到登陆窗口
     *
     * @var string
     */
    protected $loginPath = '/admin/login';


    /**
     * 基于认证用户名，可以是email,username等
     * @return string
     */
    public function username()
    {
        return 'email';  //以某字段作为用户名认证
    }

    /**
     * 改写登陆凭证，必须是管理员才可登陆
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $credentials= $request->only($this->username(), 'password');
        //附加一个认证字段
        $credentials =array_merge($credentials,['is_admin'=>1]);
        return $credentials;
    }


    public function showLoginForm()
    {
        return view('admin.auth.login');
    }


    /**
     * @param Request $request
     * @return mixed
     * 重写退出登陆函数，guard和重定向页面。
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/admin/login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard($this->guardName());
    }

    protected function guardName()
    {
        return 'admin';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'logout']);
        //传入guard后判断是否登陆
        $this->middleware('guest:'.$this->guardName(), ['except' => 'logout']);
    }

}
