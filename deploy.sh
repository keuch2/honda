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

# Load server password from .deploy.env
if [ -f "$(dirname "$0")/.deploy.env" ]; then
    source "$(dirname "$0")/.deploy.env"
fi

if [ -z "$SERVER_PASS" ]; then
    echo -e "${RED}ERROR: SERVER_PASS no está definido. Crear .deploy.env con SERVER_PASS=tu_password${NC}"
    exit 1
fi

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
sshpass -p "$SERVER_PASS" ssh -o StrictHostKeyChecking=no -p${SERVER_PORT} ${SERVER_USER}@${SERVER_HOST} bash -s << REMOTE_COMMANDS
    cd ${PROJECT_DIR}

    echo ">> Pulling cambios de GitHub..."
    git pull origin main

    echo ">> Sincronizando assets de Vite (build -> public/build)..."
    # El document root es la raiz del repo, asi que Vite compila a ./build
    # (buildDirectory '../build') y se sirve en /build. Pero Laravel lee el
    # manifest desde public/build/manifest.json. Sincronizamos para que el
    # manifest que lee Laravel coincida siempre con los assets servidos.
    rm -rf public/build
    cp -r build public/build

    echo ">> Instalando dependencias..."
    ${PHP} /usr/local/bin/composer install --no-dev --optimize-autoloader

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

    echo ">> Deploy completado!"
    ${PHP} artisan --version
REMOTE_COMMANDS

echo ""
echo -e "${GREEN}======================================"
echo "OK Deploy completado"
echo "======================================${NC}"
echo ""
echo "Verificar: https://honda.com.py"
