@extends('layouts.app')

@section('content')
<section class="gallery-page">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="section-label">Gallery</p>
                <h1>Scenes from Kopi Juana.</h1>
                <p class="gallery-note">
                    Warm corners, coffee moments, pastries, and café details from the shop.
                </p>
            </div>

            <a href="{{ route('admin.gallery') }}" class="add-photos-btn">Add photos</a>
        </div>

        <div class="gallery-grid">
            @if($galleryImages->count() > 0)
                @foreach($galleryImages as $image)
                    <div class="gallery-card">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Kopi Juana gallery image">
                    </div>
                @endforeach
            @else
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/storefront-sign.jpg') }}" alt="Kopi Juana storefront sign">
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/interior-main.jpg') }}" alt="Main interior of Kopi Juana">
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/group-photo.jpg') }}" alt="Kopi Juana group photo">
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/product-spread.jpg') }}" alt="Kopi Juana drinks and pastries">
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/iced-coffee.jpg') }}" alt="Iced coffee from Kopi Juana">
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/interior-window.jpg') }}" alt="Window seating at Kopi Juana">
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/interior-shelf.jpg') }}" alt="Shelf and coffee corner at Kopi Juana">
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('assets/images/wall-decor.jpg') }}" alt="Wall decor inside Kopi Juana">
                </div>
            @endif
        </div>
    </div>
</section>
@endsection