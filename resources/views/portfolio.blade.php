@extends('layouts.app')

@section('title','Portfolio')

@section('content')
<section class="section-space">
    <div class="container">
        <div class="sec-title text-center mb-5">
            <h2 class="sec-title__title">Our Portfolio</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Explore our latest projects and case studies. We've successfully helped numerous clients achieve their
                immigration and visa goals.
            </p>
        </div>

        <!-- Portfolio Categories (Optional Filter) -->
        <div class="d-flex justify-content-center gap-2 mb-5 flex-wrap">
            <button class="btn btn-outline-primary btn-sm portfolio-filter" data-filter="all">All</button>
            <button class="btn btn-outline-primary btn-sm portfolio-filter" data-filter="visa">Visa Cases</button>
            <button class="btn btn-outline-primary btn-sm portfolio-filter"
                data-filter="immigration">Immigration</button>
            <button class="btn btn-outline-primary btn-sm portfolio-filter" data-filter="consulting">Consulting</button>
        </div>

        <!-- Portfolio Grid -->
        <div class="row g-4">
            <!-- Portfolio Item 1 -->
            <div class="col-lg-4 col-md-6 portfolio-item" data-category="visa">
                <div class="card h-100 shadow-sm portfolio-card">
                    <div class="portfolio-image-wrapper overflow-hidden">
                        <img src="/images/portfolio/family-visa.svg"
                            alt="Family Visa Application" class="card-img-top portfolio-image">
                        <div class="portfolio-overlay">
                            <button class="btn btn-light btn-sm" data-bs-toggle="modal"
                                data-bs-target="#portfolioModal1">
                                View Details
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Family Visa Application</h5>
                        <p class="card-text text-muted">Successfully processed family sponsorship visa for Australian
                            relocation.</p>
                        <small class="badge bg-primary">Visa Cases</small>
                    </div>
                </div>
            </div>

            <!-- Portfolio Item 2 -->
            <div class="col-lg-4 col-md-6 portfolio-item" data-category="immigration">
                <div class="card h-100 shadow-sm portfolio-card">
                    <div class="portfolio-image-wrapper overflow-hidden">
                        <img src="/images/portfolio/skilled-migration.svg" alt="Skilled Migration"
                            class="card-img-top portfolio-image">
                        <div class="portfolio-overlay">
                            <button class="btn btn-light btn-sm" data-bs-toggle="modal"
                                data-bs-target="#portfolioModal2">
                                View Details
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Skilled Migration Program</h5>
                        <p class="card-text text-muted">Guided software engineer through skilled migration visa process.
                        </p>
                        <small class="badge bg-info">Immigration</small>
                    </div>
                </div>
            </div>

            <!-- Portfolio Item 3 -->
            <div class="col-lg-4 col-md-6 portfolio-item" data-category="consulting">
                <div class="card h-100 shadow-sm portfolio-card">
                    <div class="portfolio-image-wrapper overflow-hidden">
                        <img src="/images/portfolio/business-visa.svg" alt="Business Visa"
                            class="card-img-top portfolio-image">
                        <div class="portfolio-overlay">
                            <button class="btn btn-light btn-sm" data-bs-toggle="modal"
                                data-bs-target="#portfolioModal3">
                                View Details
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Business Visa Consulting</h5>
                        <p class="card-text text-muted">Consulted on business immigration strategy for multinational
                            company.</p>
                        <small class="badge bg-success">Consulting</small>
                    </div>
                </div>
            </div>

            <!-- Portfolio Item 4 -->
            <div class="col-lg-4 col-md-6 portfolio-item" data-category="visa">
                <div class="card h-100 shadow-sm portfolio-card">
                    <div class="portfolio-image-wrapper overflow-hidden">
                        <img src="/images/portfolio/work-visa.svg" alt="Work Visa"
                            class="card-img-top portfolio-image">
                        <div class="portfolio-overlay">
                            <button class="btn btn-light btn-sm" data-bs-toggle="modal"
                                data-bs-target="#portfolioModal4">
                                View Details
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Work Visa Processing</h5>
                        <p class="card-text text-muted">Processed work permits for healthcare professionals in Canada.
                        </p>
                        <small class="badge bg-primary">Visa Cases</small>
                    </div>
                </div>
            </div>

            <!-- Portfolio Item 5 -->
            <div class="col-lg-4 col-md-6 portfolio-item" data-category="immigration">
                <div class="card h-100 shadow-sm portfolio-card">
                    <div class="portfolio-image-wrapper overflow-hidden">
                        <img src="/images/portfolio/permanent-residency.svg"
                            alt="Permanent Residency" class="card-img-top portfolio-image">
                        <div class="portfolio-overlay">
                            <button class="btn btn-light btn-sm" data-bs-toggle="modal"
                                data-bs-target="#portfolioModal5">
                                View Details
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Permanent Residency Application</h5>
                        <p class="card-text text-muted">Assisted family in securing permanent residency in United
                            States.</p>
                        <small class="badge bg-info">Immigration</small>
                    </div>
                </div>
            </div>

            <!-- Portfolio Item 6 -->
            <div class="col-lg-4 col-md-6 portfolio-item" data-category="consulting">
                <div class="card h-100 shadow-sm portfolio-card">
                    <div class="portfolio-image-wrapper overflow-hidden">
                        <img src="/images/portfolio/student-visa.svg" alt="Student Visa"
                            class="card-img-top portfolio-image">
                        <div class="portfolio-overlay">
                            <button class="btn btn-light btn-sm" data-bs-toggle="modal"
                                data-bs-target="#portfolioModal6">
                                View Details
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Student Visa Guidance</h5>
                        <p class="card-text text-muted">Helped 50+ students secure study visas for universities abroad.
                        </p>
                        <small class="badge bg-success">Consulting</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Detail Modals -->
