<?php
/**
 * Script para verificar configuración del servidor
 * Acceder: https://honda.com.py/info.php?token=honda2025check
 */

define('CHECK_TOKEN', 'honda2025check');

if (!isset($_GET['token']) || $_GET['token'] !== CHECK_TOKEN) {
    http_response_code(403);
    die('❌ Acceso denegado');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Info del Servidor</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 20px auto; padding: 20px; background: #f5f5f5; }
        .container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #cc0000; border-bottom: 3px solid #cc0000; padding-bottom: 10px; }
        .info { padding: 10px; margin: 5px 0; background: #e7f3ff; border-left: 4px solid #007bff; font-family: monospace; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 Información del Servidor</h1>
        
        <h3>📂 Rutas del Sistema:</h3>
        <div class="info"><strong>__DIR__:</strong> <?php echo __DIR__; ?></div>
        <div class="info"><strong>$_SERVER['DOCUMENT_ROOT']:</strong> <?php echo $_SERVER['DOCUMENT_ROOT']; ?></div>
        <div class="info"><strong>$_SERVER['SCRIPT_FILENAME']:</strong> <?php echo $_SERVER['SCRIPT_FILENAME']; ?></div>
        <div class="info"><strong>$_SERVER['REQUEST_URI']:</strong> <?php echo $_SERVER['REQUEST_URI']; ?></div>
        <div class="info"><strong>getcwd():</strong> <?php echo getcwd(); ?></div>
        
        <h3>🌐 URL Info:</h3>
        <div class="info"><strong>$_SERVER['HTTP_HOST']:</strong> <?php echo $_SERVER['HTTP_HOST'] ?? 'N/A'; ?></div>
        <div class="info"><strong>$_SERVER['SERVER_NAME']:</strong> <?php echo $_SERVER['SERVER_NAME'] ?? 'N/A'; ?></div>
        <div class="info"><strong>$_SERVER['SERVER_SOFTWARE']:</strong> <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'N/A'; ?></div>
        
        <h3>📁 Archivos Clave:</h3>
        <?php
        $files = [
            'index.php',
            'public/index.php',
            'routes/web.php',
            'bootstrap/app.php',
        ];
        
        foreach ($files as $file) {
            $fullPath = __DIR__ . '/' . $file;
            $exists = file_exists($fullPath) ? '✅' : '❌';
            echo "<div class='info'>$exists <strong>$file</strong>";
            if (file_exists($fullPath)) {
                echo " (" . number_format(filesize($fullPath)) . " bytes)";
            }
            echo "</div>";
        }
        ?>
        
        <h3>🔧 PHP Info:</h3>
        <div class="info"><strong>PHP Version:</strong> <?php echo PHP_VERSION; ?></div>
        <div class="info"><strong>Laravel Autoload:</strong> <?php echo file_exists(__DIR__ . '/vendor/autoload.php') ? '✅ Existe' : '❌ No existe'; ?></div>
        
        <h3>🧪 Test de Carga de Laravel:</h3>
        <?php
        try {
            if (file_exists(__DIR__ . '/vendor/autoload.php')) {
                require __DIR__ . '/vendor/autoload.php';
                echo "<div class='info' style='background: #d4edda; border-left-color: #28a745;'>✅ Autoload cargado</div>";
                
                if (file_exists(__DIR__ . '/bootstrap/app.php')) {
                    $app = require_once __DIR__ . '/bootstrap/app.php';
                    echo "<div class='info' style='background: #d4edda; border-left-color: #28a745;'>✅ App cargada</div>";
                    
                    $router = $app->make('router');
                    $routes = $router->getRoutes();
                    $count = count($routes);
                    
                    if ($count > 0) {
                        echo "<div class='info' style='background: #d4edda; border-left-color: #28a745;'>✅ Rutas cargadas: $count rutas</div>";
                        
                        // Buscar ruta específica
                        $found = false;
                        foreach ($routes as $route) {
                            if (strpos($route->uri(), 'admin/usados') !== false && strpos($route->uri(), 'images') !== false) {
                                $methods = implode('|', $route->methods());
                                echo "<div class='info' style='background: #fff3cd; border-left-color: #ffc107;'>🔍 Encontrada: $methods " . $route->uri() . "</div>";
                                $found = true;
                            }
                        }
                        
                        if (!$found) {
                            echo "<div class='info' style='background: #f8d7da; border-left-color: #dc3545;'>❌ No se encontraron rutas de admin/usados/images</div>";
                        }
                    } else {
                        echo "<div class='info' style='background: #f8d7da; border-left-color: #dc3545;'>❌ 0 rutas cargadas</div>";
                    }
                }
            } else {
                echo "<div class='info' style='background: #f8d7da; border-left-color: #dc3545;'>❌ vendor/autoload.php no existe</div>";
            }
        } catch (\Exception $e) {
            echo "<div class='info' style='background: #f8d7da; border-left-color: #dc3545;'>❌ Error: " . htmlspecialchars($e->getMessage()) . "</div>";
            echo "<div class='info' style='background: #f8d7da; border-left-color: #dc3545;'>Archivo: " . $e->getFile() . " Línea: " . $e->getLine() . "</div>";
        }
        ?>
        
        <div style="margin-top: 20px; text-align: center;">
            <a href="/">🏠 Inicio</a> | 
            <a href="/admin">🔧 Admin</a>
        </div>
    </div>
</body>
</html>
