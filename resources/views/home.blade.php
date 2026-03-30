@extends('layouts.app')

@section('title','Home')


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const section = document.querySelector('.visa-two--image-sticky');
        if (!section) return;

        const stickyCol = section.querySelector('.visa-two__sticky-col');
        const rightCol = section.querySelector('.col-xl-7');
        const imageWrap = section.querySelector('.visa-two__images');
        if (!stickyCol || !imageWrap) return;

        imageWrap.style.transition = 'top .35s ease, left .35s ease, transform .35s ease, width .35s ease';

        const resetImage = () => {
            imageWrap.style.position = 'relative';
            imageWrap.style.top = '250px';
            imageWrap.style.bottom = 'auto';
            imageWrap.style.left = '0';
            imageWrap.style.width = '100%';
            imageWrap.style.transform = 'none';
        };

        const updateStickyImage = () => {
            if (window.innerWidth < 1200) {
                stickyCol.style.minHeight = '';
                resetImage();
                return;
            }

            if (rightCol) {
                stickyCol.style.minHeight = rightCol.offsetHeight + 'px';
            }

            const sectionRect = section.getBoundingClientRect();
            const stickyColRect = stickyCol.getBoundingClientRect();
            const imageHeight = imageWrap.offsetHeight;
            const viewportMiddleTop = (window.innerHeight / 2) - (imageHeight / 2);
            const sectionTopDoc = window.scrollY + sectionRect.top + 250;
            const sectionBottomDoc = sectionTopDoc + section.offsetHeight - 250;
            const maxFixedScrollY = sectionBottomDoc - imageHeight - viewportMiddleTop;

            if ((window.scrollY + viewportMiddleTop) < sectionTopDoc) {
                resetImage();
                return;
            }

            if (window.scrollY <= maxFixedScrollY) {
                imageWrap.style.position = 'fixed';
                imageWrap.style.top = '50%';
                imageWrap.style.bottom = 'auto';
                imageWrap.style.left = stickyColRect.left + 'px';
                imageWrap.style.width = stickyColRect.width + 'px';
                imageWrap.style.transform = 'translateY(-50%)';
                return;
            }

            imageWrap.style.position = 'absolute';
            imageWrap.style.top = 'auto';
            imageWrap.style.bottom = '0';
            imageWrap.style.left = '0';
            imageWrap.style.width = '100%';
            imageWrap.style.transform = 'none';
        };

        updateStickyImage();
        window.addEventListener('scroll', updateStickyImage, {
            passive: true
        });
        window.addEventListener('resize', updateStickyImage);
    });
</script>
@endpush

