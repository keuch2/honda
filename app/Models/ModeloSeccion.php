<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModeloSeccion extends Model
{
    use HasFactory;

    protected $table = 'modelo_secciones';

    protected $fillable = [
        'modelo_id',
        'titulo',
        'anchor',
        'intro_text',
        'layout',
        'orden',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function modelo(): BelongsTo
    {
        return $this->belongsTo(Modelo::class);
    }

    public function slides(): HasMany
    {
        return $this->hasMany(ModeloSeccionSlide::class)->orderBy('orden');
    }
}
