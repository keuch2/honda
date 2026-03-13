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
        Schema::create('usados', function (Blueprint $table) {
            $table->id();
            $table->string('legacy_id')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->string('version')->nullable();
            $table->string('transmision')->nullable();
            $table->unsignedSmallInteger('anio')->nullable();
            $table->unsignedInteger('kilometraje')->nullable();
            $table->string('color')->nullable();
            $table->string('chapa')->nullable();
            $table->unsignedInteger('precio_contado')->nullable();
            $table->unsignedInteger('entrega_inicial')->nullable();
            $table->unsignedInteger('cuota_aproximada')->nullable();
            $table->string('motor')->nullable();
            $table->string('combustible')->nullable();
            $table->unsignedInteger('precio_lista')->nullable();
            $table->string('portada')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->unsignedInteger('orden')->default(0);
            $table->timestamps();

            $table->index(['is_visible', 'orden']);
            $table->index('marca');
            $table->index('modelo');
            $table->index('anio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usados');
    }
};
