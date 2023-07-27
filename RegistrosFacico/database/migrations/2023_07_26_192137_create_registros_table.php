<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    public function up()
{
    Schema::create('registros', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('cuenta');
        $table->string('servicio');
        $table->string('numero_equipo')->nullable(); // Establecer como nullable
        $table->string('licenciaturas');
        $table->string('usuarios');
        $table->string('quejas_sugerencias')->nullable(); // Establecer como nullable
        $table->timestamps();
    });
}
    
    public function down()
    {
        Schema::dropIfExists('registros');
    }
}
