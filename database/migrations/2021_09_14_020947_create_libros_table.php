<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('isbn');
            $table->string('anio');
            $table->string('no_paginas')->nullable();
            $table->string('nombre');
            $table->text('descripcion');
            $table->bigInteger('id_categoria');
            $table->bigInteger('id_autor');

            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreign('id_autor')->references('id')->on('autor');

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
        Schema::dropIfExists('libros');
    }
}
