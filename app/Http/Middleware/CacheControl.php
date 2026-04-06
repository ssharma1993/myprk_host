<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CacheControl
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        // Only cache GET and HEAD requests
        if (!in_array($request->getMethod(), ['GET', 'HEAD'])) {
            return $response;
        }

        // Don't cache if user is authenticated (admin pages)
        if ($request->user()) {
            $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', '0');
            return $response;
        }

        // Cache public pages for various durations
        $path = $request->getPathInfo();

        if ($this->isStaticAsset($path)) {
            // Static assets (CSS, JS, images) - cache for 1 year
            $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
        } elseif (preg_match('#^/(service|portfolio|gallery|testimonials)#', $path)) {
            // Service, portfolio, gallery pages - cache for 1 hour
            $response->headers->set('Cache-Control', 'public, max-age=3600');
        } elseif (preg_match('#^/(about|contact|resources)#', $path)) {
            // About, Contact, Resources pages - cache for 24 hours
            $response->headers->set('Cache-Control', 'public, max-age=86400');
        } elseif ($path === '/' || $path === '') {
            // Homepage - cache for 1 hour
            $response->headers->set('Cache-Control', 'public, max-age=3600');
        } else {
            // Default: cache for 1 hour
            $response->headers->set('Cache-Control', 'public, max-age=3600');
        }

        // Add ETag header for cache validation
        if ($response->getContent() && !$response->headers->has('ETag')) {
            $etag = '"' . md5($response->getContent()) . '"';
            $response->headers->set('ETag', $etag);
        }

        return $response;
    }

    /**
     * Check if the path is a static asset
     */
    private function isStaticAsset(string $path): bool
    {
        $staticExtensions = ['css', 'js', 'jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'woff', 'woff2', 'ttf', 'eot', 'ico', 'map'];

        foreach ($staticExtensions as $ext) {
            if (substr($path, - (strlen($ext) + 1)) === '.' . $ext) {
                return true;
            }
        }

        return false;
    }
}
