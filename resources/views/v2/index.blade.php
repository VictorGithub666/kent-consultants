{{-- resources/views/v2/index.blade.php --}}
@extends('layouts.website2')

@section('title', 'Kent Consultants Ltd - Property Management & Real Estate Nairobi')
@section('description', 'Professional property management, consultancy and real estate solutions in Nairobi, Kenya since 2008.')
@section('body_class', 'index-page')
@section('nav_home', 'active')

@push('styles')
<style>
#trust-bar .tb-divider { border-left: 1px solid rgba(255,255,255,0.12); }
@media (max-width: 767px) {
    #trust-bar .tb-divider { border-left: none; }
    #trust-bar .col-6:nth-child(even) { border-left: 1px solid rgba(255,255,255,0.12); }
}
</style>
@endpush

@section('content')

{{-- ============================================================
     HERO — Static image background
============================================================ --}}
<section id="hero" class="hero section dark-background kc2-hero-video">

    {{-- Static Background --}}
    <div class="kc2-hero-video-wrap" style="background-image: url('{{ asset('images/about/nairobi-city.jpg') }}'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
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
            <a href="{{ route('contact') }}" class="btn-get-started">Talk to Us</a>
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
     TRUST BAR
============================================================ --}}
<section id="trust-bar" class="section" style="background:#2C3539;padding:48px 0;position:relative;z-index:2;">
    <div class="container">
        <div class="row gy-4 justify-content-center text-center">

            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="0">
                <div style="padding:8px 0;">
                    <div style="font-family:'Open Sans',sans-serif;font-size:2.6rem;font-weight:800;color:#D4AF37;line-height:1.1;min-height:3.2rem;display:flex;align-items:center;justify-content:center;">
                        <span class="kc2-counter" data-target="2000" data-prefix="Over " data-suffix="">0</span>
                    </div>
                    <div style="font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:1px;color:rgba(255,255,255,0.65);margin-top:6px;">Units Managed</div>
                </div>
            </div>

            <div class="col-6 col-md-3 tb-divider" data-aos="fade-up" data-aos-delay="100">
                <div style="padding:8px 0;">
                    <div style="font-family:'Open Sans',sans-serif;font-size:2.6rem;font-weight:800;color:#D4AF37;line-height:1.1;min-height:3.2rem;display:flex;align-items:center;justify-content:center;">
                        <span class="kc2-counter" data-target="18" data-prefix="Over " data-suffix=" years">0</span>
                    </div>
                    <div style="font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:1px;color:rgba(255,255,255,0.65);margin-top:6px;">Years Active</div>
                </div>
            </div>

            <div class="col-6 col-md-3 tb-divider" data-aos="fade-up" data-aos-delay="200">
                <div style="padding:8px 0;">
                    <div style="font-family:'Open Sans',sans-serif;font-size:2.6rem;font-weight:800;color:#D4AF37;line-height:1.1;min-height:3.2rem;display:flex;align-items:center;justify-content:center;">
                        <span class="kc2-counter" data-target="95" data-prefix="" data-suffix="%">0</span>
                    </div>
                    <div style="font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:1px;color:rgba(255,255,255,0.65);margin-top:6px;">Occupancy Rate</div>
                </div>
            </div>

            <div class="col-6 col-md-3 tb-divider" data-aos="fade-up" data-aos-delay="300">
                <div style="padding:8px 0;">
                    <div style="font-family:'Open Sans',sans-serif;font-size:2rem;font-weight:800;color:#D4AF37;line-height:1.1;min-height:3.2rem;display:flex;align-items:center;justify-content:center;">
                        Within 24 hrs
                    </div>
                    <div style="font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:1px;color:rgba(255,255,255,0.65);margin-top:6px;">Response Time</div>
                </div>
            </div>

        </div>
    </div>
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
                        <span>Licensed property managers with deep knowledge of the Kenyan market.</span>
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
                <a href="{{ route('about') }}" class="read-more" data-aos="fade-up" data-aos-delay="300">
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
     CALL TO ACTION
============================================================ --}}
<section id="call-to-action" class="call-to-action section dark-background">
    <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-xl-9 text-center text-xl-start">
                <h3>Ready to Maximise Your Property's Value?</h3>
                <p>
                    Let Kent Consultants Ltd take the complexity out of property management. With over 15 years of
                    experience in Kenya's market, we deliver professional, transparent and customised solutions
                    for every property owner.
                </p>
            </div>
            <div class="col-xl-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{ route('contact') }}">Get in Touch</a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     SERVICES
