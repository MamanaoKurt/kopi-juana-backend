@extends('layouts.app')

@section('content')

<h2>Upload Photo</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="password" name="password" placeholder="Admin password" required><br><br>

    <input type="text" name="title" placeholder="Title (optional)"><br><br>

    <input type="file" name="image" required><br><br>

    <button type="submit">Upload</button>
</form>

<hr>

<h2>Uploaded Photos</h2>

@foreach($galleryImages as $img)
    <div style="margin-bottom:20px;">
        <img src="{{ asset('storage/'.$img->image_path) }}" width="200"><br>

        <form action="{{ route('admin.gallery.delete', $img->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <input type="password" name="password" placeholder="Admin password" required>
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach

@endsection