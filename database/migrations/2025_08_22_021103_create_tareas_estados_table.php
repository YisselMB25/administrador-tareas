<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tareas_estados', function (Blueprint $table) {
            $table->id('estado_id');
            $table->string('estado_titulo');
            $table->timestamps();
        });

        // Insertar datos iniciales con timestamps actuales
        DB::table('tareas_estados')->insert([
            [
                'estado_id' => 1,
                'estado_titulo' => 'Pendiente',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado_id' => 2,
                'estado_titulo' => 'En proceso',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado_id' => 3,
                'estado_titulo' => 'Completado',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas_estados');
    }
};
