<?php
/**
 * Script para verificar dónde están las imágenes
 * Acceder: https://honda.com.py/check-images.php?token=honda2025check
 */

define('CHECK_TOKEN', 'honda2025check');

if (!isset($_GET['token']) || $_GET['token'] !== CHECK_TOKEN) {
    http_response_code(403);
    die('❌ Acceso denegado');
}

echo "<h1>Verificación de Imágenes</h1>";

$basePath = __DIR__;
$storagePublic = $basePath . '/storage/app/public';
$usadosPath = $storagePublic . '/usados';

echo "<h3>Estructura de directorios:</h3>";
echo "<p><strong>storage/app/public existe:</strong> " . (is_dir($storagePublic) ? '✅ Sí' : '❌ No') . "</p>";
echo "<p><strong>storage/app/public/usados existe:</strong> " . (is_dir($usadosPath) ? '✅ Sí' : '❌ No') . "</p>";

if (is_dir($usadosPath)) {
    echo "<h3>Contenido de storage/app/public/usados:</h3>";
    $dirs = scandir($usadosPath);
    echo "<ul>";
    foreach ($dirs as $dir) {
        if ($dir === '.' || $dir === '..') continue;
        $fullPath = $usadosPath . '/' . $dir;
        if (is_dir($fullPath)) {
            echo "<li><strong>$dir/</strong>";
            
            // Listar subdirectorios
            $subdirs = scandir($fullPath);
            echo "<ul>";
            foreach ($subdirs as $subdir) {
                if ($subdir === '.' || $subdir === '..') continue;
                $subPath = $fullPath . '/' . $subdir;
                if (is_dir($subPath)) {
                    echo "<li><strong>$subdir/</strong>";
                    
                    // Listar archivos
                    $files = scandir($subPath);
                    $imageFiles = array_filter($files, function($f) use ($subPath) {
                        return is_file($subPath . '/' . $f) && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $f);
                    });
                    
                    if (count($imageFiles) > 0) {
                        echo "<ul>";
                        foreach ($imageFiles as $file) {
                            $fileSize = filesize($subPath . '/' . $file);
                            $url = "/storage/usados/$dir/$subdir/$file";
                            echo "<li>$file (" . number_format($fileSize) . " bytes) - <a href='$url' target='_blank'>Ver</a></li>";
                        }
                        echo "</ul>";
                    } else {
                        echo " (vacío)";
                    }
                    
                    echo "</li>";
                }
            }
            echo "</ul>";
            echo "</li>";
        }
    }
    echo "</ul>";
}

// Verificar base de datos
echo "<h3>Imágenes en la base de datos:</h3>";
try {
    require $basePath . '/vendor/autoload.php';
    $app = require_once $basePath . '/bootstrap/app.php';
    
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $request = Illuminate\Http\Request::capture();
    $kernel->bootstrap();
    
    $images = \App\Models\UsadoImage::orderBy('id', 'desc')->limit(10)->get();
    
    if ($images->count() > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Usado ID</th><th>Path</th><th>URL Generada</th><th>Archivo Existe</th></tr>";
        foreach ($images as $img) {
            $filePath = $storagePublic . '/' . ltrim($img->path, '/');
            $exists = file_exists($filePath) ? '✅' : '❌';
            echo "<tr>";
            echo "<td>{$img->id}</td>";
            echo "<td>{$img->usado_id}</td>";
            echo "<td>{$img->path}</td>";
            echo "<td><a href='{$img->url()}' target='_blank'>{$img->url()}</a></td>";
            echo "<td>$exists</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay imágenes en la base de datos</p>";
    }
    
} catch (\Exception $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<p><a href='/admin/usados/CFR032/edit'>← Volver al admin</a></p>";
