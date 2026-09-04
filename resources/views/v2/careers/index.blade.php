{{-- resources/views/v2/careers/index.blade.php --}}
@extends('layouts.website2')

@section('title', 'Careers - Kent Consultants Ltd')
@section('description', 'Career opportunities at Kent Consultants Ltd — professional property management company in Nairobi, Kenya.')
@section('body_class', 'careers-page')
@section('nav_careers', 'active')

@section('content')

{{-- Page Header --}}
<div class="kc2-page-header">
    <div class="container text-center">
        <h1>Join Our Team</h1>
        <p>Build your career with a leading property management company</p>
    </div>
</div>

{{-- Careers List --}}
<section class="section">

    <div class="container section-title" data-aos="fade-up">
        <h2>Openings</h2>
        <p>Current Opportunities</p>
    </div>

    <div class="container" data-aos="fade-up">
        @if($careers->count() > 0)
            <div class="row gy-4">
                @foreach($careers as $career)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 2) * 100 }}">
                        <div class="career-card">
                            <h3>{{ $career->job_title }}</h3>
                            <div class="career-meta">
                                <span>{{ $career->department }}</span>
                                <span>{{ $career->location }}</span>
                                <span>{{ $career->employment_type }}</span>
                                @if($career->status === 'open')
                                    <span style="background:color-mix(in srgb,var(--kc2-gold),transparent 85%);color:var(--kc2-gold)">Open</span>
                                @endif
                            </div>
                            <p class="mt-2">{{ Str::limit(strip_tags($career->description), 150) }}</p>
                            <p class="deadline"><i class="bi bi-calendar3 me-1"></i>
                                Deadline: {{ $career->application_deadline->format('M d, Y') }}
                            </p>
                            <a href="{{ route('v2.careers.show', $career) }}" class="btn-apply">View &amp; Apply</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5">{{ $careers->links() }}</div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-briefcase" style="font-size:3rem;color:var(--kc2-gold);opacity:0.5"></i>
                <h4 class="mt-3">No Current Openings</h4>
                <p class="text-muted">We don't have active job openings right now. Please check back soon.</p>
            </div>
        @endif
    </div>

</section>

{{-- Why Work With Us --}}
<section class="services section light-background">

    <div class="container section-title" data-aos="fade-up">
        <h2>Why Join Us</h2>
        <p>Why Work With Kent Consultants</p>
    </div>

    <div class="container">
        <div class="row gy-4">

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-graph-up"></i></div>
                    <h3>Professional Growth</h3>
                    <p>Continuous learning and career advancement opportunities in Kenya's dynamic property management industry.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-people"></i></div>
                    <h3>Great Team Culture</h3>
                    <p>Join a supportive team of professionals who value collaboration, integrity and excellence in all they do.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item kc2-service-card position-relative">
                    <div class="kc2-svc-icon"><i class="bi bi-award"></i></div>
                    <h3>Industry Leadership</h3>
                    <p>Work with a leading property management firm with over 15 years of experience and a proven track record.</p>
                </div>
            </div>

        </div>
    </div>

</section>

{{-- Application Process --}}
<section class="section">

    <div class="container section-title" data-aos="fade-up">
        <h2>How to Apply</h2>
        <p>Application Process</p>
    </div>

    <div class="container">
        <div class="row gy-4">

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="career-card text-center">
                    <div class="mb-3"><span style="font-size:2.2rem;font-weight:800;color:var(--kc2-gold)">01</span></div>
                    <h3>Browse Positions</h3>
                    <p>Explore our current openings and find the right role for you.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="career-card text-center">
                    <div class="mb-3"><span style="font-size:2.2rem;font-weight:800;color:var(--kc2-gold)">02</span></div>
                    <h3>Submit Application</h3>
                    <p>Complete the online application form with your details and CV.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="career-card text-center">
                    <div class="mb-3"><span style="font-size:2.2rem;font-weight:800;color:var(--kc2-gold)">03</span></div>
                    <h3>Review &amp; Interview</h3>
                    <p>Our team reviews applications and contacts shortlisted candidates.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="career-card text-center">
                    <div class="mb-3"><span style="font-size:2.2rem;font-weight:800;color:var(--kc2-gold)">04</span></div>
                    <h3>Join Our Team</h3>
                    <p>Welcome aboard! Start your career journey with Kent Consultants.</p>
                </div>
            </div>

        </div>
    </div>

</section>

@endsection
