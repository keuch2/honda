#!/bin/bash

# Honda Paraguay - Deploy to production
# Usage: bash deploy.sh

set -e

GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

SERVER_USER="root"
SERVER_HOST="168.181.184.99"
SERVER_PORT="5519"
PROJECT_DIR="/home/a0040320/public_html"

echo -e "${YELLOW}Honda Paraguay - Deploy a producción${NC}"
echo "======================================"
echo ""

# 1. Build assets
echo -e "${YELLOW}1. Compilando assets...${NC}"
npm run build 2>/dev/null
echo -e "${GREEN}✓ Assets compilados${NC}"
echo ""

# 2. Git commit & push
echo -e "${YELLOW}2. Subiendo cambios a GitHub...${NC}"
if [ -n "$(git status --porcelain)" ]; then
    echo -e "${RED}✗ Hay cambios sin commitear. Hacé commit antes de deployar.${NC}"
    git status --short
    exit 1
fi
git push origin main
echo -e "${GREEN}✓ Push a GitHub completado${NC}"
echo ""

# 3. Deploy en servidor via SSH
echo -e "${YELLOW}3. Desplegando en servidor...${NC}"
ssh -p${SERVER_PORT} ${SERVER_USER}@${SERVER_HOST} << 'REMOTE_COMMANDS'
    cd /home/a0040320/public_html

    echo ">> Pulling cambios de GitHub..."
    git pull origin main

    echo ">> Instalando dependencias..."
    composer install --no-dev --optimize-autoloader 2>/dev/null || echo "composer install skipped"

    echo ">> Ejecutando migraciones..."
    php artisan migrate --force

    echo ">> Limpiando caché..."
    php artisan cache:clear
    php artisan config:clear
    php artisan route:clear
    php artisan view:clear

    echo ">> Cacheando para producción..."
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache

    echo ">> Verificando permisos..."
    chmod -R 755 storage
    chmod -R 755 bootstrap/cache
    chmod 644 database/database.sqlite 2>/dev/null

    echo ">> Deploy completado!"
    php artisan --version
REMOTE_COMMANDS

echo ""
echo -e "${GREEN}======================================"
echo "✅ Deploy completado"
echo "======================================${NC}"
echo ""
echo "Verificar: https://honda.com.py"
