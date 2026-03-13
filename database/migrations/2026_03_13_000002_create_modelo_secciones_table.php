<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modelo_secciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modelo_id')->constrained('modelos')->cascadeOnDelete();
            $table->string('titulo');
            $table->string('anchor')->nullable();
            $table->text('intro_text')->nullable();
            $table->enum('layout', ['text-left', 'text-right'])->default('text-left');
            $table->integer('orden')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modelo_secciones');
    }
};
