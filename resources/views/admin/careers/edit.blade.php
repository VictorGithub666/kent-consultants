{{-- resources/views/admin/careers/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Job Listing - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.careers.index') }}">Job Listings</a></li>
    <li class="breadcrumb-item active">Edit: {{ Str::limit($career->job_title, 25) }}</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Edit Job Listing</h1>
        <p class="text-muted">Update: {{ $career->job_title }}</p>
    </div>
    <div>
        <a href="{{ route('admin.careers.show', $career) }}" class="btn btn-outline-secondary me-2">
            <i class="bi bi-eye"></i> View
        </a>
        <a href="{{ route('admin.careers.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Jobs
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.careers.update', $career) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">
                {{-- Basic Info --}}
                <div class="col-12">
                    <h5 class="border-bottom pb-2 mb-3">Job Information</h5>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="job_title" class="form-label">Job Title <span class="text-danger">*</span></label>
                        <input type="text" name="job_title" id="job_title"
                               class="form-control @error('job_title') is-invalid @enderror"
                               value="{{ old('job_title', $career->job_title) }}" required>
                        @error('job_title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="department" class="form-label">Department <span class="text-danger">*</span></label>
                        <input type="text" name="department" id="department"
                               class="form-control @error('department') is-invalid @enderror"
                               value="{{ old('department', $career->department) }}" required>
                        @error('department')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                        <input type="text" name="location" id="location"
                               class="form-control @error('location') is-invalid @enderror"
                               value="{{ old('location', $career->location) }}" required>
                        @error('location')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="employment_type" class="form-label">Employment Type <span class="text-danger">*</span></label>
                        <select name="employment_type" id="employment_type"
                                class="form-select @error('employment_type') is-invalid @enderror" required>
                            @foreach(['Full-Time','Part-Time','Contract','Internship','Freelance'] as $type)
                                <option value="{{ $type }}" {{ old('employment_type', $career->employment_type) == $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                        @error('employment_type')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="application_deadline" class="form-label">Application Deadline <span class="text-danger">*</span></label>
                        <input type="date" name="application_deadline" id="application_deadline"
                               class="form-control @error('application_deadline') is-invalid @enderror"
                               value="{{ old('application_deadline', \Carbon\Carbon::parse($career->application_deadline)->format('Y-m-d')) }}"
                               required>
                        @error('application_deadline')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status"
                                class="form-select @error('status') is-invalid @enderror" required>
                            <option value="draft"     {{ old('status', $career->status) == 'draft'     ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $career->status) == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="closed"    {{ old('status', $career->status) == 'closed'    ? 'selected' : '' }}>Closed</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Content --}}
                <div class="col-12">
                    <h5 class="border-bottom pb-2 mb-3">Job Content</h5>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="description" class="form-label">Job Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" rows="5"
                                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $career->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="responsibilities" class="form-label">Key Responsibilities</label>
                        <textarea name="responsibilities" id="responsibilities" rows="5"
                                  class="form-control @error('responsibilities') is-invalid @enderror">{{ old('responsibilities', $career->responsibilities) }}</textarea>
                        @error('responsibilities')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="requirements" class="form-label">Requirements & Qualifications</label>
                        <textarea name="requirements" id="requirements" rows="5"
                                  class="form-control @error('requirements') is-invalid @enderror">{{ old('requirements', $career->requirements) }}</textarea>
                        @error('requirements')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <hr>
                    <button type="submit" class="btn btn-gold btn-lg">
                        <i class="bi bi-check-lg"></i> Update Job Listing
                    </button>
                    <a href="{{ route('admin.careers.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
