<?php
/**
 * Script de diagnóstico para verificar rutas en el servidor
 * Subir a /public/ y acceder vía https://honda.com.py/check-path.php
 * ELIMINAR después de obtener la información
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnóstico de Rutas - Honda Laravel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
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
        }
        .info-block {
            background: #f9f9f9;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid #cc0000;
            border-radius: 4px;
        }
        .info-block h3 {
            margin-top: 0;
            color: #333;
        }
        .path {
            background: #1f1f1f;
            color: #00ff00;
            padding: 10px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            overflow-x: auto;
            margin: 10px 0;
        }
        .warning {
            background: #fff3cd;
            border-left-color: #ffc107;
            color: #856404;
        }
        .success {
            background: #d4edda;
            border-left-color: #28a745;
            color: #155724;
        }
        .error {
            background: #f8d7da;
            border-left-color: #dc3545;
            color: #721c24;
        }
        code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
        }
        .copy-btn {
            background: #cc0000;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        .copy-btn:hover {
            background: #990000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 Diagnóstico de Rutas - Honda Laravel</h1>
        
        <div class="info-block warning">
            <h3>⚠️ IMPORTANTE</h3>
            <p><strong>ELIMINAR este archivo después de obtener la información.</strong></p>
            <p>Este archivo expone información sensible del servidor.</p>
        </div>

        <div class="info-block">
            <h3>📁 Ruta del Directorio Public</h3>
            <div class="path"><?php echo __DIR__; ?></div>
            <button class="copy-btn" onclick="copyToClipboard('<?php echo addslashes(__DIR__); ?>')">Copiar</button>
        </div>

        <div class="info-block">
            <h3>📁 Ruta Base del Proyecto Laravel</h3>
            <div class="path"><?php echo dirname(__DIR__); ?></div>
            <button class="copy-btn" onclick="copyToClipboard('<?php echo addslashes(dirname(__DIR__)); ?>')">Copiar</button>
        </div>

        <div class="info-block">
            <h3>🔒 open_basedir Actual</h3>
            <div class="path">
                <?php 
                $openBasedir = ini_get('open_basedir');
                echo $openBasedir ? $openBasedir : 'No configurado (sin restricciones)';
                ?>
            </div>
            <?php if ($openBasedir): ?>
                <button class="copy-btn" onclick="copyToClipboard('<?php echo addslashes($openBasedir); ?>')">Copiar</button>
            <?php endif; ?>
        </div>

        <div class="info-block <?php echo $openBasedir ? 'error' : 'success'; ?>">
            <h3><?php echo $openBasedir ? '❌ Restricción Activa' : '✅ Sin Restricciones'; ?></h3>
            <?php if ($openBasedir): ?>
                <p>El servidor tiene restricciones de <code>open_basedir</code> activas.</p>
                <p>Laravel necesita acceso a todo el directorio del proyecto.</p>
            <?php else: ?>
                <p>No hay restricciones de <code>open_basedir</code>.</p>
                <p>El error puede ser por otra causa.</p>
            <?php endif; ?>
        </div>

        <div class="info-block">
            <h3>🛠️ Configuración open_basedir Recomendada</h3>
            <p>Copiar esta configuración al panel de Ferozo o archivo <code>.user.ini</code>:</p>
            <div class="path">
                <?php 
                $basePath = dirname(__DIR__);
                $tmpPath = '/tmp';
                $phpPath = '/usr/share/php';
                $recommended = $basePath . ':' . $tmpPath . ':' . $phpPath;
                echo 'open_basedir = ' . $recommended;
                ?>
            </div>
            <button class="copy-btn" onclick="copyToClipboard('open_basedir = <?php echo addslashes($recommended); ?>')">Copiar Configuración</button>
        </div>

        <div class="info-block">
            <h3>📊 Información Adicional del Servidor</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 8px;"><strong>Versión PHP:</strong></td>
                    <td style="padding: 8px;"><?php echo phpversion(); ?></td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 8px;"><strong>Sistema Operativo:</strong></td>
                    <td style="padding: 8px;"><?php echo PHP_OS; ?></td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 8px;"><strong>Usuario del Servidor:</strong></td>
                    <td style="padding: 8px;"><?php echo get_current_user(); ?></td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 8px;"><strong>Directorio Temporal:</strong></td>
                    <td style="padding: 8px;"><?php echo sys_get_temp_dir(); ?></td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 8px;"><strong>Memory Limit:</strong></td>
                    <td style="padding: 8px;"><?php echo ini_get('memory_limit'); ?></td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 8px;"><strong>Max Execution Time:</strong></td>
                    <td style="padding: 8px;"><?php echo ini_get('max_execution_time'); ?>s</td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 8px;"><strong>Upload Max Filesize:</strong></td>
                    <td style="padding: 8px;"><?php echo ini_get('upload_max_filesize'); ?></td>
                </tr>
            </table>
        </div>

        <div class="info-block">
            <h3>✅ Próximos Pasos</h3>
            <ol>
                <li>Copiar la configuración <code>open_basedir</code> recomendada arriba</li>
                <li>Ir al panel de Ferozo → Configuración PHP</li>
                <li>Pegar la configuración en el campo <code>open_basedir</code></li>
                <li>Guardar y esperar 5-10 minutos</li>
                <li><strong>ELIMINAR este archivo (check-path.php)</strong></li>
                <li>Refrescar honda.com.py</li>
            </ol>
        </div>

        <div class="info-block error">
            <h3>🗑️ ELIMINAR ESTE ARCHIVO</h3>
            <p>Después de copiar la información necesaria, <strong>eliminar inmediatamente</strong> este archivo por FTP:</p>
            <div class="path"><?php echo __DIR__ . '/check-path.php'; ?></div>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.style.position = 'fixed';
            textarea.style.opacity = '0';
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            alert('✅ Copiado al portapapeles:\n\n' + text);
        }
    </script>
</body>
</html>
