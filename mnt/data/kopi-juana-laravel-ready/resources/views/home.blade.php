@extends('layouts.app')

@section('title', 'Kopi Juana | Cozy Café in Tala')

@section('content')
<main>
    <section class="hero container">
        <div class="hero-copy">
            <p class="eyebrow">Neighborhood café in Tala</p>
            <h1>Warm coffee, soft lights, and a place that feels easy to stay in.</h1>
            <p class="lead">Kopi Juana is made for chill afternoons, catch-ups, study breaks, and quiet coffee moments.</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="{{ $facebookUrl }}" target="_blank" rel="noopener noreferrer">Open Facebook Page</a>
                <a class="btn btn-secondary" href="{{ route('gallery') }}">View Gallery</a>
            </div>
            <ul class="hero-meta">
                <li><strong>Open daily</strong><span>1 PM – 12 MN</span></li>
                <li><strong>Email</strong><span>kopijuanacm@gmail.com</span></li>
                <li><strong>Page</strong><span>KOPI-JUANA-Tala</span></li>
            </ul>
        </div>
        <div class="hero-media">
            <img src="{{ asset('assets/images/interior-main.jpg') }}" alt="Main interior of Kopi Juana">
        </div>
    </section>

    <section class="caption-band">
        <div class="container">
            <p>Kopi Juana — where afternoons turn into cozy nights. Open daily from 1 PM to 12 MN, serving bold coffee, fresh pastries, and the perfect place to unwind.</p>
        </div>
    </section>

    <section id="about" class="container section-grid">
        <div>
            <p class="eyebrow">About the café</p>
            <h2>Simple, warm, and easy to enjoy.</h2>
            <p>Kopi Juana brings together coffee, pastries, warm lighting, wood textures, and a relaxed atmosphere that works well for barkada hangouts, solo tambay, or quiet coffee runs.</p>
            <p>The space feels personal and calm, with a soft neutral palette and homey corners that make the café feel welcoming.</p>
        </div>
        <div class="image-stack">
            <img class="large" src="{{ asset('assets/images/product-spread.jpg') }}" alt="Kopi Juana drinks and pastries">
            <img class="small" src="{{ asset('assets/images/iced-coffee.jpg') }}" alt="Iced coffee from Kopi Juana">
        </div>
    </section>

    <section id="space" class="container section-grid reverse">
        <div class="collage">
            <img src="{{ asset('assets/images/interior-window.jpg') }}" alt="Window seating at Kopi Juana">
            <img src="{{ asset('assets/images/interior-shelf.jpg') }}" alt="Shelf and coffee corner at Kopi Juana">
            <img src="{{ asset('assets/images/decor-wall.jpg') }}" alt="Wall decor inside Kopi Juana">
        </div>
        <div>
            <p class="eyebrow">The space</p>
            <h2>Soft lights, wood accents, and corners worth staying in.</h2>
            <p>The café visuals lean into cream walls, brown wood, dark accents, and a quiet premium feel. The site keeps that same mood so it still feels connected to the actual shop.</p>
        </div>
    </section>

    <section id="specialties" class="container specialties">
        <div class="section-head">
            <p class="eyebrow">Services & specialties</p>
            <h2>Easy to visit, easy to enjoy.</h2>
        </div>
        <div class="specialty-grid">
            <article><span>☕</span><h3>Cozy coffee moments</h3><p>Good for dine-in, quiet tambay, and after-class catch-ups.</p></article>
            <article><span>🥐</span><h3>Fresh pastries</h3><p>Best paired with coffee for a simple café snack setup.</p></article>
            <article><span>🪑</span><h3>Comfortable space</h3><p>Warm lighting and a relaxed interior that fits late afternoons and evening visits.</p></article>
            <article><span>📱</span><h3>Direct contact</h3><p>Main action is direct Facebook redirection for inquiries, updates, and new posts.</p></article>
        </div>
    </section>

    <section class="container feature-band">
        <div class="band-card">
            <p class="eyebrow">Shop reel</p>
            <h2>A quick look at the café vibe.</h2>
            <p>Watch a short clip from Kopi Juana. Browsers usually mute autoplay at first, so a sound button is included.</p>
        </div>
        <div class="band-media video-shell">
            <video id="mainVideo" controls autoplay muted loop playsinline preload="metadata" poster="{{ asset('assets/images/storefront-sign.jpg') }}">
                <source src="{{ asset('assets/video/shop-reel.mp4') }}" type="video/mp4">
            </video>
            <button class="sound-toggle" type="button" data-video="mainVideo">Turn sound on</button>
        </div>
    </section>

    <section class="container gallery-preview">
        <div class="section-head split-head">
            <div>
                <p class="eyebrow">Gallery</p>
                <h2>Scenes from Kopi Juana.</h2>
            </div>
            <a class="btn btn-secondary" href="{{ route('gallery') }}">Open full gallery</a>
        </div>
        <div class="gallery-grid">
            @foreach($galleryImages as $image)
                <img src="{{ $image->image_url }}" alt="Kopi Juana gallery image">
            @endforeach
            @if($galleryImages->isEmpty())
                <img src="{{ asset('assets/images/storefront-sign.jpg') }}" alt="Kopi Juana sign">
                <img src="{{ asset('assets/images/interior-main.jpg') }}" alt="Main café counter">
                <img src="{{ asset('assets/images/group-photo.jpg') }}" alt="Customers inside Kopi Juana">
                <img src="{{ asset('assets/images/product-spread.jpg') }}" alt="Coffee and pastries spread">
            @endif
        </div>
    </section>
</main>
@endsection
