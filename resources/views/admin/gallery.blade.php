@extends('layouts.app')

@section('content')
<div style="max-width: 1000px; margin: 40px auto; padding: 0 20px;">
    <h2 style="font-size: 28px; font-weight: bold; margin-bottom: 20px; color: #4b2e1f;">
        Admin Gallery Upload
    </h2>

    @if(session('success'))
        <div style="margin-bottom: 20px; padding: 12px 16px; background: #e8f7e8; color: #256029; border-radius: 8px;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="margin-bottom: 20px; padding: 12px 16px; background: #fdeaea; color: #8a1f1f; border-radius: 8px;">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div style="margin-bottom: 20px; padding: 12px 16px; background: #fdeaea; color: #8a1f1f; border-radius: 8px;">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    @if(!$isAdmin)
        <form action="{{ route('admin.gallery.login') }}" method="POST" style="margin-bottom: 30px;">
            @csrf
            <div style="display:flex; gap:12px; align-items:center; flex-wrap:wrap;">
                <input
                    type="password"
                    name="password"
                    placeholder="Enter admin password"
                    required
                    style="padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: white; min-width: 260px;"
                >
                <button
                    type="submit"
                    style="padding: 10px 20px; background: #6b3f1d; color: white; border: none; border-radius: 8px; cursor: pointer;"
                >
                    Login
                </button>
            </div>
        </form>
    @else
        <div style="display:flex; justify-content:space-between; align-items:center; gap:16px; flex-wrap:wrap; margin-bottom: 20px;">
            <form action="{{ route('admin.gallery.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                    <input
                        type="file"
                        name="image"
                        required
                        style="padding: 10px; border: 1px solid #ccc; border-radius: 8px; background: white;"
                    >

                    <button
                        type="submit"
                        style="padding: 10px 20px; background: #6b3f1d; color: white; border: none; border-radius: 8px; cursor: pointer;"
                    >
                        Upload
                    </button>
                </div>
            </form>

            <form action="{{ route('admin.gallery.logout') }}" method="POST">
                @csrf
                <button
                    type="submit"
                    style="padding: 10px 20px; background: #444; color: white; border: none; border-radius: 8px; cursor: pointer;"
                >
                    Logout
                </button>
            </form>
        </div>
    @endif

    <hr style="margin: 30px 0; border: none; border-top: 1px solid #ddd;">

    <h3 style="margin-bottom: 15px; color: #4b2e1f;">Uploaded Images</h3>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px;">
        @forelse($galleryImages as $image)
            @php
                $src = \Illuminate\Support\Str::startsWith($image->image_path, 'assets/')
                    ? asset($image->image_path)
                    : asset('storage/' . $image->image_path);
            @endphp

            <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 14px rgba(0,0,0,0.08); padding: 12px;">
                <img
                    src="{{ $src }}"
                    alt="Uploaded image"
                    style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; display: block;"
                >

                @if($isAdmin)
                    <form action="{{ route('admin.gallery.destroy', $image->id) }}" method="POST" style="margin-top: 12px;">
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            style="width: 100%; padding: 10px; background: #a83232; color: white; border: none; border-radius: 8px; cursor: pointer;"
                        >
                            Delete
                        </button>
                    </form>
                @endif
            </div>
        @empty
            <p style="color: #666;">No uploaded images yet.</p>
        @endforelse
    </div>
</div>
@endsection