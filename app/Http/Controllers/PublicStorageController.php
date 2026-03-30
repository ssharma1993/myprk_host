<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PublicStorageController extends Controller
{
    public function show(Request $request, string $path): BinaryFileResponse
    {
        $normalizedPath = ltrim($path, '/');

        if (Str::contains($normalizedPath, ['../', '..\\'])) {
            abort(404);
        }

        $disk = Storage::disk('public');
        $storageRelativePath = Str::startsWith($normalizedPath, 'storage/')
            ? Str::after($normalizedPath, 'storage/')
            : $normalizedPath;

        $absolutePath = null;

        if ($disk->exists($storageRelativePath)) {
            $absolutePath = storage_path('app/public/' . $storageRelativePath);
        } else {
            $publicPath = public_path($normalizedPath);

            if (File::exists($publicPath) && File::isFile($publicPath)) {
                $absolutePath = $publicPath;
            }
        }

        if ($absolutePath === null) {
            abort(404);
        }

        $mimeType = File::mimeType($absolutePath) ?: 'application/octet-stream';

        return response()->file($absolutePath, [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'public, max-age=604800',
        ]);
    }
}
