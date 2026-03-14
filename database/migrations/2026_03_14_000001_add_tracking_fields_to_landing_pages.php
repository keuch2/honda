<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->string('google_ads_id')->nullable()->after('meta_keywords');
            $table->string('google_ads_conversion_label')->nullable()->after('google_ads_id');
            $table->string('meta_pixel_id')->nullable()->after('google_ads_conversion_label');
            $table->text('custom_head_scripts')->nullable()->after('meta_pixel_id');
        });
    }

    public function down(): void
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->dropColumn(['google_ads_id', 'google_ads_conversion_label', 'meta_pixel_id', 'custom_head_scripts']);
        });
    }
};
