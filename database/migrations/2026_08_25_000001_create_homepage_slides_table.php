<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homepage_slides', function (Blueprint $table) {
            $table->id();
            $table->string('imagen');
            $table->string('imagen_alt')->nullable();
            $table->integer('orden')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Seed con las portadas que estaban hardcodeadas en el homepage,
        // para que el hero no cambie al desplegar esta migración.
        $now = now();
        DB::table('homepage_slides')->insert([
            ['imagen' => 'assets/images/modelos/wr-v/hero-wr-v-desktop.jpg', 'imagen_alt' => 'Honda Portada', 'orden' => 0, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['imagen' => 'assets/images/portadas/PORTADAS-01.jpg', 'imagen_alt' => 'Honda Portada 1', 'orden' => 1, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['imagen' => 'assets/images/portadas/PORTADAS-02.jpg', 'imagen_alt' => 'Honda Portada 2', 'orden' => 2, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['imagen' => 'assets/images/portadas/PORTADAS-03.jpg', 'imagen_alt' => 'Honda Portada 3', 'orden' => 3, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['imagen' => 'assets/images/portadas/PORTADAS-04.jpg', 'imagen_alt' => 'Honda Portada 4', 'orden' => 4, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_slides');
    }
};
