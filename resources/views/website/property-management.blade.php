@extends('layouts.website')

@section('title', 'Property Management in Kenya - Kent Consultants Ltd')
@section('description', 'Kenya\'s most trusted property management company. Full-service residential, commercial and warehouse property management in Kenya since 2008, transparent, technology-enabled, and accountable.')

@section('content')

<style>
    /* ====================================================
    Property Management Page: Hero, USPs, Services, Compare
    ==================================================== */

    /* ---- Hero ---- */
    .pm-hero {
        position: relative;
        min-height: 65vh;
        display: flex;
        align-items: center;
        overflow: hidden;
        isolation: isolate;
    }
    .pm-hero-bg {
        position: absolute;
        inset: 0;
        background-image: url('{{ asset('images/about/nairobi-city.jpg') }}');
        background-size: cover;
        background-position: center;
        z-index: -2;
        animation: pmKenBurns 24s ease-in-out infinite alternate;
        will-change: transform;
    }
    .pm-hero-overlay {
        position: absolute;
        inset: 0;
        background:
            linear-gradient(180deg, rgba(10,9,8,0.82) 0%, rgba(14,12,10,0.6) 45%, rgba(10,9,8,0.92) 100%),
            linear-gradient(120deg, rgba(255,215,0,0.16), transparent 55%);
        z-index: -1;
    }
    .pm-hero .container { position: relative; z-index: 1; }
    .pm-hero h1 { color: var(--white); }
    .pm-hero .lead { color: rgba(255,255,255,0.85); }
    @keyframes pmKenBurns {
        0%   { transform: scale(1) translate(0, 0); }
        100% { transform: scale(1.15) translate(-1.5%, -1.5%); }
    }
    .pm-hero-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        justify-content: center;
        margin-top: 2rem;
    }
    .pm-hero-badges .pill {
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,215,0,0.35);
        color: var(--white);
        padding: 8px 18px;
        border-radius: 999px;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        backdrop-filter: blur(4px);
        animation: pmPillFloat 4s ease-in-out infinite;
    }
    .pm-hero-badges .pill:nth-child(2) { animation-delay: 0.4s; }
    .pm-hero-badges .pill:nth-child(3) { animation-delay: 0.8s; }
    .pm-hero-badges .pill:nth-child(4) { animation-delay: 1.2s; }
    @keyframes pmPillFloat {
        0%, 100% { transform: translateY(0); }
        50%      { transform: translateY(-6px); }
    }

    /* ---- Gold floating cards (USP cards, service cards, testimonial cards) ---- */
    .pm-usp-card,
    .pm-services .service-card,
    .pm-testimonial-card {
        background: var(--gold-gradient);
        color: var(--charcoal);
        border: none;
        border-radius: 14px;
        padding: 36px 28px;
        height: 100%;
        position: relative;
        overflow: hidden;
        animation: pmCardFloat 5s ease-in-out infinite;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    @keyframes pmCardFloat {
        0%, 100% { transform: translateY(0); box-shadow: 0 10px 26px rgba(166, 124, 0, 0.20); }
        50%      { transform: translateY(-10px); box-shadow: 0 24px 45px rgba(166, 124, 0, 0.30); }
    }
    .pm-usp-card:hover,
    .pm-services .service-card:hover,
    .pm-testimonial-card:hover {
        animation-play-state: paused;
        transform: translateY(-14px) scale(1.02);
        box-shadow: 0 28px 60px rgba(166, 124, 0, 0.35);
    }

    /* USP icon */
    .pm-usp-card .pm-usp-icon {
        width: 62px;
        height: 62px;
        border-radius: 16px;
        background: rgba(26, 23, 21, 0.14);
        color: var(--charcoal);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.7rem;
        margin-bottom: 22px;
        transition: transform 0.5s ease, background 0.45s ease, color 0.45s ease;
    }
    .pm-usp-card:hover .pm-usp-icon {
        background: var(--charcoal);
        color: var(--gold-2);
        transform: rotate(-8deg) scale(1.12);
    }
    .pm-usp-card h3 { font-size: 1.2rem; font-weight: 700; margin-bottom: 12px; color: var(--charcoal); }
    .pm-usp-card p { color: rgba(26, 23, 21, 0.75); font-size: 0.95rem; line-height: 1.65; margin: 0; }

    /* Service cards (this page only) */
    .pm-services .service-card .icon-box {
        background: rgba(26, 23, 21, 0.14);
        color: var(--charcoal);
        transition: transform 0.5s ease, background 0.45s ease, color 0.45s ease;
    }
    .pm-services .service-card:hover .icon-box {
        background: var(--charcoal);
        color: var(--gold-2);
        transform: rotate(-8deg) scale(1.12);
    }
    .pm-services .service-card h3 { color: var(--charcoal); }
    .pm-services .service-card p { color: rgba(26, 23, 21, 0.75); }

    /* ---- Comparison section ---- */
    .pm-compare-card {
        border-radius: 16px;
        padding: 40px 32px;
        height: 100%;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .pm-compare-card.kent {
        background: var(--gold-gradient);
        color: var(--charcoal);
        box-shadow: 0 18px 45px rgba(166, 124, 0, 0.25);
    }
    .pm-compare-card.others {
        background: var(--off-white);
        border: 1px dashed color-mix(in srgb, var(--charcoal), transparent 75%);
        color: var(--charcoal);
    }
    .pm-compare-card:hover { transform: translateY(-8px); }
    .pm-compare-card h3 { font-weight: 800; margin-bottom: 22px; }
    .pm-compare-card ul { list-style: none; padding: 0; margin: 0; }
    .pm-compare-card li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 10px 0;
        border-bottom: 1px solid rgba(0,0,0,0.08);
        font-size: 0.95rem;
        opacity: 0;
        transform: translateX(-14px);
        animation: pmLiIn 0.5s ease forwards;
    }
    .pm-compare-card.others li { transform: translateX(14px); animation-name: pmLiInRight; }
    .pm-compare-card li:nth-child(1) { animation-delay: 0.05s; }
    .pm-compare-card li:nth-child(2) { animation-delay: 0.15s; }
    .pm-compare-card li:nth-child(3) { animation-delay: 0.25s; }
    .pm-compare-card li:nth-child(4) { animation-delay: 0.35s; }
    .pm-compare-card li:nth-child(5) { animation-delay: 0.45s; }
    .pm-compare-card li:last-child { border-bottom: none; }
    @keyframes pmLiIn { to { opacity: 1; transform: translateX(0); } }
    @keyframes pmLiInRight { to { opacity: 1; transform: translateX(0); } }
    .pm-compare-card.kent li i { color: var(--charcoal); }
    .pm-compare-card.others li i { color: #b0271c; }

    /* ---- Testimonials ---- */
    .pm-testimonial-card .pm-quote-icon {
        font-size: 2.2rem;
        color: rgba(26, 23, 21, 0.4);
        display: inline-block;
        margin-bottom: 14px;
        animation: pmQuoteFloat 3.5s ease-in-out infinite;
    }
    @keyframes pmQuoteFloat {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50%      { transform: translateY(-4px) rotate(-4deg); }
    }
    .pm-testimonial-card p.quote { color: var(--charcoal); font-style: italic; line-height: 1.7; margin-bottom: 18px; }
    .pm-testimonial-card .pm-author { font-weight: 700; font-size: 0.95rem; color: var(--charcoal); }
    .pm-testimonial-card .pm-role { color: rgba(26, 23, 21, 0.65); font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; }

    /* ---- Final CTA ---- */
    .pm-cta {
        position: relative;
        padding: 90px 0;
        overflow: hidden;
        background: linear-gradient(135deg, #1a1715 0%, #2d2a28 55%, #3a2f1f 100%);
    }
    .pm-cta::before {
        content: '';
        position: absolute;
        inset: -40%;
        background: conic-gradient(from 0deg, rgba(255,215,0,0.08), transparent 30%, rgba(255,215,0,0.08) 60%, transparent 90%);
        animation: pmCtaSpin 24s linear infinite;
    }
    @keyframes pmCtaSpin { to { transform: rotate(360deg); } }
    .pm-cta .container { position: relative; z-index: 1; }
    .pm-cta h2 { color: var(--white); }
    .pm-cta p { color: rgba(255,255,255,0.75); }
    .pm-cta .btn-gold {
        animation: pmPulse 2.4s ease-in-out infinite;
    }
    @keyframes pmPulse {
        0%, 100% { box-shadow: 0 0 0 0 rgba(255,215,0,0.35); }
        50%      { box-shadow: 0 0 0 14px rgba(255,215,0,0); }
    }

    @media (prefers-reduced-motion: reduce) {
        .pm-hero-bg, .pm-hero-badges .pill, .pm-cta::before, .pm-cta .btn-gold,
        .pm-usp-card, .pm-usp-card .pm-usp-icon, .pm-compare-card li, .pm-testimonial-card .pm-quote-icon,
        .pm-usp-card, .pm-services .service-card, .pm-testimonial-card {
            animation: none !important;
            transition: none !important;
            box-shadow: 0 10px 26px rgba(166, 124, 0, 0.20) !important;
        }
    }
</style>

<div class="pm-page">

{{-- Hero --}}
<section class="pm-hero" data-aos="fade-down">
    <div class="pm-hero-bg"></div>
    <div class="pm-hero-overlay"></div>
    <div class="container text-center">
        <span class="badge-gold" data-aos="fade-up" style="margin-top: 170px">Property Management</span>
        <h1 data-aos="fade-up" data-aos-delay="100">Kenya's Most Trusted Name in<br>Property Management</h1>
        <p class="lead col-lg-8 mx-auto" data-aos="fade-up" data-aos-delay="200">
            Since 2008, Kent Consultants has protected and grown the value of properties across Kenya,
            with transparent reporting, rapid maintenance response, and a team that treats your investment like our own.
        </p>
        <div data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('contact') }}" class="btn btn-gold btn-lg me-2">Book a Consultation</a>
            <a href="tel:+254734476303" class="btn btn-outline-gold btn-lg" style="color:#fff;border-color:rgba(255,255,255,0.5);">
                <i class="bi bi-telephone"></i> Call Us Now
            </a>
        </div>
        <div class="pm-hero-badges" data-aos="fade-up" data-aos-delay="400">
            <span class="pill"><i class="bi bi-patch-check-fill"></i> Fully Licensed</span>
            <span class="pill"><i class="bi bi-award-fill"></i> 15+ Years in Kenya</span>
            <span class="pill"><i class="bi bi-house-check-fill"></i> 500+ Properties Managed</span>
            <span class="pill"><i class="bi bi-shield-check"></i> 98% Client Retention</span>
        </div>
    </div>
</section>

{{-- Why Kent is the best --}}
<section class="pm-why section light-background">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">Why We're Different</span>
        <h2>Kenya's Benchmark for Property Management</h2>
        <p>Landlords and investors across Kenya choose Kent Consultants because we combine local expertise with the accountability of a modern, technology-driven operation.</p>
    </div>

    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="pm-usp-card" data-aos="fade-up" data-aos-delay="0" style="animation-delay:0s;">
                    <div class="pm-usp-icon"><i class="bi bi-geo-alt-fill"></i></div>
                    <h3>Deep Local Market Mastery</h3>
                    <p>Since 2008 we've managed residential, commercial and industrial properties across Kenya, and we know the neighbourhoods, tenants, and rates better than anyone.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pm-usp-card" data-aos="fade-up" data-aos-delay="100" style="animation-delay:0.3s;">
                    <div class="pm-usp-icon"><i class="bi bi-patch-check-fill"></i></div>
                    <h3>Fully Licensed &amp; Compliant</h3>
                    <p>Every engagement follows Kenyan property law and regulatory best practice, so your asset and your reputation stay protected.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pm-usp-card" data-aos="fade-up" data-aos-delay="200" style="animation-delay:0.6s;">
                    <div class="pm-usp-icon"><i class="bi bi-bar-chart-line-fill"></i></div>
                    <h3>Radically Transparent Reporting</h3>
                    <p>Detailed, timely financial statements with no hidden fees. You always know exactly what's collected, spent, and remitted.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pm-usp-card" data-aos="fade-up" data-aos-delay="0" style="animation-delay:0.9s;">
                    <div class="pm-usp-icon"><i class="bi bi-person-badge-fill"></i></div>
                    <h3>A Dedicated Relationship Manager</h3>
                    <p>One point of contact who knows your property inside out, so there's no call centre and no getting passed around.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pm-usp-card" data-aos="fade-up" data-aos-delay="100" style="animation-delay:1.2s;">
                    <div class="pm-usp-icon"><i class="bi bi-tools"></i></div>
                    <h3>Rapid Maintenance Response</h3>
                    <p>A vetted network of contractors means repairs are handled fast, at fair rates, without compromising quality.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pm-usp-card" data-aos="fade-up" data-aos-delay="200" style="animation-delay:1.5s;">
                    <div class="pm-usp-icon"><i class="bi bi-cpu-fill"></i></div>
                    <h3>Technology-Enabled Operations</h3>
                    <p>Digital rent collection, online statements, and systemised inspections keep your property running smoothly, 24/7.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Full service breakdown --}}
