{{-- resources/views/admin/profile/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'My Profile - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">My Profile</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>My Profile</h1>
        <p class="text-muted">Manage your account settings</p>
    </div>
    <div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Dashboard
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body text-center">
                @if($user->profile_photo)
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" 
                         alt="{{ $user->name }}" 
                         class="profile-avatar">
                @else
                    <div class="profile-avatar-default">
                        <i class="bi bi-person-fill"></i>
                    </div>
                @endif
                <h5 class="mt-3 mb-1">{{ $user->name }}</h5>
                <p class="text-muted small">{{ $user->role->name ?? 'User' }}</p>
                <div class="d-flex justify-content-center gap-3">
                    <div>
                        <span class="badge bg-{{ $user->status ? 'success' : 'danger' }}">
                            {{ $user->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
                <hr>
                <div class="text-start">
                    <p class="small mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="small mb-1"><strong>Phone:</strong> {{ $user->phone ?? 'Not set' }}</p>
                    <p class="small mb-0"><strong>Joined:</strong> {{ $user->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5>Update Profile</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                                       value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" 
                                       value="{{ old('phone', $user->phone) }}" placeholder="+254 700 000 000">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="profile_photo" class="form-label">Profile Photo</label>
                                @if($user->profile_photo)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $user->profile_photo) }}" 
                                             alt="Current Profile Photo" 
                                             style="max-height:100px; border-radius:8px; border:2px solid #ddd;">
                                        <p class="text-muted small mt-1">Current photo — upload a new one to replace it.</p>
                                    </div>
                                @endif
                                <input type="file" name="profile_photo" id="profile_photo" 
                                       class="form-control @error('profile_photo') is-invalid @enderror" 
                                       accept="image/*" data-preview="photoPreview">
                                <small class="text-muted">Recommended: 300 x 300px, Max 5MB (JPG, PNG, GIF)</small>
                                <div class="mt-2">
                                    <img id="photoPreview" src="#" alt="Preview" style="display:none; max-height:150px; border-radius:8px;">
                                </div>
                                @error('profile_photo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <h5 class="border-bottom pb-2 mb-3">Change Password</h5>
                            <p class="text-muted small">Leave empty to keep current password</p>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" name="current_password" id="current_password" 
                                       class="form-control @error('current_password') is-invalid @enderror">
                                @error('current_password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" name="password" id="password" 
                                       class="form-control @error('password') is-invalid @enderror">
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
                                <i class="bi bi-check-lg"></i> Update Profile
                            </button>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-lg">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid var(--gold-1);
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .profile-avatar-default {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid var(--gold-1);
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        background: #e9ecef;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }
    .profile-avatar-default i {
        font-size: 60px;
        color: #adb5bd;
    }
</style>
@endpush

@push('scripts')
<script>
    // Image preview for file input
    document.getElementById('profile_photo').addEventListener('change', function(e) {
        const preview = document.getElementById('photoPreview');
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(ev) {
                preview.src = ev.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endpush
@endsection