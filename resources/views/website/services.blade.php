{{-- resources/views/website/services.blade.php --}}
@extends('layouts.website')

@section('title', 'Our Services - Kent Consultants Ltd')
@section('description', 'Comprehensive property management, project management, valuation, and consultancy services in Nairobi, Kenya.')

@section('content')
{{-- Page Header --}}
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge-gold">Our Services</span>
                <h1>Property Management Solutions</h1>
                <p class="lead">Comprehensive services designed to protect and maximize the value of your property investment.</p>
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

    <div class="container" data-aos="fade-up">
        <div class="row g-4">
            {{-- Property Management --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in">
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

            {{-- Project Management --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="100">
                    <h3>Project Management</h3>
                    <p>Professional project management for property development, renovations, and construction projects from start to finish.</p>
                    <ul class="service-features">
                        <li>✓ Planning and budgeting</li>
                        <li>✓ Contractor coordination</li>
                        <li>✓ Quality control</li>
                        <li>✓ Timeline management</li>
                    </ul>
                </div>
            </div>

            {{-- Property Valuation --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="200">
                    <h3>Property Valuation</h3>
                    <p>Accurate and professional property valuations for sales, purchases, insurance, and investment purposes.</p>
                    <ul class="service-features">
                        <li>✓ Market analysis</li>
                        <li>✓ Investment valuation</li>
                        <li>✓ Insurance valuation</li>
                        <li>✓ Sales and purchase valuation</li>
                    </ul>
                </div>
            </div>

            {{-- Property Consultancy --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="300">
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
                <div class="service-card" data-aos="zoom-in" data-aos-delay="400">
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
                <div class="service-card" data-aos="zoom-in" data-aos-delay="500">
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
                <div class="service-card" data-aos="zoom-in" data-aos-delay="600">
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
                <div class="service-card" data-aos="zoom-in" data-aos-delay="700">
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
                <div class="service-card" data-aos="zoom-in" data-aos-delay="800">
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
                <div class="service-card" data-aos="zoom-in" data-aos-delay="900">
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
<section class="why-kent-services section light-background">
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
                    <img src="{{ asset('images/services/team.jpg') }}" alt="Kent Consultants Team" class="img-fluid">
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

    <div class="container" data-aos="fade-up">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="process-step golden" data-aos="zoom-in">
                    <div class="step-number">01</div>
                    <h4>Consultation</h4>
                    <p>Understanding your property needs and objectives</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="process-step golden" data-aos="zoom-in" data-aos-delay="100">
                    <div class="step-number">02</div>
                    <h4>Assessment</h4>
                    <p>Evaluating your property and developing a management plan</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="process-step golden" data-aos="zoom-in" data-aos-delay="200">
                    <div class="step-number">03</div>
                    <h4>Implementation</h4>
                    <p>Executing the management plan with professionalism</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="process-step golden" data-aos="zoom-in" data-aos-delay="300">
                    <div class="step-number">04</div>
                    <h4>Reporting</h4>
                    <p>Transparent reporting and continuous improvement</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection