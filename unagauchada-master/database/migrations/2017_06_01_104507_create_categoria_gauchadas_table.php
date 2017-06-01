<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaGauchadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_gauchadas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');

        /* FALTA AGREGAR LO DE LAS CLAVES FORÁNEAS */

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
        Schema::dropIfExists('categoria_gauchadas');
    }
}
