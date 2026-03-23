<?php

namespace App\Http\Controllers;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\SvgWriter;
use Endroid\QrCode\Writer\GifWriter;
use Endroid\QrCode\Writer\WebPWriter;
use Endroid\QrCode\ErrorCorrectionLevel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QRCodeController extends Controller
{
    private function getWriter($format)
    {
        return match ($format) {
            'svg' => new SvgWriter(),
            'png' => new PngWriter(),
            'jpeg' => new PngWriter(), // Use PNG as source for JPEG conversion
            'gif' => new GifWriter(),
            'webp' => new WebPWriter(),
            default => throw new \InvalidArgumentException('Unsupported format'),
        };
    }

    private function getMimeType($format)
    {
        return match ($format) {
            'svg' => 'image/svg+xml',
            'png' => 'image/png',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            default => throw new \InvalidArgumentException('Unsupported format'),
        };
    }

    private function getExtension($format)
    {
        return match ($format) {
            'svg' => '.svg',
            'png' => '.png',
            'jpeg' => '.jpg',
            'gif' => '.gif',
            'webp' => '.webp',
            default => throw new \InvalidArgumentException('Unsupported format'),
        };
    }

    private function convertPngToJpeg($pngContent)
    {
        // Create image from string
        $image = imagecreatefromstring($pngContent);
        if (!$image) {
            throw new \Exception('Failed to create image from PNG');
        }

        // Convert to JPEG
        ob_start();
        imagejpeg($image, null, 100);
        $jpegContent = ob_get_clean();
        imagedestroy($image);

        return $jpegContent;
    }

    public function index()
    {
        return Inertia::render('QRCode');
    }

    public function generate(Request $request)
    {
        try {
            $validated = $request->validate([
                'input' => 'required|string|max:500',
                'format' => 'required|in:png,jpeg,svg,gif,webp',
            ]);

            $input = $validated['input'];
            $format = $validated['format'];

            // Create QR code
            $qrCode = new QrCode(
                data: $input,
                errorCorrectionLevel: ErrorCorrectionLevel::High,
                size: 300,
                margin: 10,
            );

            $writer = $this->getWriter($format);
            $mimeType = $this->getMimeType($format);
            $extension = $this->getExtension($format);
            $filename = 'qrcode_' . time() . $extension;

            $result = $writer->write($qrCode);
            $content = $result->getString();

            // Convert PNG to JPEG if needed
            if ($format === 'jpeg') {
                $content = $this->convertPngToJpeg($content);
            }

            $dataUri = 'data:' . $mimeType . ';base64,' . base64_encode($content);

            return response()->json([
                'success' => true,
                'dataUri' => $dataUri,
                'filename' => $filename,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'error' => 'Validation failed: ' . implode(', ', $e->validator->errors()->all()),
            ], 422);
        } catch (\Exception $e) {
            \Log::error('QR Code Generation Error: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function download(Request $request)
    {
        try {
            $validated = $request->validate([
                'input' => 'required|string|max:500',
                'format' => 'required|in:png,jpeg,svg,gif,webp',
            ]);

            $input = $validated['input'];
            $format = $validated['format'];

            $qrCode = new QrCode(
                data: $input,
                errorCorrectionLevel: ErrorCorrectionLevel::High,
                size: 300,
                margin: 10,
            );

            $writer = $this->getWriter($format);
            $mimeType = $this->getMimeType($format);
            $extension = $this->getExtension($format);
            $filename = 'qrcode_' . time() . $extension;

            $result = $writer->write($qrCode);
            $content = $result->getString();

            // Convert PNG to JPEG if needed
            if ($format === 'jpeg') {
                $content = $this->convertPngToJpeg($content);
            }

            return response($content, 200, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => "attachment; filename=\"{$filename}\"",
                'Content-Length' => strlen($content),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'error' => 'Validation failed: ' . implode(', ', $e->validator->errors()->all()),
            ], 422);
        } catch (\Exception $e) {
            \Log::error('QR Code Download Error: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}