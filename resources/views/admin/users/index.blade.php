{{-- resources/views/admin/users/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Users - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Users</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Users</h1>
        <p class="text-muted">Manage system users and their roles</p>
    </div>
    <div>
        @can('create', App\Models\User::class)
            <a href="{{ route('admin.users.create') }}" class="btn btn-gold">
                <i class="bi bi-plus-lg"></i> Add User
            </a>
        @endcan
    </div>
</div>

{{-- Filters --}}
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.users.index') }}" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search by name or email..." 
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Role</label>
                <select name="role" class="form-select">
                    <option value="">All Roles</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ request('role') == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-gold w-100">
                    <i class="bi bi-search"></i> Filter
                </button>
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
                        <th>User</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Joined</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('images/default-avatar.png') }}" 
                                         alt="{{ $user->name }}" width="32" height="32" style="object-fit:cover; border-radius:50%;">
                                    <span class="fw-semibold">{{ $user->name }}</span>
                                    @if(auth()->id() == $user->id)
                                        <span class="badge bg-info">You</span>
                                    @endif
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ?? 'N/A' }}</td>
                            <td>
                                <span class="badge bg-{{ 
                                    $user->role->slug === 'super_admin' ? 'danger' : 
                                    ($user->role->slug === 'admin' ? 'warning' : 
                                    ($user->role->slug === 'manager' ? 'info' : 'secondary')) 
                                }}">
                                    {{ $user->role->name ?? 'N/A' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $user->status ? 'success' : 'danger' }}">
                                    {{ $user->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    @can('view', $user)
                                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-outline-secondary">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    @endcan
                                    @can('update', $user)
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    @endcan
                                    @can('delete', $user)
                                        <button type="button" class="btn btn-outline-danger" 
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                <i class="bi bi-people fs-1 d-block mb-2"></i>
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">
        <div class="d-flex justify-content-between align-items-center">
            <span class="text-muted small">Showing {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }} of {{ $users->total() }} users</span>
            {{ $users->appends(request()->query())->links() }}
        </div>
    </div>
</div>

{{-- Delete Modals --}}
@foreach($users as $user)
    @can('delete', $user)
    <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete <strong>{{ $user->name }}</strong>?</p>
                    @if(auth()->id() == $user->id)
                        <p class="text-danger small mb-0">⚠️ You cannot delete your own account.</p>
                    @elseif($user->isSuperAdmin() && !auth()->user()->isSuperAdmin())
                        <p class="text-danger small mb-0">⚠️ You cannot delete Super Admin accounts.</p>
                    @else
                        <p class="text-muted small mb-0">This action cannot be undone.</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    @if(auth()->id() != $user->id && !($user->isSuperAdmin() && !auth()->user()->isSuperAdmin()))
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
    @endcan
@endforeach
@endsection