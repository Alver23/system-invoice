<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->nullable()->unique()->index()->comment('Campo unico para la seguridad del registro');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('ip_address', 15)->default('127.0.0.1');
            $table->integer('owner_user_id')->unsigned()->nullable();
            $table->integer('updater_user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('people');
    }
}
