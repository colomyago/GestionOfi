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
        Schema::table('equipment', function (Blueprint $table) {
            if (!Schema::hasColumn('equipment', 'fecha_prestado')) {
                $table->datetime('fecha_prestado')->nullable();
            }
            if (!Schema::hasColumn('equipment', 'fecha_devolucion')) {
                $table->datetime('fecha_devolucion')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipment', function (Blueprint $table) {
            $table->dropColumn(['fecha_prestado', 'fecha_devolucion']);
        });
    }
};
