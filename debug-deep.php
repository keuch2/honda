<?php
/**
 * Debug profundo - Ver errores de Laravel
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<pre style='background:#111;color:#0f0;padding:20px;'>";
echo "=== DEBUG PROFUNDO ===\n\n";

// Verificar autoload
$autoload = __DIR__ . '/vendor/autoload.php';
if (!file_exists($autoload)) {
    die("❌ vendor/autoload.php NO EXISTE - Ejecutar composer install");
}

require $autoload;

echo "✅ Autoload cargado\n";

// Verificar bootstrap/app.php
$appFile = __DIR__ . '/bootstrap/app.php';
if (!file_exists($appFile)) {
    die("❌ bootstrap/app.php NO EXISTE");
}

echo "✅ bootstrap/app.php existe\n";

// Intentar cargar la aplicación con manejo de errores
try {
    $app = require_once $appFile;
    echo "✅ Aplicación creada\n";
    
    // Verificar que es una instancia válida
    echo "Tipo de app: " . get_class($app) . "\n";
    
    // Intentar obtener el kernel
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    echo "✅ Kernel HTTP creado\n";
    
    // Bootear la aplicación
    $app->boot();
    echo "✅ Aplicación booteada\n";
    
    // Obtener el router
    $router = $app->make('router');
    echo "✅ Router obtenido\n";
    
    // Contar rutas
    $routes = $router->getRoutes();
    $count = count($routes);
    echo "Total de rutas: $count\n\n";
    
    if ($count === 0) {
        echo "❌ NO HAY RUTAS - Verificando por qué...\n\n";
        
        // Verificar si web.php se puede incluir
        echo "=== INTENTANDO CARGAR web.php MANUALMENTE ===\n";
        $webPhp = __DIR__ . '/routes/web.php';
        
        // Verificar sintaxis
        $output = [];
        $return = 0;
        exec("php -l " . escapeshellarg($webPhp) . " 2>&1", $output, $return);
        echo "Verificación de sintaxis:\n";
        echo implode("\n", $output) . "\n\n";
        
        // Intentar incluir directamente
        echo "=== INCLUYENDO web.php ===\n";
        try {
            // Simular el contexto de Laravel
            $Route = $app->make('router');
            
            // Incluir el archivo de rutas
            (function () use ($webPhp) {
                require $webPhp;
            })();
            
            // Recontar
            $newCount = count($router->getRoutes());
            echo "Rutas después de incluir: $newCount\n";
            
        } catch (Exception $e) {
            echo "❌ Error al incluir web.php:\n";
            echo $e->getMessage() . "\n";
            echo $e->getTraceAsString() . "\n";
        }
    } else {
        echo "=== PRIMERAS 20 RUTAS ===\n";
        $i = 0;
        foreach ($routes as $route) {
            if ($i++ >= 20) break;
            echo $route->uri() . "\n";
        }
    }
    
} catch (Exception $e) {
    echo "❌ ERROR:\n";
    echo "Mensaje: " . $e->getMessage() . "\n";
    echo "Archivo: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "\nTrace:\n" . $e->getTraceAsString() . "\n";
} catch (Error $e) {
    echo "❌ ERROR FATAL:\n";
    echo "Mensaje: " . $e->getMessage() . "\n";
    echo "Archivo: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "\nTrace:\n" . $e->getTraceAsString() . "\n";
}

echo "</pre>";
