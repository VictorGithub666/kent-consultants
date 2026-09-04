{{-- resources/views/website/properties/show.blade.php --}}
@extends('layouts.website')

@section('body_class', 'page-dark-nav')

@section('title', $property->name . ' - Kent Consultants Ltd')
@section('description', Str::limit($property->description ?? 'View this ' . $property->category->name . ' property in ' . $property->location, 160))

@section('content')
<style>
    /* Lightbox Styles */
    .lightbox-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.92);
        z-index: 9999;
        opacity: 0;
        transition: opacity 0.3s ease;
        padding: 20px;
        box-sizing: border-box;
    }
    
    .lightbox-overlay.active {
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 1;
    }
    
    .lightbox-content {
        position: relative;
        width: 100%;
        max-width: 1200px;
        max-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .lightbox-image-container {
        width: 100%;
        height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }
    
    .lightbox-image-container img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        border-radius: 8px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        transition: transform 0.3s ease;
    }
    
    /* Close Button */
    .lightbox-close {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.95);
        border: 2px solid #C9A94E;
        color: #C9A94E;
        font-size: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10000;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        padding: 0;
        line-height: 1;
    }
    
    .lightbox-close:hover {
        background: #C9A94E;
        color: #ffffff;
        transform: scale(1.05);
        box-shadow: 0 4px 20px rgba(201, 169, 78, 0.5);
    }
    
    /* Lightbox Navigation Arrows */
    .lightbox-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.95);
        border: 2px solid #C9A94E;
        color: #C9A94E;
        font-size: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10000;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        padding: 0;
        line-height: 1;
    }
    
    .lightbox-nav:hover {
        background: #C9A94E;
        color: #ffffff;
        transform: translateY(-50%) scale(1.05);
        box-shadow: 0 4px 20px rgba(201, 169, 78, 0.5);
    }
    
    .lightbox-nav:disabled {
        opacity: 0.3;
        cursor: not-allowed;
        transform: translateY(-50%) scale(0.95);
    }
    
    .lightbox-nav:disabled:hover {
        background: rgba(255, 255, 255, 0.95);
        color: #C9A94E;
        transform: translateY(-50%) scale(0.95);
    }
    
    .lightbox-nav.prev {
        left: 20px;
    }
    
    .lightbox-nav.next {
        right: 20px;
    }
    
    /* Image Counter */
    .lightbox-counter {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        color: #ffffff;
        font-size: 16px;
        background: rgba(0, 0, 0, 0.6);
        padding: 8px 20px;
        border-radius: 20px;
        border: 1px solid rgba(201, 169, 78, 0.3);
        z-index: 10000;
        font-weight: 500;
        letter-spacing: 0.5px;
    }
    
    /* Thumbnail Navigation */
    .lightbox-thumbnails {
        position: absolute;
        bottom: 80px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
        z-index: 10000;
        max-width: 80%;
        overflow-x: auto;
        padding: 10px;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 12px;
        backdrop-filter: blur(10px);
    }
    
    .lightbox-thumbnails::-webkit-scrollbar {
        height: 4px;
    }
    
    .lightbox-thumbnails::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }
    
    .lightbox-thumbnails::-webkit-scrollbar-thumb {
        background: #C9A94E;
        border-radius: 10px;
    }
    
    .lightbox-thumb {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        border: 2px solid transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        object-fit: cover;
        flex-shrink: 0;
    }
    
    .lightbox-thumb.active {
        border-color: #C9A94E;
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(201, 169, 78, 0.3);
    }
    
    .lightbox-thumb:hover {
        border-color: #C9A94E;
        transform: scale(1.05);
    }
    
    /* Gallery Images Clickable */
    .gallery-image-clickable {
        cursor: pointer;
        transition: transform 0.3s ease;
    }
    
    .gallery-image-clickable:hover {
        transform: scale(1.02);
    }
    
    /* Responsive */
    @media (max-width: 992px) {
        .lightbox-nav {
            width: 45px;
            height: 45px;
            font-size: 22px;
        }
        
        .lightbox-nav.prev {
            left: 10px;
        }
        
        .lightbox-nav.next {
            right: 10px;
        }
        
        .lightbox-close {
            width: 45px;
            height: 45px;
            font-size: 24px;
            top: 15px;
            right: 15px;
        }
        
        .lightbox-thumbnails {
            bottom: 70px;
            gap: 8px;
            padding: 8px;
        }
        
        .lightbox-thumb {
            width: 50px;
            height: 50px;
        }
        
        .lightbox-image-container {
            height: 70vh;
        }
    }
    
    @media (max-width: 576px) {
        .lightbox-nav {
            width: 38px;
            height: 38px;
            font-size: 18px;
        }
        
        .lightbox-nav.prev {
            left: 5px;
        }
        
        .lightbox-nav.next {
            right: 5px;
        }
        
        .lightbox-close {
            width: 38px;
            height: 38px;
            font-size: 20px;
            top: 10px;
            right: 10px;
        }
        
        .lightbox-thumbnails {
            bottom: 60px;
            gap: 6px;
            padding: 6px;
            max-width: 90%;
        }
        
        .lightbox-thumb {
            width: 40px;
            height: 40px;
        }
        
        .lightbox-image-container {
            height: 60vh;
        }
        
        .lightbox-counter {
            font-size: 13px;
            padding: 5px 15px;
            bottom: 20px;
        }
    }
