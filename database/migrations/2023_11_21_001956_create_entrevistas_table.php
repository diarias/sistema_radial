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
        Schema::create('entrevistas', function (Blueprint $table) {
            $table->id();

            $table->string('imagen');
            $table->string('nombre_entrevistado');
            $table->string('usuario_instagram');
            $table->string('evento_instagram');
            $table->string('tema');
            $table->date('fecha');
            $table->time('hora');
            $table->string('modalidad');
            $table->string('boletin');
            $table->integer('programa_id');
            
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrevistas');
    }
};
