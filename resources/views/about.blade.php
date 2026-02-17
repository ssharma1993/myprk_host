@extends('layouts.app')

@section('title','About')

@section('content')
<!-- Hero Section -->
<section class="section-space" style="background-color: #1d253a; color: white;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold mb-4" style="color: white;">About PRK Immigration</h1>
                <p class="lead mb-4">
                    PRK Immigration is a trusted Canada-based immigration consulting firm dedicated to guiding
                    individuals and families through their journey to Canadian permanent residency, work permits, and
                    study visas.
                </p>
                <p class="mb-0">
                    With years of expertise in Canadian immigration law and a proven track record of successful cases,
                    we're committed to making your immigration dreams a reality.
                </p>
            </div>
            <div class="col-lg-6">
                <div
                    style="background: rgba(255,255,255,0.1); padding: 40px; border-radius: 10px; backdrop-filter: blur(10px);">
                    <h4 class="text-white mb-4">Our Core Values</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3"><strong>✓ Integrity</strong> - Transparent and honest guidance every step of
                            the way</li>
                        <li class="mb-3"><strong>✓ Excellence</strong> - Meticulous attention to detail in every
                            application</li>
                        <li class="mb-3"><strong>✓ Accessibility</strong> - Affordable services without compromising
                            quality</li>
                        <li class="mb-3"><strong>✓ Success</strong> - Dedicated to achieving positive outcomes for our
                            clients</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Company Overview Section -->
<section class="section-space">
    <div class="container">
        <div class="sec-title text-center mb-5">
            <h2 class="sec-title__title">Who We Are</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center">
                        <i class="fas fa-map-marked-alt"
                            style="font-size: 2.5rem; color: #0c63e4; margin-bottom: 20px;"></i>
                        <h5 class="card-title">Canada-Based Expertise</h5>
                        <p class="card-text text-muted">
                            Operating from major Canadian cities, we have in-depth knowledge of immigration offices,
                            processing centers, and regulatory requirements across Canada.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center">
                        <i class="fas fa-user-tie" style="font-size: 2.5rem; color: #0c63e4; margin-bottom: 20px;"></i>
                        <h5 class="card-title">Experienced Team</h5>
                        <p class="card-text text-muted">
                            Our consultants bring years of real-world experience in Canadian immigration, with deep
                            understanding of policy changes and application best practices.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center">
                        <i class="fas fa-handshake" style="font-size: 2.5rem; color: #0c63e4; margin-bottom: 20px;"></i>
                        <h5 class="card-title">Client-Focused Approach</h5>
                        <p class="card-text text-muted">
                            We treat every client as unique, crafting personalized immigration strategies tailored to
                            individual circumstances and goals.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="section-space" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h3 class="mb-4">Our Mission</h3>
                <p class="mb-3">
                    At PRK Immigration, our mission is to empower individuals and families to achieve their Canadian
                    immigration goals through expert guidance, transparent communication, and unwavering support.
                </p>
                <p class="mb-4">
                    We believe that everyone deserves access to quality immigration consulting services. We're committed
                    to making the complex immigration process more manageable, more affordable, and less stressful for
                    our clients around the world.
                </p>
                <h3 class="mb-4">Our Vision</h3>
                <p>
                    To be Canada's most trusted immigration consulting partner, known for our integrity, expertise, and
                    commitment to client success. We envision a Canada where qualified individuals and families,
                    regardless of their background, can realize their dreams of building a better life.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 10px; text-align: center;">
                            <h2 class="display-6 fw-bold mb-2">1000+</h2>
                            <p class="mb-0">Successful Cases</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 10px; text-align: center;">
                            <h2 class="display-6 fw-bold mb-2">95%</h2>
                            <p class="mb-0">Success Rate</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 10px; text-align: center;">
                            <h2 class="display-6 fw-bold mb-2">50+</h2>
                            <p class="mb-0">Countries Served</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 10px; text-align: center;">
                            <h2 class="display-6 fw-bold mb-2">10+</h2>
                            <p class="mb-0">Years Experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services We Specialize In -->
