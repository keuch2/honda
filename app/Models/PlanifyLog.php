<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanifyLog extends Model
{
    protected $fillable = [
        'lead_id',
        'form_type',
        'payload',
        'response_status',
        'response_body',
        'sent_at',
    ];

    protected $casts = [
        'payload' => 'array',
        'sent_at' => 'datetime',
    ];

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    public function isSuccess(): bool
    {
        return $this->response_status >= 200 && $this->response_status < 300;
    }
}
