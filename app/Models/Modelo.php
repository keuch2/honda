<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'nombre',
        'anio',
        'subtitulo',
        'categoria',
        'hero_image',
        'hero_css_class',
        'card_image',
        'ficha_tecnica_pdf',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active',
        'show_in_menu',
        'orden',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_in_menu' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function secciones(): HasMany
    {
        return $this->hasMany(ModeloSeccion::class)->orderBy('orden');
    }

    public function versiones(): HasMany
    {
        return $this->hasMany(ModeloVersion::class)->orderBy('orden');
    }

    public function landingPage(): HasOne
    {
        return $this->hasOne(LandingPage::class);
    }

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    public function displayName(): string
    {
        return $this->nombre . ($this->anio ? ' ' . $this->anio : '');
    }

    public function heroImageUrl(): ?string
    {
        if (!$this->hero_image) {
            return null;
        }

        if (str_starts_with($this->hero_image, 'http')) {
            return $this->hero_image;
        }

        return asset('storage/' . $this->hero_image);
    }

    public function cardImageUrl(): ?string
    {
        if (!$this->card_image) {
            return null;
        }

        return asset('storage/' . $this->card_image);
    }

    public function fichaTecnicaUrl(): ?string
    {
        if (!$this->ficha_tecnica_pdf) {
            return null;
        }

        $path = $this->ficha_tecnica_pdf;

        // Already an absolute URL: use as-is.
        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        // Legacy values point at a real file under public/ (e.g. assets/...),
        // not at the public storage disk. Serve those directly without the
        // storage/ prefix. Files uploaded via the admin are stored on the
        // 'public' disk and live under storage/ as usual.
        if (str_starts_with($path, 'storage/')) {
            return asset($path);
        }

        if (file_exists(public_path($path))) {
            return asset($path);
        }

        return asset('storage/' . $path);
    }
}
