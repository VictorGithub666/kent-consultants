{{-- resources/views/website/about.blade.php --}}
@extends('layouts.website')

@section('title', 'About Us - Kent Consultants Ltd')
@section('description', 'Learn about Kent Consultants Ltd - Professional property management, consultancy and real estate solutions in Nairobi, Kenya since 2008.')

@section('content')
<style>
    /* ============================================================
       ABOUT PAGE — LIVELY WITH DISTINCT SECTION BACKGROUNDS
    ============================================================ */

    /* ---- About Hero with Video Background ---- */
    .about-hero {
        position: relative;
        min-height: 55vh;
        display: flex;
        align-items: center;
        overflow: hidden;
        isolation: isolate;
    }
    .about-hero-bg {
        position: absolute;
        inset: 0;
        z-index: -2;
    }
    .about-hero-bg video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .about-hero-overlay {
        position: absolute;
        inset: 0;
        background:
            linear-gradient(180deg, rgba(10,9,8,0.78) 0%, rgba(14,12,10,0.55) 45%, rgba(10,9,8,0.9) 100%),
            linear-gradient(120deg, rgba(166,124,0,0.18), transparent 55%);
        z-index: -1;
    }
    .about-hero .container { position: relative; z-index: 1; }
    .about-hero h1 { color: var(--white); }
    .about-hero .lead { color: rgba(255,255,255,0.85); }

    /* ---- Feature items slide in from right ---- */
    .about-features .feature-item.slide-in-right {
        opacity: 0;
        transform: translateX(60px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .about-features .feature-item.slide-in-right.show {
        opacity: 1;
        transform: translateX(0);
    }

    /* ---- Stats with animated numbers ---- */
    .about-stats .stat-item .number {
        display: inline-block;
        background: var(--gold-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 3.5rem;
        font-weight: 700;
        font-family: var(--heading-font);
    }
    .about-stats .stat-item .label {
        display: block;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: rgba(255,255,255,0.7);
        margin-top: 5px;
    }

    /* ============================================================
       SECTION 1: INTRO — DARK BACKGROUND WITH GOLD BLOBS
    ============================================================ */
    .about-intro {
        background: linear-gradient(135deg, #1a1715 0%, #2d2a28 55%, #3a2f1f 100%);
        position: relative;
        overflow: hidden;
        padding: 100px 0;
    }
    .about-intro::before {
        content: '';
        position: absolute;
        inset: 0;
        z-index: 0;
        background:
            radial-gradient(circle at 15% 20%, rgba(255, 215, 0, 0.14) 0%, transparent 45%),
            radial-gradient(circle at 85% 80%, rgba(255, 215, 0, 0.10) 0%, transparent 50%);
        pointer-events: none;
    }
    .about-intro::after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 3px;
        background: var(--gold-gradient);
        z-index: 2;
    }
    .about-intro .bg-blob {
        position: absolute;
        border-radius: 50%;
        background: var(--gold-gradient);
        opacity: 0.15;
        filter: blur(60px);
        animation: aboutBlobFloat 14s ease-in-out infinite;
        pointer-events: none;
        z-index: 0;
    }
    .about-intro .bg-blob:nth-child(1) {
        width: 320px;
        height: 320px;
        top: -100px;
        left: -100px;
        animation-duration: 15s;
    }
    .about-intro .bg-blob:nth-child(2) {
        width: 240px;
        height: 240px;
        bottom: -80px;
        right: 4%;
        animation-duration: 11s;
        animation-delay: 2s;
    }
    .about-intro .bg-blob:nth-child(3) {
        width: 160px;
        height: 160px;
        top: 35%;
        right: -70px;
        animation-duration: 17s;
        animation-delay: 4s;
    }
    .about-intro .bg-blob:nth-child(4) {
        width: 120px;
        height: 120px;
        bottom: 20%;
        left: 8%;
        opacity: 0.10;
        animation-duration: 13s;
        animation-delay: 1s;
    }
    .about-intro .container {
        position: relative;
        z-index: 1;
    }
    .about-intro .content h2 {
        color: var(--white);
        background: var(--gold-gradient);
        background-size: 200% auto;
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: introTextShimmer 6s linear infinite;
    }
    .about-intro .content .lead {
        color: rgba(255, 255, 255, 0.78);
    }
    .about-intro .content p {
        color: rgba(255, 255, 255, 0.7);
    }
    @keyframes aboutBlobFloat {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -35px) scale(1.12); }
        66% { transform: translate(-25px, 25px) scale(0.92); }
    }
    @keyframes introTextShimmer {
        to { background-position: -200% center; }
    }

    /* ============================================================
       SECTION 2: STATS — DARK BACKGROUND (like homepage)
    ============================================================ */
    .about-stats {
        background: var(--charcoal);
        padding: 80px 0;
        border-bottom: 3px solid rgba(255, 215, 0, 0.15);
    }

    /* ============================================================
       SECTION 3: MISSION VISION — LIGHT BACKGROUND WITH GOLD ACCENTS
    ============================================================ */
    .about-mv {
        background: var(--off-white);
        padding: 80px 0;
        position: relative;
    }
    .about-mv::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 20% 15%, rgba(166, 124, 0, 0.05) 0%, transparent 45%),
            radial-gradient(circle at 80% 85%, rgba(166, 124, 0, 0.04) 0%, transparent 50%);
        pointer-events: none;
    }
    .about-mv .container {
        position: relative;
        z-index: 1;
    }

    .about-mv .mv-card {
        background: var(--white);
        padding: 40px;
        text-align: center;
        height: 100%;
        border-radius: 8px;
        box-shadow: 0 5px 25px rgba(166, 124, 0, 0.08);
        transition: all 0.4s ease;
        border: 1px solid rgba(166, 124, 0, 0.05);
        animation: mvPull 3.6s ease-in-out infinite;
    }
    .about-mv .mv-card:hover {
        transform: translateY(-16px) scale(1.06) !important;
        box-shadow: 0 22px 50px rgba(166, 124, 0, 0.25);
        animation-play-state: paused;
    }
    .about-mv .row > div:nth-child(1) .mv-card { animation-delay: 0s; }
    .about-mv .row > div:nth-child(2) .mv-card { animation-delay: 0.35s; }
    .about-mv .row > div:nth-child(3) .mv-card { animation-delay: 0.7s; }
    .about-mv .mv-card.gold {
        background: var(--gold-gradient);
        color: var(--charcoal);
        box-shadow: 0 5px 25px rgba(166, 124, 0, 0.2);
    }
    .about-mv .mv-card.gold:hover {
        box-shadow: 0 15px 50px rgba(166, 124, 0, 0.35);
    }
    .about-mv .mv-card.gold .mv-icon {
        color: var(--charcoal);
    }
    .about-mv .mv-card.gold p {
        color: rgba(26, 23, 21, 0.8);
    }
    .about-mv .mv-icon {
        font-size: 2.5rem;
        color: var(--gold-1);
        margin-bottom: 20px;
        display: inline-block;
        animation: mvIconPull 2s ease-in-out infinite;
    }
    @keyframes mvPull {
        0%, 50%, 100% { transform: translateY(0) scale(1); }
        25% { transform: translateY(-10px) scale(1.03); }
    }
    @keyframes mvIconPull {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    /* ============================================================
       SECTION 4: ACTIVITIES — DARK BACKGROUND WITH GOLD CARDS
    ============================================================ */
    .about-activities {
        background: var(--charcoal);
        padding: 80px 0;
        position: relative;
    }
    .about-activities::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 10% 20%, rgba(255, 215, 0, 0.08) 0%, transparent 40%),
            radial-gradient(circle at 90% 80%, rgba(255, 215, 0, 0.06) 0%, transparent 40%);
        pointer-events: none;
    }
    .about-activities .section-title .subtitle {
        color: var(--gold-2);
    }
    .about-activities .section-title h2 {
        color: var(--white);
    }
    .about-activities .section-title p {
        color: rgba(255, 255, 255, 0.65);
    }

    .about-activities .activity-card {
        background: var(--gold-gradient);
        color: var(--charcoal);
        padding: 35px 30px;
        border-radius: 8px;
        height: 100%;
        transition: all 0.4s ease;
        box-shadow: 0 5px 25px rgba(166, 124, 0, 0.15);
        position: relative;
        overflow: hidden;
        border: none;
    }
    .about-activities .activity-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        transform: rotate(45deg);
        transition: all 0.6s ease;
    }
    .about-activities .activity-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 45px rgba(166, 124, 0, 0.3);
    }
    .about-activities .activity-card:hover::before {
        transform: rotate(45deg) scale(1.5);
    }
    .about-activities .activity-card .activity-icon {
        display: none;
    }
    .about-activities .activity-card h4 {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: var(--charcoal);
        position: relative;
        z-index: 1;
    }
    .about-activities .activity-card p {
        font-size: 0.95rem;
        line-height: 1.7;
        color: rgba(26, 23, 21, 0.8);
        margin: 0;
        position: relative;
        z-index: 1;
    }

    /* ============================================================
       SECTION 5: DEPARTMENTS — LIGHT BACKGROUND
    ============================================================ */
    .about-departments {
        background: var(--off-white);
        padding: 80px 0;
    }
    .about-departments .department-card {
        background: var(--white);
        padding: 30px;
        border-radius: 8px;
        height: 100%;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.4s ease;
        border-top: 3px solid var(--gold-1);
    }
    .about-departments .department-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 35px rgba(0,0,0,0.1);
    }
    .about-departments .department-card .department-header h4 {
        font-size: 1.2rem;
        font-weight: 700;
        margin: 0 0 20px 0;
        color: var(--charcoal);
    }
    .about-departments .department-card ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .about-departments .department-card ul li {
        padding: 8px 0;
        padding-left: 20px;
        position: relative;
        font-size: 0.95rem;
        color: var(--text-muted);
        line-height: 1.6;
        border-bottom: 1px solid rgba(0,0,0,0.03);
    }
    .about-departments .department-card ul li:last-child {
        border-bottom: none;
    }
    .about-departments .department-card ul li::before {
        content: '▸';
        position: absolute;
        left: 0;
        color: var(--gold-1);
        font-weight: 700;
    }

    /* ============================================================
       SECTION 6: WHY CHOOSE US — DARK BACKGROUND WITH GOLD ACCENTS
    ============================================================ */
    .about-why {
        background: linear-gradient(135deg, #1a1715 0%, #2d2a28 55%, #3a2f1f 100%);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }
    .about-why::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 30% 20%, rgba(255, 215, 0, 0.10) 0%, transparent 45%),
            radial-gradient(circle at 70% 80%, rgba(255, 215, 0, 0.08) 0%, transparent 50%);
        pointer-events: none;
        z-index: 0;
    }
    .about-why::after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        height: 3px;
        background: var(--gold-gradient);
        z-index: 2;
    }
    .about-why .container {
        position: relative;
        z-index: 1;
    }
    .about-why .content h2 {
        color: var(--white);
    }
    .about-why .content p {
        color: rgba(255, 255, 255, 0.7);
    }
    .about-why .feature-item {
        opacity: 0;
        transform: translateX(60px);
        transition: opacity 0.6s ease, transform 0.6s ease;
        color: rgba(255, 255, 255, 0.9);
    }
    .about-why .feature-item.show {
        opacity: 1;
        transform: translateX(0);
    }
    .about-why .feature-item i {
        color: var(--gold-2);
        font-size: 1.5rem;
        flex-shrink: 0;
        margin-top: 3px;
    }
    .about-why .feature-item h4 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 2px;
        color: var(--white);
    }
    .about-why .feature-item p {
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.6);
        margin: 0;
    }
    .about-why .badge-gold {
        box-shadow: 0 0 0 0 rgba(255, 215, 0, 0.35);
        animation: badgePulse 2.5s ease-in-out infinite;
    }
    @keyframes badgePulse {
        0%, 100% { box-shadow: 0 0 0 0 rgba(166, 124, 0, 0.35); }
        50% { box-shadow: 0 0 0 9px rgba(166, 124, 0, 0); }
    }

    /* ---- Image Wrapper with gold accent ---- */
    .about-image-wrapper {
        position: relative;
    }
    .about-image-wrapper .gold-accent {
        position: absolute;
        bottom: -20px;
        right: -20px;
        width: 100px;
        height: 100px;
        background: var(--gold-gradient);
        z-index: -1;
    }
    .about-image-wrapper img {
        width: 100%;
        border-radius: 0;
    }

    /* ============================================================
       SECTION 7: LOCATION — LIGHT BACKGROUND
    ============================================================ */
    .about-location {
        background: var(--off-white);
        padding: 80px 0;
    }
    .about-location .location-text {
        font-size: 1.1rem;
        color: var(--text-muted);
        max-width: 600px;
        margin: 0 auto;
    }

    /* ---- Responsive tweaks ---- */
    @media (max-width: 768px) {
        .about-hero {
            min-height: 45vh;
        }
        .about-hero h1 {
            font-size: 2.2rem;
        }
        .about-stats .stat-item .number {
            font-size: 2.5rem;
        }
        .about-image-wrapper .gold-accent {
            width: 60px;
            height: 60px;
            bottom: -10px;
            right: -10px;
        }
        .about-intro {
            padding: 60px 0;
        }
        .about-intro .content h2 {
            font-size: 2rem;
        }
        .about-why .feature-item {
            transform: translateX(30px);
        }
    }
