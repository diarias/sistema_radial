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
        Schema::create('calendario_menciones', function (Blueprint $table) {
            $table->id();
            $table->integer('mencion_id');
            $table->integer('programa_id');
            $table->date('fecha');
            $table->boolean('estado');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendario_menciones');
    }
};
