<section class="visa-two section-space visa-two--image-sticky">
    <div class="visa-two__bg visanet-jarallax" data-jarallax data-speed="0.3s"
        style="background-image: url(assets/images/backgrounds/visa-bg-2-1.jpg);">
        <img src="assets/images/shapes/visa-shape-2-1.png" alt="shape" class="visa-two__shape">
    </div><!-- /.visa-two__bg -->
    <div class="container">
        <div class="sec-title sec-title--dark sec-title--center">
            <div class="sec-title__top" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1500">
                <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                <p class="sec-title__tagline">Varieties of visa</p>
                <span class="sec-title__icon sec-title__icon--right"><i class="icon-airplane-2"></i></span>
            </div><!-- /.sec-title__top -->
            <h2 class="sec-title__title bw-split-in-right">Your Path to Canadian Immigration <br> Made Simple &
                Successful</h2><!-- /.sec-title__title -->
        </div><!-- /.sec-title -->
        <div class="row gutter-y-40 align-items-center">
            <div class="col-xl-5 visa-two__sticky-col">
                <div class="visa-two__images">
                    @foreach($featuredServices as $service)
                    <div class="visa-two__image{{ $loop->first ? ' active' : '' }}">
                        <img src="{{ route('media.public', ltrim($service->image_path, '/')) }}"
                            alt="{{ $service->name }}">
                    </div><!-- /.visa-two__image -->
                    @endforeach
                </div><!-- /.visa-two__images -->
            </div><!-- /.col-xl-5 -->
            <div class="col-xl-7">
                @foreach($featuredServices as $service)
                <div class="visa-two__item{{ $loop->first ? ' active' : '' }}" data-aos="fade-up"
                    data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
                    <div class="visa-two__item__overlay"></div>
                    <img src="assets/images/shapes/visa-shape-2-2.png" alt="shape" class="visa-two__item__shape">
                    <div class="visa-two__content">
                        <div class="visa-two__icon"><i class="{{ $service->icon }}"></i></div>
                        <h3 class="visa-two__title"><a
                                href="{{ route('service.show', $service->slug) }}">{{ $service->name }}</a></h3>
                        <span class="visa-two__divider">/</span>
                        <p class="visa-two__text">{{ $service->description }}</p>
                    </div>
                    <a href="{{ route('service.show', $service->slug) }}" class="visa-two__btn"><i
                            class="icon-arrow-right-up"></i></a>
                </div><!-- /.visa-two__item -->
                @endforeach
            </div><!-- /.col-xl-7 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.visa-two -->