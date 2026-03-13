<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('landing_page_id')->nullable()->constrained('landing_pages')->nullOnDelete();
            $table->foreignId('modelo_id')->nullable()->constrained('modelos')->nullOnDelete();
            $table->string('nombre');
            $table->string('email');
            $table->string('telefono')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('modelo_consultado')->nullable();
            $table->string('fuente')->default('landing');
            $table->text('comentarios')->nullable();
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('utm_content')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
