@extends('layouts.app')

@section('content')

<h1>Admin Gallery Upload</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form action="{{ route('admin.gallery.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" required>
    <button type="submit">Upload</button>
</form>

<hr>

<h2>Uploaded Images</h2>

@foreach($galleryImages as $image)
    <div style="margin-bottom:10px;">
        <img src="{{ asset('storage/'.$image->image_path) }}" width="150">

        <form action="{{ route('admin.gallery.destroy', $image->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach

@endsection