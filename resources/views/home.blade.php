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
                    style="background-image: url(assets/images/backgrounds/toronto1.png);"></div>

                <img src="assets/images/shapes/hero-slider-shape-2-3.png" alt="shape" class="hero-slider-two__shape-2">
                <img src="assets/images/shapes/hero-slider-shape-2-4.png" alt="shape" class="hero-slider-two__shape-3">
                <img src="assets/images/shapes/hero-slider-shape-2-5.png" alt="shape" class="hero-slider-two__shape-4">
            </div><!-- /.hero-slider-two__bg-2 -->
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-10">
                        <div class="hero-slider-two__content">
                            <h2 class="hero-slider-two__title">
                                CICC Licensed<br> <span class="hero-slider-two__title__group"><span
                                        class="hero-slider-two__title__shape-1"><img
                                            src="assets/images/shapes/hero-slider-shape-2-2.png" alt="shape"></span>
                                    <span class="hero-slider-two__title__shape-2"></span> <span
                                        class="hero-slider-two__title__highlight">Immigration</span></span>
                                Consultants
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
                                    <span class="visanet-btn__text">Book Free Consultation</span>
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
                    style="background-image: url(assets/images/backgrounds/banff.png);"></div>

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

<section id="services" class="features">
    <div class="container">
        <!-- <div class="features__bg"></div>/.features__bg -->
        <br />
        <div class="sec-title sec-title--center">
            <div class="sec-title__top" style="padding-top:10px;" data-aos="fade-down"
                data-aos-anchor-placement="top-bottom" data-aos-duration="1500">
                <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                <br>
                <br>
                <p class="sec-title__tagline">Our Services </p>
                <span class="sec-title__icon sec-title__icon--right"><i class="icon-airplane-2"></i></span>
            </div><!-- /.sec-title__top -->
            <h2 class="sec-title__title bw-split-in-right">Explore our Immigration and Citizenship Services<br></h2>
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
                        <img src="{{ route('media.public', ltrim($service->image_path, '/')) }}"
                            alt="{{ $service->name }}">
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

                        </ul>

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
                            <h3 class="work-process__title"><a href="{{ route('contact') }}">Initial Consultation</a>
                            </h3>
                            <br />
                            <p class="work-process__text">Assess your immigration goals and eligibility with our expert
                                consultants.</p>
                            <div class="work-process__button">
                                <a href="{{ route('contact') }}" class="work-process__btn"><i
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
                            <h3 class="work-process__title"><a href="{{ route('contact') }}">Eligibility Assessment</a>
                            </h3>
                            <br />
                            <p class="work-process__text">Comprehensive review of your documents for completeness and
                                accuracy.</p>
                            <div class="work-process__button">
                                <a href="{{ route('contact') }}" class="work-process__btn"><i
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
                            <h3 class="work-process__title"><a href="{{ route('contact') }}">Application Review &
                                    Submission</a>
                            </h3>
                            <p class="work-process__text">Professional submission of your application to the appropriate
                                authorities.</p>
                            <div class="work-process__button">
                                <a href="{{ route('contact') }}" class="work-process__btn"><i
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
                            <h3 class="work-process__title"><a href="{{ route('contact') }}">Approval & Celebration</a>
                            </h3>
                            <p class="work-process__text">Receive your approval decision and begin your Canadian
                                immigration journey.</p>
                            <div class="work-process__button">
                                <a href="{{ route('contact') }}" class="work-process__btn"><i
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

<section class="fly-one section-space-t">
    <div class="fly-one__bg" style="background-image: url(assets/images/backgrounds/fly-bg.jpg);"></div>
    <div class="container">
        <div class="fly-one__content">
            <div class="fly-one__client">
                <div class="fly-one__client__images">
                </div>
            </div><!-- /.fly-one__client -->
            <div class="fly-one__card">
                <div class="fly-one__card__inner">
                    <h3 class="fly-one__form__title" style="color: #e31e24;">Get In Touch</h3>
                    <h3 class="fly-one__card__title">Ready to start your immigration journey?</h3>
                    <p class="fly-one__card__text"></p>
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert" style="margin-bottom: 16px;">
                        <ul class="mb-0" style="margin: 0; padding-left: 18px;">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST" class="fly-one__form__wrapper"
                        style="display: flex; flex-direction: column; gap: 14px; margin-top: 8px;">
                        @csrf
                        <div class="fly-one__form__group" style="width: 100%;">
                            <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}" required
                                class="fly-one__form__input form-control">
                        </div>
                        <div class="fly-one__form__group" style="width: 100%;">
                            <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}"
                                required class="fly-one__form__input form-control">
                        </div>
                        <div class="fly-one__form__group" style="width: 100%;">
                            <input type="tel" name="phone" placeholder="Phone Number (e.g. +14165551234)"
                                class="fly-one__form__input form-control" inputmode="tel" value="{{ old('phone') }}"
                                required>
                        </div>
                        <div class="fly-one__form__group" style="width: 100%;">
                            <textarea name="message" placeholder="Your Message" rows="4"
                                class="fly-one__form__textarea form-control" minlength="10"
                                required>{{ old('message') }}</textarea>
                        </div>
                        <div class="fly-one__form__group">
                            <button type="submit" class="visanet-btn">
                                <span class="visanet-btn__icon-box">
                                    <span class="visanet-btn__icon"><span><i
                                                class="icon-arrow-right-3"></i></span></span>
                                </span>
                                <span class="visanet-btn__text">Send Message</span>
                            </button>
                        </div>
                    </form>

                </div>
                <div class="fly-one__card__image">

                </div>
            </div><!-- /.fly-one__card -->
        </div><!-- /.fly-one__content -->
    </div><!-- /.container -->
    <img src="assets/images/shapes/fly-shape-1-1.png" alt="fly shape" class="fly-one__shape-1 airplane-animated">
    <div class="fly-one__shape-2"></div>