<section class="section-space">
    <div class="container">
        <div class="sec-title text-center mb-5">
            <h2 class="sec-title__title">What We Do</h2>
            <p class="text-muted">Comprehensive immigration solutions for every life stage and aspiration</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="d-flex gap-3 mb-4">
                    <div
                        style="flex-shrink: 0; width: 50px; height: 50px; background: #0c63e4; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                        1
                    </div>
                    <div>
                        <h5>Permanent Residency Applications</h5>
                        <p class="text-muted mb-0">Express Entry, Provincial Nominee Programs, Family Sponsorship, and
                            other pathways to Canadian permanent residency.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex gap-3 mb-4">
                    <div
                        style="flex-shrink: 0; width: 50px; height: 50px; background: #0c63e4; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                        2
                    </div>
                    <div>
                        <h5>Work Permits & Visas</h5>
                        <p class="text-muted mb-0">International Mobility Programs, LMIA requirements, and
                            employer-sponsored work permits for skilled workers.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex gap-3 mb-4">
                    <div
                        style="flex-shrink: 0; width: 50px; height: 50px; background: #0c63e4; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                        3
                    </div>
                    <div>
                        <h5>Study Permits</h5>
                        <p class="text-muted mb-0">Complete guidance for international students seeking to study at
                            Canadian institutions with post-graduation work permit benefits.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex gap-3 mb-4">
                    <div
                        style="flex-shrink: 0; width: 50px; height: 50px; background: #0c63e4; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                        4
                    </div>
                    <div>
                        <h5>Business Immigration</h5>
                        <p class="text-muted mb-0">Self-employed visas, business investment programs, and entrepreneur
                            pathways to Canadian residency.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex gap-3 mb-4">
                    <div
                        style="flex-shrink: 0; width: 50px; height: 50px; background: #0c63e4; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                        5
                    </div>
                    <div>
                        <h5>Post-Refusal Support</h5>
                        <p class="text-muted mb-0">Expert assistance for appeals, reconsiderations, and presenting
                            strong reapplications after visa rejections.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex gap-3 mb-4">
                    <div
                        style="flex-shrink: 0; width: 50px; height: 50px; background: #0c63e4; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                        6
                    </div>
                    <div>
                        <h5>Citizenship Preparation</h5>
                        <p class="text-muted mb-0">Guidance through the final steps to Canadian citizenship, including
                            test preparation and documentation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section-space" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="sec-title text-center mb-5">
            <h2 class="sec-title__title">Why Choose PRK Immigration</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center p-4">
                    <i class="fas fa-check-circle" style="font-size: 2rem; color: #0c63e4; margin-bottom: 15px;"></i>
                    <h5>Legal Compliance</h5>
                    <p class="text-muted">All our consultants stay current with IRCC regulations and immigration law to
                        ensure compliant applications.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center p-4">
                    <i class="fas fa-headset" style="font-size: 2rem; color: #0c63e4; margin-bottom: 15px;"></i>
                    <h5>Personal Support</h5>
                    <p class="text-muted">Direct communication with your consultant throughout the process, never just a
                        ticket number.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center p-4">
                    <i class="fas fa-bolt" style="font-size: 2rem; color: #0c63e4; margin-bottom: 15px;"></i>
                    <h5>Quick Turnaround</h5>
                    <p class="text-muted">Efficient processing and document preparation to meet all IRCC deadlines and
                        timelines.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center p-4">
                    <i class="fas fa-globe" style="font-size: 2rem; color: #0c63e4; margin-bottom: 15px;"></i>
                    <h5>Global Reach</h5>
                    <p class="text-muted">We serve clients from around the world with 24/7 availability and multilingual
                        support.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center p-4">
                    <i class="fas fa-graduation-cap" style="font-size: 2rem; color: #0c63e4; margin-bottom: 15px;"></i>
                    <h5>Expert Knowledge</h5>
                    <p class="text-muted">Continuous training and certification in Canadian immigration law and best
                        practices.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center p-4">
                    <i class="fas fa-dollar-sign" style="font-size: 2rem; color: #0c63e4; margin-bottom: 15px;"></i>
                    <h5>Transparent Pricing</h5>
                    <p class="text-muted">No hidden fees. Clear pricing structure with flexible payment options for all
                        budgets.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Client Success Stories Teaser -->
<section class="section-space">
    <div class="container">
        <div class="sec-title text-center mb-5">
            <h2 class="sec-title__title">Success Stories</h2>
            <p class="text-muted">Real results from real clients who trusted us with their immigration journey</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm">
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
                        <p class="card-text">
                            "PRK Immigration made my family sponsorship process incredibly smooth. Their attention to
                            detail and constant communication gave me peace of mind throughout."
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle"
                                style="width: 40px; height: 40px; background: #0c63e4; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; margin-right: 10px;">
                                MJ
                            </div>
                            <div>
                                <h6 class="mb-0">Maria & John</h6>
                                <small class="text-muted">Family Sponsorship - Approved</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm">
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
                        <p class="card-text">
                            "As a skilled worker from India, I was overwhelmed by the Express Entry process. PRK made it
                            simple and I got my PR approval in 6 months!"
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle"
                                style="width: 40px; height: 40px; background: #0c63e4; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; margin-right: 10px;">
                                RP
                            </div>
                            <div>
                                <h6 class="mb-0">Rajesh P.</h6>
                                <small class="text-muted">Express Entry - Approved</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm">
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
                        <p class="card-text">
                            "My visa was rejected initially, but PRK's post-refusal support helped me reapply with a
                            stronger application. I'm now in Canada!"
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle"
                                style="width: 40px; height: 40px; background: #0c63e4; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; margin-right: 10px;">
                                SA
                            </div>
                            <div>
                                <h6 class="mb-0">Sarah A.</h6>
                                <small class="text-muted">Student Visa - Approved</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('testimonials') }}" class="btn btn-primary btn-lg">
                Read More Testimonials
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-space" style="background-color: #1d253a; color: white;">
    <div class="container">
        <div class="text-center">
            <h2 class="display-5 fw-bold mb-4" style="color: white;">Ready to Start Your Canadian Immigration Journey?
            </h2>
            <p class="lead mb-5" style="max-width: 700px; margin-left: auto; margin-right: auto;">
                Let PRK Immigration guide you every step of the way. From the initial assessment to final approval,
                we're here to make your dream of living in Canada a reality.
            </p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
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

@endsection