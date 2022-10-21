<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipoEmpleado');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('tipo_empleado');
    }
}
