<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsadoInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'usado_id',
        'nombre',
        'email',
        'telefono_pais',
        'telefono',
        'mensaje',
        'source_url',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'usado_id' => 'integer',
    ];

    public function usado()
    {
        return $this->belongsTo(Usado::class);
    }
}
