<?php

namespace App\Http\Controllers;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\SvgWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class QRCodeController extends Controller
{
    private function getWriter($format)
    {
        switch ($format) {
            case 'svg':
                return new SvgWriter();
            case 'png':
            case 'jpeg':
            case 'gif':
            case 'webp':
                return new PngWriter();
            default:
                throw new \InvalidArgumentException('Unsupported format');
        }
    }

    private function getMimeType($format)
    {
        switch ($format) {
            case 'svg':
                return 'image/svg+xml';
            case 'jpeg':
                return 'image/jpeg';
            case 'gif':
                return 'image/gif';
            case 'webp':
                return 'image/webp';
            case 'png':
                return 'image/png';
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

    private function createQrCode($input)
    {
        if (is_callable([QrCode::class, 'create'])) {
            return QrCode::create($input)
                ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh())
                ->setSize(300)
                ->setMargin(10);
        }

        $qrCode = new QrCode($input);

        if (method_exists($qrCode, 'setErrorCorrectionLevel')) {
            $qrCode->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh());
        }

        if (method_exists($qrCode, 'setSize')) {
            $qrCode->setSize(300);
        }

        if (method_exists($qrCode, 'setMargin')) {
            $qrCode->setMargin(10);
        }

        return $qrCode;
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

            $qrCode = $this->createQrCode($input);

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
            Log::error('QR Code Generation Error: ' . $e->getMessage(), ['exception' => $e]);
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

            $qrCode = $this->createQrCode($input);

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
            Log::error('QR Code Download Error: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
