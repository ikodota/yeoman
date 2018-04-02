<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InstallYeomanNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_category', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name',20)->unique()->comment('分类名称');
            $table->smallInteger('parent_id')->default(0);
            $table->string('description',100)->comment('描述');
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title',50)->comment('标题');
            $table->string('sub_title',50)->nullable()->comment('副标题');
            $table->integer('cate_id')->comment('分类ID');
            $table->string('reporter',20)->nullable()->comment('记者');
            $table->string('from',20)->nullable()->comment('来源');
            $table->text('content')->comment('新闻内容');
            $table->text('h5_content')->comment('HTML5新闻内容');
            $table->string('outlink',200)->nullable()->comment('外部跳转链接');
            $table->tinyInteger('enable_show')->comment('是否显示');
            $table->tinyInteger('enable_comment')->comment('是否允许评论');
            $table->integer('sort')->default(0)->index();
            $table->smallInteger('review_flow')->comment('审核流程进度');
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
        Schema::dropIfExists('news_category');
        Schema::dropIfExists('news');

    }
}
