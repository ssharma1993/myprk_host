<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SocialLinkController extends Controller
{
    public function index()
    {
        $links = SocialLink::query()
            ->orderBy('display_order')
            ->orderBy('id')
            ->get(['id', 'platform', 'label', 'icon_class', 'url', 'display_order', 'is_active']);

        return Inertia::render('SocialLinks/Index', [
            'links' => $links,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'links' => ['required', 'array'],
            'links.*.id' => ['required', 'integer', 'exists:social_links,id'],
            'links.*.url' => ['nullable', 'url', 'max:255'],
            'links.*.is_active' => ['required', 'boolean'],
            'links.*.display_order' => ['required', 'integer', 'min:0'],
        ]);

        foreach ($data['links'] as $item) {
            SocialLink::where('id', $item['id'])->update([
                'url' => $item['url'] ?? null,
                'is_active' => $item['is_active'],
                'display_order' => $item['display_order'],
            ]);
        }

        SocialLink::clearCache();

        return redirect()->back()->with('success', 'Social links updated successfully.');
    }
}
