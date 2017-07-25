<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminLoginLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_login_log', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedTinyInteger('aid')->default('0')->comment('管理员id');
            $table->string('ip', 11)->default('')->comment('IP地址');
            $table->string('login_time', 60)->default('')->comment('登录时间戳');
            $table->string('browser', 60)->default('')->comment('浏览器');
            $table->string('address', 60)->default('')->comment('物理地址');
            $table->string('device', 60)->default('')->comment('设备名称');
            $table->string('device_type', 60)->default('')->comment('设备类型');
            $table->string('platform', 60)->default('')->comment('操作系统');
            $table->string('language', 60)->default('')->comment('语言');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
