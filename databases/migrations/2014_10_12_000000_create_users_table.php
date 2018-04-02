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
            $table->increments('id');
            $table->string('name')->comment('用户名');
            $table->string('email')->unique()->index();
            $table->string('mobile')->unique()->index();
            $table->string('password');
            $table->tinyInteger('status')->default(0)->index();
            $table->tinyInteger('is_admin')->default(0)->index();
            $table->integer('inviter')->default(0)->index()->comment('邀请人');
            $table->string('nickname')->nullable()->comment('昵称');
            $table->string('truename')->nullable()->comment('真实姓名');
            $table->integer('points')->default(0)->index()->comment('积分');
            $table->integer('balance')->default(0)->index()->comment('余额');
            $table->integer('exp')->default(0)->index()->comment('经验值');
            $table->integer('gender')->default(0)->index()->comment('性别 0保密 1男 2女');
            $table->date('birthday')->nullable();
            $table->string('remark')->nullable()->comment('备注');
            $table->ipAddress('lastip')->nullable()->comment('最后登录IP');
            $table->rememberToken();
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
