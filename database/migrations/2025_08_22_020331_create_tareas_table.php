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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id('tareas_id');
            $table->string('tareas_titulo');
            $table->text('tareas_descripcion')->nullable();
            $table->foreignId('estado_id')->constrained('tareas_estados', 'estado_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('tareas_fecha_limite')->nullable();    
            $table->text('tareas_notas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
