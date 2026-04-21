@extends('layouts.app')

@section('title', 'Kopi Juana | Admin Login')

@section('content')
<main class="container auth-wrap">
    <form class="auth-card" method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <p class="eyebrow">Admin access</p>
        <h1>Gallery upload login</h1>
        <p>Enter the gallery admin password to upload and manage images.</p>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" required>
        <button class="btn btn-primary full" type="submit">Enter admin panel</button>
    </form>
</main>
@endsection
