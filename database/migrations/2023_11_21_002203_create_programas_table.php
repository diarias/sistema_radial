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
        Schema::create('programas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_programa');
            $table->time('inicio_programa');
            $table->time('fin_programa');
            $table->string('descripcion_programa');
            $table->string('dia_lunes');
            $table->string('dia_martes');
            $table->string('dia_miercoles');
            $table->string('dia_jueves');
            $table->string('dia_viernes');
            $table->string('dia_sabado');
            $table->string('dia_domingo');
            $table->boolean('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programas');
    }
};
