{{-- resources/views/website/careers/index.blade.php --}}
@extends('layouts.website')

@section('title', 'Careers - Kent Consultants Ltd')
@section('description', 'Explore career opportunities at Kent Consultants Ltd - Professional property management company in Nairobi, Kenya.')

@section('content')
{{-- Page Header --}}
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge-gold">Careers</span>
                <h1>Join Our Team</h1>
                <p class="lead">Build your career with a leading property management company in Nairobi</p>
            </div>
        </div>
    </div>
</section>

{{-- Careers List --}}
<section class="careers-list section">
    <div class="container" data-aos="fade-up">
        @if($careers->count() > 0)
            <div class="row g-4">
                @foreach($careers as $career)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="career-card">
                            <div class="career-header">
                                <div class="career-title">
                                    <h3>{{ $career->job_title }}</h3>
                                    <span class="badge-status {{ $career->status }}">
                                        {{ ucfirst($career->status) }}
                                    </span>
                                </div>
                                <div class="career-meta">
                                    <span><i class="bi bi-building"></i> {{ $career->department }}</span>
                                    <span><i class="bi bi-geo-alt"></i> {{ $career->location }}</span>
                                    <span><i class="bi bi-clock"></i> {{ $career->employment_type }}</span>
                                </div>
                            </div>
                            <div class="career-body">
                                <div class="career-excerpt">
                                    <p>{{ Str::limit(strip_tags($career->description), 150) }}</p>
                                </div>
                                <div class="career-deadline">
                                    <i class="bi bi-calendar-event"></i>
                                    <span>Application Deadline: {{ $career->application_deadline->format('M d, Y') }}</span>
                                </div>
                            </div>
                            <div class="career-footer">
                                <a href="{{ route('careers.show', $career) }}" class="btn btn-gold">
                                    View Details <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5">
                {{ $careers->links() }}
            </div>
        @else
            <div class="empty-state">
                <i class="bi bi-briefcase"></i>
                <h4>No Current Openings</h4>
                <p>We don't have any active job openings at the moment. Please check back later.</p>
            </div>
        @endif
    </div>
</section>

{{-- Why Work With Us --}}
<section class="why-work section light-background">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">Join Us</span>
        <h2>Why Work With Us</h2>
        <p>Build a rewarding career in property management</p>
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="benefit-card" data-aos="zoom-in">
                    <div class="benefit-icon">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <h4>Professional Growth</h4>
                    <p>Opportunities for continuous learning and career advancement in the property management industry.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="benefit-card" data-aos="zoom-in" data-aos-delay="100">
                    <div class="benefit-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4>Great Team Culture</h4>
                    <p>Join a supportive team of property management professionals who value collaboration and excellence.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="benefit-card" data-aos="zoom-in" data-aos-delay="200">
                    <div class="benefit-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <h4>Industry Leadership</h4>
                    <p>Work with a leading property management company with over 15 years of experience in Kenya.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Application Process --}}
<section class="application-process section">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">How to Apply</span>
        <h2>Application Process</h2>
        <p>Simple and transparent steps to join our team</p>
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="process-card" data-aos="zoom-in">
                    <div class="process-number">1</div>
                    <h4>Browse Positions</h4>
                    <p>Explore our current job openings and find the right role for you</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-card" data-aos="zoom-in" data-aos-delay="100">
                    <div class="process-number">2</div>
                    <h4>Submit Application</h4>
                    <p>Complete the online application form with your details and CV</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-card" data-aos="zoom-in" data-aos-delay="200">
                    <div class="process-number">3</div>
                    <h4>Review &amp; Interview</h4>
                    <p>Our team will review your application and contact you for an interview</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-card" data-aos="zoom-in" data-aos-delay="300">
                    <div class="process-number">4</div>
                    <h4>Join Our Team</h4>
                    <p>Welcome aboard! Start your career journey with Kent Consultants Ltd</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection