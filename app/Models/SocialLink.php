<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SocialLink extends Model
{
    protected $fillable = [
        'platform',
        'label',
        'icon_class',
        'url',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'display_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public static function activeWithUrl()
    {
        return static::query()
            ->where('is_active', true)
            ->whereNotNull('url')
            ->where('url', '!=', '')
            ->orderBy('display_order')
            ->orderBy('id');
    }

    public static function getCachedForView()
    {
        return Cache::remember('social_links.active', 3600, function () {
            return static::activeWithUrl()->get();
        });
    }

    public static function clearCache(): void
    {
        Cache::forget('social_links.active');
    }
}
