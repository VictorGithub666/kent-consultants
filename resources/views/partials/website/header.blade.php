{{-- resources/views/partials/website/header.blade.php --}}
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl position-relative">
        <div class="top-row d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Kent Consultants Ltd" class="logo-img">
                <span class="sitename">Kent Consultants</span>
            </a>

            <div class="d-flex align-items-center">
                <div class="social-links d-none d-md-flex">
                    <a href="https://www.facebook.com/KentConsultantsLtd/" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/kent_consultants_ltd/" class="instagram"><i class="bi bi-instagram"></i></a>
                </div>
                
                <div class="header-cta d-none d-lg-block ms-3">
                    <a href="{{ route('properties.index') }}" class="btn btn-gold btn-sm">View Properties</a>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-wrap">
        <div class="container d-flex justify-content-center position-relative">
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                    <li class="dropdown">
                        <a href="#">
                            <span>Properties</span> 
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul>
                            @php
                                $categories = App\Models\PropertyCategory::where('status', true)->get();
                            @endphp
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('properties.category', $category->slug) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                            <li><hr class="dropdown-divider"></li>
                            <li><a href="{{ route('properties.index') }}">All Properties</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
                    <li><a href="{{ route('careers.index') }}" class="{{ request()->routeIs('careers.*') ? 'active' : '' }}">Careers</a></li>
                    <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </div>
</header>