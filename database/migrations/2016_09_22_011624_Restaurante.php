<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Restaurante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurante', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nombre');
            $table->String('horarioInicio');
            $table->String('horarioFinal');
            $table->String('ubucacion');
            $table->String('eslogan');
            $table->String('descripcion');
            $table->text('logo'); 



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
        Schema::drop('restaurante');
    }
}
