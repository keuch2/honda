<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function updateTracking(Request $request): RedirectResponse
    {
        $fields = [
            'google_ads_id' => ['group' => 'tracking', 'label' => 'Google Ads ID', 'type' => 'text'],
            'google_analytics_id' => ['group' => 'tracking', 'label' => 'Google Analytics ID', 'type' => 'text'],
            'gtm_id' => ['group' => 'tracking', 'label' => 'Google Tag Manager ID', 'type' => 'text'],
            'meta_pixel_id' => ['group' => 'tracking', 'label' => 'Meta Pixel ID', 'type' => 'text'],
            'twitter_pixel_id' => ['group' => 'tracking', 'label' => 'Twitter Pixel ID', 'type' => 'text'],
            'custom_head_scripts' => ['group' => 'tracking', 'label' => 'Scripts personalizados (HEAD)', 'type' => 'textarea'],
            'custom_body_scripts' => ['group' => 'tracking', 'label' => 'Scripts personalizados (BODY)', 'type' => 'textarea'],
        ];

        foreach ($fields as $key => $meta) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                [
                    'group' => $meta['group'],
                    'value' => $request->input($key, ''),
                    'type' => $meta['type'],
                    'label' => $meta['label'],
                ]
            );
        }

        SiteSetting::clearGroupCache('tracking');

        return redirect()->route('admin.settings.index', ['tab' => 'tracking'])
            ->with('status', 'Códigos de seguimiento actualizados.');
    }

    public function updateSeo(Request $request): RedirectResponse
    {
        $fields = [
            'seo_default_title' => ['label' => 'Título por defecto', 'type' => 'text'],
            'seo_default_description' => ['label' => 'Descripción por defecto', 'type' => 'textarea'],
            'seo_default_keywords' => ['label' => 'Keywords por defecto', 'type' => 'text'],
            'seo_og_image' => ['label' => 'Imagen OG por defecto', 'type' => 'text'],
            'seo_robots' => ['label' => 'Directiva robots', 'type' => 'text'],
        ];

        foreach ($fields as $key => $meta) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                [
                    'group' => 'seo',
                    'value' => $request->input($key, ''),
                    'type' => $meta['type'],
                    'label' => $meta['label'],
                ]
            );
        }

        SiteSetting::clearGroupCache('seo');

        return redirect()->route('admin.settings.index', ['tab' => 'seo'])
            ->with('status', 'Configuración SEO actualizada.');
    }

    public function updateEmails(Request $request): RedirectResponse
    {
        $fields = [
            'email_testdrive' => ['label' => 'Email destino Test Drive', 'type' => 'text'],
            'email_cotizar' => ['label' => 'Email destino Cotizar', 'type' => 'text'],
            'email_contacto' => ['label' => 'Email destino Contacto', 'type' => 'text'],
            'email_landing' => ['label' => 'Email destino Landing Pages', 'type' => 'text'],
        ];

        foreach ($fields as $key => $meta) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                [
                    'group' => 'emails',
                    'value' => $request->input($key, ''),
                    'type' => $meta['type'],
                    'label' => $meta['label'],
                ]
            );
        }

        SiteSetting::clearGroupCache('emails');

        return redirect()->route('admin.settings.index', ['tab' => 'emails'])
            ->with('status', 'Emails de destino actualizados.');
    }

    public function updateForms(Request $request): RedirectResponse
    {
        $fields = [
            'form_testdrive_fields' => ['label' => 'Campos formulario Test Drive', 'type' => 'json'],
            'form_cotizar_fields' => ['label' => 'Campos formulario Cotizar', 'type' => 'json'],
            'form_landing_fields' => ['label' => 'Campos formulario Landing Pages', 'type' => 'json'],
        ];

        foreach ($fields as $key => $meta) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                [
                    'group' => 'forms',
                    'value' => $request->input($key, ''),
                    'type' => $meta['type'],
                    'label' => $meta['label'],
                ]
            );
        }

        SiteSetting::clearGroupCache('forms');

        return redirect()->route('admin.settings.index', ['tab' => 'forms'])
            ->with('status', 'Configuración de formularios actualizada.');
    }

    public function updateWhatsapp(Request $request): RedirectResponse
    {
        SiteSetting::updateOrCreate(
            ['key' => 'whatsapp_number'],
            [
                'group' => 'general',
                'value' => $request->input('whatsapp_number', ''),
                'type' => 'text',
                'label' => 'Número de WhatsApp',
            ]
        );

        SiteSetting::updateOrCreate(
            ['key' => 'whatsapp_message'],
            [
                'group' => 'general',
                'value' => $request->input('whatsapp_message', ''),
                'type' => 'text',
                'label' => 'Mensaje predeterminado WhatsApp',
            ]
        );

        SiteSetting::clearGroupCache('general');

        return redirect()->route('admin.settings.index', ['tab' => 'whatsapp'])
            ->with('status', 'Configuración de WhatsApp actualizada.');
    }
}
