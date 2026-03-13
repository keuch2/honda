<?php
/**
 * Script para capturar errores al cargar rutas
 * Acceder: https://honda.com.py/debug-error.php?token=honda2025check
 */

define('CHECK_TOKEN', 'honda2025check');

if (!isset($_GET['token']) || $_GET['token'] !== CHECK_TOKEN) {
    http_response_code(403);
    die('❌ Acceso denegado');
}

// Activar reporte de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Debug de Errores</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 20px auto; padding: 20px; background: #f5f5f5; }
        .container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #cc0000; border-bottom: 3px solid #cc0000; padding-bottom: 10px; }
        .result { padding: 10px; margin: 10px 0; border-radius: 4px; font-family: monospace; font-size: 12px; white-space: pre-wrap; }
        .success { background: #d4edda; color: #155724; border-left: 4px solid #28a745; }
        .error { background: #f8d7da; color: #721c24; border-left: 4px solid #dc3545; }
        .info { background: #e7f3ff; color: #004085; border-left: 4px solid #007bff; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🐛 Debug de Errores al Cargar Rutas</h1>
        
        <?php
        $basePath = __DIR__;
        
        echo '<h3>📝 Paso 1: Cargar Autoload</h3>';
        try {
            require $basePath . '/vendor/autoload.php';
            echo "<div class='result success'>✅ Autoload cargado</div>";
        } catch (\Throwable $e) {
            echo "<div class='result error'>❌ Error en autoload: " . $e->getMessage() . "</div>";
            die();
        }
        
        echo '<h3>📝 Paso 2: Cargar Bootstrap</h3>';
        try {
            $app = require_once $basePath . '/bootstrap/app.php';
            echo "<div class='result success'>✅ Bootstrap cargado</div>";
        } catch (\Throwable $e) {
            echo "<div class='result error'>❌ Error en bootstrap: " . $e->getMessage() . "\n\nArchivo: " . $e->getFile() . "\nLínea: " . $e->getLine() . "\n\nStack:\n" . $e->getTraceAsString() . "</div>";
            die();
        }
        
        echo '<h3>📝 Paso 3: Obtener Router</h3>';
        try {
            $router = $app->make('router');
            echo "<div class='result success'>✅ Router obtenido</div>";
        } catch (\Throwable $e) {
            echo "<div class='result error'>❌ Error al obtener router: " . $e->getMessage() . "</div>";
            die();
        }
        
        echo '<h3>📝 Paso 4: Obtener Rutas</h3>';
        try {
            $routes = $router->getRoutes();
            $count = count($routes);
            
            if ($count > 0) {
                echo "<div class='result success'>✅ Rutas obtenidas: $count rutas</div>";
                
                // Mostrar algunas rutas de ejemplo
                echo '<h4>Primeras 10 rutas:</h4>';
                $i = 0;
                foreach ($routes as $route) {
                    if ($i >= 10) break;
                    $methods = implode('|', $route->methods());
                    $uri = $route->uri();
                    $name = $route->getName() ?? '-';
                    echo "<div class='result info'>$methods $uri [$name]</div>";
                    $i++;
                }
                
                // Buscar rutas de admin/usados/images
                echo '<h4>Rutas de admin/usados/images:</h4>';
                $found = false;
                foreach ($routes as $route) {
                    $uri = $route->uri();
                    if (strpos($uri, 'admin/usados') !== false && strpos($uri, 'images') !== false) {
                        $methods = implode('|', $route->methods());
                        $name = $route->getName() ?? '-';
                        echo "<div class='result success'>✅ $methods $uri [$name]</div>";
                        $found = true;
                    }
                }
                
                if (!$found) {
                    echo "<div class='result error'>❌ No se encontraron rutas de admin/usados/images</div>";
                }
                
            } else {
                echo "<div class='result error'>❌ 0 rutas obtenidas</div>";
                
                // Intentar cargar manualmente routes/web.php
                echo '<h4>Intentando cargar routes/web.php manualmente:</h4>';
                try {
                    ob_start();
                    require $basePath . '/routes/web.php';
                    $output = ob_get_clean();
                    echo "<div class='result success'>✅ routes/web.php cargado sin errores</div>";
                    if ($output) {
                        echo "<div class='result info'>Output: $output</div>";
                    }
                } catch (\Throwable $e) {
                    ob_end_clean();
                    echo "<div class='result error'>❌ Error al cargar routes/web.php: " . $e->getMessage() . "\n\nArchivo: " . $e->getFile() . "\nLínea: " . $e->getLine() . "</div>";
                }
                
                // Intentar cargar manualmente routes/admin.php
                echo '<h4>Intentando cargar routes/admin.php manualmente:</h4>';
                try {
                    ob_start();
                    require $basePath . '/routes/admin.php';
                    $output = ob_get_clean();
                    echo "<div class='result success'>✅ routes/admin.php cargado sin errores</div>";
                    if ($output) {
                        echo "<div class='result info'>Output: $output</div>";
                    }
                } catch (\Throwable $e) {
                    ob_end_clean();
                    echo "<div class='result error'>❌ Error al cargar routes/admin.php: " . $e->getMessage() . "\n\nArchivo: " . $e->getFile() . "\nLínea: " . $e->getLine() . "</div>";
                }
            }
            
        } catch (\Throwable $e) {
            echo "<div class='result error'>❌ Error al obtener rutas: " . $e->getMessage() . "\n\nArchivo: " . $e->getFile() . "\nLínea: " . $e->getLine() . "\n\nStack:\n" . $e->getTraceAsString() . "</div>";
        }
        ?>
        
        <div style="margin-top: 20px; text-align: center;">
            <a href="/">🏠 Inicio</a> | 
            <a href="/admin">🔧 Admin</a>
        </div>
    </div>
</body>
</html>
