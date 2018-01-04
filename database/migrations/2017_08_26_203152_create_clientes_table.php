<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula')->unique(); 
            $table->date('nacimiento');
            $table->string('email')->unique();
            $table->bigInteger('telefono');
            $table->integer('id_direccion')->unsigned();
            $table->integer('id_nacionalidad')->unsigned();
            //$table->foreign('id_direccion')->references('id')->on('direccion');
            //$table->foreign('id_nacionalidad')->references('id')->on('nacionalidad');
            $table->boolean('activo')->default('1');
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
        Schema::dropIfExists('clientes');
    }
}
