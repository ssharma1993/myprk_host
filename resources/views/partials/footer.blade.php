<footer class="main-footer main-footer--two">
    <div class="main-footer__bg"></div>
    <div class="container">
        <div class="row gutter-y-40">
            <div class="col-xl-3 col-lg-5 col-md-7">
                <div class="footer-widget footer-widget--about">
                    <a href="{{ url('/') }}" class="footer-widget__logo logo-retina">
                        <img src="assets/images/logo.svg" width="230" alt="PRK Immigration HTML Template">
                    </a>
                    <p class="footer-widget__text">PRK Immigration visa
                        consulting agencies, study abroad consultants, visa agents, and travel or overseas job services.
                    </p>
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
                </div><!-- /.footer-widget -->
            </div><!-- /.col-xl-3 -->
            <div class="col-lg-3 col-md-5 col-sm-6">
                <div class="footer-widget footer-widget--links">
                    <h2 class="footer-widget__title">Quick Link</h2>
                    <ul class="list-unstyled footer-widget__links">
                        <li><a href="{{ url('/#services') }}">What We Do</a></li>
                        <li><a href="{{ url('/about') }}">About Company</a></li>
                        <!-- <li><a href="{{ url('/gallery') }}">Our Gallery</a></li> -->
                    </ul>
                </div><!-- /.footer-widget -->
            </div><!-- /.col-lg-3 -->

            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer-widget footer-widget--links">
                    <h2 class="footer-widget__title">Services</h2>
                    @foreach($services as $service)
                    <ul class="list-unstyled footer-widget__links">
                        <!-- <li><a href="{{ route('service.show', $service->slug) }}">{{ $service->name }}</a></li> -->
                        <!-- <ul class="list-unstyled" "> -->
                        <li><a href="{{ route('service.show', $service->slug) }}">{{ $service->name }}</a></li>
                        <!-- </ul> -->
                    </ul>
                    @endforeach

                    <div class="footer-widget__image">
                        <img src="{{ asset('images/RCIC-IRB_EN_HORZ_CLR_POS.png') }}" alt="RCIC" width="100"
                            style="width: 100%;">
                    </div>
                    <div class="footer-widget__image">
                        <img src="{{ asset('images/CICC_EF_HORZ_CLR_POS_TMMC_1000x326.webp') }}" alt="CICC" width="100"
                            style="width: 100%;">
                    </div>
                </div><!-- /.footer-widget -->
            </div><!-- /.col-xl-3 -->
            <div class="col-lg-3 col-md-5 col-sm-6">
                <div class="footer-widget footer-widget--links">
                    <h2 class="footer-widget__title">Hours</h2>
                    <ul class="list-unstyled footer-widget__links">
                        <li>Monday to Friday: 9:00am – 7:00pm</li>
                        <li>Saturday: 10:00am – 6:00pm</li>
                        <li>Sunday: Closed</li>
                    </ul>
                    @if(isset($officeLocations) && $officeLocations->count() > 0)
                    <div class="footer-office-locations">
                        <h3 class="footer-office-locations__title">Our Locations</h3>
                        @foreach($officeLocations as $officeLocation)
                        <div class="footer-office-location">
                            <h4 class="footer-office-location__name">{{ $officeLocation->name }}</h4>
                            <div class="footer-office-location__address">{!! nl2br(e($officeLocation->address)) !!}
                            </div>
                            <div class="footer-office-location__map">
                                <iframe src="{{ $officeLocation->google_map_embed_url }}" width="100%" height="180"
                                    style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            @if(!empty($officeLocation->google_map_url))
                            <a href="{{ $officeLocation->google_map_url }}" target="_blank" rel="noopener noreferrer"
                                class="footer-office-location__link">Open in Google Maps</a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    <br />
                    @endif
                </div><!-- /.footer-widget -->
            </div><!-- /.col-lg-3 -->

        </div><!-- /.row -->
    </div><!-- /.container -->
    <div class="main-footer__bottom">
        <div class="container">
            <div class="main-footer__bottom__inner">
                <p class="main-footer__copyright">&copy; Copyright <span class="dynamic-year"></span> by PRK Immigration
                </p>
                <ul class="main-footer__page list-unstyled">
                    <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms-and-conditions') }}">Terms and Conditions</a></li>
                    <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                </ul><!-- /.main-footer__page -->
            </div><!-- /.main-footer__inner -->
        </div><!-- /.container -->
    </div><!-- /.main-footer__bottom -->
</footer>

<style>
.footer-office-locations {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.footer-office-locations__title {
    margin: 0;
    color: #0046a1;
    font-size: 18px;
    font-weight: 700;
}

.footer-office-location {
    padding: 16px;
    border: 1px solid #dbeafe;
    border-radius: 10px;
    background: #f8fbff;
}

.footer-office-location__name {
    margin: 0 0 8px;
    color: #0046a1;
    font-size: 16px;
    font-weight: 600;
}

.footer-office-location__address {
    margin-bottom: 12px;
    color: #1a1a1a;
    font-size: 14px;
    line-height: 1.7;
}

.footer-office-location__map {
    overflow: hidden;
    border-radius: 8px;
    margin-bottom: 10px;
}

.footer-office-location__link {
    display: inline-flex;
    align-items: center;
    color: #0046a1;
    font-size: 13px;
    font-weight: 600;
    text-decoration: underline;
}

.footer-office-location__link:hover {
    color: #003d8a;
}
</style>

<!-- mobile nav, search popup and other page-level widgets (from the original template) -->
<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="icon-close"></i></span>
        <div class="logo-box">
            <a href="{{ url('/') }}" aria-label="logo image">
                <img src="assets/images/logo.svg" width="230" alt="PRK Immigration HTML" />
            </a>
        </div>
        <div class="mobile-nav__container"></div>
        <ul class="mobile-nav__contact list-unstyled">
            <li><span class="mobile-nav__contact__icon"><i class="fa fa-envelope"></i></span><a
                    href="mailto:{{ config('company.email') }}">{{ config('company.email') }}</a></li>
            <li><span class="mobile-nav__contact__icon"><i class="fa fa-phone-alt"></i></span><a
                    href="{{ config('company.phone_link') }}">{{ config('company.phone') }}</a>
            </li>
        </ul>
        <div id="social-links" class="social-links">
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
        </div>
    </div>
</div>
<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <div class="search-popup__content">
        <form role="search" method="get" class="search-popup__form" action="#">
            <input type="text" id="search" placeholder="Search Here..." />
            <button type="submit" aria-label="search submit"><i class="icon-search"></i></button>
        </form>
    </div>
</div>
<a href="javascript:void(0);" onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
    class="scroll-to-target scroll-to-top"><span class="scroll-to-top__text">back
        top</span><span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span></a>