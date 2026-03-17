<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ubicacion;
use Illuminate\Http\JsonResponse;

class UbicacionApiController extends Controller
{
    public function all(): JsonResponse
    {
        $ubicaciones = Ubicacion::activas()->ordenadas()->get()
            ->map(fn($u) => $u->toMapArray());

        return response()->json($ubicaciones);
    }

    public function showrooms(): JsonResponse
    {
        $ubicaciones = Ubicacion::activas()->showrooms()->ordenadas()->get()
            ->map(fn($u) => $u->toMapArray());

        return response()->json($ubicaciones);
    }

    public function talleres(): JsonResponse
    {
        $ubicaciones = Ubicacion::activas()->talleres()->ordenadas()->get()
            ->map(fn($u) => $u->toMapArray());

        return response()->json($ubicaciones);
    }
}
