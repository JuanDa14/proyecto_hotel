<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idproveedor')->references('id')->on('proveedor')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('iduser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('fechapedido');
            $table->dateTime('fechaentrega');
            $table->decimal('total');
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
        Schema::dropIfExists('pedidos');
    }
}