<!-- Modal 1 -->
<div class="modal fade" id="portfolioModal1" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Family Visa Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img src="/images/portfolio/family-visa.svg" alt="Family Visa"
                    class="img-fluid mb-3">
                <h6>Project Overview</h6>
                <p>Successfully processed a family sponsorship visa for a client looking to relocate to Australia with
                    their dependents.</p>
                <h6>Challenges</h6>
                <ul>
                    <li>Complex documentation requirements</li>
                    <li>Processing delays during COVID-19</li>
                    <li>Multiple dependents with different needs</li>
                </ul>
                <h6>Solution</h6>
                <p>We compiled comprehensive documentation, coordinated with embassy officials, and maintained
                    consistent follow-ups resulting in approved visa in 6 months.</p>
                <h6>Result</h6>
                <p><strong>Status:</strong> Approved | <strong>Timeline:</strong> 6 Months | <strong>Family
                        Members:</strong> 4</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="portfolioModal2" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Skilled Migration Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img src="/images/portfolio/skilled-migration.svg" alt="Skilled Migration"
                    class="img-fluid mb-3">
                <h6>Project Overview</h6>
                <p>Guided a software engineer through the skilled migration visa process to work in Canada.</p>
                <h6>Key Achievements</h6>
                <ul>
                    <li>Successfully applied for work permit</li>
                    <li>Secured job offer from tech company</li>
                    <li>Expedited visa processing</li>
                </ul>
                <h6>Timeline</h6>
                <p>From initial consultation to visa approval: 4 months</p>
                <h6>Outcome</h6>
                <p><strong>Status:</strong> Approved | <strong>Position:</strong> Senior Developer |
                    <strong>Location:</strong> Toronto, Canada
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Modal 3 -->
<div class="modal fade" id="portfolioModal3" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Business Visa Consulting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img src="/images/portfolio/business-visa.svg" alt="Business Visa"
                    class="img-fluid mb-3">
                <h6>Project Overview</h6>
                <p>Provided comprehensive business immigration strategy consulting for a multinational company.</p>
                <h6>Services Provided</h6>
                <ul>
                    <li>Employee visa sponsorship planning</li>
                    <li>Immigration compliance review</li>
                    <li>Long-term residency strategy</li>
                </ul>
                <h6>Impact</h6>
                <p>Enabled company to successfully relocated 15 key employees and established international offices.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal 4 -->
<div class="modal fade" id="portfolioModal4" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Work Visa Processing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img src="/images/portfolio/work-visa.svg" alt="Work Visa"
                    class="img-fluid mb-3">
                <h6>Project Overview</h6>
                <p>Successfully processed work permits for healthcare professionals seeking opportunities in Canada.</p>
                <h6>Details</h6>
                <ul>
                    <li>Number of professionals assisted: 12</li>
                    <li>Success rate: 100%</li>
                    <li>Average processing time: 3 months</li>
                </ul>
                <h6>Outcome</h6>
                <p>All candidates secured positions in leading healthcare institutions across major Canadian cities.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal 5 -->
<div class="modal fade" id="portfolioModal5" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Permanent Residency Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img src="/images/portfolio/permanent-residency.svg" alt="Permanent Residency"
                    class="img-fluid mb-3">
                <h6>Project Overview</h6>
                <p>Assisted a family in securing permanent residency status in the United States.</p>
                <h6>Process Highlights</h6>
                <ul>
                    <li>EB-3 Green Card application</li>
                    <li>Labor certification obtained</li>
                    <li>Successful I-140 approval</li>
                </ul>
                <h6>Result</h6>
                <p><strong>Status:</strong> Permanent Resident | <strong>Green Card Approved</strong> | <strong>Family
                        Members:</strong> 3</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal 6 -->
<div class="modal fade" id="portfolioModal6" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Student Visa Guidance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img src="/images/portfolio/student-visa.svg" alt="Student Visa"
                    class="img-fluid mb-3">
                <h6>Project Overview</h6>
                <p>Comprehensive student visa guidance program helping 50+ students secure study visas for universities
                    abroad.</p>
                <h6>Destinations</h6>
                <ul>
                    <li>United States (F-1 Visa)</li>
                    <li>United Kingdom (Student Visa)</li>
                    <li>Canada (Study Permit)</li>
                    <li>Australia (Student Visa)</li>
                </ul>
                <h6>Success Metrics</h6>
                <p><strong>Total Students:</strong> 50+ | <strong>Success Rate:</strong> 98% |
                    <strong>Universities:</strong> Top-tier institutions worldwide
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    .portfolio-image-wrapper {
        position: relative;
        height: 300px;
        overflow: hidden;
        background-color: #f8f9fa;
    }

    .portfolio-image {
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .portfolio-card:hover .portfolio-image {
        transform: scale(1.05);
    }

    .portfolio-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .portfolio-card:hover .portfolio-overlay {
        opacity: 1;
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

    .portfolio-filter {
        transition: all 0.3s ease;
    }

    .portfolio-item {
        animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    // Filter functionality
    document.querySelectorAll('.portfolio-filter').forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');

            // Update active button
            document.querySelectorAll('.portfolio-filter').forEach(btn => {
                btn.classList.remove('btn-primary');
                btn.classList.add('btn-outline-primary');
            });
            this.classList.remove('btn-outline-primary');
            this.classList.add('btn-primary');

            // Filter items
            document.querySelectorAll('.portfolio-item').forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                    }, 10);
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection