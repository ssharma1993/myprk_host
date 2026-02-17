import AppLayout from '@/layouts/app-layout';
import { useRoute } from '@/lib/route';
import { Head, Link, useForm } from '@inertiajs/react';
import { FormEventHandler } from 'react';

export default function Create() {
    const route = useRoute();
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        image: null as File | null,
        display_order: 0,
    });

    const handleFileChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        if (e.target.files && e.target.files[0]) {
            setData('image', e.target.files[0]);
        }
    };

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('sponsors.store'), {
            forceFormData: true,
        });
    };

    return (
        <>
            <Head title="Add Sponsor" />
            <AppLayout
                breadcrumbs={[
                    { title: 'Sponsors', href: route('sponsors.index') },
                    { title: 'Add' },
                ]}
            >
                <div className="space-y-6">
                    <div className="rounded-lg bg-white p-6 shadow-sm">
                        <div className="mb-6">
                            <h2 className="text-2xl font-bold text-gray-900">
                                Add Sponsor
                            </h2>
                            <p className="mt-1 text-gray-600">
                                Upload a new sponsor logo
                            </p>
                        </div>

                        {Object.keys(errors).length > 0 && (
                            <div className="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">
                                <h3 className="mb-2 text-sm font-medium text-red-800">
                                    <strong>
                                        Please fix the following errors:
                                    </strong>
                                </h3>
                                <ul className="list-inside list-disc space-y-1">
                                    {Object.entries(errors).map(
                                        ([field, message]) => (
                                            <li
                                                key={field}
                                                className="text-sm text-red-700"
                                            >
                                                {message}
                                            </li>
                                        ),
                                    )}
                                </ul>
                            </div>
                        )}

                        <form onSubmit={submit} className="space-y-6">
                            <div>
                                <label
                                    htmlFor="name"
                                    className="mb-2 block text-sm font-medium text-gray-900"
                                >
                                    Sponsor Name{' '}
                                    <span className="text-red-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    className={`w-full rounded-lg border px-4 py-2 transition outline-none focus:border-transparent focus:ring-2 focus:ring-blue-500 ${errors.name ? 'border-red-500 bg-red-50' : 'border-gray-300'}`}
                                    id="name"
                                    value={data.name}
                                    onChange={(e) =>
                                        setData('name', e.target.value)
                                    }
                                    placeholder="Enter sponsor name"
                                    required
                                />
                            </div>

                            <div>
                                <label
                                    htmlFor="image"
                                    className="mb-2 block text-sm font-medium text-gray-900"
                                >
                                    Sponsor Logo{' '}
                                    <span className="text-red-500">*</span>
                                </label>
                                <div
                                    className={`cursor-pointer rounded-lg border-2 border-dashed p-6 text-center transition ${errors.image ? 'border-red-500 bg-red-50' : 'border-gray-300 hover:border-gray-400'}`}
                                >
                                    <input
                                        type="file"
                                        className="hidden"
                                        id="image"
                                        accept="image/*"
                                        onChange={handleFileChange}
                                        required
                                    />
                                    <label
                                        htmlFor="image"
                                        className="cursor-pointer"
                                    >
                                        <svg
                                            className="mx-auto h-12 w-12 text-gray-400"
                                            stroke="currentColor"
                                            fill="none"
                                            viewBox="0 0 48 48"
                                        >
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20m-18-8l-6 6m0 0l6 6m-6-6h16"
                                                strokeWidth={2}
                                                strokeLinecap="round"
                                                strokeLinejoin="round"
                                            />
                                        </svg>
                                        <p className="mt-2 text-sm text-gray-600">
                                            <span className="font-medium text-blue-600 hover:text-blue-500">
                                                Click to upload
                                            </span>{' '}
                                            or drag and drop
                                        </p>
                                        <p className="text-xs text-gray-500">
                                            PNG, JPG, GIF up to 2MB
                                        </p>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label
                                    htmlFor="display_order"
                                    className="mb-2 block text-sm font-medium text-gray-900"
                                >
                                    Display Order{' '}
                                    <span className="text-red-500">*</span>
                                </label>
                                <input
                                    type="number"
                                    className={`w-full rounded-lg border px-4 py-2 transition outline-none focus:border-transparent focus:ring-2 focus:ring-blue-500 ${errors.display_order ? 'border-red-500 bg-red-50' : 'border-gray-300'}`}
                                    id="display_order"
                                    value={data.display_order}
                                    onChange={(e) =>
                                        setData(
                                            'display_order',
                                            parseInt(e.target.value),
                                        )
                                    }
                                    placeholder="0"
                                    required
                                />
                                <p className="mt-1 text-xs text-gray-500">
                                    Lower numbers appear first
                                </p>
                            </div>

                            <div className="flex gap-3 pt-4">
                                <button
                                    type="submit"
                                    className="rounded-lg bg-blue-600 px-6 py-2 font-medium text-white transition hover:bg-blue-700 disabled:opacity-50"
                                    disabled={processing}
                                >
                                    {processing
                                        ? 'Uploading...'
                                        : 'Add Sponsor'}
                                </button>
                                <Link
                                    href={route('sponsors.index')}
                                    className="rounded-lg bg-gray-200 px-6 py-2 font-medium text-gray-900 transition hover:bg-gray-300"
                                >
                                    Cancel
                                </Link>
                            </div>
                        </form>
                    </div>
                </div>
            </AppLayout>
        </>
    );
}
