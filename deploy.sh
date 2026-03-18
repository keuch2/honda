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
PROJECT_DIR="/home/honda/public_html"
PHP="/opt/php8-3/bin/php-cli"

echo -e "${YELLOW}Honda Paraguay - Deploy a produccion${NC}"
echo "======================================"
echo ""

# 1. Build assets
echo -e "${YELLOW}1. Compilando assets...${NC}"
npm run build 2>/dev/null
echo -e "${GREEN}OK Assets compilados${NC}"
echo ""

# 2. Git commit & push
echo -e "${YELLOW}2. Subiendo cambios a GitHub...${NC}"
if [ -n "$(git status --porcelain)" ]; then
    echo -e "${RED}ERROR: Hay cambios sin commitear. Hace commit antes de deployar.${NC}"
    git status --short
    exit 1
fi
git push origin main
echo -e "${GREEN}OK Push a GitHub completado${NC}"
echo ""

# 3. Deploy en servidor via SSH
echo -e "${YELLOW}3. Desplegando en servidor...${NC}"
ssh -p${SERVER_PORT} ${SERVER_USER}@${SERVER_HOST} bash -s << REMOTE_COMMANDS
    cd ${PROJECT_DIR}

    echo ">> Pulling cambios de GitHub..."
    git pull origin main

    echo ">> Instalando dependencias..."
    ${PHP} /usr/local/bin/composer install --no-dev --optimize-autoloader || echo "composer install skipped"

    echo ">> Ejecutando migraciones..."
    ${PHP} artisan migrate --force

    echo ">> Limpiando cache..."
    ${PHP} artisan cache:clear
    ${PHP} artisan config:clear
    ${PHP} artisan route:clear
    ${PHP} artisan view:clear

    echo ">> Cacheando para produccion..."
    ${PHP} artisan config:cache
    ${PHP} artisan route:cache
    ${PHP} artisan view:cache

    echo ">> Verificando permisos..."
    chmod -R 755 storage
    chmod -R 755 bootstrap/cache
    chmod 644 database/database.sqlite 2>/dev/null

    echo ">> Deploy completado!"
    ${PHP} artisan --version
REMOTE_COMMANDS

echo ""
echo -e "${GREEN}======================================"
echo "OK Deploy completado"
echo "======================================${NC}"
echo ""
echo "Verificar: https://honda.com.py"