============================================================ --}}
<section id="services" class="services section kc2-section-white">

    <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>What We Offer</p>
    </div>

    <div class="container">
        <div class="row gy-3">

            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="0">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-house-check"></i></div>
                    <a href="{{ route('services') }}" class="stretched-link">
                        <h3>Property Management</h3>
                    </a>
                    <p>Comprehensive management of residential and commercial properties: tenant relations, maintenance, reporting and more.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-tags"></i></div>
                    <a href="{{ route('services') }}" class="stretched-link">
                        <h3>Sales &amp; Leasing</h3>
                    </a>
                    <p>Professional facilitation of property sales and lease agreements, connecting buyers, sellers, landlords and tenants.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-lightbulb"></i></div>
                    <a href="{{ route('services') }}" class="stretched-link">
                        <h3>Property Consultancy</h3>
                    </a>
                    <p>Expert advice on property investments, market trends and strategic decisions to grow your portfolio.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="150">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-cash-coin"></i></div>
                    <a href="{{ route('services') }}" class="stretched-link">
                        <h3>Rent Collection</h3>
                    </a>
                    <p>Efficient, transparent rent and service charge collection with detailed reporting and timely remittance.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="250">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-tools"></i></div>
                    <a href="{{ route('services') }}" class="stretched-link">
                        <h3>Repair &amp; Maintenance</h3>
                    </a>
                    <p>Prompt, reliable maintenance services keeping every property in optimal condition for owners and tenants.</p>
                </div>
            </div>

        </div>
    </div>

</section>

