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
        Schema::create('usado_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usado_id')->constrained('usados')->cascadeOnDelete();
            $table->string('path');
            $table->string('titulo')->nullable();
            $table->string('descripcion')->nullable();
            $table->unsignedInteger('orden')->default(0);
            $table->boolean('is_portada')->default(false);
            $table->timestamps();

            $table->index(['usado_id', 'orden']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usado_images');
    }
};
