# 📦 Deployment Reestructurado para Ferozo

## ⚠️ IMPORTANTE

Este proyecto ha sido reestructurado para funcionar sin cambiar `open_basedir`.

## 📁 Nueva Estructura

```
/public_html/
├── index.php              ← Punto de entrada (antes en /public)
├── .htaccess              ← Configuración Apache
├── .env                   ← Configuración
├── assets/                ← Assets públicos
├── build/                 ← Assets compilados
├── honda/                 ← Imágenes del sitio
├── storage/               ← Symlink a storage/app/public
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
└── vendor/
```

## 🚀 Subir a Ferozo

### 1. Preparar localmente
```bash
./restructure-for-ferozo.sh
```

### 2. Subir por FTP
Subir TODO el contenido a `/public_html/`

### 3. Configurar Document Root
En panel Ferozo:
- Document Root: `/public_html/` (raíz, NO /public)

### 4. Verificar
- https://honda.com.py

## ⚠️ Seguridad

**IMPORTANTE:** Esta estructura expone más archivos en la raíz web.
El `.htaccess` protege archivos sensibles, pero es menos seguro que la estructura original.

**Archivos protegidos:**
- `.env`
- `composer.json`
- `composer.lock`

## 🔄 Volver a Estructura Original

Si Ferozo permite configurar `open_basedir` en el futuro:
1. Restaurar desde backup
2. Configurar Document Root a `/public_html/public`
3. Configurar `open_basedir`
