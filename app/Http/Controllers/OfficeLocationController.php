<?php

namespace App\Http\Controllers;

use App\Models\OfficeLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class OfficeLocationController extends Controller
{
    public function index()
    {
        $locations = OfficeLocation::query()
            ->orderBy('display_order')
            ->orderBy('id')
            ->get([
                'id',
                'name',
                'address',
                'google_map_embed_url',
                'google_map_url',
                'display_order',
                'is_active',
            ]);

        return Inertia::render('OfficeLocations/Index', [
            'locations' => $locations,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'locations' => ['required', 'array'],
            'locations.*.id' => ['nullable', 'integer', 'exists:office_locations,id'],
            'locations.*.name' => ['required', 'string', 'max:255'],
            'locations.*.address' => ['required', 'string', 'max:1000'],
            'locations.*.google_map_embed_url' => ['required', 'string', 'max:2000'],
            'locations.*.google_map_url' => ['nullable', 'url', 'max:2000'],
            'locations.*.display_order' => ['required', 'integer', 'min:0'],
            'locations.*.is_active' => ['required', 'boolean'],
        ]);

        foreach ($data['locations'] as $index => $item) {
            $data['locations'][$index]['google_map_embed_url'] = $this->normalizeGoogleMapEmbedUrl(
                $item['google_map_embed_url']
            );

            if (!$this->isValidGoogleMapEmbedUrl($data['locations'][$index]['google_map_embed_url'])) {
                throw ValidationException::withMessages([
                    "locations.$index.google_map_embed_url" => 'Please enter a valid Google Maps embed URL or paste the iframe embed code.',
                ]);
            }
        }

        DB::transaction(function () use ($data) {
            $keptIds = [];

            foreach ($data['locations'] as $item) {
                if (!empty($item['id'])) {
                    $location = OfficeLocation::findOrFail($item['id']);
                    $location->update([
                        'name' => $item['name'],
                        'address' => $item['address'],
                        'google_map_embed_url' => $item['google_map_embed_url'],
                        'google_map_url' => $item['google_map_url'] ?? null,
                        'display_order' => $item['display_order'],
                        'is_active' => $item['is_active'],
                    ]);
                } else {
                    $location = OfficeLocation::create([
                        'name' => $item['name'],
                        'address' => $item['address'],
                        'google_map_embed_url' => $item['google_map_embed_url'],
                        'google_map_url' => $item['google_map_url'] ?? null,
                        'display_order' => $item['display_order'],
                        'is_active' => $item['is_active'],
                    ]);
                }

                $keptIds[] = $location->id;
            }

            if (count($keptIds) > 0) {
                OfficeLocation::whereNotIn('id', $keptIds)->delete();
            } else {
                OfficeLocation::query()->delete();
            }
        });

        OfficeLocation::clearCache();

        return redirect()->back()->with('success', 'Office locations updated successfully.');
    }

    private function normalizeGoogleMapEmbedUrl(string $value): string
    {
        $value = trim(html_entity_decode($value, ENT_QUOTES, 'UTF-8'));

        if (preg_match('/src=["\']([^"\']+)["\']/i', $value, $matches)) {
            $value = $matches[1];
        }

        if (strpos($value, '//') === 0) {
            $value = 'https:' . $value;
        }

        return trim($value);
    }

    private function isValidGoogleMapEmbedUrl(string $url): bool
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }

        $host = (string) parse_url($url, PHP_URL_HOST);
        $path = (string) parse_url($url, PHP_URL_PATH);
        $query = (string) parse_url($url, PHP_URL_QUERY);

        $allowedHosts = [
            'www.google.com',
            'google.com',
            'maps.google.com',
            'www.google.ca',
            'google.ca',
            'maps.google.ca',
        ];

        if (!in_array($host, $allowedHosts, true)) {
            return false;
        }

        return strpos($path, '/maps/embed') !== false
            || strpos($query, 'output=embed') !== false
            || strpos($query, 'pb=') !== false;
    }
}
