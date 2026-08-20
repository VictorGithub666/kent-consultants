{{-- resources/views/website/careers/show.blade.php --}}
@extends('layouts.website')

@section('title', $career->job_title . ' - Kent Consultants Ltd')
@section('description', Str::limit(strip_tags($career->description), 160))

@section('content')

{{-- Page Header --}}
<section class="page-header career-detail-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <a href="{{ route('careers.index') }}" class="back-link">
                    Back to Careers
                </a>
                <span class="badge-gold">{{ $career->department }}</span>
                <h1>{{ $career->job_title }}</h1>
                <div class="career-meta-detail">
                    <span>{{ $career->location }}</span>
                    <span>{{ $career->employment_type }}</span>
                    <span>Deadline: {{ $career->application_deadline->format('M d, Y') }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Career Content --}}
<section class="career-content section">
    <div class="container" data-aos="fade-up">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="career-detail">
                    {{-- Description --}}
                    <div class="detail-section">
                        <h3>Job Description</h3>
                        <div class="content-text">
                            {!! $career->description !!}
                        </div>
                    </div>

                    {{-- Responsibilities --}}
                    @if($career->responsibilities)
                        <div class="detail-section">
                            <h3>Key Responsibilities</h3>
                            <div class="content-text">
                                {!! $career->responsibilities !!}
                            </div>
                        </div>
                    @endif

                    {{-- Requirements --}}
                    @if($career->requirements)
                        <div class="detail-section">
                            <h3>Requirements</h3>
                            <div class="content-text">
                                {!! $career->requirements !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-4">
                <div class="career-sidebar">
                    {{-- Apply Now --}}
                    <div class="sidebar-card apply-card golden">
                        <h4>Apply Now</h4>
                        <p>Ready to join our team? Submit your application today.</p>
                        <button class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#applyModal">
                            Apply for this Position
                        </button>
                    </div>

                    {{-- Quick Info --}}
                    <div class="sidebar-card info-card">
                        <h4>Position Details</h4>
                        <ul>
                            <li>
                                <span class="label">Department</span>
                                <span class="value">{{ $career->department }}</span>
                            </li>
                            <li>
                                <span class="label">Location</span>
                                <span class="value">{{ $career->location }}</span>
                            </li>
                            <li>
                                <span class="label">Employment Type</span>
                                <span class="value">{{ $career->employment_type }}</span>
                            </li>
                            <li>
                                <span class="label">Status</span>
                                <span class="value">
                                    <span class="badge-status {{ $career->status }}">
                                        {{ ucfirst($career->status) }}
                                    </span>
                                </span>
                            </li>
                            <li>
                                <span class="label">Deadline</span>
                                <span class="value">{{ $career->application_deadline->format('M d, Y') }}</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Share --}}
                    <div class="sidebar-card share-card">
                        <h4>Share This Position</h4>
                        <div class="share-links">
                            <a href="#" onclick="window.open('https://www.linkedin.com/sharing/share-offsite/?url='+encodeURIComponent(window.location.href), '_blank', 'width=600,height=600'); return false;">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="#" onclick="window.open('https://twitter.com/intent/tweet?text='+encodeURIComponent('{{ $career->job_title }} at Kent Consultants Ltd')+'&url='+encodeURIComponent(window.location.href), '_blank', 'width=600,height=600'); return false;">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                            <a href="#" onclick="window.open('https://wa.me/?text='+encodeURIComponent('{{ $career->job_title }} at Kent Consultants Ltd - ' + window.location.href), '_blank'); return false;">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <a href="#" onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied to clipboard!'); return false;">
                                <i class="bi bi-link"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Application Modal --}}
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel">Apply for {{ $career->job_title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('careers.apply', $career) }}" method="POST" enctype="multipart/form-data" id="applyForm">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Full Name <span class="required">*</span></label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email Address <span class="required">*</span></label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="cover_letter">Cover Letter</label>
                                <textarea name="cover_letter" id="cover_letter" rows="5" class="form-control @error('cover_letter') is-invalid @enderror" 
                                          placeholder="Tell us why you're the right candidate for this position..."></textarea>
                                @error('cover_letter')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="cv">Upload CV <span class="required">*</span></label>
                                <input type="file" name="cv" id="cv" class="form-control @error('cv') is-invalid @enderror" 
                                       accept=".pdf,.doc,.docx" required>
                                <small class="text-muted">Accepted formats: PDF, DOC, DOCX (Max 5MB)</small>
                                @error('cv')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="applyForm" class="btn btn-gold">
                    Submit Application
                </button>
            </div>
        </div>
    </div>
</div>
@endsection