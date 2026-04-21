<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

Route::get('/', [GalleryController::class, 'home'])->name('home');
Route::get('/gallery', [GalleryController::class, 'gallery'])->name('gallery');

Route::get('/admin/gallery', [GalleryController::class, 'admin'])->name('admin.gallery');
Route::post('/admin/gallery/login', [GalleryController::class, 'login'])->name('admin.gallery.login');
Route::post('/admin/gallery/logout', [GalleryController::class, 'logout'])->name('admin.gallery.logout');

Route::post('/admin/gallery/upload', [GalleryController::class, 'upload'])->name('admin.gallery.upload');
Route::delete('/admin/gallery/{galleryImage}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
Route::patch('/admin/gallery/{galleryImage}/toggle', [GalleryController::class, 'toggle'])->name('admin.gallery.toggle');

Route::get('/visit-facebook', function () {
    return redirect()->away('https://www.facebook.com/share/18yqia5tWe/');
})->name('visit.facebook');