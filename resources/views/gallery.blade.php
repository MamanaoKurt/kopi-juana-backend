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

            @foreach($galleryImages as $image)
                @if($image->is_visible)
                    <div class="gallery-card">
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                             alt="Uploaded image"
                             class="preview-image"
                             onclick="openImagePreview(this.src)">
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<div id="imagePreviewModal" class="image-preview-modal" onclick="closeImagePreview()">
    <span class="image-preview-close" onclick="closeImagePreview(event)">&times;</span>
    <img id="imagePreviewTarget" class="image-preview-content" src="" alt="Full preview">
</div>
@endsection