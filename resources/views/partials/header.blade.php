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
                                    @foreach($services as $service)
                                    <li><a href="{{ url('/service/' . $service->id) }}">{{ $service->name }}</a></li>
                                    @endforeach
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
                                <p class="main-header__call__title">Book Consultation</p>
                                <a href="{{ config('company.phone_link') }}" class="main-header__call__number">{{ config('company.phone') }}</a>
                                <br />
                                <a href="mailto:{{ config('company.email') }}" class="main-header__call__email">{{ config('company.email') }}</a>
                                <!-- Add this line -->
                            </div>
                        </div><!-- /.main-header__call -->
                    </div><!-- /.main-header__right__right -->
                </div><!-- /.main-header__bottom -->
            </div><!-- /.main-header__right -->
        </div><!-- /.main-header__inner -->
    </div><!-- /.container -->
</header>