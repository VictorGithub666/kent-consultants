{{-- resources/views/v2/index.blade.php --}}
@extends('layouts.website2')

@section('title', 'Kent Consultants Ltd - Property Management & Real Estate Nairobi')
@section('description', 'Professional property management, consultancy and real estate solutions in Nairobi, Kenya since 2008.')
@section('body_class', 'index-page')
@section('nav_home', 'active')

@section('content')

{{-- ============================================================
     HERO — Full-screen video background with animated text
============================================================ --}}
<section id="hero" class="hero section dark-background kc2-hero-video">

    {{-- Video Background --}}
    <div class="kc2-hero-video-wrap">
        <video class="kc2-hero-vid" autoplay muted loop playsinline poster="{{ asset('images/about/nairobi-city.jpg') }}">
            <source src="{{ asset('videos/hero-2.mp4') }}" type="video/mp4" media="(min-width: 769px)">
            <source src="{{ asset('videos/hero-mobile.mp4') }}" type="video/mp4">
        </video>
        <div class="kc2-hero-overlay"></div>
    </div>

    {{-- Hero Content --}}
    <div class="kc2-hero-content container text-center">
        <h2 class="animate__animated animate__fadeInDown">
            Property Management.<br><span>Investment. Value.</span>
        </h2>
        <p class="animate__animated animate__fadeInUp">
            Kent Consultants Ltd provides professional property management, valuation and consultancy services
            designed to protect and maximise the value of your investment across Nairobi and its environs.
        </p>
        <div class="kc2-hero-btns animate__animated animate__fadeInUp animate__delay-1s">
            <a href="{{ route('v2.contact') }}" class="btn-get-started">Talk to Us</a>
        </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none">
        <defs>
            <path id="kc2-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1"><use xlink:href="#kc2-wave" x="50" y="3"></use></g>
        <g class="wave2"><use xlink:href="#kc2-wave" x="50" y="0"></use></g>
        <g class="wave3"><use xlink:href="#kc2-wave" x="50" y="9"></use></g>
    </svg>

</section>

{{-- ============================================================
     ABOUT
============================================================ --}}
<section id="about" class="about section kc2-section-odd">

    <div class="container section-title" data-aos="fade-up">
        <h2>About Us</h2>
        <p>Who We Are</p>
    </div>

    <div class="container">
        <div class="row gy-4 align-items-center">

            <div class="col-lg-6 content" data-aos="fade-right" data-aos-delay="100">
                <p>
                    Kent Consultants Ltd is a professional Property Management Company dealing in Management of
                    both Residential and Commercial Properties, Property Valuations and Related Consultancies
                    since 2008.
                </p>
                <ul>
                    <li><i class="bi bi-check2-circle"></i>
                        <span>Licensed property managers with deep knowledge of the Nairobi market.</span>
                    </li>
                    <li><i class="bi bi-check2-circle"></i>
                        <span>Transparent, accountable management with monthly reporting to all owners.</span>
                    </li>
                    <li><i class="bi bi-check2-circle"></i>
                        <span>Customised, one-stop-shop solutions for every property management need.</span>
                    </li>
                </ul>
                <p data-aos="fade-up" data-aos-delay="200">
                    Our journey began with a simple philosophy: deliver excellence in property management through
                    professionalism, integrity and a deep understanding of Kenya's real estate market. Today we
                    manage residential estates, commercial buildings, towers and warehouses across Nairobi and
                    its environs.
                </p>
                <a href="{{ route('v2.about') }}" class="read-more" data-aos="fade-up" data-aos-delay="300">
                    <span>Read More</span><i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="kc2-about-video-wrap">
                    <video autoplay muted loop playsinline class="kc2-about-video">
                        <source src="{{ asset('videos/kent-video.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>

        </div>
    </div>

</section>