<section class="pm-services section dark-background">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">What's Included</span>
        <h2>End-to-End Property Management</h2>
        <p>One partner for everything your property needs, from tenants to taxes.</p>
    </div>

    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="0" style="animation-delay:0s;">
                    <div class="icon-box"><i class="bi bi-people-fill"></i></div>
                    <h3>Tenant Sourcing &amp; Screening</h3>
                    <p>Thorough vetting and fast placement to keep vacancy periods, and your losses, to a minimum.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="100" style="animation-delay:0.3s;">
                    <div class="icon-box"><i class="bi bi-cash-coin"></i></div>
                    <h3>Rent &amp; Service Charge Collection</h3>
                    <p>Prompt, digitally-tracked collection with automatic arrears follow-up and remittance.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="200" style="animation-delay:0.6s;">
                    <div class="icon-box"><i class="bi bi-wrench-adjustable-circle-fill"></i></div>
                    <h3>Maintenance &amp; Repairs</h3>
                    <p>Preventative and emergency maintenance handled by a vetted vendor network, quality checked every time.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="0" style="animation-delay:0.9s;">
                    <div class="icon-box"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
                    <h3>Financial Reporting &amp; Accounting</h3>
                    <p>Monthly statements, budgeting, and audit-ready books that give you complete visibility.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="100" style="animation-delay:1.2s;">
                    <div class="icon-box"><i class="bi bi-shield-lock-fill"></i></div>
                    <h3>Legal &amp; Compliance Support</h3>
                    <p>Lease drafting, dispute resolution, and regulatory compliance handled by people who know Kenyan property law.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card" data-aos="zoom-in" data-aos-delay="200" style="animation-delay:1.5s;">
                    <div class="icon-box"><i class="bi bi-megaphone-fill"></i></div>
                    <h3>Marketing &amp; Vacancy Management</h3>
                    <p>Professional listings and proactive marketing that fill units faster and keep occupancy high.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Kent vs typical firms --}}
