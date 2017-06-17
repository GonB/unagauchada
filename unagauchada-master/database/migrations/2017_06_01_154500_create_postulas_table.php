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
            $table->integer('user_id')->unsigned();            
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('gauchada_id')->unsigned();            
            $table->foreign('gauchada_id')->references('id')->on('gauchadas');
            $table->boolean('seleccionado')->default(false);
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
