<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('nombre');
            $table->string('anio')->nullable();
            $table->string('subtitulo')->nullable();
            $table->string('categoria')->default('suv');
            $table->string('hero_image')->nullable();
            $table->string('hero_css_class')->nullable();
            $table->string('card_image')->nullable();
            $table->string('ficha_tecnica_pdf')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('show_in_menu')->default(true);
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modelos');
    }
};