<section class="pm-compare section light-background">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">The Kent Difference</span>
        <h2>How We Compare to Typical Property Managers</h2>
    </div>
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="pm-compare-card kent">
                    <h3><i class="bi bi-award-fill"></i> Kent Consultants</h3>
                    <ul>
                        <li><i class="bi bi-check-circle-fill"></i> Real-time, transparent financial reporting</li>
                        <li><i class="bi bi-check-circle-fill"></i> Dedicated relationship manager per client</li>
                        <li><i class="bi bi-check-circle-fill"></i> &lt;24hr maintenance response time</li>
                        <li><i class="bi bi-check-circle-fill"></i> Digital rent collection &amp; online statements</li>
                        <li><i class="bi bi-check-circle-fill"></i> 15+ years of Kenya market experience</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left">
                <div class="pm-compare-card others">
                    <h3><i class="bi bi-building"></i> Typical Firms</h3>
                    <ul>
                        <li><i class="bi bi-x-circle-fill"></i> Vague, delayed, or paper-based statements</li>
                        <li><i class="bi bi-x-circle-fill"></i> Rotating staff, no single point of contact</li>
                        <li><i class="bi bi-x-circle-fill"></i> Slow, inconsistent maintenance turnaround</li>
                        <li><i class="bi bi-x-circle-fill"></i> Manual, cash-based rent collection</li>
                        <li><i class="bi bi-x-circle-fill"></i> Limited or generic market knowledge</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Process --}}
<section class="pm-process section dark-background">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">How We Work</span>
        <h2>Getting Started Is Simple</h2>
    </div>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="process-step golden" data-aos="fade-up" data-aos-delay="0">
                    <div class="step-number">01</div>
                    <h4>Consultation</h4>
                    <p>We understand your property, goals, and challenges at no cost to you.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="process-step golden" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-number">02</div>
                    <h4>Property Assessment</h4>
                    <p>A full inspection and market analysis to set the right strategy and pricing.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="process-step golden" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-number">03</div>
                    <h4>Onboarding</h4>
                    <p>We digitise records, set up reporting, and take over day-to-day operations.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="process-step golden" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-number">04</div>
                    <h4>Ongoing Management</h4>
                    <p>Proactive management with monthly reporting and continuous optimisation.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Testimonials --}}
<section class="pm-testimonials section light-background">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">Client Voices</span>
        <h2>Trusted by Property Owners Across Kenya</h2>
    </div>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="0">
                <div class="pm-testimonial-card" style="animation-delay:0s;">
                    <span class="pm-quote-icon"><i class="bi bi-quote"></i></span>
                    <p class="quote">Kent took over a property that was losing money every month. Within a year, occupancy was full and I finally had statements I could actually understand.</p>
                    <div class="pm-author">Residential Landlord</div>
                    <div class="pm-role">Kilimani, Kenya</div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="pm-testimonial-card" style="animation-delay:0.4s;">
                    <span class="pm-quote-icon"><i class="bi bi-quote"></i></span>
                    <p class="quote">What stood out was the responsiveness. Maintenance issues that used to take weeks are now resolved within a day or two.</p>
                    <div class="pm-author">Commercial Property Owner</div>
                    <div class="pm-role">Upperhill, Kenya</div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="pm-testimonial-card" style="animation-delay:0.8s;">
                    <span class="pm-quote-icon"><i class="bi bi-quote"></i></span>
                    <p class="quote">Having one dedicated manager who knows my building has made all the difference. It finally feels like someone is truly looking after the asset.</p>
                    <div class="pm-author">Estate Developer</div>
                    <div class="pm-role">Westlands, Kenya</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Final CTA --}}
<section class="pm-cta">
    <div class="container text-center">
        <h2 data-aos="fade-up">Ready for Property Management You Can Trust?</h2>
        <p class="col-lg-7 mx-auto" data-aos="fade-up" data-aos-delay="100">
            Talk to our team today and see why landlords across Kenya consider Kent Consultants
            the best property management partner in Kenya.
        </p>
        <div data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('contact') }}" class="btn btn-gold btn-lg me-2">Book a Consultation</a>
            <a href="https://wa.me/254734476303" target="_blank" rel="noopener" class="btn btn-outline-gold btn-lg" style="color:#fff;border-color:rgba(255,255,255,0.5);">
                <i class="bi bi-whatsapp"></i> Chat on WhatsApp
            </a>
        </div>
    </div>
</section>

</div>{{-- .pm-page --}}

@endsection