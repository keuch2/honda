<?php
/**
 * Script para crear symlink de storage
 * Acceder: https://honda.com.py/create-symlink.php?token=honda2025check
 */

define('CHECK_TOKEN', 'honda2025check');

if (!isset($_GET['token']) || $_GET['token'] !== CHECK_TOKEN) {
    http_response_code(403);
    die('❌ Acceso denegado');
}

$basePath = __DIR__;
$publicStoragePath = $basePath . '/public/storage';
$storageAppPublicPath = $basePath . '/storage/app/public';

echo "<h1>Crear Symlink de Storage</h1>";

echo "<h3>Verificación:</h3>";
echo "<p><strong>public/storage existe:</strong> " . (file_exists($publicStoragePath) ? '✅ Sí' : '❌ No') . "</p>";
echo "<p><strong>public/storage es symlink:</strong> " . (is_link($publicStoragePath) ? '✅ Sí' : '❌ No') . "</p>";
echo "<p><strong>storage/app/public existe:</strong> " . (is_dir($storageAppPublicPath) ? '✅ Sí' : '❌ No') . "</p>";

if (is_link($publicStoragePath)) {
    $target = readlink($publicStoragePath);
    echo "<p><strong>Symlink apunta a:</strong> $target</p>";
}

echo "<h3>Acción:</h3>";

// Si public/storage existe pero no es symlink, eliminarlo
if (file_exists($publicStoragePath) && !is_link($publicStoragePath)) {
    echo "<p>⚠️ public/storage existe pero no es symlink. Eliminando...</p>";
    if (is_dir($publicStoragePath)) {
        rmdir($publicStoragePath);
    } else {
        unlink($publicStoragePath);
    }
}

// Crear symlink
if (!file_exists($publicStoragePath)) {
    if (symlink($storageAppPublicPath, $publicStoragePath)) {
        echo "<p>✅ Symlink creado exitosamente</p>";
        echo "<p><strong>De:</strong> $publicStoragePath</p>";
        echo "<p><strong>A:</strong> $storageAppPublicPath</p>";
    } else {
        echo "<p>❌ Error al crear symlink. Verifica permisos.</p>";
        
        // Alternativa: crear .htaccess redirect
        echo "<h3>Alternativa: Crear redirect con .htaccess</h3>";
        $htaccessPath = $basePath . '/public/storage/.htaccess';
        $htaccessContent = <<<'HTACCESS'
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ ../../storage/app/public/$1 [L]
</IfModule>
HTACCESS;
        
        if (!is_dir($basePath . '/public/storage')) {
            mkdir($basePath . '/public/storage', 0755, true);
        }
        
        if (file_put_contents($htaccessPath, $htaccessContent)) {
            echo "<p>✅ .htaccess creado en public/storage/</p>";
        } else {
            echo "<p>❌ No se pudo crear .htaccess</p>";
        }
    }
} else {
    echo "<p>✅ Symlink ya existe</p>";
}

echo "<h3>Prueba de acceso:</h3>";
$testImagePath = 'usados/cfr032/gallery/RvQ5oQ1nMVqHx5ZO3HdQ3Z6lHGAXDxo9GT7HADmu.jpg';
$fullPath = $storageAppPublicPath . '/' . $testImagePath;
echo "<p><strong>Imagen de prueba existe:</strong> " . (file_exists($fullPath) ? '✅ Sí' : '❌ No') . "</p>";
if (file_exists($fullPath)) {
    echo "<p><strong>Tamaño:</strong> " . number_format(filesize($fullPath)) . " bytes</p>";
    echo "<p><strong>URL esperada:</strong> <a href='/storage/$testImagePath' target='_blank'>/storage/$testImagePath</a></p>";
}

echo "<hr>";
echo "<p><a href='/admin/usados/CFR032/edit'>← Volver al admin</a></p>";
