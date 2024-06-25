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
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users');
            $table->foreignId('curso_id')->constrained('cursos');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->decimal('importe',11,2)->default(0);
            $table->timestamps();
        });
        //usuario_id, curso_id, fecha_inicio, fecha_finalización, importe
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaciones');
    }
};
