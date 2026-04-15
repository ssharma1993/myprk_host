<!doctype html>
<html lang="en">

<head>
    @php
    use App\Models\SeoSetting;
    $seo = SeoSetting::getCached();

    $defaultTitle = $seo['meta_title'] ?? config('app.name', 'PRK Immigration');
    $defaultDescription = $seo['meta_description'] ?? 'PRK Immigration helps with visas, immigration consulting, and
    settlement support.';
    $defaultKeywords = $seo['meta_keywords'] ?? 'immigration, visa, canada immigration, prk immigration';
    $defaultImage = $seo['meta_image'] ?? asset('client/assets/images/logo.svg');

    $pageTitle = trim($__env->yieldContent('meta_title', $__env->yieldContent('title', $defaultTitle)));
    $metaDescription = trim($__env->yieldContent('meta_description', $defaultDescription));
    $metaKeywords = trim($__env->yieldContent('meta_keywords', $defaultKeywords));
    $metaImage = trim($__env->yieldContent('meta_image', $defaultImage));
    $canonicalUrl = trim($__env->yieldContent('canonical_url', url()->current()));

    $gaId = $seo['google_analytics_id'] ?? '';
    $gtmId = $seo['google_tag_manager_id'] ?? '';
    $fbPixelId = $seo['facebook_pixel_id'] ?? '';
    $fbAppId = $seo['fb_app_id'] ?? '';
    $twitterHandle = $seo['twitter_handle'] ?? '@PRK_Immigration';
    $googleVerify = $seo['google_site_verification'] ?? '';
    $bingVerify = $seo['bing_site_verification'] ?? '';
    $customHead = $seo['custom_head_scripts'] ?? '';
    $customBody = $seo['custom_body_scripts'] ?? '';
    $socialProfileUrls = isset($socialLinks)
    ? $socialLinks->pluck('url')->filter()->values()->all()
    : [];
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $metaKeywords }}">
    <meta name="robots" content="index,follow">
    <meta name="author" content="PRK Immigration">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('app.name', 'PRK Immigration') }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $metaImage }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:locale" content="en_US">
    <meta property="og:locale:alternate" content="fr_CA">
    <meta property="og:locale:alternate" content="es_ES">
    @if(!empty($socialProfileUrls))
    @foreach($socialProfileUrls as $socialProfileUrl)
    <meta property="og:see_also" content="{{ $socialProfileUrl }}">
    @endforeach
    @endif

    <!-- Facebook App ID (update with your actual Facebook App ID if available) -->
    <!-- <meta property="fb:app_id" content="YOUR_FACEBOOK_APP_ID"> -->
    @if($fbAppId)
    <meta property="fb:app_id" content="{{ $fbAppId }}">
    @endif

    <!-- Twitter X -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $metaImage }}">
    <meta name="twitter:image:alt" content="{{ $pageTitle }}">
    <meta name="twitter:creator" content="{{ $twitterHandle }}">
    <meta name="twitter:site" content="{{ $twitterHandle }}">
    <meta name="twitter:domain" content="{{ config('app.url') }}">

    <!-- LinkedIn -->
    <meta property="linkedin:url" content="{{ $canonicalUrl }}">
    <meta property="linkedin:title" content="{{ $pageTitle }}">
    <meta property="linkedin:description" content="{{ $metaDescription }}">

    <!-- Pinterest -->
    <meta property="pinterest:media" content="{{ $metaImage }}">
    <meta property="pinterest:description" content="{{ $metaDescription }}">

    <!-- Mobile Web App Tags -->
    <meta name="application-name" content="PRK Immigration">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="PRK Immigration">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#e50c37">
    <meta name="msapplication-TileColor" content="#e50c37">
    <meta name="msapplication-config" content="/browserconfig.xml">

    <!-- Google Tags -->
    @if($googleVerify)
    <meta name="google-site-verification" content="{{ $googleVerify }}">
    @endif
    @if($bingVerify)
    <meta name="msvalidate.01" content="{{ $bingVerify }}">
    @endif
    <meta name="googlebot" content="index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1">

    <!-- Additional Social Profiles -->
    <meta property="business:contact_data:street_address" content="">
    <meta property="business:contact_data:locality" content="Toronto">
    <meta property="business:contact_data:region" content="ON">
    <meta property="business:contact_data:postal_code" content="">
    <meta property="business:contact_data:country_name" content="Canada">

    <!-- Verification Tags -->
    <meta name="REVISIT-AFTER" content="14 days">
    <meta name="distribution" content="global">

    @if(!empty($socialProfileUrls))
    <script type="application/ld+json">
        {
            !!json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => config('app.name', 'PRK Immigration'),
                'url' => config('app.url'),
                'logo' => $metaImage,
                'sameAs' => $socialProfileUrls,
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!
        }
    </script>
    @endif

    <base href="{{ asset('client') }}/">
    @php
    $isProdEnv = app()->environment('production');
    $themeCssPath = $isProdEnv ? 'assets/css/visanet.min.css' : 'assets/css/visanet.css';
    $jqueryPath = $isProdEnv ? 'assets/vendors/jquery/jquery-3.7.1.min.js' : 'assets/vendors/jquery/jquery-3.7.1.js';
    $themeJsPath = $isProdEnv ? 'assets/js/visanet.min.js' : 'assets/js/visanet.js';

    $versionedAsset = function (string $relativePath): string {
    $fullPath = public_path('client/' . $relativePath);
    $version = file_exists($fullPath) ? filemtime($fullPath) : time();

    return $relativePath . '?v=' . $version;
    };

    $themeCssUrl = $versionedAsset($themeCssPath);
    $jqueryUrl = $versionedAsset($jqueryPath);
    $themeJsUrl = $versionedAsset($themeJsPath);
    @endphp
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/dist/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-select/bootstrap-select.min.css" />
    <link rel="stylesheet" href="assets/vendors/aos/css/aos.css" />
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendors/visanet-icons/style.css" />
    <link rel="stylesheet" href="assets/vendors/daterangepicker-master/daterangepicker.css" />
    <link rel="stylesheet" href="assets/vendors/slick/slick.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.min.css" />

    <link rel="stylesheet" href="{{ $themeCssUrl }}" />
    @stack('head')

    {{-- Google Tag Manager (head) --}}
    @if($gtmId)
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', '{{ $gtmId }}');
    </script>
    @endif

    {{-- Google Analytics GA4 --}}
    @if($gaId)
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '{{ $gaId }}');
    </script>
    @endif

    {{-- Custom <head> scripts from SEO settings --}}
    @if($customHead)
    {!! $customHead !!}
    @endif
