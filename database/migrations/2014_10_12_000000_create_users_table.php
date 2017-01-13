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
            $table->increments('user_id');
            $table->string('user_openid')->nullable();
            $table->string('user_nickname')->nullable();
            $table->string('user_zsname')->nullable();
            $table->string('user_sex')->nullable();
            $table->string('user_mobile')->nullable();
            $table->integer('user_role')->default(10);
            $table->integer('user_status')->default(10);
            $table->string('user_headimgurl')->nullable();
            $table->string('user_name')->unique();
            $table->string('password')->nullable();
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