{{-- ============================================================
     FEATURES (Tabbed — Our Approach)
============================================================ --}}
<section id="features" class="features section light-background">

    <div class="container">

        <div class="container section-title" data-aos="fade-up">
            <h2>Our Approach</h2>
            <p>How We Work For You</p>
        </div>

        <ul class="nav nav-tabs row d-flex" data-aos="fade-up" data-aos-delay="100">
            <li class="nav-item col-6 col-md-3">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#feat-1">
                    <i class="bi bi-house-check"></i>
                    <h4 class="d-none d-lg-block">Property Management</h4>
                </a>
            </li>
            <li class="nav-item col-6 col-md-3">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#feat-2">
                    <i class="bi bi-graph-up-arrow"></i>
                    <h4 class="d-none d-lg-block">Valuation &amp; Consultancy</h4>
                </a>
            </li>
            <li class="nav-item col-6 col-md-3">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#feat-3">
                    <i class="bi bi-cash-coin"></i>
                    <h4 class="d-none d-lg-block">Financial Management</h4>
                </a>
            </li>
            <li class="nav-item col-6 col-md-3">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#feat-4">
                    <i class="bi bi-tools"></i>
                    <h4 class="d-none d-lg-block">Repair &amp; Maintenance</h4>
                </a>
            </li>
        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

            <div class="tab-pane fade active show" id="feat-1">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                        <h3>Comprehensive Property Management</h3>
                        <p class="fst-italic">
                            End-to-end management of residential and commercial properties, letting you focus on
                            your investment while we handle the day-to-day.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>Tenant sourcing, vetting and relations</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Rent and service charge collection with transparent reporting</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Regular property inspections and status updates</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Legal compliance and dispute resolution support</span></li>
                        </ul>
                        <a href="{{ route('v2.services') }}" class="read-more">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="{{ asset('images/about/property-management.jpg') }}" alt="Property Management" class="img-fluid rounded">
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="feat-2">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                        <h3>Property Valuation &amp; Consultancy</h3>
                        <p>
                            Accurate, professional valuations and expert investment advice to help you make
                            informed property decisions in Kenya's dynamic market.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>Sales, purchase &amp; insurance valuations</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Investment analysis and market research</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Strategic property planning and advisory</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Risk assessment for property portfolios</span></li>
                        </ul>
                        <a href="{{ route('v2.services') }}" class="read-more">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="{{ asset('images/about/consultancy.jpg') }}" alt="Valuation" class="img-fluid rounded">
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="feat-3">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                        <h3>Accounting &amp; Financial Management</h3>
                        <p>
                            Full-cycle financial management ensuring every shilling is accounted for and owners
                            receive timely, accurate reports.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>Budget preparation and cost analysis</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Monthly management accounts and statements</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Statutory compliance and tax remittances</span></li>
                        </ul>
                        <a href="{{ route('v2.services') }}" class="read-more">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="{{ asset('images/about/financial-management.jpg') }}" alt="Financial Management" class="img-fluid rounded">
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="feat-4">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                        <h3>Repair &amp; Maintenance</h3>
                        <p>
                            Prompt, reliable maintenance keeps your property in optimal condition and your tenants
                            satisfied — protecting your investment's long-term value.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>24/7 emergency repair response</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Preventative maintenance scheduling</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Vetted contractor and vendor management</span></li>
                        </ul>
                        <a href="{{ route('v2.services') }}" class="read-more">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="{{ asset('images/about/repair-maintenance.jpg') }}" alt="Maintenance" class="img-fluid rounded">
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

{{-- ============================================================
     CALL TO ACTION
============================================================ --}}
<section id="call-to-action" class="call-to-action section dark-background">
    <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-xl-9 text-center text-xl-start">
                <h3>Ready to Maximise Your Property's Value?</h3>
                <p>
                    Let Kent Consultants Ltd take the complexity out of property management. With over 15 years of
                    experience in Nairobi's market, we deliver professional, transparent and customised solutions
                    for every property owner.
                </p>
            </div>
            <div class="col-xl-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{ route('v2.contact') }}">Get in Touch</a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     SERVICES
