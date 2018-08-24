<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //闭包函数的作用，是将Blueprint的实例化$table的一系列属性值与方法产生的值，由函数内部（内部相当于黑箱）打包后，传递给外部的Schema::create()
        //如果不采用闭包函数，则需要将实例化对象的每个值都设立一个形参
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            //创建remember_token字段，用于保存‘记住我’的信息
            $table->rememberToken();

            //创建created_at和updated_at字段
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
