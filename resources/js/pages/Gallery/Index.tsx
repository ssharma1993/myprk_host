import AppLayout from '@/layouts/app-layout';
import { useRoute } from '@/lib/route';
import { Head, Link, router } from '@inertiajs/react';
import { useEffect, useState } from 'react';

interface Gallery {
    id: number;
    title: string;
    description: string | null;
    image_path: string;
    display_order: number;
}

interface IndexProps {
    galleries: Gallery[];
}

export default function Index({ galleries }: IndexProps) {
    const route = useRoute();
    const [localGalleries, setLocalGalleries] = useState(galleries);
    const [message, setMessage] = useState<string | null>(null);
    const [selectedImage, setSelectedImage] = useState<Gallery | null>(null);

    useEffect(() => {
        const sessionMessage = sessionStorage.getItem('gallery_message');
        if (sessionMessage) {
            setMessage(sessionMessage);
            sessionStorage.removeItem('gallery_message');
            const timer = setTimeout(() => setMessage(null), 3000);
            return () => clearTimeout(timer);
        }
    }, []);

    const handleDelete = (id: number) => {
        if (confirm('Are you sure you want to delete this image?')) {
            router.delete(route('gallery.destroy', id), {
                onSuccess: () => {
                    setLocalGalleries(
                        localGalleries.filter((g) => g.id !== id),
                    );
                    setMessage('Image deleted successfully');
                    setTimeout(() => setMessage(null), 3000);
                },
            });
        }
    };

    return (
        <>
            <Head title="Gallery Management" />
            <AppLayout breadcrumbs={[{ title: 'Gallery' }]}>
                <div className="space-y-6">
                    {/* Header Section */}
                    <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 className="text-3xl font-bold text-gray-900">
                                Gallery Management
                            </h1>
                            <p className="mt-1 text-gray-600">
                                Manage and organize your gallery images
                            </p>
                        </div>
                        <Link
                            href={route('gallery.create')}
                            className="mt-4 inline-flex items-center gap-2 rounded-lg bg-blue-600 px-6 py-2 font-medium text-white transition hover:bg-blue-700 sm:mt-0"
                        >
                            <svg
                                className="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth={2}
                                    d="M12 4v16m8-8H4"
                                />
                            </svg>
                            Upload Image
                        </Link>
                    </div>

                    {/* Success Message */}
                    {message && (
                        <div className="flex items-start gap-3 rounded-lg border border-green-200 bg-green-50 p-4">
                            <svg
                                className="mt-0.5 h-5 w-5 flex-shrink-0 text-green-600"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fillRule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clipRule="evenodd"
                                />
                            </svg>
                            <div className="flex-1">
                                <p className="text-sm font-medium text-green-800">
                                    {message}
                                </p>
                            </div>
                            <button
                                onClick={() => setMessage(null)}
                                className="text-green-600 hover:text-green-800"
                            >
                                <svg
                                    className="h-5 w-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fillRule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clipRule="evenodd"
                                    />
                                </svg>
                            </button>
                        </div>
                    )}

                    {/* Gallery Grid */}
                    {localGalleries.length > 0 ? (
                        <div className="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                            {localGalleries.map((gallery) => (
                                <div
                                    key={gallery.id}
                                    className="overflow-hidden rounded-lg bg-white shadow-sm transition hover:shadow-lg"
                                >
                                    {/* Image Container */}
                                    <div
                                        className="group relative h-48 cursor-pointer overflow-hidden bg-gray-100"
                                        onClick={() =>
                                            setSelectedImage(gallery)
                                        }
                                    >
                                        <img
                                            src={`/${gallery.image_path}`}
                                            alt={gallery.title}
                                            className="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                                        />
                                        <div className="absolute inset-0 bg-black opacity-0 transition duration-300 group-hover:opacity-20"></div>
                                    </div>

                                    {/* Content */}
                                    <div className="space-y-3 p-4">
                                        <div>
                                            <h3 className="truncate text-lg font-semibold text-gray-900">
                                                {gallery.title}
                                            </h3>
                                            {gallery.description && (
                                                <p className="mt-1 line-clamp-2 text-sm text-gray-600">
                                                    {gallery.description}
                                                </p>
                                            )}
                                        </div>
                                        <div className="flex items-center justify-between border-t border-gray-200 pt-2">
                                            <div className="flex items-center gap-2 text-xs text-gray-500">
                                                <svg
                                                    className="h-4 w-4"
                                                    fill="currentColor"
                                                    viewBox="0 0 20 20"
                                                >
                                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path>
                                                </svg>
                                                Order: {gallery.display_order}
                                            </div>
                                        </div>
                                    </div>

                                    {/* Actions */}
                                    <div className="flex gap-2 bg-gray-50 px-4 py-3">
                                        <Link
                                            href={route(
                                                'gallery.edit',
                                                gallery.id,
                                            )}
                                            className="flex-1 rounded bg-blue-50 px-3 py-2 text-center text-sm font-medium text-blue-600 transition hover:bg-blue-100"
                                        >
                                            Edit
                                        </Link>
                                        <button
                                            onClick={() =>
                                                handleDelete(gallery.id)
                                            }
                                            className="flex-1 rounded bg-red-50 px-3 py-2 text-sm font-medium text-red-600 transition hover:bg-red-100"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            ))}
                        </div>
                    ) : (
                        <div className="flex flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 py-12">
                            <svg
                                className="mb-4 h-16 w-16 text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth={1.5}
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                />
                            </svg>
                            <h3 className="mb-1 text-lg font-medium text-gray-900">
                                No images yet
                            </h3>
                            <p className="mb-6 text-gray-600">
                                Get started by uploading your first gallery
                                image
                            </p>
                            <Link
                                href={route('gallery.create')}
                                className="rounded-lg bg-blue-600 px-6 py-2 font-medium text-white transition hover:bg-blue-700"
                            >
                                Upload Image
                            </Link>
                        </div>
                    )}
                </div>

                {/* Image Preview Modal */}
                {selectedImage && (
                    <div
                        className="bg-opacity-75 fixed inset-0 z-50 flex items-center justify-center bg-black p-4"
                        onClick={() => setSelectedImage(null)}
                    >
                        <div
                            className="relative max-h-screen w-full max-w-4xl overflow-auto rounded-lg bg-white"
                            onClick={(e) => e.stopPropagation()}
                        >
                            {/* Close Button */}
                            <button
                                onClick={() => setSelectedImage(null)}
                                className="absolute top-4 right-4 z-10 flex h-10 w-10 items-center justify-center rounded-full bg-white shadow-lg transition hover:bg-gray-100"
                            >
                                <svg
                                    className="h-6 w-6 text-gray-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth={2}
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>

                            {/* Image */}
                            <div className="bg-gray-100 p-4">
                                <img
                                    src={`/${selectedImage.image_path}`}
                                    alt={selectedImage.title}
                                    className="h-auto w-full"
                                />
                            </div>

                            {/* Image Details */}
                            <div className="space-y-4 p-6">
                                <div>
                                    <h2 className="text-2xl font-bold text-gray-900">
                                        {selectedImage.title}
                                    </h2>
                                    {selectedImage.description && (
                                        <p className="mt-2 text-gray-600">
                                            {selectedImage.description}
                                        </p>
                                    )}
                                </div>

                                <div className="border-t border-gray-200 pt-4">
                                    <div className="grid grid-cols-2 gap-4 text-sm">
                                        <div>
                                            <p className="text-gray-500">
                                                Display Order
                                            </p>
                                            <p className="font-medium text-gray-900">
                                                {selectedImage.display_order}
                                            </p>
                                        </div>
                                        <div>
                                            <p className="text-gray-500">
                                                File Path
                                            </p>
                                            <p className="truncate font-mono text-xs text-gray-600">
                                                {selectedImage.image_path}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                {/* Action Buttons */}
                                <div className="flex gap-3 border-t border-gray-200 pt-4">
                                    <Link
                                        href={route(
                                            'gallery.edit',
                                            selectedImage.id,
                                        )}
                                        className="flex-1 rounded bg-blue-600 px-4 py-2 text-center font-medium text-white transition hover:bg-blue-700"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        onClick={() => {
                                            handleDelete(selectedImage.id);
                                            setSelectedImage(null);
                                        }}
                                        className="flex-1 rounded bg-red-600 px-4 py-2 font-medium text-white transition hover:bg-red-700"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                )}
            </AppLayout>
        </>
    );
}
