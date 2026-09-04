{{-- resources/views/v2/properties/index.blade.php --}}
@extends('layouts.website2')

@section('title', 'Properties - Kent Consultants Ltd')
@section('description', 'Browse all properties managed by Kent Consultants Ltd — residential estates, commercial buildings, towers and warehouses across Nairobi, Kenya.')
@section('body_class', 'properties-page')
@section('nav_properties', 'active')

@section('content')

{{-- Page Header --}}
<div class="kc2-page-header">
    <div class="container text-center">
        <h1 data-aos="fade-down">All Properties</h1>
        <p data-aos="fade-up" data-aos-delay="100">Explore our managed residential and commercial portfolio</p>
    </div>
</div>

{{-- Category Filter Tabs --}}
<section class="section kc2-section-odd">
    <div class="container">

        {{-- Category quick-links --}}
        @if($categories->count() > 0)
        <div class="kc2-category-tabs" data-aos="fade-up">
            <a href="{{ route('v2.properties.index') }}" class="kc2-cat-tab kc2-cat-tab--active">All</a>
            @foreach($categories as $cat)
            <a href="{{ route('v2.properties.category', $cat->slug) }}" class="kc2-cat-tab">{{ $cat->name }}</a>
            @endforeach
        </div>
        @endif

        {{-- Properties grid --}}
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
                        @if($property->category)
                        <span class="kc2-property-badge kc2-property-badge--cat">{{ $property->category->name }}</span>
                        @endif
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
            <h4 class="mt-3">No Properties Available</h4>
            <p class="text-muted">Please check back soon for new listings.</p>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="call-to-action section dark-background">
    <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-xl-9 text-center text-xl-start">
                <h3>Interested in a Property?</h3>
                <p>Contact Kent Consultants Ltd to enquire about any of our managed properties or to discuss your property needs.</p>
            </div>
            <div class="col-xl-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{ route('v2.contact') }}">Contact Us</a>
            </div>
        </div>
    </div>
</section>

@endsection
