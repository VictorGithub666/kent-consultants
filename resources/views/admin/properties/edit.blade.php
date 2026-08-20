{{-- resources/views/admin/properties/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Property - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}">Properties</a></li>
    <li class="breadcrumb-item active">Edit Property</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Edit Property</h1>
        <p class="text-muted">Update property listing: {{ $property->name }}</p>
    </div>
    <div>
        <a href="{{ route('admin.properties.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Properties
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.properties.update', $property) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                {{-- Basic Information --}}
                <div class="col-12">
                    <h5 class="border-bottom pb-2 mb-3">Basic Information</h5>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Property Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name', $property->name) }}" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $property->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                        <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" 
                               value="{{ old('location', $property->location) }}" required>
                        @error('location')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $property->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Acquisition & Pricing --}}
                <div class="col-12">
                    <h5 class="border-bottom pb-2 mb-3">Acquisition & Pricing</h5>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="acquisition_type" class="form-label">Acquisition Type <span class="text-danger">*</span></label>
                        <select name="acquisition_type" id="acquisition_type" class="form-select @error('acquisition_type') is-invalid @enderror" required>
                            <option value="buying" {{ old('acquisition_type', $property->acquisition_type) == 'buying' ? 'selected' : '' }}>For Sale</option>
                            <option value="renting" {{ old('acquisition_type', $property->acquisition_type) == 'renting' ? 'selected' : '' }}>For Rent</option>
                        </select>
                        @error('acquisition_type')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="vacant" {{ old('status', $property->status) == 'vacant' ? 'selected' : '' }}>Vacant</option>
                            <option value="occupied" {{ old('status', $property->status) == 'occupied' ? 'selected' : '' }}>Occupied</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" 
                               value="{{ old('price', $property->price) }}" step="0.01" required>
                        @error('price')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="currency" class="form-label">Currency <span class="text-danger">*</span></label>
                        <select name="currency" id="currency" class="form-select @error('currency') is-invalid @enderror" required>
                            <option value="KSh" {{ old('currency', $property->currency) == 'KSh' ? 'selected' : '' }}>KSh (Kenyan Shilling)</option>
                            <option value="USD" {{ old('currency', $property->currency) == 'USD' ? 'selected' : '' }}>USD</option>
                            <option value="EUR" {{ old('currency', $property->currency) == 'EUR' ? 'selected' : '' }}>EUR</option>
                        </select>
                        @error('currency')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="rent_frequency" class="form-label">Rent Frequency</label>
                        <select name="rent_frequency" id="rent_frequency" class="form-select @error('rent_frequency') is-invalid @enderror">
                            <option value="">Not Applicable</option>
                            <option value="monthly" {{ old('rent_frequency', $property->rent_frequency) == 'monthly' ? 'selected' : '' }}>Monthly</option>
                            <option value="quarterly" {{ old('rent_frequency', $property->rent_frequency) == 'quarterly' ? 'selected' : '' }}>Quarterly</option>
                            <option value="semi-annually" {{ old('rent_frequency', $property->rent_frequency) == 'semi-annually' ? 'selected' : '' }}>Semi-Annually</option>
                            <option value="annually" {{ old('rent_frequency', $property->rent_frequency) == 'annually' ? 'selected' : '' }}>Annually</option>
                        </select>
                        @error('rent_frequency')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Property Details --}}
                <div class="col-12">
                    <h5 class="border-bottom pb-2 mb-3">Property Details</h5>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="bedrooms" class="form-label">Bedrooms</label>
                        <input type="number" name="bedrooms" id="bedrooms" class="form-control @error('bedrooms') is-invalid @enderror" 
                               value="{{ old('bedrooms', $property->bedrooms) }}" min="0">
                        @error('bedrooms')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="bathrooms" class="form-label">Bathrooms</label>
                        <input type="number" name="bathrooms" id="bathrooms" class="form-control @error('bathrooms') is-invalid @enderror" 
                               value="{{ old('bathrooms', $property->bathrooms) }}" min="0">
                        @error('bathrooms')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="floor_area" class="form-label">Floor Area (sq ft)</label>
                        <input type="number" name="floor_area" id="floor_area" class="form-control @error('floor_area') is-invalid @enderror" 
                               value="{{ old('floor_area', $property->floor_area) }}" step="0.01" min="0">
                        @error('floor_area')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="car_parking" class="form-label">Car Parking</label>
                        <input type="number" name="car_parking" id="car_parking" class="form-control @error('car_parking') is-invalid @enderror" 
                               value="{{ old('car_parking', $property->car_parking) }}" min="0">
                        @error('car_parking')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="land_area" class="form-label">Land Area (Acres)</label>
                        <input type="number" name="land_area" id="land_area" class="form-control @error('land_area') is-invalid @enderror" 
                               value="{{ old('land_area', $property->land_area) }}" step="0.01" min="0">
                        @error('land_area')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Features --}}
                <div class="col-12">
                    <h5 class="border-bottom pb-2 mb-3">Features & Amenities</h5>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">Select Features</label>
                        <div class="row g-2">
                            @foreach($features as $feature)
                                <div class="col-md-3 col-6">
                                    <div class="form-check">
                                        <input type="checkbox" name="features[]" value="{{ $feature->id }}" 
                                               id="feature_{{ $feature->id }}"
                                               class="form-check-input @error('features') is-invalid @enderror"
                                               {{ $property->features->contains($feature->id) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="feature_{{ $feature->id }}">
                                            @if($feature->icon)
                                                <i class="{{ $feature->icon }}"></i>
                                            @endif
                                            {{ $feature->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('features')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Images --}}
                <div class="col-12">
                    <h5 class="border-bottom pb-2 mb-3">Property Images</h5>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="main_image" class="form-label">Main Image</label>
                        @if($property->main_image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $property->main_image) }}" alt="Current Main Image" 
                                     style="max-height:150px; border-radius:8px; border:2px solid #ddd;">
                            </div>
                        @endif
                        <input type="file" name="main_image" id="main_image" class="form-control @error('main_image') is-invalid @enderror" 
                               accept="image/*" data-preview="mainImagePreview">
                        <small class="text-muted">Leave empty to keep current image. Recommended: 1200 x 800px, Max 5MB</small>
                        <div class="mt-2">
                            <img id="mainImagePreview" src="#" alt="Preview" style="display:none; max-height:150px; border-radius:8px;">
                        </div>
                        @error('main_image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="images" class="form-label">Additional Images</label>
                        <input type="file" name="images[]" id="images" class="form-control @error('images.*') is-invalid @enderror" 
                               accept="image/*" multiple>
                        <small class="text-muted">You can add more images. Max 10 total.</small>
                        @error('images.*')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        @if($property->images->count() > 0)
                            <div class="mt-2">
                                <small class="text-muted">Current additional images: {{ $property->images->count() }}</small>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Submit --}}
                <div class="col-12">
                    <hr>
                    <button type="submit" class="btn btn-gold btn-lg">
                        <i class="bi bi-check-lg"></i> Update Property
                    </button>
                    <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection