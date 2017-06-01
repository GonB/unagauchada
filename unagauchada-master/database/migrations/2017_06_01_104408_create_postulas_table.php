<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulas', function (Blueprint $table) {
            $table->increments('id');
        /*
        VER CÓMO SE DECLARAN LOS id DE LAS TABLAS Usuario y Gauchada
        COMO FORÁNEAS. Y CÓMO OBTENGO LAS MISMAS PARA PODER INSERTARLAS.

            $table->foreingkey('idUsuario');
            $table->foreingkey('idGauchada');
        */
            $table->boolean('seleccionado');
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
        Schema::dropIfExists('postulas');
    }
}
