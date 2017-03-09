<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductHasValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_has_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->decimal('value', 15, 2);
            $table->decimal('tax', 15, 2);
            $table->tinyInteger('year');
            $table->string('ip_address', 15)->default('127.0.0.1');
            $table->integer('owner_user_id')->unsigned()->nullable();
            $table->integer('updater_user_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('product_has_values');
    }
}
