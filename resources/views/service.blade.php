@extends('layouts.app')

@section('title', $service->name)

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
                            <a href="{{ route('service.show', $item->id) }}"
                                class="{{ $item->id === $service->id ? 'active' : '' }}">
                                <span class="sidebar-one__list__icon"><i
                                        class="{{ $item->icon ?? 'icon-visa' }}"></i></span>
                                <span class="sidebar-one__list__text">{{ $item->name }}</span>
                            </a>
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
    </div>
</section>
@endsection