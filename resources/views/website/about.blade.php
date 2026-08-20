{{-- resources/views/website/about.blade.php --}}
@extends('layouts.website')

@section('title', 'About Us - Kent Consultants Ltd')
@section('description', 'Learn about Kent Consultants Ltd - Professional property management, consultancy and real estate solutions in Nairobi, Kenya since 2008.')

@section('content')
{{-- Page Header --}}
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge-gold">About Us</span>
                <h1>Building Trust Since 2008</h1>
                <p class="lead">Professional property management, consultancy and real estate solutions designed to protect and maximize the value of your investment.</p>
            </div>
        </div>
    </div>
</section>

{{-- Company Introduction --}}
<section class="company-intro section">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="content">
                    <span class="badge-gold">Our Story</span>
                    <h2>Kent Consultants Ltd</h2>
                    <p>
                        Kent Consultants Ltd is a professional Property Management Company dealing in Project Management, 
                        Property Valuations, Consultancy and Management of both Residential and Commercial Properties since 2008.
                    </p>
                    <p>
                        Our journey began with a simple philosophy: to deliver excellence in property management through 
                        professionalism, integrity, and a deep understanding of the Kenyan real estate market.
                    </p>
                    <div class="stats-row">
                        <div class="stat-item">
                            <span class="number">15+</span>
                            <span class="label">Years of Excellence</span>
                        </div>
                        <div class="stat-item">
                            <span class="number">500+</span>
                            <span class="label">Properties Managed</span>
                        </div>
                        <div class="stat-item">
                            <span class="number">98%</span>
                            <span class="label">Client Satisfaction</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="ratio ratio-1x1">
                    <video autoplay muted loop playsinline>
                        <source src="{{ asset('videos/kent-video.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Mission Vision Values --}}
<section class="mission-vision section light-background">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">Our Foundation</span>
        <h2>Mission, Vision &amp; Values</h2>
        <p>Guiding principles that drive our commitment to excellence in property management</p>
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="mv-card" data-aos="fade-up">
                    <div class="mv-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h3>Mission</h3>
                    <p>To offer professional and customized (one stop shop), Property Management solutions.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mv-card gold" data-aos="fade-up" data-aos-delay="100">
                    <div class="mv-icon">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h3>Vision</h3>
                    <p>To be the premier provider of the highest standards of Property Management.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mv-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="mv-icon">
                        <i class="bi bi-heart"></i>
                    </div>
                    <h3>Core Values</h3>
                    <ul>
                        <li>Team Spirit</li>
                        <li>Innovativeness</li>
                        <li>Professionalism</li>
                        <li>Integrity</li>
                        <li>Customer Focus</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Key Activities --}}
<section class="key-activities section">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">What We Do</span>
        <h2>Our Key Activities</h2>
        <p>Comprehensive property management services tailored to your needs</p>
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="activity-card" data-aos="zoom-in">
                    <div class="activity-icon">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <h4>Rent Collection</h4>
                    <p>Efficient and transparent rent collection with detailed reporting and timely remittance.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="activity-card" data-aos="zoom-in" data-aos-delay="100">
                    <div class="activity-icon">
                        <i class="bi bi-receipt"></i>
                    </div>
                    <h4>Service Charge Collection</h4>
                    <p>Professional management of service charges with clear communication and accountability.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="activity-card" data-aos="zoom-in" data-aos-delay="200">
                    <div class="activity-icon">
                        <i class="bi bi-tools"></i>
                    </div>
                    <h4>Repair &amp; Maintenance</h4>
                    <p>Prompt and reliable maintenance services to keep your property in optimal condition.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="activity-card" data-aos="zoom-in" data-aos-delay="300">
                    <div class="activity-icon">
                        <i class="bi bi-calculator"></i>
                    </div>
                    <h4>Accounting</h4>
                    <p>Comprehensive financial management including budgeting, cost analysis, and audits.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="activity-card" data-aos="zoom-in" data-aos-delay="400">
                    <div class="activity-icon">
                        <i class="bi bi-scale"></i>
                    </div>
                    <h4>Legal/Compliance</h4>
                    <p>Expert legal support and compliance management for all property-related matters.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="activity-card" data-aos="zoom-in" data-aos-delay="500">
                    <div class="activity-icon">
                        <i class="bi bi-house"></i>
                    </div>
                    <h4>Property Management</h4>
                    <p>End-to-end property management services for residential and commercial properties.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Departments --}}
<section class="departments section light-background">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">Our Structure</span>
        <h2>Departments</h2>
        <p>Organized teams working together to deliver exceptional property management services</p>
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row g-4">
            {{-- Accounting Department --}}
            <div class="col-md-6 col-lg-4">
                <div class="department-card" data-aos="fade-up">
                    <div class="department-header">
                        <h4>Accounting</h4>
                    </div>
                    <ul>
                        <li>Budget Preparations</li>
                        <li>Cost Analysis</li>
                        <li>Audits</li>
                        <li>Service Charge, Utility and Rental Invoicing</li>
                        <li>Preparation of Management Accounts</li>
                        <li>Statutory Payments</li>
                        <li>Monthly Creditors Payment</li>
                        <li>Negotiation on AMCs</li>
                    </ul>
                </div>
            </div>

            {{-- Administration Department --}}
            <div class="col-md-6 col-lg-4">
                <div class="department-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="department-header">
                        <h4>Administration</h4>
                    </div>
                    <ul>
                        <li>Policy Implementation</li>
                        <li>Liaison with Security Firms and SOPs</li>
                        <li>Correspondence and Communication</li>
                        <li>Human Resource</li>
                        <li>Disaster and Emergency Management</li>
                    </ul>
                </div>
            </div>

            {{-- Operations Department --}}
            <div class="col-md-6 col-lg-4">
                <div class="department-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="department-header">
                        <h4>Operations</h4>
                    </div>
                    <ul>
                        <li>Coordinating with Property Managers</li>
                        <li>Day-to-Day Operations</li>
                        <li>Quality Control</li>
                        <li>Repairs and Maintenance</li>
                        <li>Liaison with Service Providers</li>
                        <li>Human Resource</li>
                        <li>Site Visits and Inspections</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Why Choose Us --}}
<section class="why-choose section">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="image-wrapper">
                    <img src="{{ asset('images/about/nairobi.jpg') }}" alt="Nairobi City" class="img-fluid">
                    <div class="gold-accent"></div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="content">
                    <span class="badge-gold">Why Choose Us</span>
                    <h2>Professional Property Management in Nairobi</h2>
                    <p>
                        With over 15 years of experience in the Kenyan property market, we understand the unique 
                        challenges and opportunities that come with managing properties in Nairobi and its environs.
                    </p>
                    <div class="features-list">
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h4>Local Expertise</h4>
                                <p>Deep understanding of the Nairobi property market</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h4>Comprehensive Services</h4>
                                <p>End-to-end property management solutions</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h4>Trusted Partner</h4>
                                <p>Building lasting relationships with property owners and tenants</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Geographic Location --}}
<section class="location section light-background">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center">
                <span class="badge-gold">Where We Operate</span>
                <h2>Nairobi &amp; Its Environs</h2>
                <p class="location-text">
                    We provide professional property management services across Nairobi and its surrounding areas.
                </p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="location-map">
                    <div class="map-placeholder">
                        <i class="bi bi-geo-alt"></i>
                        <span>Nairobi, Kenya</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection