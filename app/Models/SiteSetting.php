<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = [
        'group',
        'key',
        'value',
        'type',
        'label',
    ];

    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::remember("site_setting_{$key}", 3600, function () use ($key, $default) {
            $setting = static::where('key', $key)->first();
            return $setting?->value ?? $default;
        });
    }

    public static function set(string $key, mixed $value): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );

        Cache::forget("site_setting_{$key}");
    }

    public static function getGroup(string $group): array
    {
        return Cache::remember("site_settings_group_{$group}", 3600, function () use ($group) {
            return static::where('group', $group)
                ->pluck('value', 'key')
                ->toArray();
        });
    }

    public static function clearGroupCache(string $group): void
    {
        Cache::forget("site_settings_group_{$group}");

        $keys = static::where('group', $group)->pluck('key');
        foreach ($keys as $key) {
            Cache::forget("site_setting_{$key}");
        }
    }
}
