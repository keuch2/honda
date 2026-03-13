<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modelo_id')->constrained('modelos')->cascadeOnDelete();
            $table->string('slug')->unique();
            $table->string('titulo')->nullable();
            $table->string('subtitulo')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('hero_css_class')->nullable();
            $table->string('form_titulo')->nullable();
            $table->string('form_subtitulo')->nullable();
            $table->text('custom_content')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_pages');
    }
};
