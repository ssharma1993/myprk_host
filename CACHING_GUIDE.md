# Caching Strategy Documentation

## Overview

This Laravel application now implements a comprehensive caching strategy to improve performance by reducing database queries, minimizing redundant computations, and leveraging HTTP browser caching.

## Cache Layers

### 1. **HTTP Cache Headers (Browser Caching)**

Implemented via `CacheControl` middleware in `app/Http/Middleware/CacheControl.php`

**Cache Durations:**

- **Static Assets** (CSS, JS, images, fonts): 1 year (longest duration for Vite-compiled assets)
- **Service/Portfolio/Gallery Pages**: 1 hour (3600 seconds)
- **About/Contact/Resources Pages**: 24 hours (86400 seconds)
- **Homepage**: 1 hour (3600 seconds)
- **Authenticated Pages**: No cache (must-revalidate)

**How it works:**

- Automatic `Cache-Control` headers added to all responses
- ETags generated for cache validation
- Unauthenticated users see full browser caching
- Admin/authenticated users always get fresh content

### 2. **Application-Level Query Caching**

Implemented via `CacheService` in `app/Services/CacheService.php`

**Cached Queries:**

- `Services::all()` - 1 hour cache
- `Services::featured()` - 1 hour cache
- `Galleries::all()` - 24 hour cache
- `Sponsors::all()` - 24 hour cache

**Cache Storage:** Database driver (set via `CACHE_STORE=database` in `.env`)

**Updated Controllers:**

- `HomeController` - Uses `CacheService` for gallery, sponsor, and service queries

### 3. **Automatic Cache Invalidation (Model Observers)**

Implemented via observers in `app/Observers/`

**Registered Observers:**

- `ServiceObserver` - Watches Service model
- `GalleryObserver` - Watches Gallery model
- `SponsorObserver` - Watches Sponsor model

**Behavior:**
When any model is created, updated, deleted, or restored, the associated cache is automatically cleared. This ensures fresh data is always served.

**Example:**

```php
// When you update a service in admin panel
$service = Service::find(1);
$service->update(['name' => 'New Name']);
// ServiceObserver automatically clears 'services:all' and 'services:featured' cache
```

## Performance Impact

### Before Caching

- Every page load queries galleries, sponsors, and services from database
- N+1 queries for related data
- Repeated database hits for same data

### After Caching

- First request: Queries database, caches result
- Subsequent requests (within cache duration): Serve from cache
- Zero database hits for cached data
- Browser caches static assets for 1 year

**Expected Improvement:** 50-80% reduction in page load time for repeat visitors

## Configuration

### Environment Variables

```bash
# .env file
CACHE_STORE=database          # Use database driver (can also use 'file', 'redis')
DB_CACHE_CONNECTION=mysql    # Database connection for cache table
DB_CACHE_TABLE=cache          # Table to store cache
```

### Cache Durations (in CacheService)

```php
const DURATION_HOUR = 3600;      // 1 hour
const DURATION_DAY = 86400;      // 1 day
const DURATION_WEEK = 604800;    // 1 week
```

## Cache Commands

### Clear All Caches

```bash
php artisan cache:clear
```

### Clear Specific Cache

```bash
# Clear service cache
php artisan cache:forget services:all
php artisan cache:forget services:featured

# Clear gallery cache
php artisan cache:forget galleries:all

# Clear sponsor cache
php artisan cache:forget sponsors:all
```

### Clear View Cache

```bash
php artisan view:clear
```

### Clear Route Cache

```bash
php artisan route:clear
```

### Full Optimization (Production)

```bash
# Clear and rebuild everything
php artisan optimize:clear
php artisan optimize
php artisan route:cache
php artisan config:cache
php artisan view:cache
```

## Cache Middleware Behavior

### Public Routes (Cached)

- `/` (homepage)
- `/about`
- `/service/*`
- `/portfolio`
- `/gallery`
- `/testimonials`
- `/resources`

### Authenticated Routes (Not Cached)

- `/dashboard`
- `/admin/*`
- `/queue-health`
- `/logs`
- Any route accessed by authenticated user

## Database Cache Table

A `cache` table is required to store cache data:

```bash
# Create cache table (if not exists)
php artisan cache:table
php artisan migrate
```

## Best Practices

### 1. Manual Cache Invalidation

For complex scenarios, manually clear cache:

```php
use App\Services\CacheService;

// After updating multiple records
CacheService::invalidateAll();
```

### 2. Cache Busting Static Assets

Vite automatically handles this via versioning. No action needed.

### 3. Monitoring Cache Hit Ratio

Enable query logging to monitor cache effectiveness:

```php
// In .env
DB_LOG_QUERIES=true  // Log all database queries
```

### 4. Cron Job Cleanup (Optional)

If running queue worker, consider periodic cache cleanup:

```bash
# Add to crontab
0 2 * * * cd /path/to/app && php artisan cache:clear >> /dev/null 2>&1
```

## Troubleshooting

### Cache Not Being Cleared

**Issue:** Updated data not showing on frontend
**Solution:**

1. Verify observer was registered: `php artisan optimize`
2. Manually clear cache: `php artisan cache:clear`
3. Check cache table exists: `php artisan migrate`

### High Database Load Despite Caching

**Issue:** Database still getting many queries
**Solution:**

1. Verify cache driver: `php artisan tinker` → `Cache::getStore()?->getDriver()`
2. Check cache table: `SELECT COUNT(*) FROM cache;`
3. Monitor query log: `tail -f storage/logs/*.log | grep "SELECT"`

### ETags Not Working

**Issue:** Browser cache validation not working
**Solution:**

1. Verify browser supports ETags (all modern browsers do)
2. Check response headers: `curl -i https://yoursite.com`
3. Look for `ETag` header in response

## Future Improvements

1. **Redis Caching** - Switch from database to Redis for faster cache operations

    ```bash
    CACHE_STORE=redis
    ```

2. **Cache Tagging** - Tag related cache entries for bulk invalidation

    ```php
    Cache::tags(['services', 'homepage'])->remember(...);
    ```

3. **Cache Warming** - Pre-populate cache on deployment

    ```php
    // In deployment script
    CacheService::getServices();
    CacheService::getGalleries();
    CacheService::getSponsors();
    ```

4. **CDN Caching** - Add Cloudflare or similar CDN for edge caching

## References

- [Laravel Caching Documentation](https://laravel.com/docs/caching)
- [HTTP Caching Best Practices](https://developer.mozilla.org/en-US/docs/Web/HTTP/Caching)
- [Model Observers](https://laravel.com/docs/eloquent#observers)
