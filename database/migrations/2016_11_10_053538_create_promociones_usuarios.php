<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionesUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promociones_usuarios', function (Blueprint $table) {

            $table->integer('promocion_id')->unsigned();
            $table->integer('usuario_id')->unsigned();

            $table->foreign('promocion_id')->references('id')->on('promocion')->onDelete('cascade');
            $table->foregn('usuario_id')->references('id')->on('usuario')->onDelete('cascade');

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
        Schema::drop('promociones_usuarios');
            }
}
