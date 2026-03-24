<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlanifyLog;
use App\Services\PlanifyService;

class PlanifyLogController extends Controller
{
    public function index()
    {
        $query = PlanifyLog::with('lead')->latest('sent_at');

        if (request('status') === 'success') {
            $query->where('response_status', '>=', 200)->where('response_status', '<', 300);
        } elseif (request('status') === 'failed') {
            $query->where(function ($q) {
                $q->whereNull('response_status')
                    ->orWhere('response_status', '<', 200)
                    ->orWhere('response_status', '>=', 300);
            });
        }

        if (request('form_type')) {
            $query->where('form_type', request('form_type'));
        }

        $logs = $query->paginate(25);

        return view('admin.planify-logs.index', compact('logs'));
    }

    public function retry(PlanifyLog $planifyLog)
    {
        PlanifyService::retry($planifyLog);

        $status = $planifyLog->fresh()->isSuccess() ? 'Reenvío exitoso.' : 'El reenvío falló. Revisá el detalle.';

        return back()->with('status', $status);
    }
}