============================================================ --}}
<section id="services" class="services section kc2-section-odd">

    <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>What We Offer</p>
    </div>

    <div class="container">
        <div class="row gy-3">

            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="0">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-house-check"></i></div>
                    <a href="{{ route('v2.services') }}" class="stretched-link">
                        <h3>Property Management</h3>
                    </a>
                    <p>Comprehensive management of residential and commercial properties — tenant relations, maintenance, reporting and more.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-tags"></i></div>
                    <a href="{{ route('v2.services') }}" class="stretched-link">
                        <h3>Sales &amp; Leasing</h3>
                    </a>
                    <p>Professional facilitation of property sales and lease agreements, connecting buyers, sellers, landlords and tenants.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-graph-up-arrow"></i></div>
                    <a href="{{ route('v2.services') }}" class="stretched-link">
                        <h3>Property Valuation</h3>
                    </a>
                    <p>Accurate, professional valuations for sales, purchases, insurance and investment purposes across Kenya.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="50">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-lightbulb"></i></div>
                    <a href="{{ route('v2.services') }}" class="stretched-link">
                        <h3>Property Consultancy</h3>
                    </a>
                    <p>Expert advice on property investments, market trends and strategic decisions to grow your portfolio.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="150">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-cash-coin"></i></div>
                    <a href="{{ route('v2.services') }}" class="stretched-link">
                        <h3>Rent Collection</h3>
                    </a>
                    <p>Efficient, transparent rent and service charge collection with detailed reporting and timely remittance.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="250">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-tools"></i></div>
                    <a href="{{ route('v2.services') }}" class="stretched-link">
                        <h3>Repair &amp; Maintenance</h3>
                    </a>
                    <p>Prompt, reliable maintenance services keeping every property in optimal condition for owners and tenants.</p>
                </div>
            </div>

        </div>
    </div>

</section>

{{-- ============================================================
     TESTIMONIALS
============================================================ --}}
<section id="testimonials" class="testimonials section kc2-section-green-anim">

    <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>What Our Clients Say</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": { "delay": 5000 },
                  "slidesPerView": "auto",
                  "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true },
                  "breakpoints": {
                    "320":  { "slidesPerView": 1, "spaceBetween": 40 },
                    "1200": { "slidesPerView": 3, "spaceBetween": 10 }
                  }
                }
            </script>
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="{{ asset('v2/vendor/bootstrap-icons/fonts/bootstrap-icons.woff2') }}" class="testimonial-img" alt="" style="display:none">
                        <div class="d-flex align-items-center mb-2">
                            <div class="ms-0">
                                <h3>Property Owner, Westlands</h3>
                                <h4>Residential Estate</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Kent Consultants have managed our residential estate for over 8 years. Their professionalism, transparency and responsiveness are unmatched. Monthly reports are always on time.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="d-flex align-items-center mb-2">
                            <div class="ms-0">
                                <h3>Commercial Landlord, CBD</h3>
                                <h4>Commercial Building</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>The team at Kent Consultants transformed the management of our commercial property. Tenant occupancy improved significantly and financial reporting is crystal clear.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="d-flex align-items-center mb-2">
                            <div class="ms-0">
                                <h3>Investor, Karen</h3>
                                <h4>Property Portfolio</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Their valuation services gave us the confidence to make smart investment decisions. Detailed, accurate and delivered on time. I recommend Kent Consultants without reservation.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

</section>

