{{-- resources/views/layouts/website.blade.php --}}
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
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;0,9..144,900;1,9..144,500&family=Manrope:wght@400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/website.css') }}">
    
    @stack('styles')
</head>
<body>
    {{-- Preloader --}}
    <div id="preloader">
        <div class="preloader-content">
            <img src="{{ asset('images/logo.png') }}" alt="Kent Consultants Ltd" class="preloader-logo">
        </div>
    </div>

    {{-- Header --}}
    @include('partials.website.header')

    {{-- Main Content --}}
    <main class="main">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.website.footer')

    {{-- Scroll to Top --}}
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/website.js') }}"></script>
    
    @stack('scripts')
</body>
</html>