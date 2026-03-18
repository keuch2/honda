<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\Models\Modelo;
use App\Models\ModeloSeccion;
use App\Models\ModeloSeccionSlide;
use App\Models\ModeloVersion;
use App\Models\ModeloVersionColor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ModeloController extends Controller
{
    public function index()
    {
        $modelos = Modelo::orderBy('orden')->get();
        return view('admin.modelos.index', compact('modelos'));
    }

    public function create()
    {
        return view('admin.modelos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'slug' => 'required|string|max:100|unique:modelos,slug',
            'anio' => 'nullable|string|max:10',
            'subtitulo' => 'nullable|string|max:255',
            'categoria' => 'nullable|string|max:50',
            'hero_css_class' => 'nullable|string|max:100',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'is_active' => 'nullable',
            'show_in_menu' => 'nullable',
            'orden' => 'nullable|integer',
            'hero_image' => 'nullable|image|max:5120',
            'card_image' => 'nullable|image|max:5120',
            'ficha_tecnica_pdf' => 'nullable|file|mimes:pdf|max:15360',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);
        $data['show_in_menu'] = $request->boolean('show_in_menu', true);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('modelos/heroes', 'public');
        }

        if ($request->hasFile('card_image')) {
            $data['card_image'] = $request->file('card_image')->store('modelos/cards', 'public');
        }

        if ($request->hasFile('ficha_tecnica_pdf')) {
            $data['ficha_tecnica_pdf'] = $request->file('ficha_tecnica_pdf')->store('modelos/fichas', 'public');
        }

        $modelo = Modelo::create($data);

        LandingPage::create([
            'modelo_id' => $modelo->id,
            'slug' => 'landing-' . $modelo->slug,
            'titulo' => $modelo->displayName(),
            'subtitulo' => $modelo->subtitulo,
            'hero_css_class' => $modelo->hero_css_class,
            'form_titulo' => 'Solicitá información',
            'form_subtitulo' => 'Completá el formulario y un asesor se pondrá en contacto.',
            'meta_title' => $modelo->displayName() . ' - Honda Paraguay',
            'is_active' => true,
        ]);

        return redirect()
            ->route('admin.modelos.edit', $modelo)
            ->with('status', 'Modelo creado correctamente. Landing page generada automáticamente.');
    }

    public function edit(Modelo $modelo)
    {
        $modelo->load(['secciones.slides', 'versiones.colores', 'landingPage']);
        return view('admin.modelos.edit', compact('modelo'));
    }

    public function update(Request $request, Modelo $modelo): RedirectResponse
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'slug' => ['required', 'string', 'max:100', Rule::unique('modelos', 'slug')->ignore($modelo->id)],
            'anio' => 'nullable|string|max:10',
            'subtitulo' => 'nullable|string|max:255',
            'categoria' => 'nullable|string|max:50',
            'hero_css_class' => 'nullable|string|max:100',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'is_active' => 'nullable',
            'show_in_menu' => 'nullable',
            'orden' => 'nullable|integer',
            'hero_image' => 'nullable|image|max:5120',
            'card_image' => 'nullable|image|max:5120',
            'ficha_tecnica_pdf' => 'nullable|file|mimes:pdf|max:15360',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);
        $data['show_in_menu'] = $request->boolean('show_in_menu', true);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('modelos/heroes', 'public');
        }

        if ($request->hasFile('card_image')) {
            $data['card_image'] = $request->file('card_image')->store('modelos/cards', 'public');
        }

        if ($request->hasFile('ficha_tecnica_pdf')) {
            $data['ficha_tecnica_pdf'] = $request->file('ficha_tecnica_pdf')->store('modelos/fichas', 'public');
        }

        $modelo->update($data);

        return redirect()
            ->route('admin.modelos.edit', $modelo)
            ->with('status', 'Modelo actualizado correctamente.');
    }

    public function destroy(Modelo $modelo): RedirectResponse
    {
        $modelo->delete();

        return redirect()
            ->route('admin.modelos.index')
            ->with('status', 'Modelo eliminado correctamente.');
    }

    // =============================================
    // SECCIONES
    // =============================================

    public function storeSeccion(Request $request, Modelo $modelo): RedirectResponse
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:100',
            'anchor' => 'nullable|string|max:50',
            'intro_text' => 'nullable|string',
            'layout' => 'required|in:text-left,text-right',
            'orden' => 'nullable|integer',
        ]);

        $data['anchor'] = $data['anchor'] ?: Str::slug($data['titulo']);

        $modelo->secciones()->create($data);

        return redirect()
            ->route('admin.modelos.edit', ['modelo' => $modelo->slug, 'tab' => 'secciones'])
            ->with('status', 'Sección agregada correctamente.');
    }

    public function updateSeccion(Request $request, Modelo $modelo, ModeloSeccion $seccion): RedirectResponse
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:100',
            'anchor' => 'nullable|string|max:50',
            'intro_text' => 'nullable|string',
            'layout' => 'required|in:text-left,text-right',
            'orden' => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);
        $seccion->update($data);

        return redirect()
            ->route('admin.modelos.edit', ['modelo' => $modelo->slug, 'tab' => 'secciones'])
            ->with('status', 'Sección actualizada correctamente.');
    }

    public function destroySeccion(Modelo $modelo, ModeloSeccion $seccion): RedirectResponse
    {
        $seccion->delete();

        return redirect()
            ->route('admin.modelos.edit', ['modelo' => $modelo->slug, 'tab' => 'secciones'])
            ->with('status', 'Sección eliminada correctamente.');
    }

    // =============================================
    // SLIDES
    // =============================================

    public function storeSlide(Request $request, Modelo $modelo, ModeloSeccion $seccion): RedirectResponse
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:200',
            'descripcion' => 'nullable|string',
            'imagen_alt' => 'nullable|string|max:255',
            'orden' => 'nullable|integer',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store(
                'modelos/' . $modelo->slug . '/secciones',
                'public'
            );
        }

        $seccion->slides()->create($data);

        return redirect()
            ->route('admin.modelos.edit', ['modelo' => $modelo->slug, 'tab' => 'secciones'])
            ->with('status', 'Slide agregado correctamente.');
    }

    public function updateSlide(Request $request, Modelo $modelo, ModeloSeccionSlide $slide): RedirectResponse
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:200',
            'descripcion' => 'nullable|string',
            'imagen_alt' => 'nullable|string|max:255',
            'orden' => 'nullable|integer',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store(
                'modelos/' . $modelo->slug . '/secciones',
                'public'
            );
        }

        $slide->update($data);

        return redirect()
            ->route('admin.modelos.edit', ['modelo' => $modelo->slug, 'tab' => 'secciones'])
            ->with('status', 'Slide actualizado correctamente.');
    }

    public function destroySlide(Modelo $modelo, ModeloSeccionSlide $slide): RedirectResponse
    {
        $slide->delete();

        return redirect()
            ->route('admin.modelos.edit', ['modelo' => $modelo->slug, 'tab' => 'secciones'])
            ->with('status', 'Slide eliminado correctamente.');
    }

    // =============================================
    // VERSIONES
    // =============================================

    public function storeVersion(Request $request, Modelo $modelo): RedirectResponse
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'features' => 'nullable|string',
            'orden' => 'nullable|integer',
        ]);

        $data['slug'] = Str::slug($data['nombre']);
        $data['features'] = $data['features']
            ? array_filter(array_map('trim', explode("\n", $data['features'])))
            : [];

        $modelo->versiones()->create($data);

        return redirect()
            ->route('admin.modelos.edit', ['modelo' => $modelo->slug, 'tab' => 'versiones'])
            ->with('status', 'Versión agregada correctamente.');
    }

    public function updateVersion(Request $request, Modelo $modelo, ModeloVersion $version): RedirectResponse
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'features' => 'nullable|string',
            'orden' => 'nullable|integer',
        ]);

        $data['slug'] = Str::slug($data['nombre']);
        $data['features'] = $data['features']
            ? array_filter(array_map('trim', explode("\n", $data['features'])))
            : [];

        $version->update($data);

        return redirect()
            ->route('admin.modelos.edit', ['modelo' => $modelo->slug, 'tab' => 'versiones'])
            ->with('status', 'Versión actualizada correctamente.');
    }

    public function destroyVersion(Modelo $modelo, ModeloVersion $version): RedirectResponse
    {
        $version->delete();

        return redirect()
            ->route('admin.modelos.edit', ['modelo' => $modelo->slug, 'tab' => 'versiones'])
            ->with('status', 'Versión eliminada correctamente.');
    }

    // =============================================
    // VERSION COLORES
    // =============================================

    public function storeVersionColor(Request $request, Modelo $modelo, ModeloVersion $version): RedirectResponse
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'hex_code' => 'nullable|string|max:7',
            'orden' => 'nullable|integer',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store(
                'modelos/' . $modelo->slug . '/versiones',
                'public'
            );
        }

        $version->colores()->create($data);

        return redirect()
            ->route('admin.modelos.edit', ['modelo' => $modelo->slug, 'tab' => 'versiones'])
            ->with('status', 'Color agregado correctamente.');
    }

    public function destroyVersionColor(Modelo $modelo, ModeloVersionColor $color): RedirectResponse
    {
        $color->delete();

        return redirect()
            ->route('admin.modelos.edit', ['modelo' => $modelo->slug, 'tab' => 'versiones'])
            ->with('status', 'Color eliminado correctamente.');
    }
}
