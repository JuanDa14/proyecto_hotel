<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idcompra')->references('id')->on('compras')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('idproducto')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('cantidad', 20);
            $table->string('precio', 20);
            $table->string('subtotal', 20);
            $table->string('total', 50);
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
        Schema::dropIfExists('detalle_compras');
    }
}
