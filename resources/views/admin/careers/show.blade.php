{{-- resources/views/admin/careers/show.blade.php --}}
@extends('layouts.admin')

@section('title', $career->job_title . ' - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.careers.index') }}">Job Listings</a></li>
    <li class="breadcrumb-item active">{{ Str::limit($career->job_title, 30) }}</li>
@endsection

@section('content')
@php
    $statusColors = ['draft' => 'secondary', 'published' => 'success', 'closed' => 'danger'];
    $deadline = \Carbon\Carbon::parse($career->application_deadline);
@endphp

<div class="admin-page-header">
    <div>
        <h1>{{ $career->job_title }}</h1>
        <p class="text-muted">
            <i class="bi bi-building"></i> {{ $career->department }} &nbsp;&middot;&nbsp;
            <i class="bi bi-geo-alt"></i> {{ $career->location }} &nbsp;&middot;&nbsp;
            <i class="bi bi-clock"></i> {{ $career->employment_type }}
        </p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.careers.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        @can('update', $career)
            <a href="{{ route('admin.careers.edit', $career) }}" class="btn btn-outline-primary">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#statusModal">
                <i class="bi bi-arrow-repeat"></i> Status
            </button>
        @endcan
        @can('delete', $career)
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="bi bi-trash"></i>
            </button>
        @endcan
    </div>
</div>

<div class="row g-4">
    {{-- Left Column --}}
    <div class="col-lg-8">
        {{-- Description --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5><i class="bi bi-file-text"></i> Job Description</h5>
            </div>
            <div class="card-body">
                <p style="white-space: pre-line;">{{ $career->description }}</p>
            </div>
        </div>

        @if($career->responsibilities)
        <div class="card mb-4">
            <div class="card-header">
                <h5><i class="bi bi-list-check"></i> Key Responsibilities</h5>
            </div>
            <div class="card-body">
                <p style="white-space: pre-line;">{{ $career->responsibilities }}</p>
            </div>
        </div>
        @endif

        @if($career->requirements)
        <div class="card mb-4">
            <div class="card-header">
                <h5><i class="bi bi-patch-check"></i> Requirements & Qualifications</h5>
            </div>
            <div class="card-body">
                <p style="white-space: pre-line;">{{ $career->requirements }}</p>
            </div>
        </div>
        @endif

        {{-- Applications --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5><i class="bi bi-people"></i> Recent Applications</h5>
                <a href="{{ route('admin.career-applications.index', ['career_id' => $career->id]) }}"
                   class="btn btn-sm btn-outline-primary">
                    View All ({{ $career->applications->count() }})
                </a>
            </div>
            <div class="card-body p-0">
                @if($career->applications->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-admin mb-0">
                            <thead>
                                <tr>
                                    <th>Applicant</th>
                                    <th>Email</th>
                                    <th>Applied</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($career->applications->take(5) as $application)
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
                                    <tr>
                                        <td class="fw-semibold">{{ $application->applicant_name }}</td>
                                        <td>{{ $application->email }}</td>
                                        <td>{{ $application->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <span class="badge bg-{{ $appColors[$application->status] ?? 'secondary' }}">
                                                {{ ucfirst($application->status) }}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.career-applications.show', $application) }}"
                                               class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4 text-muted">
                        <i class="bi bi-people fs-1 d-block mb-2 opacity-50"></i>
                        <p class="mb-0">No applications received yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Right Column --}}
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Job Details</h5>
            </div>
            <div class="card-body">
                <dl class="row g-2 mb-0">
                    <dt class="col-sm-5 text-muted small">Status</dt>
                    <dd class="col-sm-7">
                        <span class="badge bg-{{ $statusColors[$career->status] ?? 'secondary' }}">
                            {{ ucfirst($career->status) }}
                        </span>
                    </dd>

                    <dt class="col-sm-5 text-muted small">Department</dt>
                    <dd class="col-sm-7 fw-semibold">{{ $career->department }}</dd>

                    <dt class="col-sm-5 text-muted small">Location</dt>
                    <dd class="col-sm-7">{{ $career->location }}</dd>

                    <dt class="col-sm-5 text-muted small">Employment</dt>
                    <dd class="col-sm-7">{{ $career->employment_type }}</dd>

                    <dt class="col-sm-5 text-muted small">Deadline</dt>
                    <dd class="col-sm-7 {{ $deadline->isPast() ? 'text-danger' : '' }}">
                        {{ $deadline->format('M d, Y') }}
                        @if($deadline->isPast())
                            <span class="badge bg-danger d-block mt-1" style="width:fit-content;">Expired</span>
                        @else
                            <small class="text-muted d-block">{{ $deadline->diffForHumans() }}</small>
                        @endif
                    </dd>

                    <dt class="col-sm-5 text-muted small">Applications</dt>
                    <dd class="col-sm-7">
                        <span class="badge bg-light text-dark fs-6">{{ $career->applications->count() }}</span>
                    </dd>
                </dl>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <dl class="row g-2 mb-0">
                    <dt class="col-sm-5 text-muted small">Created By</dt>
                    <dd class="col-sm-7">{{ $career->creator->name ?? 'N/A' }}</dd>

                    <dt class="col-sm-5 text-muted small">Created</dt>
                    <dd class="col-sm-7">{{ $career->created_at->format('M d, Y') }}</dd>

                    @if($career->updater)
                        <dt class="col-sm-5 text-muted small">Updated By</dt>
                        <dd class="col-sm-7">{{ $career->updater->name }}</dd>

                        <dt class="col-sm-5 text-muted small">Updated</dt>
                        <dd class="col-sm-7">{{ $career->updated_at->format('M d, Y') }}</dd>
                    @endif
                </dl>
            </div>
        </div>
    </div>
</div>

{{-- Status Modal --}}
@can('update', $career)
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.careers.change-status', $career) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Change status for <strong>{{ $career->job_title }}</strong></p>
                    <select name="status" class="form-select">
                        <option value="draft"     {{ $career->status === 'draft'     ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ $career->status === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="closed"    {{ $career->status === 'closed'    ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-gold">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endcan

{{-- Delete Modal --}}
@can('delete', $career)
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure you want to delete <strong>{{ $career->job_title }}</strong>?</p>
                <p class="text-muted small mb-0">This action cannot be undone and all associated applications will be lost.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.careers.destroy', $career) }}" method="POST" style="display:inline;">
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
    .card-header h5 i {
        color: var(--gold-1);
        margin-right: 8px;
    }
    dl dt { font-weight: 500; }
    dl dd { font-size: 0.9rem; }
</style>
@endpush
