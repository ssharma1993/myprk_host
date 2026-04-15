@extends('layouts.app')

@section('title', 'Services')
@section('meta_title', 'Services | ' . config('app.name', 'PRK Immigration'))
@section('meta_description', 'Explore our immigration and citizenship services offered by PRK Immigration.')
@section('meta_keywords', 'immigration services, visa services, canada immigration, PRK Immigration')

@section('content')
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
    <div class="container">
        <h2 class="page-header__title">Services</h2>
        <ul class="visanet-breadcrumb list-unstyled">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><span>Services</span></li>
        </ul>
    </div>
</section>

<section class="features section-space">
    <div class="container">
        <div class="sec-title sec-title--center">
            <div class="sec-title__top" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1500">
                <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                <p class="sec-title__tagline">Our Services</p>
                <span class="sec-title__icon sec-title__icon--right"><i class="icon-airplane-2"></i></span>
            </div>
            <h2 class="sec-title__title bw-split-in-right">Explore our Immigration and Citizenship Services</h2>
        </div>

        <div class="row gutter-y-30">
            @forelse($parentServices as $service)
            @php
            $isEven = $parentServices->count() % 2 === 0;
            $colClass = $isEven ? 'col-xl-6 col-md-6' : 'col-xl-4 col-md-6';
            @endphp
            <div class="{{ $colClass }}" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                data-aos-duration="1300" data-aos-delay="{{ 100 + ($loop->index * 100) }}">
                <div class="features__card" style="display: flex; flex-direction: column; height: 100%;">
                    <div class="features__image">
                        <img src="{{ route('media.public', ltrim($service->image_path, '/')) }}"
                            alt="{{ $service->name }}">
                    </div>
                    <div class="features__content" style="flex: 1; display: flex; flex-direction: column;">
                        <div class="features__icon-box">
                            <span class="features__icon"><i class="{{ $service->icon }}"></i></span>
                        </div>
                        <h2 class="features__title"><a
                                href="{{ route('service.show', $service->slug) }}">{{ $service->name }}</a></h2>
                        <p class="features__text" style="flex: 1;">{{ $service->description }}</p>

                        @if($service->children && count($service->children) > 0)
                        <div class="features__children">
                            @foreach($service->children as $child)
                            <a href="{{ route('service.show', $child->slug) }}" class="features__child-link">
                                {{ $child->name }}
                            </a><br />
                            @endforeach
                        </div>
                        @endif

                        <br />
                        <a href="{{ route('service.show', $service->slug) }}" class="features__btn">
                            Read More <span class="features__btn__icon"><i class="icon-arrow-right-up"></i></span>
                        </a>
                    </div>
                    <img src="assets/images/shapes/features-shape-1-1.png" alt="shape" class="features__shape">
                </div>
            </div>

            @if(($loop->index + 1) % ($isEven ? 2 : 3) === 0 || $loop->last)
        </div>
        <div class="row gutter-y-30">
            @endif
            @empty
            <div class="col-12">
                <p class="text-center mb-0">Services will be added soon.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
