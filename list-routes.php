<?php
/**
 * Script para listar todas las rutas registradas
 * Acceder: https://honda.com.py/list-routes.php?token=honda2025check
 */

define('CHECK_TOKEN', 'honda2025check');

if (!isset($_GET['token']) || $_GET['token'] !== CHECK_TOKEN) {
    http_response_code(403);
    die('❌ Acceso denegado');
}

// Simular una petición web para que Laravel cargue correctamente
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REQUEST_URI'] = '/';

require __DIR__.'/vendor/autoload.php';

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

$app = require_once __DIR__.'/bootstrap/app.php';

// Bootear la aplicación
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Request::capture();
$kernel->bootstrap();

// Obtener rutas
$routes = app('router')->getRoutes();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Rutas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { background: white; padding: 20px; border-radius: 8px; max-width: 1400px; margin: 0 auto; }
        h1 { color: #cc0000; border-bottom: 3px solid #cc0000; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 11px; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #cc0000; color: white; position: sticky; top: 0; }
        tr:hover { background: #f5f5f5; }
        .method { font-weight: bold; padding: 2px 6px; border-radius: 3px; display: inline-block; min-width: 50px; text-align: center; }
        .method-get { background: #28a745; color: white; }
        .method-post { background: #007bff; color: white; }
        .method-put { background: #ffc107; color: #333; }
        .method-patch { background: #17a2b8; color: white; }
        .method-delete { background: #dc3545; color: white; }
        .highlight { background: #fff3cd; font-weight: bold; }
        .search { margin: 20px 0; padding: 10px; width: 100%; font-size: 14px; border: 2px solid #cc0000; border-radius: 4px; }
        .count { padding: 10px; background: #e7f3ff; border-left: 4px solid #007bff; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📋 Rutas Registradas en Laravel</h1>
        
        <div class="count">
            <strong>Total de rutas:</strong> <?php echo count($routes); ?>
        </div>
        
        <input type="text" class="search" id="searchInput" placeholder="Buscar rutas... (ej: usados/images)">
        
        <table id="routesTable">
            <thead>
                <tr>
                    <th>Método</th>
                    <th>URI</th>
                    <th>Nombre</th>
                    <th>Acción</th>
                    <th>Middleware</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($routes as $route): ?>
                    <?php
                    $methods = $route->methods();
                    $uri = $route->uri();
                    $name = $route->getName() ?? '-';
                    $action = $route->getActionName();
                    $middleware = implode(', ', $route->middleware());
                    
                    // Resaltar rutas de usados/images
                    $isHighlight = strpos($uri, 'usados') !== false && strpos($uri, 'images') !== false;
                    ?>
                    <tr class="<?php echo $isHighlight ? 'highlight' : ''; ?>">
                        <td>
                            <?php foreach ($methods as $method): ?>
                                <?php if ($method !== 'HEAD'): ?>
                                    <span class="method method-<?php echo strtolower($method); ?>">
                                        <?php echo $method; ?>
                                    </span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td><?php echo htmlspecialchars($uri); ?></td>
                        <td><?php echo htmlspecialchars($name); ?></td>
                        <td style="font-size: 10px;"><?php echo htmlspecialchars($action); ?></td>
                        <td style="font-size: 10px;"><?php echo htmlspecialchars($middleware); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div style="margin-top: 20px; text-align: center;">
            <a href="/">🏠 Inicio</a> | 
            <a href="/admin">🔧 Admin</a>
        </div>
    </div>
    
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#routesTable tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
