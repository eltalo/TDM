<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clases extends Migration
{
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->increments('id');
            $table->char('leccion',100);
            $table->unsignedTinyInteger('tiempo');
            $table->dateTime('Fecha');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clases');
    }
}
