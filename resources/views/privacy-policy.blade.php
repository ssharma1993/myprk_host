@extends('layouts.app')

@section('title', 'Privacy Policy')
@section('meta_title', 'Privacy Policy | ' . config('app.name', 'PRK Immigration'))
@section('meta_description', 'Read our privacy policy to understand how we collect, use, and protect your personal
information.')
@section('meta_keywords', 'privacy policy, data protection, personal information, confidentiality')

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
    <div class="container">
        <h2 class="page-header__title">Privacy Policy</h2>
        <ul class="visanet-breadcrumb list-unstyled">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><span>Privacy Policy</span></li>
        </ul>
    </div>
</section>

<!-- Privacy Policy Content -->
<section class="section-space">
    <div class="container">
        <div class="row gutter-y-40">
            <div class="col-lg-8">
                <!-- Section Title -->
                <div class="sec-title">
                    <div class="sec-title__top">
                        <span class="sec-title__icon sec-title__icon--left"><i class="icon-shield"></i></span>
                        <p class="sec-title__tagline">Your Privacy Matters</p>
                    </div>
                    <h2 class="sec-title__title">Privacy Policy</h2>
                </div>

                <!-- Introduction -->
                <div class="privacy-intro mb-40">
                    <p>This Privacy Policy describes how <strong>https://www.myprk.ca/</strong> collects, uses, and
                        protects your personal information when you use our services.</p>
                </div>

                <!-- Section 1: Information We Collect -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">1. Information We Collect</h3>
                    <p class="mb-20">We collect information that you voluntarily provide when you:</p>
                    <ul class="privacy-list mb-20">
                        <li>Fill out consultation forms</li>
                        <li>Contact us via email, phone, or website</li>
                        <li>Book a service or consultation</li>
                    </ul>
                    <p class="mb-20"><strong>This may include:</strong></p>
                    <ul class="privacy-list">
                        <li>Full name</li>
                        <li>Email address</li>
                        <li>Phone number</li>
                        <li>Passport or identification details (if required for services)</li>
                        <li>Educational and professional information</li>
                        <li>Any other details required for immigration consultation</li>
                    </ul>
                </div>

                <!-- Section 2: How We Use Your Information -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">2. How We Use Your Information</h3>
                    <p class="mb-20">We use your information to:</p>
                    <ul class="privacy-list mb-20">
                        <li>Provide immigration consultation and related services</li>
                        <li>Assess your eligibility for visas or programs</li>
                        <li>Respond to your inquiries</li>
                        <li>Communicate updates regarding your application or services</li>
                        <li>Improve our services</li>
                    </ul>
                    <p><strong>We do not sell or rent your personal information to any third party.</strong></p>
                </div>

                <!-- Section 3: Information Sharing -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">3. Information Sharing</h3>
                    <p class="mb-20">We may share your information only when necessary:</p>
                    <ul class="privacy-list mb-20">
                        <li>With authorized government bodies (e.g., immigration authorities)</li>
                        <li>With trusted partners involved in your application process</li>
                        <li>When required by law</li>
                    </ul>
                    <p>All data sharing is done securely and only for service-related purposes.</p>
                </div>

                <!-- Section 4: Your Rights & Control -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">4. Your Rights & Control</h3>
                    <p class="mb-20">You have full control over your personal data. You may:</p>
                    <ul class="privacy-list mb-20">
                        <li>Request access to your information</li>
                        <li>Ask us to update or correct your data</li>
                        <li>Request deletion of your data (subject to legal requirements)</li>
                        <li>Opt out of marketing communications</li>
                    </ul>
                    <p>To do so, contact us using the details below.</p>
                </div>

                <!-- Section 5: Data Security -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">5. Data Security</h3>
                    <p class="mb-20">We take appropriate security measures to protect your information:</p>
                    <ul class="privacy-list">
                        <li>Secure servers and encrypted data transmission (HTTPS)</li>
                        <li>Restricted access to authorized personnel only</li>
                        <li>Confidential handling of all client information</li>
                    </ul>
                </div>

                <!-- Section 6: Confidentiality of Client Information -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">6. Confidentiality of Client Information</h3>
                    <p>As a professional immigration consultancy, we maintain strict confidentiality of all client data
                        and documents shared with us. Your information is used solely for providing services and is
                        handled with the highest level of privacy.</p>
                </div>

                <!-- Section 7: Updates to This Policy -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">7. Updates to This Policy</h3>
                    <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page.</p>
                </div>

                <!-- Section 8: Contact Us -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">8. Contact Us</h3>
                    <p class="mb-20">If you have any questions or concerns regarding this Privacy Policy, please contact
                        us:</p>
                    <div class="contact-info-box">
                        <p class="mb-15">
                            <strong>📞 Phone:</strong>
                            <a href="tel:{{ config('company.phone_link') }}">{{ config('company.phone') }}</a>
                        </p>
                        <p>
                            <strong>📧 Email:</strong>
                            <a
                                href="mailto:{{ trim((string) config('company.email', 'info@myprk.ca')) }}">{{ trim((string) config('company.email', 'info@myprk.ca')) }}</a>
                        </p>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="mt-50">
                    <a href="{{ route('contact') }}" class="visanet-btn visanet-btn--black">
                        <span class="visanet-btn__icon-box">
                            <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                        </span>
                        <span class="visanet-btn__text">Have Questions?</span>
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <aside class="sidebar">
                    <!-- Quick Links Widget -->
                    <div class="sidebar__widget">
                        <h3 class="sidebar__title">Important Links</h3>
                        <ul class="list-unstyled sidebar-links">
                            <li><a href="{{ route('home') }}" class="sidebar-link"><span>Home</span><i
                                        class="icon-arrow"></i></a></li>
                            <li><a href="{{ route('about') }}" class="sidebar-link"><span>About Us</span><i
                                        class="icon-arrow"></i></a></li>
                            <li><a href="{{ route('contact') }}" class="sidebar-link"><span>Contact Us</span><i
                                        class="icon-arrow"></i></a></li>
                        </ul>
                    </div>

                    <!-- Info Box -->
                    <div class="sidebar__widget">
                        <div class="info-box">
                            <div class="info-box__icon">
                                <i class="icon-shield"></i>
                            </div>
                            <h4 class="info-box__title">Your Data is Safe</h4>
                            <p class="info-box__text">We encrypt all sensitive information and follow industry-leading
                                security standards.</p>
                        </div>
                    </div>

                    <!-- Contact Widget -->
                    <div class="sidebar__widget">
                        <div class="contact-card">
                            <h4 class="contact-card__title">Need Help?</h4>
                            <p class="contact-card__text mb-20">Have questions about our privacy practices?</p>
                            <a href="{{ route('contact') }}" class="visanet-btn visanet-btn--black">
                                <span class="visanet-btn__icon-box">
                                    <span class="visanet-btn__icon"><span><i
                                                class="icon-arrow-right-3"></i></span></span>
                                </span>
                                <span class="visanet-btn__text">Get in Touch</span>
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<style>
.privacy-intro {
    font-size: 1.1rem;
    color: #555;
    line-height: 1.8;
}

.privacy-content {
    margin-bottom: 2rem;
}

.privacy-heading {
    font-size: 1.3rem;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 1rem;
    border-left: 4px solid #0046a1;
    padding-left: 1rem;
}

.privacy-list {
    list-style: none;
    padding-left: 1.5rem;
}

.privacy-list li {
    margin-bottom: 0.8rem;
    color: #555;
    line-height: 1.6;
    position: relative;
}

.privacy-list li:before {
    content: "✓";
    position: absolute;
    left: -1.5rem;
    color: #0046a1;
    font-weight: bold;
}

.privacy-content p {
    color: #555;
    line-height: 1.8;
    margin-bottom: 1rem;
}

.contact-info-box {
    background: #f0f7ff;
    padding: 20px;
    border-radius: 6px;
    border-left: 4px solid #0046a1;
}

.contact-info-box p {
    margin-bottom: 1rem;
    color: #1a1a1a;
}

.contact-info-box a {
    color: #0046a1;
    text-decoration: none;
    font-weight: 500;
}

.contact-info-box a:hover {
    text-decoration: underline;
}

/* Sidebar Styles */
.sidebar {
    position: sticky;
    top: 100px;
}

.sidebar__widget {
    margin-bottom: 30px;
}

.sidebar__title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #0046a1;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid #0046a1;
}

