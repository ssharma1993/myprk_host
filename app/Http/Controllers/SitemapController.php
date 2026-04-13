<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    private array $staticPages = [
        ['url' => '/', 'changefreq' => 'weekly', 'priority' => '1.0'],
        ['url' => '/about', 'changefreq' => 'monthly', 'priority' => '0.8'],
        ['url' => '/contact', 'changefreq' => 'monthly', 'priority' => '0.7'],
        ['url' => '/gallery', 'changefreq' => 'weekly', 'priority' => '0.7'],
        ['url' => '/testimonials', 'changefreq' => 'monthly', 'priority' => '0.6'],
        ['url' => '/resources', 'changefreq' => 'monthly', 'priority' => '0.6'],
    ];

    public function index(): Response
    {
        $services = Service::query()
            ->select('slug', 'updated_at')
            ->whereNotNull('slug')
            ->where('slug', '!=', '')
            ->orderBy('display_order')
            ->orderBy('id')
            ->get();

        $now = Carbon::now()->toAtomString();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
        $xml .= ' xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ';
        $xml .= ' xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 ';
        $xml .= 'http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";

        foreach ($this->staticPages as $page) {
            $xml .= " <url>\n";
            $xml .= ' <loc>' . url($page['url']) . "</loc>\n";
            $xml .= " <lastmod>{$now}</lastmod>\n";
            $xml .= ' <changefreq>' . $page['changefreq'] . "</changefreq>\n";
            $xml .= ' <priority>' . $page['priority'] . "</priority>\n";
            $xml .= " </url>\n";
        }

        foreach ($services as $service) {
            $lastmod = $service->updated_at
                ? Carbon::parse($service->updated_at)->toAtomString()
                : $now;

            $xml .= " <url>\n";
            $xml .= ' <loc>' . route('service.show', $service->slug) . "</loc>\n";
            $xml .= " <lastmod>{$lastmod}</lastmod>\n";
            $xml .= " <changefreq>monthly</changefreq>\n";
            $xml .= " <priority>0.8</priority>\n";
            $xml .= " </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=UTF-8')
            ->header('Cache-Control', 'public, max-age=300, must-revalidate');
    }

    public function robots(): Response
    {
        $content = implode("\n", [
            'User-agent: *',
            'Allow: /',
            '',
            'Disallow: /dashboard',
            'Disallow: /admin/',
            'Disallow: /services',
            'Disallow: /qrcode',
            'Disallow: /settings/',
            'Disallow: /login',
            'Disallow: /register',
            'Disallow: /two-factor-challenge',
            'Disallow: /email/verify',
            'Disallow: /user/',
            'Disallow: /api/',
            'Disallow: /services/list',
            '',
            'Sitemap: ' . url('/sitemap.xml'),
        ]) . "\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8')
            ->header('Cache-Control', 'public, max-age=300, must-revalidate');
    }
}
