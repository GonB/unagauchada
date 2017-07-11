<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('admin')->default(0);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nick')->unique();
            $table->date('birthdate');
            $table->integer('id_categoria')->unsigned()->nullable();
            $table->foreign('id_categoria')->references('id')->on('categoria_usuarios');
            $table->integer('score')->unsigned()->nullable();
            $table->integer('credits')->unsigned()->nullable()->default(1);
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
