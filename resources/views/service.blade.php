@extends('layouts.app')

@section('title', $service->name)
@section('meta_title', $service->name . ' | ' . config('app.name', 'PRK Immigration'))
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($service->description ?: $service->page_content), 160))
@section('meta_keywords', $service->name . ', immigration service, visa service, PRK Immigration')

@section('content')
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
    <div class="container">
        <h2 class="page-header__title">{{ $service->name }}</h2>
        <ul class="visanet-breadcrumb list-unstyled">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><span>Service</span></li>
            <li><span>{{ $service->name }}</span></li>
        </ul>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="row gutter-y-40">
            <div class="col-lg-8">
                <div class="sec-title">
                    <div class="sec-title__top">
                        <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                        <p class="sec-title__tagline">Service Details</p>
                    </div>
                    <h2 class="sec-title__title">{{ $service->name }}</h2>
                </div>

                @if($service->description)
                <p class="mb-3">{{ $service->description }}</p>
                @endif

                @if(!is_null($service->parent_id) && !empty($service->image_path))
                <div class="service-details__image mb-4">
                    <img src="{{ str_starts_with($service->image_path, 'http://') || str_starts_with($service->image_path, 'https://') ? $service->image_path : asset('storage/' . ltrim($service->image_path, '/')) }}"
                        alt="{{ $service->name }}" class="img-fluid rounded">
                </div>
                @endif

                <div class="service-details__content">
                    {!! nl2br(e($service->page_content)) !!}
                </div>

                <div class="mt-4">
                    <a href="{{ route('contact') }}" class="visanet-btn">
                        <span class="visanet-btn__icon-box">
                            <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                        </span>
                        <span class="visanet-btn__text">Book a Consultation</span>
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-one__item">
                    <h3 class="sidebar-one__title">Other Services</h3>
                    <ul class="sidebar-one__list list-unstyled">
                        @foreach($services as $item)
                        <li class="sidebar-one__list__item">
                            <a href="{{ route('service.show', $item->slug) }}"
                                class="{{ $item->slug === $service->slug ? 'active' : '' }}">
                                <span class="sidebar-one__list__icon"><i
                                        class="{{ $item->icon ?? 'icon-visa' }}"></i></span>
                                <span class="sidebar-one__list__text">{{ $item->name }}</span>
                            </a>
                            @if($item->children->count() > 0)
                            <ul class="sidebar-one__list sidebar-one__list--nested list-unstyled">
                                @foreach($item->children as $child)
                                <li class="sidebar-one__list__item" style="margin-left: 20px;">
                                    <a href="{{ route('service.show', $child->slug) }}"
                                        class="{{ $child->slug === $service->slug ? 'active' : '' }}">
                                        <span class="sidebar-one__list__icon"><i
                                                class="{{ $child->icon ?? 'icon-visa' }}"></i></span>
                                        <span class="sidebar-one__list__text">{{ $child->name }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="sidebar-one__item mt-4">
                    <div class="sidebar-one__cta">
                        <h4 class="sidebar-one__cta__title">Need help with your application?</h4>
                        <p class="sidebar-one__cta__text">Our experts will guide you step-by-step with clear advice and
                            document support.</p>
                        <a href="{{ route('contact') }}" class="visanet-btn visanet-btn--black">
                            <span class="visanet-btn__icon-box">
                                <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                            </span>
                            <span class="visanet-btn__text">Talk to an Expert</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gutter-y-30">
            @if(isset($childServices) && $childServices->count() > 0)
            <div class="mt-5">
                <div class="sec-title">
                    <div class="sec-title__top">
                        <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                        <p class="sec-title__tagline">Sub Services</p>
                    </div>
                    <h3 class="sec-title__title">Explore {{ $service->name }} Services</h3>
                </div>
            </div>

            @foreach($childServices as $childService)
            @php
            $isEven = $childServices->count() % 2 === 0;
            $colClass = $isEven ? 'col-xl-4 col-md-6' : 'col-xl-4 col-md-6';
            @endphp

            <div class="{{ $colClass }}" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1300" data-aos-delay="{{ 100 + ($loop->index * 100) }}">

                <div class="features__card" style="display: flex; flex-direction: column; height: 100%;">
                    <div class="features__image">
                        <img src="/storage/{{ $childService->image_path }}" alt="{{ $childService->name }}">
                    </div>
                    <div class="features__content" style="flex: 1; display: flex; flex-direction: column;">
                        <div class="features__icon-box">
                            <span class="features__icon"><i class="{{ $childService->icon }}"></i></span>
                        </div>
                        <h2 class="features__title"><a
                                href="{{ route('service.show', $childService->slug) }}">{{ $childService->name }}</a>
                        </h2>
                        <p class="features__text" style="flex: 1;">{{ $childService->description }}</p>
                        <a href="{{ route('service.show', $childService->slug) }}" class="features__btn">
                            Read More <span class="features__btn__icon"><i class="icon-arrow-right-up"></i></span>
                        </a>
                    </div>
                    <img src="assets/images/shapes/features-shape-1-1.png" alt="shape" class="features__shape">
                </div>
            </div>

            @if(($loop->index + 1) % ($isEven ? 3 : 3) === 0 || $loop->last)
        </div>
        <div class="row gutter-y-30">
            @endif
            @endforeach
            @endif
        </div>
</section>
@endsection