#!/bin/bash

# Comandos para ejecutar en el servidor Ferozo después del deployment
# Si tienes acceso SSH temporal o terminal en panel

echo "🔧 Configurando Laravel en servidor Ferozo"
echo "==========================================="
echo ""

# 1. Ir al directorio del proyecto
cd /home/a0040320/public_html

# 2. Verificar que estamos en el directorio correcto
echo "📁 Directorio actual:"
pwd
echo ""

# 3. Verificar que .env existe
if [ ! -f ".env" ]; then
    echo "❌ ERROR: .env no encontrado"
    echo "Renombrar .env.production a .env"
    exit 1
fi
echo "✅ .env encontrado"
echo ""

# 4. Verificar permisos
echo "🔒 Configurando permisos..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod 644 database/database.sqlite 2>/dev/null
chmod 644 .env
echo "✅ Permisos configurados"
echo ""

# 5. Limpiar caché (por si acaso)
echo "🧹 Limpiando caché..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
echo "✅ Caché limpiada"
echo ""

# 6. Cachear para producción
echo "⚡ Cacheando configuración..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
echo "✅ Configuración cacheada"
echo ""

# 7. Crear symlink de storage (si no existe)
echo "🔗 Creando symlink de storage..."
if [ ! -L "storage" ] && [ ! -d "storage" ]; then
    ln -s storage/app/public storage
    echo "✅ Symlink creado"
else
    echo "✅ Symlink ya existe"
fi
echo ""

# 8. Verificar instalación
echo "🔍 Verificando instalación..."
echo ""
echo "Versión PHP:"
php -v | head -n 1
echo ""
echo "Versión Laravel:"
php artisan --version
echo ""

# 9. Resumen
echo "==========================================="
echo "✅ Configuración completada"
echo "==========================================="
echo ""
echo "🌐 Abrir en navegador:"
echo "   https://honda.com.py"
echo ""
echo "📋 Si hay errores, revisar logs:"
echo "   /home/a0040320/public_html/storage/logs/laravel.log"
echo ""
