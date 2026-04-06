<?php

namespace App\Providers;

use App\Models\SocialLink;
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
        $socialLinks = collect();

        try {
            if (Schema::hasTable('social_links')) {
                $socialLinks = SocialLink::getCachedForView();
            }
        } catch (Throwable $exception) {
            $socialLinks = collect();
        }

        View::share('socialLinks', $socialLinks);
    }
}