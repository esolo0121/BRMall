<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('account', 20)->default('')->comment('账号');
            $table->string('mobile', 11)->default('')->comment('手机号');
            $table->string('email', 32)->default('')->comment('邮箱');
            $table->string('realname', 20)->default('')->comment('真实姓名');
            $table->string('password', 64)->default('')->comment('密码');
            $table->unsignedInteger('last_login')->default('0')->comment('最后登录时间');
            $table->string('last_ip', 15)->default('')->comment('最后登录IP');
            $table->string('remember_token')->default('')->comment('是否记住密码');
            $table->unsignedTinyInteger('is_lock')->default('0')->comment('是否锁定');
            $table->string('salt', 10)->default('')->comment('秘钥');

            $table->unique(["account"], 'account');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
