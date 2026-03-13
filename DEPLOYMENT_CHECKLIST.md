# ✅ Checklist de Deployment - Honda.com.py

## 📋 Pre-Deployment (Local)

- [ ] **Ejecutar script de preparación**
  ```bash
  ./prepare-deployment.sh
  ```

- [ ] **Verificar que se creó `honda-laravel-deployment.zip`**

- [ ] **Backup de base de datos local**
  ```bash
  cp database/database.sqlite database/database.sqlite.backup
  ```

- [ ] **Verificar que todas las migraciones están aplicadas**
  ```bash
  php artisan migrate:status
  ```

- [ ] **Probar sitio localmente una última vez**
  - [ ] Inicio funciona
  - [ ] Modelos cargan
  - [ ] Noticias se ven con imágenes
  - [ ] Usados se muestran
  - [ ] Admin login funciona
  - [ ] CRUD de admin funciona

---

## 📤 Upload (FTP)

- [ ] **Conectar a FTP de Ferozo**
  - Host: `ftp.honda.com.py` o IP del servidor
  - Usuario: _______________
  - Contraseña: _______________
  - Puerto: 21

- [ ] **Subir `honda-laravel-deployment.zip` a `/public_html/`**

- [ ] **Descomprimir en el servidor** (vía panel Ferozo)

- [ ] **Verificar que todos los archivos se subieron**
  - [ ] `/app/`
  - [ ] `/bootstrap/`
  - [ ] `/config/`
  - [ ] `/database/`
  - [ ] `/public/`
  - [ ] `/resources/`
  - [ ] `/routes/`
  - [ ] `/storage/`
  - [ ] `/vendor/`
  - [ ] `.htaccess` (raíz)
  - [ ] `.env.production`
  - [ ] `artisan`
  - [ ] `composer.json`

---

## ⚙️ Configuración (Servidor)

### Archivo .env

- [ ] **Renombrar `.env.production` a `.env`**

- [ ] **Editar `.env` con configuración de producción:**
  ```env
  APP_NAME="Honda Paraguay"
  APP_ENV=production
  APP_KEY=________________________  ← Generar nuevo
  APP_DEBUG=false
  APP_URL=https://honda.com.py
  
  MAIL_HOST=mail.honda.com.py
  MAIL_USERNAME=noreply@honda.com.py
  MAIL_PASSWORD=_______________  ← Configurar
  ```

- [ ] **Generar nuevo APP_KEY** (local, luego copiar):
  ```bash
  php artisan key:generate --show
  ```

### Permisos

- [ ] **Configurar permisos de directorios a 755:**
  - [ ] `/storage/`
  - [ ] `/storage/framework/`
  - [ ] `/storage/framework/cache/`
  - [ ] `/storage/framework/sessions/`
  - [ ] `/storage/framework/views/`
  - [ ] `/storage/logs/`
  - [ ] `/bootstrap/cache/`

- [ ] **Configurar permisos de archivos a 644:**
  - [ ] `.env`
  - [ ] `database/database.sqlite`

### Storage Symlink

- [ ] **Opción A: Si hay SSH temporal**
  ```bash
  php artisan storage:link
  ```

- [ ] **Opción B: Sin SSH (manual vía FTP)**
  - [ ] Crear carpeta `/public/storage/`
  - [ ] Copiar contenido de `/storage/app/public/` a `/public/storage/`

### Imágenes del Sitio Original

- [ ] **Verificar que `/public/honda/` tiene las imágenes**
  - [ ] `/public/honda/assets/images/noticias/`
  - [ ] Todas las imágenes del sitio PHP original

---

## 🌐 Configuración de Dominio (Panel Ferozo)

- [ ] **Opción A: Cambiar Document Root (RECOMENDADO)**
  - [ ] Ir a panel Ferozo → Dominios
  - [ ] Seleccionar `honda.com.py`
  - [ ] Cambiar "Document Root" a: `/public_html/public`
  - [ ] Guardar cambios

- [ ] **Opción B: Verificar .htaccess en raíz**
  - [ ] Verificar que existe `/public_html/.htaccess`
  - [ ] Contenido redirige a `/public`

---

## 🔒 Seguridad

- [ ] **Verificar APP_DEBUG=false en `.env`**

- [ ] **Verificar APP_ENV=production en `.env`**

- [ ] **Verificar que `.env` NO es accesible vía web**
  - Probar: `https://honda.com.py/.env` → debe dar 403 o 404

- [ ] **Verificar que archivos sensibles están protegidos**
  - [ ] `.env`
  - [ ] `composer.json`
  - [ ] `composer.lock`

---

## ✅ Verificación Post-Deployment

### Sitio Público

- [ ] **Abrir `https://honda.com.py`**
  - [ ] Carga sin `/public` en la URL
  - [ ] No hay errores 500

