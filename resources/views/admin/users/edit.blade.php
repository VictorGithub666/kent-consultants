{{-- resources/views/admin/users/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit User - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
    <li class="breadcrumb-item active">Edit: {{ $user->name }}</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Edit User</h1>
        <p class="text-muted">Update account for {{ $user->name }}</p>
    </div>
    <div>
        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-outline-secondary me-2">
            <i class="bi bi-eye"></i> View
        </a>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Users
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" id="phone"
                               class="form-control @error('phone') is-invalid @enderror"
                               value="{{ old('phone', $user->phone) }}" placeholder="+254 700 000 000">
                        @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role_id" class="form-label">Role <span class="text-danger">*</span></label>
                        <select name="role_id" id="role_id"
                                class="form-select @error('role_id') is-invalid @enderror" required>
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                                @if(auth()->user()->isSuperAdmin() || $role->slug !== 'super_admin')
                                    <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('role_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input type="checkbox" name="status" id="status" class="form-check-input"
                                   value="1" {{ old('status', $user->status) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                        <small class="text-muted">Inactive users cannot log in</small>
                    </div>
                </div>

                {{-- Password change section --}}
                <div class="col-12">
                    <h5 class="border-bottom pb-2 mb-3">Change Password</h5>
                    <p class="text-muted small">Leave empty to keep the current password.</p>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" name="password" id="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Minimum 8 characters">
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                </div>

                <div class="col-12">
                    <hr>
                    <button type="submit" class="btn btn-gold btn-lg">
                        <i class="bi bi-check-lg"></i> Update User
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
