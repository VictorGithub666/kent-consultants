{{-- resources/views/admin/career-applications/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Job Applications - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Applications</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Job Applications</h1>
        <p class="text-muted">Review and manage career applications</p>
    </div>
</div>

{{-- Filters --}}
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.career-applications.index') }}" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Name or email..."
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Statuses</option>
                    @foreach(['new','reviewing','shortlisted','interview','accepted','rejected'] as $s)
                        <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-gold flex-fill">
                    <i class="bi bi-search"></i> Filter
                </button>
                @if(request()->hasAny(['search', 'status', 'career_id']))
                    <a href="{{ route('admin.career-applications.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

{{-- Table --}}
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-admin mb-0">
                <thead>
                    <tr>
                        <th>Applicant</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Job Applied For</th>
                        <th>Applied</th>
                        <th>CV</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $application)
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
                            <td>{{ $application->phone ?? 'N/A' }}</td>
                            <td>
                                @if($application->career)
                                    <a href="{{ route('admin.careers.show', $application->career) }}" class="text-decoration-none small">
                                        {{ Str::limit($application->career->job_title, 25) }}
                                    </a>
                                @else
                                    <span class="text-muted small">Deleted listing</span>
                                @endif
                            </td>
                            <td>{{ $application->created_at->format('M d, Y') }}</td>
                            <td>
                                @if($application->cv_path)
                                    <a href="{{ route('admin.career-applications.download-cv', $application) }}"
                                       class="btn btn-sm btn-outline-secondary" title="Download CV">
                                        <i class="bi bi-download"></i> CV
                                    </a>
                                @else
                                    <span class="text-muted small">None</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $appColors[$application->status] ?? 'secondary' }}">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.career-applications.show', $application) }}"
                                       class="btn btn-outline-secondary" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    @can('delete', $application)
                                        <button type="button" class="btn btn-outline-danger" title="Delete"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $application->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                <i class="bi bi-people fs-1 d-block mb-2"></i>
                                No applications found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">
        <div class="d-flex justify-content-between align-items-center">
            <span class="text-muted small">
                Showing {{ $applications->firstItem() ?? 0 }} to {{ $applications->lastItem() ?? 0 }} of {{ $applications->total() }} applications
            </span>
            {{ $applications->appends(request()->query())->links() }}
        </div>
    </div>
</div>

{{-- Delete Modals --}}
@foreach($applications as $application)
    @can('delete', $application)
    <div class="modal fade" id="deleteModal{{ $application->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete the application from <strong>{{ $application->applicant_name }}</strong>?</p>
                    <p class="text-muted small mb-0">This will also delete their uploaded CV file. This action cannot be undone.</p>
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
@endforeach
@endsection
