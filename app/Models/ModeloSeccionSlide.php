<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModeloSeccionSlide extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo_seccion_id',
        'titulo',
        'descripcion',
        'imagen',
        'imagen_alt',
        'orden',
    ];

    public function seccion(): BelongsTo
    {
        return $this->belongsTo(ModeloSeccion::class, 'modelo_seccion_id');
    }

    public function imagenUrl(): ?string
    {
        if (!$this->imagen) {
            return null;
        }

        if (str_starts_with($this->imagen, 'http')) {
            return $this->imagen;
        }

        return asset($this->imagen);
    }
}
