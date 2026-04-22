<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

Route::get('/', [GalleryController::class, 'home'])->name('home');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/admin/gallery', [GalleryController::class, 'admin'])->name('admin.gallery');
Route::post('/admin/gallery/upload', [GalleryController::class, 'upload'])->name('admin.gallery.upload');
Route::delete('/admin/gallery/{galleryImage}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');

Route::get('/visit-facebook', function () {
    return redirect()->away('https://www.facebook.com/share/18yqia5tWe/');
})->name('visit.facebook');