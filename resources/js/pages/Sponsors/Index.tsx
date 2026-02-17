import AppLayout from '@/layouts/app-layout';
import { useRoute } from '@/lib/route';
import { Head, Link, router } from '@inertiajs/react';
import { useEffect, useState } from 'react';

interface Sponsor {
    id: number;
    name: string;
    image_path: string;
    display_order: number;
}

interface IndexProps {
    sponsors: Sponsor[];
}

export default function Index({ sponsors }: IndexProps) {
    const route = useRoute();
    const [localSponsors, setLocalSponsors] = useState(sponsors);
    const [message, setMessage] = useState<string | null>(null);
    const [selectedSponsor, setSelectedSponsor] = useState<Sponsor | null>(
        null,
    );

    useEffect(() => {
        const sessionMessage = sessionStorage.getItem('sponsor_message');
        if (sessionMessage) {
            setMessage(sessionMessage);
            sessionStorage.removeItem('sponsor_message');
            const timer = setTimeout(() => setMessage(null), 3000);
            return () => clearTimeout(timer);
        }
    }, []);

    const handleDelete = (id: number) => {
        if (confirm('Are you sure you want to delete this sponsor?')) {
            router.delete(route('sponsors.destroy', id), {
                onSuccess: () => {
                    setLocalSponsors(
                        localSponsors.filter((sponsor) => sponsor.id !== id),
                    );
                    setMessage('Sponsor deleted successfully');
                    setTimeout(() => setMessage(null), 3000);
                },
            });
        }
    };

    return (
        <>
            <Head title="Sponsor Management" />
            <AppLayout breadcrumbs={[{ title: 'Sponsors' }]}>
                <div className="space-y-6">
                    <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 className="text-3xl font-bold text-gray-900">
                                Sponsor Management
                            </h1>
                            <p className="mt-1 text-gray-600">
                                Manage and organize your sponsor logos
                            </p>
                        </div>
                        <Link
                            href={route('sponsors.create')}
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
                            Add Sponsor
                        </Link>
                    </div>

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

                    {localSponsors.length > 0 ? (
                        <div className="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                            {localSponsors.map((sponsor) => (
                                <div
                                    key={sponsor.id}
                                    className="overflow-hidden rounded-lg bg-white shadow-sm transition hover:shadow-lg"
                                >
                                    <div
                                        className="group relative h-40 cursor-pointer overflow-hidden bg-gray-100"
                                        onClick={() =>
                                            setSelectedSponsor(sponsor)
                                        }
                                    >
                                        <img
                                            src={`/${sponsor.image_path}`}
                                            alt={sponsor.name}
                                            className="h-full w-full object-contain p-6 transition duration-300 group-hover:scale-105"
                                        />
                                        <div className="absolute inset-0 bg-black opacity-0 transition duration-300 group-hover:opacity-10"></div>
                                    </div>

                                    <div className="space-y-3 p-4">
                                        <div>
                                            <h3 className="truncate text-lg font-semibold text-gray-900">
                                                {sponsor.name}
                                            </h3>
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
                                                Order: {sponsor.display_order}
                                            </div>
                                        </div>
                                    </div>

                                    <div className="flex gap-2 bg-gray-50 px-4 py-3">
                                        <Link
                                            href={route(
                                                'sponsors.edit',
                                                sponsor.id,
                                            )}
                                            className="flex-1 rounded bg-blue-50 px-3 py-2 text-center text-sm font-medium text-blue-600 transition hover:bg-blue-100"
                                        >
                                            Edit
                                        </Link>
                                        <button
                                            onClick={() =>
                                                handleDelete(sponsor.id)
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
                                No sponsors yet
                            </h3>
                            <p className="mb-6 text-gray-600">
                                Get started by adding your first sponsor logo
                            </p>
                            <Link
                                href={route('sponsors.create')}
                                className="rounded-lg bg-blue-600 px-6 py-2 font-medium text-white transition hover:bg-blue-700"
                            >
                                Add Sponsor
                            </Link>
                        </div>
                    )}
                </div>

                {selectedSponsor && (
                    <div
                        className="fixed inset-0 z-50 flex items-center justify-center bg-black/75 p-4"
                        onClick={() => setSelectedSponsor(null)}
                    >
                        <div
                            className="relative max-h-screen w-full max-w-3xl overflow-auto rounded-lg bg-white"
                            onClick={(e) => e.stopPropagation()}
                        >
                            <button
                                onClick={() => setSelectedSponsor(null)}
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
                            <div className="bg-gray-50 p-8">
                                <img
                                    src={`/${selectedSponsor.image_path}`}
                                    alt={selectedSponsor.name}
                                    className="mx-auto h-auto max-h-[70vh] w-auto"
                                />
                            </div>
                            <div className="border-t p-4">
                                <h3 className="text-lg font-semibold text-gray-900">
                                    {selectedSponsor.name}
                                </h3>
                            </div>
                        </div>
                    </div>
                )}
            </AppLayout>
        </>
    );
}
