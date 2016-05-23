<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recargas', function (Blueprint $table) {
            $table->increments('id');
            $table->float('cantidad');
            $table->datetime('fecha_recarga');
            $table->integer('id_tarjeta')->unsigned();
            $table->integer('id_vendedor')->unsigned();
            $table->foreign('id_tarjeta')->references('id')->on('tarjetas');
            $table->foreign('id_vendedor')->references('id')->on('users');
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
        Schema::drop('recargas');
    }
}
