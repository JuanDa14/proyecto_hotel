<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{

    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dni', 8);
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('direccion')->nullable();
            $table->string('celular', 9);
            $table->foreignId('idtipoEmpleado')->references('id')->on('tipo_empleados')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('iddepartamento')->references('id')->on('departamentos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('idusuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('idrol')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->string('estado');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
