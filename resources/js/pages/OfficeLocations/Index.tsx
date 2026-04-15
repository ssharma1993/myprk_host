import AppLayout from '@/layouts/app-layout';
import { Head, useForm, usePage } from '@inertiajs/react';

interface OfficeLocationItem {
    id?: number | null;
    name: string;
    address: string;
    google_map_embed_url: string;
    google_map_url: string;
    display_order: number;
    is_active: boolean;
}

interface Props {
    locations: OfficeLocationItem[];
}

const blankLocation = (displayOrder = 0): OfficeLocationItem => ({
    id: null,
    name: '',
    address: '',
    google_map_embed_url: '',
    google_map_url: '',
    display_order: displayOrder,
    is_active: true,
});

export default function Index({ locations }: Props) {
    const { flash } = usePage<{
        flash?: { success?: string; error?: string };
    }>().props;

    const { data, setData, post, processing, errors } = useForm<{
        locations: OfficeLocationItem[];
    }>({
        locations: locations.length > 0 ? locations : [blankLocation()],
    });

    const updateLocation = <K extends keyof OfficeLocationItem>(
        index: number,
        key: K,
        value: OfficeLocationItem[K],
    ) => {
        setData(
            'locations',
            data.locations.map((location, currentIndex) =>
                currentIndex === index
                    ? { ...location, [key]: value }
                    : location,
            ),
        );
    };

    const addLocation = () => {
        setData('locations', [
            ...data.locations,
            blankLocation(data.locations.length),
        ]);
    };

    const removeLocation = (index: number) => {
        setData(
            'locations',
            data.locations.filter((_, currentIndex) => currentIndex !== index),
        );
    };

    const submit = (event: React.FormEvent) => {
        event.preventDefault();
        console.log('Form submitted with data:', data);
        post('/admin/office-locations', {
            onStart: () => console.log('Request started'),
            onProgress: (progress) => console.log('Progress:', progress),
            onFinish: () => console.log('Request finished'),
            onSuccess: () => console.log('Request succeeded'),
            onError: (errors) =>
                console.error('Request failed with errors:', errors),
        });
    };

    const errorMessages = Object.values(errors);

    return (
        <>
            <Head title="Office Locations" />
            <AppLayout breadcrumbs={[{ title: 'Office Locations' }]}>
                <div className="mx-auto max-w-6xl space-y-6 px-4 py-6">
                    <div className="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <h1 className="text-2xl font-bold text-gray-900">
                                Office Locations
                            </h1>
                            <p className="mt-1 text-sm text-gray-500">
                                Add and manage multiple office addresses shown
                                in the footer with embedded Google Maps.
                            </p>
                        </div>
                        <button
                            type="button"
                            onClick={addLocation}
                            className="rounded-lg border border-blue-200 bg-blue-50 px-4 py-2 text-sm font-medium text-blue-700 transition hover:bg-blue-100"
                        >
                            Add Location
                        </button>
                    </div>

                    <div className="rounded-lg border border-blue-100 bg-blue-50 px-4 py-3 text-sm text-blue-800">
                        Paste the Google Maps embed URL in the map field. You
                        can use either the iframe embed code or just the iframe
                        src URL from Google Maps → Share → Embed a map.
                    </div>

                    {flash?.success && (
                        <div className="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                            {flash.success}
                        </div>
                    )}

                    {flash?.error && (
                        <div className="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                            {flash.error}
                        </div>
                    )}

                    {errorMessages.length > 0 && (
                        <div className="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                            <ul className="list-disc space-y-1 pl-5">
                                {errorMessages.map((message, index) => (
                                    <li key={`${message}-${index}`}>
                                        {message}
                                    </li>
                                ))}
                            </ul>
                        </div>
                    )}

                    <form onSubmit={submit} className="space-y-6">
                        {data.locations.length === 0 ? (
                            <div className="rounded-xl border border-dashed border-gray-300 bg-white px-6 py-10 text-center text-sm text-gray-500">
                                No locations added yet. Click “Add Location” to
                                create one.
                            </div>
                        ) : (
                            data.locations.map((location, index) => (
                                <div
                                    key={location.id ?? `new-${index}`}
                                    className="rounded-xl border border-gray-200 bg-white shadow-sm"
                                >
                                    <div className="flex flex-col gap-3 border-b border-gray-100 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                                        <div>
                                            <h2 className="text-base font-semibold text-gray-800">
                                                {location.name ||
                                                    `Location ${index + 1}`}
                                            </h2>
                                            <p className="text-sm text-gray-500">
                                                Footer entry and Google map for
                                                this office.
                                            </p>
                                        </div>
                                        <button
                                            type="button"
                                            onClick={() =>
                                                removeLocation(index)
                                            }
                                            className="rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm font-medium text-red-700 transition hover:bg-red-100"
                                        >
                                            Remove
                                        </button>
                                    </div>

                                    <div className="grid gap-5 px-6 py-5 md:grid-cols-2">
                                        <div>
                                            <label className="mb-1.5 block text-sm font-medium text-gray-700">
                                                Office name
                                            </label>
                                            <input
                                                type="text"
                                                className="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm transition outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                                value={location.name}
                                                onChange={(event) =>
                                                    updateLocation(
                                                        index,
                                                        'name',
                                                        event.target.value,
                                                    )
                                                }
                                                placeholder="Toronto Office"
                                            />
                                        </div>

                                        <div>
                                            <label className="mb-1.5 block text-sm font-medium text-gray-700">
                                                Display order
                                            </label>
                                            <input
                                                type="number"
                                                min={0}
                                                className="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm transition outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                                value={location.display_order}
                                                onChange={(event) =>
                                                    updateLocation(
                                                        index,
                                                        'display_order',
                                                        Number(
                                                            event.target.value,
                                                        ) || 0,
                                                    )
                                                }
                                            />
                                        </div>

                                        <div className="md:col-span-2">
                                            <label className="mb-1.5 block text-sm font-medium text-gray-700">
                                                Address
                                            </label>
                                            <textarea
                                                rows={4}
                                                className="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm transition outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                                value={location.address}
                                                onChange={(event) =>
                                                    updateLocation(
                                                        index,
                                                        'address',
                                                        event.target.value,
                                                    )
                                                }
                                                placeholder="123 Main St&#10;Suite 400&#10;Toronto, ON M5V 2T6"
                                            />
                                        </div>

                                        <div className="md:col-span-2">
                                            <label className="mb-1.5 block text-sm font-medium text-gray-700">
                                                Google Maps embed URL
                                            </label>
                                            <input
                                                type="url"
                                                className="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm transition outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                                value={
                                                    location.google_map_embed_url
                                                }
                                                onChange={(event) =>
                                                    updateLocation(
                                                        index,
                                                        'google_map_embed_url',
                                                        event.target.value,
                                                    )
                                                }
                                                placeholder="https://www.google.com/maps/embed?..."
                                            />
                                        </div>

                                        <div className="md:col-span-2">
                                            <label className="mb-1.5 block text-sm font-medium text-gray-700">
                                                Google Maps page URL (optional)
                                            </label>
                                            <input
                                                type="url"
                                                className="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm transition outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                                value={location.google_map_url}
                                                onChange={(event) =>
                                                    updateLocation(
                                                        index,
                                                        'google_map_url',
                                                        event.target.value,
                                                    )
                                                }
                                                placeholder="https://maps.google.com/..."
                                            />
                                        </div>

                                        <div className="flex items-center gap-3 md:col-span-2">
                                            <input
                                                id={`is-active-${index}`}
                                                type="checkbox"
                                                checked={location.is_active}
                                                onChange={(event) =>
                                                    updateLocation(
                                                        index,
                                                        'is_active',
                                                        event.target.checked,
                                                    )
                                                }
                                            />
                                            <label
                                                htmlFor={`is-active-${index}`}
                                                className="text-sm font-medium text-gray-700"
                                            >
                                                Show this location in the footer
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            ))
                        )}

                        <div className="flex justify-end">
                            <button
                                type="submit"
                                disabled={processing}
                                className="rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700 disabled:opacity-60"
                            >
                                {processing
                                    ? 'Saving...'
                                    : 'Save Office Locations'}
                            </button>
                        </div>
                    </form>
                </div>
            </AppLayout>
        </>
    );
}
