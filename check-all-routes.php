<?php
/**
 * Listar TODAS las rutas
 */

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::create('/', 'GET');
$response = $kernel->handle($request);

echo "<pre style='background:#111;color:#0f0;padding:20px;'>";
echo "=== TODAS LAS RUTAS (40) ===\n\n";

$router = app('router');
$routes = $router->getRoutes();

foreach ($routes as $route) {
    $methods = implode('|', $route->methods());
    $uri = $route->uri();
    $name = $route->getName() ?? '-';
    $action = $route->getActionName();
    
    // Resaltar rutas admin
    if (strpos($uri, 'admin') !== false) {
        echo "🔴 ";
    } else {
        echo "   ";
    }
    
    echo sprintf("%-12s %-45s %-35s %s\n", $methods, $uri, $name, $action);
}

$kernel->terminate($request, $response);
echo "</pre>";
