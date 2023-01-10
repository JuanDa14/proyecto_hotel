<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idproveedor')->references('id')->on('proveedor')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('estado', ['ACTIVO', 'INACTIVO']);
            $table->string('fechaInicio')->nullable();
            $table->string('fechaFin')->nullable();
            $table->foreignId('iduser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('compras');
    }
}
