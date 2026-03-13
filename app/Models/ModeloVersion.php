<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModeloVersion extends Model
{
    use HasFactory;

    protected $table = 'modelo_versiones';

    protected $fillable = [
        'modelo_id',
        'nombre',
        'slug',
        'features',
        'orden',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    public function modelo(): BelongsTo
    {
        return $this->belongsTo(Modelo::class);
    }

    public function colores(): HasMany
    {
        return $this->hasMany(ModeloVersionColor::class)->orderBy('orden');
    }
}
