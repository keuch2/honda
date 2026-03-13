<?php
/**
 * Script para limpiar caché de Laravel vía navegador
 * Acceder: https://honda.com.py/laravel/clear-cache.php?token=honda2025clear
 * ELIMINAR después de usar o cambiar el token
 * 
 * VERSIÓN SIN exec() - Funciona en hosting compartido
 */

// Token de seguridad
define('CLEAR_TOKEN', 'honda2025clear');

// Verificar token
if (!isset($_GET['token']) || $_GET['token'] !== CLEAR_TOKEN) {
    http_response_code(403);
    die('❌ Acceso denegado. Usar: ?token=' . CLEAR_TOKEN);
}

// Definir base path
$basePath = __DIR__;

// Verificar que estamos en un proyecto Laravel
if (!file_exists($basePath . '/artisan')) {
    die('❌ Error: No se encontró el archivo artisan. Este script debe estar en la raíz del proyecto Laravel.');
}

// Función para eliminar archivos recursivamente
function deleteFiles($path, $pattern = '*') {
    $count = 0;
    if (!is_dir($path)) return 0;
    
    $files = glob($path . '/' . $pattern);
    foreach ($files as $file) {
        if (is_file($file) && basename($file) !== '.gitignore' && basename($file) !== '.gitkeep') {
            if (@unlink($file)) {
                $count++;
            }
        }
    }
    return $count;
}

// Función para eliminar directorio recursivamente
function deleteDirectory($dir) {
    if (!is_dir($dir)) return 0;
    $count = 0;
    $files = array_diff(scandir($dir), ['.', '..']);
    foreach ($files as $file) {
        $path = $dir . '/' . $file;
        if (is_dir($path)) {
            $count += deleteDirectory($path);
        } else {
            if (basename($file) !== '.gitignore' && basename($file) !== '.gitkeep') {
                if (@unlink($path)) {
                    $count++;
                }
            }
        }
    }
    return $count;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limpiar Caché - Honda Laravel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #cc0000;
            border-bottom: 3px solid #cc0000;
            padding-bottom: 10px;
            margin-top: 0;
        }
        .result {
            padding: 10px 15px;
            margin: 10px 0;
            border-radius: 4px;
            font-family: monospace;
        }
        .success { background: #d4edda; color: #155724; border-left: 4px solid #28a745; }
        .error { background: #f8d7da; color: #721c24; border-left: 4px solid #dc3545; }
        .warning { background: #fff3cd; color: #856404; border-left: 4px solid #ffc107; }
        .info { background: #e7f3ff; color: #004085; border-left: 4px solid #007bff; }
        a { color: #cc0000; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🧹 Limpiar Caché - Honda Laravel</h1>
        
        <?php
        $totalDeleted = 0;
        
        echo '<h3>🗑️ Limpiando Caché de Laravel:</h3>';
        
        // 1. Bootstrap cache (config.php, routes.php, etc.)
        $bootstrapCache = $basePath . '/bootstrap/cache';
        $count = deleteFiles($bootstrapCache, '*.php');
        $totalDeleted += $count;
        if ($count > 0) {
            echo "<div class='result success'>✅ <strong>bootstrap/cache</strong> - $count archivo(s) eliminado(s) (config, routes, services)</div>";
        } else {
            echo "<div class='result info'>ℹ️ <strong>bootstrap/cache</strong> - Sin archivos de caché</div>";
        }
        
        // 2. Application cache
        $appCache = $basePath . '/storage/framework/cache/data';
        $count = deleteDirectory($appCache);
        $totalDeleted += $count;
        if ($count > 0) {
            echo "<div class='result success'>✅ <strong>storage/framework/cache</strong> - $count archivo(s) eliminado(s)</div>";
        } else {
            echo "<div class='result info'>ℹ️ <strong>storage/framework/cache</strong> - Sin archivos de caché</div>";
        }
        
        // 3. Compiled views
        $viewsCache = $basePath . '/storage/framework/views';
        $count = deleteFiles($viewsCache, '*.php');
        $totalDeleted += $count;
        if ($count > 0) {
            echo "<div class='result success'>✅ <strong>storage/framework/views</strong> - $count vista(s) compilada(s) eliminada(s)</div>";
        } else {
            echo "<div class='result info'>ℹ️ <strong>storage/framework/views</strong> - Sin vistas compiladas</div>";
        }
        
        // 4. Sessions (opcional)
        $sessions = $basePath . '/storage/framework/sessions';
        $count = deleteFiles($sessions, '*');
        $totalDeleted += $count;
        if ($count > 0) {
            echo "<div class='result success'>✅ <strong>storage/framework/sessions</strong> - $count sesión(es) eliminada(s)</div>";
        } else {
            echo "<div class='result info'>ℹ️ <strong>storage/framework/sessions</strong> - Sin sesiones</div>";
        }
        
        // 5. Logs (opcional - solo si son muy grandes)
        // No eliminamos logs por defecto
        
        // Resumen
        echo "<div class='result " . ($totalDeleted > 0 ? 'success' : 'info') . "' style='margin-top: 15px;'>";
        echo "<strong>📊 Total:</strong> $totalDeleted archivo(s) de caché eliminado(s)";
        echo "</div>";
        
        // Verificar permisos de directorios importantes
        echo '<h3>🔐 Verificando Permisos:</h3>';
        
        $dirsToCheck = [
            'storage/framework/cache',
            'storage/framework/views', 
            'storage/framework/sessions',
            'storage/logs',
            'bootstrap/cache'
        ];
        
        foreach ($dirsToCheck as $dir) {
            $fullPath = $basePath . '/' . $dir;
            if (is_dir($fullPath)) {
                $writable = is_writable($fullPath);
                $perms = substr(sprintf('%o', fileperms($fullPath)), -4);
                $class = $writable ? 'success' : 'error';
                $icon = $writable ? '✅' : '❌';
                echo "<div class='result $class'>$icon <strong>$dir</strong> - Permisos: $perms " . ($writable ? '(escribible)' : '(NO escribible)') . "</div>";
            } else {
                echo "<div class='result error'>❌ <strong>$dir</strong> - No existe</div>";
            }
        }
        ?>
        
        <div class="result warning" style="margin-top: 20px;">
            <strong>⚠️ Recuerda:</strong> Eliminar este archivo después de usar por seguridad.
        </div>
        
        <div style="margin-top: 20px; text-align: center;">
            <a href="/laravel/">🏠 Ir al Inicio</a> | 
            <a href="/laravel/admin">🔧 Ir al Admin</a> |
            <a href="?token=<?php echo CLEAR_TOKEN; ?>">🔄 Ejecutar de Nuevo</a>
        </div>
        
        <div style="margin-top: 20px; text-align: center; font-size: 12px; color: #666;">
            Ejecutado: <?php echo date('Y-m-d H:i:s'); ?>
        </div>
    </div>
</body>
</html>
