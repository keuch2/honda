# 🚀 Guía de Deployment - Honda Paraguay Laravel

## 📋 Requisitos Previos

- Acceso FTP al hosting Ferozo
- Panel de control Ferozo
- Dominio: honda.com.py
- PHP 8.1 o superior
- SQLite habilitado
- Extensiones PHP: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath

---

## 📦 Paso 1: Preparar Archivos Localmente

### 1.1 Optimizar para Producción

```bash
cd /opt/homebrew/var/www/honda-laravel

# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimizar para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Compilar assets (si usas Vite/Mix)
npm run build
```

### 1.2 Crear archivo .env de producción

Renombrar `.env.production` a `.env` antes de subir:

```bash
cp .env.production .env
```

**IMPORTANTE:** Editar `.env` y configurar:
- `APP_KEY` (generar uno nuevo con `php artisan key:generate`)
- `MAIL_HOST`, `MAIL_USERNAME`, `MAIL_PASSWORD` (datos de Ferozo)
- `APP_DEBUG=false`

---

## 📤 Paso 2: Subir Archivos por FTP

### 2.1 Estructura de Directorios en Ferozo

```
/home/usuario/public_html/
├── .htaccess                 ← Redirige a /public
├── artisan
├── composer.json
├── .env                      ← Configuración de producción
├── app/
├── bootstrap/
├── config/
├── database/
│   └── database.sqlite       ← Base de datos SQLite
├── public/                   ← Contenido web público
│   ├── .htaccess
│   ├── index.php
│   ├── assets/
│   ├── honda/                ← Imágenes del sitio original
│   └── storage/              ← Symlink a ../storage/app/public
├── resources/
├── routes/
├── storage/
│   ├── app/
│   ├── framework/
│   │   ├── cache/
│   │   ├── sessions/
│   │   └── views/
│   └── logs/
└── vendor/
```

### 2.2 Subir Archivos

**Opción A: FTP Cliente (FileZilla, Cyberduck)**

1. Conectar a FTP:
   - Host: `ftp.honda.com.py` o IP del servidor
   - Usuario: (proporcionado por Ferozo)
   - Contraseña: (proporcionado por Ferozo)
   - Puerto: 21

2. Subir TODOS los archivos excepto:
   - `/node_modules/` (no necesario)
   - `.git/` (no necesario)
   - `.env.example` (no necesario)

**Opción B: Panel Ferozo - Administrador de Archivos**

1. Comprimir proyecto localmente:
   ```bash
   zip -r honda-laravel.zip . -x "node_modules/*" ".git/*"
   ```

2. Subir `honda-laravel.zip` al panel Ferozo

3. Descomprimir en el servidor usando el panel

---

## 🔧 Paso 3: Configurar Permisos

### 3.1 Permisos de Directorios (vía FTP o Panel)

Configurar permisos `755` para directorios:
- `/storage/`
- `/storage/framework/`
- `/storage/framework/cache/`
- `/storage/framework/sessions/`
- `/storage/framework/views/`
- `/storage/logs/`
- `/bootstrap/cache/`

Configurar permisos `644` para archivos:
- `.env`
- `database/database.sqlite`

### 3.2 Crear Symlink de Storage

**Si Ferozo permite SSH temporal:**
```bash
php artisan storage:link
```

**Si NO hay SSH, crear manualmente vía FTP:**
1. Ir a `/public/`
2. Crear carpeta `storage`
3. Copiar contenido de `/storage/app/public/` a `/public/storage/`

---

## 🗄️ Paso 4: Base de Datos

### 4.1 Verificar SQLite

El archivo `database/database.sqlite` debe existir y tener permisos `644`.

**Si no existe, crear vía panel:**
1. Ir a `/database/`
2. Crear archivo vacío `database.sqlite`
3. Cambiar permisos a `644`

### 4.2 Ejecutar Migraciones

**Si Ferozo permite SSH temporal:**
```bash
php artisan migrate --force
php artisan db:seed --force
```

**Si NO hay SSH:**
- La base de datos SQLite ya tiene los datos migrados localmente
- Solo asegurarse que `database.sqlite` se subió correctamente

---

## 🌐 Paso 5: Configurar Dominio

### 5.1 Apuntar Dominio a /public

**Opción A: Cambiar Document Root (Recomendado)**

En el panel Ferozo:
1. Ir a "Dominios" o "Hosting"
2. Seleccionar `honda.com.py`
3. Cambiar "Document Root" o "Carpeta Web" a: `/public_html/public`
4. Guardar cambios

**Opción B: Usar .htaccess en Raíz (Ya incluido)**

El archivo `.htaccess` en la raíz redirige automáticamente a `/public`:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_URI} !^/public/
    RewriteRule ^(.*)$ /public/$1 [L,QSA]
