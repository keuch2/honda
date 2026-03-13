<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'landing_page_id',
        'modelo_id',
        'nombre',
        'email',
        'telefono',
        'ciudad',
        'modelo_consultado',
        'fuente',
        'comentarios',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_content',
        'ip_address',
    ];

    public function landingPage(): BelongsTo
    {
        return $this->belongsTo(LandingPage::class);
    }

    public function modelo(): BelongsTo
    {
        return $this->belongsTo(Modelo::class);
    }
}
