@php
$headerOfficeNames = collect($officeLocations ?? [])->pluck('name')->filter()->map(function ($name) {
return trim((string) $name);
})->values();
$headerLocationsText = $headerOfficeNames->isNotEmpty()
? $headerOfficeNames->implode(' | ')
: '';
$headerEmail = trim((string) config('company.email', 'info@myprk.ca'));
@endphp

<header class="main-header main-header--two sticky-header sticky-header--normal">
    <div class="container main-header__container--flush">
        <div class="main-header__call">
            <div class="main-header__call__content">
                <span class="main-header__top-item main-header__top-item--location">
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>{{ $headerLocationsText }}
                </span>
                <a class="main-header__top-item main-header__call__email" href="mailto:{{ $headerEmail }}"
                    aria-label="Send email to {{ $headerEmail }}"><i class="icon-email-3"></i>{{ $headerEmail }}</a>
                <a class="main-header__top-item main-header__call__number" href="{{ config('company.phone_link') }}"><i
                        class="icon-phone-call"></i>{{ config('company.phone') }}</a>
            </div>
            <div class="social-links main-header__social-links">
                @if(isset($socialLinks) && $socialLinks->count() > 0)
                @foreach($socialLinks as $socialLink)
                <a href="{{ $socialLink->url }}" target="_blank" rel="noopener noreferrer">
                    <span class="social-links__icon">
                        <i class="{{ $socialLink->icon_class ?? 'fab fa-link' }}"></i>
                        <span class="sr-only">{{ $socialLink->label }}</span>
                    </span>
                </a>
                @endforeach
                @endif
            </div><!-- /.social-links -->
        </div><!-- /.main-header__call -->
        <div class="main-header__inner">
            <div class="main-header__left">
                <div class="main-header__logo logo-retina main-header__logo--offset">
                    <a href="{{ url('/') }}">
                        <img src="assets/images/logo.svg" alt="PRK Immigration" width="120">
                    </a>
                </div><!-- /.main-header__logo -->
            </div><!-- /.main-header__left -->
            <div class="main-header__right">
                <div class="main-header__bottom">
                    <nav class="main-header__nav main-menu">
                        <ul class="main-menu__list">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/about') }}">About</a></li>
                            <li class="dropdown">
                                <a>Services</a>
                                <ul>
                                    @forelse(($services ?? []) as $service)
                                    <li class="dropdown"><a
                                            href="{{ route('service.show', $service->slug) }}">{{ $service->name }}</a>
                                        <ul>
                                            @foreach(($service->children ?? []) as $child)
                                            <li><a
                                                    href="{{ route('service.show', $child->slug) }}">{{ $child->name }}</a>
                                            </li>
                                    </li>
                                    @endforeach
                                </ul>
                                @empty
                            <li><a href="{{ url('/resources') }}">View Services</a></li>
                            @endforelse
                        </ul>
                        </li>
                        <li><a href="{{ url('/portfolio') }}">Portfolio</a></li>
                        <li><a href="{{ url('/testimonials') }}">Testimonials</a></li>
                        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                        </ul>
                    </nav><!-- /.main-header__nav -->
                    <div class="main-header__right__right">
                        <div class="mobile-nav__btn mobile-nav__toggler me-4">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- /.mobile-nav__toggler -->
                    </div><!-- /.main-header__right__right -->
                </div><!-- /.main-header__bottom -->
            </div><!-- /.main-header__right -->
        </div><!-- /.main-header__inner -->
    </div><!-- /.container -->
</header>