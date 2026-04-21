<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kopi Juana')</title>
    <meta name="description" content="Kopi Juana — cozy coffee, calm nights, pastries, and warm café moments in Tala.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a class="brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo.jpg') }}" alt="Kopi Juana logo">
                <div>
                    <strong>Kopi Juana</strong>
                    <span>Cozy coffee, calm nights</span>
                </div>
            </a>
            <nav class="nav-links">
                <a href="{{ route('home') }}#about">About</a>
                <a href="{{ route('home') }}#space">The Space</a>
                <a href="{{ route('home') }}#specialties">Specialties</a>
                <a href="{{ route('gallery') }}">Gallery</a>
                <a href="#contact">Contact</a>
                <a class="btn btn-primary" href="{{ $facebookUrl ?? 'https://www.facebook.com/share/18yqia5tWe/' }}" target="_blank" rel="noopener noreferrer">Visit Facebook</a>
            </nav>
        </div>
    </header>

    @if(session('success'))
        <div class="flash success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="flash error">{{ $errors->first() }}</div>
    @endif

    @yield('content')

    <footer id="contact" class="site-footer">
        <div class="container footer-grid">
            <div>
                <h3>Kopi Juana</h3>
                <p>Open daily from 1 PM to 12 MN. Cozy coffee, pastries, and a warm place to unwind.</p>
            </div>
            <div>
                <h4>Contact</h4>
                <p>kopijuanacm@gmail.com</p>
                <p>KOPI-JUANA-Tala</p>
            </div>
            <div>
                <h4>Visit</h4>
                <a href="{{ $facebookUrl ?? 'https://www.facebook.com/share/18yqia5tWe/' }}" target="_blank" rel="noopener noreferrer">Facebook page ↗</a>
                <a href="{{ route('admin.login') }}">Admin login</a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/site.js') }}"></script>
</body>
</html>
