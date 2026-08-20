{{-- resources/views/admin/properties/show.blade.php --}}
@extends('layouts.admin')

@section('title', $property->name . ' - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}">Properties</a></li>
    <li class="breadcrumb-item active">{{ Str::limit($property->name, 30) }}</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>{{ $property->name }}</h1>
        <p class="text-muted">
            <i class="bi bi-geo-alt"></i> {{ $property->location }}
        </p>
    </div>
    <div>
        <div class="btn-group">
            <a href="{{ route('admin.properties.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
            @can('update', $property)
                <a href="{{ route('admin.properties.edit', $property) }}" class="btn btn-outline-primary">
                    <i class="bi bi-pencil"></i> Edit
                </a>
            @endcan
            @can('changeStatus', $property)
                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#statusModal">
                    <i class="bi bi-arrow-repeat"></i> Status
                </button>
            @endcan
            @can('delete', $property)
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <i class="bi bi-trash"></i>
                </button>
            @endcan
        </div>
    </div>
</div>

<div class="row g-4">
    {{-- Main Image --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <img src="{{ $property->main_image ? asset('storage/' . $property->main_image) : asset('images/property-placeholder.jpg') }}" 
                     alt="{{ $property->name }}" class="img-fluid rounded">
            </div>
        </div>
        
        @if($property->images->count() > 0)
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Additional Images</h5>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        @foreach($property->images as $image)
                            <div class="col-3">
                                <img src="{{ asset('storage/' . $image->image_path) }}" 
                                     alt="Property Image" class="img-fluid rounded">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- Details --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5>Property Details</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small">Status</label>
                        <div>
                            <span class="badge-status badge-{{ $property->status }}">
                                {{ ucfirst($property->status) }}
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Acquisition Type</label>
                        <div>
                            <span class="badge bg-{{ $property->acquisition_type === 'buying' ? 'info' : 'warning' }}">
                                {{ $property->acquisition_type === 'buying' ? 'For Sale' : 'For Rent' }}
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Category</label>
                        <div class="fw-semibold">{{ $property->category->name ?? 'N/A' }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Price</label>
                        <div class="fw-semibold text-gold">
                            {{ $property->currency }} {{ number_format($property->price, 0) }}
                            @if($property->acquisition_type === 'renting' && $property->rent_frequency)
                                <span class="text-muted fw-normal">/ {{ $property->rent_frequency }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="text-muted small">Bedrooms</label>
                        <div>{{ $property->bedrooms ?? 'N/A' }}</div>
                    </div>
                    <div class="col-md-3">
                        <label class="text-muted small">Bathrooms</label>
                        <div>{{ $property->bathrooms ?? 'N/A' }}</div>
                    </div>
                    <div class="col-md-3">
                        <label class="text-muted small">Floor Area</label>
                        <div>{{ $property->floor_area ? number_format($property->floor_area) . ' sq ft' : 'N/A' }}</div>
                    </div>
                    <div class="col-md-3">
                        <label class="text-muted small">Car Parking</label>
                        <div>{{ $property->car_parking ?? 'N/A' }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Land Area</label>
                        <div>{{ $property->land_area ? number_format($property->land_area, 2) . ' Acres' : 'N/A' }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Location</label>
                        <div>{{ $property->location }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Description --}}
        @if($property->description)
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Description</h5>
                </div>
                <div class="card-body">
                    <p>{{ $property->description }}</p>
                </div>
            </div>
        @endif

        {{-- Features --}}
        @if($property->features->count() > 0)
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Features & Amenities</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($property->features as $feature)
                            <span class="badge bg-light text-dark p-2">
                                @if($feature->icon)
                                    <i class="{{ $feature->icon }}"></i>
                                @endif
                                {{ $feature->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        {{-- Meta --}}
        <div class="card mt-4">
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-md-6">
                        <label class="text-muted small">Created By</label>
                        <div>{{ $property->creator->name ?? 'N/A' }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Created At</label>
                        <div>{{ $property->created_at->format('M d, Y H:i') }}</div>
                    </div>
                    @if($property->updated_by)
                        <div class="col-md-6">
                            <label class="text-muted small">Updated By</label>
                            <div>{{ $property->updater->name ?? 'N/A' }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small">Updated At</label>
                            <div>{{ $property->updated_at->format('M d, Y H:i') }}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Status Change Modal --}}
@can('changeStatus', $property)
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.properties.change-status', $property) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Change status for <strong>{{ $property->name }}</strong></p>
                    <div class="form-group">
                        <select name="status" class="form-select">
                            <option value="vacant" {{ $property->status === 'vacant' ? 'selected' : '' }}>Vacant</option>
                            <option value="occupied" {{ $property->status === 'occupied' ? 'selected' : '' }}>Occupied</option>
                        </select>
                    </div>
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
@can('delete', $property)
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure you want to delete <strong>{{ $property->name }}</strong>?</p>
                <p class="text-muted small mb-0">This action cannot be undone. All associated images and data will be removed.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endcan

@push('styles')
<style>
    .text-gold {
        color: var(--gold-1);
        font-size: 1.2rem;
    }
    .badge-status {
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }
    .badge-vacant {
        background: #d4edda;
        color: #155724;
    }
    .badge-occupied {
        background: #f8d7da;
        color: #721c24;
    }
</style>
@endpush