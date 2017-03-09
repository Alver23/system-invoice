<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->increments('id')->comment('id de la tabla primaria');
            $table->uuid('uuid')->nullable()->unique()->index()->comment('Campo unico para la seguridad del registro');
            $table->integer('user_id')->unsigned()->nullable()->comment('id de la persona');
            $table->string('provider_user_id')->comment('id del usuario dependiendo el provedor (Facebook, Twitter, gitHub)');
            $table->string('provider')->comment('provedor (Facebook, Twitter, gitHub)');
            $table->string('ip_address', 15)->default('127.0.0.1')->comment('Ip address donde se realiza el registro');
            $table->integer('owner_user_id')->unsigned()->nullable()->comment('usuario quien crea el registro');
            $table->integer('updater_user_id')->unsigned()->nullable()->comment('Usuario quien actualiza el registro');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('social_accounts');
    }
}
