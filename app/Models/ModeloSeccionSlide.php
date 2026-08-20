<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModeloSeccionSlide extends Model
{
    use HasFactory;
    use ResolvesMediaUrl;

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
        return $this->resolveMediaUrl($this->imagen);
    }
}
