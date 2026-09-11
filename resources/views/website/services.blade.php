{{-- resources/views/website/services.blade.php --}}
@extends('layouts.website')

@section('title', 'Our Services - Kent Consultants Ltd')
@section('description', 'Comprehensive property management, sales and leasing, and consultancy services in Nairobi, Kenya.')

@section('content')

<style>
/* ====================================================
   Services Page — Hero, Animated Background & Sections
==================================================== */

/* ---- Hero (background image, replaces old page-header) ---- */
.services-hero {
    position: relative;
    min-height: 55vh;
    display: flex;
    align-items: center;
    overflow: hidden;
    isolation: isolate;
}
.services-hero-bg {
    position: absolute;
    inset: 0;
    background-image: url('{{ asset('images/services/hero.jpg') }}');
    background-size: cover;
    background-position: center;
    z-index: -2;
    animation: heroKenBurns 22s ease-in-out infinite alternate;
    will-change: transform;
}
.services-hero-overlay {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(180deg, rgba(10,9,8,0.78) 0%, rgba(14,12,10,0.55) 45%, rgba(10,9,8,0.9) 100%),
        linear-gradient(120deg, rgba(166,124,0,0.18), transparent 55%);
    z-index: -1;
}
.services-hero .container { position: relative; z-index: 1; }
.services-hero h1 { color: var(--white); }
.services-hero .lead { color: rgba(255,255,255,0.85); }
@keyframes heroKenBurns {
    0%   { transform: scale(1) translate(0, 0); }
    100% { transform: scale(1.14) translate(-1%, -1%); }
}
@media (prefers-reduced-motion: reduce) {
    .services-hero-bg { animation: none; }
}

/* ---- Fixed page-wide animated background (was flat & dark, now layered) ---- */
.services-page-bg {
    position: fixed;
    inset: 0;
    z-index: -1;
    background: linear-gradient(135deg, #1c1611 0%, #2b2117 32%, #201a14 64%, #120e0a 100%);
    overflow: hidden;
}

/* drifting grid texture for depth */
.services-page-bg .grid-overlay {
    position: absolute;
    inset: -20%;
    background-image:
        linear-gradient(rgba(255, 215, 0, 0.05) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 215, 0, 0.05) 1px, transparent 1px);
    background-size: 56px 56px;
    animation: svcGridDrift 46s linear infinite;
}
@keyframes svcGridDrift {
    from { transform: translate(0, 0); }
    to   { transform: translate(56px, 56px); }
}

/* diagonal light sweep for movement/intrigue */
.services-page-bg .sweep {
    position: absolute;
    top: -60%;
    left: -30%;
    width: 55%;
    height: 220%;
    background: linear-gradient(100deg,
        transparent 0%,
        rgba(255, 215, 0, 0.07) 45%,
        rgba(255, 215, 0, 0.12) 50%,
        rgba(255, 215, 0, 0.07) 55%,
        transparent 100%);
    animation: svcSweep 11s ease-in-out infinite;
}
@keyframes svcSweep {
    0%, 100% { transform: translateX(0%) rotate(10deg); }
    50%      { transform: translateX(220%) rotate(10deg); }
}

/* glowing colour orbs — varied warm tones instead of one flat blur */
.services-page-bg span {
    position: absolute;
    border-radius: 50%;
    filter: blur(75px);
    animation: svcBgFloat 18s ease-in-out infinite;
}
.services-page-bg span:nth-child(3) {
    width: 480px; height: 480px; top: -140px; left: -110px;
    background: radial-gradient(circle, rgba(255, 215, 0, 0.20), transparent 70%);
    animation-duration: 20s;
}
.services-page-bg span:nth-child(4) {
    width: 330px; height: 330px; top: 38%; right: -100px;
    background: radial-gradient(circle, rgba(212, 160, 23, 0.18), transparent 70%);
    animation-duration: 15s; animation-delay: 3s;
}
.services-page-bg span:nth-child(5) {
    width: 260px; height: 260px; bottom: 6%; left: 14%;
    background: radial-gradient(circle, rgba(166, 124, 0, 0.16), transparent 70%);
    animation-duration: 17s; animation-delay: 6s;
}
.services-page-bg span:nth-child(6) {
    width: 220px; height: 220px; top: 55%; left: 48%;
    background: radial-gradient(circle, rgba(255, 235, 180, 0.12), transparent 70%);
    animation-duration: 23s; animation-delay: 1s;
}
.services-page-bg span:nth-child(7) {
    width: 300px; height: 300px; top: 8%; left: 58%;
    background: radial-gradient(circle, rgba(255, 178, 60, 0.14), transparent 70%);
    animation-duration: 26s; animation-delay: 4s;
}
@keyframes svcBgFloat {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33%      { transform: translate(45px, -55px) scale(1.15); }
    66%      { transform: translate(-35px, 40px) scale(0.9); }
}
@media (prefers-reduced-motion: reduce) {
    .services-page-bg .grid-overlay,
    .services-page-bg .sweep,
    .services-page-bg span { animation: none; }
}

