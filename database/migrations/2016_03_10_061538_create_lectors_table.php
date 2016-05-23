<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_conductor');
            $table->integer('numero_autobus');
            $table->float('cuota');
            $table->integer('estado');
            $table->integer('id_propietario')->unsigned();
            $table->foreign('id_propietario')->references('id')->on('users');
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
        Schema::drop('lectors');
    }
}
