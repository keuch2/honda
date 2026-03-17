<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $fillable = [
        'nombre',
        'tipo',
        'ciudad',
        'direccion',
        'telefono',
        'maps_url',
        'lat',
        'lng',
        'is_active',
        'orden',
    ];

    protected $casts = [
        'lat' => 'float',
        'lng' => 'float',
        'is_active' => 'boolean',
        'orden' => 'integer',
    ];

    public function scopeActivas($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeShowrooms($query)
    {
        return $query->where('tipo', 'showroom');
    }

    public function scopeTalleres($query)
    {
        return $query->whereIn('tipo', ['taller_oficial', 'taller_autorizado']);
    }

    public function scopeOrdenadas($query)
    {
        return $query->orderBy('orden')->orderBy('nombre');
    }

    public function getTipoLabelAttribute(): string
    {
        return match($this->tipo) {
            'showroom' => 'Showroom',
            'taller_oficial' => 'Taller Oficial',
            'taller_autorizado' => 'Taller Autorizado',
            default => $this->tipo,
        };
    }

    public function toMapArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->nombre,
            'type' => $this->tipo,
            'city' => $this->ciudad,
            'address' => $this->direccion,
            'phone' => $this->telefono,
            'maps_url' => $this->maps_url,
            'position' => [
                'lat' => (float) $this->lat,
                'lng' => (float) $this->lng,
            ],
        ];
    }
}
