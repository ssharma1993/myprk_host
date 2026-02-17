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
            <!-- Testimonial 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm testimonial-card">
                    <div class="card-body">
                        <!-- Rating -->
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

                        <!-- Review Text -->
                        <p class="card-text mb-4">
                            "The team was incredibly professional and supportive throughout the entire visa process.
                            They answered all my questions and made everything so easy. My family and I are now safely
                            settled in Canada thanks to their expertise!"
                        </p>

                        <!-- Client Info -->
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50x50?text=JM" alt="James Miller"
                                class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">James Miller</h6>
                                <small class="text-muted">Family Visa (Canada)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm testimonial-card">
                    <div class="card-body">
                        <!-- Rating -->
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

                        <!-- Review Text -->
                        <p class="card-text mb-4">
                            "I was extremely worried about the skilled migration process, but this team made it so
                            straightforward. They guided me at every step and I got my work visa approved in just 4
                            months. Highly recommended!"
                        </p>

                        <!-- Client Info -->
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50x50?text=RP" alt="Rajesh Patel"
                                class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">Rajesh Patel</h6>
                                <small class="text-muted">Skilled Migration (Australia)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm testimonial-card">
                    <div class="card-body">
                        <!-- Rating -->
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

                        <!-- Review Text -->
                        <p class="card-text mb-4">
                            "Outstanding service! The consultants are knowledgeable, responsive, and really care about
                            their clients' success. They helped my daughter get her student visa and she's now thriving
                            at her university."
                        </p>

                        <!-- Client Info -->
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50x50?text=SJ" alt="Sarah Johnson"
                                class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">Sarah Johnson</h6>
                                <small class="text-muted">Student Visa (USA)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 4 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm testimonial-card">
                    <div class="card-body">
                        <!-- Rating -->
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

                        <!-- Review Text -->
                        <p class="card-text mb-4">
                            "As a business owner, I was uncertain about the complex visa sponsorship requirements for my
                            employees. Their consulting services were invaluable and helped streamline the entire
                            process for our company."
                        </p>

                        <!-- Client Info -->
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50x50?text=MC" alt="Maria Chen"
                                class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">Maria Chen</h6>
                                <small class="text-muted">Business Visa Consulting</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 5 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm testimonial-card">
                    <div class="card-body">
                        <!-- Rating -->
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

                        <!-- Review Text -->
                        <p class="card-text mb-4">
                            "I got my permanent residency! After years of struggling with immigration paperwork, this
                            team came through with flying colors. Their attention to detail and strategic approach made
                            all the difference."
                        </p>

                        <!-- Client Info -->
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50x50?text=AK" alt="Ahmed Khan"
                                class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">Ahmed Khan</h6>
                                <small class="text-muted">Permanent Residency (USA)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 6 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm testimonial-card">
                    <div class="card-body">
                        <!-- Rating -->
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

                        <!-- Review Text -->
                        <p class="card-text mb-4">
                            "From the initial consultation to the final approval, everything was handled with
                            professionalism and care. I felt confident at every stage of my visa application. Thank you
                            for making my dream come true!"
                        </p>

                        <!-- Client Info -->
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50x50?text=EL" alt="Emma Lopez"
                                class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">Emma Lopez</h6>
                                <small class="text-muted">Work Visa (UK)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 7 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm testimonial-card">
                    <div class="card-body">
                        <!-- Rating -->
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

                        <!-- Review Text -->
                        <p class="card-text mb-4">
                            "What impressed me most was their transparency and communication. They kept me informed
                            throughout the process and answered all my concerns promptly. Absolutely brilliant service!"
                        </p>

                        <!-- Client Info -->
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50x50?text=DN" alt="David Nwosu"
                                class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">David Nwosu</h6>
                                <small class="text-muted">Immigration Consulting</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 8 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm testimonial-card">
                    <div class="card-body">
                        <!-- Rating -->
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

                        <!-- Review Text -->
                        <p class="card-text mb-4">
                            "The expertise and professionalism shown by the team is unmatched. They took care of
                            everything and made the entire immigration process seamless. I couldn't have asked for
                            better support!"
                        </p>

                        <!-- Client Info -->
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50x50?text=OT" alt="Olivia Torres"
                                class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">Olivia Torres</h6>
                                <small class="text-muted">Family Visa (Australia)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 9 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm testimonial-card">
                    <div class="card-body">
                        <!-- Rating -->
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

                        <!-- Review Text -->
                        <p class="card-text mb-4">
                            "I recommend them to everyone! Their knowledge about different visa categories and
                            immigration laws is incredible. They helped me find the best visa option for my situation
                            and it worked perfectly."
                        </p>

                        <!-- Client Info -->
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50x50?text=PD" alt="Priya Desai"
                                class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">Priya Desai</h6>
                                <small class="text-muted">Skilled Migration (Canada)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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