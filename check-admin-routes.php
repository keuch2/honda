<?php
/**
 * Verificar por qué las rutas admin no se registran
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<pre style='background:#111;color:#0f0;padding:20px;'>";
echo "=== VERIFICACIÓN DE RUTAS ADMIN ===\n\n";

// 1. Verificar que los controladores existen
$controllers = [
    'App\Http\Controllers\Admin\UsadoController',
    'App\Http\Controllers\Admin\NoticiaController', 
    'App\Http\Controllers\Admin\UserController',
];

require __DIR__.'/vendor/autoload.php';

echo "=== VERIFICANDO CONTROLADORES ===\n";
foreach ($controllers as $controller) {
    if (class_exists($controller)) {
        echo "✅ $controller\n";
    } else {
        echo "❌ $controller - NO EXISTE\n";
    }
}

// 2. Verificar archivos de controladores
echo "\n=== VERIFICANDO ARCHIVOS ===\n";
$files = [
    'app/Http/Controllers/Admin/UsadoController.php',
    'app/Http/Controllers/Admin/NoticiaController.php',
    'app/Http/Controllers/Admin/UserController.php',
];

foreach ($files as $file) {
    $path = __DIR__ . '/' . $file;
    if (file_exists($path)) {
        echo "✅ $file (" . filesize($path) . " bytes)\n";
    } else {
        echo "❌ $file - NO EXISTE\n";
    }
}

// 3. Verificar sintaxis de web.php
echo "\n=== VERIFICANDO SINTAXIS DE web.php ===\n";
echo "(shell_exec deshabilitado en servidor)\n";

// 4. Intentar incluir web.php y capturar errores
echo "\n=== INTENTANDO CARGAR RUTAS ===\n";

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Crear request fake para inicializar Laravel
$request = Illuminate\Http\Request::create('/', 'GET');

try {
    $response = $kernel->handle($request);
    echo "✅ Laravel inicializado correctamente\n";
    
    // Ahora verificar rutas
    $router = app('router');
    $routes = $router->getRoutes();
    
    echo "\nTotal de rutas: " . count($routes) . "\n\n";
    
    // Buscar rutas admin
    $adminRoutes = [];
    foreach ($routes as $route) {
        if (strpos($route->uri(), 'admin') !== false) {
            $adminRoutes[] = $route->uri() . ' -> ' . ($route->getName() ?? 'sin nombre');
        }
    }
    
    if (empty($adminRoutes)) {
        echo "❌ NO HAY RUTAS ADMIN\n\n";
        
        // Mostrar las primeras 30 rutas
        echo "Primeras 30 rutas:\n";
        $i = 0;
        foreach ($routes as $route) {
            if ($i++ >= 30) break;
            echo "  " . $route->uri() . "\n";
        }
    } else {
        echo "✅ RUTAS ADMIN ENCONTRADAS:\n";
        foreach ($adminRoutes as $r) {
            echo "  $r\n";
        }
    }
    
    $kernel->terminate($request, $response);
    
} catch (Throwable $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "Archivo: " . $e->getFile() . ":" . $e->getLine() . "\n";
}

echo "</pre>";
