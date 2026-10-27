{{-- resources/views/layouts/website2.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Kent Consultants Ltd - Property Management & Real Estate')</title>
    <meta name="description" content="@yield('description', 'Professional property management, consultancy and real estate solutions in Nairobi, Kenya. Since 2008.')">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('v2-assets/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('v2-assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('v2-assets/vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('v2-assets/vendor/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('v2-assets/vendor/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('v2-assets/vendor/swiper/swiper-bundle.min.css') }}">
    {{-- animate.css CDN fallback if vendor copy is missing --}}

    <!-- Kent Design 2 CSS -->
    <link rel="stylesheet" href="{{ asset('css/website2.css') }}">

    @stack('styles')
</head>
<body class="@yield('body_class', 'index-page')">

    {{-- Preloader --}}
    <div id="preloader">
        <div class="kc2-preloader-inner">
            <img src="{{ asset('images/logo.png') }}" alt="Kent Consultants Ltd" class="kc2-preloader-logo">
        </div>
    </div>

    {{-- Header --}}
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Kent Consultants Ltd">
                <h1 class="sitename ms-2">Kent Consultants</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}" class="@yield('nav_home')">Home</a></li>
                    <li><a href="{{ route('property-management') }}" class="@yield('nav_pm')">Property Management</a></li>
                    <li><a href="{{ route('about') }}" class="@yield('nav_about')">About</a></li>
                    <li><a href="{{ route('services') }}" class="@yield('nav_services')">Services</a></li>
                    <li><a href="{{ route('careers') }}" class="@yield('nav_careers')">Careers</a></li>
                    <li><a href="{{ route('contact') }}" class="@yield('nav_contact')">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    {{-- Main Content --}}
    <main class="main">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer id="footer" class="footer dark-background">
        <div class="container">
            <h3 class="sitename">Kent Consultants Ltd</h3>
            <p>Professional property management, consultancy and real estate solutions in Nairobi, Kenya since 2008.</p>

            <div class="social-links d-flex justify-content-center">
                <a href="https://wa.me/254734476303" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                <a href="mailto:info@kentconsultantsltd.co.ke" title="Email"><i class="bi bi-envelope"></i></a>
                <a href="tel:+254786955170" title="Call Us"><i class="bi bi-telephone"></i></a>
            </div>

            <div class="container">
                <div class="copyright">
                    <span>Copyright &copy; {{ date('Y') }}</span>
                    <strong class="px-1 sitename">Kent Consultants Ltd</strong>
                    <span>All Rights Reserved</span>
                </div>
                <div class="credits">
                    Sclaters House, Parklands Road, Nairobi, Kenya |
                    <a href="tel:+254786955170">+254 786 955 170</a> <span>&</span>
                     <a href="tel:+254734254796">+254 734 254 796</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Scroll to Top --}}
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center" aria-label="Scroll to top">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    {{-- WhatsApp Float (bottom-left, animated) --}}
    <a href="https://wa.me/254734476303" target="_blank" rel="noopener" class="kc2-whatsapp-float" aria-label="Chat on WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Vendor JS -->
    <script src="{{ asset('v2-assets/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('v2-assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('v2-assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('v2-assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('v2-assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('v2-assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>

    <!-- Kent Design 2 JS -->
    <script src="{{ asset('js/website2.js') }}"></script>

    @stack('scripts')
</body>
</html>
