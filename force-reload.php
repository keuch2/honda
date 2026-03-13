<?php
/**
 * Forzar recarga de OPcache y verificar rutas
 */

echo "<pre style='background:#111;color:#0f0;padding:20px;'>";
echo "=== FORZANDO RECARGA ===\n\n";

// 1. Limpiar OPcache si está disponible
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "✅ OPcache reseteado\n";
} else {
    echo "⚠️ OPcache no disponible\n";
}

// 2. Invalidar archivos específicos
$files = [
    __DIR__ . '/routes/web.php',
    __DIR__ . '/routes/admin.php',
    __DIR__ . '/bootstrap/app.php',
];

foreach ($files as $file) {
    if (function_exists('opcache_invalidate') && file_exists($file)) {
        opcache_invalidate($file, true);
        echo "✅ Invalidado: " . basename($file) . "\n";
    }
}

// 3. Limpiar caché de Laravel manualmente
$cacheDirs = [
    __DIR__ . '/bootstrap/cache',
    __DIR__ . '/storage/framework/cache/data',
    __DIR__ . '/storage/framework/views',
];

foreach ($cacheDirs as $dir) {
    if (is_dir($dir)) {
        $files = glob($dir . '/*.php');
        $count = 0;
        foreach ($files as $file) {
            if (is_file($file) && basename($file) !== '.gitignore') {
                @unlink($file);
                $count++;
            }
        }
        echo "✅ Limpiado $dir ($count archivos)\n";
    }
}

echo "\n=== CARGANDO LARAVEL FRESCO ===\n\n";

// 4. Cargar Laravel desde cero
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Forzar carga de rutas
$app->make('router');

// 5. Mostrar rutas admin
$routes = app('router')->getRoutes();
$adminRoutes = [];

foreach ($routes as $route) {
    $uri = $route->uri();
    if (strpos($uri, 'admin') !== false) {
        $adminRoutes[] = [
            'methods' => implode('|', $route->methods()),
            'uri' => $uri,
            'name' => $route->getName() ?? '-',
        ];
    }
}

if (empty($adminRoutes)) {
    echo "❌ NO HAY RUTAS ADMIN REGISTRADAS\n\n";
    
    // Debug: mostrar todas las rutas
    echo "=== TODAS LAS RUTAS ===\n";
    foreach ($routes as $route) {
        echo $route->uri() . "\n";
    }
} else {
    echo "✅ RUTAS ADMIN ENCONTRADAS: " . count($adminRoutes) . "\n\n";
    foreach ($adminRoutes as $r) {
        echo sprintf("%-10s %-40s %s\n", $r['methods'], $r['uri'], $r['name']);
    }
}

echo "\n=== PRUEBA DE ACCESO ===\n";
echo "Intenta acceder a: https://honda.com.py/laravel/admin/usados\n";

echo "</pre>";

echo "<p><a href='/laravel/admin/usados'>Ir a Admin Usados</a></p>";
