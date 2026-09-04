{{-- resources/views/v2/properties/category.blade.php --}}
@extends('layouts.website2')

@section('title', $category->name . ' - Kent Consultants Ltd')
@section('description', 'Browse ' . $category->name . ' properties managed by Kent Consultants Ltd in Nairobi, Kenya.')
@section('body_class', 'properties-page')
@section('nav_properties', 'active')

@section('content')

{{-- Page Header --}}
<div class="kc2-page-header">
    <div class="container text-center">
        <h1 data-aos="fade-down">{{ $category->name }}</h1>
        <p data-aos="fade-up" data-aos-delay="100">
            {{ $category->description ?? 'Explore our ' . strtolower($category->name) . ' portfolio in Nairobi, Kenya.' }}
        </p>
    </div>
</div>

{{-- Back + Category tabs --}}
<section class="section kc2-section-odd">
    <div class="container">

        <div class="kc2-category-tabs" data-aos="fade-up">
            <a href="{{ route('v2.properties.index') }}" class="kc2-cat-tab">All Properties</a>
            <a href="{{ route('v2.properties.category', 'residential-estates') }}"
               class="kc2-cat-tab {{ $category->slug === 'residential-estates' ? 'kc2-cat-tab--active' : '' }}">Residential Estates</a>
            <a href="{{ route('v2.properties.category', 'low-cost-housing') }}"
               class="kc2-cat-tab {{ $category->slug === 'low-cost-housing' ? 'kc2-cat-tab--active' : '' }}">Low Cost Housing</a>
            <a href="{{ route('v2.properties.category', 'residential-towers') }}"
               class="kc2-cat-tab {{ $category->slug === 'residential-towers' ? 'kc2-cat-tab--active' : '' }}">Residential Towers</a>
            <a href="{{ route('v2.properties.category', 'commercial-buildings') }}"
               class="kc2-cat-tab {{ $category->slug === 'commercial-buildings' ? 'kc2-cat-tab--active' : '' }}">Commercial Buildings</a>
            <a href="{{ route('v2.properties.category', 'warehouses') }}"
               class="kc2-cat-tab {{ $category->slug === 'warehouses' ? 'kc2-cat-tab--active' : '' }}">Warehouses</a>
        </div>

        @if($properties->count() > 0)
        <div class="row gy-4 mt-2">
            @foreach($properties as $i => $property)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
                <div class="kc2-property-card">
                    <div class="kc2-property-card__img">
                        <img src="{{ $property->main_image ? asset('storage/' . $property->main_image) : asset('images/property-placeholder.jpg') }}"
                             alt="{{ $property->name }}" loading="lazy">
                        <span class="kc2-property-badge kc2-property-badge--type">
                            {{ $property->acquisition_type === 'buying' ? 'For Sale' : 'For Rent' }}
                        </span>
                    </div>
                    <div class="kc2-property-card__body">
                        <h5 class="kc2-property-card__title">{{ $property->name }}</h5>
                        <p class="kc2-property-card__location">
                            <i class="bi bi-geo-alt"></i> {{ $property->location }}
                        </p>
                        <div class="kc2-property-card__details">
                            @if($property->bedrooms)
                                <span><i class="bi bi-door-open"></i> {{ $property->bedrooms }} Bed</span>
                            @endif
                            @if($property->bathrooms)
                                <span><i class="bi bi-droplet"></i> {{ $property->bathrooms }} Bath</span>
                            @endif
                            @if($property->car_parking)
                                <span><i class="bi bi-car-front"></i> {{ $property->car_parking }} Park</span>
                            @endif
                        </div>
                        <div class="kc2-property-card__price">
                            {{ $property->currency }} {{ number_format($property->price, 0) }}
                            @if($property->acquisition_type === 'renting' && $property->rent_frequency)
                                <span>/ {{ $property->rent_frequency }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-5 d-flex justify-content-center" data-aos="fade-up">
            {{ $properties->links() }}
        </div>

        @else
        <div class="text-center py-5" data-aos="fade-up">
            <i class="bi bi-building" style="font-size:3rem;color:var(--kc2-gold);opacity:0.5"></i>
            <h4 class="mt-3">No {{ $category->name }} Available</h4>
            <p class="text-muted">We currently have no listings in this category. Please check back soon or contact us directly.</p>
            <a href="{{ route('v2.properties.index') }}" class="btn-get-started mt-2">View All Properties</a>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="call-to-action section dark-background">
    <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-xl-9 text-center text-xl-start">
                <h3>Interested in {{ $category->name }}?</h3>
                <p>Contact Kent Consultants Ltd to enquire about any of our managed {{ strtolower($category->name) }} or to discuss your property needs.</p>
            </div>
            <div class="col-xl-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{ route('v2.contact') }}">Contact Us</a>
            </div>
        </div>
    </div>
</section>

@endsection
