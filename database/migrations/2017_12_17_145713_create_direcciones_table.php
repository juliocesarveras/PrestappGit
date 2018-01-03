<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('calle');
            $table->string('numero');
            $table->string('sector');
            $table->integer('id_ciudad')->unsigned();
            $table->integer('id_pais')->unsingned();
            //$table->foreign('id_ciudad')->references('id')->on('ciudades');
            //$table->foreign('id_pais')->references('id')->on('paises');
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
        Schema::dropIfExists('direcciones');

    }
}
