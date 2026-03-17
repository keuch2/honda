# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands

```bash
# Development
npm run dev          # Start Vite dev server (asset compilation with HMR)
php artisan serve    # Start Laravel dev server

# Run both concurrently
composer run dev     # Runs artisan serve + queue:listen + pail + npm run dev

# Assets
npm run build        # Production asset build (Vite)

# Tests
composer test        # Clears config cache, then runs PHPUnit
php artisan test     # Run all tests
php artisan test --filter TestName   # Run a single test

# Code style
./vendor/bin/pint    # Laravel Pint (PSR-12 code style fixer)

# Deployment (Ferozo shared hosting)
bash prepare-ferozo-deployment.sh    # Prepare build for upload
bash comandos-servidor.sh            # Run on server after upload
```

## Architecture

### Domain Overview

This is a Honda dealership website for Paraguay, built as a standard Laravel 12 MVC app. It has two main surfaces:

1. **Public site** — vehicle models, used cars, news, landing pages, contact/lead forms
2. **Admin panel** — `/admin/*` routes (auth-gated) managing all content

### Routing

- `routes/web.php` — all public and admin routes (no `api.php`; API endpoints live in web.php under `/api` prefix)
- `routes/admin.php` — loaded by `RouteServiceProvider` with `['web', 'auth']` middleware
- `routes/auth.php` — Breeze auth routes
- All admin routes are explicitly defined (not using `Route::resource`) for Ferozo shared hosting compatibility

### Key Models

| Model | Purpose |
|---|---|
| `Modelo` | Vehicle model (slug as route key, has sections/versions/leads) |
| `ModeloSeccion` / `ModeloSeccionSlide` | Rich content sections for model pages |
| `ModeloVersion` / `ModeloVersionColor` | Trims and color variants |
| `Usado` | Used vehicle inventory (legacy_id as route key) |
| `LandingPage` | Campaign pages (slug as route key, linked to a Modelo) |
| `Lead` | Form submissions from landing pages, with UTM tracking |
| `Ubicacion` | Showrooms and workshops; served via JSON API for map rendering |
| `SiteSetting` | Key-value config store with cached access (`SiteSetting::get('key')`) |

### View Data via ViewComposer

`AppServiceProvider` registers a view composer that injects into all public layout views:
- `$activeModelos` — for nav menus
- `$whatsappNumber`, `$whatsappMessage` — from `SiteSetting`
- `$tracking` — Google Ads / Meta Pixel IDs from `SiteSetting`
- `$formTestdriveFields`, `$formCotizarFields`, `$formLandingFields` — configurable form field JSON from `SiteSetting`

The composer catches exceptions so the site doesn't break before migrations are run.

### Frontend Stack

- **Tailwind CSS 3** with `@tailwindcss/forms` plugin
- **Alpine.js 3** for interactivity
- **TinyMCE 8** for rich text in admin
- **Vite 7** as the asset bundler (`resources/css/app.css`, `resources/js/app.js`)

### Database

- Default: SQLite (`database/database.sqlite`)
- Tests: in-memory SQLite (configured in `phpunit.xml`)
- Key custom config: `config/usados.php`
- `SiteSetting` model provides a cached key-value store for runtime configuration (WhatsApp numbers, tracking IDs, SEO defaults, form field definitions, email recipients)

### Deployment Target

The project deploys to **Ferozo shared hosting** (PHP shared host). This is why:
- Routes are explicitly listed rather than using resourceful routing helpers
- Deployment scripts restructure the public directory layout
- No Docker/Sail is used in production
