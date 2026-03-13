# 🎯 Instrucciones Finales - Deployment a Ferozo

## ✅ Proyecto Preparado

El proyecto ha sido **reestructurado** para funcionar sin modificar `open_basedir`.

**Archivo listo:** `honda-ferozo-deployment.zip` (504 MB)

---

## 🚀 Deployment en 7 Pasos

### **1️⃣ Subir ZIP por FTP**

**Conectar a FTP:**
- Host: `ftp.honda.com.py`
- Usuario: (tu usuario Ferozo)
- Password: (tu password Ferozo)
- Puerto: 21

**Subir archivo:**
- Subir `honda-ferozo-deployment.zip` a `/public_html/`

---

### **2️⃣ Descomprimir en el Servidor**

**Opción A: Panel Ferozo**
1. Ir a Administrador de Archivos
2. Navegar a `/public_html/`
3. Seleccionar `honda-ferozo-deployment.zip`
4. Click en "Extraer" o "Descomprimir"
5. Extraer en `/public_html/` (raíz)

**Opción B: SSH (si está disponible)**
```bash
cd /home/a0040320/public_html
unzip honda-ferozo-deployment.zip
```

---

### **3️⃣ Renombrar .env**

**Vía FTP o Administrador de Archivos:**
1. Ir a `/public_html/`
2. Renombrar `.env.production` → `.env`

---

### **4️⃣ Editar .env**

**Abrir `.env` y configurar:**

```env
APP_NAME="Honda Paraguay"
APP_ENV=production
APP_KEY=base64:LCc24eGADw7mgGErpCtt9eTbQis4S6izzsVWp75YAyg=
APP_DEBUG=false
APP_URL=https://honda.com.py

DB_CONNECTION=sqlite

MAIL_MAILER=smtp
MAIL_HOST=mail.honda.com.py
MAIL_PORT=587
MAIL_USERNAME=noreply@honda.com.py
MAIL_PASSWORD=TU_PASSWORD_SMTP
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@honda.com.py"
MAIL_FROM_NAME="Honda Paraguay"
```

**⚠️ IMPORTANTE:**
- Generar nuevo `APP_KEY` (ver abajo)
- Configurar credenciales SMTP de Ferozo

**Generar APP_KEY (local):**
```bash
php artisan key:generate --show
```
Copiar el resultado al `.env` del servidor.

---

### **5️⃣ Configurar Document Root**

**Panel Ferozo → Dominios:**

1. Seleccionar `honda.com.py`
2. Buscar "Document Root" o "Carpeta Web"
3. Configurar: `/public_html/` ← **RAÍZ, NO /public**
4. Guardar cambios

**⚠️ CRÍTICO:**
- Document Root debe ser `/public_html/` (raíz)
- **NO** usar `/public_html/public`
- Esta es la diferencia clave con la estructura original

---

### **6️⃣ Configurar Permisos**

**Vía FTP o Administrador de Archivos:**

```
/public_html/storage/              → 755
/public_html/storage/framework/    → 755
/public_html/storage/logs/         → 755
/public_html/bootstrap/cache/      → 755
/public_html/database.sqlite       → 644
/public_html/.env                  → 644
```

---

### **7️⃣ Configurar Servidor (IMPORTANTE)**

**Usar script de configuración vía navegador:**

1. **Subir `setup-server.php` a `/public_html/`** (si no se subió con el ZIP)

2. **Acceder en navegador:**
   ```
   https://honda.com.py/setup-server.php?token=honda2025setup
   ```

3. **Click en "Ejecutar Configuración"**
   - Configura permisos automáticamente
   - Limpia caché
   - Cachea config/routes/views con rutas correctas

4. **ELIMINAR `setup-server.php`** después de ejecutar

