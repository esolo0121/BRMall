<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionAndRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //角色表
        Schema::create("admin_roles", function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 30)->default('')->comment('角色名称');
            $table->string('description', 100)->default('')->comment('描述');

            $table->unique(["id"], 'id');
        });
        //权限表
        Schema::create("admin_permissions", function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 30)->default('')->comment('权限名称');
            $table->string('description', 100)->default('')->comment('权限描述');

            $table->unique(["id"], 'id');
        });

        Schema::create("admin_permission_role", function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('rid')->default('0')->comment('角色ID');
            $table->unsignedInteger('pid')->default('0')->comment('权限ID');
        });

        Schema::create("admin_role_user", function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('rid')->default('0')->comment('角色ID');
            $table->unsignedInteger('aid')->default('0')->comment('管理员ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_roles');
        Schema::drop('admin_permissions');
        Schema::drop('admin_permission_role');
        Schema::drop('admin_role_user');
    }
}
