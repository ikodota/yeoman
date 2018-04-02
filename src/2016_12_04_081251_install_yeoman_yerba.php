<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InstallYeomanYerba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_level', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('name')->unique()->comment('等级名称');
            $table->string('description')->comment('描述');
            $table->timestamps();
        });

        Schema::create('user_group', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('name')->unique()->comment('用户分组名称');
            $table->string('description')->comment('描述');
            $table->timestamps();
        });

        /*Schema::create('user_socialite', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('wx_openid')->unique()->comment('微信用户');
            $table->string('description')->comment('描述');
            $table->timestamps();
        });*/

       /* Schema::create('permission_user_group', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('user_group_id')->unsigned()->comment('用户组ID');
            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('user_group')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['permission_id', 'user_group_id']);
        });*/

        /*Schema::create('user_info', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('nickname')->unique()->comment('昵称');
            $table->string('truename')->comment('真实姓名');
            $table->string('mobile')->unique();
            $table->integer('points')->comment('积分');
            $table->integer('balance')->comment('余额');
            $table->integer('exp')->comment('经验值');
            $table->integer('gender')->comment('性别 0保密 1男 2女');
            $table->date('birthday');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
