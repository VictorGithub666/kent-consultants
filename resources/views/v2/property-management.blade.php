{{-- resources/views/v2/property-management.blade.php --}}
@extends('layouts.website2')

@section('title', 'Property Management in Kenya - Kent Consultants Ltd')
@section('description', "Kenya's most trusted property management company. Full-service residential, commercial and warehouse property management since 2008. Transparent, accountable, and results-driven.")
@section('body_class', 'pm-page')
@section('nav_pm', 'active')

@section('content')

{{-- Page Header --}}
<div class="kc2-page-header">
    <div class="container text-center">
        <h1 data-aos="fade-down">Property Management</h1>
        <p data-aos="fade-up" data-aos-delay="100">Kenya's Most Trusted Name in Property Management</p>
    </div>
</div>

{{-- Hero Intro --}}
<section class="section kc2-section-odd">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="section-title mb-4">
                    <h2>Why Kent Consultants?</h2>
                    <p>Since 2008, protecting &amp; growing property investments</p>
                </div>
                <p>
                    Kent Consultants Ltd has been Kenya's benchmark for professional property management
                    since 2008. We combine deep local market expertise with transparent, technology-enabled
                    operations to protect your asset and maximise your returns, all through one dedicated team.
                </p>
                <div class="mt-4">
                    <a href="{{ route('contact') }}" class="btn-get-started me-2">Book a Consultation</a>
                    <a href="tel:+254734476303" class="read-more ms-2">
                        <i class="bi bi-telephone me-1"></i>Call Us
                    </a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <img src="{{ asset('images/about/nairobi-city.jpg') }}" alt="Property Management Nairobi" class="img-fluid rounded kc2-img-hover">
            </div>
        </div>
    </div>
</section>

