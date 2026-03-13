<?php

namespace App\Http\Controllers;

use App\Models\Usado;
use App\Models\UsadoInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsadoContactController extends Controller
{
    public function store(Request $request, ?Usado $usado = null): RedirectResponse
    {
        $validator = validator($request->all(), [
            'usado_id' => ['nullable', 'exists:usados,id'],
            'nombre' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:120'],
            'telefono_pais' => ['nullable', 'string', 'max:6'],
            'telefono' => ['required', 'string', 'max:50'],
            'mensaje' => ['nullable', 'string', 'max:500'],
            'form_identifier' => ['nullable', 'string', 'max:120'],
            'source_url' => ['nullable', 'string', 'max:500'],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator, 'usadosContact')
                ->withInput()
                ->with('open_contact_modal', $usado?->legacy_id ?? $request->input('form_identifier'));
        }

        $data = $validator->validated();

        if ($usado) {
            $data['usado_id'] = $usado->id;
        }

        $inquiry = UsadoInquiry::create(array_merge(
            Arr::except($data, ['form_identifier']),
            [
            'source_url' => $data['source_url'] ?? $request->headers->get('referer'),
            'ip_address' => $request->ip(),
            'user_agent' => Str::limit($request->userAgent(), 255),
        ]));

        $recipient = config('usados.contact_recipient');
        $cc = config('usados.contact_cc');

        try {
            Mail::send('emails.usados.inquiry', [
                'inquiry' => $inquiry,
                'usado' => $inquiry->usado,
            ], function ($message) use ($inquiry, $recipient, $cc) {
                $message->to($recipient)
                    ->subject('Consulta Usado: ' . (optional($inquiry->usado)->displayName() ?? 'Sin unidad'));

                if ($cc) {
                    $message->cc($cc);
                }
            });
        } catch (\Throwable $exception) {
            Log::error('Error enviando email de contacto de usado', [
                'error' => $exception->getMessage(),
                'inquiry_id' => $inquiry->id,
            ]);
        }

        return back()->with('status', '¡Gracias! Recibimos tu consulta y te contactaremos a la brevedad.');
    }
}
