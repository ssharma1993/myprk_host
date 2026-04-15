<?php

namespace App\Providers;

use App\Models\SocialLink;
use App\Models\OfficeLocation;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Sponsor;
use App\Observers\ServiceObserver;
use App\Observers\GalleryObserver;
use App\Observers\SponsorObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Throwable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register model observers for cache invalidation
        Service::observe(ServiceObserver::class);
        Gallery::observe(GalleryObserver::class);
        Sponsor::observe(SponsorObserver::class);

        $socialLinks = collect();
        $officeLocations = collect();
        $footerOfficeLocations = collect();

        try {
            if (Schema::hasTable('social_links')) {
                $socialLinks = SocialLink::getCachedForView();
            }

            if (Schema::hasTable('office_locations')) {
                $officeLocations = OfficeLocation::getCachedForView();
                $footerOfficeLocations = OfficeLocation::getCachedFooterForView();
            }
        } catch (Throwable $exception) {
            $socialLinks = collect();
            $officeLocations = collect();
            $footerOfficeLocations = collect();
        }

        View::share('socialLinks', $socialLinks);
        View::share('officeLocations', $officeLocations);
        View::share('footerOfficeLocations', $footerOfficeLocations);
    }
}