/* Services overview section */
.services-page .services-overview {
    background: transparent;
    position: relative;
}
.services-page .services-overview::before {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(26, 23, 21, 0.85);
    backdrop-filter: blur(2px);
    -webkit-backdrop-filter: blur(2px);
}
.services-page .services-overview .container { position: relative; z-index: 1; }
.services-page .services-overview .section-title .subtitle { color: var(--gold-2); }
.services-page .services-overview .section-title h2 { color: var(--white); }
.services-page .services-overview .section-title p { color: rgba(255,255,255,0.65); }

/* Why Kent Services section */
.services-page .why-kent-services {
    background: transparent;
    position: relative;
}
.services-page .why-kent-services::before {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(15, 14, 12, 0.92);
    backdrop-filter: blur(3px);
    -webkit-backdrop-filter: blur(3px);
}
.services-page .why-kent-services .container { position: relative; z-index: 1; }
.services-page .why-kent-services h2,
.services-page .why-kent-services p { color: var(--white); }
.services-page .why-kent-services .feature-item span { color: rgba(255,255,255,0.8); }
.services-page .why-kent-services .feature-item i { color: var(--gold-2); }

/* Service process section */
.services-page .service-process {
    background: transparent;
    position: relative;
}
.services-page .service-process::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(26,23,21,0.9) 0%, rgba(10,9,8,0.95) 100%);
}
.services-page .service-process .container { position: relative; z-index: 1; }
.services-page .service-process .section-title .subtitle { color: var(--gold-2); }
.services-page .service-process .section-title h2 { color: var(--white); }
.services-page .service-process .section-title p { color: rgba(255,255,255,0.65); }

/* Service card entries are handled by AOS (fade-up) — no duplicate CSS animation needed */
</style>

{{-- Fixed animated background --}}
<div class="services-page-bg" aria-hidden="true">
    <div class="grid-overlay"></div>
    <div class="sweep"></div>
    <span></span><span></span><span></span><span></span><span></span>
</div>

<div class="services-page">

{{-- Hero Section (background image) --}}
<section class="services-hero" data-aos="fade-down">
    <div class="services-hero-bg" style="background-image: url('{{ asset('images/about/nairobi-city.jpg') }}');"></div>
    <div class="services-hero-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge-gold" data-aos="fade-up">Our Services</span>
                <h1 data-aos="fade-up" data-aos-delay="100">Property Management Solutions</h1>
                <p class="lead" data-aos="fade-up" data-aos-delay="200">Comprehensive services designed to protect and maximize the value of your property investment.</p>
            </div>
        </div>
    </div>
</section>

