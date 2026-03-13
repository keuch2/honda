<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\LandingPage;
use App\Models\Modelo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ModeloPageController extends Controller
{
    public function index()
    {
        $modelos = Modelo::where('is_active', true)
            ->orderBy('orden')
            ->get();

        return view('pages.modelos-dynamic', compact('modelos'));
    }

    public function show(Modelo $modelo)
    {
        if (!$modelo->is_active) {
            abort(404);
        }

        $modelo->load(['secciones' => function ($q) {
            $q->where('is_active', true)->orderBy('orden');
        }, 'secciones.slides', 'versiones.colores']);

        return view('pages.modelo-show', compact('modelo'));
    }

    public function landing(LandingPage $landingPage)
    {
        if (!$landingPage->is_active) {
            abort(404);
        }

        $landingPage->load('modelo.secciones.slides');

        return view('pages.landing', compact('landingPage'));
    }

    public function submitLanding(Request $request, LandingPage $landingPage)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:50',
            'ciudad' => 'required|string|max:100',
        ]);

        $lead = Lead::create([
            'landing_page_id' => $landingPage->id,
            'modelo_id' => $landingPage->modelo_id,
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'ciudad' => $data['ciudad'],
            'modelo_consultado' => $landingPage->modelo?->nombre,
            'fuente' => 'landing',
            'utm_source' => $request->input('utm_source'),
            'utm_medium' => $request->input('utm_medium'),
            'utm_campaign' => $request->input('utm_campaign'),
            'utm_content' => $request->input('utm_content'),
            'ip_address' => $request->ip(),
        ]);

        $emailDestino = SiteSetting::get('email_landing');
        if ($emailDestino) {
            try {
                Mail::raw(
                    "Nuevo lead desde Landing Page: {$landingPage->titulo}\n\n" .
                    "Nombre: {$lead->nombre}\n" .
                    "Email: {$lead->email}\n" .
                    "Teléfono: {$lead->telefono}\n" .
                    "Ciudad: {$lead->ciudad}\n" .
                    "Modelo: {$lead->modelo_consultado}\n" .
                    "Fuente: Landing Page\n" .
                    "UTM Source: {$lead->utm_source}\n" .
                    "UTM Campaign: {$lead->utm_campaign}\n",
                    function ($message) use ($emailDestino, $landingPage) {
                        $message->to($emailDestino)
                            ->subject("Nuevo lead - {$landingPage->titulo}");
                    }
                );
            } catch (\Exception $e) {
                \Log::error('Error enviando email de lead: ' . $e->getMessage());
            }
        }

        return back()->with('success', '¡Gracias! Un asesor se pondrá en contacto contigo a la brevedad.');
    }

    public function submitTestDrive(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:50',
            'ciudad' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'comentarios' => 'nullable|string|max:1000',
        ]);

        $modelo = Modelo::where('nombre', $data['modelo'])->first();

        Lead::create([
            'modelo_id' => $modelo?->id,
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'ciudad' => $data['ciudad'],
            'modelo_consultado' => $data['modelo'],
            'fuente' => 'testdrive',
            'comentarios' => $data['comentarios'] ?? null,
            'ip_address' => $request->ip(),
        ]);

        $emailDestino = SiteSetting::get('email_testdrive');
        if ($emailDestino) {
            try {
                Mail::raw(
                    "Nueva solicitud de Test Drive\n\n" .
                    "Nombre: {$data['nombre']}\nEmail: {$data['email']}\n" .
                    "Teléfono: {$data['telefono']}\nCiudad: {$data['ciudad']}\n" .
                    "Modelo: {$data['modelo']}\nComentarios: " . ($data['comentarios'] ?? 'N/A'),
                    function ($message) use ($emailDestino) {
                        $message->to($emailDestino)->subject('Nueva solicitud de Test Drive');
                    }
                );
            } catch (\Exception $e) {
                \Log::error('Error enviando email test drive: ' . $e->getMessage());
            }
        }

        return response()->json(['success' => true, 'message' => '¡Solicitud enviada! Te contactaremos pronto.']);
    }

    public function submitCotizar(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:50',
            'ciudad' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'comentarios' => 'nullable|string|max:1000',
        ]);

        $modelo = Modelo::where('nombre', $data['modelo'])->first();

        Lead::create([
            'modelo_id' => $modelo?->id,
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'ciudad' => $data['ciudad'],
            'modelo_consultado' => $data['modelo'],
            'fuente' => 'cotizar',
            'comentarios' => $data['comentarios'] ?? null,
            'ip_address' => $request->ip(),
        ]);

        $emailDestino = SiteSetting::get('email_cotizar');
        if ($emailDestino) {
            try {
                Mail::raw(
                    "Nueva solicitud de Cotización\n\n" .
                    "Nombre: {$data['nombre']}\nEmail: {$data['email']}\n" .
                    "Teléfono: {$data['telefono']}\nCiudad: {$data['ciudad']}\n" .
                    "Modelo: {$data['modelo']}\nComentarios: " . ($data['comentarios'] ?? 'N/A'),
                    function ($message) use ($emailDestino) {
                        $message->to($emailDestino)->subject('Nueva solicitud de Cotización');
                    }
                );
            } catch (\Exception $e) {
                \Log::error('Error enviando email cotizar: ' . $e->getMessage());
            }
        }

        return response()->json(['success' => true, 'message' => '¡Solicitud enviada! Te contactaremos pronto.']);
    }
}
