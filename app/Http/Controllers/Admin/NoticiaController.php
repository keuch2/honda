<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::ordenadas()->paginate(20);
        
        return view('admin.noticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.noticias.create', [
            'noticia' => new Noticia([
                'publicado' => true,
                'tag' => 'INNOVACIÓN',
                'fecha' => now()
            ])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:noticias,slug',
            'descripcion' => 'required|string',
            'contenido' => 'required|string',
            'fecha' => 'required|date',
            'tag' => 'required|string|max:50',
            'imagen_destacada' => 'required|image|max:2048',
            'publicado' => 'boolean',
            'orden' => 'integer'
        ]);

        if ($request->hasFile('imagen_destacada')) {
            $path = $request->file('imagen_destacada')->store('noticias', 'public');
            $validated['imagen_destacada'] = 'storage/' . $path;
        }

        $validated['publicado'] = $request->boolean('publicado', true);
        $validated['orden'] = $request->input('orden', 0);
        $validated['contenido_html'] = $request->input('contenido');

        $noticia = Noticia::create($validated);

        return redirect()
            ->route('admin.noticias.edit', $noticia)
            ->with('status', 'Noticia creada correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        return view('admin.noticias.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticia $noticia)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:noticias,slug,' . $noticia->id,
            'descripcion' => 'required|string',
            'contenido' => 'required|string',
            'fecha' => 'required|date',
            'tag' => 'required|string|max:50',
            'imagen_destacada' => 'nullable|image|max:2048',
            'publicado' => 'boolean',
            'orden' => 'integer'
        ]);

        if ($request->hasFile('imagen_destacada')) {
            // Eliminar imagen anterior si existe
            if ($noticia->imagen_destacada && file_exists(public_path($noticia->imagen_destacada))) {
                unlink(public_path($noticia->imagen_destacada));
            }
            
            $path = $request->file('imagen_destacada')->store('noticias', 'public');
            $validated['imagen_destacada'] = 'storage/' . $path;
        }

        $validated['publicado'] = $request->boolean('publicado', true);
        $validated['orden'] = $request->input('orden', 0);
        $validated['contenido_html'] = $request->input('contenido');

        $noticia->update($validated);

        return redirect()
            ->route('admin.noticias.edit', $noticia)
            ->with('status', 'Noticia actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        // Eliminar imagen destacada si existe
        if ($noticia->imagen_destacada && file_exists(public_path($noticia->imagen_destacada))) {
            unlink(public_path($noticia->imagen_destacada));
        }

        $noticia->delete();

        return redirect()
            ->route('admin.noticias.index')
            ->with('status', 'Noticia eliminada correctamente.');
    }

    /**
     * Upload image from TinyMCE editor
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('noticias/contenido', 'public');
            $url = asset('storage/' . $path);

            return response()->json([
                'location' => $url
            ]);
        }

        return response()->json(['error' => 'No se pudo subir la imagen'], 400);
    }
}
