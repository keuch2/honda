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
        Schema::table('usados', function (Blueprint $table) {
            $table->boolean('is_hot_sale')->default(false)->after('is_visible');
            $table->dateTime('hot_sale_ends_at')->nullable()->after('is_hot_sale');
            $table->boolean('is_vendido')->default(false)->after('hot_sale_ends_at');
            $table->dateTime('vendido_at')->nullable()->after('is_vendido');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usados', function (Blueprint $table) {
            $table->dropColumn(['is_hot_sale', 'hot_sale_ends_at', 'is_vendido', 'vendido_at']);
        });
    }
};