**Alternativa (si tienes SSH):**
```bash
cd /home/a0040320/public_html
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

### **8️⃣ Verificar**

**Abrir en navegador:**

```
✅ https://honda.com.py
✅ https://honda.com.py/noticias
✅ https://honda.com.py/usados
✅ https://honda.com.py/admin
```

**Probar:**
- [ ] Inicio carga correctamente
- [ ] Noticias se ven con imágenes
- [ ] Usados se muestran
- [ ] Admin login funciona
- [ ] CRUD de admin funciona

---

## 📁 Estructura Final en Servidor

```
/public_html/
├── index.php              ← Punto de entrada (antes en /public)
├── .htaccess              ← Protección de archivos sensibles
├── .env                   ← Configuración (renombrado)
├── assets/                ← Assets del sitio original
├── build/                 ← Assets compilados de Vite
├── storage/               ← Symlink a storage/app/public
├── app/
├── bootstrap/
│   └── cache/             ← Permisos 755
├── config/
├── database/
│   └── database.sqlite    ← Permisos 644
├── resources/
├── routes/
├── storage/               ← Permisos 755
│   ├── app/
│   ├── framework/
│   └── logs/
└── vendor/
```

---

## 🔒 Seguridad

### ✅ Protecciones Implementadas

El `.htaccess` en raíz protege:
- ✅ `.env` - No accesible vía web
- ✅ `composer.json` - No accesible vía web
- ✅ `composer.lock` - No accesible vía web
- ✅ Listado de directorios - Deshabilitado

### ⚠️ Consideraciones

Esta estructura es **menos segura** que la original porque:
- Más archivos están en la raíz web
- Depende de `.htaccess` para protección
- No es la práctica recomendada de Laravel

**Recomendación:** Usar solo si Ferozo no permite configurar `open_basedir`.

---

## 🐛 Troubleshooting

### Error 500

**Verificar:**
1. `.env` existe y es válido
2. `APP_KEY` está configurado
3. Permisos de `storage/` son 755
4. Permisos de `bootstrap/cache/` son 755
5. Document Root es `/public_html/` (raíz)

**Revisar logs:**
```
/public_html/storage/logs/laravel.log
```

### Archivos .env accesibles

**Probar:**
```
https://honda.com.py/.env
```

Debe dar **403 Forbidden** o **404 Not Found**.

Si es accesible:
1. Verificar que `.htaccess` existe en raíz
2. Verificar que `mod_rewrite` está habilitado
3. Contactar soporte Ferozo

### CSS/JS no cargan

**Verificar:**
1. Directorio `/build/` existe
2. Archivos en `/build/assets/` existen
3. Limpiar caché del navegador

### Imágenes no cargan

**Verificar:**
1. Directorio `/assets/` existe
2. Symlink `/storage/` apunta a `storage/app/public/`
3. Permisos de `storage/app/public/` son 755

---

## 📧 Configurar Email (Opcional)

### Crear cuenta en Ferozo

1. Panel Ferozo → **Correo Electrónico**
2. Crear cuenta: `noreply@honda.com.py`
3. Copiar usuario y contraseña

### Actualizar .env

```env
MAIL_HOST=mail.honda.com.py
MAIL_PORT=587
MAIL_USERNAME=noreply@honda.com.py
MAIL_PASSWORD=password_copiado
MAIL_ENCRYPTION=tls
```

---

## ✅ Checklist Final

- [ ] ZIP subido a `/public_html/`
- [ ] Archivos descomprimidos en `/public_html/`
- [ ] `.env.production` renombrado a `.env`
- [ ] `.env` editado con `APP_KEY` y credenciales
- [ ] Document Root configurado a `/public_html/`
- [ ] Permisos configurados (755 para storage/, 644 para .env)
- [ ] Sitio abre en `https://honda.com.py`
- [ ] Noticias se ven con imágenes
- [ ] Admin funciona
- [ ] Email configurado (opcional)

---

## 📞 Soporte

**Ferozo:**
- Panel: https://panel.ferozo.com
- Email: soporte@ferozo.com
- Usuario: a0040320

**Documentación:**
- `SOLUCION_ALTERNATIVA_FEROZO.md` - Explicación detallada
- `DEPLOYMENT_FEROZO_RESTRUCTURED.md` - Guía técnica
- `TROUBLESHOOTING_FEROZO.md` - Solución de problemas

---

## 🎉 ¡Listo!

Siguiendo estos 7 pasos, el sitio debería estar funcionando en **honda.com.py**

**Cualquier problema, revisar logs en:**
```
/public_html/storage/logs/laravel.log
```

---

**Última actualización:** 9 de diciembre de 2025  
**Estructura:** Reestructurada para Ferozo (sin open_basedir)  
**Archivo deployment:** honda-ferozo-deployment.zip (504 MB)
