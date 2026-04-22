@extends('layouts.app')

@section('content')

<div style="max-width:900px;margin:40px auto;">

    <h2 style="font-size:28px;font-weight:bold;margin-bottom:20px;">
        Admin Gallery Upload
    </h2>

    {{-- Upload Form --}}
    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" style="margin-bottom:30px;">
        @csrf

        <input type="file" name="image" required
            style="padding:10px;border:1px solid #ccc;border-radius:6px;">

        <button type="submit"
            style="padding:10px 20px;background:#6b3f1d;color:white;border:none;border-radius:6px;">
            Upload
        </button>
    </form>

    {{-- Uploaded Images --}}
    <h3 style="margin-bottom:15px;">Uploaded Images</h3>

    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:15px;">
        @foreach($images as $img)
            <img src="{{ asset('storage/'.$img->image_path) }}"
                 style="width:100%;border-radius:10px;">
        @endforeach
    </div>

</div>

@endsection