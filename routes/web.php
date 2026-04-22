<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [GalleryController::class, 'index'])->name('home');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

/* ADMIN */
Route::get('/admin/gallery', [GalleryController::class, 'admin'])->name('admin.gallery');
Route::post('/admin/gallery/upload', [GalleryController::class, 'upload'])->name('admin.gallery.upload');
Route::delete('/admin/gallery/{galleryImage}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');