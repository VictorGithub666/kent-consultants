{{-- resources/views/website/properties/index.blade.php --}}
@extends('layouts.website')

@section('title', 'Properties - Kent Consultants Ltd')
@section('description', 'Browse our selection of residential and commercial properties in Nairobi, Kenya.')

@section('content')
<style>
    /* Carousel Styles for Properties */
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
    
    /* Grid view toggle */
    .view-toggle {
        display: flex;
        gap: 10px;
        align-items: center;
    }
    
    .view-toggle .btn-toggle {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        border: 2px solid #e0e0e0;
        background: transparent;
        color: #666;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .view-toggle .btn-toggle.active {
        border-color: #C9A94E;
        background: #C9A94E;
        color: #ffffff;
    }
    
    .view-toggle .btn-toggle:hover {
        border-color: #C9A94E;
        color: #C9A94E;
    }
    
    .view-toggle .btn-toggle.active:hover {
        color: #ffffff;
    }
    
    /* Responsive */
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
                <div class="d-flex justify-content-end align-items-center gap-3">
                    <div class="view-toggle">
                        <button class="btn-toggle active" data-view="grid" title="Grid View">
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                        </button>
                        <button class="btn-toggle" data-view="carousel" title="Carousel View">
                            <i class="bi bi-view-list"></i>
                        </button>
                    </div>
                    <div class="sort-wrapper">
                        <label for="sort" class="me-2">Sort:</label>
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
        </div>

        @if($properties->count() > 0)
            {{-- Grid View --}}
            <div id="gridView" class="row g-4">
                @foreach($properties as $property)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                        @include('components.website.property-card', ['property' => $property])
                    </div>
                @endforeach
            </div>
            
            {{-- Carousel View --}}
            <div id="carouselView" class="property-carousel-wrapper" style="display: none;">
                <button class="carousel-btn prev" id="propertiesPrev" aria-label="Previous properties">
                    <i class="bi bi-chevron-left"></i>
                </button>
                
                <div class="property-carousel" id="propertiesCarousel">
                    <div class="property-carousel-inner" id="propertiesCarouselInner">
                        @foreach($properties as $property)
                            <div class="property-carousel-item">
                                @include('components.website.property-card', ['property' => $property])
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <button class="carousel-btn next" id="propertiesNext" aria-label="Next properties">
                    <i class="bi bi-chevron-right"></i>
                </button>
                
                <div class="carousel-dots" id="propertiesDots"></div>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // View toggle functionality
    const gridView = document.getElementById('gridView');
    const carouselView = document.getElementById('carouselView');
    const toggleBtns = document.querySelectorAll('.btn-toggle');
    let carouselInitialized = false;
    let carouselInstance = null;
    
    // Get visible items count based on screen width
    function getVisibleItemsCount() {
        const width = window.innerWidth;
        if (width < 576) return 1;
        if (width < 992) return 2;
        return 3;
    }
    
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const view = this.dataset.view;
            
            toggleBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            if (view === 'grid') {
                gridView.style.display = 'flex';
                carouselView.style.display = 'none';
                // Stop autoplay when switching to grid
                if (carouselInstance) {
                    carouselInstance.stopAutoPlay();
                }
            } else {
                gridView.style.display = 'none';
                carouselView.style.display = 'block';
                if (!carouselInitialized) {
                    carouselInstance = initCarousel();
                    carouselInitialized = true;
                } else if (carouselInstance) {
                    carouselInstance.startAutoPlay();
                    // Force a refresh
                    carouselInstance.goToSlide(0);
                }
            }
        });
    });
    
    function initCarousel() {
        const carousel = document.getElementById('propertiesCarousel');
        const inner = document.getElementById('propertiesCarouselInner');
        if (!inner) return null;
        
        const items = inner.querySelectorAll('.property-carousel-item');
        const totalItems = items.length;
        if (totalItems === 0) return null;
        
        let visibleItems = getVisibleItemsCount();
        let currentIndex = 0;
        let maxIndex = Math.max(0, totalItems - visibleItems);
        
        const prevBtn = document.getElementById('propertiesPrev');
        const nextBtn = document.getElementById('propertiesNext');
        const dotsContainer = document.getElementById('propertiesDots');
        
        // Clear existing dots
        if (dotsContainer) dotsContainer.innerHTML = '';
        
        // Create dots
        if (totalItems > visibleItems && dotsContainer) {
            const totalDots = Math.ceil(totalItems / 1);
            for (let i = 0; i < totalDots; i++) {
                const dot = document.createElement('button');
                dot.classList.add('carousel-dot');
                if (i === 0) dot.classList.add('active');
                dot.setAttribute('data-index', i);
                dot.addEventListener('click', function() {
                    goToSlide(parseInt(this.getAttribute('data-index')));
                });
                dotsContainer.appendChild(dot);
            }
        }
        
        // Get the pixel distance between cards
        function getStepSize() {
            if (items.length < 2) {
                return items.length ? items[0].getBoundingClientRect().width : 0;
            }
            // Distance between the start of card 0 and the start of card 1
            // automatically includes the flex `gap`, at any screen width.
            const first = items[0].getBoundingClientRect();
            const second = items[1].getBoundingClientRect();
            return second.left - first.left;
        }
        
        function goToSlide(index) {
            index = Math.max(0, Math.min(index, maxIndex));
            currentIndex = index;
            
            const step = getStepSize();
            inner.style.transform = `translateX(${-index * step}px)`;
            
            if (dotsContainer) {
                const dots = dotsContainer.querySelectorAll('.carousel-dot');
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === index);
                });
            }
            
            if (prevBtn) prevBtn.disabled = index === 0;
            if (nextBtn) nextBtn.disabled = index >= maxIndex;
        }
        
        function nextSlide() {
            if (currentIndex < maxIndex) {
                goToSlide(currentIndex + 1);
            } else {
                goToSlide(0);
            }
        }
        
        function prevSlide() {
            if (currentIndex > 0) {
                goToSlide(currentIndex - 1);
            } else {
                goToSlide(maxIndex);
            }
        }
        
        if (prevBtn) prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            prevSlide();
        });
        
        if (nextBtn) nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            nextSlide();
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (carouselView.style.display !== 'none') {
                if (e.key === 'ArrowLeft') prevSlide();
                if (e.key === 'ArrowRight') nextSlide();
            }
        });
        
        // Touch support
        let touchStartX = 0;
        let touchEndX = 0;
        
        carousel.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });
        
        carousel.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
            }
        }, { passive: true });
        
        // Autoplay
        let autoPlayInterval = null;
        let isHovered = false;
        
        function startAutoPlay() {
            stopAutoPlay();
            if (totalItems > visibleItems) {
                autoPlayInterval = setInterval(() => {
                    if (!isHovered) {
                        nextSlide();
                    }
                }, 5000);
            }
        }
        
        function stopAutoPlay() {
            if (autoPlayInterval) {
                clearInterval(autoPlayInterval);
                autoPlayInterval = null;
            }
        }
        
        carousel.addEventListener('mouseenter', function() {
            isHovered = true;
            stopAutoPlay();
        });
        
        carousel.addEventListener('mouseleave', function() {
            isHovered = false;
            startAutoPlay();
        });
        
        goToSlide(0);
        startAutoPlay();
        
        // Handle resize
        let resizeTimeout;
        let lastWidth = window.innerWidth;
        
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                const newWidth = window.innerWidth;
                if (Math.abs(newWidth - lastWidth) > 50) {
                    lastWidth = newWidth;
                    visibleItems = getVisibleItemsCount();
                    maxIndex = Math.max(0, totalItems - visibleItems);
                    
                    if (dotsContainer) {
                        dotsContainer.innerHTML = '';
                        if (totalItems > visibleItems) {
                            const totalDots = Math.ceil(totalItems / 1);
                            for (let i = 0; i < totalDots; i++) {
                                const dot = document.createElement('button');
                                dot.classList.add('carousel-dot');
                                if (i === 0) dot.classList.add('active');
                                dot.setAttribute('data-index', i);
                                dot.addEventListener('click', function() {
                                    goToSlide(parseInt(this.getAttribute('data-index')));
                                });
                                dotsContainer.appendChild(dot);
                            }
                        }
                    }
                    
                    // Re-render with fresh step size
                    goToSlide(Math.min(currentIndex, maxIndex));
                    
                    if (totalItems > visibleItems) {
                        startAutoPlay();
                    } else {
                        stopAutoPlay();
                    }
                }
            }, 250);
        });
        
        return {
            goToSlide: goToSlide,
            startAutoPlay: startAutoPlay,
            stopAutoPlay: stopAutoPlay,
            nextSlide: nextSlide,
            prevSlide: prevSlide
        };
    }
    
    // If carousel is visible by default (e.g., no grid toggle), initialize it
    if (carouselView.style.display !== 'none') {
        carouselInstance = initCarousel();
        carouselInitialized = true;
    }
});
</script>
@endsection