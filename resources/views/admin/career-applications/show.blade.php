{{-- resources/views/admin/career-applications/show.blade.php --}}
@extends('layouts.admin')

@section('title', $application->applicant_name . ' - Application - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.career-applications.index') }}">Applications</a></li>
    <li class="breadcrumb-item active">{{ $application->applicant_name }}</li>
@endsection

@section('content')
@php
    $appColors = [
        'new'         => 'primary',
        'reviewing'   => 'warning',
        'shortlisted' => 'info',
        'interview'   => 'secondary',
        'accepted'    => 'success',
        'rejected'    => 'danger',
    ];
@endphp

<div class="admin-page-header">
    <div>
        <h1>{{ $application->applicant_name }}</h1>
        <p class="text-muted">
            Application for:
            @if($application->career)
                <a href="{{ route('admin.careers.show', $application->career) }}" class="text-decoration-none">
                    {{ $application->career->job_title }}
                </a>
            @else
                <span>Deleted listing</span>
            @endif
        </p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.career-applications.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        @if($application->cv_path)
            <a href="{{ route('admin.career-applications.download-cv', $application) }}"
               class="btn btn-outline-primary">
                <i class="bi bi-download"></i> Download CV
            </a>
        @endif
        @can('delete', $application)
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="bi bi-trash"></i>
            </button>
        @endcan
    </div>
</div>

<div class="row g-4">
    {{-- Applicant Details --}}
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5><i class="bi bi-person"></i> Applicant Information</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small">Full Name</label>
                        <div class="fw-semibold">{{ $application->applicant_name }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Email Address</label>
                        <div>
                            <a href="mailto:{{ $application->email }}" class="text-decoration-none">
                                {{ $application->email }}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Phone Number</label>
                        <div>
                            @if($application->phone)
                                <a href="tel:{{ $application->phone }}" class="text-decoration-none">
                                    {{ $application->phone }}
                                </a>
                            @else
                                <span class="text-muted">Not provided</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Application Date</label>
                        <div>{{ $application->created_at->format('M d, Y \a\t H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>

        @if($application->cover_letter)
        <div class="card mb-4">
            <div class="card-header">
                <h5><i class="bi bi-chat-text"></i> Cover Letter</h5>
            </div>
            <div class="card-body">
                <p style="white-space: pre-line; line-height: 1.8;">{{ $application->cover_letter }}</p>
            </div>
        </div>
        @endif

        {{-- Job Details --}}
        @if($application->career)
        <div class="card">
            <div class="card-header">
                <h5><i class="bi bi-briefcase"></i> Applied Position</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small">Job Title</label>
                        <div class="fw-semibold">{{ $application->career->job_title }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Department</label>
                        <div>{{ $application->career->department }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Location</label>
                        <div>{{ $application->career->location }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Employment Type</label>
                        <div>{{ $application->career->employment_type }}</div>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.careers.show', $application->career) }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-eye"></i> View Full Job Listing
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>

    {{-- Right Column --}}
    <div class="col-lg-4">
        {{-- Status Management --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5>Application Status</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <span class="badge bg-{{ $appColors[$application->status] ?? 'secondary' }} fs-6 px-3 py-2">
                        {{ ucfirst($application->status) }}
                    </span>
                </div>
                @can('update', $application)
                <form action="{{ route('admin.career-applications.update', $application) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Update Status</label>
                        <select name="status" class="form-select">
                            @foreach(['new','reviewing','shortlisted','interview','accepted','rejected'] as $s)
                                <option value="{{ $s }}" {{ $application->status === $s ? 'selected' : '' }}>
                                    {{ ucfirst($s) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-gold w-100">
                        <i class="bi bi-check-lg"></i> Update Status
                    </button>
                </form>
                @endcan
            </div>
        </div>

        {{-- CV Download --}}
        @if($application->cv_path)
        <div class="card mb-4">
            <div class="card-body text-center">
                <i class="bi bi-file-earmark-person fs-1 text-muted d-block mb-3"></i>
                <p class="mb-3">CV / Resume on file</p>
                <a href="{{ route('admin.career-applications.download-cv', $application) }}"
                   class="btn btn-gold w-100">
                    <i class="bi bi-download"></i> Download CV
                </a>
            </div>
        </div>
        @endif
    </div>
</div>

{{-- Delete Modal --}}
@can('delete', $application)
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure you want to delete the application from <strong>{{ $application->applicant_name }}</strong>?</p>
                <p class="text-muted small mb-0">This will also delete their CV file. This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.career-applications.destroy', $application) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection

@push('styles')
<style>
    .card-header h5 i { color: var(--gold-1); margin-right: 8px; }
</style>
@endpush
