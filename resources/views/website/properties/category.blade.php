{{-- resources/views/website/properties/category.blade.php --}}
@extends('layouts.website')

@section('title', $category->name . ' - Kent Consultants Ltd')
@section('description', $category->description ?? 'Browse our collection of ' . $category->name . ' properties in Nairobi, Kenya.')

@section('content')
{{-- Category Header --}}
<section class="page-header category-header" style="background-image: url('{{ $category->image ? asset('storage/' . $category->image) : asset('images/categories/header-bg.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge-gold">{{ $category->name }}</span>
                <h1>{{ $category->name }}</h1>
                <p class="lead">{{ $category->description ?? 'Explore our selection of ' . $category->name . ' properties' }}</p>
                <div class="category-stats">
                    <span><i class="bi bi-building"></i> {{ $category->properties_count }} Available Properties</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Properties --}}
<section class="properties-grid section">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <p class="results-count">{{ $properties->total() }} properties in {{ $category->name }}</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ route('properties.index') }}?category={{ $category->id }}" class="btn btn-outline-gold btn-sm">
                    <i class="bi bi-grid"></i> View All
                </a>
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
                {{ $properties->links() }}
            </div>
        @else
            <div class="empty-state">
                <i class="bi bi-building"></i>
                <h4>No Properties Available</h4>
                <p>There are currently no properties available in this category. Please check back later.</p>
                <a href="{{ route('properties.index') }}" class="btn btn-gold">View All Properties</a>
            </div>
        @endif
    </div>
</section>

{{-- Why This Category --}}
<section class="category-why section light-background">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="content">
                    <span class="badge-gold">Why {{ $category->name }}</span>
                    <h2>Why Choose {{ $category->name }}?</h2>
                    <p>
                        {{ $category->name }} properties offer unique advantages for investors and homebuyers 
                        in Nairobi's dynamic real estate market.
                    </p>
                    <div class="features-list">
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h4>Prime Locations</h4>
                                <p>Strategically located properties in Nairobi's most desirable areas</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h4>Quality Construction</h4>
                                <p>Properties built to the highest standards with attention to detail</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h4>Investment Potential</h4>
                                <p>Strong appreciation potential and rental yields in Nairobi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="image-wrapper">
                    <img src="{{ $category->image ? asset('storage/' . $category->image) : asset('images/categories/featured.jpg') }}" 
                         alt="{{ $category->name }}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection