@extends('layouts.app')

@section('title', 'Kopi Juana | Admin Gallery')

@section('content')
<main class="container page-pad admin-grid">
    <div class="admin-top">
        <div>
            <p class="eyebrow">Admin panel</p>
            <h1>Manage gallery images</h1>
            <p>Upload new photos, hide items, or remove old ones.</p>
        </div>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="btn btn-secondary" type="submit">Logout</button>
        </form>
    </div>

    <section class="upload-card wood-card">
        <h2>Add photos</h2>
        <p>Allowed files: JPG, JPEG, PNG, WEBP. Max 5 MB each.</p>
        <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="images[]" accept=".jpg,.jpeg,.png,.webp" multiple required>
            <button class="btn btn-primary" type="submit">Upload selected images</button>
        </form>
    </section>

    <section>
        <div class="gallery-grid admin-gallery-grid">
            @foreach($galleryImages as $image)
                <div class="admin-item">
                    <img src="{{ $image->image_url }}" alt="Gallery image">
                    <div class="admin-actions">
                        <form method="POST" action="{{ route('admin.gallery.toggle', $image) }}">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-secondary" type="submit">{{ $image->is_visible ? 'Hide' : 'Show' }}</button>
                        </form>
                        <form method="POST" action="{{ route('admin.gallery.destroy', $image) }}" onsubmit="return confirm('Remove this image?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>
@endsection