- [ ] **Probar navegación:**
  - [ ] Inicio → `https://honda.com.py`
  - [ ] Modelos → `https://honda.com.py/modelos`
  - [ ] Noticias → `https://honda.com.py/noticias`
  - [ ] Detalle noticia → Imágenes y videos se ven
  - [ ] Usados → `https://honda.com.py/usados`
  - [ ] Contacto → `https://honda.com.py/contacto`

- [ ] **Verificar imágenes:**
  - [ ] Logo Honda carga
  - [ ] Imágenes de noticias cargan
  - [ ] Imágenes de usados cargan
  - [ ] Imágenes de modelos cargan

- [ ] **Verificar formularios:**
  - [ ] Formulario de contacto envía
  - [ ] Formulario de cotización funciona

### Panel Admin

- [ ] **Abrir `https://honda.com.py/admin`**
  - [ ] Redirige a login
  - [ ] Página de login carga correctamente

- [ ] **Login con credenciales:**
  - Email: _______________
  - Password: _______________
  - [ ] Login exitoso

- [ ] **Probar CRUD de Usados:**
  - [ ] Listar usados
  - [ ] Crear nuevo usado
  - [ ] Subir imágenes
  - [ ] Editar usado
  - [ ] Eliminar usado

- [ ] **Probar CRUD de Noticias:**
  - [ ] Listar noticias
  - [ ] Crear noticia con TinyMCE
  - [ ] Subir imágenes en editor
  - [ ] Editar noticia
  - [ ] Ver noticia en frontend

- [ ] **Probar otras secciones:**
  - [ ] Modelos
  - [ ] Configuración
  - [ ] Usuarios (si aplica)

### Performance

- [ ] **Verificar tiempos de carga:**
  - [ ] Inicio < 3 segundos
  - [ ] Noticias < 3 segundos
  - [ ] Admin < 3 segundos

- [ ] **Verificar en diferentes dispositivos:**
  - [ ] Desktop
  - [ ] Tablet
  - [ ] Mobile

### SEO

- [ ] **Verificar meta tags:**
  - [ ] Título de página correcto
  - [ ] Meta description
  - [ ] Open Graph tags

- [ ] **Verificar sitemap (si aplica):**
  - [ ] `https://honda.com.py/sitemap.xml`

---

## 🐛 Troubleshooting

### Si hay error 500:

1. [ ] Revisar `/storage/logs/laravel.log` vía FTP
2. [ ] Verificar permisos de `/storage/` y `/bootstrap/cache/`
3. [ ] Verificar que `.env` existe y es válido
4. [ ] Verificar que `APP_KEY` está configurado

### Si las imágenes no cargan:

1. [ ] Verificar que `/public/storage/` existe
2. [ ] Verificar symlink o copiar archivos manualmente
3. [ ] Verificar permisos de `/storage/app/public/`

### Si el CSS/JS no carga:

1. [ ] Verificar que `/public/build/` se subió
2. [ ] Limpiar caché del navegador
3. [ ] Verificar que `npm run build` se ejecutó localmente

### Si el email no funciona:

1. [ ] Verificar credenciales SMTP en `.env`
2. [ ] Probar envío de email de prueba
3. [ ] Revisar logs de Ferozo

---

## 📧 Configuración de Email (Pendiente)

- [ ] **Crear cuenta de email en panel Ferozo:**
  - [ ] Ir a Correo Electrónico
  - [ ] Crear: `noreply@honda.com.py`
  - [ ] Copiar usuario y contraseña

- [ ] **Actualizar `.env` con credenciales:**
  ```env
  MAIL_HOST=mail.honda.com.py
  MAIL_PORT=587
  MAIL_USERNAME=noreply@honda.com.py
  MAIL_PASSWORD=_______________
  MAIL_ENCRYPTION=tls
  ```

- [ ] **Probar envío de email**

---

## 🔄 Backup Post-Deployment

- [ ] **Descargar backup de producción:**
  - [ ] `database/database.sqlite`
  - [ ] `/storage/app/public/` (imágenes subidas)
  - [ ] `.env` (para referencia)

- [ ] **Guardar backup local con fecha:**
  ```
  backups/
  ├── 2025-12-09-database.sqlite
  ├── 2025-12-09-storage.zip
  └── 2025-12-09-env.txt
  ```

---

## 📞 Contactos de Soporte

**Ferozo:**
- Panel: https://panel.ferozo.com
- Soporte: soporte@ferozo.com
- Teléfono: _______________

**Laravel:**
- Docs: https://laravel.com/docs/11.x/deployment
- Comunidad: https://laracasts.com/discuss

---

## ✨ Deployment Completado

**Fecha:** _______________  
**Hora:** _______________  
**Realizado por:** _______________

**Notas adicionales:**
_____________________________________
_____________________________________
_____________________________________

---

**🎉 ¡Sitio en producción en honda.com.py!**
