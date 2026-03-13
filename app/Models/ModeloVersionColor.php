<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModeloVersionColor extends Model
{
    use HasFactory;

    protected $table = 'modelo_version_colores';

    protected $fillable = [
        'modelo_version_id',
        'nombre',
        'hex_code',
        'imagen',
        'orden',
    ];

    public function version(): BelongsTo
    {
        return $this->belongsTo(ModeloVersion::class, 'modelo_version_id');
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
