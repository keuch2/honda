<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Model;

class HomepageSlide extends Model
{
    use ResolvesMediaUrl;

    protected $fillable = [
        'imagen',
        'imagen_alt',
        'orden',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'orden' => 'integer',
    ];

    public function scopeActivos($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdenados($query)
    {
        return $query->orderBy('orden')->orderBy('id');
    }

    public function imagenUrl(): ?string
    {
        return $this->resolveMediaUrl($this->imagen);
    }
}
