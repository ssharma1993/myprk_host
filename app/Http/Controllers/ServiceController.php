<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class ServiceController extends Controller
{
    /**
     * Display the services page with existing services.
     */
    public function index()
    {
        $services = Service::with('children')
            ->whereNull('parent_id')
            ->orderBy('display_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        $parentServices = Service::whereNull('parent_id')
            ->orderBy('display_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get(['id', 'name']);

        return Inertia::render('services', [
            'services' => $services,
            'parentServices' => $parentServices,
        ]);
    }

    /**
     * Store a newly created service.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'parent_id' => [
                'nullable',
                'integer',
                Rule::exists('services', 'id')->where(fn($query) => $query->whereNull('parent_id')),
            ],
            'name'          => 'required|string|max:255',
            'icon'          => 'nullable|string|max:255',
            'slug'          => 'nullable|string|max:255|unique:services',
            'description'   => 'nullable|string',
            'page_content'  => 'nullable|string',
            'display_order' => 'nullable|integer|min:0',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ], [
            'image.uploaded' => 'Image upload failed. Please ensure the server upload limit is at least 5MB and try again.',
            'image.max' => 'Image must not be greater than 5MB.',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('services', 'public');
        }

        unset($data['image']);

        $service = Service::create($data);

        return response()->json($service, 201);
    }

    /**
     * Update the specified service.
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'parent_id' => [
                'nullable',
                'integer',
                Rule::exists('services', 'id')->where(fn($query) => $query->whereNull('parent_id')),
                Rule::notIn([$service->id]),
            ],
            'name'          => 'required|string|max:255',
            'icon'          => 'nullable|string|max:255',
            'slug'          => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'description'   => 'nullable|string',
            'page_content'  => 'nullable|string',
            'display_order' => 'nullable|integer|min:0',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ], [
            'image.uploaded' => 'Image upload failed. Please ensure the server upload limit is at least 5MB and try again.',
            'image.max' => 'Image must not be greater than 5MB.',
        ]);

        if (! empty($data['parent_id']) && $service->children()->exists()) {
            return response()->json([
                'message' => 'A parent service with sub services cannot be assigned under another parent.',
            ], 422);
        }

        if ($request->hasFile('image')) {
            if ($service->image_path) {
                Storage::disk('public')->delete($service->image_path);
            }
            $data['image_path'] = $request->file('image')->store('services', 'public');
        }

        unset($data['image']);

        $service->update($data);

        return response()->json($service);
    }

    /**
     * Remove the specified service.
     */
    public function destroy(Service $service)
    {
        if ($service->image_path) {
            Storage::disk('public')->delete($service->image_path);
        }

        $service->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Return all services as JSON ordered by display_order.
     */
    public function getAll()
    {
        $services = Service::with('children')
            ->whereNull('parent_id')
            ->orderBy('display_order', 'asc')
            ->get();

        return response()->json($services);
    }

    /**
     * Return a single service by id as JSON.
     */
    public function getById($id)
    {
        $service = Service::with(['parent', 'children'])->findOrFail($id);

        return response()->json($service);
    }
}
