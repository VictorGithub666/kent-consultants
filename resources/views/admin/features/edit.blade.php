{{-- resources/views/admin/features/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Feature - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.features.index') }}">Features</a></li>
    <li class="breadcrumb-item active">Edit: {{ $feature->name }}</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Edit Feature</h1>
        <p class="text-muted">Update: {{ $feature->name }}</p>
    </div>
    <div>
        <a href="{{ route('admin.features.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Features
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.features.update', $feature) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Feature Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $feature->name) }}" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="icon" class="form-label">Bootstrap Icon Class</label>
                        <div class="input-group">
                            <span class="input-group-text" id="iconPreviewWrap">
                                <i id="iconPreview" class="{{ old('icon', $feature->icon ?? 'bi bi-star') }}"></i>
                            </span>
                            <input type="text" name="icon" id="icon"
                                   class="form-control @error('icon') is-invalid @enderror"
                                   value="{{ old('icon', $feature->icon) }}" placeholder="e.g., bi bi-droplet">
                        </div>
                        <small class="text-muted">
                            Use Bootstrap Icons class e.g. <code>bi bi-house</code>.
                            Browse at <a href="https://icons.getbootstrap.com" target="_blank" rel="noopener">icons.getbootstrap.com</a>
                        </small>
                        @error('icon')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <div class="form-check form-switch mt-2">
                            <input type="checkbox" name="status" id="status" class="form-check-input"
                                   value="1" {{ old('status', $feature->status) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                        <small class="text-muted">Inactive features won't be available when adding properties</small>
                    </div>
                </div>

                <div class="col-12">
                    <hr>
                    <button type="submit" class="btn btn-gold btn-lg">
                        <i class="bi bi-check-lg"></i> Update Feature
                    </button>
                    <a href="{{ route('admin.features.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('icon').addEventListener('input', function () {
        document.getElementById('iconPreview').className = this.value || 'bi bi-star';
    });
</script>
@endpush
