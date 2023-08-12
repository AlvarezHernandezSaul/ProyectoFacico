<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Columna de ID autoincremental
            $table->string('name'); // Columna de nombre
            $table->string('email')->unique(); // Columna de correo electrónico único
            $table->timestamp('email_verified_at')->nullable(); // Columna de marca de tiempo para verificación de correo electrónico
            $table->string('password'); // Columna de contraseña
            $table->string('role')->nullable(); // Columna de rol (puede ser nulo)
            $table->rememberToken(); // Columna para token de "recuerda-me"
            $table->timestamps(); // Columnas de marca de tiempo "created_at" y "updated_at"
        });
    }

    /**
     * Revierte las migraciones.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users'); // Elimina la tabla de usuarios si existe
    }
}