{{-- Services Overview --}}
<section class="services-overview section">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">What We Offer</span>
        <h2>Our Services</h2>
        <p>Expert property management services tailored to your specific needs</p>
    </div>

    <div class="container">
        <div class="row g-4">
            {{-- Property Management --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="fade-up" data-aos-delay="0">
                    <h3>Property Management</h3>
                    <p>Comprehensive management of residential and commercial properties including tenant relations, maintenance, and financial reporting.</p>
                    <ul class="service-features">
                        <li>✓ Tenant management</li>
                        <li>✓ Maintenance coordination</li>
                        <li>✓ Financial reporting</li>
                        <li>✓ Property inspections</li>
                    </ul>
                </div>
            </div>

            {{-- Sales & Leasing --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <h3>Sales &amp; Leasing</h3>
                    <p>Professional facilitation of property sales and lease agreements, connecting buyers, sellers, landlords and tenants with ease.</p>
                    <ul class="service-features">
                        <li>✓ Property marketing</li>
                        <li>✓ Buyer &amp; tenant sourcing</li>
                        <li>✓ Lease negotiation</li>
                        <li>✓ Sales documentation</li>
                    </ul>
                </div>
            </div>

            {{-- Property Consultancy --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="fade-up" data-aos-delay="0">
                    <h3>Property Consultancy</h3>
                    <p>Expert advice and guidance on property investments, market trends, and strategic property decisions.</p>
                    <ul class="service-features">
                        <li>✓ Investment advice</li>
                        <li>✓ Market analysis</li>
                        <li>✓ Strategic planning</li>
                        <li>✓ Risk assessment</li>
                    </ul>
                </div>
            </div>

            {{-- Rent Collection --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <h3>Rent Collection</h3>
                    <p>Efficient and transparent rent collection services with detailed reporting and timely remittance to property owners.</p>
                    <ul class="service-features">
                        <li>✓ Timely collection</li>
                        <li>✓ Transparent reporting</li>
                        <li>✓ Rent arrears management</li>
                        <li>✓ Digital payments</li>
                    </ul>
                </div>
            </div>

            {{-- Service Charge Collection --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                    <h3>Service Charge Collection</h3>
                    <p>Professional management and collection of service charges for common areas and shared amenities.</p>
                    <ul class="service-features">
                        <li>✓ Accurate billing</li>
                        <li>✓ Budget management</li>
                        <li>✓ Transparent accounting</li>
                        <li>✓ Compliance management</li>
                    </ul>
                </div>
            </div>

            {{-- Repair & Maintenance --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="fade-up" data-aos-delay="0">
                    <h3>Repair &amp; Maintenance</h3>
                    <p>Prompt and reliable maintenance services to keep your property in optimal condition for tenants and owners.</p>
                    <ul class="service-features">
                        <li>✓ Emergency repairs</li>
                        <li>✓ Preventative maintenance</li>
                        <li>✓ Vendor management</li>
                        <li>✓ Quality assurance</li>
                    </ul>
                </div>
            </div>

            {{-- Accounting & Financial Management --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <h3>Accounting &amp; Financial Management</h3>
                    <p>Comprehensive financial management including budgeting, cost analysis, audits, and management accounts.</p>
                    <ul class="service-features">
                        <li>✓ Budget preparation</li>
                        <li>✓ Cost analysis</li>
                        <li>✓ Financial reporting</li>
                        <li>✓ Tax compliance</li>
                    </ul>
                </div>
            </div>

            {{-- Legal/Compliance Support --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                    <h3>Legal/Compliance Support</h3>
                    <p>Expert legal support and compliance management for all property-related matters and regulatory requirements.</p>
                    <ul class="service-features">
                        <li>✓ Legal compliance</li>
                        <li>✓ Contract management</li>
                        <li>✓ Dispute resolution</li>
                        <li>✓ Regulatory compliance</li>
                    </ul>
                </div>
            </div>

            {{-- Property Operations --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="fade-up" data-aos-delay="0">
                    <h3>Property Operations</h3>
                    <p>Day-to-day property operations management including quality control, inspections, and service provider coordination.</p>
                    <ul class="service-features">
                        <li>✓ Operations management</li>
                        <li>✓ Quality control</li>
                        <li>✓ Service provider coordination</li>
                        <li>✓ Site inspections</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Why Kent for Services --}}
<section class="why-kent-services section">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="content">
                    <span class="badge-gold">Why Kent Consultants</span>
                    <h2>Your Trusted Property Management Partner</h2>
                    <p>
                        With over 15 years of experience, we provide comprehensive property management services
                        that protect and maximize the value of your investment.
                    </p>
                    <div class="feature-list">
                        <div class="feature-item">
                            <i class="bi bi-check-lg"></i>
                            <span>Experienced team of property professionals</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-lg"></i>
                            <span>Transparent and accountable management</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-lg"></i>
                            <span>Customized solutions for your property needs</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-lg"></i>
                            <span>Commitment to excellence and integrity</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="image-wrapper">
                    <img src="{{ asset('images/about/nairobi-city-2.png') }}" alt="Kent Consultants Team" class="img-fluid">
                    <div class="floating-card">
                        <div>
                            <span>Since</span>
                            <strong>2008</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Service Process --}}
<section class="service-process section">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">How We Work</span>
        <h2>Our Process</h2>
        <p>A structured approach to delivering exceptional property management services</p>
    </div>

    <div class="container">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="process-step golden" data-aos="fade-up" data-aos-delay="0">
                    <div class="step-number">01</div>
                    <h4>Consultation</h4>
                    <p>Understanding your property needs and objectives</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="process-step golden" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-number">02</div>
                    <h4>Assessment</h4>
                    <p>Evaluating your property and developing a management plan</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="process-step golden" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-number">03</div>
                    <h4>Implementation</h4>
                    <p>Executing the management plan with professionalism</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="process-step golden" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-number">04</div>
                    <h4>Reporting</h4>
                    <p>Transparent reporting and continuous improvement</p>
                </div>
            </div>
        </div>
    </div>
</section>

</div>{{-- .services-page --}}
@endsection