<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property string $legacy_id
 * @property string $marca
 * @property string $modelo
 */

class Usado extends Model
{
    use HasFactory;

    protected $fillable = [
        'legacy_id',
        'marca',
        'modelo',
        'version',
        'transmision',
        'anio',
        'kilometraje',
        'color',
        'chapa',
        'precio_contado',
        'entrega_inicial',
        'cuota_aproximada',
        'motor',
        'combustible',
        'precio_lista',
        'portada',
        'is_visible',
        'orden',
        'is_hot_sale',
        'hot_sale_ends_at',
        'is_vendido',
        'vendido_at',
    ];

    protected $casts = [
        'anio' => 'integer',
        'kilometraje' => 'integer',
        'precio_contado' => 'integer',
        'entrega_inicial' => 'integer',
        'cuota_aproximada' => 'integer',
        'precio_lista' => 'integer',
        'is_visible' => 'boolean',
        'orden' => 'integer',
        'is_hot_sale' => 'boolean',
        'hot_sale_ends_at' => 'datetime',
        'is_vendido' => 'boolean',
        'vendido_at' => 'datetime',
    ];

    public function images()
    {
        return $this->hasMany(UsadoImage::class)->orderBy('orden');
    }

    public function inquiries()
    {
        return $this->hasMany(UsadoInquiry::class);
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true)
            ->where(function ($q) {
                $q->where('is_vendido', false)
                  ->orWhere('vendido_at', '>', now()->subHours(24));
            });
    }

    public function isHotSaleActive(): bool
    {
        return $this->is_hot_sale && $this->hot_sale_ends_at && $this->hot_sale_ends_at->isFuture();
    }

    public function isVendidoVisible(): bool
    {
        return $this->is_vendido && $this->vendido_at && $this->vendido_at->gt(now()->subHours(24));
    }

    public function getRouteKeyName(): string
    {
        return 'legacy_id';
    }

    public function coverImage(): ?UsadoImage
    {
        $image = $this->images->firstWhere('is_portada', true);

        return $image ?? $this->images->first();
    }

    public function coverImageUrl(): ?string
    {
        if ($url = $this->resolveMediaPath($this->portada)) {
            return $url;
        }

        return optional($this->coverImage())->url();
    }

    public function formattedPrice(string $field): string
    {
        $value = $this->{$field};

        if (! $value) {
            return 'Consultar';
        }

        return 'US$ ' . number_format($value, 0, ',', '.');
    }

    public function formattedNumber(string $field, string $suffix = '', string $prefix = ''): string
    {
        $value = $this->{$field};

        if (! $value) {
            return 'Consultar';
        }

        $formatted = number_format($value, 0, ',', '.');
        $prefix = trim($prefix);
        $suffix = trim($suffix);

        return trim(($prefix ? $prefix . ' ' : '') . $formatted . ($suffix ? ' ' . $suffix : ''));
    }

    public function formattedKilometraje(): string
    {
        return $this->formattedNumber('kilometraje', 'km');
    }

    public function formattedTransmision(): string
    {
        $value = trim((string) $this->transmision);

        if ($value === '') {
            return 'Consultar';
        }

        $lower = mb_strtolower($value, 'UTF-8');

        if (str_contains($lower, 'aut')) {
            return 'Automática';
        }

        if (str_contains($lower, 'man')) {
            return 'Manual';
        }

        return ucfirst($lower);
    }

    public function formattedCombustible(): string
    {
        $value = trim((string) $this->combustible);

        if ($value === '') {
            return 'Consultar';
        }

        return match (mb_strtolower($value, 'UTF-8')) {
            'nafta' => 'Nafta',
            'gasolina' => 'Gasolina',
            'diesel', 'diésel' => 'Diésel',
            'flex' => 'Flex',
            default => ucfirst(mb_strtolower($value, 'UTF-8')),
        };
    }

    public function displayName(): string
    {
        return trim($this->marca . ' ' . $this->modelo);
    }

    public function whatsappUrl(string $phone = '595991703062'): string
    {
        $detailUrl = route('usados.show', $this);
        $message = sprintf(
            'Hola, me interesa el %s %s (Chapa %s). Más info: %s',
            $this->displayName(),
            $this->anio ?? '',
            $this->chapa ?: $this->legacy_id,
            $detailUrl
        );

        return 'https://wa.me/' . $phone . '?text=' . urlencode($message);
    }

    private function resolveMediaPath(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        $normalized = ltrim($path, '/');

        // Para imágenes en storage, usar /public/storage/ en lugar de /storage/
        if (str_starts_with($normalized, 'usados/')) {
            return asset('public/storage/' . $normalized);
        }

        if (Storage::disk('public')->exists($normalized)) {
            return Storage::disk('public')->url($normalized);
        }

        if (str_starts_with($normalized, 'storage/')) {
            return asset($normalized);
        }

        return asset($normalized);
    }
}
