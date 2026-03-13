# 🔧 Troubleshooting - Error open_basedir en Ferozo

## ❌ Error Actual

```
is_dir(): open_basedir restriction in effect. 
File(/opt/homebrew/var/www/honda-laravel/resources/views/vendor/laravel-exceptions) 
is not within the allowed path(s)
```

## 🎯 Causa

El servidor Ferozo tiene restricciones de `open_basedir` que impiden a Laravel acceder a directorios fuera de la ruta permitida.

---

## ✅ Soluciones

### Solución 1: Configurar open_basedir en Panel Ferozo (RECOMENDADO)

#### Paso 1: Acceder al Panel Ferozo

1. Ir a https://panel.ferozo.com
2. Login con tus credenciales
3. Ir a **Hosting** → **Configuración PHP**

#### Paso 2: Configurar open_basedir

Buscar la opción **open_basedir** y configurar:

```
/home/TU_USUARIO/public_html:/tmp:/usr/share/php
```

**Reemplazar `TU_USUARIO` con tu usuario real de Ferozo.**

#### Paso 3: Guardar y Reiniciar

1. Guardar cambios
2. Esperar 1-2 minutos para que se aplique
3. Refrescar el sitio

---

### Solución 2: Archivo .user.ini (ALTERNATIVA)

Si no puedes acceder a la configuración PHP en el panel:

#### Paso 1: Crear .user.ini en /public

Ya está creado en: `/public/.user.ini`

#### Paso 2: Editar .user.ini

Editar el archivo y descomentar/ajustar la línea:

```ini
; Cambiar esto:
; open_basedir = /home/usuario/public_html:/tmp:/usr/share/php

; Por esto (con tu ruta real):
open_basedir = /home/TU_USUARIO/public_html:/tmp:/usr/share/php
```

#### Paso 3: Subir al servidor

Subir `.user.ini` a `/public_html/public/` por FTP

#### Paso 4: Esperar

Los archivos `.user.ini` pueden tardar 5-10 minutos en aplicarse.

---

### Solución 3: Contactar Soporte Ferozo (SI NADA FUNCIONA)

#### Información para el ticket:

**Asunto:** Configurar open_basedir para Laravel

**Mensaje:**
```
Hola,

Necesito configurar open_basedir para mi sitio Laravel en honda.com.py

Por favor, configurar:
open_basedir = /home/MI_USUARIO/public_html:/tmp:/usr/share/php

O deshabilitar la restricción open_basedir para este dominio.

Gracias.
```

**Contacto Ferozo:**
- Email: soporte@ferozo.com
- Panel: https://panel.ferozo.com → Soporte
- Teléfono: (según tu plan)

---

## 🔍 Verificar Ruta Correcta

### Paso 1: Averiguar tu ruta real

Crear archivo `info.php` en `/public`:

```php
<?php
echo 'Ruta actual: ' . __DIR__;
echo '<br>';
echo 'Ruta base: ' . dirname(__DIR__);
echo '<br>';
echo 'open_basedir actual: ' . ini_get('open_basedir');
?>
```

### Paso 2: Acceder

Abrir: `https://honda.com.py/info.php`

### Paso 3: Copiar la ruta

Usar la ruta mostrada para configurar `open_basedir`

### Paso 4: Eliminar info.php

**IMPORTANTE:** Eliminar `info.php` después de obtener la información (seguridad)

---

## 📋 Configuración Típica de Ferozo

### Estructura de Directorios Ferozo

```
/home/TU_USUARIO/
├── public_html/              ← Document Root
│   ├── .htaccess
│   ├── .env
│   ├── artisan
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── public/               ← Aquí apunta el dominio
│   │   ├── .htaccess
│   │   ├── .user.ini         ← Configuración PHP
│   │   └── index.php
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   └── vendor/
└── tmp/
```

### open_basedir Correcto

```ini
open_basedir = /home/TU_USUARIO/public_html:/home/TU_USUARIO/tmp:/tmp:/usr/share/php
```

**Incluir:**
- `/home/TU_USUARIO/public_html` - Todo el proyecto Laravel
- `/home/TU_USUARIO/tmp` - Directorio temporal del usuario
- `/tmp` - Directorio temporal del sistema
- `/usr/share/php` - Librerías PHP del sistema

---

## 🛠️ Otras Configuraciones PHP Necesarias

### En Panel Ferozo o .user.ini

```ini
; Memoria y tiempo
memory_limit = 256M
max_execution_time = 300

; Uploads
upload_max_filesize = 20M
post_max_size = 25M

; Errores (producción)
display_errors = Off
log_errors = On
error_log = ../storage/logs/php-errors.log

; Sesiones
session.save_path = ../storage/framework/sessions
```

---

## 🔄 Alternativa: Cambiar Document Root

Si `open_basedir` no se puede configurar:

### Opción: Mover todo a /public

**NO RECOMENDADO** pero funciona:

1. Mover TODO el contenido de `/public` a `/public_html/`
2. Mover el resto del proyecto a `/public_html/laravel/`
3. Editar `index.php` para ajustar rutas:

```php
require __DIR__.'/laravel/vendor/autoload.php';
$app = require_once __DIR__.'/laravel/bootstrap/app.php';
```

**Desventaja:** Menos seguro, archivos sensibles accesibles.

---

## ✅ Verificación Post-Configuración

### Checklist

- [ ] `open_basedir` configurado en panel o `.user.ini`
- [ ] Ruta incluye `/home/TU_USUARIO/public_html`
- [ ] Ruta incluye `/tmp`
- [ ] Ruta incluye `/usr/share/php`
- [ ] Esperado 5-10 minutos para aplicar
- [ ] Limpiado caché del navegador
- [ ] Sitio carga sin errores

### Probar

```
https://honda.com.py
https://honda.com.py/noticias
https://honda.com.py/admin
```

---

## 🐛 Si Persiste el Error

### 1. Verificar permisos

```
storage/              → 755
bootstrap/cache/      → 755
vendor/               → 755
```

### 2. Limpiar caché Laravel

Si tienes acceso SSH temporal:

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### 3. Verificar .env

```env
APP_ENV=production
APP_DEBUG=false
```

### 4. Revisar logs

Descargar por FTP:
- `/storage/logs/laravel.log`
- `/storage/logs/php-errors.log`

---

## 📞 Contacto Soporte

**Ferozo:**
- Panel: https://panel.ferozo.com
- Email: soporte@ferozo.com
- Chat: Disponible en panel

**Información a proporcionar:**
- Dominio: honda.com.py
- Error: open_basedir restriction
- Solicitud: Configurar open_basedir para Laravel
- Ruta necesaria: `/home/TU_USUARIO/public_html:/tmp:/usr/share/php`

---

## 📝 Notas Importantes

1. **Nunca deshabilitar completamente open_basedir** - Es una medida de seguridad
2. **Incluir solo rutas necesarias** - No agregar rutas innecesarias
3. **Verificar permisos** - Asegurar que Laravel puede escribir en storage/
4. **Backup antes de cambios** - Siempre hacer backup de .env y database.sqlite

---

## ✨ Resumen

**El error se soluciona configurando `open_basedir` para incluir todo el directorio del proyecto Laravel.**

**Método más fácil:** Contactar soporte de Ferozo y solicitar la configuración.

**Método alternativo:** Usar `.user.ini` en `/public/` (puede tardar en aplicarse).

---

**Última actualización:** 9 de diciembre de 2025
