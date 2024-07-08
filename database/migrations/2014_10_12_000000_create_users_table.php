<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->string('usuario');
            $table->string('email')->unique();
            $table->enum('role', ['director', 'coordinador', 'productor', 'locutor'])->default('locutor');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            /*----- información de persona-------*/
            $table->string('foto');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono', 14);
            $table->date('fecha_naci');
            $table->string('sexo');
            $table->string('nom_artis');
            $table->string('nacionalidad');
            $table->string('pais_resi');
            $table->string('ciudad_resi');
            $table->string('direccion');
            /* ----- Redes sociales ---- */
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('youtube');
            $table->string('biografia', 200);
            $table->string('talla_cami');
            $table->boolean('estado');
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