</style>

{{-- ============================================================
     SECTION 1: HERO — Video Background
============================================================ --}}
<section class="about-hero" data-aos="fade-down">
    <div class="about-hero-bg">
        <video autoplay muted loop playsinline>
            <source src="{{ asset('videos/kent-video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="about-hero-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge-gold" data-aos="fade-up" style="margin-top:70px">About Us</span>
                <h1 data-aos="fade-up" data-aos-delay="100">Building Trust Since 2008</h1>
                <p class="lead" data-aos="fade-up" data-aos-delay="200">
                    Professional property management, consultancy and real estate solutions designed to protect and maximize the value of your investment.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION 2: INTRO — Dark Background with Gold Blobs
============================================================ --}}
<section class="about-intro section">
    <div class="bg-blob"></div>
    <div class="bg-blob"></div>
    <div class="bg-blob"></div>
    <div class="bg-blob"></div>
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="content">
                    <span class="badge-gold" style="animation: badgePulse 2.5s ease-in-out infinite;">Our Story</span>
                    <h2>Kent Consultants Ltd</h2>
                    <p class="lead">
                        Kent Consultants Ltd is a professional Property Management Company dealing in Project Management, 
                        Property Valuations, Consultancy and Management of both Residential and Commercial Properties since 2008.
                    </p>
                    <p>
                        Our journey began with a simple philosophy: to deliver excellence in property management through 
                        professionalism, integrity, and a deep understanding of the Kenyan real estate market.
                    </p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="about-video-wrapper" style="position:relative; max-width:75%; aspect-ratio:4/4; border-radius:12px; overflow:hidden; border:3px solid var(--gold-2); box-shadow:0 15px 40px rgba(0,0,0,0.25);">
                    <video autoplay muted loop playsinline style="width:100%; height:100%; object-fit:cover; display:block;">
                        <source src="{{ asset('videos/kent-video.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>



