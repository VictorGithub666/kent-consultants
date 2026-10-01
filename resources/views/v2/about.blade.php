{{-- resources/views/v2/about.blade.php --}}
@extends('layouts.website2')

@section('title', 'About Us - Kent Consultants Ltd')
@section('description', 'Learn about Kent Consultants Ltd - professional property management in Nairobi, Kenya since 2008.')
@section('body_class', 'about-page')
@section('nav_about', 'active')

@section('content')

{{-- Page Header --}}
<div class="kc2-page-header">
    <div class="container text-center">
        <h1>About Us</h1>
        <p>Building Trust Since 2008</p>
    </div>
</div>

{{-- About / Story --}}
<section id="about" class="about section kc2-section-odd">

    <div class="container section-title" data-aos="fade-up">
        <h2>Our Story</h2>
        <p>Kent Consultants Ltd</p>
    </div>

    <div class="container">
        <div class="row gy-4">

            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                <p>
                    Kent Consultants Ltd is a professional Property Management Company dealing in Project Management,
                    Property Valuations, Consultancy and Management of both Residential and Commercial Properties since 2008.
                </p>
                <p>
                    Our journey began with a simple philosophy: deliver excellence in property management through
                    professionalism, integrity and a deep understanding of Kenya's real estate market.
                </p>
                <ul>
                    <li><i class="bi bi-check2-circle"></i> <span>Licensed and experienced property management professionals</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Transparent, accountable management with monthly reporting</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Customised, one-stop-shop solutions for every property need</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Deep knowledge of Kenya's residential and commercial markets</span></li>
                </ul>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center">
                    <img src="{{ asset('images/about/nairobi-city.jpg') }}" alt="Nairobi City" class="img-fluid rounded">
                </div>
            </div>

        </div>
    </div>

</section>

{{-- Mission Vision Values --}}
<section class="section kc2-section-even">

    <div class="container section-title" data-aos="fade-up">
        <h2>Foundation</h2>
        <p>Mission, Vision &amp; Values</p>
    </div>

    <div class="container">
        <div class="row gy-4">

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <div class="career-card kc2-float-card text-center h-100">
                    <div class="mb-3">
                        <i class="bi bi-bullseye" style="font-size:2.5rem;color:var(--kc2-gold)"></i>
                    </div>
                    <h3>Mission</h3>
                    <p>To offer professional and customized (one stop shop), Property Management solutions.</p>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="career-card kc2-float-card text-center h-100" style="background:var(--kc2-emerald); color:#fff; border-color:var(--kc2-gold);">
                    <div class="mb-3">
                        <i class="bi bi-eye" style="font-size:2.5rem;color:var(--kc2-gold)"></i>
                    </div>
                    <h3 style="color:#fff">Vision</h3>
                    <p style="color:rgba(255,255,255,0.85)">To be the premier provider of the highest standards of Property Management.</p>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="career-card kc2-float-card text-center h-100">
                    <div class="mb-3">
                        <i class="bi bi-heart" style="font-size:2.5rem;color:var(--kc2-gold)"></i>
                    </div>
                    <h3>Core Values</h3>
                    <ul class="list-unstyled mb-0">
                        <li><i class="bi bi-check2-circle text-kc2-gold me-1"></i> Team Spirit</li>
                        <li><i class="bi bi-check2-circle text-kc2-gold me-1"></i> Innovativeness</li>
                        <li><i class="bi bi-check2-circle text-kc2-gold me-1"></i> Professionalism</li>
                        <li><i class="bi bi-check2-circle text-kc2-gold me-1"></i> Integrity</li>
                        <li><i class="bi bi-check2-circle text-kc2-gold me-1"></i> Customer Focus</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

</section>

{{-- Departments --}}
<section class="section kc2-section-odd">

    <div class="container section-title" data-aos="fade-up">
        <h2>Structure</h2>
        <p>Our Departments</p>
    </div>

    <div class="container">
        <div class="row gy-4">

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                <div class="career-card kc2-float-card h-100">
                    <h3>Accounting</h3>
                    <ul class="list-unstyled mt-2">
                        <li><i class="bi bi-arrow-right-short text-kc2-gold"></i> Budget Preparations &amp; Cost Analysis</li>
                        <li><i class="bi bi-arrow-right-short text-kc2-gold"></i> Audits &amp; Management Accounts</li>
                        <li><i class="bi bi-arrow-right-short text-kc2-gold"></i> Service Charge &amp; Rental Invoicing</li>
                        <li><i class="bi bi-arrow-right-short text-kc2-gold"></i> Statutory Payments &amp; Compliance</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="career-card kc2-float-card h-100">
                    <h3>Administration</h3>
                    <ul class="list-unstyled mt-2">
                        <li><i class="bi bi-arrow-right-short text-kc2-gold"></i> Policy Implementation</li>
                        <li><i class="bi bi-arrow-right-short text-kc2-gold"></i> Security Firm Liaison &amp; SOPs</li>
                        <li><i class="bi bi-arrow-right-short text-kc2-gold"></i> Correspondence &amp; Communication</li>
                        <li><i class="bi bi-arrow-right-short text-kc2-gold"></i> Emergency &amp; Disaster Management</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="career-card kc2-float-card h-100">
                    <h3>Operations</h3>
                    <ul class="list-unstyled mt-2">
                        <li><i class="bi bi-arrow-right-short text-kc2-gold"></i> Day-to-Day Operations</li>
                        <li><i class="bi bi-arrow-right-short text-kc2-gold"></i> Quality Control &amp; Site Inspections</li>
                        <li><i class="bi bi-arrow-right-short text-kc2-gold"></i> Repairs &amp; Maintenance</li>
                        <li><i class="bi bi-arrow-right-short text-kc2-gold"></i> Service Provider Coordination</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