@section('content')
<section class="hero-slider-two">
    <div class="hero-slider-two__carousel visanet-owl__carousel visanet-owl__carousel--basic-nav owl-carousel owl-theme"
        data-owl-options='{
        "items": 1,
        "margin": 0,
        "animateIn": "fadeIn",
        "animateOut": "fadeOut",
        "loop": true,
        "nav": false,
        "dots": true,
        "autoplay": true,
        "smartSpeed": 700,
        "navText": ["<i class=\"icon-arrow-left\"></i>","<i class=\"icon-arrow-right\"></i>"]
    }'>
        <div class="hero-slider-two__item">
            <div class="hero-slider-two__bg-1"
                style="background-image: url(assets/images/shapes/hero-slider-bg-shape-2-1.png);">
                <img src="assets/images/shapes/hero-slider-shape-2-1.png" alt="shape" class="hero-slider-two__shape-1">
            </div><!-- /.hero-slider-two__bg-1 -->
            <div class="hero-slider-two__bg-2">
                <div class="hero-slider-two__bg-2__inner"
                    style="background-image: url(assets/images/backgrounds/hero-slider-bg-2-1.jpg);"></div>

                <img src="assets/images/shapes/hero-slider-shape-2-3.png" alt="shape" class="hero-slider-two__shape-2">
                <img src="assets/images/shapes/hero-slider-shape-2-4.png" alt="shape" class="hero-slider-two__shape-3">
                <img src="assets/images/shapes/hero-slider-shape-2-5.png" alt="shape" class="hero-slider-two__shape-4">
            </div><!-- /.hero-slider-two__bg-2 -->
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-10">
                        <div class="hero-slider-two__content">
                            <h2 class="hero-slider-two__title">
                                Turning <br> <span class="hero-slider-two__title__group"><span
                                        class="hero-slider-two__title__shape-1"><img
                                            src="assets/images/shapes/hero-slider-shape-2-2.png" alt="shape"></span>
                                    <span class="hero-slider-two__title__shape-2"></span> <span
                                        class="hero-slider-two__title__highlight">Immigration Dreams</span></span> <br>
                                Into Reality
                            </h2>
                            <div class="hero-slider-two__description">
                                <p class="hero-slider-two__text">Expert guidance, personalized support, and hassle-free
                                    solutions to help. you start your new life in Canada with confidence.</p>
                            </div>
                            <div class="hero-slider-two__button">
                                <a href="{{ route('contact') }}" class="visanet-btn visanet-btn--black">
                                    <span class="visanet-btn__icon-box">
                                        <span class="visanet-btn__icon"><span><i
                                                    class="icon-arrow-right-3"></i></span></span>
                                    </span>
                                    <span class="visanet-btn__text">Free Consultation</span>
                                </a>
                            </div>
                        </div><!-- /.hero-slider-two__content -->
                    </div><!-- /.col-xl-7 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.hero-slider-two__item -->
        <div class="hero-slider-two__item">
            <div class="hero-slider-two__bg-1"
                style="background-image: url(assets/images/shapes/hero-slider-bg-shape-2-1.png);">
                <img src="assets/images/shapes/hero-slider-shape-2-1.png" alt="shape" class="hero-slider-two__shape-1">
            </div><!-- /.hero-slider-two__bg-1 -->
            <div class="hero-slider-two__bg-2">
                <div class="hero-slider-two__bg-2__inner"
                    style="background-image: url(assets/images/backgrounds/hero-slider-bg-2-2.jpg);"></div>

                <img src="assets/images/shapes/hero-slider-shape-2-3.png" alt="shape" class="hero-slider-two__shape-2">
                <img src="assets/images/shapes/hero-slider-shape-2-4.png" alt="shape" class="hero-slider-two__shape-3">
                <img src="assets/images/shapes/hero-slider-shape-2-5.png" alt="shape" class="hero-slider-two__shape-4">
            </div><!-- /.hero-slider-two__bg-2 -->
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-10">
                        <div class="hero-slider-two__content">
                            <h2 class="hero-slider-two__title">
                                Helping You<br> <span class="hero-slider-two__title__group"><span
                                        class="hero-slider-two__title__shape-1"><img
                                            src="assets/images/shapes/hero-slider-shape-2-2.png" alt="shape"></span>
                                    <span class="hero-slider-two__title__shape-2"></span><span
                                        class="hero-slider-two__title__highlight">Build A Brighter</span></span> <br>
                                Future
                            </h2>
                            <div class="hero-slider-two__description">
                                <p class="hero-slider-two__text">Empowering you with expert immigration solutions,
                                    personalized support, and a seamless process for a successful and secure future in
                                    Canada.
                                </p>
                            </div>
                            <div class="hero-slider-two__button">
                                <a href="{{ route('contact') }}" class="visanet-btn visanet-btn--black">
                                    <span class="visanet-btn__icon-box">
                                        <span class="visanet-btn__icon"><span><i
                                                    class="icon-arrow-right-3"></i></span></span>
                                    </span>
                                    <span class="visanet-btn__text">Get Started</span>
                                </a>
                            </div>
                        </div><!-- /.hero-slider-two__content -->
                    </div><!-- /.col-xl-7 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.hero-slider-two__item -->
        <div class="hero-slider-two__item">
            <div class="hero-slider-two__bg-1"
                style="background-image: url(assets/images/shapes/hero-slider-bg-shape-2-1.png);">
                <img src="assets/images/shapes/hero-slider-shape-2-1.png" alt="shape" class="hero-slider-two__shape-1">
            </div><!-- /.hero-slider-two__bg-1 -->
            <div class="hero-slider-two__bg-2">
                <div class="hero-slider-two__bg-2__inner"
                    style="background-image: url(assets/images/backgrounds/hero-slider-bg-2-3.jpg);"></div>

                <img src="assets/images/shapes/hero-slider-shape-2-3.png" alt="shape" class="hero-slider-two__shape-2">
                <img src="assets/images/shapes/hero-slider-shape-2-4.png" alt="shape" class="hero-slider-two__shape-3">
                <img src="assets/images/shapes/hero-slider-shape-2-5.png" alt="shape" class="hero-slider-two__shape-4">
            </div><!-- /.hero-slider-two__bg-2 -->
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-10">
                        <div class="hero-slider-two__content">
                            <h2 class="hero-slider-two__title">
                                Guiding <br> <span class="hero-slider-two__title__group"><span
                                        class="hero-slider-two__title__shape-1"><img
                                            src="assets/images/shapes/hero-slider-shape-2-2.png" alt="shape"></span>
                                    <span class="hero-slider-two__title__shape-2"></span> <span
                                        class="hero-slider-two__title__highlight">You Every Step</span></span> <br>
                                Of The Way
                            </h2>
                            <div class="hero-slider-two__description">
                                <p class="hero-slider-two__text">Providing expert support, personalized guidance, and
                                    hassle-free solutions at every step of your immigration journey.
                                </p>
                            </div>
                            <div class="hero-slider-two__button">
                                <a href="{{ route('contact') }}" class="visanet-btn visanet-btn--black">
                                    <span class="visanet-btn__icon-box">
                                        <span class="visanet-btn__icon"><span><i
                                                    class="icon-arrow-right-3"></i></span></span>
                                    </span>
                                    <span class="visanet-btn__text">Start Your Journey</span>
                                </a>
                            </div>
                        </div><!-- /.hero-slider-two__content -->
                    </div><!-- /.col-xl-7 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.hero-slider-two__item -->
        <div class="hero-slider-two__item">
            <div class="hero-slider-two__bg-1"
                style="background-image: url(assets/images/shapes/hero-slider-bg-shape-2-1.png);">
                <img src="assets/images/shapes/hero-slider-shape-2-1.png" alt="shape" class="hero-slider-two__shape-1">
            </div><!-- /.hero-slider-two__bg-1 -->
            <div class="hero-slider-two__bg-2">
                <div class="hero-slider-two__bg-2__inner"
                    style="background-image: url(assets/images/backgrounds/hero-slider-bg-2-4.jpg);"></div>

                <img src="assets/images/shapes/hero-slider-shape-2-3.png" alt="shape" class="hero-slider-two__shape-2">
                <img src="assets/images/shapes/hero-slider-shape-2-4.png" alt="shape" class="hero-slider-two__shape-3">
                <img src="assets/images/shapes/hero-slider-shape-2-5.png" alt="shape" class="hero-slider-two__shape-4">
            </div><!-- /.hero-slider-two__bg-2 -->
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-10">
                        <div class="hero-slider-two__content">
                            <h2 class="hero-slider-two__title">
                                Seamless Visa &amp; <br> <span class="hero-slider-two__title__group"><span
                                        class="hero-slider-two__title__shape-1"><img
                                            src="assets/images/shapes/hero-slider-shape-2-2.png" alt="shape"></span>
                                    <span class="hero-slider-two__title__shape-2"></span> <span
                                        class="hero-slider-two__title__highlight">Immigration</span></span> <br>
                                Solutions
                            </h2>
                            <div class="hero-slider-two__description">
                                <p class="hero-slider-two__text">Effortless visa and immigration services with expert
                                    guidance, personalized support, and a smooth transition to Canada for individuals,
                                    families, and professionals.
                                </p>
                            </div>
                            <div class="hero-slider-two__button">
                                <a href="{{ route('contact') }}" class="visanet-btn visanet-btn--black">
                                    <span class="visanet-btn__icon-box">
                                        <span class="visanet-btn__icon"><span><i
                                                    class="icon-arrow-right-3"></i></span></span>
                                    </span>
                                    <span class="visanet-btn__text">Book Free Consultation</span>
                                </a>
                            </div>
                        </div><!-- /.hero-slider-two__content -->
                    </div><!-- /.col-xl-7 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.hero-slider-two__item -->
    </div><!-- /.hero-slider-two__carousel -->
