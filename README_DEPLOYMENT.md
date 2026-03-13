# 🚀 Honda Paraguay - Deployment a Producción

## 📌 Resumen Ejecutivo

Este documento explica cómo mover el sitio Laravel de Honda Paraguay a producción en **honda.com.py** usando **solo FTP** (sin acceso SSH).

---

## 🎯 Objetivo

- **Dominio:** honda.com.py
- **Hosting:** Ferozo (sin SSH, solo FTP/Panel)
- **Requisito:** Sitio accesible en `honda.com.py` (NO en `honda.com.py/public`)

---

## 📦 Archivos Preparados

### 1. `.htaccess` (raíz del proyecto)
Redirige automáticamente todas las peticiones a `/public`:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_URI} !^/public/
    RewriteRule ^(.*)$ /public/$1 [L,QSA]
</IfModule>
```

### 2. `.env.production`
Configuración de producción lista para renombrar a `.env`:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://honda.com.py
DB_CONNECTION=sqlite
MAIL_HOST=mail.honda.com.py
```

### 3. `prepare-deployment.sh`
Script que prepara el proyecto para deployment:

```bash
./prepare-deployment.sh
```

Esto genera `honda-laravel-deployment.zip` listo para subir.

---

## 🚀 Proceso de Deployment (Paso a Paso)

### Opción A: Método Rápido (Recomendado)

```bash
# 1. Ejecutar script de preparación
./prepare-deployment.sh

# 2. Subir honda-laravel-deployment.zip por FTP a /public_html/

# 3. Descomprimir en el servidor (panel Ferozo)

# 4. Renombrar .env.production a .env

# 5. Configurar Document Root en panel Ferozo:
#    Dominio: honda.com.py
#    Document Root: /public_html/public

# 6. Verificar permisos (vía FTP):
#    storage/ → 755
#    bootstrap/cache/ → 755
#    database.sqlite → 644

# 7. Abrir https://honda.com.py
```

### Opción B: Método Manual (Detallado)

Ver **DEPLOYMENT_GUIDE.md** para instrucciones paso a paso completas.

---

## 📋 Documentación Incluida

| Archivo | Descripción |
|---------|-------------|
| **DEPLOYMENT_GUIDE.md** | Guía completa de deployment con troubleshooting |
| **DEPLOYMENT_CHECKLIST.md** | Checklist interactivo para seguir durante deployment |
| **README_DEPLOYMENT.md** | Este archivo - resumen ejecutivo |
| **prepare-deployment.sh** | Script automatizado de preparación |
| **.env.production** | Configuración de producción |
| **.htaccess** | Redirección a /public |

---

## ⚙️ Configuración Requerida en Ferozo

### Opción 1: Cambiar Document Root (RECOMENDADO)

En el panel de Ferozo:

1. Ir a **Dominios** o **Hosting**
2. Seleccionar `honda.com.py`
3. Cambiar **Document Root** a: `/public_html/public`
4. Guardar cambios

✅ **Ventaja:** Más seguro, Laravel funciona como debe ser

### Opción 2: Usar .htaccess en Raíz (ALTERNATIVA)

Si no puedes cambiar el Document Root:

1. El archivo `.htaccess` en la raíz ya está incluido
2. Redirige automáticamente a `/public`
3. Verificar que `mod_rewrite` está habilitado en Apache

⚠️ **Nota:** Menos seguro, pero funciona si no hay otra opción

---

## 🔧 Configuración Post-Upload

### 1. Archivo .env

```bash
# En el servidor (vía FTP):
# 1. Renombrar .env.production a .env
# 2. Editar .env y configurar:

APP_KEY=base64:GENERAR_NUEVO_KEY_AQUI
MAIL_USERNAME=noreply@honda.com.py
MAIL_PASSWORD=tu_password_smtp
```

**Generar APP_KEY:**
```bash
# Local:
php artisan key:generate --show
# Copiar el resultado al .env del servidor
```

### 2. Permisos (vía FTP o Panel)

```
storage/                    → 755
storage/framework/          → 755
storage/logs/               → 755
bootstrap/cache/            → 755
database/database.sqlite    → 644
.env                        → 644
```

### 3. Storage Symlink

**Con SSH temporal:**
```bash
php artisan storage:link
```

**Sin SSH (manual):**
1. Crear carpeta `/public/storage/`
2. Copiar contenido de `/storage/app/public/` a `/public/storage/`

