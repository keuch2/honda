<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModeloVersionColor extends Model
{
    use HasFactory;
    use ResolvesMediaUrl;

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
        return $this->resolveMediaUrl($this->imagen);
    }
}
