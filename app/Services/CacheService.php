<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService
{
    /**
     * Cache durations in seconds
     */
    const DURATION_HOUR = 3600;
    const DURATION_DAY = 86400;
    const DURATION_WEEK = 604800;

    /**
     * Get all services with caching
     */
    public static function getServices()
    {
        return Cache::remember('services:all', self::DURATION_HOUR, function () {
            return \App\Models\Service::with('children')
                ->whereNull('parent_id')
                ->orderBy('display_order', 'asc')
                ->orderBy('created_at', 'desc')
                ->get();
        });
    }

    /**
     * Get featured services (child services) with caching
     */
    public static function getFeaturedServices()
    {
        return Cache::remember('services:featured', self::DURATION_HOUR, function () {
            return \App\Models\Service::whereNotNull('parent_id')
                ->orderBy('parent_id', 'asc')
                ->orderBy('display_order', 'asc')
                ->get();
        });
    }

    /**
     * Get galleries with caching
     */
    public static function getGalleries()
    {
        return Cache::remember('galleries:all', self::DURATION_DAY, function () {
            return \App\Models\Gallery::orderBy('display_order', 'asc')->get();
        });
    }

    /**
     * Get sponsors with caching
     */
    public static function getSponsors()
    {
        return Cache::remember('sponsors:all', self::DURATION_DAY, function () {
            return \App\Models\Sponsor::orderBy('display_order', 'asc')->get();
        });
    }

    /**
     * Get SEO data with caching
     */
    public static function getSeoData()
    {
        return Cache::remember('seo:data', self::DURATION_DAY, function () {
            return \App\Models\Service::find(1); // Adjust based on your SEO model
        });
    }

    /**
     * Invalidate service cache
     */
    public static function invalidateServices()
    {
        Cache::forget('services:all');
        Cache::forget('services:featured');
    }

    /**
     * Invalidate gallery cache
     */
    public static function invalidateGalleries()
    {
        Cache::forget('galleries:all');
    }

    /**
     * Invalidate sponsor cache
     */
    public static function invalidateSponsors()
    {
        Cache::forget('sponsors:all');
    }

    /**
     * Invalidate SEO cache
     */
    public static function invalidateSeoData()
    {
        Cache::forget('seo:data');
    }

    /**
     * Invalidate all caches
     */
    public static function invalidateAll()
    {
        self::invalidateServices();
        self::invalidateGalleries();
        self::invalidateSponsors();
        self::invalidateSeoData();
    }
}
