<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LandingPage extends Model
{
    use HasFactory;

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
        if ($this->hero_image) {
            return str_starts_with($this->hero_image, 'http') ? $this->hero_image : asset($this->hero_image);
        }

        return $this->modelo?->heroImageUrl();
    }
}