.sidebar-links {
    padding: 0;
    margin: 0;
}

.sidebar-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 15px;
    color: #0046a1;
    text-decoration: none;
    background: #f0f7ff;
    border-radius: 4px;
    margin-bottom: 8px;
    transition: all 0.3s ease;
    border-left: 3px solid #0046a1;
    font-weight: 500;
}

.sidebar-link:hover {
    background: #0046a1;
    color: white;
    border-left-color: white;
    padding-left: 20px;
}

.sidebar-link i {
    font-size: 0.8rem;
    opacity: 0;
    transition: all 0.3s ease;
}

.sidebar-link:hover i {
    opacity: 1;
}

d8a 100%);
color: white;
padding: 30px;
border-radius: 8px;
text-align: center;
box-shadow: 0 4px 12px rgba(0, 70, 161, 0.15) border-radius: 8px;
text-align: center;
}

.info-box__icon {
    font-size: 2.5rem;
    margin-bottom: 15px;
}

.info-box__title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 10px;
}

.info-box__text {
    font-size: 0.95rem;
    line-height: 1.6;
    opacity: 0.95;
    margin: 0;
}

.contact-card {
    background: white;
    border: 2px solid #0046a1;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 70, 161, 0.08);
}

.contact-card__title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #0046a100;
    color: #1a1a1a;
    margin-bottom: 10px;
}

.contact-card__text {
    color: #555;
    font-size: 0.95rem;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .sidebar {
        position: static;
        top: auto;
    }

    .privacy-heading {
        font-size: 1.1rem;
    }
}
</style>
@endsection