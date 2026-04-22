<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryImages = GalleryImage::latest()->get();
        return view('gallery', compact('galleryImages'));
    }

    public function admin()
    {
        $galleryImages = GalleryImage::latest()->get();
        return view('admin.gallery', compact('galleryImages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'password' => ['required', 'in:kopijuanatalaadmin'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'title' => ['nullable', 'string', 'max:255'],
        ]);

        // SAVE IMAGE
        $path = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'image_path' => $path,
            'title' => $request->title,
            'is_visible' => true,
        ]);

        return back()->with('success', 'Photo uploaded successfully.');
    }

    public function destroy(GalleryImage $galleryImage, Request $request)
    {
        if ($request->password !== 'kopijuanatalaadmin') {
            return back()->with('error', 'Wrong password');
        }

        if (Storage::disk('public')->exists($galleryImage->image_path)) {
            Storage::disk('public')->delete($galleryImage->image_path);
        }

        $galleryImage->delete();

        return back()->with('success', 'Deleted');
    }
}