</section><!-- /.hero-slider-two -->

<section class="features">
    <div class="container">
        <!-- <div class="features__bg"></div>/.features__bg -->
        <br />
        <div class="sec-title sec-title--center">
            <div class="sec-title__top" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1500">
                <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                <br>
                <br>
                <p class="sec-title__tagline">Service We Provide </p>
                <span class="sec-title__icon sec-title__icon--right"><i class="icon-airplane-2"></i></span>
            </div><!-- /.sec-title__top -->
            <h2 class="sec-title__title bw-split-in-right">Service We Provide
                Explore Our Visa Citizenship &
                Immigration Services <br></h2>
            <br>
            <!-- /.sec-title__title -->
        </div><!-- /.sec-title -->
        <div class="row gutter-y-30">
            @foreach($services as $service)
            @php
            $isEven = $services->count() % 2 === 0;
            $colClass = $isEven ? 'col-xl-6 col-md-6' : 'col-xl-4 col-md-6';
            @endphp
            <div class="{{ $colClass }}" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1300" data-aos-delay="{{ 100 + ($loop->index * 100) }}">

                <div class="features__card" style="display: flex; flex-direction: column; height: 100%;">
                    <div class="features__image">
                        <img src="/storage/{{ $service->image_path }}" alt="{{ $service->name }}">
                    </div><!-- /.features__image -->
                    <div class="features__content" style="flex: 1; display: flex; flex-direction: column;">
                        <div class="features__icon-box">
                            <span class="features__icon"><i class="{{ $service->icon }}"></i></span>
                        </div><!-- /.features__icon-box -->
                        <h2 class="features__title"><a
                                href="{{ route('service.show', $service->slug) }}">{{ $service->name }}</a></h2>
                        <p class="features__text" style="flex: 1;">{{ $service->description }}</p>
                        @if($service->children && count($service->children) > 0)
                        <div class="features__children">
                            @foreach($service->children as $child)
                            <a href="{{ route('service.show', $child->slug) }}" class="features__child-link">
                                {{ $child->name }}
                            </a> <br />
                            @endforeach
                        </div>
                        @endif
                        <br />
                        <a href="{{ route('service.show', $service->slug) }}" class="features__btn">
                            Read More <span class="features__btn__icon"><i class="icon-arrow-right-up"></i></span>
                        </a><!-- /.features__btn -->
                    </div><!-- /.features__content -->
                    <img src="assets/images/shapes/features-shape-1-1.png" alt="shape" class="features__shape">
                </div><!-- /.features__card -->
            </div><!-- /.col-xl-4 -->

            @if(($loop->index + 1) % ($isEven ? 2 : 3) === 0 || $loop->last)
        </div>
        <div class="row gutter-y-30">
            @endif
            @endforeach
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.features -->

<section class="about-two section-space">
    <div class="container">
        <div class="row gutter-y-50 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
                <div class="about-two__image">
                    <div class="about-two__image__one">
                        <img src="assets/images/about/founder1.jpeg" alt="about">
                    </div><!-- /.about-two__image__one -->
                    <div class="about-two__experience">
                        <!-- <h2 class="about-two__experience__year">3+</h2> -->
                        <!-- <h3 class="about-two__experience__title">Experience Challenge</h3> -->
                    </div><!-- /.about-two__experience -->
                    <div class="about-two__image__two">
                        <!-- <img src="assets/images/about/founder1.png" alt="about"> -->
                    </div><!-- /.about-two__image__two -->
                    <!-- <img src="assets/images/shapes/about-shape-2-2.png" alt="shape" class="about-two__image__shape"> -->
                </div><!-- /.about-two__image -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="about-two__content">
                    <div class="sec-title">
                        <div class="sec-title__top" data-aos="fade-right" data-aos-anchor-placement="top-bottom"
                            data-aos-duration="1500">
                            <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                            <p class="sec-title__tagline">About Us</p>
                        </div><!-- /.sec-title__top -->
                        <h2 class="sec-title__title bw-split-in-right">Founder & Principal Consultant, PRK Immigration
                            Consultancy</h2><!-- /.sec-title__title -->
                    </div><!-- /.sec-title -->
                    <div class="about-two__text" data-aos="fade-left" data-aos-anchor-placement="top-bottom"
                        data-aos-duration="1300">
                        <p>
                            My journey to Canada was not simple. It was filled with uncertainty, obstacles, and moments
                            where I had to make life-changing decisions with very little clarity. From the very
                            beginning —
                            when I first consulted an agent in India about coming to Canada — to navigating my own
                            permanent
                            residence application, I experienced firsthand how complex and emotionally demanding the
                            immigration process can be.
                        </p>

                        <p>
                            There were hiccups. There were hurdles. There were times when the path forward wasn’t clear,
                            and
                            I had to research, strategize, and determine the best way ahead on my own.
                        </p>

                        <p>Through that experience, I learned something powerful.</p>

                        <p>
                            Many people invest significant money in immigration services, yet very few receive the
                            honest
                            guidance, transparency, and strategic advice they truly deserve. Too often, applicants are
                            given
                            only one option instead of being educated about all possible pathways. Too often, they are
                            treated like a file number instead of individuals and families with dreams.
                        </p>

                        <p>That realization became my mission.</p>

                        <p>
                            I am <strong>Purnima Wahi, Founder and Principal Consultant at PRK Immigration
                                Consultancy</strong>,
                            and I built this firm with one clear purpose: to be a competent, ethical, and regulated
                            consultant who
                            genuinely puts clients first.
                        </p>

                        <p><strong>My approach is different:</strong></p>
                        <ul>
                            <li>I carefully assess each client’s unique background.</li>
                            <li>I present multiple viable options wherever possible.</li>
                            <li>I clearly explain the pros, cons, timelines, risks, and benefits of each pathway.</li>
                            <li>I empower my clients with knowledge so they can confidently choose what is best for
                                them.</li>
                            <li>I ensure that the value of my service reflects the trust and investment my clients place
                                in me.</li>
                        </ul>

                        <p>
                            Immigration is more than paperwork — it’s your future, your family, and your dreams. Having
                            experienced the challenges myself, I understand the emotions and uncertainties involved. At
                            PRK
                            Immigration Consultancy, we are committed to guiding you every step of the way — helping you
                            <em>navigate, settle, and thrive</em> with confidence in Canada.
                        </p>

                        <p>
                            At PRK Immigration Consultancy, you are not just another application.
                            You are a person with goals — and I am here to help you achieve them the right way.
                        </p>
                    </div>

                    <div class="about-two__button" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                        data-aos-duration="1300">
                        <a href="{{ route('about') }}" class="visanet-btn">
                            <span class="visanet-btn__icon-box">
                                <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                            </span>
                            <span class="visanet-btn__text">Learn More</span>
                        </a><!-- /.visanet-btn -->
                    </div><!-- /.about-two__button -->
                </div><!-- /.about-two__content -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <img src="assets/images/shapes/about-shape-2-1.png" alt="shape" class="about-two__shape">
