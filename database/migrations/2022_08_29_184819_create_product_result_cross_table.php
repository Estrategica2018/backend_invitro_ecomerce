<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductResultCrossTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_result_crosses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services');
            $table->bigInteger('product_one_id')->unsigned();
            $table->foreign('product_one_id')->references('id')->on('products');
            $table->bigInteger('product_two_id')->unsigned();
            $table->foreign('product_two_id')->references('id')->on('products');
            $table->longText('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_result_crosses');
    }
}
