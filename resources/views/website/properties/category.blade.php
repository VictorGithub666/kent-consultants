{{-- resources/views/website/properties/category.blade.php --}}
@extends('layouts.website')

@section('title', $category->name . ' - Kent Consultants Ltd')
@section('description', $category->description ?? 'Browse our collection of ' . $category->name . ' properties in Nairobi, Kenya.')

@section('content')
<style>
    /* Carousel Styles for Category */
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
    
    /* View toggle */
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
                <div class="d-flex justify-content-end align-items-center gap-3">
                    <div class="view-toggle">
                        <button class="btn-toggle active" data-view="grid" title="Grid View">
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                        </button>
                        <button class="btn-toggle" data-view="carousel" title="Carousel View">
                            <i class="bi bi-view-list"></i>
                        </button>
                    </div>
                    <a href="{{ route('properties.index') }}?category={{ $category->id }}" class="btn btn-outline-gold btn-sm">
                        <i class="bi bi-grid"></i> View All
                    </a>
                </div>
            </div>
        </div>

        @if($properties->count() > 0)
            {{-- Grid View --}}
            <div id="gridView" class="row g-4">
                @foreach($properties as $property)
                    <div class="col-lg-4 col-md-6">
                        @include('components.website.property-card', ['property' => $property])
                    </div>
                @endforeach
            </div>
            
            {{-- Carousel View --}}
            <div id="carouselView" class="property-carousel-wrapper" style="display: none;">
                <button class="carousel-btn prev" id="categoryPrev" aria-label="Previous properties">
                    <i class="bi bi-chevron-left"></i>
                </button>
                
                <div class="property-carousel" id="categoryCarousel">
                    <div class="property-carousel-inner" id="categoryCarouselInner">
                        @foreach($properties as $property)
                            <div class="property-carousel-item">
                                @include('components.website.property-card', ['property' => $property])
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <button class="carousel-btn next" id="categoryNext" aria-label="Next properties">
                    <i class="bi bi-chevron-right"></i>
                </button>
                
                <div class="carousel-dots" id="categoryDots"></div>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // View toggle functionality
    const gridView = document.getElementById('gridView');
    const carouselView = document.getElementById('carouselView');
    const toggleBtns = document.querySelectorAll('.btn-toggle');
    
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const view = this.dataset.view;
            
            toggleBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            if (view === 'grid') {
                gridView.style.display = 'flex';
                carouselView.style.display = 'none';
            } else {
                gridView.style.display = 'none';
                carouselView.style.display = 'block';
                if (!window.categoryCarouselInitialized) {
                    initCategoryCarousel();
                    window.categoryCarouselInitialized = true;
                }
            }
        });
    });
    
    function initCategoryCarousel() {
        const carousel = document.getElementById('categoryCarousel');
        const inner = document.getElementById('categoryCarouselInner');
        const items = inner.querySelectorAll('.property-carousel-item');
        const totalItems = items.length;
        const visibleItems = 3;
        let currentIndex = 0;
        let maxIndex = Math.max(0, totalItems - visibleItems);
        
        const prevBtn = document.getElementById('categoryPrev');
        const nextBtn = document.getElementById('categoryNext');
        const dotsContainer = document.getElementById('categoryDots');
        
        if (totalItems === 0) return;
        
        const totalDots = Math.ceil(totalItems / 1);
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
        
        function goToSlide(index) {
            index = Math.max(0, Math.min(index, maxIndex));
            currentIndex = index;
            
            const translateValue = -index * (100 / visibleItems);
            inner.style.transform = `translateX(${translateValue}%)`;
            
            const dots = dotsContainer.querySelectorAll('.carousel-dot');
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
            
            if (prevBtn) prevBtn.disabled = index === 0;
            if (nextBtn) nextBtn.disabled = index >= maxIndex;
        }
        
        function nextSlide() {
            if (currentIndex < maxIndex) {
                goToSlide(currentIndex + 1);
            }
        }
        
        function prevSlide() {
            if (currentIndex > 0) {
                goToSlide(currentIndex - 1);
            }
        }
        
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        
        document.addEventListener('keydown', function(e) {
            if (carouselView.style.display !== 'none') {
                if (e.key === 'ArrowLeft') prevSlide();
                if (e.key === 'ArrowRight') nextSlide();
            }
        });
        
        let touchStartX = 0;
        let touchEndX = 0;
        
        carousel.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        });
        
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
        });
        
        let autoPlayInterval = null;
        let isHovered = false;
        
        function startAutoPlay() {
            if (autoPlayInterval) clearInterval(autoPlayInterval);
            if (totalItems > visibleItems) {
                autoPlayInterval = setInterval(() => {
                    if (!isHovered) {
                        if (currentIndex >= maxIndex) {
                            goToSlide(0);
                        } else {
                            nextSlide();
                        }
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
        
        carousel.addEventListener('mouseenter', () => {
            isHovered = true;
            stopAutoPlay();
        });
        
        carousel.addEventListener('mouseleave', () => {
            isHovered = false;
            startAutoPlay();
        });
        
        goToSlide(0);
        startAutoPlay();
        
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                const newVisibleItems = window.innerWidth < 576 ? 1 : window.innerWidth < 992 ? 2 : 3;
                maxIndex = Math.max(0, totalItems - newVisibleItems);
                if (currentIndex > maxIndex) {
                    goToSlide(maxIndex);
                } else {
                    goToSlide(currentIndex);
                }
            }, 250);
        });
    }
    
    if (carouselView.style.display !== 'none') {
        initCategoryCarousel();
        window.categoryCarouselInitialized = true;
    }
});
</script>
@endsection