</section><!-- /.about-two -->

<section class="why-choose-modern section-space-b">
    <div class="container">
        <div class="row gutter-y-40 align-items-center">
            <div class="col-xl-5 col-lg-6">
                <div class="why-choose-modern__content" data-aos="fade-right" data-aos-anchor-placement="top-bottom"
                    data-aos-duration="1300">
                    <p class="why-choose-modern__tagline">Why Choose Us</p>
                    <h2 class="why-choose-modern__title">Reasons People Trust Our Consultancy</h2>
                    <p class="why-choose-modern__desc">Trusted expertise, seamless process, personalized support, and a
                        high
                        success rate to make your immigration journey smooth and stress-free.</p>

                    <div class="why-choose-modern__points">
                        <div class="why-choose-modern__point">
                            <div class="why-choose-modern__icon"><i class="fas fa-video"></i></div>
                            <div class="why-choose-modern__point-content">
                                <h3 class="why-choose-modern__point-title">Direct Online Interviews</h3>
                                <p class="why-choose-modern__point-text">We make the visa process easy with virtual
                                    consultations,
                                    saving you time and effort.</p>
                            </div>
                        </div>

                        <div class="why-choose-modern__point">
                            <div class="why-choose-modern__icon"><i class="fas fa-passport"></i></div>
                            <div class="why-choose-modern__point-content">
                                <h3 class="why-choose-modern__point-title">Quick &amp; Easy Process</h3>
                                <p class="why-choose-modern__point-text">Our streamlined approach ensures a smooth and
                                    hassle-free visa application experience.</p>
                            </div>
                        </div>

                        <div class="why-choose-modern__point">
                            <div class="why-choose-modern__icon"><i class="fas fa-check-circle"></i></div>
                            <div class="why-choose-modern__point-content">
                                <h3 class="why-choose-modern__point-title">99% Visa Approvals</h3>
                                <p class="why-choose-modern__point-text">With our expert guidance, we have a high
                                    success rate in
                                    visa approvals.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-7 col-lg-6">
                <div class="why-choose-modern__gallery" data-aos="fade-left" data-aos-anchor-placement="top-bottom"
                    data-aos-duration="1300">
                    <div class="why-choose-modern__gallery-main">
                        <img src="assets/images/resources/why-choose-1-1.jpg" alt="Happy clients">
                    </div>
                    <div class="why-choose-modern__gallery-side why-choose-modern__gallery-side--top">
                        <img src="assets/images/resources/why-choose-1-2.jpg" alt="Consultation meeting">
                    </div>
                    <div class="why-choose-modern__gallery-side why-choose-modern__gallery-side--bottom">
                        <img src="assets/images/resources/features-1-1.jpg" alt="Professional support">
                    </div>

                    <div class="why-choose-modern__trust-card">
                        <h4 class="why-choose-modern__trust-title">100+ Trusted Customer</h4>
                        <div class="why-choose-modern__avatars">
                            <img src="assets/images/resources/fly-client-1.png" alt="customer">
                            <img src="assets/images/resources/fly-client-2.png" alt="customer">
                            <img src="assets/images/resources/fly-client-3.png" alt="customer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.why-choose-modern -->

