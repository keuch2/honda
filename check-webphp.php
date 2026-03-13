<?php
/**
 * Verificar contenido de web.php en servidor
 */

echo "<pre style='background:#111;color:#0f0;padding:20px;'>";
echo "=== CONTENIDO DE routes/web.php ===\n\n";

$webPhp = __DIR__ . '/routes/web.php';
if (file_exists($webPhp)) {
    $content = file_get_contents($webPhp);
    echo htmlspecialchars($content);
    
    echo "\n\n=== BÚSQUEDA DE 'admin' ===\n";
    if (strpos($content, 'admin') !== false) {
        echo "✅ Contiene 'admin'\n";
    } else {
        echo "❌ NO contiene 'admin'\n";
    }
    
    if (strpos($content, "Route::middleware(['web', 'auth'])->prefix('admin')") !== false) {
        echo "✅ Contiene rutas admin inline\n";
    } else {
        echo "❌ NO contiene rutas admin inline\n";
    }
} else {
    echo "❌ Archivo no existe\n";
}

echo "</pre>";
