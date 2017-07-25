<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Events\AdminLoginEvent;
use Jenssegers\Agent\Agent;
use App\Models\Admin;


class LoginController extends BaseController
{
    // use AuthenticatesUsers;
    // protected $redirectTo = '/admin';
    // public function __construct()
    // {
    //     $this->middleware('guest', ['except' => 'logout']);
    // }

    public function index(){
        //         echo '<br><br><br>11111';
        // echo trans('adminValidation.captcha');
        // throw new AuthorizationException('您不是该文章的作者，不能修改');
        // if (Auth::check()) {
        //     return redirect('/admin/dash');
        // }
		return view('admin.login.login');
    }

    public function login(){

    	//验证
    	$this->validate(request(),[
    		'account' => 'required|string|min:5|max:12',
    		'password' => 'required|string|min:5|max:12',
    		'is_remember' => 'string',
    		'captcha' => 'required|captcha'
    	],[
            'captcha.required' => trans('admin/validation.required'),
            'captcha.captcha' => trans('admin/Validation.captcha'),
        ]);

    	//逻辑
    	$admin = request(['account','password']);
    	$is_remember = request('is_remember') == 'on' ? 1 : 0;

    	if (\Auth::guard('admin')->attempt($admin,$is_remember)){
            if (\Auth::guard('admin')->user()->is_lock == 1) return \Redirect::back()->withErrors(trans('admin/validation.lock'));
            //登录日志
            event(new AdminLoginEvent(\Auth::guard('admin')->user()->id, new Agent(), \Request::getClientIp(), time()));
    		return redirect('/admin/dash');
    	}

    	return \Redirect::back()->withErrors(trans('admin/validation.loginerror'));
    }

    public function logout(){

        // \Auth::logout();
        \Auth::guard('admin')->logout();
        // $request->session()->flush();
        // $request->session()->regenerate();
        return redirect('/admin');

        // $this->guard()->logout();
        // $request->session()->flush();
        // $request->session()->regenerate();
        // return redirect('/admin');
    }
}
