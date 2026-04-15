<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        $appUrl = config('app.url', '');
        $isHttps = str_starts_with($appUrl, 'https://') || $request->isSecure();
        $shouldUpgradeInsecureRequests = $isHttps && !app()->environment('local');

        // ─── X-Content-Type-Options ────────────────────────────────────────────
        // Prevent MIME-type sniffing.
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // ─── X-Frame-Options ───────────────────────────────────────────────────
        // Block clickjacking by disallowing framing from other origins.
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // ─── X-XSS-Protection ──────────────────────────────────────────────────
        // Legacy browser XSS auditor (still used by some bots/scanners).
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // ─── Referrer-Policy ───────────────────────────────────────────────────
        // Send full referrer on same-origin; only origin on cross-origin.
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // ─── Permissions-Policy ────────────────────────────────────────────────
        // Restrict access to sensitive browser features.
        $response->headers->set('Permissions-Policy', implode(', ', [
            'camera=()',
            'microphone=()',
            'geolocation=()',
            'payment=()',
            'usb=()',
            'interest-cohort=()',   // Opt out of FLoC
        ]));

        // ─── Content-Security-Policy ───────────────────────────────────────────
        // Allows inline scripts (required by Bootstrap/jQuery/Owl), Google Fonts,
        // Google Analytics/Tag Manager, and Facebook Pixel.
        $cspDirectives = [
            "default-src 'self'",
            // Scripts: self + CDNs used in the project
            "script-src 'self' 'unsafe-inline' 'unsafe-eval'"
                . " https://www.googletagmanager.com"
                . " https://www.google-analytics.com"
                . " https://connect.facebook.net"
                . " https://cdn.jsdelivr.net",
            // Styles: self + Google Fonts + CDNs
            "style-src 'self' 'unsafe-inline'"
                . " https://fonts.googleapis.com"
                . " https://cdn.jsdelivr.net",
            // Fonts
            "font-src 'self'"
                . " https://fonts.gstatic.com"
                . " data:",
            // Images: self + data URIs + common CDNs/analytics pixels
            "img-src 'self' data: blob:"
                . " https://www.google-analytics.com"
                . " https://www.googletagmanager.com"
                . " https://www.facebook.com",
            // Connections: self + analytics
            "connect-src 'self'"
                . " https://www.google-analytics.com"
                . " https://analytics.google.com"
                . " https://www.googletagmanager.com",
            // Frames: same origin + trusted third-party embeds
            "frame-src 'self'"
                . " https://www.googletagmanager.com"
                . " https://www.google.com"
                . " https://maps.google.com"
                . " https://*.google.com"
                . " https://*.google.ca",
            "object-src 'none'",
            "base-uri 'self'",
            "form-action 'self'",
        ];

        if ($shouldUpgradeInsecureRequests) {
            $cspDirectives[] = 'upgrade-insecure-requests';
        }

        $csp = implode('; ', $cspDirectives);
        $response->headers->set('Content-Security-Policy', $csp);

        // ─── Strict-Transport-Security ─────────────────────────────────────────
        // Only set HSTS on HTTPS responses (never on plain HTTP).
        if ($isHttps) {
            $response->headers->set(
                'Strict-Transport-Security',
                'max-age=31536000; includeSubDomains; preload'
            );
        }

        // ─── Remove fingerprinting headers ─────────────────────────────────────
        $response->headers->remove('X-Powered-By');
        $response->headers->remove('Server');

        return $response;
    }
}
