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
            @forelse($galleryImages as $image)
                @php
                    $src = \Illuminate\Support\Str::startsWith($image->image_path, 'assets/')
                        ? asset($image->image_path)
                        : \Illuminate\Support\Facades\Storage::url($image->image_path);
                @endphp

                <div class="gallery-card">
                    <img
                        src="{{ $src }}"
                        alt="Kopi Juana gallery image"
                        class="preview-image"
                        onclick="openImagePreview(this.src)"
                    >
                </div>
            @empty
                <p>No gallery images yet.</p>
            @endforelse
        </div>
    </div>
</section>

<div id="imagePreviewModal" class="image-preview-modal" onclick="closeImagePreview()">
    <span class="image-preview-close" onclick="closeImagePreview(event)">&times;</span>
    <img id="imagePreviewTarget" class="image-preview-content" src="" alt="Full preview">
</div>
@endsection