<section class="funfact section-space-b">
    <div class="container">
        <div class="row gutter-y-30">
            <div class="col-lg-3 col-sm-6" data-aos="zoom-in" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1300" data-aos-delay="100">
                <div class="funfact__item">
                    <div class="funfact__item__content">
                        <div class="funfact__item__icon-box"><span class="funfact__item__icon"><i
                                    class="icon-satisfaction"></i></span></div>
                        <h3 class="funfact__item__count count-box"><span class="count-text" data-stop="100"
                                data-speed="1500">0</span><span>+</span></h3>
                        <p class="funfact__item__title">Satisfied <br />Clients</p>
                    </div><!-- /.funfact__item__content -->
                    <div class="funfact__item__bg">
                        <div style="background-image: url(assets/images/shapes/funfact-shape-1-1-.png);"
                            class="funfact__item__shape"></div>
                        <div style="background-image: url(assets/images/resources/funfact-item-bg-1-1.jpg);"
                            class="funfact__item__image"></div>
                    </div><!-- /.funfact__item__bg -->
                </div><!-- /.funfact__item -->
            </div><!-- /.col-lg-3 -->
            <div class="col-lg-3 col-sm-6" data-aos="zoom-in" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1300" data-aos-delay="200">
                <div class="funfact__item">
                    <div class="funfact__item__content">
                        <div class="funfact__item__icon-box"><span class="funfact__item__icon"><i
                                    class="icon-place"></i></span></div>
                        <h3 class="funfact__item__count count-box"><span class="count-text" data-stop="10"
                                data-speed="1500"></span><span>+</span></h3>
                        <p class="funfact__item__title">Countries <br> Represented</p>
                    </div><!-- /.funfact__item__content -->
                    <div class="funfact__item__bg">
                        <div style="background-image: url(assets/images/shapes/funfact-shape-1-1-.png);"
                            class="funfact__item__shape"></div>
                        <div style="background-image: url(assets/images/resources/funfact-item-bg-1-1.jpg);"
                            class="funfact__item__image"></div>
                    </div><!-- /.funfact__item__bg -->
                </div><!-- /.funfact__item -->
            </div><!-- /.col-lg-3 -->
            <div class="col-lg-3 col-sm-6" data-aos="zoom-in" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1300" data-aos-delay="300">
                <div class="funfact__item">
                    <div class="funfact__item__content">
                        <div class="funfact__item__icon-box"><span class="funfact__item__icon"><i
                                    class="icon-immigration-officer"></i></span></div>
                        <h3 class="funfact__item__count count-box"><span class="count-text" data-stop="10"
                                data-speed="1500">0</span><span>+</span></h3>
                        <p class="funfact__item__title">Experienced Immigration <br> Officers </p>
                    </div><!-- /.funfact__item__content -->
                    <div class="funfact__item__bg">
                        <div style="background-image: url(assets/images/shapes/funfact-shape-1-1-.png);"
                            class="funfact__item__shape"></div>
                        <div style="background-image: url(assets/images/resources/funfact-item-bg-1-1.jpg);"
                            class="funfact__item__image"></div>
                    </div><!-- /.funfact__item__bg -->
                </div><!-- /.funfact__item -->
            </div><!-- /.col-lg-3 -->
            <div class="col-lg-3 col-sm-6" data-aos="zoom-in" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1300" data-aos-delay="400">
                <div class="funfact__item">
                    <div class="funfact__item__content">
                        <div class="funfact__item__icon-box"><span class="funfact__item__icon"><i
                                    class="icon-completed-task"></i></span></div>
                        <h3 class="funfact__item__count count-box"><span class="count-text" data-stop="50"
                                data-speed="1500">0</span><span>+</span></h3>
                        <p class="funfact__item__title">Visa and <br /> Passport Approved</p>
                    </div><!-- /.funfact__item__content -->
                    <div class="funfact__item__bg">
                        <div style="background-image: url(assets/images/shapes/funfact-shape-1-1-.png);"
                            class="funfact__item__shape"></div>
                        <div style="background-image: url(assets/images/resources/funfact-item-bg-1-1.jpg);"
                            class="funfact__item__image"></div>
                    </div><!-- /.funfact__item__bg -->
                </div><!-- /.funfact__item -->
            </div><!-- /.col-lg-3 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.funfact -->

<section class="gallery-one section-space">
    <div class="container-fluid">
        <div class="sec-title sec-title--center">
            <div class="sec-title__top" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1500">
                <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                <p class="sec-title__tagline">Our Gallery</p>
                <span class="sec-title__icon sec-title__icon--right"><i class="icon-airplane-2"></i></span>
            </div><!-- /.sec-title__top -->
            <h2 class="sec-title__title bw-split-in-right">Successful Immigration <br> Solutions We Provide</h2>
            <!-- /.sec-title__title -->
        </div><!-- /.sec-title -->
        <div class="gallery-one__carousel visanet-owl__carousel visanet-owl__carousel--counter visanet-owl__carousel--basic-nav owl-carousel owl-theme"
            data-owl-options='{
			"items": 1,
			"margin": 5,
			"loop": false,
			"smartSpeed": 700,
			"nav": true,
			"dots": false,
			"navText": ["<i class=\"icon-arrow-left\"></i>","<i class=\"icon-arrow-right\"></i>"],
			"autoplay": true,
			"responsive": {
				"0": {
					"items": 1
				},
				"576": {
					"items": 2
				},
				"992": {
					"items": 3
				},
				"1200": {
					"items": 3
				},
				"1400": {
					"items": 4
				},
				"1600": {
					"items": 4
				},
				"1800": {
					"items": 5
				}
			}
		}'>
            @forelse($galleries as $gallery)
            <div class="gallery-one__item" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1300" data-aos-delay="{{ 100 + ($loop->index * 100) }}">
                <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->title }}" class="gallery-one__image">
                <div class="gallery-one__content">
                    <h3 class="gallery-one__title"><span>{{ $gallery->title }}</span></h3>
                    @if($gallery->description)
                    <p class="gallery-one__text"><span>{{ $gallery->description }}</span></p>
                    @endif
                </div><!-- /.gallery-one__content -->
                <a href="{{ asset($gallery->image_path) }}" class="gallery-one__btn img-popup"><i
                        class="icon-zoom-in"></i></a>
                <div class="gallery-one__border"></div>
            </div><!-- /.gallery-one__item -->
            @empty
            <div class="gallery-one__item" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1300" data-aos-delay="100">
                <div class="gallery-one__content">
                    <h3 class="gallery-one__title"><span>Gallery Coming Soon</span></h3>
                    <p class="gallery-one__text"><span>We are updating this section with new success stories.</span></p>
                </div><!-- /.gallery-one__content -->
                <div class="gallery-one__border"></div>
            </div><!-- /.gallery-one__item -->
            @endforelse
        </div><!-- /.gallery-one__carousel -->
    </div><!-- /.container-fluid -->
