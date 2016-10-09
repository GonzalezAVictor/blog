<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaRestaurant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_restaurant', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('restaurant_id')->unsigned();
            $table->integer('categoria_id')->unsigned();

            $table->foreign('restaurant_id')->references('id')->on('restaurante')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('cascade');

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
        Schema::drop('categoria_restaurant');
    }
}
