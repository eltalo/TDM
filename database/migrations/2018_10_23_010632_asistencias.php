<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Asistencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('idJugador');
            $table->unsignedTinyInteger('idBloque');
            $table->dateTime('Fecha');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
}

