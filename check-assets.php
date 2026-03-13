<?php
/**
 * Verificar assets en el servidor
 * https://honda.com.py/laravel/check-assets.php
 */

$basePath = __DIR__;

echo "<pre style='background:#111;color:#0f0;padding:20px;font-family:monospace;'>";
echo "=== VERIFICACIÓN DE ASSETS ===\n\n";

// Verificar directorio build
$buildDir = $basePath . '/build';
echo "Directorio build: $buildDir\n";
echo "Existe: " . (is_dir($buildDir) ? "✅ SÍ" : "❌ NO") . "\n\n";

// Verificar directorio assets
$assetsDir = $basePath . '/build/assets';
echo "Directorio build/assets: $assetsDir\n";
echo "Existe: " . (is_dir($assetsDir) ? "✅ SÍ" : "❌ NO") . "\n\n";

// Listar archivos en build/assets
if (is_dir($assetsDir)) {
    echo "=== ARCHIVOS EN build/assets ===\n";
    $files = scandir($assetsDir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $fullPath = $assetsDir . '/' . $file;
            $size = filesize($fullPath);
            echo "  - $file (" . number_format($size) . " bytes)\n";
        }
    }
} else {
    echo "❌ El directorio build/assets NO EXISTE\n";
    echo "\nVerificando estructura:\n";
    
    // Verificar public
    $publicDir = $basePath;
    echo "Contenido de raíz:\n";
    $files = scandir($publicDir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $type = is_dir($publicDir . '/' . $file) ? '[DIR]' : '[FILE]';
            echo "  $type $file\n";
        }
    }
}

// Verificar manifest
echo "\n=== MANIFEST DE VITE ===\n";
$manifestPath = $basePath . '/build/manifest.json';
if (file_exists($manifestPath)) {
    echo "✅ manifest.json existe\n";
    $manifest = json_decode(file_get_contents($manifestPath), true);
    echo "Contenido:\n";
    print_r($manifest);
} else {
    echo "❌ manifest.json NO existe\n";
    
    // Buscar en .vite
    $viteManifest = $basePath . '/build/.vite/manifest.json';
    if (file_exists($viteManifest)) {
        echo "✅ .vite/manifest.json existe\n";
        $manifest = json_decode(file_get_contents($viteManifest), true);
        echo "Contenido:\n";
        print_r($manifest);
    }
}

// Verificar .htaccess
echo "\n=== .HTACCESS ===\n";
$htaccess = $basePath . '/.htaccess';
if (file_exists($htaccess)) {
    echo "✅ .htaccess existe\n";
    echo "Contenido:\n";
    echo htmlspecialchars(file_get_contents($htaccess));
} else {
    echo "❌ .htaccess NO existe\n";
}

echo "\n</pre>";
