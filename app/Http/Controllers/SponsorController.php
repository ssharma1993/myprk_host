<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsors = Sponsor::orderBy('display_order', 'asc')->get();

        return Inertia::render('Sponsors/Index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Sponsors/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'display_order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $this->storeSponsorImage($request->file('image'));
        }

        Sponsor::create($validated);

        return redirect()->route('sponsors.index')
            ->with('success', 'Sponsor created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('sponsors.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sponsor = Sponsor::findOrFail($id);

        return Inertia::render('Sponsors/Edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sponsor = Sponsor::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'display_order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($sponsor->image_path) {
                $this->deleteSponsorImage($sponsor->image_path);
            }
            $validated['image_path'] = $this->storeSponsorImage($request->file('image'));
        }

        $sponsor->update($validated);

        return redirect()->route('sponsors.index')
            ->with('success', 'Sponsor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sponsor = Sponsor::findOrFail($id);

        if ($sponsor->image_path) {
            $this->deleteSponsorImage($sponsor->image_path);
        }

        $sponsor->delete();

        return redirect()->route('sponsors.index')
            ->with('success', 'Sponsor deleted successfully');
    }

    private function storeSponsorImage($file): string
    {
        $directory = public_path('sponsors');

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $filename = $file->hashName();
        $file->move($directory, $filename);

        return 'sponsors/' . $filename;
    }

    private function deleteSponsorImage(string $path): void
    {
        $fullPath = public_path($path);

        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }
}
