<?php
/**
 * Script para limpiar imágenes antiguas y preparar para nueva subida
 * Acceder: https://honda.com.py/clean-and-test.php?token=honda2025check
 */

define('CHECK_TOKEN', 'honda2025check');

if (!isset($_GET['token']) || $_GET['token'] !== CHECK_TOKEN) {
    http_response_code(403);
    die('❌ Acceso denegado');
}

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::capture();
$kernel->bootstrap();

echo "<h1>Limpieza y Preparación</h1>";

// Obtener el usado CFR032
$usado = \App\Models\Usado::where('legacy_id', 'CFR032')->first();

if (!$usado) {
    die('❌ Usado CFR032 no encontrado');
}

echo "<h3>Usado: {$usado->displayName()}</h3>";
echo "<p><strong>ID:</strong> {$usado->id}</p>";
echo "<p><strong>Legacy ID:</strong> {$usado->legacy_id}</p>";

// Eliminar registros de imágenes en la BD
$imageCount = $usado->images()->count();
echo "<h3>Imágenes en la base de datos: $imageCount</h3>";

if ($imageCount > 0) {
    $usado->images()->delete();
    echo "<p>✅ Eliminados $imageCount registros de la base de datos</p>";
}

// Limpiar campo portada
if ($usado->portada) {
    $usado->update(['portada' => null]);
    echo "<p>✅ Campo portada limpiado</p>";
}

// Verificar directorio físico
$galleryPath = __DIR__ . '/storage/app/public/usados/cfr032/gallery';
echo "<h3>Archivos físicos en el servidor:</h3>";

if (is_dir($galleryPath)) {
    $files = glob($galleryPath . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    echo "<p>Encontrados " . count($files) . " archivos</p>";
    
    if (count($files) > 0) {
        echo "<ul>";
        foreach ($files as $file) {
            $filename = basename($file);
            $size = filesize($file);
            echo "<li>$filename (" . number_format($size) . " bytes)</li>";
        }
        echo "</ul>";
        
        if (isset($_GET['delete_files']) && $_GET['delete_files'] === 'yes') {
            foreach ($files as $file) {
                unlink($file);
            }
            echo "<p>✅ Archivos físicos eliminados</p>";
        } else {
            echo "<p><a href='?token=honda2025check&delete_files=yes'>Eliminar archivos físicos</a></p>";
        }
    }
} else {
    echo "<p>❌ Directorio no existe</p>";
}

echo "<h3>Estado actual:</h3>";
echo "<p>✅ Base de datos limpia (0 imágenes)</p>";
echo "<p>✅ Campo portada en NULL</p>";
echo "<p>✅ Listo para nueva subida</p>";

echo "<hr>";
echo "<p><strong>Próximo paso:</strong> Ve al admin y sube las imágenes nuevamente</p>";
echo "<p><a href='/admin/usados/CFR032/edit'>Ir al admin</a></p>";