</section><!-- /.gallery-one -->

<div class="client-carousel client-carousel--two section-space-b">
    <div class="container" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
        <div class="client-carousel__carousel visanet-owl__carousel visanet-owl__carousel--basic-nav owl-theme owl-carousel"
            data-owl-options='{
            "items": 5,
            "margin": 65,
            "smartSpeed": 700,
            "loop": true,
            "autoplay": 6000,
            "nav": false,
            "dots": false,
            "navText": ["<i class=\"icon-arrow-left\"></i>","<i class=\"icon-arrow-right\"></i>"],
            "responsive": {
                "0":{
                    "items": 1,
                    "margin": 10
                },
                "431":{
                    "items": 2,
                    "margin": 20
                },
                "576":{
                    "items": 2,
                    "margin": 40
                },
                "768":{
                    "items": 3,
                    "margin": 40
                },
                "992":{
                    "items": 4,
                    "margin": 40
                },
                "1200":{
                    "items": 5,
                    "margin": 40
                }
            }
            }'>
            @forelse($sponsors as $sponsor)
            <div class="client-carousel__item">
                <img src="{{ asset($sponsor->image_path) }}" alt="{{ $sponsor->name }}" class="client-carousel__image">
                <div class="client-carousel__hover">
                    <img src="{{ asset($sponsor->image_path) }}" alt="{{ $sponsor->name }}"
                        class="client-carousel__hover__image">
                </div><!-- /.client-carousel__hover -->
            </div><!-- /.owl-slide-item-->
            @empty
            <div class="client-carousel__item">
                <div class="client-carousel__hover">
                    <span class="client-carousel__hover__image">Sponsors Coming Soon</span>
                </div><!-- /.client-carousel__hover -->
            </div><!-- /.owl-slide-item-->
            @endforelse
        </div><!-- /.client-carousel__carousel -->
    </div><!-- /.container -->
</div><!-- /.client-carousel -->

<section class="fly-one section-space-t">
    <div class="fly-one__bg" style="background-image: url(assets/images/backgrounds/fly-bg.jpg);"></div>
    <div class="container">
        <div class="fly-one__content">
            <div class="fly-one__client">
                <div class="fly-one__client__images">
                    <div class="fly-one__client__img">
                        <img src="assets/images/resources/fly-client-1.png" alt="Trusted Customer">
                    </div>
                    <div class="fly-one__client__img">
                        <img src="assets/images/resources/fly-client-2.png" alt="Trusted Customer">
                    </div>
                    <div class="fly-one__client__img">
                        <img src="assets/images/resources/fly-client-3.png" alt="Trusted Customer">
                    </div>
                </div>
                <h3 class="fly-one__client__funfact count-box">
                    <span class="count-text" data-stop="100" data-speed="1500"></span>
                    <span>+</span>
                </h3>
                <h4 class="fly-one__client__title">Trusted Customer</h4>
            </div><!-- /.fly-one__client -->
            <div class="fly-one__card">
                <div class="fly-one__card__inner">
                    <h3 class="fly-one__card__title">Start Your Canadian Immigration Journey Today</h3>
                    <p class="fly-one__card__text">With PRK Immigration, your dream of settling in Canada becomes
                        achievable. Our expert consultants are ready to guide you through every step with personalized
                        support and proven strategies.</p>
                    <a href="{{ route('contact') }}" class="visanet-btn">
                        <span class="visanet-btn__icon-box">
                            <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                        </span>
                        <span class="visanet-btn__text">Get Started Now</span>
                    </a><!-- /.visanet-btn -->
                </div>
                <div class="fly-one__card__image">
                    <img src="assets/images/resources/fly-img.jpg" alt="fly image">
                </div>
            </div><!-- /.fly-one__card -->
        </div><!-- /.fly-one__content -->
    </div><!-- /.container -->
    <img src="assets/images/shapes/fly-shape-1-1.png" alt="fly shape" class="fly-one__shape-1 airplane-animated">
    <div class="fly-one__shape-2"></div>
</section><!-- /.fly-one -->

