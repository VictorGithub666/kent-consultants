@extends('layouts.website')

@section('title', 'Kent Consultants Ltd - Property Management & Real Estate Nairobi')

@section('content')
<style>
    /* Carousel Styles */
    .property-carousel-wrapper {
        position: relative;
        padding: 0 50px;
    }
    
    .property-carousel {
        overflow: hidden;
        position: relative;
    }
    
    .property-carousel-inner {
        display: flex;
        transition: transform 0.5s ease-in-out;
        gap: 20px;
    }
    
    .property-carousel-item {
        flex: 0 0 calc(33.333% - 14px);
        min-width: calc(33.333% - 14px);
    }
    
    /* Carousel Navigation Buttons */
    .carousel-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.95);
        border: 2px solid #C9A94E;
        color: #C9A94E;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .carousel-btn:hover {
        background: #C9A94E;
        color: #ffffff;
        transform: translateY(-50%) scale(1.05);
        box-shadow: 0 4px 15px rgba(201, 169, 78, 0.4);
    }
    
    .carousel-btn:disabled {
        opacity: 0.3;
        cursor: not-allowed;
        transform: translateY(-50%) scale(0.95);
    }
    
    .carousel-btn:disabled:hover {
        background: rgba(255, 255, 255, 0.95);
        color: #C9A94E;
        transform: translateY(-50%) scale(0.95);
    }
    
    .carousel-btn.prev {
        left: -10px;
    }
    
    .carousel-btn.next {
        right: -10px;
    }
    
    /* Carousel Dots */
    .carousel-dots {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 30px;
    }
    
    .carousel-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 2px solid #C9A94E;
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 0;
    }
    
    .carousel-dot.active {
        background: #C9A94E;
        transform: scale(1.1);
    }
    
    .carousel-dot:hover {
        background: #C9A94E;
        opacity: 0.7;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .property-carousel-item {
            flex: 0 0 calc(50% - 10px);
            min-width: calc(50% - 10px);
        }
        
        .carousel-btn {
            width: 38px;
            height: 38px;
            font-size: 16px;
        }
    }
    
    @media (max-width: 576px) {
        .property-carousel-item {
            flex: 0 0 100%;
            min-width: 100%;
        }
        
        .property-carousel-wrapper {
            padding: 0 20px;
        }
        
        .carousel-btn {
            width: 32px;
            height: 32px;
            font-size: 14px;
        }
        
        .carousel-btn.prev {
            left: -5px;
        }
        
        .carousel-btn.next {
            right: -5px;
        }
    }
</style>

{{-- Hero Section --}}
<section id="hero" class="hero section dark-background">
    <div class="video-background">
        <video autoplay muted loop playsinline>
            <source src="{{ asset('videos/hero.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="video-overlay"></div>
    </div>
    
    <div class="hero-content">
        <div class="container position-relative">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 data-aos="fade-up" data-aos-delay="100">Property Management. Investment. Value.</h1>
                    <p data-aos="fade-up" data-aos-delay="200">
                        Professional property management, consultancy and real estate solutions designed to protect and maximize the value of your investment.
                    </p>
                    <div class="hero-buttons" data-aos="fade-up" data-aos-delay="300">
                        <a href="{{ route('properties.index') }}" class="btn btn-primary">Explore Properties</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline">Talk to Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="scroll-indicator">
        <span></span>
    </div>
</section>

{{-- Company Introduction --}}
<section id="about-intro" class="about-intro section">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="content">
                    <span class="badge-gold">Since 2008</span>
                    <h2>Kent Consultants Ltd</h2>
                    <p class="lead">
                        Kent Consultants Ltd is a professional Property Management Company dealing in Project Management, 
                        Property Valuations, Consultancy and Management of both Residential and Commercial Properties since 2008.
                    </p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="ratio ratio-1x1">
                    <video autoplay muted loop playsinline>
                        <source src="{{ asset('videos/kent-video.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Property Categories --}}
