<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller
{
    /**
     * Display the services page with existing services.
     */
    public function index()
    {
        $services = Service::orderBy('display_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('services', [
            'services' => $services,
        ]);
    }

    /**
     * Store a newly created service.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services',
            'description' => 'nullable|string',
            'page_content' => 'nullable|string',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $service = Service::create($data);

        return response()->json($service, 201);
    }

    /**
     * Update the specified service.
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'description' => 'nullable|string',
            'page_content' => 'nullable|string',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $service->update($data);

        return response()->json($service);
    }

    /**
     * Remove the specified service.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Return all services as JSON ordered by display_order.
     */
    public function getAll()
    {
        $services = Service::orderBy('display_order', 'asc')
            ->get();

        return response()->json($services);
    }

    /**
     * Return a single service by id as JSON.
     */
    public function getById($id)
    {
        $service = Service::findOrFail($id);

        return response()->json($service);
    }
}
