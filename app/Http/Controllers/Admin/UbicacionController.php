<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UbicacionController extends Controller
{
    public function index()
    {
        $ubicaciones = Ubicacion::ordenadas()->get()->groupBy('tipo');
        return view('admin.ubicaciones.index', compact('ubicaciones'));
    }

    public function create()
    {
        return view('admin.ubicaciones.create', ['ubicacion' => new Ubicacion()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nombre'    => 'required|string|max:200',
            'tipo'      => 'required|in:showroom,taller_oficial,taller_autorizado',
            'ciudad'    => 'nullable|string|max:100',
            'direccion' => 'nullable|string|max:300',
            'telefono'  => 'nullable|string|max:100',
            'maps_url'  => 'nullable|url|max:500',
            'lat'       => 'nullable|numeric|between:-90,90',
            'lng'       => 'nullable|numeric|between:-180,180',
            'is_active' => 'nullable',
            'orden'     => 'nullable|integer',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);
        $data['orden'] = $request->input('orden', 0);

        Ubicacion::create($data);

        return redirect()->route('admin.ubicaciones.index')
            ->with('status', 'Ubicación creada correctamente.');
    }

    public function edit(Ubicacion $ubicacion)
    {
        return view('admin.ubicaciones.edit', compact('ubicacion'));
    }

    public function update(Request $request, Ubicacion $ubicacion): RedirectResponse
    {
        $data = $request->validate([
            'nombre'    => 'required|string|max:200',
            'tipo'      => 'required|in:showroom,taller_oficial,taller_autorizado',
            'ciudad'    => 'nullable|string|max:100',
            'direccion' => 'nullable|string|max:300',
            'telefono'  => 'nullable|string|max:100',
            'maps_url'  => 'nullable|url|max:500',
            'lat'       => 'nullable|numeric|between:-90,90',
            'lng'       => 'nullable|numeric|between:-180,180',
            'is_active' => 'nullable',
            'orden'     => 'nullable|integer',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);
        $data['orden'] = $request->input('orden', 0);

        $ubicacion->update($data);

        return redirect()->route('admin.ubicaciones.index')
            ->with('status', 'Ubicación actualizada correctamente.');
    }

    public function destroy(Ubicacion $ubicacion): RedirectResponse
    {
        $ubicacion->delete();

        return redirect()->route('admin.ubicaciones.index')
            ->with('status', 'Ubicación eliminada correctamente.');
    }
}
