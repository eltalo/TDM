<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Partidossets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidosSets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('IDJugador1');
            $table->unsignedTinyInteger('IDJugador2');
            $table->unsignedTinyInteger('Jugador1QSet');
            $table->unsignedTinyInteger('Jugador2QSet');
            $table->unsignedTinyInteger('GANADOR');
            $table->dateTime('FechaPartido');
            $table->unsignedTinyInteger('IdUsuarioInserta');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partidosSets');
    }
}