---

## ✅ Verificación

### Checklist Rápido

- [ ] Sitio abre en `https://honda.com.py` (sin `/public`)
- [ ] Inicio carga correctamente
- [ ] Noticias se ven con imágenes
- [ ] Admin funciona en `https://honda.com.py/admin`
- [ ] Login admin funciona
- [ ] CRUD de usados/noticias funciona
- [ ] Imágenes se suben correctamente
- [ ] No hay errores 500

### URLs a Probar

```
https://honda.com.py              → Inicio
https://honda.com.py/modelos      → Modelos
https://honda.com.py/noticias     → Noticias
https://honda.com.py/usados       → Usados
https://honda.com.py/contacto     → Contacto
https://honda.com.py/admin        → Admin Panel
```

---

## 🐛 Troubleshooting Rápido

### Error 500

```bash
# 1. Revisar logs (vía FTP):
/storage/logs/laravel.log

# 2. Verificar:
- .env existe y es válido
- APP_KEY está configurado
- Permisos de storage/ y bootstrap/cache/ son 755
```

### Imágenes no cargan

```bash
# Verificar:
1. /public/storage/ existe
2. Symlink creado o archivos copiados
3. /public/honda/ tiene imágenes del sitio original
```

### CSS/JS no cargan

```bash
# Verificar:
1. npm run build se ejecutó localmente
2. /public/build/ se subió al servidor
3. Limpiar caché del navegador
```

---

## 📧 Configuración de Email

### Crear cuenta en Ferozo

1. Panel Ferozo → **Correo Electrónico**
2. Crear cuenta: `noreply@honda.com.py`
3. Copiar credenciales

### Actualizar .env

```env
MAIL_MAILER=smtp
MAIL_HOST=mail.honda.com.py
MAIL_PORT=587
MAIL_USERNAME=noreply@honda.com.py
MAIL_PASSWORD=password_aqui
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@honda.com.py"
MAIL_FROM_NAME="Honda Paraguay"
```

---

## 🔄 Actualizaciones Futuras

### Subir Cambios

```bash
# 1. Hacer cambios localmente
# 2. Probar localmente
# 3. Subir archivos modificados por FTP
# 4. Si cambió config, limpiar caché (si hay SSH):
php artisan cache:clear
php artisan config:clear
```

### Backup Antes de Actualizar

```bash
# Descargar por FTP:
1. database/database.sqlite
2. /storage/app/public/ (imágenes)
3. .env (para referencia)
```

---

## 📞 Soporte

**Ferozo:**
- Panel: https://panel.ferozo.com
- Email: soporte@ferozo.com

**Laravel:**
- Docs: https://laravel.com/docs/11.x/deployment

---

## 📊 Estructura de Archivos en Servidor

```
/public_html/
├── .htaccess                 ← Redirige a /public
├── .env                      ← Configuración (renombrado de .env.production)
├── artisan
├── composer.json
├── app/
├── bootstrap/
│   └── cache/                ← Permisos 755
├── config/
├── database/
│   └── database.sqlite       ← Permisos 644
├── public/                   ← Document Root apunta aquí
│   ├── .htaccess
│   ├── index.php
│   ├── build/                ← Assets compilados
│   ├── honda/                ← Imágenes sitio original
│   └── storage/              ← Symlink a ../storage/app/public
├── resources/
├── routes/
├── storage/                  ← Permisos 755
│   ├── app/
│   │   └── public/
│   ├── framework/
│   │   ├── cache/
│   │   ├── sessions/
│   │   └── views/
│   └── logs/
└── vendor/
```

---

## ✨ Resumen de Comandos

```bash
# Preparar deployment
./prepare-deployment.sh

# Generar APP_KEY (local)
php artisan key:generate --show

# Limpiar caché (si hay SSH en servidor)
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Crear symlink (si hay SSH en servidor)
php artisan storage:link
```

---

## 🎉 ¡Listo!

Siguiendo estos pasos, el sitio estará funcionando en **honda.com.py** sin necesidad de incluir `/public` en la URL.

**Documentación completa:** Ver `DEPLOYMENT_GUIDE.md`  
**Checklist interactivo:** Ver `DEPLOYMENT_CHECKLIST.md`

---

**Última actualización:** 9 de diciembre de 2025
