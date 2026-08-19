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
                <div class="service-card featured" data-aos="zoom-in">
                    <div class="service-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <h3>Property Management</h3>
                    <p>Comprehensive management of residential and commercial properties including tenant relations, maintenance, and financial reporting.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check"></i> Tenant management</li>
                        <li><i class="bi bi-check"></i> Maintenance coordination</li>
                        <li><i class="bi bi-check"></i> Financial reporting</li>
                        <li><i class="bi bi-check"></i> Property inspections</li>
                    </ul>
                </div>
            </div>

            {{-- Project Management --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="100">
                    <div class="service-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <h3>Project Management</h3>
                    <p>Professional project management for property development, renovations, and construction projects from start to finish.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check"></i> Planning and budgeting</li>
                        <li><i class="bi bi-check"></i> Contractor coordination</li>
                        <li><i class="bi bi-check"></i> Quality control</li>
                        <li><i class="bi bi-check"></i> Timeline management</li>
                    </ul>
                </div>
            </div>

            {{-- Property Valuation --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <h3>Property Valuation</h3>
                    <p>Accurate and professional property valuations for sales, purchases, insurance, and investment purposes.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check"></i> Market analysis</li>
                        <li><i class="bi bi-check"></i> Investment valuation</li>
                        <li><i class="bi bi-check"></i> Insurance valuation</li>
                        <li><i class="bi bi-check"></i> Sales and purchase valuation</li>
                    </ul>
                </div>
            </div>

            {{-- Property Consultancy --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="300">
                    <div class="service-icon">
                        <i class="bi bi-lightbulb"></i>
                    </div>
                    <h3>Property Consultancy</h3>
                    <p>Expert advice and guidance on property investments, market trends, and strategic property decisions.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check"></i> Investment advice</li>
                        <li><i class="bi bi-check"></i> Market analysis</li>
                        <li><i class="bi bi-check"></i> Strategic planning</li>
                        <li><i class="bi bi-check"></i> Risk assessment</li>
                    </ul>
                </div>
            </div>

            {{-- Rent Collection --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="400">
                    <div class="service-icon">
                        <i class="bi bi-cash"></i>
                    </div>
                    <h3>Rent Collection</h3>
                    <p>Efficient and transparent rent collection services with detailed reporting and timely remittance to property owners.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check"></i> Timely collection</li>
                        <li><i class="bi bi-check"></i> Transparent reporting</li>
                        <li><i class="bi bi-check"></i> Rent arrears management</li>
                        <li><i class="bi bi-check"></i> Digital payments</li>
                    </ul>
                </div>
            </div>

            {{-- Service Charge Collection --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="500">
                    <div class="service-icon">
                        <i class="bi bi-receipt-cut"></i>
                    </div>
                    <h3>Service Charge Collection</h3>
                    <p>Professional management and collection of service charges for common areas and shared amenities.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check"></i> Accurate billing</li>
                        <li><i class="bi bi-check"></i> Budget management</li>
                        <li><i class="bi bi-check"></i> Transparent accounting</li>
                        <li><i class="bi bi-check"></i> Compliance management</li>
                    </ul>
                </div>
            </div>

            {{-- Repair & Maintenance --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="600">
                    <div class="service-icon">
                        <i class="bi bi-tools"></i>
                    </div>
                    <h3>Repair &amp; Maintenance</h3>
                    <p>Prompt and reliable maintenance services to keep your property in optimal condition for tenants and owners.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check"></i> Emergency repairs</li>
                        <li><i class="bi bi-check"></i> Preventative maintenance</li>
                        <li><i class="bi bi-check"></i> Vendor management</li>
                        <li><i class="bi bi-check"></i> Quality assurance</li>
                    </ul>
                </div>
            </div>

            {{-- Accounting & Financial Management --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="700">
                    <div class="service-icon">
                        <i class="bi bi-calculator"></i>
                    </div>
                    <h3>Accounting &amp; Financial Management</h3>
                    <p>Comprehensive financial management including budgeting, cost analysis, audits, and management accounts.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check"></i> Budget preparation</li>
                        <li><i class="bi bi-check"></i> Cost analysis</li>
                        <li><i class="bi bi-check"></i> Financial reporting</li>
                        <li><i class="bi bi-check"></i> Tax compliance</li>
                    </ul>
                </div>
            </div>

            {{-- Legal/Compliance Support --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="800">
                    <div class="service-icon">
                        <i class="bi bi-scale"></i>
                    </div>
                    <h3>Legal/Compliance Support</h3>
                    <p>Expert legal support and compliance management for all property-related matters and regulatory requirements.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check"></i> Legal compliance</li>
                        <li><i class="bi bi-check"></i> Contract management</li>
                        <li><i class="bi bi-check"></i> Dispute resolution</li>
                        <li><i class="bi bi-check"></i> Regulatory compliance</li>
                    </ul>
                </div>
            </div>

            {{-- Property Operations --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="900">
                    <div class="service-icon">
                        <i class="bi bi-gear"></i>
                    </div>
                    <h3>Property Operations</h3>
                    <p>Day-to-day property operations management including quality control, inspections, and service provider coordination.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check"></i> Operations management</li>
                        <li><i class="bi bi-check"></i> Quality control</li>
                        <li><i class="bi bi-check"></i> Service provider coordination</li>
                        <li><i class="bi bi-check"></i> Site inspections</li>
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
                        <div class="icon">
                            <i class="bi bi-award"></i>
                        </div>
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
                <div class="process-step" data-aos="zoom-in">
                    <div class="step-number">01</div>
                    <div class="step-icon">
                        <i class="bi bi-chat"></i>
                    </div>
                    <h4>Consultation</h4>
                    <p>Understanding your property needs and objectives</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="process-step" data-aos="zoom-in" data-aos-delay="100">
                    <div class="step-number">02</div>
                    <div class="step-icon">
                        <i class="bi bi-file-check"></i>
                    </div>
                    <h4>Assessment</h4>
                    <p>Evaluating your property and developing a management plan</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="process-step" data-aos="zoom-in" data-aos-delay="200">
                    <div class="step-number">03</div>
                    <div class="step-icon">
                        <i class="bi bi-gear"></i>
                    </div>
                    <h4>Implementation</h4>
                    <p>Executing the management plan with professionalism</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="process-step" data-aos="zoom-in" data-aos-delay="300">
                    <div class="step-number">04</div>
                    <div class="step-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <h4>Reporting</h4>
                    <p>Transparent reporting and continuous improvement</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection