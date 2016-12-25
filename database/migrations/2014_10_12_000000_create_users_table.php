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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('用户ID');
            $table->string('openid')->unique()->comment('微信ID');
            $table->string('nickname')->comment('微信昵称');
            $table->string('name')->nullable()->comment('真实姓名');
            $table->integer('sex')->nullable()->comment('性别');
            $table->string('mobile')->nullable()->comment('手机号');
            $table->string('password')->nullable()->comment('用户密码');
            $table->tinyInteger('role')->default(10)->comment('用户角色');
            $table->tinyInteger('status')->default(10)->comment('用户状态');
            $table->string('headimgurl')->comment('用户头像');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
