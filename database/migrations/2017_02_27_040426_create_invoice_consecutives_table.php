<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceConsecutivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_consecutives', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->nullable()->unique()->index()->comment('Campo unico para la seguridad del registro');
            $table->integer('number')->index()->unique()->nullable()->unsigned()->comment('consecutivo de numero para las factura');
            $table->string('ip_address', 15)->default('127.0.0.1')->comment('Ip address donde se realiza el registro');
            $table->integer('owner_user_id')->nullable()->unsigned()->nullable()->comment('usuario quien crea el registro');
            $table->integer('updater_user_id')->nullable()->unsigned()->nullable()->comment('Usuario quien actualiza el registro');
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
        Schema::dropIfExists('invoice_consecutives');
    }
}
