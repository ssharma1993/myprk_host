@extends('layouts.app')

@section('title','Resources')

@section('content')
<section class="section-space">
    <div class="container">
        <div class="sec-title text-center mb-5">
            <h2 class="sec-title__title">Immigration Resources</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Comprehensive guides, checklists, and documents to help you through your immigration journey.
                Download our resources and get ready for your visa application.
            </p>
        </div>

        <!-- Resource Categories Tabs -->
        <ul class="nav nav-tabs mb-5 justify-content-center" id="resourceTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="guides-tab" data-bs-toggle="tab" data-bs-target="#guides"
                    type="button" role="tab" aria-controls="guides" aria-selected="true">
                    Guides
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="checklists-tab" data-bs-toggle="tab" data-bs-target="#checklists"
                    type="button" role="tab" aria-controls="checklists" aria-selected="false">
                    Checklists
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents"
                    type="button" role="tab" aria-controls="documents" aria-selected="false">
                    Documents
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="timelines-tab" data-bs-toggle="tab" data-bs-target="#timelines"
                    type="button" role="tab" aria-controls="timelines" aria-selected="false">
                    Processing Times
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq"
                    type="button" role="tab" aria-controls="faq" aria-selected="false">
                    FAQ
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="resourceTabContent">
            <!-- Guides Tab -->
            <div class="tab-pane fade show active" id="guides" role="tabpanel" aria-labelledby="guides-tab">
                <div class="row g-4">
                    <!-- Guide 1 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm resource-card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-book text-primary" style="font-size: 2rem;"></i>
                                </div>
                                <h5 class="card-title">Complete Immigration Guide</h5>
                                <p class="card-text text-muted">A comprehensive guide covering all aspects of the
                                    immigration process, from initial assessment to final landing.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-download me-2"></i>Download PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Guide 2 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm resource-card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-passport text-success" style="font-size: 2rem;"></i>
                                </div>
                                <h5 class="card-title">Visa Types Explained</h5>
                                <p class="card-text text-muted">Detailed breakdown of different visa categories and
                                    eligibility requirements for each type of visa application.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-download me-2"></i>Download PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Guide 3 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm resource-card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-dollar-sign text-warning" style="font-size: 2rem;"></i>
                                </div>
                                <h5 class="card-title">Financial Requirements</h5>
                                <p class="card-text text-muted">Complete guide on financial requirements, proof of
                                    funds, and bank statements needed for your application.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-download me-2"></i>Download PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Guide 4 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm resource-card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-user-check text-info" style="font-size: 2rem;"></i>
                                </div>
                                <h5 class="card-title">Medical & Security Checks</h5>
                                <p class="card-text text-muted">Information about medical examinations, security
                                    clearances, and background checks required for your visa.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-download me-2"></i>Download PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Guide 5 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm resource-card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-language text-danger" style="font-size: 2rem;"></i>
                                </div>
                                <h5 class="card-title">Language Requirements</h5>
                                <p class="card-text text-muted">Guide on language proficiency tests, score
                                    requirements, and how to prepare for language assessments.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-download me-2"></i>Download PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Guide 6 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm resource-card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-file-alt" style="font-size: 2rem; color: #6c757d;"></i>
                                </div>
                                <h5 class="card-title">Document Preparation</h5>
                                <p class="card-text text-muted">Step-by-step instructions for organizing and
                                    preparing all required documents for your immigration file.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-download me-2"></i>Download PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Checklists Tab -->
            <div class="tab-pane fade" id="checklists" role="tabpanel" aria-labelledby="checklists-tab">
                <div class="row g-4">
                    <!-- Checklist 1 -->
                    <div class="col-lg-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Family Sponsorship Checklist</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><input type="checkbox" disabled> Completed sponsorship form
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Proof of relationship
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Financial documents
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Police certificates
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Medical examination
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Passport copies
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Affidavit of support
                                    </li>
                                    <li><input type="checkbox" disabled> Application fees paid</li>
                                </ul>
                                <a href="#" class="btn btn-sm btn-outline-primary mt-3">
                                    <i class="fas fa-download me-2"></i>Download Checklist
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Checklist 2 -->
                    <div class="col-lg-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0">Skilled Worker Visa Checklist</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><input type="checkbox" disabled> Skills assessment
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Language test results
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Work experience documents
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Educational credentials
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> References from employers
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Police certificate
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Medical exam results
                                    </li>
                                    <li><input type="checkbox" disabled> Proof of funds</li>
                                </ul>
                                <a href="#" class="btn btn-sm btn-outline-primary mt-3">
                                    <i class="fas fa-download me-2"></i>Download Checklist
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Checklist 3 -->
                    <div class="col-lg-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header" style="background-color: #ffc107; color: #000;">
                                <h5 class="mb-0">Student Visa Checklist</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><input type="checkbox" disabled> Acceptance letter from institution
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Proof of financial support
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Academic transcripts
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Language proficiency test
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Statement of purpose
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Medical examination
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Police clearance
                                    </li>
                                    <li><input type="checkbox" disabled> Travel documents</li>
                                </ul>
                                <a href="#" class="btn btn-sm btn-outline-primary mt-3">
                                    <i class="fas fa-download me-2"></i>Download Checklist
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Checklist 4 -->
                    <div class="col-lg-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header" style="background-color: #17a2b8; color: #fff;">
                                <h5 class="mb-0">Visitor Visa Checklist</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><input type="checkbox" disabled> Valid passport
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Invitation letter
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Proof of financial means
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Employment letter
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Travel itinerary
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Accommodation details
                                    </li>
                                    <li class="mb-2"><input type="checkbox" disabled> Travel insurance
                                    </li>
                                    <li><input type="checkbox" disabled> Completed visa application</li>
                                </ul>
                                <a href="#" class="btn btn-sm btn-outline-primary mt-3">
                                    <i class="fas fa-download me-2"></i>Download Checklist
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documents Tab -->
            <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                <div class="row g-4">
                    <!-- Document 1 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-file-word" style="font-size: 3rem; color: #2166ac;"></i>
                                <h5 class="card-title mt-3">Cover Letter Template</h5>
                                <p class="card-text text-muted small">Professional cover letter template for your
                                    immigration application.</p>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download me-2"></i>Download
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Document 2 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-file-word" style="font-size: 3rem; color: #2166ac;"></i>
                                <h5 class="card-title mt-3">Personal Statement Template</h5>
                                <p class="card-text text-muted small">Guide and template for writing a compelling
                                    personal statement.</p>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download me-2"></i>Download
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Document 3 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-file-word" style="font-size: 3rem; color: #2166ac;"></i>
                                <h5 class="card-title mt-3">Resume/CV Template</h5>
                                <p class="card-text text-muted small">Professionally formatted CV template tailored for
                                    visa applications.</p>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download me-2"></i>Download
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Document 4 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-file-pdf" style="font-size: 3rem; color: #d32f2f;"></i>
                                <h5 class="card-title mt-3">Affidavit Template</h5>
                                <p class="card-text text-muted small">Legal affidavit template for immigration
                                    applications.</p>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download me-2"></i>Download
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Document 5 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-file-excel" style="font-size: 3rem; color: #107c10;"></i>
                                <h5 class="card-title mt-3">Financial Worksheet</h5>
                                <p class="card-text text-muted small">Calculate and organize your financial
                                    documentation.</p>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download me-2"></i>Download
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Document 6 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-file-pdf" style="font-size: 3rem; color: #d32f2f;"></i>
                                <h5 class="card-title mt-3">Explanation Letter</h5>
                                <p class="card-text text-muted small">Template for writing explanation letters for any
                                    discrepancies.</p>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download me-2"></i>Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Processing Times Tab -->
            <div class="tab-pane fade" id="timelines" role="tabpanel" aria-labelledby="timelines-tab">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Visa Type</th>
                                <th>Standard Processing</th>
                                <th>Express Processing</th>
                                <th>Base Fees</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Family Sponsorship</strong></td>
                                <td>8-12 months</td>
                                <td>4-6 months</td>
                                <td>$475 CAD</td>
                            </tr>
                            <tr>
                                <td><strong>Skilled Worker (Federal)</strong></td>
                                <td>6-8 months</td>
                                <td>3-4 months</td>
                                <td>$550 CAD</td>
                            </tr>
                            <tr>
                                <td><strong>Skilled Worker (Provincial)</strong></td>
                                <td>4-6 months</td>
                                <td>2-3 months</td>
                                <td>$650 CAD</td>
                            </tr>
                            <tr>
                                <td><strong>Student Visa</strong></td>
                                <td>4-8 weeks</td>
                                <td>2-4 weeks</td>
                                <td>$150 CAD</td>
                            </tr>
                            <tr>
                                <td><strong>Visitor Visa</strong></td>
                                <td>2-4 weeks</td>
                                <td>1-2 weeks</td>
                                <td>$100 CAD</td>
                            </tr>
                            <tr>
                                <td><strong>Work Permit</strong></td>
                                <td>4-6 weeks</td>
                                <td>2-3 weeks</td>
                                <td>$275 CAD</td>
                            </tr>
                            <tr>
                                <td><strong>Permanent Residence</strong></td>
                                <td>12-24 months</td>
                                <td>6-12 months</td>
                                <td>$1,325 CAD</td>
                            </tr>
                            <tr>
                                <td><strong>Study Permit Extension</strong></td>
                                <td>2-4 weeks</td>
                                <td>1-2 weeks</td>
                                <td>$125 CAD</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="alert alert-info mt-4">
                    <strong>Note:</strong> Processing times are estimates and may vary depending on individual
                    circumstances, completeness of applications, and current government processing backlogs.
                </div>
            </div>

            <!-- FAQ Tab -->
            <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                <div class="accordion" id="faqAccordion">
                    <!-- FAQ 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq1">
                                How long does the visa application process take?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Processing times vary depending on the visa type. Family sponsorship typically takes
                                8-12 months, skilled worker programs 4-8 months, and student visas 4-8 weeks. These are
                                standard timelines and may vary based on individual circumstances.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq2">
                                What documents do I need for my visa application?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Required documents vary by visa type, but generally include: valid passport, completed
                                application forms, proof of financial support, medical examination results, police
                                certificates, educational and work credentials, and supporting documentation specific
                                to your visa category. Please download our visa-specific checklists for detailed
                                requirements.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq3">
                                Can I apply for multiple visa types simultaneously?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, you can apply for multiple visa categories simultaneously, but each application
                                must be complete and independent. However, we recommend focusing on the visa type that
                                best meets your immediate needs. Our consultants can help you determine the best
                                strategy for your situation.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq4">
                                What if my visa application is rejected?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                If your application is rejected, you have the right to appeal or reapply. The decision
                                letter will specify the reasons for rejection. In most cases, you can address the
                                issues and reapply. We provide post-refusal consultation services to help strengthen
                                your application for resubmission.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq5">
                                Do I need to take an English language test?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Language requirements depend on the visa type and destination country. Most skilled
                                worker and family sponsorship programs require proof of English proficiency through
                                tests like IELTS, TOEFL, or CELPIP. Some visa categories may exempt you if English is
                                your native language or you've completed your education in English.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 6 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq6">
                                How much does a visa application cost?
                            </button>
                        </h2>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Application fees vary by visa type. Student visas typically cost $150 CAD, work permits
                                $275 CAD, and family sponsorship $475 CAD. Permanent residence applications are $1,325
                                CAD. These fees are for government processing only and do not include our consultation
                                services. See our Processing Times table for more details.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 7 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq7">
                                What is a points-based immigration system?
                            </button>
                        </h2>
                        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Many countries use a points-based system to evaluate skilled worker applications. Points
                                are awarded based on factors like age, education, work experience, language proficiency,
                                and adaptability. To qualify, you must achieve the minimum points threshold. Our guides
                                provide detailed information on how points are calculated for different programs.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 8 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq8">
                                Can I work while my visa application is being processed?
                            </button>
                        </h2>
                        <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Work eligibility while your application is being processed depends on your visa type and
                                country regulations. Some visa categories allow open work permits, while others require a
                                separate work permit. Visitor visa holders typically cannot work. Contact us for guidance
                                specific to your situation.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="mt-5 pt-5">
            <div class="cta-section rounded p-5 text-center text-white">
                <h3 class="cta-section__title mb-3">Ready to Begin Your Application?</h3>
                <p class="cta-section__description mb-4">Our expert consultants are here to guide you through every
                    step
                    of the immigration process. Get personalized assistance tailored to your unique situation.</p>
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

<style>
    .resource-card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 8px;
        height: 100%;
    }

    .resource-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
    }

    .nav-tabs {
        border-bottom: 2px solid #e9ecef;
    }

    .nav-tabs .nav-link {
        color: #495057;
        border: none;
        border-bottom: 3px solid transparent;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .nav-tabs .nav-link:hover {
        color: #0d6efd;
        border-bottom-color: #0d6efd;
    }

    .nav-tabs .nav-link.active {
        color: #0d6efd;
        background: none;
        border-bottom-color: #0d6efd;
    }

    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #0d6efd;
    }

    .table-responsive {
        border-radius: 8px;
        overflow: hidden;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead {
        background-color: #f8f9fa;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
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
</style>
@endsection