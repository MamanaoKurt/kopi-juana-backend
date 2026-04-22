<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function home()
    {
        $galleryImages = GalleryImage::latest()->get();
        return view('home', compact('galleryImages'));
    }

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

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'image_path' => $path,
            'title' => null,
            'is_visible' => true,
        ]);

        return back()->with('success', 'Image uploaded successfully.');
    }

    public function destroy(GalleryImage $galleryImage)
    {
        if ($galleryImage->image_path && Storage::disk('public')->exists($galleryImage->image_path)) {
            Storage::disk('public')->delete($galleryImage->image_path);
        }

        $galleryImage->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
}