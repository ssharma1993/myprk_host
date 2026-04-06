@extends('layouts.app')

@section('title', 'Terms and Conditions')
@section('meta_title', 'Terms and Conditions | ' . config('app.name', 'PRK Immigration'))
@section('meta_description', 'Read our terms and conditions governing the use of PRK Immigration services and website.')
@section('meta_keywords', 'terms and conditions, terms of service, legal terms, user agreement')

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
    <div class="container">
        <h2 class="page-header__title">Terms and Conditions</h2>
        <ul class="visanet-breadcrumb list-unstyled">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><span>Terms and Conditions</span></li>
        </ul>
    </div>
</section>

<!-- Terms and Conditions Content -->
<section class="section-space">
    <div class="container">
        <div class="row gutter-y-40">
            <div class="col-lg-8">
                <!-- Section Title -->
                <div class="sec-title">
                    <div class="sec-title__top">
                        <span class="sec-title__icon sec-title__icon--left"><i class="icon-document"></i></span>
                        <p class="sec-title__tagline">Legal Agreement</p>
                    </div>
                    <h2 class="sec-title__title">Terms and Conditions</h2>
                </div>

                <!-- Introduction -->
                <div class="privacy-intro mb-40">
                    <p>These Terms and Conditions govern your use of <strong>https://www.myprk.ca/</strong> website and the services offered by PRK Immigration. By accessing or using our website and services, you agree to abide by these terms.</p>
                </div>

                <!-- Section 1: Services Description -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">1. Services Description</h3>
                    <p class="mb-20">PRK Immigration provides professional immigration consulting and visa assistance services, including but not limited to:</p>
                    <ul class="privacy-list mb-20">
                        <li>Visa application guidance and preparation</li>
                        <li>Work permit and study permit counseling</li>
                        <li>Immigration eligibility assessment</li>
                        <li>Document preparation and review</li>
                        <li>Post-landing settlement services</li>
                    </ul>
                    <p><strong>Note:</strong> PRK Immigration is not a law firm and does not provide legal advice. For legal services, consult with a licensed immigration lawyer.</p>
                </div>

                <!-- Section 2: Client Obligations -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">2. Client Obligations</h3>
                    <p class="mb-20">As a client, you agree to:</p>
                    <ul class="privacy-list mb-20">
                        <li>Provide accurate and complete information for all consultations and services</li>
                        <li>Disclose all relevant personal and immigration history honestly</li>
                        <li>Follow all instructions and guidance provided by our consultants</li>
                        <li>Maintain confidentiality of advice provided during consultations</li>
                        <li>Pay all fees as per the agreed service agreement</li>
                        <li>Notify us of any changes to your circumstances that may affect your case</li>
                    </ul>
                </div>

                <!-- Section 3: Service Limitations and Disclaimers -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">3. Service Limitations and Disclaimers</h3>
                    <p class="mb-20">Please note the following limitations:</p>
                    <ul class="privacy-list mb-20">
                        <li>Success in visa applications is not guaranteed</li>
                        <li>Immigration policies and requirements may change without notice</li>
                        <li>Final decisions rest with immigration authorities</li>
                        <li>Our services do not include representation before immigration courts (unless legally authorized)</li>
                        <li>We are not responsible for delays or rejections by government agencies</li>
                    </ul>
                    <p><strong>By engaging our services, you acknowledge understanding these limitations.</strong></p>
                </div>

                <!-- Section 4: Fees and Payment Terms -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">4. Fees and Payment Terms</h3>
                    <p class="mb-20">Payment terms are as follows:</p>
                    <ul class="privacy-list mb-20">
                        <li>Fees are quoted at the time of service agreement</li>
                        <li>Payment is required as per the agreed schedule</li>
                        <li>Late payments may result in suspension of services</li>
                        <li>Refund policies are provided in individual service agreements</li>
                        <li>Additional services or changes may incur additional fees</li>
                    </ul>
                </div>

                <!-- Section 5: Intellectual Property Rights -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">5. Intellectual Property Rights</h3>
                    <p class="mb-20">All content on our website, including text, graphics, logos, and documents provided during consultations, are the property of PRK Immigration or used with permission. You may not:</p>
                    <ul class="privacy-list mb-20">
                        <li>Reproduce or distribute our content without permission</li>
                        <li>Use our materials for commercial purposes</li>
                        <li>Modify or create derivative works from our content</li>
                        <li>Share client-specific documents with unauthorized third parties</li>
                    </ul>
                </div>

                <!-- Section 6: Liability Limitations -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">6. Limitation of Liability</h3>
                    <p class="mb-20">To the maximum extent permitted by law:</p>
                    <ul class="privacy-list mb-20">
                        <li>PRK Immigration is not liable for indirect, incidental, or consequential damages</li>
                        <li>Our liability is limited to the fees paid for the specific service</li>
                        <li>We are not responsible for third-party actions or government decisions</li>
                        <li>Use of our website and services is at your own risk</li>
                    </ul>
                </div>

                <!-- Section 7: Termination of Services -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">7. Termination of Services</h3>
                    <p class="mb-20">Either party may terminate the service agreement with written notice. Upon termination:</p>
                    <ul class="privacy-list mb-20">
                        <li>All outstanding fees become immediately due</li>
                        <li>We will provide a summary of completed work</li>
                        <li>Client documents will be returned as per applicable regulations</li>
                        <li>Confidentiality obligations remain in effect</li>
                    </ul>
                </div>

                <!-- Section 8: Governing Law -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">8. Governing Law</h3>
                    <p>These Terms and Conditions are governed by the laws of Canada and the applicable provincial laws. Any disputes shall be resolved in the courts of jurisdiction where PRK Immigration operates.</p>
                </div>

                <!-- Section 9: Modifications to Terms -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">9. Modifications to Terms</h3>
                    <p>We may update these Terms and Conditions at any time. Changes become effective upon posting on our website. Your continued use of our services after posting updates constitutes acceptance of the new terms.</p>
                </div>

                <!-- Section 10: Contact Information -->
                <div class="privacy-content mb-40">
                    <h3 class="privacy-heading">10. Contact Us</h3>
                    <p class="mb-20">For questions regarding these Terms and Conditions or our services:</p>
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
                                <i class="icon-document"></i>
                            </div>
                            <h4 class="info-box__title">Professional Standards</h4>
                            <p class="info-box__text">We adhere to professional standards and regulatory requirements in all immigration consulting services.</p>
                        </div>
                    </div>

                    <!-- Contact Widget -->
                    <div class="sidebar__widget">
                        <div class="contact-card">
                            <h4 class="contact-card__title">Questions About Terms?</h4>
                            <p class="contact-card__text mb-20">Need clarification on our terms or services?</p>
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

    .info-box {
        background: linear-gradient(135deg, #0046a1 0%, #003d8a 100%);
        color: white;
        padding: 30px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 70, 161, 0.15);
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
        color: #0046a1;
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