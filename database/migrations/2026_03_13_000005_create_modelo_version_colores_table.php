<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modelo_version_colores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modelo_version_id')->constrained('modelo_versiones')->cascadeOnDelete();
            $table->string('nombre');
            $table->string('hex_code')->nullable();
            $table->string('imagen')->nullable();
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modelo_version_colores');
    }
};
