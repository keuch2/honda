<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
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
        if (!$this->imagen) {
            return null;
        }
        return asset('storage/' . $this->imagen);
    }
}
