<?php

//Eloquent模型主要用于与数据表的交互（一个模型对应一张表，这叫做Active Record领域模型模式）
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
}
