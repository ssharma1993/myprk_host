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
    <div class="container" style="padding-left:0px !important;">
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
                <div class="main-header__logo logo-retina" style="padding-left: 20px !important;">
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

<style>
.main-header--two .main-header__call {
    min-height: 50px;
    padding: 0 20px;
    background: #00387d;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.main-header--two .main-header__call__content {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    justify-content: flex-start;
    text-align: left;
    width: 100%;
}

.main-header--two .main-header__top-item {
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    line-height: 1;
    display: inline-flex;
    align-items: center;
    text-decoration: none;
    padding: 0 16px;
    position: relative;
}

.main-header--two .main-header__top-item:first-child {
    padding-left: 0;
}

.main-header--two .main-header__top-item+.main-header__top-item {
    border-left: 1px solid rgba(255, 255, 255, 0.35);
}

.main-header--two .main-header__top-item i {
    color: #ff1f2d;
    margin-right: 8px;
    font-size: 15px;
}

.main-header--two .main-header__top-item:hover {
    color: #eaf2ff;
}

.main-header--two .main-header__social-links {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-left: auto;
}

.main-header--two .main-header__social-links a {
    color: #fff;
    font-size: 15px;
    line-height: 1;
    opacity: 0.95;
    transition: color 0.2s ease, opacity 0.2s ease;
}

.main-header--two .main-header__social-links a:hover {
    color: #ff1f2d;
    opacity: 1;
}

.main-header--two .main-header__social-links .social-links__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

@media (max-width: 991px) {
    .main-header--two .main-header__call {
        padding: 10px 14px;
        gap: 10px;
    }

    .main-header--two .main-header__call__content {
        gap: 8px;
    }

    .main-header--two .main-header__top-item {
        font-size: 13px;
        padding: 0 10px;
    }

    .main-header--two .main-header__top-item i {
        margin-right: 6px;
        font-size: 13px;
    }

    .main-header--two .main-header__social-links {
        gap: 10px;
    }
}

@media (max-width: 767px) {
    .main-header--two .main-header__call {
        flex-direction: column;
        align-items: flex-start;
    }

    .main-header--two .main-header__top-item+.main-header__top-item {
        border-left: none;
    }

    .main-header--two .main-header__top-item {
        padding: 0;
    }
}
</style>