<section class="work-process section-space-b">
    <div class="container">
        <div class="sec-title sec-title--center">
            <div class="sec-title__top" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1500">
                <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                <p class="sec-title__tagline">Our Work process</p>
                <span class="sec-title__icon sec-title__icon--right"><i class="icon-airplane-2"></i></span>
            </div><!-- /.sec-title__top -->
            <h2 class="sec-title__title bw-split-in-right">Get Your Visa Approved Working <br> 4 Easy Simple Steps.
            </h2><!-- /.sec-title__title -->
        </div><!-- /.sec-title -->
        <div class="work-process__carousel visanet-owl__carousel visanet-owl__carousel--with-shadow visanet-owl__carousel--basic-nav owl-carousel owl-theme"
            data-owl-options='{
			"items": 1,
			"margin": 30,
			"loop": false,
			"smartSpeed": 700,
			"nav": true,
			"dots": false,
			"navText": ["<i class=\"icon-arrow-left\"></i>","<i class=\"icon-arrow-right\"></i>"],
			"autoplay": true,
			"responsive": {
				"0": {
					"items": 1
				},
				"768": {
					"items": 2
				},
				"992": {
					"items": 3
				},
                "1200": {
					"items": 4
				}
			}
		}'>
            <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300"
                data-aos-delay="100">
                <div class="work-process__item">
                    <h3 class="work-process__step"><span>Step</span></h3>
                    <div class="work-process__content">
                        <div class="work-process__image">
                            <div class="work-process__image__main">
                                <img src="assets/images/resources/work-process-1-1.png" alt="">
                            </div>
                            <span class="work-process__icon"><i class="icon-check"></i></span>
                        </div><!-- /.work-process__image -->
                        <div class="work-process__inner">
                            <h3 class="work-process__title"><a href="{{ route('about') }}">Initial Consultation</a></h3>
                            <p class="work-process__text">Assess your immigration goals and eligibility with our expert
                                consultants.</p>
                            <div class="work-process__button">
                                <a href="{{ route('about') }}" class="work-process__btn"><i
                                        class="icon-arrow-right-3"></i></a>
                            </div>
                        </div><!-- /.work-process__inner -->
                        <div class="work-process__bg"></div>
                    </div><!-- /.work-process__content -->
                </div><!-- /.work-process__item -->
            </div><!-- /.item -->
            <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300"
                data-aos-delay="200">
                <div class="work-process__item">
                    <h3 class="work-process__step"><span>Step</span></h3>
                    <div class="work-process__content">
                        <div class="work-process__image">
                            <div class="work-process__image__main">
                                <img src="assets/images/resources/work-process-1-2.png" alt="">
                            </div>
                            <span class="work-process__icon"><i class="icon-check"></i></span>
                        </div><!-- /.work-process__image -->
                        <div class="work-process__inner">
                            <h3 class="work-process__title"><a href="{{ route('about') }}">Document Evaluation</a></h3>
                            <p class="work-process__text">Comprehensive review of your documents for completeness and
                                accuracy.</p>
                            <div class="work-process__button">
                                <a href="{{ route('about') }}" class="work-process__btn"><i
                                        class="icon-arrow-right-3"></i></a>
                            </div>
                        </div><!-- /.work-process__inner -->
                        <div class="work-process__bg"></div>
                    </div><!-- /.work-process__content -->
                </div><!-- /.work-process__item -->
            </div><!-- /.item -->
            <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300"
                data-aos-delay="300">
                <div class="work-process__item">
                    <h3 class="work-process__step"><span>Step</span></h3>
                    <div class="work-process__content">
                        <div class="work-process__image">
                            <div class="work-process__image__main">
                                <img src="assets/images/resources/work-process-1-3.png" alt="">
                            </div>
                            <span class="work-process__icon"><i class="icon-check"></i></span>
                        </div><!-- /.work-process__image -->
                        <div class="work-process__inner">
                            <h3 class="work-process__title"><a href="{{ route('about') }}">Application Submission</a>
                            </h3>
                            <p class="work-process__text">Professional submission of your application to the appropriate
                                authorities.</p>
                            <div class="work-process__button">
                                <a href="{{ route('about') }}" class="work-process__btn"><i
                                        class="icon-arrow-right-3"></i></a>
                            </div>
                        </div><!-- /.work-process__inner -->
                        <div class="work-process__bg"></div>
                    </div><!-- /.work-process__content -->
                </div><!-- /.work-process__item -->
            </div><!-- /.item -->
            <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300"
                data-aos-delay="400">
                <div class="work-process__item">
                    <h3 class="work-process__step"><span>Step</span></h3>
                    <div class="work-process__content">
                        <div class="work-process__image">
                            <div class="work-process__image__main">
                                <img src="assets/images/resources/work-process-1-4.png" alt="">
                            </div>
                            <span class="work-process__icon"><i class="icon-check"></i></span>
                        </div><!-- /.work-process__image -->
                        <div class="work-process__inner">
                            <h3 class="work-process__title"><a href="{{ route('about') }}">Approval & Celebration</a>
                            </h3>
                            <p class="work-process__text">Receive your approval decision and begin your Canadian
                                immigration journey.</p>
                            <div class="work-process__button">
                                <a href="{{ route('about') }}" class="work-process__btn"><i
                                        class="icon-arrow-right-3"></i></a>
                            </div>
                        </div><!-- /.work-process__inner -->
                        <div class="work-process__bg"></div>
                    </div><!-- /.work-process__content -->
                </div><!-- /.work-process__item -->
            </div><!-- /.item -->
        </div><!-- /.work-process__carousel -->
    </div><!-- /.container -->
</section><!-- /.work-process -->

