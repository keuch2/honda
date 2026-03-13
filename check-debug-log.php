<?php
/**
 * Script para leer el log de debug
 * Acceder: https://honda.com.py/check-debug-log.php?token=honda2025check
 */

define('CHECK_TOKEN', 'honda2025check');

if (!isset($_GET['token']) || $_GET['token'] !== CHECK_TOKEN) {
    http_response_code(403);
    die('❌ Acceso denegado');
}

$debugFile = __DIR__ . '/storage/logs/image-upload.log';

echo "<h1>Log de Debug de Subida de Imágenes</h1>";

if (file_exists($debugFile)) {
    echo "<p>✅ Archivo de debug existe</p>";
    echo "<p><strong>Tamaño:</strong> " . filesize($debugFile) . " bytes</p>";
    echo "<h3>Contenido:</h3>";
    echo "<pre style='background: #f5f5f5; padding: 15px; border: 1px solid #ccc; overflow-x: auto;'>";
    echo htmlspecialchars(file_get_contents($debugFile));
    echo "</pre>";
} else {
    echo "<p>❌ Archivo de debug no existe en: $debugFile</p>";
}

echo "<hr>";
echo "<p><a href='/admin/usados/CFR032/edit'>← Volver al admin</a></p>";
