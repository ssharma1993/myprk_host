<?php

namespace App\Http\Controllers;

use App\Services\CacheService;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use Inertia\Response;

class CacheController extends Controller
{
    /**
     * Show the cache management page
     */
    public function index(): Response
    {
        $cacheStatus = $this->getCacheStatus();

        return Inertia::render('Admin/Cache/Index', [
            'cacheStatus' => $cacheStatus,
        ]);
    }

    /**
     * Clear all caches
     */
    public function clearAll()
    {
        try {
            Cache::flush();
            CacheService::invalidateAll();

            return redirect()->back()->with('success', 'All caches cleared successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to clear cache: ' . $e->getMessage());
        }
    }

    /**
     * Clear specific cache type
     */
    public function clear(string $type)
    {
        try {
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
                default:
                    throw new \Exception("Invalid cache type: {$type}");
            }

            return redirect()->back()->with('success', ucfirst($type) . ' cache cleared successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to clear cache: ' . $e->getMessage());
        }
    }

    /**
     * Warm (pre-load) cache
     */
    public function warm(string $type = 'all')
    {
        try {
            if ($type === 'all' || $type === 'services') {
                CacheService::getServices();
                CacheService::getFeaturedServices();
            }
            if ($type === 'all' || $type === 'galleries') {
                CacheService::getGalleries();
            }
            if ($type === 'all' || $type === 'sponsors') {
                CacheService::getSponsors();
            }

            return redirect()->back()->with('success', 'Cache warmed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to warm cache: ' . $e->getMessage());
        }
    }

    /**
     * Get cache statistics
     */
    public function stats()
    {
        $stats = $this->getCacheStatus();

        return response()->json($stats);
    }

    /**
     * Get cache status and information
     */
    private function getCacheStatus(): array
    {
        $cacheStore = config('cache.default');
        $cacheEntries = 0;
        $cacheSize = 'N/A';

        try {
            if ($cacheStore === 'database') {
                $connection = Cache::getStore()->getConnection();
                $table = config('cache.stores.database.table');

                $cacheEntries = $connection->table($table)->count();

                // Calculate size
                $result = $connection->selectOne(
                    "SELECT ROUND(((data_length + index_length) / 1024 / 1024), 2) AS size " .
                        "FROM information_schema.TABLES " .
                        "WHERE table_schema = DATABASE() " .
                        "AND table_name = ?",
                    [$table]
                );

                if ($result && isset($result->size)) {
                    $cacheSize = $result->size . ' MB';
                }
            }
        } catch (\Exception $e) {
            // Silently fail if table doesn't exist
        }

        return [
            'store' => $cacheStore,
            'entries' => $cacheEntries,
            'size' => $cacheSize,
            'items' => [
                [
                    'name' => 'Services',
                    'key' => 'services:all',
                    'duration' => '1 hour',
                    'type' => 'services',
                ],
                [
                    'name' => 'Featured Services',
                    'key' => 'services:featured',
                    'duration' => '1 hour',
                    'type' => 'services',
                ],
                [
                    'name' => 'Galleries',
                    'key' => 'galleries:all',
                    'duration' => '24 hours',
                    'type' => 'galleries',
                ],
                [
                    'name' => 'Sponsors',
                    'key' => 'sponsors:all',
                    'duration' => '24 hours',
                    'type' => 'sponsors',
                ],
            ],
        ];
    }
}