<section class="home-testimonials section-space-b">
    <div class="container">
        <div class="sec-title sec-title--center">
            <div class="sec-title__top" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1500">
                <p class="sec-title__tagline">Our Testimonials</p>
            </div>
            <h2 class="sec-title__title bw-split-in-right">Let's Explore What People Say <br> About Our Services</h2>
        </div>

        <div class="home-testimonials__carousel visanet-owl__carousel visanet-owl__carousel--basic-nav owl-carousel owl-theme"
            data-owl-options='{
                "items": 1,
                "margin": 24,
                "loop": true,
                "smartSpeed": 700,
                "nav": false,
                "dots": true,
                "autoplay": true,
                "responsive": {
                    "0": {"items": 1},
                    "768": {"items": 2},
                    "1200": {"items": 3}
                }
            }'>
            @foreach($homeTestimonials as $testimonial)
            <div class="home-testimonials__item" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1300" data-aos-delay="{{ 100 + (($loop->index % 3) * 100) }}">
                <div class="home-testimonials__stars mb-3">
                    <span class="text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                </div>
                <p class="home-testimonials__text mb-4">"{{ $testimonial['text'] }}"</p>
                <div class="home-testimonials__bottom">
                    <div class="home-testimonials__author">
                        <div class="home-testimonials__avatar-wrapper">
                            <img src="{{ $testimonial['image'] }}" alt="{{ $testimonial['name'] }}"
                                class="home-testimonials__avatar-img"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="home-testimonials__avatar-fallback" style="display: none;">
                                {{ strtoupper(substr($testimonial['name'], 0, 1)) }}
                            </div>
                        </div>
                        <div>
                            <h3 class="home-testimonials__name">{{ $testimonial['name'] }}</h3>
                            <p class="home-testimonials__category">{{ $testimonial['category'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!-- /.home-testimonials -->

<section class="online-visa section-space-t">
    <div class="container">
        <div class="online-visa__inner">
            <div class="row gutter-y-50">
                <div class="col-xl-7 col-lg-6">
                    <div class="online-visa__image">
                        <img src="assets/images/resources/online-visa-1-1.png" alt="online visa">
                        <div class="online-visa__image__shape"></div>
                    </div><!-- /.online-visa__image -->
                </div><!-- /.col-xl-7 -->
                <div class="col-xl-5 col-lg-6">
                    <div class="online-visa__content">
                        <div class="sec-title">
                            <div class="sec-title__top" data-aos="fade-right" data-aos-anchor-placement="top-bottom"
                                data-aos-duration="1500">
                                <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                                <p class="sec-title__tagline">Get free online visa</p>
                            </div><!-- /.sec-title__top -->
                            <h2 class="sec-title__title bw-split-in-right">Get Professional Immigration
                                <span class='online-visa__highlight-text'>Guidance</span> From Our Experts.
                            </h2>
                            <!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <div class="online-visa__content__inner" data-aos="fade-up"
                            data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
                            <p class="online-visa__text">Our team of immigration specialists is ready to provide you
                                with comprehensive support and expert guidance tailored to your unique situation and
                                goals.</p>
                            <ul class="online-visa__list list-unstyled">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.7639 9.62873V16.5338C15.7639 16.7813 15.5609 16.982 15.3119 16.982H2.18281C1.93324 16.982 1.73078 16.7813 1.73078 16.5338V3.42709C1.73078 3.18025 1.93324 2.97892 2.18281 2.97892H10.4468L11.4481 2.22986H2.22102C1.53438 2.22986 0.976562 2.78455 0.976562 3.46591V16.495C0.976562 17.1764 1.53438 17.7311 2.22102 17.7311H15.2737C15.9597 17.7311 16.5181 17.1764 16.5181 16.495V8.62595L15.7639 9.62873Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M16.6438 2.22958C16.416 2.34118 16.1881 2.45286 15.9603 2.56446C15.4867 2.85216 15.0344 3.20982 14.6196 3.56915C12.9789 4.99064 11.9624 5.97829 10.659 7.75353C10.2198 8.35169 9.72596 8.89993 9.30514 9.52568C9.18686 9.6838 9.06854 9.842 8.95026 10.0001C8.93272 10.0048 8.91522 10.0094 8.89768 10.0141H8.88452C8.57011 8.94478 8.09944 7.87021 7.24155 7.37673C6.61667 7.01732 5.4696 7.59693 5.28311 8.06048C5.07198 8.58536 5.77936 9.51626 5.95346 9.8745C6.23221 10.4481 6.47292 11.0618 6.70268 11.6746C6.82671 12.0054 6.90557 12.5556 7.14956 12.763C7.39096 12.9682 7.71952 13.0004 8.06964 13.0979C8.37706 13.1834 8.95085 13.3262 9.26573 13.1397C9.62843 12.9249 10.2311 11.884 10.4881 11.4792C11.1529 10.4324 11.9582 9.50368 12.6831 8.52095C13.157 7.87853 13.8745 7.10021 14.4576 6.56735C15.3522 5.7497 15.4949 5.49044 16.4466 4.72732C16.9548 4.34126 17.4631 3.95513 17.9713 3.56911C18.2648 3.38771 18.5584 3.2063 18.8519 3.02489C18.932 2.95857 18.9472 2.82614 19.0228 2.75978C19.0036 2.2229 17.2724 2.21642 16.6438 2.22958Z" />
                                    </svg>
                                    Official PRK Immigration Consulting
                                </li>
                            </ul><!-- /.online-visa__list -->
                            <a href="{{ route('contact') }}" class="visanet-btn visanet-btn--black">
                                <span class="visanet-btn__icon-box">
                                    <span class="visanet-btn__icon"><span><i
                                                class="icon-arrow-right-3"></i></span></span>
                                </span>
                                <span class="visanet-btn__text">Get Consultation</span>
                            </a><!-- /.visanet-btn -->
                        </div><!-- /.online-visa__content__inner -->
                    </div><!-- /.online-visa__content -->
                </div><!-- /.col-xl-5 -->
            </div><!-- /.row -->
        </div><!-- /.online-visa__inner -->
    </div><!-- /.container -->
</section><!-- /.online-visa -->

<section class="newsletter-one">
    <div class="container">
        <div class="newsletter-one__wrapper" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
            data-aos-duration="1300">
            <div class="row gutter-y-40 align-items-center">
                <div class="col-lg-6">
                    <div class="newsletter-one__content">
                        <span class="newsletter-one__icon">
                            <i class="icon-email-3"></i>
                        </span><!-- /.newsletter-one__icon -->
                        <h3 class="newsletter-one__title">Sign Up For Our Newsletter</h3>
                        <!-- /.newsletter-one__title -->
                    </div><!-- /.newsletter-one__content -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-one__form">
                        @csrf
                        <input type="email" name="email" placeholder="Your Email" required>
                        <button type="submit" class="visanet-btn-two">SEND REQUEST <span
                                class="visanet-btn-two__icon"><i class="icon-paper-plane"></i></span></button>
                    </form><!-- /. mc-form -->
                    <div class="mc-form__response"></div><!-- /.mc-form__response -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.newsletter-one__wrapper -->
    </div><!-- /.container -->
</section><!-- /.newsletter-one -->

<!-- include the rest of the original sections (features, about, funfact, visa, training, gallery, services, call-to-action, team, testimonials, blog, newsletter) -->
@includeWhen(false,'')

@endsection