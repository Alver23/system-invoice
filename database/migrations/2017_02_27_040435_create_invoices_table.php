<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->nullable()->unique()->index()->comment('Campo unico para la seguridad del registro');
            $table->integer('number')->nullable()->unsigned()->comment('numero de la factura');
            $table->integer('payment_id')->nullable()->unsigned()->nullable()->comment('id del pago');
            $table->decimal('sub_total', 13, 2)->comment('valor del pago');
            $table->decimal('iva', 13, 2)->comment('iva para el valor');
            $table->decimal('value', 13, 2)->comment('valor final de la factura');
            $table->dateTime('invoice_date')->comment('fecha que realizan la factura');
            $table->string('ip_address', 15)->default('127.0.0.1')->comment('Ip address donde se realiza el registro');
            $table->integer('owner_user_id')->nullable()->unsigned()->nullable()->comment('usuario quien crea el registro');
            $table->integer('updater_user_id')->nullable()->unsigned()->nullable()->comment('Usuario quien actualiza el registro');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('number')->references('number')->on('invoice_consecutives');
            $table->foreign('payment_id')->references('id')->on('payments');
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
        Schema::dropIfExists('invoices');
    }
}
