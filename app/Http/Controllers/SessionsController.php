<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function create()
    {
    	return view('sessions.create');
    }
       
	public function store(Request $request)
    {
    	$credentials = $this->validate($request,[
            'email' => 'required|email|max:256',
            'password' => 'required'
        ]);
        
        //利用Auth:attempt()完成验证
        //Auth通过验证后，会自动生成session并种下名为laravel_session的Cookie
        //直接将$request->has('remember')放入attempt的第二个参数，就可实现记住我的操作；当remember为true时，laravel会自动写入一个5年的session
        if(Auth::attempt($credentials,$request->has('remember'))){
            session()->flash('success','欢迎回来');
            //Auth::user()是返回当前登陆用户的信息（实际等同于Auth::user()->id，约定大于配置)
            return redirect()->route('users.show',[Auth::user()]);
        }else{
            session()->flash('danger','很抱歉，不匹配');
            return redirect()->back();
        }
    }
    
    public function destroy()
    {
    	Auth::logout();
        session()->flash('success','您已经成功退出');
        return redirect('login');
    }
}