</section>

{{-- Why Choose Us --}}
<section class="section kc2-section-even">

    <div class="container section-title" data-aos="fade-up">
        <h2>Why Us</h2>
        <p>Why Choose Kent Consultants</p>
    </div>

    <div class="container">
        <div class="row gy-4 align-items-center">

            <div class="col-lg-6" data-aos="fade-right">
                <img src="{{ asset('images/about/nairobi-city-2.png') }}" alt="Nairobi" class="img-fluid rounded">
            </div>

            <div class="col-lg-6 content" data-aos="fade-left">
                <p>
                    With over 15 years of experience in the Kenyan property market, we understand the unique
                    challenges and opportunities that come with managing properties in Nairobi.
                </p>
                <ul>
                    <li><i class="bi bi-check2-circle"></i> <span>Local expertise and deep market knowledge</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>End-to-end property management solutions</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Trusted partner building lasting relationships</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Proven track record since 2008</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Transparent reporting and timely remittances</span></li>
                </ul>
                <a href="{{ route('v2.contact') }}" class="read-more mt-3">
                    <span>Get in Touch</span><i class="bi bi-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>

</section>

{{-- Team --}}
<section class="section kc2-section-odd">

    <div class="container section-title" data-aos="fade-up">
        <h2>Our Team</h2>
        <p>The People Behind Kent Consultants</p>
    </div>

    <div class="container">

        {{-- Directors --}}
        <h4 class="text-center mb-4 fw-semibold" style="color:var(--kc2-emerald)" data-aos="fade-up">Directors</h4>
        <div class="row gy-4 justify-content-center mb-5">

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="card border-0 shadow-sm h-100 text-center kc2-team-card">
                    <div class="card-body p-4">
                        <div class="kc2-team-avatar mx-auto mb-3">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <h5 class="card-title mb-1 fw-bold">John Doe</h5>
                        <p class="text-muted small mb-3">Director</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="https://www.linkedin.com/in/placeholder" target="_blank" rel="noopener"
                               class="btn btn-sm kc2-team-btn-linkedin">
                                <i class="bi bi-linkedin me-1"></i>LinkedIn
                            </a>
                            <a href="mailto:j.doe@kentconsultantsltd.co.ke"
                               class="btn btn-sm kc2-team-btn-email">
                                <i class="bi bi-envelope me-1"></i>Email
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100 text-center kc2-team-card">
                    <div class="card-body p-4">
                        <div class="kc2-team-avatar mx-auto mb-3">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <h5 class="card-title mb-1 fw-bold">Jane Smith</h5>
                        <p class="text-muted small mb-3">Director</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="https://www.linkedin.com/in/placeholder" target="_blank" rel="noopener"
                               class="btn btn-sm kc2-team-btn-linkedin">
                                <i class="bi bi-linkedin me-1"></i>LinkedIn
                            </a>
                            <a href="mailto:j.smith@kentconsultantsltd.co.ke"
                               class="btn btn-sm kc2-team-btn-email">
                                <i class="bi bi-envelope me-1"></i>Email
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- General Manager --}}
        <h4 class="text-center mb-4 fw-semibold" style="color:var(--kc2-emerald)" data-aos="fade-up">Management</h4>
        <div class="row gy-4 justify-content-center">

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="card border-0 shadow-sm h-100 text-center kc2-team-card">
                    <div class="card-body p-4">
                        <div class="kc2-team-avatar mx-auto mb-3">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <h5 class="card-title mb-1 fw-bold">Michael Otieno</h5>
                        <p class="text-muted small mb-3">General Manager</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="https://www.linkedin.com/in/placeholder" target="_blank" rel="noopener"
                               class="btn btn-sm kc2-team-btn-linkedin">
                                <i class="bi bi-linkedin me-1"></i>LinkedIn
                            </a>
                            <a href="mailto:m.otieno@kentconsultantsltd.co.ke"
                               class="btn btn-sm kc2-team-btn-email">
                                <i class="bi bi-envelope me-1"></i>Email
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

@endsection
