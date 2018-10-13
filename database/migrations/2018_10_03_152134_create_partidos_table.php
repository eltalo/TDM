<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Partidos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('IDJugador1');
            $table->unsignedTinyInteger('IDJugador2');
            $table->unsignedTinyInteger('PtosJugador1Set1');
            $table->unsignedTinyInteger('PtosJugador2Set1');
            $table->unsignedTinyInteger('PtosJugador1Set2');
            $table->unsignedTinyInteger('PtosJugador2Set2');
            $table->unsignedTinyInteger('PtosJugador1Set3');
            $table->unsignedTinyInteger('PtosJugador2Set3');
            $table->unsignedTinyInteger('PtosJugador1Set4');
            $table->unsignedTinyInteger('PtosJugador2Set4');
            $table->unsignedTinyInteger('PtosJugador1Set5');
            $table->unsignedTinyInteger('PtosJugador2Set5');
            $table->unsignedTinyInteger('PtosJugador1Set6');
            $table->unsignedTinyInteger('PtosJugador2Set6');
            $table->unsignedTinyInteger('PtosJugador1Set7');
            $table->unsignedTinyInteger('PtosJugador2Set7');
            $table->unsignedTinyInteger('GANADOR');
            $table->dateTime('FechaPartido');
            $table->unsignedTinyInteger('IdUsuarioInserta');
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
        Schema::dropIfExists('Partidos');
    }
    //
}
