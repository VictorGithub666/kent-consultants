{{-- resources/views/admin/users/show.blade.php --}}
@extends('layouts.admin')

@section('title', $user->name . ' - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
    <li class="breadcrumb-item active">{{ $user->name }}</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>{{ $user->name }}</h1>
        <p class="text-muted">
            {{ $user->role->name ?? 'No role' }}
            @if(auth()->id() == $user->id)
                &nbsp;<span class="badge bg-info">You</span>
            @endif
        </p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        @can('update', $user)
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-outline-primary">
                <i class="bi bi-pencil"></i> Edit
            </a>
        @endcan
        @can('delete', $user)
            @if(auth()->id() != $user->id)
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <i class="bi bi-trash"></i>
                </button>
            @endif
        @endcan
    </div>
</div>

<div class="row g-4">
    {{-- Profile Card --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('images/default-avatar.png') }}"
                     alt="{{ $user->name }}"
                     style="width:100px; height:100px; border-radius:50%; object-fit:cover; border:3px solid var(--gold-1); margin-bottom:16px;">
                <h5 class="mb-1">{{ $user->name }}</h5>
                <p class="text-muted small mb-2">{{ $user->email }}</p>
                <span class="badge bg-{{ 
                    ($user->role->slug ?? '') === 'super_admin' ? 'danger' : 
                    (($user->role->slug ?? '') === 'admin' ? 'warning' : 
                    (($user->role->slug ?? '') === 'manager' ? 'info' : 'secondary')) 
                }}">
                    {{ $user->role->name ?? 'No Role' }}
                </span>
                <span class="badge bg-{{ $user->status ? 'success' : 'danger' }} ms-1">
                    {{ $user->status ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>
    </div>

    {{-- Details --}}
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5>Account Details</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small">Full Name</label>
                        <div class="fw-semibold">{{ $user->name }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Email Address</label>
                        <div>
                            <a href="mailto:{{ $user->email }}" class="text-decoration-none">{{ $user->email }}</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Phone</label>
                        <div>{{ $user->phone ?? '—' }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Role</label>
                        <div>{{ $user->role->name ?? 'No Role' }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Status</label>
                        <div>
                            <span class="badge bg-{{ $user->status ? 'success' : 'danger' }}">
                                {{ $user->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Member Since</label>
                        <div>{{ $user->created_at->format('M d, Y') }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Last Updated</label>
                        <div>{{ $user->updated_at->format('M d, Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
@can('delete', $user)
@if(auth()->id() != $user->id)
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure you want to delete <strong>{{ $user->name }}</strong>?</p>
                @if($user->isSuperAdmin() && !auth()->user()->isSuperAdmin())
                    <p class="text-danger small mb-0">⚠️ You cannot delete Super Admin accounts.</p>
                @else
                    <p class="text-muted small mb-0">This action cannot be undone.</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                @if(!($user->isSuperAdmin() && !auth()->user()->isSuperAdmin()))
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endif
@endcan
@endsection
