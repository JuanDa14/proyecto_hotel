<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpuestoTable extends Migration
{
    public function up()
    {
        Schema::create('impuestos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dnicontador');
            $table->string('contador');
            $table->date('fecha');
            $table->decimal('monto', 8, 2);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('impuesto');
    }
}
