<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->float('cantidad');
            $table->datetime('fecha_pago');
            $table->integer('id_tarjeta')->unsigned();
            $table->integer('id_lector')->unsigned();
            $table->foreign('id_tarjeta')->references('id')->on('tarjetas');
            $table->foreign('id_lector')->references('id')->on('lectors');
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
        Schema::drop('pagos');
    }
}
