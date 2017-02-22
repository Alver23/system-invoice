<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuHasRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_has_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned()->comment('menu a relacionar');
            $table->integer('rol_id')->unsigned()->comment('Rol a relacionar');
            $table->string('ip_address', 15)->default('127.0.0.1')->comment('Ip address donde se realiza el registro');
            $table->integer('owner_user_id')->unsigned()->nullable()->comment('usuario quien crea el registro');
            $table->integer('updater_user_id')->unsigned()->nullable()->comment('Usuario quien actualiza el registro');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->foreign('owner_user_id')->references('id')->on('users');
            $table->foreign('updater_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_has_roles');
    }
}
