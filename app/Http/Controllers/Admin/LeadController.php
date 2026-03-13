<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $query = Lead::with(['modelo', 'landingPage'])->orderBy('created_at', 'desc');

        if ($request->filled('fuente')) {
            $query->where('fuente', $request->fuente);
        }

        if ($request->filled('modelo_id')) {
            $query->where('modelo_id', $request->modelo_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('telefono', 'like', "%{$search}%");
            });
        }

        $leads = $query->paginate(25);
        $modelos = \App\Models\Modelo::orderBy('nombre')->get();

        return view('admin.leads.index', compact('leads', 'modelos'));
    }

    public function show(Lead $lead)
    {
        $lead->load(['modelo', 'landingPage']);
        return view('admin.leads.show', compact('lead'));
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();

        return redirect()
            ->route('admin.leads.index')
            ->with('status', 'Lead eliminado correctamente.');
    }

    public function export(Request $request)
    {
        $query = Lead::with(['modelo', 'landingPage'])->orderBy('created_at', 'desc');

        if ($request->filled('fuente')) {
            $query->where('fuente', $request->fuente);
        }

        if ($request->filled('modelo_id')) {
            $query->where('modelo_id', $request->modelo_id);
        }

        $leads = $query->get();

        $csv = "ID,Nombre,Email,Teléfono,Ciudad,Modelo,Fuente,Landing Page,UTM Source,UTM Medium,UTM Campaign,Fecha\n";

        foreach ($leads as $lead) {
            $csv .= implode(',', [
                $lead->id,
                '"' . str_replace('"', '""', $lead->nombre) . '"',
                $lead->email,
                $lead->telefono,
                '"' . str_replace('"', '""', $lead->ciudad ?? '') . '"',
                $lead->modelo_consultado ?? $lead->modelo?->nombre ?? '',
                $lead->fuente,
                $lead->landingPage?->slug ?? '',
                $lead->utm_source ?? '',
                $lead->utm_medium ?? '',
                $lead->utm_campaign ?? '',
                $lead->created_at->format('Y-m-d H:i'),
            ]) . "\n";
        }

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="leads-' . now()->format('Y-m-d') . '.csv"');
    }
}
