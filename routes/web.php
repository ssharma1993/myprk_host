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
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SocialLinkController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/service/{slug}', [HomeController::class, 'service'])->name('service.show');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store')->middleware('throttle:5,1');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');
Route::get('/resources', [HomeController::class, 'resources'])->name('resources');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery.public');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe')->middleware('throttle:5,1');
Route::get('/newsletter/unsubscribe/{token}', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');

// Sitemap & robots
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');


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
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    // JSON endpoints for frontend
    Route::get('/services/list', [ServiceController::class, 'getAll'])->name('services.list');
    Route::get('/services/{id}/json', [ServiceController::class, 'getById'])->name('services.get');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
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

    // Newsletter Routes
    Route::get('/admin/newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
    Route::get('/admin/newsletter/preview', [NewsletterController::class, 'preview'])->name('newsletter.preview');
    Route::post('/admin/newsletter/send', [NewsletterController::class, 'send'])->name('newsletter.send');
    Route::delete('/admin/newsletter/subscribers/{subscriber}', [NewsletterController::class, 'destroy'])->name('newsletter.subscribers.destroy');
});

require __DIR__ . '/settings.php';
