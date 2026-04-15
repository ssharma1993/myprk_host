import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import axios from 'axios';
import { useEffect, useState } from 'react';

interface Service {
    id: number;
    parent_id?: number | null;
    name: string;
    icon?: string | null;
    slug?: string | null;
    description?: string | null;
    page_content?: string | null;
    image_path?: string | null;
    display_order?: number;
    children?: Service[];
}

interface ServiceRow {
    service: Service;
    level: 0 | 1;
    parentName: string | null;
}

const sortServices = (items: Service[]) => {
    return [...items].sort((leftService, rightService) => {
        const leftOrder = leftService.display_order ?? 0;
        const rightOrder = rightService.display_order ?? 0;

        if (leftOrder !== rightOrder) {
            return leftOrder - rightOrder;
        }

        return leftService.id - rightService.id;
    });
};

const buildServiceTree = (items: Service[]): Service[] => {
    if (items.some((item) => Array.isArray(item.children))) {
        return sortServices(items).map((item) => ({
            ...item,
            children: sortServices(item.children ?? []),
        }));
    }

    const servicesById = new Map<number, Service>();
    const rootServices: Service[] = [];

    for (const item of items) {
        servicesById.set(item.id, { ...item, children: [] });
    }

    for (const item of items) {
        const normalized = servicesById.get(item.id);
        if (!normalized) {
            continue;
        }

        if (item.parent_id) {
            const parentService = servicesById.get(item.parent_id);
            if (parentService) {
                parentService.children = parentService.children ?? [];
                parentService.children.push(normalized);
            } else {
                rootServices.push(normalized);
            }
        } else {
            rootServices.push(normalized);
        }
    }

    return sortServices(rootServices).map((parentService) => ({
        ...parentService,
        children: sortServices(parentService.children ?? []),
    }));
};

const flattenServiceTree = (items: Service[]): ServiceRow[] => {
    const rows: ServiceRow[] = [];

    for (const parentService of items) {
        rows.push({
            service: parentService,
            level: 0,
            parentName: null,
        });

        for (const childService of parentService.children ?? []) {
            rows.push({
                service: childService,
                level: 1,
                parentName: parentService.name,
            });
        }
    }

    return rows;
};

const resolveImageUrl = (imagePath?: string | null): string | null => {
    if (!imagePath) {
        return null;
    }

    if (imagePath.startsWith('http://') || imagePath.startsWith('https://')) {
        return imagePath;
    }

    if (imagePath.startsWith('/storage/')) {
        return imagePath;
    }

    return `/storage/${imagePath}`;
};

const toSlug = (value: string): string => {
    return value
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');
};

