<?php
/**
 * Script para verificar imagen ID 231
 * Acceder: https://honda.com.py/check-image-231.php?token=honda2025check
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

echo "<h1>Verificación de Imagen ID 231</h1>";

// Buscar imagen por ID
$image = \App\Models\UsadoImage::find(231);

if ($image) {
    echo "<p>✅ Imagen encontrada</p>";
    echo "<p><strong>ID:</strong> {$image->id}</p>";
    echo "<p><strong>Usado ID:</strong> {$image->usado_id}</p>";
    echo "<p><strong>Path:</strong> {$image->path}</p>";
    echo "<p><strong>Orden:</strong> {$image->orden}</p>";
    echo "<p><strong>Is Portada:</strong> " . ($image->is_portada ? 'Sí' : 'No') . "</p>";
    
    // Verificar archivo físico
    $filePath = __DIR__ . '/storage/app/public/' . $image->path;
    echo "<p><strong>Archivo físico existe:</strong> " . (file_exists($filePath) ? '✅ Sí' : '❌ No') . "</p>";
    
    if (file_exists($filePath)) {
        echo "<p><strong>Tamaño:</strong> " . number_format(filesize($filePath)) . " bytes</p>";
    }
    
    // Verificar el usado asociado
    $usado = $image->usado;
    if ($usado) {
        echo "<h3>Vehículo Asociado:</h3>";
        echo "<p><strong>ID:</strong> {$usado->id}</p>";
        echo "<p><strong>Legacy ID:</strong> {$usado->legacy_id}</p>";
        echo "<p><strong>Nombre:</strong> {$usado->displayName()}</p>";
        echo "<p><strong>Campo portada:</strong> " . ($usado->portada ?: 'NULL') . "</p>";
        
        // Contar imágenes del usado
        $imageCount = $usado->images()->count();
        echo "<p><strong>Total de imágenes:</strong> $imageCount</p>";
        
        if ($imageCount > 0) {
            echo "<h4>Todas las imágenes:</h4>";
            echo "<ul>";
            foreach ($usado->images as $img) {
                echo "<li>ID: {$img->id} - Orden: {$img->orden} - Portada: " . ($img->is_portada ? 'Sí' : 'No') . "</li>";
            }
            echo "</ul>";
        }
    } else {
        echo "<p>❌ No se encontró el vehículo asociado</p>";
    }
    
} else {
    echo "<p>❌ Imagen ID 231 no encontrada en la base de datos</p>";
}

echo "<hr>";
echo "<p><a href='/admin/usados/CFR032/edit'>← Volver al admin</a></p>";
