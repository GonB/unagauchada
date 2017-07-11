<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_usuarios', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('user_id')->unsigned()->required();
            //$table->foreign('user_id')->references('id')->on('users');
            $table->integer('rango_inicial')->required();
            $table->integer('rango_final')->required();
            $table->string('nombre');
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
        Schema::dropIfExists('categoria_usuarios');
    }
}
