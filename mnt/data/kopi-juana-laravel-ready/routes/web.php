<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GalleryController::class, 'home'])->name('home');
Route::get('/gallery', [GalleryController::class, 'gallery'])->name('gallery');

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/logout-admin', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('web')->group(function () {
    Route::get('/admin/gallery', [GalleryController::class, 'admin'])->name('admin.gallery');
    Route::post('/admin/gallery', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::patch('/admin/gallery/{galleryImage}', [GalleryController::class, 'toggle'])->name('admin.gallery.toggle');
    Route::delete('/admin/gallery/{galleryImage}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
});
