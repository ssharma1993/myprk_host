@extends('layouts.app')

@section('title','Testimonials')

@section('content')
<section class="section-space">
    <div class="container">
        <div class="sec-title text-center mb-5">
            <h2 class="sec-title__title">Client Testimonials</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Don't just take our word for it. Hear from our satisfied clients about their experiences with our
                immigration and visa services.
            </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="row g-4">
            @foreach($homeTestimonials as $testimonial)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm testimonial-card">
                    <div class="card-body">
                        <div class="mb-3">
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                            <small class="text-muted">(5.0)</small>
                        </div>

                        <p class="card-text mb-4">
                            "{{ $testimonial['text'] }}"
                        </p>

                        <div class="d-flex align-items-center">
                            <div class="testimonial-avatar-wrapper me-3">
                                <img src="{{ $testimonial['image'] }}" alt="{{ $testimonial['name'] }}"
                                    class="rounded-circle testimonial-avatar-img" width="50" height="50"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="testimonial-avatar-fallback" style="display: none;">
                                    {{ strtoupper(substr($testimonial['name'], 0, 1)) }}
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-0">{{ $testimonial['name'] }}</h6>
                                <small class="text-muted">{{ $testimonial['category'] }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- CTA Section -->
        <div class="mt-5 pt-5">
            <div class="cta-section rounded p-5 text-center text-white">
                <h3 class="cta-section__title mb-3">Ready to Start Your Journey?</h3>
                <p class="cta-section__description mb-4">Join thousands of satisfied clients who have successfully
                    achieved their immigration
                    goals.</p>
                <a href="{{ route('contact') }}" class="visanet-btn visanet-btn--white">
                    <span class="visanet-btn__icon-box">
                        <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                    </span>
                    <span class="visanet-btn__text">Get Free Consultation</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Modal for Detailed Testimonial -->
<div class="modal fade" id="testimonialModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Client Testimonial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img id="modalClientImage" src="" alt="" class="rounded-circle mb-3" width="80" height="80">
                    <h6 id="modalClientName"></h6>
                    <small id="modalClientCategory" class="text-muted"></small>
                </div>
                <div id="modalTestimonialContent"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .testimonial-card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 8px;
        min-height: 420px;
        display: flex;
        flex-direction: column;
    }

    .testimonial-card .card-body {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .testimonial-card .mb-3 {
        flex-shrink: 0;
    }

    .testimonial-card .card-text {
        min-height: 250px;
        flex-shrink: 0;
        display: -webkit-box;
        -webkit-line-clamp: 6;
        line-clamp: 6;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .testimonial-card .d-flex {
        flex-shrink: 0;
        margin-top: auto;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
    }

    .stat-box {
        padding: 30px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 10px;
        color: white;
        transition: transform 0.3s ease;
    }

    .stat-box:hover {
        transform: translateY(-5px);
    }

    .stat-box h3 {
        color: white;
    }

    .cta-section {
        background-color: #1d253a;
        position: relative;
        overflow: hidden;
        padding: 60px 40px !important;
        border-radius: 8px;
    }

    .cta-section__title {
        font-weight: 600;
        font-size: 32px;
        color: white;
        margin: 0 0 15px;
    }

    .cta-section__description {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.6;
        max-width: 800px;
        margin: 0 auto 30px;
    }

    .fa-star {
        font-size: 0.9rem;
    }
</style>
@endsection