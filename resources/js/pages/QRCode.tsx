import { Head } from '@inertiajs/react';
import { useState } from 'react';

interface QRCodeResponse {
    success: boolean;
    dataUri: string;
    filename: string;
}

export default function QRCode() {
    const [input, setInput] = useState('');
    const [format, setFormat] = useState('png');
    const [qrCode, setQrCode] = useState<QRCodeResponse | null>(null);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState<string | null>(null);

    const generateQRCode = async () => {
        if (!input.trim()) {
            setError('Please enter some text or URL');
            return;
        }

        setLoading(true);
        setError(null);

        try {
            const csrfToken = (
                document.querySelector(
                    'meta[name="csrf-token"]',
                ) as HTMLMetaElement
            )?.content;

            if (!csrfToken) {
                throw new Error('CSRF token not found');
            }

            const response = await fetch('/qrcode/generate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    input,
                    format,
                }),
            });

            if (!response.ok) {
                const errorData = await response.json().catch(() => ({}));
                throw new Error(
                    errorData.error ||
                        `Failed to generate QR code (${response.status})`,
                );
            }

            const data = await response.json();
            setQrCode(data);
        } catch (err) {
            setError((err as Error).message || 'Error generating QR code');
        } finally {
            setLoading(false);
        }
    };

    const downloadQRCode = async () => {
        if (!input.trim()) {
            setError('Please enter some text or URL');
            return;
        }

        try {
            const csrfToken = (
                document.querySelector(
                    'meta[name="csrf-token"]',
                ) as HTMLMetaElement
            )?.content;

            if (!csrfToken) {
                throw new Error('CSRF token not found');
            }

            const response = await fetch('/qrcode/download', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    input,
                    format,
                }),
            });

            if (!response.ok) {
                const contentType = response.headers.get('content-type');
                let errorMessage = `Failed to download QR code (${response.status})`;

                if (contentType && contentType.includes('application/json')) {
                    try {
                        const errorData = await response.json();
                        errorMessage = errorData.error || errorMessage;
                    } catch {
                        // If JSON parsing fails, use the default message
                    }
                }

                throw new Error(errorMessage);
            }

            const blob = await response.blob();
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `qrcode_${Date.now()}.${format === 'jpeg' ? 'jpg' : format}`;
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            document.body.removeChild(a);
            setError(null);
        } catch (err) {
            setError((err as Error).message || 'Error downloading QR code');
        }
    };

    return (
        <>
            <Head title="QR Code Generator" />
            <div className="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 px-4 py-12">
                <div className="mx-auto max-w-2xl">
                    <div className="rounded-lg bg-white p-8 shadow-lg">
                        <h1 className="mb-2 text-4xl font-bold text-gray-900">
                            QR Code Generator
                        </h1>
                        <p className="mb-8 text-gray-600">
                            Generate QR codes from text or URLs and download in
                            multiple formats
                        </p>

                        <div className="space-y-6">
                            {/* Input Field */}
                            <div>
                                <label
                                    htmlFor="input"
                                    className="mb-2 block text-sm font-medium text-gray-700"
                                >
                                    Text or URL
                                </label>
                                <textarea
                                    id="input"
                                    value={input}
                                    onChange={(e) => setInput(e.target.value)}
                                    placeholder="Enter text, URL, or any content for the QR code..."
                                    className="w-full resize-none rounded-lg border border-gray-300 px-4 py-3 focus:border-transparent focus:ring-2 focus:ring-indigo-500"
                                    rows={4}
                                />
                            </div>

                            {/* Format Selection */}
                            <div>
                                <label
                                    htmlFor="format"
                                    className="mb-2 block text-sm font-medium text-gray-700"
                                >
                                    Image Format
                                </label>
                                <select
                                    id="format"
                                    value={format}
                                    onChange={(e) => setFormat(e.target.value)}
                                    className="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-transparent focus:ring-2 focus:ring-indigo-500"
                                >
                                    <option value="png">PNG</option>
                                    <option value="jpeg">JPEG</option>
                                    <option value="svg">SVG</option>
                                    <option value="webp">WebP</option>
                                </select>
                            </div>

                            {/* Error Message */}
                            {error && (
                                <div className="rounded-lg border border-red-200 bg-red-50 p-4">
                                    <p className="text-red-800">{error}</p>
                                </div>
                            )}

                            {/* Buttons */}
                            <div className="flex gap-4">
                                <button
                                    onClick={generateQRCode}
                                    disabled={loading}
                                    className="flex-1 rounded-lg bg-indigo-600 px-6 py-3 font-medium text-white transition duration-200 hover:bg-indigo-700 disabled:bg-gray-400"
                                >
                                    {loading
                                        ? 'Generating...'
                                        : 'Generate QR Code'}
                                </button>
                                <button
                                    onClick={downloadQRCode}
                                    disabled={!qrCode || loading}
                                    className="flex-1 rounded-lg bg-green-600 px-6 py-3 font-medium text-white transition duration-200 hover:bg-green-700 disabled:bg-gray-400"
                                >
                                    Download QR Code
                                </button>
                            </div>

                            {/* QR Code Display */}
                            {qrCode && (
                                <div className="mt-8 border-t border-gray-200 pt-8">
                                    <h2 className="mb-4 text-2xl font-bold text-gray-900">
                                        Generated QR Code
                                    </h2>
                                    <div className="flex justify-center rounded-lg bg-gray-50 p-8">
                                        <img
                                            src={qrCode.dataUri}
                                            alt="Generated QR Code"
                                            className="max-w-sm"
                                        />
                                    </div>
                                    <p className="mt-4 text-center text-sm text-gray-600">
                                        Format:{' '}
                                        <span className="font-medium">
                                            {format.toUpperCase()}
                                        </span>
                                    </p>
                                </div>
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
