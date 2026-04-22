<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    // FRONT PAGE
    public function index()
    {
        $galleryImages = GalleryImage::latest()->get();
        return view('gallery', compact('galleryImages'));
    }

    // ADMIN PAGE
    public function admin()
    {
        $galleryImages = GalleryImage::latest()->get();
        return view('admin.gallery', compact('galleryImages'));
    }

    // UPLOAD IMAGE
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'image_path' => $path
        ]);

        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }

    // DELETE IMAGE
    public function destroy(GalleryImage $galleryImage)
    {
        $galleryImage->delete();
        return redirect()->back();
    }
}