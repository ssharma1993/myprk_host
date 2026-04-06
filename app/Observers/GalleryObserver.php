<?php

namespace App\Observers;

use App\Models\Gallery;
use App\Services\CacheService;

class GalleryObserver
{
    /**
     * Handle the Gallery "created" event.
     */
    public function created(Gallery $gallery): void
    {
        CacheService::invalidateGalleries();
    }

    /**
     * Handle the Gallery "updated" event.
     */
    public function updated(Gallery $gallery): void
    {
        CacheService::invalidateGalleries();
    }

    /**
     * Handle the Gallery "deleted" event.
     */
    public function deleted(Gallery $gallery): void
    {
        CacheService::invalidateGalleries();
    }

    /**
     * Handle the Gallery "restored" event.
     */
    public function restored(Gallery $gallery): void
    {
        CacheService::invalidateGalleries();
    }

    /**
     * Handle the Gallery "force deleted" event.
     */
    public function forceDeleted(Gallery $gallery): void
    {
        CacheService::invalidateGalleries();
    }
}
