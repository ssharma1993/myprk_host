<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CacheControl
{
    private const BROWSER_CACHE_SECONDS = 300;

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

        $response->headers->set(
            'Cache-Control',
            'public, max-age=' . self::BROWSER_CACHE_SECONDS . ', must-revalidate'
        );

        // Add ETag header for cache validation
        if ($response->getContent() && !$response->headers->has('ETag')) {
            $etag = '"' . md5($response->getContent()) . '"';
            $response->headers->set('ETag', $etag);
        }

        return $response;
    }
}