</section><!-- /.fly-one -->

<section class="funfact section-space-b">
    <div class="container">
        <div class="row gutter-y-30">
            <div class="col-lg-3 col-sm-6" data-aos="zoom-in" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1300" data-aos-delay="100">
                <div class="funfact__item">
                    <div class="funfact__item__content">
                        <div class="funfact__item__icon-box"><span class="funfact__item__icon"><i
                                    class="icon-satisfaction"></i></span></div>
                        <h3 class="funfact__item__count count-box"><span class="count-text" data-stop="874"
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
                        <h3 class="funfact__item__count count-box"><span class="count-text" data-stop="12"
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
                        <p class="funfact__item__title">Years of <br />Experience </p>
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
                        <h3 class="funfact__item__count count-box"><span class="count-text" data-stop="1468"
                                data-speed="1500">0</span><span>+</span></h3>
                        <p class="funfact__item__title">Success<br /> Stories</p>
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

<section class="home-testimonials section-space-b py-5">
    <div class="container">
        <div class="sec-title sec-title--center">
            <div class="sec-title__top" style="padding-top:20px;" data-aos="fade-down"
                data-aos-anchor-placement="top-bottom" data-aos-duration="1500">
                <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                <br>
                <br>
                <p class="sec-title__tagline pt6">Our Testimonials </p>
                <span class="sec-title__icon sec-title__icon--right"><i class="icon-airplane-2"></i></span>
            </div><!-- /.sec-title__top -->
            <h2 class="sec-title__title bw-split-in-right">Let's Explore What People Say <br> About Our Services </h2>
            <br>
            <!-- /.sec-title__title -->
        </div><!-- /.sec-title -->

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
                @php
                $avatarBgClasses = ['bg-primary', 'bg-success', 'bg-danger', 'bg-secondary', 'bg-dark'];
                $avatarClass = $avatarBgClasses[$loop->index % count($avatarBgClasses)];
                $avatarInitial = strtoupper(substr(trim($testimonial['name']), 0, 1));
                @endphp
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
                            <div
                                class="home-testimonials__avatar-img {{ $avatarClass }} d-flex align-items-center justify-content-center text-white fw-bold">
                                {{ $avatarInitial }}
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

<!-- /.licenses-certifications -->
<section class="licenses-certifications section-space-b"
    style="padding-top: 60px; padding-bottom: 60px; background-color: #ffffff;">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="sec-title" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="sec-title__title"
                        style="font-size: 36px; font-weight: 700; color: #1d253a; margin-bottom: 40px;">
                        Licenses &amp; Affiliations
                    </h2>
                </div>
            </div>
        </div><!-- /.row -->
        <div class="row justify-content-center align-items-center" data-aos="fade-up" data-aos-duration="1200">
            <div class="col-auto" style="padding: 15px 30px;">
                {{-- Place rcic-irb-logo.png in public/images/ --}}
                <img src="{{ asset('images/RCIC-IRB_EN_HORZ_CLR_POS.png') }}"
                    alt="RCIC-IRB – Regulated Canadian Immigration Consultant"
                    style="max-height: 150px; width: auto; object-fit: contain;">
            </div>
            <div class="col-auto" style="padding: 15px 30px;">
                {{-- Place cicc-ccic-logo.png in public/images/ --}}
                <img src="{{ asset('images/CICC_EF_HORZ_CLR_POS_TMMC_1000x326.webp') }}"
                    alt="CICC CCIC – College of Immigration and Citizenship Consultants"
                    style="max-height: 150px; width: auto; object-fit: contain;">
            </div>
        </div><!-- /.row logos -->
        <div class="row justify-content-center text-center" style="margin-top: 36px;" data-aos="fade-up"
            data-aos-duration="1300">
            <div class="col-lg-7">
                <h3 style="font-size: 24px; font-weight: 700; color: #1d253a; margin-bottom: 12px;">
                    Licensed by CICC LIC #R1053415
                </h3>
                <p style="font-size: 15px; color: #666; line-height: 1.7; margin-bottom: 28px;">
                    Licensed by Immigration Consultants of Canada Regulatory Council (ICCRC) –
                    CICC (College of Citizenship and Immigration Consultants)
                </p>
                <a href="https://college-ic.ca/protecting-the-public/find-an-immigration-consultant" target="_blank"
                    rel="noopener noreferrer" class="visanet-btn visanet-btn--black">
                    <span class="visanet-btn__icon-box">
                        <span class="visanet-btn__icon">
                            <span><i class="icon-arrow-right"></i></span>
                        </span>
                    </span>
                    <span class="visanet-btn__text">Click Here to Verify CICC Membership</span>
                </a>
            </div>
        </div><!-- /.row text -->
    </div><!-- /.container -->
</section><!-- /.licenses-certifications -->

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
