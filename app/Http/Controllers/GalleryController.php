<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;

class GalleryController extends Controller
{
    protected $services;

    public function __construct()
    {
        $this->services = Service::orderBy('display_order', 'asc')->get();
        view()->share('services', $this->services);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::orderBy('display_order', 'asc')->get();
        return Inertia::render('Gallery/Index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Gallery/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'display_order' => 'required|integer',
        ]);

        // Store the image and get the path
        if ($request->hasFile('image')) {
            $validated['image_path'] = $this->storeGalleryImage($request->file('image'));
        }

        Gallery::create($validated);

        return redirect()->route('gallery.index')->with('success', 'Image uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return Inertia::render('Gallery/Edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'display_order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image_path) {
                $this->deleteGalleryImage($gallery->image_path);
            }

            $validated['image_path'] = $this->storeGalleryImage($request->file('image'));
        }

        $gallery->update($validated);

        return redirect()->route('gallery.index')->with('success', 'Image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image_path) {
            $this->deleteGalleryImage($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Image deleted successfully');
    }

    private function storeGalleryImage($file): string
    {
        $directory = public_path('gallery');

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $filename = $file->hashName();
        $file->move($directory, $filename);

        return 'gallery/' . $filename;
    }

    private function deleteGalleryImage(string $path): void
    {
        $fullPath = public_path($path);

        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }
}
