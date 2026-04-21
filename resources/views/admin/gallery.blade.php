@extends('layouts.app')

@section('content')
<section class="admin-page">
    <div class="container admin-wrap">
        <div class="section-head">
            <div>
                <p class="section-label">Admin gallery</p>
                <h1>Gallery upload panel</h1>
                <p class="gallery-note">Ayy! May password? yes po!, Kopi Juana want to make this not only kid-friendly but appropriate for all po, so only the administrator can add images in this page po, contact us or approach nalang po us regarding this, tenchuuu.</p>
            </div>
        </div>

        @if(!$isAdmin)
            <div class="admin-login-card">
                <h2>Enter admin password</h2>
                <form action="{{ route('admin.gallery.login') }}" method="POST" class="admin-form">
                    @csrf
                    <input type="password" name="password" placeholder="Enter password" required>
                    <button type="submit" class="btn btn-dark">Unlock upload access</button>
                </form>
                <p class="admin-help">Password is required before adding photos from phone or PC.</p>
            </div>
        @else
            <div class="admin-toolbar">
                <form action="{{ route('admin.gallery.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light">Logout</button>
                </form>
            </div>

            <div class="admin-login-card">
                <h2>Add images</h2>
                <form action="{{ route('admin.gallery.upload') }}" method="POST" enctype="multipart/form-data" class="admin-form">
                    @csrf
                    <input type="file" name="images[]" accept=".jpg,.jpeg,.png,.webp,image/*" multiple required>
                    <button type="submit" class="btn btn-dark">Upload image(s)</button>
                </form>

                <div class="upload-rules">
                    <strong>Safety reminder:</strong>
                    <span>Only upload café images, products, interiors, branding, events, or approved customer-friendly photos.</span>
                </div>
            </div>

            <div class="admin-grid">
                @foreach($galleryImages as $image)
                    <div class="admin-card">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gallery admin image">

                        <div class="admin-card-actions">
                            <form action="{{ route('admin.gallery.toggle', $image) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-light">
                                    {{ $image->is_visible ? 'Hide' : 'Show' }}
                                </button>
                            </form>

                            <form action="{{ route('admin.gallery.destroy', $image) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>

                        <div class="visibility-tag {{ $image->is_visible ? 'visible' : 'hidden-tag' }}">
                            {{ $image->is_visible ? 'Visible' : 'Hidden' }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection