<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_schemes', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->nullable()->unique()->index()->nullable('Campo unico para la seguridad del registro');
            $table->integer('type_category_id')->nullable()->unsigned()->comment('tipo de esquema, simple o multiple');
            $table->string('name')->comment('Nombre del esquema de pagos');
            $table->decimal('total', 13, 2)->comment('valor total del esquema de pagos');
            $table->string('ip_address', 15)->default('127.0.0.1')->comment('Ip address donde se realiza el registro');
            $table->integer('owner_user_id')->nullable()->unsigned()->nullable()->comment('usuario quien crea el registro');
            $table->integer('updater_user_id')->nullable()->unsigned()->nullable()->comment('Usuario quien actualiza el registro');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('type_category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('payment_schemes');
    }
}
