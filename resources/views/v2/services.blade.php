{{-- resources/views/v2/services.blade.php --}}
@extends('layouts.website2')

@section('title', 'Our Services - Kent Consultants Ltd')
@section('description', 'Comprehensive property management, sales, leasing and consultancy services in Nairobi, Kenya.')
@section('body_class', 'services-page')
@section('nav_services', 'active')

@section('content')

{{-- Page Header --}}
<div class="kc2-page-header">
    <div class="container text-center">
        <h1>Our Services</h1>
        <p>Comprehensive Property Management Solutions</p>
    </div>
</div>

{{-- Services Grid --}}
<section id="services" class="services section kc2-section-odd">

    <div class="container section-title" data-aos="fade-up">
        <h2>What We Offer</h2>
        <p>Expert Services Tailored to Your Needs</p>
    </div>

    <div class="container">
        <div class="row gy-4">

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-house-check"></i></div>
                    <h3>Property Management</h3>
                    <p>Comprehensive management of residential and commercial properties — tenant relations, maintenance coordination and detailed financial reporting.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-tags"></i></div>
                    <h3>Sales &amp; Leasing</h3>
                    <p>Professional facilitation of property sales and lease agreements, connecting buyers, sellers, landlords and tenants seamlessly.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-lightbulb"></i></div>
                    <h3>Property Consultancy</h3>
                    <p>Expert advice on property investments, market trends and strategic decisions to help you maximise returns on your portfolio.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-cash-coin"></i></div>
                    <h3>Rent Collection</h3>
                    <p>Efficient, transparent rent and service charge collection with detailed reporting and timely remittance to property owners.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-shield-check"></i></div>
                    <h3>Service Charge Collection</h3>
                    <p>Professional management and collection of service charges for common areas and shared amenities with clear accountability.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-tools"></i></div>
                    <h3>Repair &amp; Maintenance</h3>
                    <p>Prompt and reliable maintenance services keeping your property in optimal condition — from emergency repairs to preventative scheduling.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-calculator"></i></div>
                    <h3>Accounting &amp; Financial Management</h3>
                    <p>Comprehensive financial management including budget preparation, cost analysis, management accounts and statutory payments.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-file-earmark-text"></i></div>
                    <h3>Legal &amp; Compliance</h3>
                    <p>Expert legal support and compliance management for all property-related matters, contracts and regulatory requirements.</p>
                </div>
            </div>

        </div>
    </div>

</section>

{{-- Features Tabs —- Our Process --}}
<section class="features section light-background">

    <div class="container section-title" data-aos="fade-up">
        <h2>Our Process</h2>
        <p>How We Deliver Excellence</p>
    </div>

    <div class="container">
        <ul class="nav nav-tabs row d-flex" data-aos="fade-up" data-aos-delay="100">
            <li class="nav-item col-6 col-md-3">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#proc-1">
                    <i class="bi bi-chat-dots"></i>
                    <h4 class="d-none d-lg-block">01 Consultation</h4>
                </a>
            </li>
            <li class="nav-item col-6 col-md-3">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#proc-2">
                    <i class="bi bi-clipboard-check"></i>
                    <h4 class="d-none d-lg-block">02 Assessment</h4>
                </a>
            </li>
            <li class="nav-item col-6 col-md-3">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#proc-3">
                    <i class="bi bi-gear"></i>
                    <h4 class="d-none d-lg-block">03 Implementation</h4>
                </a>
            </li>
            <li class="nav-item col-6 col-md-3">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#proc-4">
                    <i class="bi bi-bar-chart"></i>
                    <h4 class="d-none d-lg-block">04 Reporting</h4>
                </a>
            </li>
        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

            <div class="tab-pane fade active show" id="proc-1">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                        <h3>Initial Consultation</h3>
                        <p class="fst-italic">We begin by understanding your property, your goals and your specific management needs.</p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>In-depth discussion of your property portfolio</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Understanding your investment objectives</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Identifying key challenges and opportunities</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="{{ asset('images/about/why-us.jpg') }}" alt="Consultation" class="img-fluid rounded">
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="proc-2">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                        <h3>Property Assessment</h3>
                        <p>We evaluate your property and develop a bespoke management plan aligned with your goals.</p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>On-site inspection and condition assessment</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Market analysis and rental benchmarking</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Customised management proposal</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="{{ asset('images/about/nairobi-city.jpg') }}" alt="Assessment" class="img-fluid rounded">
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="proc-3">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                        <h3>Professional Implementation</h3>
                        <p>Our experienced team executes the management plan with full professionalism and attention to detail.</p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>Tenant sourcing, vetting and onboarding</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Service provider appointment and supervision</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Day-to-day operational management</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="{{ asset('images/about/nairobi-city-2.png') }}" alt="Implementation" class="img-fluid rounded">
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="proc-4">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                        <h3>Transparent Reporting</h3>
                        <p>We keep you fully informed with regular, detailed reporting and continuous improvement of services.</p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>Monthly financial statements and management accounts</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Timely remittance of rental income</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Regular property condition reports</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="{{ asset('images/about/why-us.jpg') }}" alt="Reporting" class="img-fluid rounded">
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

{{-- CTA --}}
<section class="call-to-action section dark-background">
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="col-xl-9 text-center text-xl-start">
                <h3>Let Us Manage Your Property</h3>
                <p>Contact us today for a free, no-obligation consultation. Let Kent Consultants deliver the professional property management solution your investment deserves.</p>
            </div>
            <div class="col-xl-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{ route('v2.contact') }}">Get in Touch</a>
            </div>
        </div>
    </div>
</section>

@endsection