{{-- ============================================================
     SECTION 4: MISSION VISION — Light Background
============================================================ --}}
<section id="mission-vision" class="mission-vision section mission-vision-styled" style="background: white">
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
                <div class="mv-card mv-card-animated" data-aos="fade-up" data-aos-delay="200">
                    <div class="mv-icon mv-icon-spin">
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

{{-- ============================================================
     SECTION 5: ACTIVITIES — Dark Background with Gold Cards
============================================================ --}}
<section class="about-activities section">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">What We Do</span>
        <h2>Our Key Services</h2>
        <p>Comprehensive property management services tailored to your needs</p>
    </div>

    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="activity-card" data-aos="fade-up" data-aos-delay="0">
                    <h4>Rent Collection</h4>
                    <p>Efficient and transparent rent collection with detailed reporting and timely remittance.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="activity-card" data-aos="fade-up" data-aos-delay="100">
                    <h4>Service Charge Collection</h4>
                    <p>Professional management of service charges with clear communication and accountability.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="activity-card" data-aos="fade-up" data-aos-delay="200">
                    <h4>Repair &amp; Maintenance</h4>
                    <p>Prompt and reliable maintenance services to keep your property in optimal condition.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="activity-card" data-aos="fade-up" data-aos-delay="0">
                    <h4>Accounting</h4>
                    <p>Comprehensive financial management including budgeting, cost analysis, and audits.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="activity-card" data-aos="fade-up" data-aos-delay="100">
                    <h4>Legal/Compliance</h4>
                    <p>Expert legal support and compliance management for all property-related matters.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="activity-card" data-aos="fade-up" data-aos-delay="200">
                    <h4>Property Management</h4>
                    <p>End-to-end property management services for residential and commercial properties.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION 6: DEPARTMENTS — Light Background
