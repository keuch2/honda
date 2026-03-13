<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UsadoImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'usado_id',
        'path',
        'titulo',
        'descripcion',
        'orden',
        'is_portada',
    ];

    protected $casts = [
        'is_portada' => 'boolean',
        'orden' => 'integer',
    ];

    public function usado()
    {
        return $this->belongsTo(Usado::class);
    }

    public function url(): string
    {
        if (str_starts_with($this->path, 'http://') || str_starts_with($this->path, 'https://')) {
            return $this->path;
        }

        $normalized = ltrim($this->path, '/');

        // Para imágenes en storage, usar /public/storage/ en lugar de /storage/
        if (str_starts_with($normalized, 'usados/')) {
            return asset('public/storage/' . $normalized);
        }

        if (Storage::disk('public')->exists($normalized)) {
            return Storage::disk('public')->url($normalized);
        }

        if (str_starts_with($normalized, 'storage/')) {
            return asset($normalized);
        }

        return asset($normalized);
    }
}
