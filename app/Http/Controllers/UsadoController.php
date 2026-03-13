<?php

namespace App\Http\Controllers;

use App\Models\Usado;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $usados = Usado::visible()
            ->orderByDesc('anio')
            ->orderBy('marca')
            ->with('images')
            ->paginate(12)
            ->withQueryString();

        return view('usados.index', [
            'usados' => $usados,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usado $usado): View|RedirectResponse
    {
        if (! $usado->is_visible) {
            return redirect()
                ->route('usados.index')
                ->with('status', 'El vehículo seleccionado no se encuentra disponible.');
        }

        $usado->load('images');

        $relacionados = Usado::visible()
            ->where('legacy_id', '!=', $usado->legacy_id)
            ->where('marca', $usado->marca)
            ->orderByDesc('anio')
            ->limit(4)
            ->get();

        return view('usados.show', [
            'usado' => $usado,
            'relacionados' => $relacionados,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usado $usado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usado $usado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usado $usado)
    {
        //
    }
}
