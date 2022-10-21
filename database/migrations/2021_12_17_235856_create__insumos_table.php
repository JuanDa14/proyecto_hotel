<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumosTable extends Migration
{
    public function up()
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('insumo');
            $table->string('descripcion');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('insumos');
    }
}
