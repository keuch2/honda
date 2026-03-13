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
            'titulo' => 'nullable|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'hero_css_class' => 'nullable|string|max:100',
            'form_titulo' => 'nullable|string|max:255',
            'form_subtitulo' => 'nullable|string|max:500',
            'custom_content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'is_active' => 'nullable',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('landing-pages', 'public');
        }

        $landingPage->update($data);

        return redirect()
            ->route('admin.landing-pages.edit', $landingPage)
            ->with('status', 'Landing page actualizada correctamente.');
    }
}
