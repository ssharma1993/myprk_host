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
        switch ($format) {
            case 'svg':
                return new SvgWriter();
            case 'png':
                return new PngWriter();
            case 'jpeg':
                return new PngWriter();
            case 'gif':
                return new GifWriter();
            case 'webp':
                return new WebPWriter();
            default:
                throw new \InvalidArgumentException('Unsupported format');
        }
    }

    private function getMimeType($format)
    {
        switch ($format) {
            case 'svg':
                return 'image/svg+xml';
            case 'png':
                return 'image/png';
            case 'jpeg':
                return 'image/jpeg';
            case 'gif':
                return 'image/gif';
            case 'webp':
                return 'image/webp';
            default:
                throw new \InvalidArgumentException('Unsupported format');
        }
    }

    private function getExtension($format)
    {
        switch ($format) {
            case 'svg':
                return '.svg';
            case 'png':
                return '.png';
            case 'jpeg':
                return '.jpg';
            case 'gif':
                return '.gif';
            case 'webp':
                return '.webp';
            default:
                throw new \InvalidArgumentException('Unsupported format');
        }
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
                $input,
                ErrorCorrectionLevel::High,
                300,
                10
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
                $input,
                ErrorCorrectionLevel::High,
                300,
                10
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