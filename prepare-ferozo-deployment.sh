#!/bin/bash

echo "🚀 Preparando Honda Laravel para Ferozo (Estructura Reestructurada)"
echo "===================================================================="
echo ""

# Colores
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# 1. Limpiar caché
echo -e "${YELLOW}1. Limpiando caché...${NC}"
php artisan cache:clear 2>/dev/null || echo "Cache clear skipped"
php artisan config:clear 2>/dev/null || echo "Config clear skipped"
php artisan route:clear 2>/dev/null || echo "Route clear skipped"
php artisan view:clear 2>/dev/null || echo "View clear skipped"
echo -e "${GREEN}✓ Caché limpiada${NC}"
echo ""

# 2. Eliminar archivos de caché manualmente
echo -e "${YELLOW}2. Eliminando archivos de caché con rutas absolutas...${NC}"
rm -rf bootstrap/cache/*.php 2>/dev/null || echo "No cache files in bootstrap/cache"
rm -rf storage/framework/cache/data/* 2>/dev/null || echo "No cache data"
rm -rf storage/framework/views/* 2>/dev/null || echo "No compiled views"
rm -rf storage/framework/sessions/* 2>/dev/null || echo "No sessions"
echo -e "${GREEN}✓ Archivos de caché eliminados${NC}"
echo ""

# 3. NO cachear para producción (se hará en el servidor)
echo -e "${YELLOW}3. Preparando para deployment sin caché...${NC}"
echo -e "${YELLOW}⚠ NO se cachea config/routes/views (se hará en servidor)${NC}"
echo -e "${GREEN}✓ Listo para deployment${NC}"
echo ""

# 4. Compilar assets
echo -e "${YELLOW}4. Compilando assets...${NC}"
if [ -f "package.json" ]; then
    npm run build 2>/dev/null || echo "Build skipped"
    echo -e "${GREEN}✓ Assets compilados${NC}"
else
    echo -e "${YELLOW}⚠ No se encontró package.json${NC}"
fi
echo ""

# 5. Verificar permisos
echo -e "${YELLOW}5. Configurando permisos...${NC}"
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod 644 database/database.sqlite 2>/dev/null || echo "database.sqlite no encontrado"
echo -e "${GREEN}✓ Permisos configurados${NC}"
echo ""

# 6. Verificar archivos críticos
echo -e "${YELLOW}6. Verificando archivos críticos...${NC}"
MISSING_FILES=0

if [ ! -f "index.php" ]; then
    echo -e "${RED}✗ index.php no encontrado en raíz${NC}"
    echo -e "${YELLOW}  Ejecutar: ./restructure-for-ferozo.sh${NC}"
    MISSING_FILES=1
else
    echo -e "${GREEN}✓ index.php en raíz${NC}"
fi

if [ ! -f ".htaccess" ]; then
    echo -e "${RED}✗ .htaccess no encontrado en raíz${NC}"
    MISSING_FILES=1
else
    echo -e "${GREEN}✓ .htaccess en raíz${NC}"
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

if [ ! -d "assets" ]; then
    echo -e "${YELLOW}⚠ Directorio assets no encontrado${NC}"
    echo -e "${YELLOW}  Copiar de sitio original si es necesario${NC}"
else
    echo -e "${GREEN}✓ Directorio assets${NC}"
fi

if [ $MISSING_FILES -eq 1 ]; then
    echo -e "${RED}⚠ Hay archivos críticos faltantes${NC}"
    echo ""
    exit 1
fi
echo ""

# 7. Crear archivo ZIP
echo -e "${YELLOW}7. Creando archivo ZIP para deployment...${NC}"

# Archivos a excluir
EXCLUDE_FILES=(
    "node_modules/*"
    ".git/*"
    ".env"
    "*.log"
    ".DS_Store"
    "prepare-deployment.sh"
    "prepare-ferozo-deployment.sh"
    "restructure-for-ferozo.sh"
    "comandos-servidor.sh"
    "*.md"
    "backup_*"
    "public/*"
    "check-path.php"
    "bootstrap/cache/*.php"
    "storage/framework/cache/*"
    "storage/framework/views/*"
    "storage/framework/sessions/*"
    "storage/logs/*"
)

# Construir comando zip con exclusiones
ZIP_CMD="zip -r honda-ferozo-deployment.zip ."
for exclude in "${EXCLUDE_FILES[@]}"; do
    ZIP_CMD="$ZIP_CMD -x \"$exclude\""
done

eval $ZIP_CMD > /dev/null 2>&1

if [ -f "honda-ferozo-deployment.zip" ]; then
    echo -e "${GREEN}✓ Archivo honda-ferozo-deployment.zip creado${NC}"
    SIZE=$(du -h honda-ferozo-deployment.zip | cut -f1)
    echo -e "${GREEN}📦 Tamaño del archivo: ${SIZE}${NC}"
else
    echo -e "${RED}✗ Error al crear ZIP${NC}"
    exit 1
fi
echo ""

# 8. Resumen
echo -e "${GREEN}==========================================="
echo "✅ Preparación completada"
echo "==========================================="
echo ""
echo "📦 Archivo listo: honda-ferozo-deployment.zip"
echo ""
echo "📋 Próximos pasos:"
echo "1. Subir honda-ferozo-deployment.zip al servidor por FTP"
echo "2. Descomprimir en /public_html/ (raíz, NO en /public)"
echo "3. Renombrar .env.production a .env"
echo "4. Editar .env con configuración de producción"
echo "5. Configurar Document Root a /public_html/ en panel Ferozo"
echo "6. Verificar permisos de storage/ y bootstrap/cache/"
echo "7. Abrir https://honda.com.py"
echo ""
echo "📖 Ver: SOLUCION_ALTERNATIVA_FEROZO.md"
echo ""
echo "⚠️  IMPORTANTE:"
echo "- Document Root debe ser /public_html/ (raíz)"
echo "- NO usar /public_html/public"
echo "- Esta estructura es menos segura que la original"
echo -e "${NC}"
