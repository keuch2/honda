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
        Schema::create('usado_inquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usado_id')->nullable()->constrained()->nullOnDelete();
            $table->string('nombre');
            $table->string('email');
            $table->string('telefono_pais', 6)->nullable();
            $table->string('telefono', 50);
            $table->string('mensaje', 500)->nullable();
            $table->string('source_url')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();

            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usado_inquiries');
    }
};
