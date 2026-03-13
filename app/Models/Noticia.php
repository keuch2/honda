<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Noticia extends Model
{
    protected $fillable = [
        'titulo',
        'slug',
        'imagen_destacada',
        'descripcion',
        'contenido_html',
        'fecha',
        'tag',
        'contenido',
        'publicado',
        'orden'
    ];

    protected $casts = [
        'contenido' => 'array',
        'fecha' => 'date',
        'publicado' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($noticia) {
            if (empty($noticia->slug)) {
                $noticia->slug = Str::slug($noticia->titulo);
            }
        });

        static::updating(function ($noticia) {
            if ($noticia->isDirty('titulo') && empty($noticia->slug)) {
                $noticia->slug = Str::slug($noticia->titulo);
            }
        });
    }

    public function scopePublicadas($query)
    {
        return $query->where('publicado', true);
    }

    public function scopeOrdenadas($query)
    {
        return $query->orderBy('orden', 'desc')->orderBy('fecha', 'desc');
    }

    /**
     * Get contenido_html attribute, converting from JSON if needed
     * and fixing image paths for production
     */
    public function getContenidoHtmlAttribute($value)
    {
        $html = '';
        
        // Si ya existe contenido_html, usarlo
        if (!empty($value)) {
            $html = $value;
        }
        // Si no hay contenido_html pero sí contenido JSON, convertirlo
        elseif (!empty($this->attributes['contenido'])) {
            $contenido = json_decode($this->attributes['contenido'], true);
            if (is_array($contenido)) {
                $html = $this->convertJsonToHtml($contenido);
            }
        }

        // Procesar rutas de imágenes para que funcionen en producción
        if (!empty($html)) {
            $html = $this->processImagePaths($html);
        }

        return $html;
    }

    /**
     * Process image paths to use correct asset URLs
     */
    private function processImagePaths($html)
    {
        // Reemplazar rutas absolutas /assets/ con la URL correcta usando asset()
        $html = preg_replace_callback(
            '/src=["\']\/assets\/([^"\']+)["\']/i',
            function ($matches) {
                return 'src="' . asset('assets/' . $matches[1]) . '"';
            },
            $html
        );

        return $html;
    }

    /**
     * Convert JSON content structure to HTML
     */
    private function convertJsonToHtml($contenido)
    {
        $html = '';
        
        foreach ($contenido as $bloque) {
            if (!isset($bloque['type'])) continue;

            switch ($bloque['type']) {
                case 'text':
                    $html .= '<p>' . htmlspecialchars($bloque['value'] ?? '') . '</p>';
                    break;
                    
                case 'image':
                    $src = htmlspecialchars($bloque['value'] ?? '');
                    $caption = htmlspecialchars($bloque['caption'] ?? '');
                    $html .= '<figure>';
                    $html .= '<img src="' . asset($src) . '" alt="' . $caption . '" style="max-width: 100%;">';
                    if (!empty($caption)) {
                        $html .= '<figcaption>' . $caption . '</figcaption>';
                    }
                    $html .= '</figure>';
                    break;
                    
                case 'video':
                    $src = htmlspecialchars($bloque['value'] ?? '');
                    $html .= '<div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">';
                    $html .= '<iframe src="' . $src . '" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" allowfullscreen></iframe>';
                    $html .= '</div>';
                    break;
            }
        }

        return $html;
    }
}
