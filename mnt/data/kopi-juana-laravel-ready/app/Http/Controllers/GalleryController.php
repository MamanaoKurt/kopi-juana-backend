<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryController extends Controller
{
    private string $facebookUrl = 'https://www.facebook.com/share/18yqia5tWe/';

    private function ensureAdmin(Request $request): void
    {
        abort_unless($request->session()->get('kopi_admin_logged_in') === true, 403);
    }

    public function home(): View
    {
        $galleryImages = GalleryImage::visible()->latest()->take(12)->get();

        return view('home', [
            'galleryImages' => $galleryImages,
            'facebookUrl' => $this->facebookUrl,
        ]);
    }

    public function gallery(): View
    {
        $galleryImages = GalleryImage::visible()->latest()->get();

        return view('gallery', [
            'galleryImages' => $galleryImages,
            'facebookUrl' => $this->facebookUrl,
        ]);
    }

    public function admin(Request $request): View
    {
        $this->ensureAdmin($request);

        return view('admin.gallery', [
            'galleryImages' => GalleryImage::latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->ensureAdmin($request);

        $validated = $request->validate([
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        foreach ($validated['images'] as $image) {
            $path = $image->store('gallery', 'public');

            GalleryImage::create([
                'image_path' => $path,
                'title' => null,
                'is_visible' => true,
            ]);
        }

        return back()->with('success', 'Images uploaded successfully.');
    }

    public function toggle(Request $request, GalleryImage $galleryImage): RedirectResponse
    {
        $this->ensureAdmin($request);

        $galleryImage->update([
            'is_visible' => ! $galleryImage->is_visible,
        ]);

        return back()->with('success', 'Image visibility updated.');
    }

    public function destroy(Request $request, GalleryImage $galleryImage): RedirectResponse
    {
        $this->ensureAdmin($request);

        if ($galleryImage->image_path && storage_path('app/public/'.$galleryImage->image_path)) {
            Storage::disk('public')->delete($galleryImage->image_path);
        }

        $galleryImage->delete();

        return back()->with('success', 'Image removed.');
    }
}
