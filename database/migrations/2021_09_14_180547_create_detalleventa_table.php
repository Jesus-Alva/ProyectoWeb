<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleventaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleventa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_venta');
            $table->bigInteger('id_libro');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->integer('total');

            $table->foreign('id_venta')->references('id')->on('ventas');
            $table->foreign('id_libro')->references('id')->on('libros');

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
        Schema::dropIfExists('detalleventa');
    }
}
