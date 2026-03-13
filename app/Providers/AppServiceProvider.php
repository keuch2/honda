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
        View::composer(['layouts.public', 'partials.header', 'partials.footer'], function ($view) {
            if (!Schema::hasTable('modelos') || !Schema::hasTable('site_settings')) {
                return;
            }

            $activeModelos = Modelo::where('is_active', true)
                ->where('show_in_menu', true)
                ->orderBy('orden')
                ->get(['id', 'nombre', 'slug']);

            $whatsappNumber = SiteSetting::get('whatsapp_number', '595217285717');
            $whatsappMessage = SiteSetting::get('whatsapp_message', '');

            $tracking = SiteSetting::getGroup('tracking');

            $view->with(compact('activeModelos', 'whatsappNumber', 'whatsappMessage', 'tracking'));
        });
    }
}
