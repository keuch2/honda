<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\Models\Modelo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $landingPages = LandingPage::with('modelo', 'leads')->orderBy('created_at', 'desc')->get();
        return view('admin.landing-pages.index', compact('landingPages'));
    }

    public function edit(LandingPage $landingPage)
    {
        $landingPage->load('modelo');
        return view('admin.landing-pages.edit', compact('landingPage'));
    }

    public function update(Request $request, LandingPage $landingPage): RedirectResponse
    {
        $data = $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'google_ads_id' => 'nullable|string|max:100',
            'google_ads_conversion_label' => 'nullable|string|max:100',
            'meta_pixel_id' => 'nullable|string|max:100',
            'custom_head_scripts' => 'nullable|string|max:5000',
            'is_active' => 'nullable',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->boolean('remove_hero_image')) {
            $data['hero_image'] = null;
        } elseif ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('landing-pages', 'public');
        }

        $landingPage->update($data);

        return redirect()
            ->route('admin.landing-pages.edit', $landingPage)
            ->with('status', 'Landing page actualizada correctamente.');
    }
}
