@extends('layouts.website')

@section('title', 'Kent Consultants Ltd - Property Management & Real Estate Nairobi')

@section('content')
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
                    <a href="{{ route('about') }}" class="btn-link">
                        Discover Kent Consultants
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="image-wrapper">
                    <img src="{{ asset('images/logo.png') }}" alt="Kent Consultants Office" class="img-fluid">
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
            <div class="row g-4">
                @foreach($featuredProperties as $property)
                    <div class="col-lg-4 col-md-6">
                        @include('components.website.property-card', ['property' => $property])
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
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
@endsection