</style>

{{-- Property Gallery --}}
<section class="property-gallery section">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        {{-- Main Image --}}
                        <div class="carousel-item active">
                            <img src="{{ $property->main_image ? asset('storage/' . $property->main_image) : asset('images/property-placeholder.jpg') }}" 
                                 class="d-block w-100 gallery-image-clickable" 
                                 alt="{{ $property->name }}"
                                 data-lightbox-index="0"
                                 onclick="openLightbox(0)">
                        </div>

                        {{-- Additional Images --}}
                        @foreach($property->images as $image)
                            <div class="carousel-item">
                                <img src="{{ asset('storage/' . $image->image_path) }}" 
                                     class="d-block w-100 gallery-image-clickable" 
                                     alt="Property Image {{ $loop->iteration }}"
                                     data-lightbox-index="{{ $loop->iteration + 1 }}"
                                     onclick="openLightbox({{ $loop->iteration + 1 }})">
                            </div>
                        @endforeach
                    </div>

                    {{-- Carousel Controls --}}
                    @if($property->images->count() > 0 || $property->main_image)
                        <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
                <div class="gallery-badges">
                    <span class="badge-status badge-{{ $property->status }}">{{ ucfirst($property->status) }}</span>
                    <span class="badge-type">{{ $property->acquisition_type === 'buying' ? 'For Sale' : 'For Rent' }}</span>
                </div>
                
                {{-- Click hint --}}
                @if($property->images->count() > 0 || $property->main_image)
                    <div class="text-center mt-3">
                        <small class="text-muted">
                            <i class="bi bi-arrows-fullscreen"></i> Click on any image to view in full screen
                        </small>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- Lightbox Modal --}}
<div class="lightbox-overlay" id="lightboxOverlay" onclick="closeLightbox(event)">
    <div class="lightbox-content" onclick="event.stopPropagation();">
        {{-- Close Button --}}
        <button class="lightbox-close" id="lightboxClose" onclick="closeLightbox()" aria-label="Close lightbox">
            <i class="bi bi-x-lg"></i>
        </button>
        
        {{-- Navigation Arrows --}}
        <button class="lightbox-nav prev" id="lightboxPrev" onclick="navigateLightbox(-1)" aria-label="Previous image">
            <i class="bi bi-chevron-left"></i>
        </button>
        
        <button class="lightbox-nav next" id="lightboxNext" onclick="navigateLightbox(1)" aria-label="Next image">
            <i class="bi bi-chevron-right"></i>
        </button>
        
        {{-- Image Container --}}
        <div class="lightbox-image-container" id="lightboxImageContainer">
            <img id="lightboxImage" src="" alt="Property Image">
        </div>
        
        {{-- Image Counter --}}
        <div class="lightbox-counter" id="lightboxCounter">1 / 1</div>
        
        {{-- Thumbnails --}}
        <div class="lightbox-thumbnails" id="lightboxThumbnails"></div>
    </div>
