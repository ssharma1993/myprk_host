<?php

namespace App\Observers;

use App\Models\Sponsor;
use App\Services\CacheService;

class SponsorObserver
{
    /**
     * Handle the Sponsor "created" event.
     */
    public function created(Sponsor $sponsor): void
    {
        CacheService::invalidateSponsors();
    }

    /**
     * Handle the Sponsor "updated" event.
     */
    public function updated(Sponsor $sponsor): void
    {
        CacheService::invalidateSponsors();
    }

    /**
     * Handle the Sponsor "deleted" event.
     */
    public function deleted(Sponsor $sponsor): void
    {
        CacheService::invalidateSponsors();
    }

    /**
     * Handle the Sponsor "restored" event.
     */
    public function restored(Sponsor $sponsor): void
    {
        CacheService::invalidateSponsors();
    }

    /**
     * Handle the Sponsor "force deleted" event.
     */
    public function forceDeleted(Sponsor $sponsor): void
    {
        CacheService::invalidateSponsors();
    }
}
