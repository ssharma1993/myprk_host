<?php

namespace App\Http\Controllers;

use App\Models\SeoSetting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SeoController extends Controller
{
    public function index()
    {
        $settings = SeoSetting::all()->keyBy('key')->map(fn($s) => [
            'key'   => $s->key,
            'label' => $s->label,
            'group' => $s->group,
            'value' => $s->value ?? '',
        ]);

        return Inertia::render('SEO/Index', [
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'settings'       => 'required|array',
            'settings.*.key' => 'required|string|max:100',
            'settings.*.value' => 'nullable|string',
        ]);

        foreach ($data['settings'] as $item) {
            SeoSetting::where('key', $item['key'])->update(['value' => $item['value'] ?? '']);
        }

        SeoSetting::clearCache();

        return redirect()->back()->with('success', 'SEO settings saved successfully.');
    }
}
