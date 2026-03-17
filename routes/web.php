<?php

use App\Http\Controllers\Admin\LandingPageController as AdminLandingPageController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;
use App\Http\Controllers\Admin\ModeloController as AdminModeloController;
use App\Http\Controllers\Admin\NoticiaController as AdminNoticiaController;
use App\Http\Controllers\Admin\OfertaController as AdminOfertaController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;
use App\Http\Controllers\Admin\UbicacionController as AdminUbicacionController;
use App\Http\Controllers\Admin\UsadoController as AdminUsadoController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Api\UbicacionApiController;
use App\Http\Controllers\ModeloPageController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsadoContactController;
use App\Http\Controllers\UsadoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');

// Páginas estáticas
Route::get('/contacto', function () {
    return view('pages.contacto');
})->name('contacto');

Route::post('/contacto', function () {
    // TODO: Implementar envío de email
    return back()->with('success', 'Mensaje enviado correctamente. Te responderemos a la brevedad.');
})->name('contacto.submit');

Route::get('/vicar', function () {
    return view('pages.vicar');
})->name('vicar');

Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias');
Route::get('/noticias/{slug}', [NoticiaController::class, 'show'])->name('noticias.show');

Route::get('/red-ventas', function () {
    return view('pages.red-ventas');
})->name('red-ventas');

Route::get('/posventa', function () {
    return view('pages.posventa');
})->name('posventa');

// API pública para mapas
Route::prefix('api')->name('api.')->group(function () {
    Route::get('ubicaciones', [UbicacionApiController::class, 'all'])->name('ubicaciones.all');
    Route::get('ubicaciones/showrooms', [UbicacionApiController::class, 'showrooms'])->name('ubicaciones.showrooms');
    Route::get('ubicaciones/talleres', [UbicacionApiController::class, 'talleres'])->name('ubicaciones.talleres');
});

Route::get('/modelos', [ModeloPageController::class, 'index'])->name('modelos');

// Formularios globales (Test Drive / Cotizar)
Route::post('/solicitar-testdrive', [ModeloPageController::class, 'submitTestDrive'])->name('testdrive.submit');
Route::post('/solicitar-cotizacion', [ModeloPageController::class, 'submitCotizar'])->name('cotizar.submit');

// Landing Pages para campañas
Route::get('/landing/{landingPage}', [ModeloPageController::class, 'landing'])->name('landing.show');
Route::post('/landing/{landingPage}', [ModeloPageController::class, 'submitLanding'])->name('landing.submit');

// Usados
Route::get('/usados', [UsadoController::class, 'index'])->name('usados.index');
Route::get('/usados/{usado}', [UsadoController::class, 'show'])->name('usados.show');
Route::post('/usados/{usado}/contacto', [UsadoContactController::class, 'store'])->name('usados.contact');
Route::post('/usados/contacto', [UsadoContactController::class, 'store'])->name('usados.contact.general');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Modelos dinámicos (DEBE ir al final de las rutas públicas para evitar conflictos)
Route::get('/{modelo}', [ModeloPageController::class, 'show'])->name('modelo.show')
    ->where('modelo', '[a-z0-9][a-z0-9\-]*');

