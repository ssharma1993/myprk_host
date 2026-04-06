<header class="main-header main-header--two sticky-header sticky-header--normal">
    <div class="container">
        <div class="main-header__inner">
            <div class="main-header__left">
                <div class="main-header__logo logo-retina">
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
                        <li><a href="{{ url('/resources') }}">Resources</a></li>
                        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                        </ul>
                    </nav><!-- /.main-header__nav -->
                    <div class="main-header__right__right">
                        <div class="mobile-nav__btn mobile-nav__toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- /.mobile-nav__toggler -->
                        <div class="main-header__call">
                            <!-- <span class="main-header__call__icon"><i class="icon-phone-call"></i></span> -->
                            <div class="main-header__call__content">
                                <!-- <p class="main-header__call__title">Book Consultation</p> <br /> -->
                                <a class="main-header__call__number" style="color: #FFF; font-size: 18px;"
                                    href="{{ config('company.phone_link') }}"><i class="icon-phone-call"
                                        style="margin-right: 6px;"></i>{{ config('company.phone') }}</a>
                                &ensp;<a class="main-header__call__email"
                                    style="color: #FFF; font-size: 18px; position: relative; z-index: 3; pointer-events: auto; display: inline-flex; align-items: center;"
                                    href="mailto:{{trim((string) config('company.email', 'info@myprk.ca')) }}"
                                    aria-label="Send email to {{ trim((string) config('company.email', 'info@myprk.ca')) }}"><i
                                        class="icon-email-3"
                                        style="margin-right: 6px;"></i>{{ trim((string) config('company.email', 'info@myprk.ca')) }}</a>
                                <!-- Add this line -->
                            </div>
                            <div class="social-links">
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
                    </div><!-- /.main-header__right__right -->
                </div><!-- /.main-header__bottom -->
            </div><!-- /.main-header__right -->
        </div><!-- /.main-header__inner -->
    </div><!-- /.container -->
</header>