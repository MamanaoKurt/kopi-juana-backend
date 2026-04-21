<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Juana</title>
    <meta name="description" content="Kopi Juana - cozy coffee, calm nights.">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a href="{{ route('home') }}" class="brand">
                <img src="{{ asset('assets/images/logo.jpg') }}" alt="Kopi Juana logo" class="brand-logo">
                <div class="brand-text">
                    <span class="brand-name">Kopi Juana</span>
                    <span class="brand-sub">Cozy coffee, calm nights</span>
                </div>
            </a>

            <nav class="nav">
                <a href="{{ route('home') }}#about">About</a>
                <a href="{{ route('home') }}#space">The Space</a>
                <a href="{{ route('home') }}#specialties">Specialties</a>
                <a href="{{ route('gallery') }}">Gallery</a>
                <a href="{{ route('home') }}#contact">Contact</a>
                <a href="{{ route('visit.facebook') }}" class="btn btn-dark" target="_blank" rel="noopener">Visit Facebook</a>
            </nav>
        </div>
    </header>

    @if(session('success'))
        <div class="flash flash-success container">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="flash flash-error container">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="flash flash-error container">
            {{ $errors->first() }}
        </div>
    @endif

    @yield('content')

    <script src="{{ asset('assets/js/site.js') }}"></script>
</body>
</html>