{{-- ============================================================
     FAQ
============================================================ --}}
<section id="faq" class="faq section">

    <div class="container section-title" data-aos="fade-up">
        <h2>FAQ</h2>
        <p>Frequently Asked Questions</p>
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-12">
                <div class="custom-accordion" id="accordion-faq">

                    <div class="accordion-item">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#faq-1" aria-expanded="true">
                                What areas do you serve?
                            </button>
                        </h2>
                        <div id="faq-1" class="collapse show" data-parent="#accordion-faq">
                            <div class="accordion-body">
                                We provide property management services across Nairobi and its environs, covering all major residential and commercial areas including Westlands, Karen, Kilimani, CBD and surrounding suburbs.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-2">
                                What types of properties do you manage?
                            </button>
                        </h2>
                        <div id="faq-2" class="collapse" data-parent="#accordion-faq">
                            <div class="accordion-body">
                                We manage residential estates, apartments, residential towers, commercial buildings, office blocks and warehouses. Our experience spans both small units and large multi-property portfolios.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-3">
                                How do you handle tenant issues?
                            </button>
                        </h2>
                        <div id="faq-3" class="collapse" data-parent="#accordion-faq">
                            <div class="accordion-body">
                                We have a dedicated team that handles all tenant communications, maintenance requests and dispute resolution professionally and promptly, ensuring both landlord and tenant satisfaction.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-4">
                                How often do you provide property reports?
                            </button>
                        </h2>
                        <div id="faq-4" class="collapse" data-parent="#accordion-faq">
                            <div class="accordion-body">
                                We provide monthly financial reports and property status updates to all property owners, ensuring full transparency, accountability and timely remittance of rental income.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

{{-- ============================================================
     CONTACT TEASER
============================================================ --}}
<section id="contact" class="contact section kc2-section-green-anim">

    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Get In Touch</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

            <div class="col-lg-4">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                        <h3>Address</h3>
                        <p>Sclaters House, Parklands Road<br>Nairobi, Kenya</p>
                    </div>
                </div>

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Call Us</h3>
                        <p>
                            <a href="tel:+254786955170">+254 786 955 170</a><br>
                            <a href="tel:+254734254796">+254 734 254 796</a>
                        </p>
                    </div>
                </div>

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p><a href="mailto:info@kentconsultantsltd.co.ke">info@kentconsultantsltd.co.ke</a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <form id="kc2-contact-form" class="php-email-form" data-aos="fade-up" data-aos-delay="200" novalidate>
                    <input type="hidden" name="access_key" value="{{ config('services.web3forms.key', '') }}">
                    <input type="hidden" name="subject" value="New Enquiry — Kent Consultants Ltd (Design 2)">
                    <input type="hidden" name="botcheck" style="display:none">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="col-md-6">
                            <input type="tel" name="phone" class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="subject_line" class="form-control" placeholder="Subject" required>
                        </div>
                        <div class="col-md-12">
                            <textarea name="message" class="form-control" rows="6" placeholder="Your Message" required></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="loading">Sending…</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                            <button type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</section>

@endsection

@push('scripts')
<script>
document.getElementById('kc2-contact-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const form    = this;
    const loading = form.querySelector('.loading');
    const errBox  = form.querySelector('.error-message');
    const sentBox = form.querySelector('.sent-message');
    const btn     = form.querySelector('button[type=submit]');

    let valid = true;
    form.querySelectorAll('[required]').forEach(function(f) {
        f.classList.remove('is-invalid');
        if (!f.value.trim()) { f.classList.add('is-invalid'); valid = false; }
    });
    if (!valid) return;

    loading.style.display = 'block';
    btn.disabled = true;
    errBox.style.display = sentBox.style.display = 'none';

    try {
        const res  = await fetch('https://api.web3forms.com/submit', { method: 'POST', body: new FormData(form) });
        const data = await res.json();
        if (data.success) {
            sentBox.style.display = 'block';
            form.reset();
        } else {
            errBox.textContent = data.message || 'Something went wrong. Please try again.';
            errBox.style.display = 'block';
        }
    } catch(err) {
        errBox.textContent = 'Network error. Please check your connection.';
        errBox.style.display = 'block';
    } finally {
        loading.style.display = 'none';
        btn.disabled = false;
    }
});
</script>
@endpush
