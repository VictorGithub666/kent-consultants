{{-- resources/views/admin/categories/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Category - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active">Edit: {{ $category->name }}</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Edit Category</h1>
        <p class="text-muted">Update: {{ $category->name }}</p>
    </div>
    <div>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Categories
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $category->name) }}" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <div class="form-check form-switch mt-2">
                            <input type="checkbox" name="status" id="status" class="form-check-input"
                                   value="1" {{ old('status', $category->status) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                        <small class="text-muted">Inactive categories won't appear on the public website</small>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="3"
                                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image" class="form-label">Category Image</label>
                        @if($category->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                     style="max-height:120px; border-radius:8px; border:2px solid #ddd;">
                                <p class="text-muted small mt-1">Current image — upload a new one to replace it.</p>
                            </div>
                        @endif
                        <input type="file" name="image" id="image"
                               class="form-control @error('image') is-invalid @enderror"
                               accept="image/*" data-preview="imagePreview">
                        <small class="text-muted">Recommended: 600 x 400px, Max 5MB</small>
                        <div class="mt-2">
                            <img id="imagePreview" src="#" alt="Preview" style="display:none; max-height:150px; border-radius:8px;">
                        </div>
                        @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <hr>
                    <button type="submit" class="btn btn-gold btn-lg">
                        <i class="bi bi-check-lg"></i> Update Category
                    </button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
