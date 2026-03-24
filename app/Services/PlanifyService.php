<?php

namespace App\Services;

use App\Models\Lead;
use App\Models\PlanifyLog;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PlanifyService
{
    public static function sendLead(Lead $lead, string $formType, array $formData): void
    {
        if (!static::isEnabled($formType)) {
            return;
        }

        $mapping = static::getFieldMapping($formType);
        $apiUrl = SiteSetting::get('planify_api_url', 'https://planifypy.herokuapp.com/callbacks/create');

        $source = in_array($formType, ['landing', 'landing-testdrive', 'landing-cotizar'])
            ? 'Google Ads'
            : 'Web Form';

        $payload = [
            'name' => $formData[$mapping['name'] ?? ''] ?? '',
            'surname' => $formData[$mapping['surname'] ?? ''] ?? '',
            'phone' => $formData[$mapping['phone'] ?? ''] ?? '',
            'model_name' => $formData[$mapping['model_name'] ?? ''] ?? '',
            'branch_name' => $formData[$mapping['branch_name'] ?? ''] ?? '',
            'source' => $source,
        ];

        $log = PlanifyLog::create([
            'lead_id' => $lead->id,
            'form_type' => $formType,
            'payload' => $payload,
            'sent_at' => now(),
        ]);

        try {
            $response = Http::timeout(10)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post($apiUrl, $payload);

            $log->update([
                'response_status' => $response->status(),
                'response_body' => $response->body(),
            ]);
        } catch (\Exception $e) {
            $log->update([
                'response_status' => 0,
                'response_body' => $e->getMessage(),
            ]);

            Log::error('Planify API error: ' . $e->getMessage(), [
                'lead_id' => $lead->id,
                'form_type' => $formType,
            ]);
        }
    }

    public static function retry(PlanifyLog $planifyLog): void
    {
        $apiUrl = SiteSetting::get('planify_api_url', 'https://planifypy.herokuapp.com/callbacks/create');
        $payload = $planifyLog->payload;

        $planifyLog->update(['sent_at' => now()]);

        try {
            $response = Http::timeout(10)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post($apiUrl, $payload);

            $planifyLog->update([
                'response_status' => $response->status(),
                'response_body' => $response->body(),
            ]);
        } catch (\Exception $e) {
            $planifyLog->update([
                'response_status' => 0,
                'response_body' => $e->getMessage(),
            ]);

            Log::error('Planify API retry error: ' . $e->getMessage(), [
                'planify_log_id' => $planifyLog->id,
            ]);
        }
    }

    public static function isEnabled(string $formType): bool
    {
        $normalizedType = match ($formType) {
            'landing-testdrive', 'landing-cotizar', 'landing' => 'landing',
            default => $formType,
        };

        return (bool) SiteSetting::get("planify_enabled_{$normalizedType}", false);
    }

    public static function getFieldMapping(string $formType): array
    {
        $normalizedType = match ($formType) {
            'landing-testdrive', 'landing-cotizar', 'landing' => 'landing',
            default => $formType,
        };

        $json = SiteSetting::get("planify_mapping_{$normalizedType}", '{}');
        $mapping = is_string($json) ? json_decode($json, true) : $json;

        return $mapping ?: [
            'name' => 'nombre',
            'surname' => 'apellido',
            'phone' => 'telefono',
            'model_name' => 'modelo',
            'branch_name' => '',
        ];
    }
}
