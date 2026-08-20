{{-- resources/views/website/properties/index.blade.php --}}
@extends('layouts.website')

@section('title', 'Properties - Kent Consultants Ltd')
@section('description', 'Browse our selection of residential and commercial properties in Nairobi, Kenya.')

@section('content')
{{-- Page Header --}}
<section class="page-header properties-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge-gold">Properties</span>
                <h1>Find Your Perfect Property</h1>
                <p class="lead">Browse our selection of residential and commercial properties in Nairobi</p>
            </div>
        </div>
    </div>
</section>

{{-- Search Filters --}}
<section class="property-filters section">
    <div class="container" data-aos="fade-up">
        <div class="filter-wrapper">
            <form action="{{ route('properties.index') }}" method="GET" class="filter-form">
                <div class="row g-3">
                    <div class="col-lg-2 col-md-6">
                        <div class="filter-group">
                            <label for="acquisition_type">Type</label>
                            <select name="acquisition_type" id="acquisition_type" class="form-select">
                                <option value="">All Types</option>
                                <option value="buying" {{ request('acquisition_type') == 'buying' ? 'selected' : '' }}>For Sale</option>
                                <option value="renting" {{ request('acquisition_type') == 'renting' ? 'selected' : '' }}>For Rent</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="filter-group">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-select">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="filter-group">
                            <label for="bedrooms">Bedrooms</label>
                            <select name="bedrooms" id="bedrooms" class="form-select">
                                <option value="">Any</option>
                                @for($i = 1; $i <= 6; $i++)
                                    <option value="{{ $i }}" {{ request('bedrooms') == $i ? 'selected' : '' }}>{{ $i }}+</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="filter-group">
                            <label for="bathrooms">Bathrooms</label>
                            <select name="bathrooms" id="bathrooms" class="form-select">
                                <option value="">Any</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ request('bathrooms') == $i ? 'selected' : '' }}>{{ $i }}+</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="filter-group">
                            <label for="price_min">Min Price (KSh)</label>
                            <input type="number" name="price_min" id="price_min" class="form-control" 
                                   value="{{ request('price_min') }}" placeholder="0">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="filter-group">
                            <label for="price_max">Max Price (KSh)</label>
                            <input type="number" name="price_max" id="price_max" class="form-control" 
                                   value="{{ request('price_max') }}" placeholder="No max">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-2">
                    <div class="col-md-8">
                        <div class="filter-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" 
                                   value="{{ request('location') }}" placeholder="Search by location...">
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-gold w-100">
                            <i class="bi bi-search"></i> Search Properties
                        </button>
                    </div>
                </div>
                @if(request()->hasAny(['acquisition_type', 'category', 'bedrooms', 'bathrooms', 'price_min', 'price_max', 'location']))
                    <div class="row mt-3">
                        <div class="col-12">
                            <a href="{{ route('properties.index') }}" class="btn btn-outline-gold btn-sm">
                                <i class="bi bi-x"></i> Clear Filters
                            </a>
                        </div>
                    </div>
                @endif
            </form>
        </div>
    </div>
</section>

{{-- Properties Grid --}}
<section class="properties-grid section">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <p class="results-count">{{ $properties->total() }} properties found</p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="sort-wrapper">
                    <label for="sort">Sort by:</label>
                    <select name="sort" id="sort" class="form-select form-select-sm" onchange="window.location.href=this.value">
                        <option value="{{ route('properties.index', array_merge(request()->query(), ['sort' => 'newest'])) }}" 
                                {{ request('sort') == 'newest' || !request('sort') ? 'selected' : '' }}>
                            Newest First
                        </option>
                        <option value="{{ route('properties.index', array_merge(request()->query(), ['sort' => 'price_low'])) }}" 
                                {{ request('sort') == 'price_low' ? 'selected' : '' }}>
                            Price: Low to High
                        </option>
                        <option value="{{ route('properties.index', array_merge(request()->query(), ['sort' => 'price_high'])) }}" 
                                {{ request('sort') == 'price_high' ? 'selected' : '' }}>
                            Price: High to Low
                        </option>
                    </select>
                </div>
            </div>
        </div>

        @if($properties->count() > 0)
            <div class="row g-4">
                @foreach($properties as $property)
                    <div class="col-lg-4 col-md-6">
                        @include('components.website.property-card', ['property' => $property])
                    </div>
                @endforeach
            </div>
            <div class="mt-5">
                {{ $properties->appends(request()->query())->links() }}
            </div>
        @else
            <div class="empty-state">
                <h4>No Properties Found</h4>
                <p>We couldn't find any properties matching your criteria. Try adjusting your filters.</p>
                <a href="{{ route('properties.index') }}" class="btn btn-gold">View All Properties</a>
            </div>
        @endif
    </div>
</section>
@endsection