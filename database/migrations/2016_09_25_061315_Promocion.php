<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Promocion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocion', function(Blueprint $table){
            $table->increments('id');
            $table->String('nombre');
            $table->String('detalles');
            $table->String('horaInicio')->nullable();
            $table->String('horaFinal')->nullable();
            $table->String('tipo_promocion');
            $table->String('cantidad_disponible')->nullable();

            $table->integer('restautante_id')->unsigned();

            $table->foreign('restautante_id')->references('id')->on('restaurante')->onDelete('cascade');

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
        //
    }
}
