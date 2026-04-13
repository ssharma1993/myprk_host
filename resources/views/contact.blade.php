@extends('layouts.app')

@section('title','Contact')

@section('content')
<section class="section-space contact-page">
    <div class="container">
        <div class="sec-title text-center">
            <div class="sec-title__top justify-content-center">
                <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                <p class="sec-title__tagline">Get In Touch</p>
            </div>
            <h2 class="sec-title__title">Contact Us</h2>
            <p>Ready to start your immigration journey?</p>
        </div>
        <div class="row gutter-y-30">
            <div class="col-lg-8">
                <div class="contact-page__form-card">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Please fix the following errors:</h4>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="post" class="contact-page__form">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="Your Name" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            placeholder="Your Email" value="{{ old('email') }}" required>
                        @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone"
                            placeholder="Your Phone Number (e.g. +14165551234)" value="{{ old('phone') }}"
                            inputmode="tel" required>
                        @error('phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                            placeholder="Message" rows="6" required>{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="visanet-btn">
                        <span class="visanet-btn__icon-box">
                            <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                        </span>
                        <span class="visanet-btn__text">Send Message</span>
                    </button>
                </form>
                </div>

                @if(isset($officeLocations) && $officeLocations->count() > 0)
                <div class="contact-page__locations mt-5">
                    <h4 class="contact-page__locations-title">Our Locations</h4>
                    <div class="row g-4">
                        @foreach($officeLocations as $officeLocation)
                        <div class="col-12">
                            <div class="footer-office-location h-100">
                                <h5 class="footer-office-location__name">{{ $officeLocation->name }}</h5>
                                <div class="footer-office-location__address">{!! nl2br(e($officeLocation->address)) !!}</div>
                                <div class="footer-office-location__map">
                                    <iframe src="{{ $officeLocation->google_map_embed_url }}" width="100%" height="220"
                                        class="contact-page__map-iframe" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                @if(!empty($officeLocation->google_map_url))
                                <a href="{{ $officeLocation->google_map_url }}" target="_blank" rel="noopener noreferrer"
                                    class="footer-office-location__link">Open in Google Maps</a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="contact-page__info-card">
                    <h4 class="contact-page__info-title">Contact Info</h4>
                    <p class="contact-page__info-text mb-2">Phone: {{ config('company.phone') }}</p>
                    <p class="contact-page__info-text mb-0">Email: {{ config('company.email') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection