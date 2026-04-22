<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    private string $adminPassword = 'Admin123!';

    public function home()
    {
        $galleryImages = GalleryImage::where('is_visible', true)->latest()->get();
        return view('home', compact('galleryImages'));
    }

    public function index()
    {
        $galleryImages = GalleryImage::where('is_visible', true)->latest()->get();
        return view('gallery', compact('galleryImages'));
    }

    public function admin()
    {
        $galleryImages = GalleryImage::latest()->get();
        $isAdmin = session('gallery_admin', false);

        return view('admin.gallery', compact('galleryImages', 'isAdmin'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        if ($request->password === $this->adminPassword) {
            session(['gallery_admin' => true]);
            return redirect()->route('admin.gallery')->with('success', 'Admin access granted.');
        }

        return redirect()->route('admin.gallery')->with('error', 'Wrong password.');
    }

    public function logout()
    {
        session()->forget('gallery_admin');
        return redirect()->route('admin.gallery')->with('success', 'Logged out.');
    }

    public function upload(Request $request)
    {
        if (!session('gallery_admin')) {
            abort(403, 'Unauthorized');
        }

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
        if (!session('gallery_admin')) {
            abort(403, 'Unauthorized');
        }

        if (
            $galleryImage->image_path &&
            !str_starts_with($galleryImage->image_path, 'assets/') &&
            Storage::disk('public')->exists($galleryImage->image_path)
        ) {
            Storage::disk('public')->delete($galleryImage->image_path);
        }

        $galleryImage->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
}