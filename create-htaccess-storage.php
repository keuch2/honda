<?php
/**
 * Script para crear .htaccess en public/storage
 * Acceder: https://honda.com.py/create-htaccess-storage.php?token=honda2025check
 */

define('CHECK_TOKEN', 'honda2025check');

if (!isset($_GET['token']) || $_GET['token'] !== CHECK_TOKEN) {
    http_response_code(403);
    die('❌ Acceso denegado');
}

$htaccessContent = <<<'HTACCESS'
# Allow access to storage files
<IfModule mod_rewrite.c>
    RewriteEngine Off
</IfModule>

# Allow all files
<FilesMatch ".*">
    Require all granted
</FilesMatch>
HTACCESS;

$publicStoragePath = __DIR__ . '/public/storage';
$htaccessPath = $publicStoragePath . '/.htaccess';

echo "<h1>Crear .htaccess en public/storage</h1>";

// Verificar si public/storage existe
if (!file_exists($publicStoragePath)) {
    echo "<p>❌ public/storage no existe</p>";
    exit;
}

echo "<p>✅ public/storage existe</p>";
echo "<p><strong>Es symlink:</strong> " . (is_link($publicStoragePath) ? 'Sí' : 'No') . "</p>";

if (is_link($publicStoragePath)) {
    $target = readlink($publicStoragePath);
    echo "<p><strong>Apunta a:</strong> $target</p>";
    
    // Crear .htaccess en el directorio real (storage/app/public)
    $realPath = realpath($publicStoragePath);
    $htaccessPath = $realPath . '/.htaccess';
    
    echo "<p><strong>Creando .htaccess en:</strong> $htaccessPath</p>";
}

// Intentar crear el archivo
if (file_put_contents($htaccessPath, $htaccessContent)) {
    echo "<p>✅ .htaccess creado exitosamente</p>";
    echo "<p><strong>Ubicación:</strong> $htaccessPath</p>";
    echo "<p><strong>Contenido:</strong></p>";
    echo "<pre>" . htmlspecialchars($htaccessContent) . "</pre>";
} else {
    echo "<p>❌ No se pudo crear .htaccess</p>";
    echo "<p>Verifica permisos del directorio</p>";
}

echo "<hr>";
echo "<p><a href='/storage/usados/cfr032/gallery/gT4xY6NxULLvDQVequT03HJucwTQbVEUSk7B1Zw8.jpg' target='_blank'>Probar imagen</a></p>";
echo "<p><a href='/admin/usados/CFR032/edit'>← Volver al admin</a></p>";
