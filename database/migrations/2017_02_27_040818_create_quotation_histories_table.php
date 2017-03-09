<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->nullable()->unique()->index()->comment('Campo unico para la seguridad del registro');
            $table->integer('quotation_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->dateTime('date_status');
            $table->string('ip_address', 15)->default('127.0.0.1');
            $table->integer('owner_user_id')->unsigned()->nullable();
            $table->integer('updater_user_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('quotation_id')->references('id')->on('quotations');
            $table->foreign('status_id')->references('id')->on('categories');
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
        Schema::dropIfExists('quotation_histories');
    }
}
