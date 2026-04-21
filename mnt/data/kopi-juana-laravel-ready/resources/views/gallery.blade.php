@extends('layouts.app')

@section('title', 'Kopi Juana | Gallery')

@section('content')
<main class="container page-pad">
    <div class="section-head split-head">
        <div>
            <p class="eyebrow">Gallery</p>
            <h1>Scenes from Kopi Juana.</h1>
        </div>
        <a class="btn btn-secondary" href="{{ route('admin.login') }}">Admin upload</a>
    </div>

    <div class="gallery-grid">
        @forelse($galleryImages as $image)
            <img src="{{ $image->image_url }}" alt="Kopi Juana gallery image">
        @empty
            <img src="{{ asset('assets/images/storefront-sign.jpg') }}" alt="Kopi Juana sign">
            <img src="{{ asset('assets/images/interior-main.jpg') }}" alt="Main café counter">
            <img src="{{ asset('assets/images/group-photo.jpg') }}" alt="Customers inside Kopi Juana">
            <img src="{{ asset('assets/images/product-spread.jpg') }}" alt="Coffee and pastries spread">
            <img src="{{ asset('assets/images/iced-coffee.jpg') }}" alt="Glass of iced coffee">
            <img src="{{ asset('assets/images/interior-window.jpg') }}" alt="Window area of the café">
            <img src="{{ asset('assets/images/interior-shelf.jpg') }}" alt="Shelf and coffee corner">
            <img src="{{ asset('assets/images/decor-wall.jpg') }}" alt="Coffee-themed wall decor">
        @endforelse
    </div>
</main>
@endsection