</IfModule>
```

### 5.2 Verificar .htaccess en /public

Asegurarse que `/public/.htaccess` existe con:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

---

## 🔒 Paso 6: Seguridad

### 6.1 Proteger Archivos Sensibles

Crear `/public_html/.htaccess` adicional (si no existe):

```apache
# Denegar acceso a archivos sensibles
<FilesMatch "^\.env">
    Order allow,deny
    Deny from all
</FilesMatch>

<FilesMatch "^composer\.(json|lock)">
    Order allow,deny
    Deny from all
</FilesMatch>
```

### 6.2 Verificar APP_DEBUG

En `.env`:
```
APP_DEBUG=false
APP_ENV=production
```

---

## ✅ Paso 7: Verificación Final

### 7.1 Checklist

- [ ] Archivos subidos correctamente
- [ ] `.env` configurado para producción
- [ ] Permisos de `/storage/` y `/bootstrap/cache/` en 755
- [ ] `database.sqlite` existe y tiene permisos 644
- [ ] Dominio apunta a `/public` o `.htaccess` funciona
- [ ] `APP_DEBUG=false` en `.env`
- [ ] Symlink de storage creado
- [ ] Caché optimizada

### 7.2 Probar Sitio

1. Abrir `https://honda.com.py`
2. Verificar que carga sin `/public` en la URL
3. Probar navegación:
   - Inicio
   - Modelos
   - Noticias
   - Usados
   - Contacto
4. Probar admin:
   - `https://honda.com.py/admin`
   - Login con credenciales
   - CRUD de Usados, Noticias, etc.

### 7.3 Verificar Logs

Si hay errores, revisar:
- `/storage/logs/laravel.log` (vía FTP)
- Panel Ferozo → Logs de PHP

---

## 🐛 Troubleshooting

### Error: "500 Internal Server Error"

**Solución:**
1. Verificar permisos de `/storage/` y `/bootstrap/cache/`
2. Revisar `/storage/logs/laravel.log`
3. Verificar que `.env` existe y es válido
4. Verificar que `APP_KEY` está configurado

### Error: "No application encryption key"

**Solución:**
```bash
# Generar nueva key localmente
php artisan key:generate

# Copiar el APP_KEY del .env local al .env de producción
```

### Error: "Database file not found"

**Solución:**
1. Verificar que `database/database.sqlite` existe
2. Verificar permisos del archivo (644)
3. Verificar que la ruta en `.env` es correcta:
   ```
   DB_CONNECTION=sqlite
   ```

### Error: Imágenes no se ven

**Solución:**
1. Verificar que `/public/storage/` existe
2. Verificar que `/public/honda/` tiene las imágenes del sitio original
3. Crear symlink: `php artisan storage:link`

### Error: CSS/JS no cargan

**Solución:**
1. Verificar que `npm run build` se ejecutó localmente
2. Verificar que `/public/build/` se subió al servidor
3. Limpiar caché del navegador

---

## 📧 Configuración de Email (Ferozo)

### Datos SMTP de Ferozo

En `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=mail.honda.com.py
MAIL_PORT=587
MAIL_USERNAME=noreply@honda.com.py
MAIL_PASSWORD=tu_password_aqui
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@honda.com.py"
MAIL_FROM_NAME="Honda Paraguay"
```

**Obtener credenciales:**
1. Panel Ferozo → Correo Electrónico
2. Crear cuenta: `noreply@honda.com.py`
3. Copiar usuario y contraseña al `.env`

---

## 🔄 Actualizaciones Futuras

### Subir Cambios

1. Hacer cambios localmente
2. Probar localmente
3. Subir archivos modificados por FTP
4. Limpiar caché (si hay acceso SSH):
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan route:clear
   php artisan view:clear
   ```

### Backup

**Antes de cada actualización:**
1. Descargar `database/database.sqlite` por FTP
2. Descargar `/storage/app/public/` (imágenes subidas)
3. Guardar copia local

---

## 📞 Soporte

**Panel Ferozo:**
- URL: https://panel.ferozo.com
- Soporte: soporte@ferozo.com

**Documentación Laravel:**
- https://laravel.com/docs/11.x/deployment

---

## ✨ Resumen Rápido

```bash
# 1. Preparar localmente
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build

# 2. Subir por FTP
# - Todos los archivos excepto node_modules y .git
# - Renombrar .env.production a .env

# 3. Configurar permisos (vía FTP)
# - storage/ → 755
# - bootstrap/cache/ → 755
# - database.sqlite → 644

# 4. Configurar dominio en panel Ferozo
# - Document Root: /public_html/public
# - O usar .htaccess en raíz

# 5. Verificar
# - Abrir https://honda.com.py
# - Probar navegación y admin
```

---

**¡Listo! El sitio debería estar funcionando en honda.com.py** 🎉