</div>

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

        <div class="container">
            <div class="row g-4">
                @foreach($similarProperties as $similar)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                        @include('components.website.property-card', ['property' => $similar])
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<script>
    // Lightbox functionality
    let lightboxImages = [];
    let currentLightboxIndex = 0;
    let isLightboxOpen = false;

    // Collect all images
    document.addEventListener('DOMContentLoaded', function() {
        // Get main image
        const mainImage = document.querySelector('.carousel-item.active .gallery-image-clickable');
        if (mainImage) {
            lightboxImages.push({
                src: mainImage.getAttribute('src'),
                alt: mainImage.getAttribute('alt') || 'Property Image'
            });
        }

        // Get additional images
        document.querySelectorAll('.carousel-item:not(.active) .gallery-image-clickable').forEach(img => {
            lightboxImages.push({
                src: img.getAttribute('src'),
                alt: img.getAttribute('alt') || 'Property Image'
            });
        });

        // Build thumbnails
        buildThumbnails();

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (!isLightboxOpen) return;
            
            if (e.key === 'Escape') {
                closeLightbox();
            } else if (e.key === 'ArrowLeft') {
                navigateLightbox(-1);
            } else if (e.key === 'ArrowRight') {
                navigateLightbox(1);
            }
        });
    });

    function buildThumbnails() {
        const container = document.getElementById('lightboxThumbnails');
        container.innerHTML = '';
        
        lightboxImages.forEach((image, index) => {
            const thumb = document.createElement('img');
            thumb.src = image.src;
            thumb.alt = image.alt;
            thumb.className = 'lightbox-thumb' + (index === 0 ? ' active' : '');
            thumb.setAttribute('data-index', index);
            thumb.onclick = function() {
                goToImage(parseInt(this.getAttribute('data-index')));
            };
            container.appendChild(thumb);
        });
    }

    function openLightbox(index) {
        if (lightboxImages.length === 0) return;
        
        isLightboxOpen = true;
        const overlay = document.getElementById('lightboxOverlay');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
        
        currentLightboxIndex = Math.max(0, Math.min(index, lightboxImages.length - 1));
        updateLightboxImage();
    }

    function closeLightbox(event) {
        // If event is passed and click was on overlay background, close
        if (event && event.target !== event.currentTarget) return;
        
        isLightboxOpen = false;
        const overlay = document.getElementById('lightboxOverlay');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    function navigateLightbox(direction) {
        const newIndex = currentLightboxIndex + direction;
        if (newIndex < 0 || newIndex >= lightboxImages.length) return;
        
        currentLightboxIndex = newIndex;
        updateLightboxImage();
    }

    function goToImage(index) {
        if (index < 0 || index >= lightboxImages.length) return;
        currentLightboxIndex = index;
        updateLightboxImage();
    }

    function updateLightboxImage() {
        const image = lightboxImages[currentLightboxIndex];
        const imgElement = document.getElementById('lightboxImage');
        const counter = document.getElementById('lightboxCounter');
        const prevBtn = document.getElementById('lightboxPrev');
        const nextBtn = document.getElementById('lightboxNext');
        
        // Update image with fade effect
        imgElement.style.opacity = '0';
        setTimeout(() => {
            imgElement.src = image.src;
            imgElement.alt = image.alt;
            imgElement.style.opacity = '1';
        }, 150);
        
        // Update counter
        counter.textContent = `${currentLightboxIndex + 1} / ${lightboxImages.length}`;
        
        // Update navigation buttons
        prevBtn.disabled = currentLightboxIndex === 0;
        nextBtn.disabled = currentLightboxIndex === lightboxImages.length - 1;
        
        // Update thumbnails
        document.querySelectorAll('.lightbox-thumb').forEach((thumb, index) => {
            thumb.classList.toggle('active', index === currentLightboxIndex);
        });
        
        // Scroll thumbnail into view
        const thumbnails = document.getElementById('lightboxThumbnails');
        const activeThumb = thumbnails.querySelector('.lightbox-thumb.active');
        if (activeThumb) {
            activeThumb.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest',
                inline: 'center'
            });
        }
    }

    // Close lightbox with escape key is handled above
</script>
@endsection