============================================================ --}}
<section class="about-departments section">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">Our Structure</span>
        <h2>Departments</h2>
        <p>Organized teams working together to deliver exceptional property management services</p>
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row g-4">
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

{{-- ============================================================
     SECTION 7: WHY CHOOSE US — Dark Background with Slide-in Features
============================================================ --}}
<section class="about-why section" id="about-why">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-image-wrapper">
                    <img src="{{ asset('images/about/nairobi-city-2.png') }}" alt="Nairobi City" class="img-fluid">
                    <div class="gold-accent"></div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="content">
                    <span class="badge-gold">Why Choose Us</span>
                    <h2>Professional Property Management in Kenya</h2>
                    <p>
                        With over 15 years of experience in the Kenyan property market, we understand the unique 
                        challenges and opportunities that come with managing properties in Nairobi and its environs.
                    </p>
                    <div class="features-list" id="why-us-features">
                        <div class="feature-item slide-in-right">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h4>Local Expertise</h4>
                                <p>Deep understanding of the Nairobi property market</p>
                            </div>
                        </div>
                        <div class="feature-item slide-in-right">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h4>Comprehensive Services</h4>
                                <p>End-to-end property management solutions</p>
                            </div>
                        </div>
                        <div class="feature-item slide-in-right">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h4>Trusted Partner</h4>
                                <p>Building lasting relationships with property owners and tenants</p>
                            </div>
                        </div>
                        <div class="feature-item slide-in-right">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h4>Since 2008</h4>
                                <p>Over 15 years of experience in the Kenyan property market</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION 8: LOCATION — Light Background
============================================================ --}}
<section class="about-location section">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center">
                <span class="badge-gold">Where We Operate</span>
                <h2>Kenya</h2>
                <p class="location-text">
                    We provide professional property management services across Kenya.
                </p>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // ============================================================
        // SLIDE-IN FEATURES FOR "WHY CHOOSE US"
        // ============================================================
        const whySection = document.getElementById('about-why');
        if (whySection) {
            const featureItems = whySection.querySelectorAll('#why-us-features .feature-item');
            let hasAnimated = false;

            function slideInFeatures() {
                if (hasAnimated) return;
                hasAnimated = true;
                featureItems.forEach(function (item, index) {
                    setTimeout(function () {
                        item.classList.add('show');
                    }, index * 250);
                });
            }

            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        slideInFeatures();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });

            observer.observe(whySection);
        }

        // ============================================================
        // STATS ANIMATION WITH PURE COUNTER
        // ============================================================
        if (typeof PureCounter !== 'undefined') {
            new PureCounter();
        }
    });
</script>
@endpush

@endsection