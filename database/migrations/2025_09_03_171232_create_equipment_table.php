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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('name');   // Nombre del equipo
            $table->text('description')->nullable(); // Descripción del equipo
            $table->string('status'); // Estado del equipo
            $table->foreignId('user_id') // Relación con la tabla de usuarios
                  ->nullable()
                  ->constrained()
                  ->onDelete('set null');
            $table->date('fecha_prestado')->nullable();    // Fecha de préstamo
            $table->date('fecha_devolucion')->nullable();  // Fecha de devolución
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
