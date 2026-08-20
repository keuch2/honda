<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use ResolvesMediaUrl;

    protected $fillable = [
        'imagen',
        'is_active',
        'orden',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'orden' => 'integer',
    ];

    public function scopeActivas($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdenadas($query)
    {
        return $query->orderBy('orden')->orderBy('id');
    }

    public function imagenUrl(): ?string
    {
        return $this->resolveMediaUrl($this->imagen);
    }
}
