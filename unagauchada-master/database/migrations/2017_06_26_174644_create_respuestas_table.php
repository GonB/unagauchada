<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comentario_id')->unsigned()->required();
            $table->foreign('comentario_id')->references('id')->on('comentarios');
            $table->integer('user_id')->unsigned()->required();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('contenido')->required();
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
        Schema::dropIfExists('Respuesta');
    }
}
