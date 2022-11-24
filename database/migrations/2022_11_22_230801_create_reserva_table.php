<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->enum('estado', ['VALIDA', 'CANCELADA']);
            $table->foreignId('idcliente')->references('id')->on('cliente')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('iduser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('tipoPago', ['EFECTIVO', 'TARJETA']);
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
        Schema::dropIfExists('reserva');
    }
}
