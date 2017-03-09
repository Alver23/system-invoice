<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->nullable()->unique()->index();
            $table->integer('parent_menu_id')->unsigned()->comment('Identifica si es un menu hijo, en caso contrario es null')->nullable();
            $table->string('url')->comment('url donde apunta el menu');
            $table->string('name', 80)->comment('nombre del menu');
            $table->tinyInteger('orden')->unsigned()->comment('Orden para los item del menu');
            $table->string('ip_address', 15)->default('127.0.0.1')->comment('Ip address donde se realiza el registro');
            $table->integer('owner_user_id')->unsigned()->nullable()->comment('usuario quien crea el registro');
            $table->integer('updater_user_id')->unsigned()->nullable()->comment('Usuario quien actualiza el registro');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('menus');
    }
}
