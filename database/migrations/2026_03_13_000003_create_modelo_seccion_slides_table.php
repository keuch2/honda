<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modelo_seccion_slides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modelo_seccion_id')->constrained('modelo_secciones')->cascadeOnDelete();
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('imagen_alt')->nullable();
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modelo_seccion_slides');
    }
};