export default function Services() {
    const [services, setServices] = useState<Service[]>([]);
    const [name, setName] = useState('');
    const [icon, setIcon] = useState('');
    const [slug, setSlug] = useState('');
    const [description, setDescription] = useState('');
    const [pageContent, setPageContent] = useState('');
    const [displayOrder, setDisplayOrder] = useState('0');
    const [parentId, setParentId] = useState('');
    const [slugTouched, setSlugTouched] = useState(false);
    const [imageFile, setImageFile] = useState<File | null>(null);
    const [imagePreview, setImagePreview] = useState<string | null>(null);
    const [editingId, setEditingId] = useState<number | null>(null);
    const [error, setError] = useState<string | null>(null);

    const fetchServices = async () => {
        try {
            const page =
                (window as any).__INERTIA__?.page ??
                (window as any).page ??
                null;
            const initial = page?.props?.services ?? null;
            if (initial) {
                setServices(buildServiceTree(initial as Service[]));
                return;
            }

            const res = await axios.get('/admin/services/list');
            setServices(buildServiceTree(res.data as Service[]));
        } catch (err) {
            // ignore fetch errors for now
        }
    };

    useEffect(() => {
        fetchServices();
    }, []);

    const getCsrf = () =>
        (document.querySelector('meta[name="csrf-token"]') as HTMLMetaElement)
            ?.content;

    const resetForm = () => {
        setName('');
        setIcon('');
        setSlug('');
        setSlugTouched(false);
        setDescription('');
        setPageContent('');
        setDisplayOrder('0');
        setParentId('');
        setImageFile(null);
        setImagePreview(null);
        setEditingId(null);
        setError(null);
    };

    const submit = async (e: Event | any) => {
        e?.preventDefault?.();
        setError(null);

        if (!name.trim()) {
            setError('Name is required');
            return;
        }

        const computedSlug = toSlug(slug || name);

        if (!computedSlug) {
            setError('Slug is required');
            return;
        }

        try {
            const csrf = getCsrf();
            if (!csrf) throw new Error('CSRF token not found');

            const formData = new FormData();
            formData.append('name', name);
            formData.append('icon', icon);
            formData.append('slug', computedSlug);
            formData.append('parent_id', parentId ? parentId : '');
            formData.append('description', description);
            formData.append('page_content', pageContent);
            formData.append('display_order', displayOrder || '0');
            if (imageFile) {
                formData.append('image', imageFile);
            }

            const headers = {
                'X-CSRF-TOKEN': csrf,
                'Content-Type': 'multipart/form-data',
            };

            if (editingId) {
                // PHP cannot receive files via PUT, use POST + _method spoofing
                formData.append('_method', 'PUT');
                await axios.post(`/admin/services/${editingId}`, formData, {
                    headers,
                });
            } else {
                await axios.post('/admin/services', formData, { headers });
            }

            await fetchServices();
            resetForm();
        } catch (err) {
            setError((err as Error).message || 'Error saving service');
        }
    };

    const edit = (service: Service) => {
        setEditingId(service.id);
        setName(service.name);
        setIcon(service.icon ?? '');
        setSlug(service.slug ?? '');
        setSlugTouched(Boolean(service.slug));
        setDescription(service.description ?? '');
        setPageContent(service.page_content ?? '');
        setDisplayOrder(String(service.display_order ?? '0'));
        setParentId(service.parent_id ? String(service.parent_id) : '');
        setImageFile(null);
        setImagePreview(resolveImageUrl(service.image_path));
    };

    const remove = async (id: number) => {
        if (
            !confirm(
                'Delete this service? If it is a parent, its sub-services will also be deleted.',
            )
        )
            return;
        try {
            const csrf = getCsrf();
            if (!csrf) throw new Error('CSRF token not found');

            await axios.delete(`/admin/services/${id}`, {
                headers: { 'X-CSRF-TOKEN': csrf },
            });
            await fetchServices();
        } catch (err) {
            alert((err as Error).message || 'Error deleting');
        }
    };

    const serviceRows = flattenServiceTree(services);
    const parentServiceOptions = services.filter(
        (service) => service.id !== editingId,
    );

    return (
        <AppLayout
            breadcrumbs={[{ title: 'Services', href: '/admin/services' }]}
        >
            <Head title="Services">
                <link
                    rel="stylesheet"
                    href="/client/assets/vendors/visanet-icons/style.css"
                />
            </Head>

            <div className="min-h-screen p-6">
                <div className="grid gap-6 md:grid-cols-2">
                    {/* Left: Add / Edit form */}
                    <div className="rounded-lg border border-sidebar-border/70 p-6">
                        <h2 className="mb-4 text-xl font-semibold">
                            {editingId ? 'Edit Service' : 'Add Service'}
                        </h2>
                        <form onSubmit={submit} className="space-y-4">
                            <div>
                                <label className="mb-2 block text-sm font-medium">
                                    Name
                                </label>
                                <input
                                    className="w-full rounded-lg border px-3 py-2"
                                    value={name}
                                    onChange={(e) => {
                                        const value = e.target.value;
                                        setName(value);

                                        if (!slugTouched || !slug.trim()) {
                                            setSlug(toSlug(value));
                                        }
                                    }}
                                    required
                                />
                            </div>

                            <div>
                                <label className="mb-2 block text-sm font-medium">
                                    Icon Class
                                </label>
                                <input
                                    className="w-full rounded-lg border px-3 py-2"
                                    placeholder="e.g., icon-family-visa"
                                    value={icon}
                                    onChange={(e) => setIcon(e.target.value)}
                                />
                            </div>

                            <div>
                                <label className="mb-2 block text-sm font-medium">
                                    Slug
                                </label>
                                <input
                                    className="w-full rounded-lg border px-3 py-2"
                                    placeholder="e.g., family-visa"
                                    value={slug}
                                    onChange={(e) => {
                                        setSlugTouched(true);
                                        setSlug(toSlug(e.target.value));
                                    }}
                                    required
                                />
                            </div>

                            <div>
                                <label className="mb-2 block text-sm font-medium">
                                    Parent Service
                                </label>
                                <select
                                    className="w-full rounded-lg border px-3 py-2"
                                    value={parentId}
                                    onChange={(event) =>
                                        setParentId(event.target.value)
                                    }
                                >
                                    <option value="">
                                        No Parent (Top-level Service)
                                    </option>
                                    {parentServiceOptions.map((service) => (
                                        <option
                                            key={service.id}
                                            value={service.id}
                                        >
                                            {service.name}
                                        </option>
                                    ))}
                                </select>
                            </div>

                            <div>
                                <label className="mb-2 block text-sm font-medium">
                                    Description (Short)
                                </label>
                                <textarea
                                    className="w-full rounded-lg border px-3 py-2"
                                    rows={3}
                                    value={description}
                                    onChange={(e) =>
                                        setDescription(e.target.value)
                                    }
                                />
                            </div>

                            <div>
                                <label className="mb-2 block text-sm font-medium">
                                    Page Content (Full Description)
                                </label>
                                <textarea
                                    className="w-full rounded-lg border px-3 py-2"
                                    rows={5}
                                    value={pageContent}
                                    onChange={(e) =>
                                        setPageContent(e.target.value)
                                    }
                                />
                            </div>

                            <div>
                                <label className="mb-2 block text-sm font-medium">
                                    Display Order
                                </label>
                                <input
                                    type="number"
                                    className="w-full rounded-lg border px-3 py-2"
                                    value={displayOrder}
                                    onChange={(e) =>
                                        setDisplayOrder(e.target.value)
                                    }
                                />
                            </div>

                            <div>
                                <label className="mb-2 block text-sm font-medium">
                                    Service Image
                                </label>
                                {imagePreview && (
                                    <div className="mb-2">
                                        <img
                                            src={imagePreview}
                                            alt="Current image"
                                            className="h-24 w-auto rounded-lg border object-cover"
                                        />
                                        <p className="mt-1 text-xs text-muted-foreground">
                                            Current image
                                        </p>
                                    </div>
                                )}
                                <input
                                    type="file"
                                    accept="image/*"
                                    className="w-full rounded-lg border px-3 py-2 text-sm"
                                    onChange={(e) => {
                                        const file =
                                            e.target.files?.[0] ?? null;
                                        setImageFile(file);
                                        if (file) {
                                            setImagePreview(
                                                URL.createObjectURL(file),
                                            );
                                        }
                                    }}
                                />
                                <p className="mt-1 text-xs text-muted-foreground">
                                    JPG, PNG, WebP or GIF · max 5 MB
                                </p>
                            </div>

                            {error && (
                                <div className="text-sm text-red-600">
                                    {error}
                                </div>
                            )}

                            <div className="flex gap-3">
                                <button
                                    className="rounded bg-indigo-600 px-4 py-2 text-white"
                                    type="submit"
                                >
                                    {editingId ? 'Update' : 'Add'}
                                </button>
                                <button
                                    type="button"
                                    className="rounded border px-4 py-2"
                                    onClick={resetForm}
                                >
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>

                    {/* Right: Table of services */}
                    <div className="rounded-lg border border-sidebar-border/70 p-6">
                        <h2 className="mb-4 text-xl font-semibold">
                            All Services
                        </h2>
                        <div className="overflow-x-auto">
                            <table className="w-full table-auto text-sm">
                                <thead>
                                    <tr className="text-left">
                                        <th className="px-3 py-2">Name</th>
                                        <th className="px-3 py-2">Type</th>
                                        <th className="px-3 py-2">Parent</th>
                                        <th className="px-3 py-2">Icon</th>
                                        <th className="px-3 py-2">Slug</th>
                                        <th className="px-3 py-2">Image</th>
                                        <th className="px-3 py-2">Order</th>
                                        <th className="px-3 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {services.length === 0 && (
                                        <tr>
                                            <td
                                                colSpan={8}
                                                className="px-3 py-6 text-center text-sm text-muted-foreground"
                                            >
                                                No services found
                                            </td>
                                        </tr>
                                    )}

                                    {serviceRows.map(
                                        ({ service, level, parentName }) => (
                                            <tr
                                                key={service.id}
                                                className="border-t"
                                            >
                                                <td className="max-w-xs truncate px-3 py-2 align-top">
                                                    <span
                                                        className={
                                                            level === 1
                                                                ? 'pl-5'
                                                                : ''
                                                        }
                                                    >
                                                        {level === 1
                                                            ? '↳ '
                                                            : ''}
                                                        {service.name}
                                                    </span>
                                                </td>
                                                <td className="px-3 py-2 align-top">
                                                    {level === 0
                                                        ? 'Parent'
                                                        : 'Sub-service'}
                                                </td>
                                                <td className="px-3 py-2 align-top text-xs">
                                                    {parentName ?? '-'}
                                                </td>
                                                <td className="px-3 py-2 align-top text-xs">
                                                    {service.icon}
                                                </td>
                                                <td className="px-3 py-2 align-top text-xs">
                                                    {service.slug}
                                                </td>
                                                <td className="px-3 py-2 align-top">
                                                    {resolveImageUrl(
                                                        service.image_path,
                                                    ) ? (
                                                        <img
                                                            src={
                                                                resolveImageUrl(
                                                                    service.image_path,
                                                                ) as string
                                                            }
                                                            alt={service.name}
                                                            className="h-10 w-16 rounded object-cover"
                                                        />
                                                    ) : (
                                                        <span className="text-xs text-muted-foreground">
                                                            —
                                                        </span>
                                                    )}
                                                </td>
                                                <td className="px-3 py-2 align-top">
                                                    {service.display_order}
                                                </td>
                                                <td className="px-3 py-2 align-top">
                                                    <div className="flex gap-2">
                                                        <button
                                                            onClick={() =>
                                                                edit(service)
                                                            }
                                                            className="rounded border px-3 py-1 text-sm"
                                                        >
                                                            Edit
                                                        </button>
                                                        <button
                                                            onClick={() =>
                                                                remove(
                                                                    service.id,
                                                                )
                                                            }
                                                            className="rounded bg-red-600 px-3 py-1 text-sm text-white"
                                                        >
                                                            Delete
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        ),
                                    )}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {/* Icons Reference Section */}
                <div className="col-span-full rounded-lg border border-sidebar-border/70 p-6">
                    <h2 className="mb-4 text-xl font-semibold">
                        Available Icons
                    </h2>
                    <p className="mb-4 text-sm text-muted-foreground">
                        Use any of these icon classes in the "Icon Class" field
                        above. The icons will display next to the service name.
                    </p>
                    <div className="grid grid-cols-2 gap-3 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6">
                        {[
                            'icon-visa',
                            'icon-quote-2',
                            'icon-zoom-in',
                            'icon-play',
                            'icon-trolley-cart',
                            'icon-quote',
                            'icon-checked',
                            'icon-brainstorming',
                            'icon-passport',
                            'icon-comment-2',
                            'icon-arrow-bottom-2',
                            'icon-location-2',
                            'icon-email-2',
                            'icon-phone-call',
                            'icon-arrow-right-3',
                            'icon-arrow-left-2',
                            'icon-arrow-left',
                            'icon-arrow-right',
                            'icon-plus',
                            'icon-comment',
                            'icon-user',
                            'icon-search',
                            'icon-close',
                            'icon-grid',
                            'icon-arrow-right-up',
                            'icon-arrow-left-up',
                            'icon-arrow-bottom',
                            'icon-location',
                            'icon-email',
                            'icon-calendar',
                            'icon-arrow-right-2',
                            'icon-eye',
                            'icon-loop',
                            'icon-heart',
                            'icon-down-arrow',
                            'icon-up-arrow',
                            'icon-airplane',
                            'icon-airplane-2',
                            'icon-travel-visa',
                            'icon-students-visa',
                            'icon-family-visa',
                            'icon-business-visa',
                            'icon-visa-processing',
                            'icon-immigration-visa',
                            'icon-download',
                            'icon-pdf',
                            'icon-support',
                            'icon-luggage',
                            'icon-supportive',
                            'icon-immigration',
                            'icon-email-3',
                            'icon-paper-plane',
                            'icon-completed-task',
                            'icon-immigration-officer',
                            'icon-place',
                            'icon-satisfaction',
                            'icon-check',
                        ].map((iconClass) => (
                            <div
                                key={iconClass}
                                className="hover:bg-sidebar-background/50 flex flex-col items-center gap-2 rounded-lg border p-3 transition-colors"
                            >
                                <div className="flex h-12 w-12 items-center justify-center text-2xl text-indigo-600">
                                    <i className={iconClass}></i>
                                </div>
                                <span className="text-center font-mono text-xs break-words text-muted-foreground">
                                    {iconClass}
                                </span>
                            </div>
                        ))}
                    </div>
                    <p className="mt-6 border-t pt-4 text-sm text-muted-foreground">
                        <strong>Total Available Icons:</strong> 57 icons ready
                        to use.
                    </p>
                </div>
            </div>
        </AppLayout>
    );
}
