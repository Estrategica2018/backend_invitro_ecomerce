<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('price');
            $table->longText('image_url');
            $table->longText('slide_images_url')->nullable();
            $table->longText('service_relationship')->comment('ids relacion con la tabla servicios');
            $table->longText('product_relationship')->comment('ids relacion con la tabla productos');
            $table->longText('detail')->nullable();;
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
        Schema::dropIfExists('services');
    }
}
