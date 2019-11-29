<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InformacionAdicionals extends Migration
{
    public function up()
    {
        Schema::create('InformacionAdicionals', function (Blueprint $table) {
            $table->increments('id');
            $table->char('item',100);
            $table->char('tipo',15);
            $table->unsignedTinyInteger('orden');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('InformacionAdicionals');
    }
}