{{-- Why We're Different --}}
<section class="section kc2-section-even">
    <div class="container section-title" data-aos="fade-up">
        <h2>Our Advantage</h2>
        <p>What Makes Kent Consultants Different</p>
    </div>
    <div class="container">
        <div class="row gy-4">
            @php
                $usps = [
                    ['bi-geo-alt-fill',        'Deep Local Market Mastery',        'Since 2008 we\'ve managed properties across Kenya. We know the neighbourhoods, tenants and rates better than anyone.'],
                    ['bi-patch-check-fill',    'Fully Licensed &amp; Compliant',   'Every engagement follows Kenyan property law and regulatory best practice, so your asset stays fully protected.'],
                    ['bi-bar-chart-line-fill', 'Radically Transparent Reporting',  'Detailed, timely financial statements with no hidden fees. You always know what\'s collected, spent, and remitted.'],
                    ['bi-person-badge-fill',   'Dedicated Relationship Manager',   'One point of contact who knows your property inside out. No call centre, no getting passed around.'],
                    ['bi-tools',               'Rapid Maintenance Response',       'A vetted contractor network means repairs are handled fast, at fair rates, with quality guaranteed.'],
                    ['bi-cpu-fill',            'Technology-Enabled Operations',    'Digital rent collection, online statements and systemised inspections keep your property running smoothly, 24/7.'],
                ];
            @endphp
            @foreach($usps as $i => $usp)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi {{ $usp[0] }}"></i></div>
                    <h3>{!! $usp[1] !!}</h3>
                    <p>{{ $usp[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- End-to-End Services --}}
<section class="section kc2-section-odd">
    <div class="container section-title" data-aos="fade-up">
        <h2>What's Included</h2>
        <p>End-to-End Property Management</p>
    </div>
    <div class="container">
        <div class="row gy-4">
            @php
                $services = [
                    ['bi-people-fill',                   'Tenant Sourcing &amp; Screening',        'Thorough vetting and fast placement to keep vacancy periods and your losses to a minimum.'],
                    ['bi-cash-coin',                     'Rent &amp; Service Charge Collection',   'Prompt, digitally-tracked collection with automatic arrears follow-up and remittance.'],
                    ['bi-wrench-adjustable-circle-fill', 'Maintenance &amp; Repairs',              'Preventative and emergency maintenance handled by a vetted vendor network, quality-checked every time.'],
                    ['bi-file-earmark-bar-graph-fill',   'Financial Reporting &amp; Accounting',   'Monthly statements, budgeting, and audit-ready books that give you complete financial visibility.'],
                    ['bi-shield-lock-fill',              'Legal &amp; Compliance Support',         'Lease drafting, dispute resolution and regulatory compliance by people who know Kenyan property law.'],
                    ['bi-megaphone-fill',                'Marketing &amp; Vacancy Management',     'Professional listings and proactive marketing that fill units faster and keep occupancy high.'],
                ];
            @endphp
            @foreach($services as $i => $svc)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi {{ $svc[0] }}"></i></div>
                    <h3>{!! $svc[1] !!}</h3>
                    <p>{{ $svc[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- How We Rate Ourselves --}}
<section class="section kc2-section-even">
    <div class="container section-title" data-aos="fade-up">
        <h2>Our Standards</h2>
        <p>How We Rate Ourselves</p>
    </div>
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="kc2-compare-card kc2-compare-card--kent">
                    <h3><i class="bi bi-award-fill me-2"></i>Kent Consultants</h3>
                    <ul>
                        <li><i class="bi bi-check-circle-fill"></i> Real-time, transparent financial reporting</li>
                        <li><i class="bi bi-check-circle-fill"></i> Dedicated relationship manager per client</li>
                        <li><i class="bi bi-check-circle-fill"></i> &lt;24hr maintenance response time</li>
                        <li><i class="bi bi-check-circle-fill"></i> Digital rent collection &amp; online statements</li>
                        <li><i class="bi bi-check-circle-fill"></i> 15+ years of Kenya market experience</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- How We Work --}}
<section class="section kc2-section-odd">
    <div class="container section-title" data-aos="fade-up">
        <h2>How We Work</h2>
        <p>Getting Started Is Simple</p>
    </div>
    <div class="container">
        <div class="row g-4">
            @php
                $steps = [
                    ['01', 'Consultation',       'We understand your property, goals and challenges, at no cost to you.'],
                    ['02', 'Property Assessment','A full inspection and market analysis to set the right strategy and pricing.'],
                    ['03', 'Onboarding',         'We digitise records, set up reporting and take over day-to-day operations.'],
                    ['04', 'Ongoing Management', 'Proactive management with monthly reporting and continuous optimisation.'],
                ];
            @endphp
            @foreach($steps as $i => $step)
            <div class="col-md-3 d-flex" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="kc2-process-step">
                    <div class="kc2-process-num">{{ $step[0] }}</div>
                    <h4>{{ $step[1] }}</h4>
                    <p>{{ $step[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Testimonials --}}
<section class="section kc2-section-even">
    <div class="container section-title" data-aos="fade-up">
        <h2>Client Voices</h2>
        <p>Trusted by Property Owners Across Kenya</p>
    </div>
    <div class="container">
        <div class="row g-4" style="color: black">
            @php
                $testimonials = [
                    ['Kent took over a property that was losing money every month. Within a year, occupancy was full and I finally had statements I could actually understand.', 'Residential Landlord', 'Kilimani, Kenya'],
                    ['What stood out was the responsiveness. Maintenance issues that used to take weeks are now resolved within a day or two.', 'Commercial Property Owner', 'Upperhill, Kenya'],
                    ['Having one dedicated manager who knows my building has made all the difference. It finally feels like someone is truly looking after the asset.', 'Estate Developer', 'Westlands, Kenya'],
                ];
            @endphp
            @foreach($testimonials as $i => $t)
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="kc2-testimonial-card">
                    <i class="bi bi-quote kc2-testimonial-quote"></i>
                    <p class="kc2-testimonial-text">{{ $t[0] }}</p>
                    <div class="kc2-testimonial-author">{{ $t[1] }}</div>
                    <div class="kc2-testimonial-role">{{ $t[2] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="call-to-action section dark-background">
    <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-xl-9 text-center text-xl-start">
                <h3>Ready for Property Management You Can Trust?</h3>
                <p>Talk to our team today and see why landlords across Kenya consider Kent Consultants their most valued property management partner.</p>
            </div>
            <div class="col-xl-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{ route('contact') }}">Book a Consultation</a>
            </div>
        </div>
    </div>
</section>

@endsection
