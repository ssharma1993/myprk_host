<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SeoSetting extends Model
{
    protected $fillable = ['key', 'value', 'label', 'group'];

    /**
     * Get a single setting value by key with an optional default.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return static::getCached()[$key] ?? $default;
    }

    /**
     * Get all settings as a key => value map (cached for 1 hour).
     */
    public static function getCached(): array
    {
        return Cache::remember('seo_settings', 3600, function () {
            return static::pluck('value', 'key')->toArray();
        });
    }

    /**
     * Bust the settings cache.
     */
    public static function clearCache(): void
    {
        Cache::forget('seo_settings');
    }

    /**
     * Get all settings grouped by their group field.
     */
    public static function grouped(): array
    {
        return static::all()
            ->groupBy('group')
            ->map(fn($items) => $items->keyBy('key'))
            ->toArray();
    }
}
