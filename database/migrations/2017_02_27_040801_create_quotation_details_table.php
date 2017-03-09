<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_details', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->nullable()->unique()->index()->comment('Campo unico para la seguridad del registro');
            $table->integer('quotation_id')->unsigned();
            $table->integer('product_id')->unsigned()->nullable();
            $table->decimal('value', 13, 2);
            $table->string('ip_address', 15)->default('127.0.0.1');
            $table->integer('owner_user_id')->unsigned()->nullable();
            $table->integer('updater_user_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('quotation_id')->references('id')->on('quotations');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('quotation_details');
    }
}