<section id="categories" class="categories section">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">Categories</span>
        <h2>Property Categories</h2>
        <p>Explore our diverse range of property options across Nairobi and its environs</p>
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row g-4">
            @foreach($categories as $category)
                <div class="col-lg-4 col-md-6">
                    <div class="category-card" data-aos="zoom-in">
                        <div class="category-image">
                            <img src="{{ $category->image ? asset('storage/' . $category->image) : asset('images/categories/placeholder.jpg') }}" 
                                 alt="{{ $category->name }}">
                            <div class="category-overlay">
                                <h3>{{ $category->name }}</h3>
                                <p>{{ $category->description ?? 'Premium properties available' }}</p>
                                <span class="property-count">{{ $category->properties_count }} Properties</span>
                                <a href="{{ route('properties.category', $category->slug) }}" class="btn btn-gold">View Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Featured Properties --}}
<section id="featured-properties" class="featured-properties section">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">Featured</span>
        <h2>Featured Properties</h2>
        <p>Discover our handpicked selection of premium properties</p>
    </div>

    <div class="container" data-aos="fade-up">
        @if($featuredProperties->count() > 0)
            <div class="property-carousel-wrapper">
                <button class="carousel-btn prev" id="featuredPrev" aria-label="Previous properties">
                    <i class="bi bi-chevron-left"></i>
                </button>
                
                <div class="property-carousel" id="featuredCarousel">
                    <div class="property-carousel-inner" id="featuredCarouselInner">
                        @foreach($featuredProperties as $property)
                            <div class="property-carousel-item">
                                @include('components.website.property-card', ['property' => $property])
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <button class="carousel-btn next" id="featuredNext" aria-label="Next properties">
                    <i class="bi bi-chevron-right"></i>
                </button>
                
                <div class="carousel-dots" id="featuredDots"></div>
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('properties.index') }}" class="btn btn-gold">View All Properties</a>
            </div>
        @else
            <div class="empty-state">
                <h4>No Properties Available</h4>
                <p>Check back soon for new listings</p>
            </div>
        @endif
    </div>
</section>

{{-- Statistics --}}
<section id="stats" class="stats section dark-background">
    <div class="container" data-aos="fade-up">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="stat-item" data-aos="zoom-in">
                    <div class="stat-number">{{ number_format($stats['total_properties']) }}</div>
                    <div class="stat-label">Total Properties</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item" data-aos="zoom-in" data-aos-delay="100">
                    <div class="stat-number">{{ number_format($stats['residential']) }}</div>
                    <div class="stat-label">Residential Properties</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item" data-aos="zoom-in" data-aos-delay="200">
                    <div class="stat-number">{{ number_format($stats['commercial']) }}</div>
                    <div class="stat-label">Commercial Properties</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item" data-aos="zoom-in" data-aos-delay="300">
                    <div class="stat-number">{{ number_format($stats['warehouses']) }}</div>
                    <div class="stat-label">Warehouses</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Why Kent Consultants --}}
<section id="why-us" class="why-us section">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="image-wrapper">
                    <img src="{{ asset('images/logo.png') }}" alt="Why Kent Consultants" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="content">
                    <span class="badge-gold">Why Us</span>
                    <h2>Why Kent Consultants</h2>
                    <div class="features-list">
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h4>Professionalism</h4>
                                <p>Delivering excellence in every aspect of property management</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h4>Integrity</h4>
                                <p>Building trust through transparency and ethical practices</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h4>Customer Focus</h4>
                                <p>Tailored solutions that prioritize your needs and goals</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h4>Since 2008</h4>
                                <p>Over 15 years of experience in the Kenyan property market</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Mission Vision Values --}}
