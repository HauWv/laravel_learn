<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class UsersController extends Controller
{
    //GET /users，显示页面——所有用户列表页面
    public function index()
    {

    }

    //GET /users/{user}，显示页面——某个用户信息
    //这个方法传参时声明了传入的类型为User类的实例，因此请求时，laravel会自动注入与id对应的用户模型实例
    //这个方法称为隐性路由模型绑定，条件是：1、路由声明时，Eloquent模型的单数小写（这里是user）作为路由的片段参数{user}; 2、控制器中声明传入参数类型为Eloquent模型实例
    public function show(User $user)
    {
    	//compact将$user转化为关联数组，然后作为view（）的第二个参数(传回给view的变量名总是与此处变量名一致）
    	return view('users.show',compact('user'));
    }

    //GET /users/create，显示页面——创建用户的页面
    public function create()
    {
    	return view('users.create');
    }

    //GET /users/{user}/eidt，显示页面——修改用户
    public function edit()
    {

    }

    //POST /users，数据操作——创建用户(与create页面对应)
    public function store(Request $request)
    {
        //验证的错误信息，会自动以$errors对象的形式返回给请求页面
        //在类中调用设定好的非静态方法，一律用$this->方法();调用设定好的静态方法，一律用类名::方法()
        //validate完成后，才会执行接下来的代码
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|unique:users|max:255',
            'password'=>'required|confirmed|min:6'
        ]);

        //User::create()成功后，会返回创建成功的用户对象
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);

        //session()是一个全局方法，用来临时储存用户状态（因为HTTP协议本身无状态）
        //flash方法存储的数据，在下一次有效请求时即会失效
        //传入的为键值对，可以用全局session()->get('success'）取出
        session()->flash('success','欢迎，即将开始一段全新的旅程');
        return redirect()->route('users.show',[$user->id]);//这里也可以直接写$user,由于”约定优于配置“
    }

    //PATCH /users/{user}，数据操作——更新用户（与eidt页面对应）
    public function update()
    {

    }

    //DELETE /users/{user},数据操作——删除用户(与eidt页面对应)
    public function destroy()
    {

    }

}
