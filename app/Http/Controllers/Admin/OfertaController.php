<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Oferta;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class OfertaController extends Controller
{
    public function index()
    {
        $ofertas = Oferta::ordenadas()->get();
        return view('admin.ofertas.index', compact('ofertas'));
    }

    public function create()
    {
        return view('admin.ofertas.create', ['oferta' => new Oferta()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'imagen'    => 'required|image|max:4096',
            'is_active' => 'nullable',
            'orden'     => 'nullable|integer',
        ]);

        $path = $request->file('imagen')->store('ofertas', 'public');

        Oferta::create([
            'imagen'    => $path,
            'is_active' => $request->boolean('is_active', true),
            'orden'     => $request->input('orden', 0),
        ]);

        return redirect()->route('admin.ofertas.index')
            ->with('status', 'Oferta creada correctamente.');
    }

    public function edit(Oferta $oferta)
    {
        return view('admin.ofertas.edit', compact('oferta'));
    }

    public function update(Request $request, Oferta $oferta): RedirectResponse
    {
        $request->validate([
            'imagen'    => 'nullable|image|max:4096',
            'is_active' => 'nullable',
            'orden'     => 'nullable|integer',
        ]);

        if ($request->hasFile('imagen')) {
            if ($oferta->imagen && file_exists(storage_path('app/public/' . $oferta->imagen))) {
                unlink(storage_path('app/public/' . $oferta->imagen));
            }
            $oferta->imagen = $request->file('imagen')->store('ofertas', 'public');
        }

        $oferta->is_active = $request->boolean('is_active', true);
        $oferta->orden = $request->input('orden', 0);
        $oferta->save();

        return redirect()->route('admin.ofertas.index')
            ->with('status', 'Oferta actualizada correctamente.');
    }

    public function destroy(Oferta $oferta): RedirectResponse
    {
        if ($oferta->imagen && file_exists(storage_path('app/public/' . $oferta->imagen))) {
            unlink(storage_path('app/public/' . $oferta->imagen));
        }

        $oferta->delete();

        return redirect()->route('admin.ofertas.index')
            ->with('status', 'Oferta eliminada correctamente.');
    }
}