<section id="mission-vision" class="mission-vision section light-background">
    <div class="container" data-aos="fade-up">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="mv-card" data-aos="fade-up">
                    <div class="mv-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h3>Mission</h3>
                    <p>To offer professional and customized (one stop shop), Property Management solutions.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mv-card gold" data-aos="fade-up" data-aos-delay="100">
                    <div class="mv-icon">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h3>Vision</h3>
                    <p>To be the premier provider of the highest standards of Property Management.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mv-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="mv-icon">
                        <i class="bi bi-heart"></i>
                    </div>
                    <h3>Core Values</h3>
                    <ul>
                        <li>Team Spirit</li>
                        <li>Innovativeness</li>
                        <li>Professionalism</li>
                        <li>Integrity</li>
                        <li>Customer Focus</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all carousels
    const carousels = document.querySelectorAll('.property-carousel');
    
    carousels.forEach(function(carousel) {
        const carouselId = carousel.id;
        const inner = document.getElementById(carouselId + 'Inner');
        const items = inner.querySelectorAll('.property-carousel-item');
        const totalItems = items.length;
        const visibleItems = 3; // Number of visible cards
        let currentIndex = 0;
        let maxIndex = Math.max(0, totalItems - visibleItems);
        
        // Get navigation buttons
        const prevBtn = document.getElementById(carouselId.replace('Carousel', 'Prev'));
        const nextBtn = document.getElementById(carouselId.replace('Carousel', 'Next'));
        const dotsContainer = document.getElementById(carouselId.replace('Carousel', 'Dots'));
        
        // Only proceed if there are items
        if (totalItems === 0) return;
        
        // Create dots
        const totalDots = Math.ceil(totalItems / 1); // 1 item per slide
        for (let i = 0; i < totalDots; i++) {
            const dot = document.createElement('button');
            dot.classList.add('carousel-dot');
            if (i === 0) dot.classList.add('active');
            dot.setAttribute('data-index', i);
            dot.addEventListener('click', function() {
                goToSlide(i);
            });
            dotsContainer.appendChild(dot);
        }
        
        // Function to go to a specific slide
        function goToSlide(index) {
            // Ensure index is within bounds
            index = Math.max(0, Math.min(index, maxIndex));
            currentIndex = index;
            
            // Calculate translate value
            const translateValue = -index * (100 / visibleItems);
            inner.style.transform = `translateX(${translateValue}%)`;
            
            // Update dots
            const dots = dotsContainer.querySelectorAll('.carousel-dot');
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
            
            // Update button states
            if (prevBtn) prevBtn.disabled = index === 0;
            if (nextBtn) nextBtn.disabled = index >= maxIndex;
        }
        
        // Next slide function
        function nextSlide() {
            if (currentIndex < maxIndex) {
                goToSlide(currentIndex + 1);
            }
        }
        
        // Previous slide function
        function prevSlide() {
            if (currentIndex > 0) {
                goToSlide(currentIndex - 1);
            }
        }
        
        // Add event listeners to buttons
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') prevSlide();
            if (e.key === 'ArrowRight') nextSlide();
        });
        
        // Touch/swipe support
        let touchStartX = 0;
        let touchEndX = 0;
        
        carousel.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        });
        
        carousel.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });
        
        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
            }
        }
        
        // Auto-play functionality (optional)
        let autoPlayInterval = null;
        let isHovered = false;
        
        function startAutoPlay() {
            if (autoPlayInterval) clearInterval(autoPlayInterval);
            autoPlayInterval = setInterval(() => {
                if (!isHovered) {
                    if (currentIndex >= maxIndex) {
                        goToSlide(0);
                    } else {
                        nextSlide();
                    }
                }
            }, 5000); // Change slide every 5 seconds
        }
        
        function stopAutoPlay() {
            if (autoPlayInterval) {
                clearInterval(autoPlayInterval);
                autoPlayInterval = null;
            }
        }
        
        // Pause autoplay on hover
        carousel.addEventListener('mouseenter', () => {
            isHovered = true;
            stopAutoPlay();
        });
        
        carousel.addEventListener('mouseleave', () => {
            isHovered = false;
            startAutoPlay();
        });
        
        // Initialize carousel
        goToSlide(0);
        
        // Start autoplay
        if (totalItems > visibleItems) {
            startAutoPlay();
        }
        
        // Handle window resize
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                // Recalculate maxIndex based on new visible items count
                const newVisibleItems = getVisibleItemsCount();
                maxIndex = Math.max(0, totalItems - newVisibleItems);
                if (currentIndex > maxIndex) {
                    goToSlide(maxIndex);
                } else {
                    goToSlide(currentIndex);
                }
            }, 250);
        });
        
        // Helper function to get visible items count based on screen width
        function getVisibleItemsCount() {
            const width = window.innerWidth;
            if (width < 576) return 1;
            if (width < 992) return 2;
            return 3;
        }
    });
});
</script>
@endsection