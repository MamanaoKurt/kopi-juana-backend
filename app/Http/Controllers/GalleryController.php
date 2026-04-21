<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    private string $adminPassword = 'kopijuanatalaadmin';

    public function home()
    {
        $galleryImages = GalleryImage::where('is_visible', true)
            ->latest()
            ->get();

        return view('home', compact('galleryImages'));
    }

    public function gallery()
    {
        $galleryImages = GalleryImage::where('is_visible', true)
            ->latest()
            ->get();

        return view('gallery', compact('galleryImages'));
    }

    public function admin(Request $request)
    {
        $isAdmin = $request->session()->get('kopi_admin', false);

        $galleryImages = GalleryImage::latest()->get();

        return view('admin.gallery', compact('isAdmin', 'galleryImages'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        if ($request->password !== $this->adminPassword) {
            return back()->with('error', 'Wrong admin password.');
        }

        $request->session()->put('kopi_admin', true);

        return redirect()->route('admin.gallery')->with('success', 'Admin access granted.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('kopi_admin');

        return redirect()->route('admin.gallery')->with('success', 'Logged out.');
    }

    public function upload(Request $request)
    {
        if (!$request->session()->get('kopi_admin', false)) {
            abort(403);
        }

        $request->validate([
            'images' => ['required'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ], [
            'images.*.image' => 'Only image files are allowed.',
            'images.*.mimes' => 'Only JPG, JPEG, PNG, and WEBP are allowed.',
            'images.*.max' => 'Each image must be 5MB or less.',
        ]);

        foreach ($request->file('images') as $image) {
            $path = $image->store('gallery', 'public');

            GalleryImage::create([
                'image_path' => $path,
                'title' => null,
                'is_visible' => true,
            ]);
        }

        return back()->with('success', 'Image(s) uploaded successfully.');
    }

    public function destroy(Request $request, GalleryImage $galleryImage)
    {
        if (!$request->session()->get('kopi_admin', false)) {
            abort(403);
        }

        if ($galleryImage->image_path && Storage::disk('public')->exists($galleryImage->image_path)) {
            Storage::disk('public')->delete($galleryImage->image_path);
        }

        $galleryImage->delete();

        return back()->with('success', 'Image deleted.');
    }

    public function toggle(Request $request, GalleryImage $galleryImage)
    {
        if (!$request->session()->get('kopi_admin', false)) {
            abort(403);
        }

        $galleryImage->update([
            'is_visible' => !$galleryImage->is_visible,
        ]);

        return back()->with('success', 'Image visibility updated.');
    }
}