{{-- ============================================================
     DEVELOPMENTS UNDER MANAGEMENT
============================================================ --}}
@if(isset($developments) && $developments->count())
<section id="developments" class="section kc2-section-odd">

    <div class="container section-title" data-aos="fade-up">
        <h2>Our Portfolio</h2>
        <p>Some Developments Under Our Management</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="kc2-dev-swiper-outer">
            <button class="kc2-dev-nav kc2-dev-nav--prev" aria-label="Previous"><i class="bi bi-chevron-left"></i></button>
            <div class="swiper init-swiper kc2-dev-swiper">
                <script type="application/json" class="swiper-config">
                    {
                      "loop": true,
                      "speed": 600,
                      "slidesPerView": "auto",
                      "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true },
                      "navigation": { "nextEl": ".kc2-dev-nav--next", "prevEl": ".kc2-dev-nav--prev" },
                      "breakpoints": {
                        "320":  { "slidesPerView": 1, "spaceBetween": 20 },
                        "768":  { "slidesPerView": 2, "spaceBetween": 24 },
                        "1200": { "slidesPerView": 3, "spaceBetween": 28 }
                      }
                    }
                </script>
                <div class="swiper-wrapper">
                    @foreach($developments as $dev)
                    <div class="swiper-slide">
                        <div class="kc2-dev-card">
                            @if($dev->main_image)
                                <div class="kc2-dev-img-wrap">
                                    <img src="{{ asset('storage/' . $dev->main_image) }}" alt="{{ $dev->name }}" loading="lazy">
                                </div>
                            @else
                                <div class="kc2-dev-img-wrap kc2-dev-img-placeholder">
                                    <i class="bi bi-building"></i>
                                </div>
                            @endif
                            <div class="kc2-dev-body">
                                <span class="kc2-dev-category">{{ optional($dev->category)->name }}</span>
                                <h4 class="kc2-dev-name">{{ $dev->name }}</h4>
                                <p class="kc2-dev-location"><i class="bi bi-geo-alt me-1"></i>{{ $dev->location }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination mt-4"></div>
            </div>
            <button class="kc2-dev-nav kc2-dev-nav--next" aria-label="Next"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>

</section>
@endif

{{-- ============================================================
     TESTIMONIALS (commented out)
============================================================
<section id="testimonials" class="testimonials section kc2-section-white">

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
                        <div class="d-flex align-items-center mb-2">
                            <div class="ms-0">
                                <h3>Grace M., Kileleshwa Gardens</h3>
                                <h4>Residential Estate, Kileleshwa</h4>
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
                        <div class="kc2-review-link">
                            <a href="https://g.page/r/KentConsultantsLtd/review" target="_blank" rel="noopener" title="Read on Google Reviews">
                                Google Review
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="d-flex align-items-center mb-2">
                            <div class="ms-0">
                                <h3>James O., Parklands Plaza</h3>
                                <h4>Commercial Building, Parklands</h4>
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
                        <div class="kc2-review-link">
                            <a href="https://g.page/r/KentConsultantsLtd/review" target="_blank" rel="noopener" title="Read on Google Reviews">
                                Google Review
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="d-flex align-items-center mb-2">
                            <div class="ms-0">
                                <h3>Amina W., Karen Ridgeview</h3>
                                <h4>Mixed-Use Development, Karen</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Handing over our Karen development to Kent Consultants was the best decision we made. Collections are up, maintenance issues are resolved swiftly, and our tenants are happier than ever.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        <div class="kc2-review-link">
                            <a href="https://g.page/r/KentConsultantsLtd/review" target="_blank" rel="noopener" title="Read on Google Reviews">
                                Google Review
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

</section>
============================================================ --}}

{{-- ============================================================
     FAQ
============================================================ --}}
<section id="faq" class="faq section kc2-section-white">

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
                                We provide property management services across Kenya, covering all major residential and commercial areas including Westlands, Karen, Kilimani, CBD and surrounding suburbs.
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

                    <div class="accordion-item">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-5">
                                What are your management fees?
                            </button>
                        </h2>
                        <div id="faq-5" class="collapse" data-parent="#accordion-faq">
                            <div class="accordion-body">
                                Our fees are tailored to the specific requirements, scope of services, and unique characteristics of each property. As such, the fee structure is determined on a case-by-case basis to ensure it appropriately reflects the property's needs and management requirements.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-6">
                                What happens when we switch from our current manager?
                            </button>
                        </h2>
                        <div id="faq-6" class="collapse" data-parent="#accordion-faq">
                            <div class="accordion-body">
                                We make the transition as smooth as possible. Once you instruct us, we handle the full handover: collecting lease agreements, tenant records, deposit schedules and service contracts from your outgoing manager. We notify all tenants in writing, update rent payment details and carry out an initial property inspection, all within a typical handover window of two to four weeks. There is no gap in management cover during the changeover.
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
<section id="contact" class="contact section kc2-section-odd">

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
                    <input type="hidden" name="subject" value="New Enquiry | Kent Consultants Ltd">
                    <input type="hidden" name="botcheck" style="display:none">

                    <div class="row gy-4">
                        <div class="col-md-12">
                            <select name="inquiry_type" id="kc2-inquiry-type" class="form-control kc2-inquiry-select" required>
                                <option value="" disabled selected>I am a... (please select)</option>
                                <option value="Potential Client">I'm a potential client</option>
                                <option value="Property Owner">I'm a property owner</option>
                                <option value="Tenant">I'm a tenant</option>
                                <option value="Maintenance Issue">I have a maintenance issue</option>
                            </select>
                            <div class="kc2-inquiry-hint" id="kc2-inquiry-hint"></div>
                        </div>
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
/* ── Trust-bar counter animation ── */
(function () {
    function animateCounters() {
        document.querySelectorAll('.kc2-counter').forEach(function (el) {
            if (el.dataset.animated) return;
            el.dataset.animated = '1';
            var target   = parseInt(el.dataset.target, 10);
            var prefix   = el.dataset.prefix  || '';
            var suffix   = el.dataset.suffix  || '';
            var duration = 1800;
            var start    = null;
            function step(ts) {
                if (!start) start = ts;
                var progress = Math.min((ts - start) / duration, 1);
                var eased    = 1 - Math.pow(1 - progress, 3);
                var current  = Math.round(eased * target);
                el.textContent = prefix + current.toLocaleString() + suffix;
                if (progress < 1) requestAnimationFrame(step);
            }
            requestAnimationFrame(step);
        });
    }

    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) { animateCounters(); io.disconnect(); }
        });
    }, { threshold: 0.3 });

    var bar = document.getElementById('trust-bar');
    if (bar) io.observe(bar);
})();
</script>
<script>
/* ── Inquiry type hint & dynamic subject ── */
(function () {
    var hints = {
        'Potential Client':  'We\'d love to tell you more. We\'ll reply within 24 hours.',
        'Property Owner':    'We\'ll get back to you within 24 hours to discuss your management needs.',
        'Tenant':            'For urgent issues please call us directly. We respond to all enquiries within 24 business hours.',
        'Maintenance Issue': 'We treat maintenance as urgent. Our team will respond within 24 hours. For emergencies call +254 786 955 170.'
    };
    var sel   = document.getElementById('kc2-inquiry-type');
    var hint  = document.getElementById('kc2-inquiry-hint');
    var subj  = document.querySelector('#kc2-contact-form input[name="subject"]');
    if (sel && hint && subj) {
        sel.addEventListener('change', function () {
            var val = sel.value;
            hint.textContent = hints[val] || '';
            subj.value = 'New Enquiry [' + val + '] | Kent Consultants Ltd';
        });
    }
})();
</script>
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