// =============================================
// RUTAS ADMIN (rutas explícitas para compatibilidad con Ferozo)
// =============================================
Route::middleware(['web', 'auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/usados');

    // Usados - rutas explícitas
    Route::get('usados', [AdminUsadoController::class, 'index'])->name('usados.index');
    Route::get('usados/create', [AdminUsadoController::class, 'create'])->name('usados.create');
    Route::post('usados', [AdminUsadoController::class, 'store'])->name('usados.store');
    Route::get('usados/{usado}', [AdminUsadoController::class, 'show'])->name('usados.show');
    Route::get('usados/{usado}/edit', [AdminUsadoController::class, 'edit'])->name('usados.edit');
    Route::put('usados/{usado}', [AdminUsadoController::class, 'update'])->name('usados.update');
    Route::patch('usados/{usado}', [AdminUsadoController::class, 'update']);
    Route::delete('usados/{usado}', [AdminUsadoController::class, 'destroy'])->name('usados.destroy');
    // Usados - imágenes
    Route::post('usados/{usado}/images', [AdminUsadoController::class, 'storeImages'])->name('usados.images.store');
    Route::delete('usados/{usado}/images/{image}', [AdminUsadoController::class, 'destroyImage'])->name('usados.images.destroy');
    Route::patch('usados/{usado}/images/{image}/portada', [AdminUsadoController::class, 'setPortada'])->name('usados.images.portada');
    Route::post('usados/{usado}/images/reorder', [AdminUsadoController::class, 'reorderImages'])->name('usados.images.reorder');

    // Noticias - rutas explícitas
    Route::get('noticias', [AdminNoticiaController::class, 'index'])->name('noticias.index');
    Route::get('noticias/create', [AdminNoticiaController::class, 'create'])->name('noticias.create');
    Route::post('noticias', [AdminNoticiaController::class, 'store'])->name('noticias.store');
    Route::get('noticias/{noticia}', [AdminNoticiaController::class, 'show'])->name('noticias.show');
    Route::get('noticias/{noticia}/edit', [AdminNoticiaController::class, 'edit'])->name('noticias.edit');
    Route::put('noticias/{noticia}', [AdminNoticiaController::class, 'update'])->name('noticias.update');
    Route::patch('noticias/{noticia}', [AdminNoticiaController::class, 'update']);
    Route::delete('noticias/{noticia}', [AdminNoticiaController::class, 'destroy'])->name('noticias.destroy');
    Route::post('noticias/upload-image', [AdminNoticiaController::class, 'uploadImage'])->name('noticias.upload-image');

    // Users - rutas explícitas
    Route::get('users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('users/create', [AdminUserController::class, 'create'])->name('users.create');
    Route::post('users', [AdminUserController::class, 'store'])->name('users.store');
    Route::get('users/{user}', [AdminUserController::class, 'show'])->name('users.show');
    Route::get('users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::patch('users/{user}', [AdminUserController::class, 'update']);
    Route::delete('users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

    // Modelos - rutas explícitas
    Route::get('modelos', [AdminModeloController::class, 'index'])->name('modelos.index');
    Route::get('modelos/create', [AdminModeloController::class, 'create'])->name('modelos.create');
    Route::post('modelos', [AdminModeloController::class, 'store'])->name('modelos.store');
    Route::get('modelos/{modelo}/edit', [AdminModeloController::class, 'edit'])->name('modelos.edit');
    Route::put('modelos/{modelo}', [AdminModeloController::class, 'update'])->name('modelos.update');
    Route::delete('modelos/{modelo}', [AdminModeloController::class, 'destroy'])->name('modelos.destroy');
    // Modelos - secciones
    Route::post('modelos/{modelo}/secciones', [AdminModeloController::class, 'storeSeccion'])->name('modelos.secciones.store');
    Route::put('modelos/{modelo}/secciones/{seccion}', [AdminModeloController::class, 'updateSeccion'])->name('modelos.secciones.update');
    Route::delete('modelos/{modelo}/secciones/{seccion}', [AdminModeloController::class, 'destroySeccion'])->name('modelos.secciones.destroy');
    // Modelos - slides
    Route::post('modelos/{modelo}/secciones/{seccion}/slides', [AdminModeloController::class, 'storeSlide'])->name('modelos.slides.store');
    Route::put('modelos/{modelo}/slides/{slide}', [AdminModeloController::class, 'updateSlide'])->name('modelos.slides.update');
    Route::delete('modelos/{modelo}/slides/{slide}', [AdminModeloController::class, 'destroySlide'])->name('modelos.slides.destroy');
    // Modelos - versiones
    Route::post('modelos/{modelo}/versiones', [AdminModeloController::class, 'storeVersion'])->name('modelos.versiones.store');
    Route::put('modelos/{modelo}/versiones/{version}', [AdminModeloController::class, 'updateVersion'])->name('modelos.versiones.update');
    Route::delete('modelos/{modelo}/versiones/{version}', [AdminModeloController::class, 'destroyVersion'])->name('modelos.versiones.destroy');
    // Modelos - version colores
    Route::post('modelos/{modelo}/versiones/{version}/colores', [AdminModeloController::class, 'storeVersionColor'])->name('modelos.versiones.colores.store');
    Route::delete('modelos/{modelo}/colores/{color}', [AdminModeloController::class, 'destroyVersionColor'])->name('modelos.versiones.colores.destroy');

    // Landing Pages
    Route::get('landing-pages', [AdminLandingPageController::class, 'index'])->name('landing-pages.index');
    Route::get('landing-pages/{landingPage}/edit', [AdminLandingPageController::class, 'edit'])->name('landing-pages.edit');
    Route::put('landing-pages/{landingPage}', [AdminLandingPageController::class, 'update'])->name('landing-pages.update');

    // Leads
    Route::get('leads', [AdminLeadController::class, 'index'])->name('leads.index');
    Route::get('leads/export', [AdminLeadController::class, 'export'])->name('leads.export');
    Route::get('leads/{lead}', [AdminLeadController::class, 'show'])->name('leads.show');
    Route::delete('leads/{lead}', [AdminLeadController::class, 'destroy'])->name('leads.destroy');

    // Ubicaciones (Showrooms y Talleres)
    Route::get('ubicaciones', [AdminUbicacionController::class, 'index'])->name('ubicaciones.index');
    Route::get('ubicaciones/create', [AdminUbicacionController::class, 'create'])->name('ubicaciones.create');
    Route::post('ubicaciones', [AdminUbicacionController::class, 'store'])->name('ubicaciones.store');
    Route::get('ubicaciones/{ubicacion}/edit', [AdminUbicacionController::class, 'edit'])->name('ubicaciones.edit');
    Route::put('ubicaciones/{ubicacion}', [AdminUbicacionController::class, 'update'])->name('ubicaciones.update');
    Route::patch('ubicaciones/{ubicacion}', [AdminUbicacionController::class, 'update']);
    Route::delete('ubicaciones/{ubicacion}', [AdminUbicacionController::class, 'destroy'])->name('ubicaciones.destroy');

    // Ofertas y Campañas
    Route::get('ofertas', [AdminOfertaController::class, 'index'])->name('ofertas.index');
    Route::get('ofertas/create', [AdminOfertaController::class, 'create'])->name('ofertas.create');
    Route::post('ofertas', [AdminOfertaController::class, 'store'])->name('ofertas.store');
    Route::get('ofertas/{oferta}/edit', [AdminOfertaController::class, 'edit'])->name('ofertas.edit');
    Route::put('ofertas/{oferta}', [AdminOfertaController::class, 'update'])->name('ofertas.update');
    Route::patch('ofertas/{oferta}', [AdminOfertaController::class, 'update']);
    Route::delete('ofertas/{oferta}', [AdminOfertaController::class, 'destroy'])->name('ofertas.destroy');

    // Settings
    Route::get('settings', [AdminSettingsController::class, 'index'])->name('settings.index');
    Route::post('settings/tracking', [AdminSettingsController::class, 'updateTracking'])->name('settings.tracking');
    Route::post('settings/seo', [AdminSettingsController::class, 'updateSeo'])->name('settings.seo');
    Route::post('settings/emails', [AdminSettingsController::class, 'updateEmails'])->name('settings.emails');
    Route::post('settings/forms', [AdminSettingsController::class, 'updateForms'])->name('settings.forms');
    Route::post('settings/whatsapp', [AdminSettingsController::class, 'updateWhatsapp'])->name('settings.whatsapp');
});
