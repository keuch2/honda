<?php

namespace App\Providers;

use App\Models\Modelo;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['layouts.public', 'partials.header', 'partials.footer', 'home.index', 'pages.modelos-dynamic'], function ($view) {
            if (!Schema::hasTable('modelos') || !Schema::hasTable('site_settings')) {
                return;
            }

            $activeModelos = Modelo::where('is_active', true)
                ->where('show_in_menu', true)
                ->orderBy('orden')
                ->get(['id', 'nombre', 'slug', 'card_image', 'categoria']);

            $whatsappNumber = SiteSetting::get('whatsapp_number', '595217285717');
            $whatsappMessage = SiteSetting::get('whatsapp_message', '');

            $tracking = SiteSetting::getGroup('tracking');

            $defaultFields = '[{"name":"nombre","label":"Nombre Completo","type":"text","required":true},{"name":"telefono","label":"Teléfono","type":"tel","required":true},{"name":"email","label":"Email","type":"email","required":true},{"name":"ciudad","label":"Ciudad","type":"text","required":true},{"name":"modelo","label":"Modelo","type":"select","required":true},{"name":"comentarios","label":"Comentarios","type":"textarea","required":false}]';
            $formTestdriveFields = json_decode(SiteSetting::get('form_testdrive_fields', $defaultFields), true) ?: [];
            $formCotizarFields = json_decode(SiteSetting::get('form_cotizar_fields', $defaultFields), true) ?: [];
            $formLandingFields = json_decode(SiteSetting::get('form_landing_fields', $defaultFields), true) ?: [];

            $view->with(compact('activeModelos', 'whatsappNumber', 'whatsappMessage', 'tracking', 'formTestdriveFields', 'formCotizarFields', 'formLandingFields'));
        });
    }
}
