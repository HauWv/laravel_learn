<?php

//Eloquent模型主要用于与数据表的交互（一个模型对应一张表，这叫做Active Record领域模型模式）
//所有涉及与数据表交互的，均通过此对象
//交互主要体现在CRUD方法上，例如可以用User::create()来创建一条记录（Tinker是laravel专门用来测试静态方法的工具，其产生的结果与在PHP文件中运行是一样的）
namespace App\Models;

use Illuminate\Notifications\Notifiable;                //消息通知的功能
use Illuminate\Foundation\Auth\User as Authenticatable; //授权的相关功能

class User extends Authenticatable
{
    use Notifiable;


    protected $table = 'users';

    //表示用户可以操作的字段
    protected $fillable = [
        'name', 'email', 'password',
    ];

    //实例User模型时，隐藏掉的字段
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Gravatar头像（因为头像与邮箱有关，因此放到模型中进行操作）
    public function gravatar($size = '100')
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }
}
