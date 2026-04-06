<?php

namespace App\Console\Commands;

use App\Services\CacheService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ManageCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:manage {action : clear|status|warm} {--type= : services|galleries|sponsors|all}';

    /**
     * The description of the console command.
     *
     * @var string
     */
    protected $description = 'Manage application cache - clear, check status, or warm cache';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $action = $this->argument('action');
        $type = $this->option('type') ?? 'all';

        switch ($action) {
            case 'clear':
                $this->clearCache($type);
                break;
            case 'status':
                $this->statusCache();
                break;
            case 'warm':
                $this->warmCache($type);
                break;
            default:
                $this->error("Invalid action: {$action}");
        }
    }

    /**
     * Clear application cache
     */
    private function clearCache(string $type): void
    {
        $this->info("Clearing cache ({$type})...");

        switch ($type) {
            case 'services':
                CacheService::invalidateServices();
                break;
            case 'galleries':
                CacheService::invalidateGalleries();
                break;
            case 'sponsors':
                CacheService::invalidateSponsors();
                break;
            case 'all':
                CacheService::invalidateAll();
                break;
            default:
                $this->error("Invalid cache type: {$type}");
        }

        $this->info("✓ Cache cleared successfully!");
        $this->showCacheDetails();
    }

    /**
     * Show cache status
     */
    private function statusCache(): void
    {
        $this->info("\n=== Cache Status ===\n");

        $cacheStore = config('cache.default');
        $this->line("Cache Store: <fg=cyan>{$cacheStore}</>");

        // Check if cache table exists
        if ($cacheStore === 'database') {
            try {
                $count = Cache::getStore()->getConnection()
                    ->table(config('cache.stores.database.table'))
                    ->count();

                $this->line("Cache Entries: <fg=cyan>{$count}</>");

                $thisKeyCount = Cache::getStore()->getConnection()
                    ->table(config('cache.stores.database.table'))
                    ->whereRaw("DATE(created_at) = CURDATE()")
                    ->count();

                $this->line("Today's Entries: <fg=cyan>{$thisKeyCount}</>");
            } catch (\Exception $e) {
                $this->warn("Cache table not accessible. Run: php artisan cache:table && php artisan migrate");
            }
        }

        $this->line("\nCurrent Cached Keys:");
        $this->line("  • services:all");
        $this->line("  • services:featured");
        $this->line("  • galleries:all");
        $this->line("  • sponsors:all");

        $this->line("\n");
    }

    /**
     * Warm cache by pre-loading data
     */
    private function warmCache(string $type): void
    {
        $this->info("Warming cache ({$type})...");

        $this->withProgressBar(['services', 'featured', 'galleries', 'sponsors'], function ($item) use ($type) {
            if ($type === 'all' || $type === 'services') {
                if ($item === 'services') CacheService::getServices();
                if ($item === 'featured') CacheService::getFeaturedServices();
            }
            if ($type === 'all' || $type === 'galleries') {
                if ($item === 'galleries') CacheService::getGalleries();
            }
            if ($type === 'all' || $type === 'sponsors') {
                if ($item === 'sponsors') CacheService::getSponsors();
            }
        });

        $this->newLine();
        $this->info("✓ Cache warmed successfully!");
        $this->showCacheDetails();
    }

    /**
     * Show cache details
     */
    private function showCacheDetails(): void
    {
        $this->line("\nCache Details:");
        $this->line("  • Services: 1 hour");
        $this->line("  • Featured Services: 1 hour");
        $this->line("  • Galleries: 24 hours");
        $this->line("  • Sponsors: 24 hours");
    }
}
