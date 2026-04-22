@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div class="hero-copy">
            <p class="eyebrow">Neighborhood café in Tala</p>
            <h1>Warm coffee, soft lights, and a place that feels easy to stay in.</h1>
            <p class="hero-text">
                Kopi Juana is made for chill afternoons, catch-ups, study breaks, and quiet coffee moments.
            </p>

            <div class="hero-actions">
                <a href="{{ route('visit.facebook') }}" class="btn btn-dark" target="_blank" rel="noopener">Open Facebook Page</a>
                <a href="{{ route('gallery') }}" class="btn btn-light">View Gallery</a>
            </div>

            <div class="mini-cards">
                <div class="mini-card">
                    <strong>Open daily</strong>
                    <span>1 PM – 12 MN</span>
                </div>
                <div class="mini-card">
                    <strong>Email</strong>
                    <span>kopijuanacm@gmail.com</span>
                </div>
                <div class="mini-card">
                    <strong>Page</strong>
                    <span>KOPI-JUANA-Tala</span>
                </div>
            </div>
        </div>

        <div class="hero-media">
            <img src="{{ asset('assets/images/interior-main.jpg') }}" alt="Main interior of Kopi Juana">
        </div>
    </div>
</section>

<section class="story-section" id="about">
    <div class="container two-col">
        <div>
            <p class="section-label">About the café</p>
            <h2>Simple, warm, and easy to enjoy.</h2>
            <p>
                Kopi Juana brings together coffee, pastries, warm lighting, wood textures, and a relaxed atmosphere
                that works well for barkada hangouts, solo tambay, or quiet coffee runs.
            </p>
            <p>
                The space feels personal and calm, with a soft neutral palette and homey corners that make the café feel welcoming.
            </p>
        </div>

        <div class="collage">
            <img src="{{ asset('assets/images/product-spread.jpg') }}" alt="Kopi Juana drinks and pastries">
            <img src="{{ asset('assets/images/iced-coffee.jpg') }}" alt="Iced coffee from Kopi Juana">
            <img src="{{ asset('assets/images/interior-window.jpg') }}" alt="Window seating at Kopi Juana">
            <img src="{{ asset('assets/images/interior-shelf.jpg') }}" alt="Shelf and coffee corner at Kopi Juana">
            <img src="{{ asset('assets/images/wall-decor.jpg') }}" alt="Wall decor inside Kopi Juana">
        </div>
    </div>
</section>

<section class="space-section" id="space">
    <div class="container two-col reverse">
        <div class="video-box">
            <video id="shop-video" autoplay loop muted playsinline controls>
                <source src="{{ asset('assets/video/shop-reel.mp4') }}" type="video/mp4">
            </video>
            <button class="sound-btn" onclick="toggleVideoSound()">Enable Sound</button>
        </div>

        <div>
            <p class="section-label">The space</p>
            <h2>Soft lights, wood accents, and corners worth staying in.</h2>
            <p>
                The café visuals lean into cream walls, brown wood, dark accents, and a quiet premium feel.
            </p>
            <p>
                Sound does not autoplay with audio on browsers by default, so the video starts muted and can be unmuted with one click.
            </p>
        </div>
    </div>
</section>

<section class="specialties-section" id="specialties">
    <div class="container two-col">
        <div class="feature-image">
            <img src="{{ asset('assets/images/product-spread.jpg') }}" alt="Featured food and drinks">
        </div>

        <div>
            <p class="section-label">Services & specialties</p>
            <h2>Easy to visit, easy to enjoy.</h2>
            <ul class="special-list">
                <li>In-store pickup</li>
                <li>Online booking</li>
                <li>Outdoor seating</li>
                <li>Dine-in</li>
                <li>Delivery</li>
                <li>Takeout</li>
            </ul>
        </div>
    </div>
</section>

<section class="home-gallery-preview">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="section-label">Gallery</p>
                <h2>Scenes from Kopi Juana.</h2>
            </div>
            <a href="{{ route('gallery') }}" class="btn btn-light">Open full gallery</a>
        </div>

        <div class="gallery-grid">
            @if($galleryImages->count() > 0)
                @foreach($galleryImages->take(8) as $image)
                    @php
                        $src = \Illuminate\Support\Str::startsWith($image->image_path, 'assets/')
                            ? asset($image->image_path)
                            : asset('storage/' . $image->image_path);
                    @endphp

                    <div class="gallery-card">
                        <img
                            src="{{ $src }}"
                            alt="Kopi Juana gallery image"
                            class="preview-image"
                            onclick="openImagePreview(this.src)"
                        >
                    </div>
                @endforeach
            @else
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/storefront-sign.jpg') }}" alt="Kopi Juana storefront sign" class="preview-image" onclick="openImagePreview(this.src)">
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/interior-main.jpg') }}" alt="Main interior of Kopi Juana" class="preview-image" onclick="openImagePreview(this.src)">
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/group-photo.jpg') }}" alt="Kopi Juana group photo" class="preview-image" onclick="openImagePreview(this.src)">
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/product-spread.jpg') }}" alt="Kopi Juana drinks and pastries" class="preview-image" onclick="openImagePreview(this.src)">
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/iced-coffee.jpg') }}" alt="Iced coffee from Kopi Juana" class="preview-image" onclick="openImagePreview(this.src)">
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/interior-window.jpg') }}" alt="Window seating at Kopi Juana" class="preview-image" onclick="openImagePreview(this.src)">
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/interior-shelf.jpg') }}" alt="Shelf and coffee corner at Kopi Juana" class="preview-image" onclick="openImagePreview(this.src)">
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/wall-decor.jpg') }}" alt="Wall decor inside Kopi Juana" class="preview-image" onclick="openImagePreview(this.src)">
                </div>
            @endif
        </div>
    </div>
</section>

<section class="contact-section" id="contact">
    <div class="container contact-grid">
        <div>
            <p class="section-label">Contact</p>
            <h2>Visit the café or check updates online.</h2>
            <p>For updates, store moments, and new posts, the official Facebook page is the main link for the shop.</p>
        </div>

        <div class="contact-card">
            <p><strong>Email:</strong> kopijuanacm@gmail.com</p>
            <p><strong>Facebook:</strong> KOPI-JUANA-Tala</p>
            <p><strong>Hours:</strong> 1 PM – 12 MN</p>
            <a href="{{ route('visit.facebook') }}" class="btn btn-dark" target="_blank" rel="noopener">Visit Facebook</a>
        </div>
    </div>
</section>
@endsection