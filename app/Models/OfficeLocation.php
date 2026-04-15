<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class OfficeLocation extends Model
{
    protected $fillable = [
        'name',
        'address',
        'google_map_embed_url',
        'google_map_url',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'display_order' => 'integer',
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saved(function () {
            static::clearCache();
        });

        static::deleted(function () {
            static::clearCache();
        });
    }

    public static function headerContactLocations()
    {
        return static::query()
            ->orderBy('display_order')
            ->orderBy('id');
    }

    public static function footerLocations()
    {
        return static::query()
            ->where('is_active', true)
            ->orderBy('display_order')
            ->orderBy('id');
    }

    public static function getCachedForView()
    {
        return Cache::remember('office_locations.header_contact', 3600, function () {
            return static::headerContactLocations()->get();
        });
    }

    public static function getCachedFooterForView()
    {
        return Cache::remember('office_locations.footer', 3600, function () {
            return static::footerLocations()->get();
        });
    }

    public static function clearCache(): void
    {
        Cache::forget('office_locations.header_contact');
        Cache::forget('office_locations.footer');
    }
}
