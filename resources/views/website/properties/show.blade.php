{{-- resources/views/website/properties/show.blade.php --}}
@extends('layouts.website')

@section('title', $property->name . ' - Kent Consultants Ltd')
@section('description', Str::limit($property->description ?? 'View this ' . $property->category->name . ' property in ' . $property->location, 160))

@section('content')
{{-- Property Gallery --}}
<section class="property-gallery section">
    <div class="container-fluid px-0" data-aos="fade-up">
        <div class="gallery-wrapper">
            <div class="main-image">
                <img src="{{ $property->main_image ? asset('storage/' . $property->main_image) : asset('images/property-placeholder.jpg') }}" 
                     alt="{{ $property->name }}" id="mainGalleryImage">
            </div>
            @if($property->images->count() > 0)
                <div class="thumbnail-strip">
                    <div class="thumbnails">
                        @if($property->main_image)
                            <div class="thumbnail active" data-image="{{ asset('storage/' . $property->main_image) }}">
                                <img src="{{ asset('storage/' . $property->main_image) }}" alt="Main Image">
                            </div>
                        @endif
                        @foreach($property->images as $image)
                            <div class="thumbnail" data-image="{{ asset('storage/' . $image->image_path) }}">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Property Image {{ $loop->iteration }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="gallery-badges">
                <span class="badge-status badge-{{ $property->status }}">{{ ucfirst($property->status) }}</span>
                <span class="badge-type">{{ $property->acquisition_type === 'buying' ? 'For Sale' : 'For Rent' }}</span>
            </div>
        </div>
    </div>
</section>

{{-- Property Details --}}
<section class="property-details section">
    <div class="container" data-aos="fade-up">
        <div class="row g-5">
            <div class="col-lg-8">
                {{-- Property Info --}}
                <div class="property-info">
                    <div class="property-header">
                        <h1>{{ $property->name }}</h1>
                        <div class="property-location">
                            <i class="bi bi-geo-alt"></i> {{ $property->location }}
                        </div>
                        <div class="property-price">
                            {{ $property->currency }} {{ number_format($property->price, 0) }}
                            @if($property->acquisition_type === 'renting' && $property->rent_frequency)
                                <span>/ {{ $property->rent_frequency }}</span>
                            @endif
                        </div>
                        <div class="property-category">
                            <span class="category-tag">{{ $property->category->name }}</span>
                            <span class="type-tag">{{ $property->acquisition_type === 'buying' ? 'For Sale' : 'For Rent' }}</span>
                        </div>
                    </div>

                    {{-- Property Specs --}}
                    <div class="property-specs">
                        @if($property->bedrooms)
                            <div class="spec-item">
                                <i class="bi bi-door-open"></i>
                                <span>{{ $property->bedrooms }} Bedrooms</span>
                            </div>
                        @endif
                        @if($property->bathrooms)
                            <div class="spec-item">
                                <i class="bi bi-droplet"></i>
                                <span>{{ $property->bathrooms }} Bathrooms</span>
                            </div>
                        @endif
                        @if($property->floor_area)
                            <div class="spec-item">
                                <i class="bi bi-arrows-expand"></i>
                                <span>{{ $property->floor_area }} sq. ft.</span>
                            </div>
                        @endif
                        @if($property->land_area)
                            <div class="spec-item">
                                <i class="bi bi-pin-map"></i>
                                <span>{{ $property->land_area }} Acres</span>
                            </div>
                        @endif
                        @if($property->car_parking)
                            <div class="spec-item">
                                <i class="bi bi-car-front"></i>
                                <span>{{ $property->car_parking }} Parking</span>
                            </div>
                        @endif
                    </div>

                    {{-- Description --}}
                    @if($property->description)
                        <div class="property-description">
                            <h3>Description</h3>
                            <p>{{ $property->description }}</p>
                        </div>
                    @endif

                    {{-- Features --}}
                    @if($property->features->count() > 0)
                        <div class="property-features">
                            <h3>Features &amp; Amenities</h3>
                            <div class="features-grid">
                                @foreach($property->features as $feature)
                                    <span class="feature-tag">
                                        @if($feature->icon)
                                            <i class="{{ $feature->icon }}"></i>
                                        @endif
                                        {{ $feature->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Created By --}}
                    <div class="property-meta">
                        <p><i class="bi bi-person"></i> Listed by {{ $property->creator->name ?? 'Admin' }}</p>
                        <p><i class="bi bi-calendar3"></i> Listed on {{ $property->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="property-sidebar">
                    {{-- Contact Agent --}}
                    <div class="sidebar-card contact-card">
                        <h4>Interested in this property?</h4>
                        <p>Contact us for more information or to schedule a viewing.</p>
                        <div class="contact-actions">
                            <a href="{{ route('contact') }}" class="btn btn-gold w-100 mb-2">
                                <i class="bi bi-envelope"></i> Send Inquiry
                            </a>
                            <a href="tel:+254786955170" class="btn btn-outline-gold w-100">
                                <i class="bi bi-telephone"></i> Call Us
                            </a>
                            <a href="https://wa.me/254786955170?text=I%27m%20interested%20in%20{{ urlencode($property->name) }}" 
                               class="btn btn-whatsapp w-100" target="_blank">
                                <i class="bi bi-whatsapp"></i> WhatsApp
                            </a>
                        </div>
                    </div>

                    {{-- Quick Info --}}
                    <div class="sidebar-card info-card">
                        <h4>Quick Information</h4>
                        <ul>
                            <li>
                                <span class="label">Status</span>
                                <span class="value">
                                    <span class="badge-status badge-{{ $property->status }}">
                                        {{ ucfirst($property->status) }}
                                    </span>
                                </span>
                            </li>
                            <li>
                                <span class="label">Category</span>
                                <span class="value">{{ $property->category->name }}</span>
                            </li>
                            <li>
                                <span class="label">Type</span>
                                <span class="value">{{ $property->acquisition_type === 'buying' ? 'For Sale' : 'For Rent' }}</span>
                            </li>
                            @if($property->rent_frequency && $property->acquisition_type === 'renting')
                                <li>
                                    <span class="label">Rent Frequency</span>
                                    <span class="value">{{ $property->rent_frequency }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>

                    {{-- Share --}}
                    <div class="sidebar-card share-card">
                        <h4>Share This Property</h4>
                        <div class="share-links">
                            <a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(window.location.href), '_blank', 'width=600,height=600'); return false;">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" onclick="window.open('https://twitter.com/intent/tweet?text='+encodeURIComponent('{{ $property->name }} - {{ $property->currency }} {{ number_format($property->price, 0) }}')+'&url='+encodeURIComponent(window.location.href), '_blank', 'width=600,height=600'); return false;">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                            <a href="#" onclick="window.open('https://wa.me/?text='+encodeURIComponent('{{ $property->name }} - {{ $property->currency }} {{ number_format($property->price, 0) }} - ' + window.location.href), '_blank'); return false;">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <a href="#" onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied to clipboard!'); return false;">
                                <i class="bi bi-link"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Similar Properties --}}
@if($similarProperties->count() > 0)
    <section class="similar-properties section light-background">
        <div class="container section-title" data-aos="fade-up">
            <span class="subtitle">Similar Properties</span>
            <h2>You Might Also Like</h2>
            <p>Explore similar properties in {{ $property->category->name }}</p>
        </div>

        <div class="container" data-aos="fade-up">
            <div class="row g-4">
                @foreach($similarProperties as $similar)
                    <div class="col-lg-4 col-md-6">
                        @include('components.website.property-card', ['property' => $similar])
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gallery thumbnail click
        const thumbnails = document.querySelectorAll('.thumbnail');
        const mainImage = document.getElementById('mainGalleryImage');
        
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                thumbnails.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                mainImage.src = this.dataset.image;
            });
        });
    });
</script>
@endpush