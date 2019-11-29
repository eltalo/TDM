<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserInformations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('userInformations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('idUsuario');
            $table->dateTime('FechaNacimiento');            
            $table->char('Contacto1Telefono',20);
            $table->char('Contacto1Nombre',50);
            $table->char('Contacto1Apellido',50);
            $table->char('Contacto1Parentesco',50);            
            $table->char('Contacto2Telefono',20);
            $table->char('Contacto2Nombre',50);
            $table->char('Contacto2Apellido',50);
            $table->char('Contacto2Parentesco',50);            
            $table->char('Enfermedades',100);            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('userInformations');
    }


}
