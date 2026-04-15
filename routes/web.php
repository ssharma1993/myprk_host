<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\OfficeLocationController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\PublicStorageController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services.public');
Route::get('/service/{slug}', [HomeController::class, 'service'])->name('service.show');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store')->middleware('throttle:5,1');
Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery.public');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [HomeController::class, 'termsAndConditions'])->name('terms-and-conditions');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe')->middleware('throttle:5,1');
Route::get('/newsletter/unsubscribe/{token}', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');

// Sitemap & robots
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

// Public storage fallback for hosts where symbolic links are restricted
Route::get('/storage/{path}', [PublicStorageController::class, 'show'])
    ->where('path', '.*')
    ->name('storage.public');

Route::get('/media/{path}', [PublicStorageController::class, 'show'])
    ->where('path', '.*')
    ->name('media.public');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function (HomeController $homeController) {
        return Inertia::render('dashboard', [
            'visitorCount' => $homeController->getVisitorCount(),
        ]);
    })->name('dashboard');
    // QR Code Routes
    Route::get('/qrcode', [QRCodeController::class, 'index'])->name('qrcode.index');
    Route::post('/qrcode/generate', [QRCodeController::class, 'generate'])->name('qrcode.generate');
    Route::post('/qrcode/download', [QRCodeController::class, 'download'])->name('qrcode.download');
    // Services
    Route::get('/admin/services', [ServiceController::class, 'index'])->name('services.index');
    // JSON endpoints for frontend
    Route::get('/admin/services/list', [ServiceController::class, 'getAll'])->name('services.list');
    Route::get('/admin/services/{id}/json', [ServiceController::class, 'getById'])->name('services.get');
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('services.store');
    Route::put('/admin/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/admin/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
    // Gallery Routes
    Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::resource('/admin/gallery', GalleryController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);

    // Sponsor Routes
    Route::get('/admin/sponsors', [SponsorController::class, 'index'])->name('sponsors.index');
    Route::resource('/admin/sponsors', SponsorController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);

    // SEO Routes
    Route::get('/admin/seo', [SeoController::class, 'index'])->name('seo.index');
    Route::post('/admin/seo', [SeoController::class, 'update'])->name('seo.update');

    // Social Links Routes
    Route::get('/admin/social-links', [SocialLinkController::class, 'index'])->name('social-links.index');
    Route::post('/admin/social-links', [SocialLinkController::class, 'update'])->name('social-links.update');

    // Office Locations Routes
    Route::get('/admin/office-locations', [OfficeLocationController::class, 'index'])->name('office-locations.index');
    Route::post('/admin/office-locations', [OfficeLocationController::class, 'update'])->name('office-locations.update');

    // Newsletter Routes
    Route::get('/admin/newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
    Route::get('/admin/newsletter/preview', [NewsletterController::class, 'preview'])->name('newsletter.preview');
    Route::post('/admin/newsletter/send', [NewsletterController::class, 'send'])->name('newsletter.send');
    Route::delete('/admin/newsletter/subscribers/{subscriber}', [NewsletterController::class, 'destroy'])->name('newsletter.subscribers.destroy');

    // Queue Routes
    Route::get('/queue-health', [QueueController::class, 'health'])->name('queue.health.short');
    Route::post('/queue-run', [QueueController::class, 'run'])->name('queue.run.short');
    Route::get('/admin/queue-health', [QueueController::class, 'health'])->name('queue.health');
    Route::post('/admin/queue-run', [QueueController::class, 'run'])->name('queue.run');

    // Logs Routes
    Route::redirect('/amdin/logs', '/admin/logs', 301);
    Route::get('/logs', [LogController::class, 'index'])->name('logs.index.short');
    Route::post('/logs/clear', [LogController::class, 'clear'])->name('logs.clear.short');
    Route::get('/logs/download', [LogController::class, 'download'])->name('logs.download.short');
    Route::get('/admin/logs', [LogController::class, 'index'])->name('logs.index');
    Route::post('/admin/logs/clear', [LogController::class, 'clear'])->name('logs.clear');
    Route::get('/admin/logs/download', [LogController::class, 'download'])->name('logs.download');

    // Cache Routes
    Route::get('/admin/cache', [CacheController::class, 'index'])->name('cache.index');
    Route::post('/admin/cache/clear-all', [CacheController::class, 'clearAll'])->name('cache.clear-all');
    Route::post('/admin/cache/clear/{type}', [CacheController::class, 'clear'])->name('cache.clear');
    Route::post('/admin/cache/warm/{type?}', [CacheController::class, 'warm'])->name('cache.warm');
    Route::get('/admin/cache/stats', [CacheController::class, 'stats'])->name('cache.stats');
});

require __DIR__ . '/settings.php';
