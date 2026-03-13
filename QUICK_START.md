# ⚡ Quick Start - Deployment Honda.com.py

## 🚀 Deployment en 5 Pasos

### 1️⃣ Preparar Localmente

```bash
cd /opt/homebrew/var/www/honda-laravel
./prepare-deployment.sh
```

✅ Esto crea: `honda-laravel-deployment.zip`

---

### 2️⃣ Subir por FTP

**Conectar a FTP:**
- Host: `ftp.honda.com.py`
- Usuario: (tu usuario Ferozo)
- Password: (tu password Ferozo)
- Puerto: 21

**Subir archivo:**
- Subir `honda-laravel-deployment.zip` a `/public_html/`
- Descomprimir en el servidor (vía panel Ferozo)

---

### 3️⃣ Configurar .env

**Vía FTP o Panel:**

1. Renombrar `.env.production` → `.env`
2. Editar `.env`:

```env
APP_KEY=base64:GENERAR_NUEVO_KEY
APP_DEBUG=false
APP_URL=https://honda.com.py

MAIL_USERNAME=noreply@honda.com.py
MAIL_PASSWORD=tu_password_smtp
```

**Generar APP_KEY (local):**
```bash
php artisan key:generate --show
```

---

### 4️⃣ Configurar Dominio en Panel Ferozo

**Opción A (Recomendada):**
- Panel Ferozo → Dominios
- Seleccionar `honda.com.py`
- **Document Root:** `/public_html/public`
- Guardar

**Opción B (Alternativa):**
- El `.htaccess` en raíz ya redirige a `/public`
- No hacer nada, debería funcionar automáticamente

---

### 5️⃣ Verificar

Abrir en navegador:

```
✅ https://honda.com.py
✅ https://honda.com.py/noticias
✅ https://honda.com.py/admin
```

---

## 🔧 Configuración Adicional

### Permisos (vía FTP)

```
storage/              → 755
bootstrap/cache/      → 755
database.sqlite       → 644
.env                  → 644
```

### Storage Symlink

**Con SSH:**
```bash
php artisan storage:link
```

**Sin SSH (manual):**
1. Crear `/public/storage/`
2. Copiar contenido de `/storage/app/public/` a `/public/storage/`

---

## 📧 Email (Opcional)

1. Panel Ferozo → Correo
2. Crear: `noreply@honda.com.py`
3. Copiar credenciales a `.env`

---

## 🐛 Si hay problemas

**Error open_basedir:**
```bash
# 1. Subir check-path.php a /public/
# 2. Acceder: https://honda.com.py/check-path.php
# 3. Copiar configuración recomendada
# 4. Configurar en panel Ferozo
# 5. ELIMINAR check-path.php

# Ver: TROUBLESHOOTING_FEROZO.md
```

**Error 500:**
```bash
# Revisar logs vía FTP:
/storage/logs/laravel.log
```

**Imágenes no cargan:**
```bash
# Verificar:
/public/storage/ existe
/public/honda/ tiene imágenes
```

---

## 📚 Documentación Completa

- **Guía detallada:** `DEPLOYMENT_GUIDE.md`
- **Checklist:** `DEPLOYMENT_CHECKLIST.md`
- **README:** `README_DEPLOYMENT.md`

---

## ✨ ¡Listo!

El sitio debería estar funcionando en **honda.com.py** 🎉
