<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosusuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datosusuario', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_usuario');
            $table->string('rfc');
            $table->string('razon_social');
            $table->string('calle');
            $table->string('no_ext');
            $table->string('no_int');
            $table->string('cp');
            $table->string('municipio');

            $table->foreign('id_usuario')->references('id')->on('users');

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
        Schema::dropIfExists('datosusuario');
    }
}
