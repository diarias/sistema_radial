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
        Schema::create('menciones', function (Blueprint $table) {
            $table->id();

            $table->string('cliente');
            $table->string('titulo');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->string('frecuencia');
            $table->string('mencion');
            $table->boolean('estado');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menciones');
    }
};
