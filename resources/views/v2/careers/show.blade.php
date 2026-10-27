{{-- resources/views/v2/careers/show.blade.php --}}
@extends('layouts.website2')

@section('title', $career->job_title . ' - Kent Consultants Ltd')
@section('description', Str::limit(strip_tags($career->description), 160))
@section('body_class', 'career-show-page')
@section('nav_careers', 'active')

@section('content')

{{-- Page Header --}}
<div class="kc2-page-header">
    <div class="container">
        <a href="{{ route('careers') }}" class="text-decoration-none" style="color:rgba(255,255,255,0.7);font-size:14px;">
            <i class="bi bi-arrow-left me-1"></i> Back to Careers
        </a>
        <div class="mt-2">
            <span class="badge-kc2-gold">{{ $career->department }}</span>
        </div>
        <h1 class="mt-2">{{ $career->job_title }}</h1>
        <div class="d-flex flex-wrap gap-3 mt-2" style="color:rgba(255,255,255,0.75);font-size:14px;">
            <span><i class="bi bi-geo-alt me-1"></i>{{ $career->location }}</span>
            <span><i class="bi bi-briefcase me-1"></i>{{ $career->employment_type }}</span>
            <span><i class="bi bi-calendar3 me-1"></i>Deadline: {{ $career->application_deadline->format('M d, Y') }}</span>
        </div>
    </div>
</div>

{{-- Content --}}
<section class="section">
    <div class="container" data-aos="fade-up">
        <div class="row g-5">

            {{-- Main --}}
            <div class="col-lg-8">

                @if($career->description)
                <div class="mb-4">
                    <h3 class="text-kc2-emerald mb-3">Job Description</h3>
                    <div>{!! $career->description !!}</div>
                </div>
                @endif

                @if($career->responsibilities)
                <div class="mb-4">
                    <h3 class="text-kc2-emerald mb-3">Key Responsibilities</h3>
                    <div>{!! $career->responsibilities !!}</div>
                </div>
                @endif

                @if($career->requirements)
                <div class="mb-4">
                    <h3 class="text-kc2-emerald mb-3">Requirements</h3>
                    <div>{!! $career->requirements !!}</div>
                </div>
                @endif

                <div class="mt-4">
                    <button class="btn-apply" data-bs-toggle="modal" data-bs-target="#applyModal" style="font-size:15px;padding:12px 32px;">
                        Apply for This Position
                    </button>
                </div>

            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">
                <div class="career-card mb-4" style="background:var(--kc2-emerald);border-color:var(--kc2-gold);">
                    <h3 style="color:var(--kc2-gold)">Apply Now</h3>
                    <p style="color:rgba(255,255,255,0.85)">Ready to join our team? Submit your application today.</p>
                    <button class="btn-apply w-100" data-bs-toggle="modal" data-bs-target="#applyModal"
                            style="display:block;text-align:center;background:var(--kc2-gold);color:var(--kc2-charcoal);">
                        Apply for this Position
                    </button>
                </div>

                <div class="career-card">
                    <h3>Position Details</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Department</span>
                            <strong>{{ $career->department }}</strong>
                        </li>
                        <li class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Location</span>
                            <strong>{{ $career->location }}</strong>
                        </li>
                        <li class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Type</span>
                            <strong>{{ $career->employment_type }}</strong>
                        </li>
                        <li class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Status</span>
                            <strong>{{ ucfirst($career->status) }}</strong>
                        </li>
                        <li class="d-flex justify-content-between py-2">
                            <span class="text-muted">Deadline</span>
                            <strong>{{ $career->application_deadline->format('M d, Y') }}</strong>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Application Modal --}}
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:var(--kc2-charcoal);">
                <h5 class="modal-title text-white" id="applyModalLabel">Apply for {{ $career->job_title }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('careers.apply', $career) }}" method="POST"
                      enctype="multipart/form-data" id="applyForm">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" required>
                            @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required>
                            @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Phone Number</label>
                            <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone') }}">
                            @error('phone')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Cover Letter</label>
                            <textarea name="cover_letter" rows="5" class="form-control @error('cover_letter') is-invalid @enderror"
                                      placeholder="Tell us why you're the right candidate…">{{ old('cover_letter') }}</textarea>
                            @error('cover_letter')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Upload CV <span class="text-danger">*</span></label>
                            <input type="file" name="cv" class="form-control @error('cv') is-invalid @enderror"
                                   accept=".pdf,.doc,.docx" required>
                            <small class="text-muted">PDF, DOC or DOCX (max 5 MB)</small>
                            @error('cv')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="applyForm"
                        style="background:var(--kc2-emerald);color:#fff;border:none;padding:10px 28px;border-radius:50px;font-weight:700;cursor:pointer;">
                    Submit Application
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
