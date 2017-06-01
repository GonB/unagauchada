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
            $table->integer('id_user')->unsigned();            
            $table->foreign('id_user')->references('id')->on('User');
            $table->integer('id_Gauchada')->unsigned();            
            $table->foreign('id_Gauchada')->references('id')->on('Gauchada');
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
