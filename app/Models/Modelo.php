<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Modelo extends Model
{
    use HasFactory;
    use ResolvesMediaUrl;

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
        return $this->nombre.($this->anio ? ' '.$this->anio : '');
    }

    public function heroImageUrl(): ?string
    {
        return $this->resolveMediaUrl($this->hero_image);
    }

    public function cardImageUrl(): ?string
    {
        return $this->resolveMediaUrl($this->card_image);
    }

    public function fichaTecnicaUrl(): ?string
    {
        return $this->resolveMediaUrl($this->ficha_tecnica_pdf);
    }
}
