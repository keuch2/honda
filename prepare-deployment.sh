#!/bin/bash

echo "🚀 Preparando Honda Laravel para Deployment"
echo "==========================================="
echo ""

# Colores
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# 1. Limpiar caché
echo -e "${YELLOW}1. Limpiando caché...${NC}"
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
echo -e "${GREEN}✓ Caché limpiada${NC}"
echo ""

# 2. Optimizar para producción
echo -e "${YELLOW}2. Optimizando para producción...${NC}"
php artisan config:cache
php artisan route:cache
php artisan view:cache
echo -e "${GREEN}✓ Optimización completada${NC}"
echo ""

# 3. Compilar assets
echo -e "${YELLOW}3. Compilando assets...${NC}"
if [ -f "package.json" ]; then
    npm run build
    echo -e "${GREEN}✓ Assets compilados${NC}"
else
    echo -e "${YELLOW}⚠ No se encontró package.json, saltando compilación de assets${NC}"
fi
echo ""

# 4. Verificar permisos
echo -e "${YELLOW}4. Verificando permisos...${NC}"
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod 644 database/database.sqlite 2>/dev/null || echo -e "${YELLOW}⚠ database.sqlite no encontrado${NC}"
echo -e "${GREEN}✓ Permisos configurados${NC}"
echo ""

# 5. Crear .env de producción
echo -e "${YELLOW}5. Creando .env de producción...${NC}"
if [ -f ".env.production" ]; then
    echo -e "${YELLOW}⚠ IMPORTANTE: Renombrar .env.production a .env en el servidor${NC}"
    echo -e "${YELLOW}⚠ Y configurar APP_KEY, MAIL_* antes de subir${NC}"
else
    echo -e "${RED}✗ .env.production no encontrado${NC}"
fi
echo ""

# 6. Verificar archivos críticos
echo -e "${YELLOW}6. Verificando archivos críticos...${NC}"
MISSING_FILES=0

if [ ! -f ".htaccess" ]; then
    echo -e "${RED}✗ .htaccess no encontrado en raíz${NC}"
    MISSING_FILES=1
else
    echo -e "${GREEN}✓ .htaccess en raíz${NC}"
fi

if [ ! -f "public/.htaccess" ]; then
    echo -e "${RED}✗ public/.htaccess no encontrado${NC}"
    MISSING_FILES=1
else
    echo -e "${GREEN}✓ public/.htaccess${NC}"
fi

if [ ! -f ".env.production" ]; then
    echo -e "${RED}✗ .env.production no encontrado${NC}"
    MISSING_FILES=1
else
    echo -e "${GREEN}✓ .env.production${NC}"
fi

if [ ! -f "database/database.sqlite" ]; then
    echo -e "${RED}✗ database.sqlite no encontrado${NC}"
    MISSING_FILES=1
else
    echo -e "${GREEN}✓ database.sqlite${NC}"
fi

if [ $MISSING_FILES -eq 1 ]; then
    echo -e "${RED}⚠ Hay archivos críticos faltantes${NC}"
fi
echo ""

# 7. Crear archivo ZIP para subir
echo -e "${YELLOW}7. Creando archivo ZIP para deployment...${NC}"
zip -r honda-laravel-deployment.zip . \
    -x "node_modules/*" \
    -x ".git/*" \
    -x ".env" \
    -x "*.log" \
    -x ".DS_Store" \
    -x "prepare-deployment.sh" \
    -x "*.md" \
    -x ".htaccess.security"
echo -e "${GREEN}✓ Archivo honda-laravel-deployment.zip creado${NC}"
echo ""

# 8. Mostrar tamaño del archivo
if [ -f "honda-laravel-deployment.zip" ]; then
    SIZE=$(du -h honda-laravel-deployment.zip | cut -f1)
    echo -e "${GREEN}📦 Tamaño del archivo: ${SIZE}${NC}"
fi
echo ""

# 9. Resumen
echo -e "${GREEN}==========================================="
echo "✅ Preparación completada"
echo "==========================================="
echo ""
echo "📦 Archivo listo: honda-laravel-deployment.zip"
echo ""
echo "📋 Próximos pasos:"
echo "1. Subir honda-laravel-deployment.zip al servidor por FTP"
echo "2. Descomprimir en /public_html/"
echo "3. Renombrar .env.production a .env"
echo "4. Editar .env con configuración de producción"
echo "5. Configurar Document Root a /public_html/public en panel Ferozo"
echo "6. Verificar permisos de storage/ y bootstrap/cache/"
echo ""
echo "📖 Ver DEPLOYMENT_GUIDE.md para instrucciones completas"
echo -e "${NC}"
