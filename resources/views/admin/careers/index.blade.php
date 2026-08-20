{{-- resources/views/admin/careers/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Job Listings - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Job Listings</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Job Listings</h1>
        <p class="text-muted">Manage career opportunities</p>
    </div>
    <div>
        @can('create', App\Models\Career::class)
            <a href="{{ route('admin.careers.create') }}" class="btn btn-gold">
                <i class="bi bi-plus-lg"></i> Add Job
            </a>
        @endcan
    </div>
</div>

{{-- Filters --}}
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.careers.index') }}" class="row g-3 align-items-end">
            <div class="col-md-5">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Job title or department..."
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Statuses</option>
                    <option value="draft"       {{ request('status') == 'draft'       ? 'selected' : '' }}>Draft</option>
                    <option value="published"   {{ request('status') == 'published'   ? 'selected' : '' }}>Published</option>
                    <option value="closed"      {{ request('status') == 'closed'      ? 'selected' : '' }}>Closed</option>
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-gold flex-fill">
                    <i class="bi bi-search"></i> Filter
                </button>
                @if(request()->hasAny(['search', 'status']))
                    <a href="{{ route('admin.careers.index') }}" class="btn btn-outline-secondary">
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
                        <th>Job Title</th>
                        <th>Department</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Deadline</th>
                        <th>Applications</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($careers as $career)
                        <tr>
                            <td>
                                <a href="{{ route('admin.careers.show', $career) }}" class="fw-semibold text-decoration-none">
                                    {{ Str::limit($career->job_title, 30) }}
                                </a>
                            </td>
                            <td>{{ $career->department }}</td>
                            <td>{{ $career->location }}</td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $career->employment_type }}</span>
                            </td>
                            <td>
                                @php $deadline = \Carbon\Carbon::parse($career->application_deadline); @endphp
                                <span class="{{ $deadline->isPast() ? 'text-danger' : 'text-dark' }}">
                                    {{ $deadline->format('M d, Y') }}
                                </span>
                                @if($deadline->isPast())
                                    <span class="badge bg-danger ms-1">Expired</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.career-applications.index', ['career_id' => $career->id]) }}"
                                   class="badge bg-light text-dark text-decoration-none">
                                    {{ $career->applications_count ?? 0 }}
                                </a>
                            </td>
                            <td>
                                @php
                                    $statusColors = ['draft' => 'secondary', 'published' => 'success', 'closed' => 'danger'];
                                @endphp
                                <span class="badge bg-{{ $statusColors[$career->status] ?? 'secondary' }}">
                                    {{ ucfirst($career->status) }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.careers.show', $career) }}" class="btn btn-outline-secondary" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    @can('update', $career)
                                        <a href="{{ route('admin.careers.edit', $career) }}" class="btn btn-outline-primary" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-warning" title="Change Status"
                                                data-bs-toggle="modal" data-bs-target="#statusModal{{ $career->id }}">
                                            <i class="bi bi-arrow-repeat"></i>
                                        </button>
                                    @endcan
                                    @can('delete', $career)
                                        <button type="button" class="btn btn-outline-danger" title="Delete"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $career->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                <i class="bi bi-briefcase fs-1 d-block mb-2"></i>
                                No job listings found.
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
                Showing {{ $careers->firstItem() ?? 0 }} to {{ $careers->lastItem() ?? 0 }} of {{ $careers->total() }} listings
            </span>
            {{ $careers->appends(request()->query())->links() }}
        </div>
    </div>
</div>

{{-- Status & Delete Modals --}}
@foreach($careers as $career)
    @can('update', $career)
    <div class="modal fade" id="statusModal{{ $career->id }}" tabindex="-1">
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

    @can('delete', $career)
    <div class="modal fade" id="deleteModal{{ $career->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete <strong>{{ $career->job_title }}</strong>?</p>
                    <p class="text-muted small mb-0">This action cannot be undone.</p>
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
@endforeach
@endsection
