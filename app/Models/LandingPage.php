<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LandingPage extends Model
{
    use HasFactory;
    use ResolvesMediaUrl;

    protected $fillable = [
        'modelo_id',
        'slug',
        'titulo',
        'subtitulo',
        'hero_image',
        'hero_css_class',
        'form_titulo',
        'form_subtitulo',
        'custom_content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'google_ads_id',
        'google_ads_conversion_label',
        'meta_pixel_id',
        'custom_head_scripts',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function modelo(): BelongsTo
    {
        return $this->belongsTo(Modelo::class);
    }

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    public function heroImageUrl(): ?string
    {
        return $this->resolveMediaUrl($this->hero_image) ?? $this->modelo?->heroImageUrl();
    }
}
