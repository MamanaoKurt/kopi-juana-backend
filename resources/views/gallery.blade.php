@extends('layouts.app')

@section('content')

<h1>Scenes from Kopi Juana.</h1>

<a href="{{ route('admin.gallery') }}">Add photos</a>

<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">

    {{-- DEFAULT IMAGES --}}
    <img src="{{ asset('assets/images/storefront-sign.jpg') }}">
    <img src="{{ asset('assets/images/interior-main.jpg') }}">
    <img src="{{ asset('assets/images/group-photo.jpg') }}">
    <img src="{{ asset('assets/images/product-spread.jpg') }}">

    {{-- UPLOADED IMAGES --}}
    @foreach($galleryImages as $image)
        <img src="{{ asset('storage/'.$image->image_path) }}">
    @endforeach

</div>

@endsection