</head>

<body class="custom-cursor">

    {{-- Google Tag Manager (noscript body) --}}
    @if($gtmId)
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $gtmId }}" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    @endif

    {{-- Facebook Pixel --}}
    @if($fbPixelId)
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ $fbPixelId }}');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={{ $fbPixelId }}&ev=PageView&noscript=1" /></noscript>
    @endif

    @include('partials.preloader')
    @include('partials.header')

    <div class="page-wrapper">
        @yield('content')
        @include('partials.footer')
    </div>

    @if(session('success') || session('error'))
    <div class="modal fade" id="flashMessageModal" tabindex="-1" aria-labelledby="flashMessageModalLabel"
        data-auto-show="{{ session('success') || session('error') ? '1' : '0' }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="flashMessageModalLabel">
                        {{ session('success') ? 'Success' : 'Error' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('success') ?? session('error') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="visanet-btn" data-bs-dismiss="modal">
                        <span class="visanet-btn__icon-box">
                            <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                        </span>
                        <span class="visanet-btn__text">OK</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script src="{{ $jqueryUrl }}"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="assets/vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="assets/vendors/aos/js/aos.js"></script>
    <script src="assets/vendors/imagesloaded/imagesloaded.min.js"></script>
    <script src="assets/vendors/isotope/isotope.js"></script>
    <script src="assets/vendors/slick/slick.min.js"></script>
    <script src="assets/vendors/countdown/countdown.min.js"></script>
    <script src="assets/vendors/daterangepicker-master/moment.min.js"></script>
    <script src="assets/vendors/daterangepicker-master/daterangepicker.js"></script>
    <script src="assets/vendors/gsap/gsap.js"></script>
    <script src="assets/vendors/gsap/scrolltrigger.min.js"></script>
    <script src="assets/vendors/gsap/splittext.min.js"></script>
    <script src="assets/vendors/gsap/visanet-split.js"></script>
    <script src="{{ $themeJsUrl }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.showFlashMessageModal = function() {
                var flashModalElement = document.getElementById('flashMessageModal');
                if (!flashModalElement || !window.bootstrap || !window.bootstrap.Modal) {
                    return null;
                }

                var flashModal = window.bootstrap.Modal.getOrCreateInstance(flashModalElement);
                flashModal.show();
                return flashModal;
            };

            var flashModalElement = document.getElementById('flashMessageModal');
            var shouldAutoShowFlashModal = flashModalElement && flashModalElement.dataset.autoShow === '1';

            if (shouldAutoShowFlashModal) {
                window.showFlashMessageModal();
            }
        });
    </script>

    @stack('scripts')

    {{-- Custom <body> scripts from SEO settings --}}
    @if($customBody)
    {!! $customBody !!}
    @endif
</body>

</html>
