import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import axios from 'axios';
import { useEffect, useState } from 'react';

interface Service {
    id: number;
    name: string;
    icon?: string | null;
    slug?: string | null;
    description?: string | null;
    page_content?: string | null;
    display_order?: number;
}

export default function Services() {
    const [services, setServices] = useState<Service[]>([]);
    const [name, setName] = useState('');
    const [icon, setIcon] = useState('');
    const [slug, setSlug] = useState('');
    const [description, setDescription] = useState('');
    const [pageContent, setPageContent] = useState('');
    const [displayOrder, setDisplayOrder] = useState('0');
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
                setServices(initial as Service[]);
                return;
            }

            const res = await axios.get('/services/list');
            setServices(res.data);
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
        setDescription('');
        setPageContent('');
        setDisplayOrder('0');
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

        try {
            const payload = {
                name,
                icon,
                slug,
                description,
                page_content: pageContent,
                display_order: parseInt(displayOrder || '0', 10),
            };
            const csrf = getCsrf();
            if (!csrf) throw new Error('CSRF token not found');

            const url = editingId ? `/services/${editingId}` : '/services';
            if (editingId) {
                await axios.put(url, payload, {
                    headers: { 'X-CSRF-TOKEN': csrf },
                });
            } else {
                await axios.post(url, payload, {
                    headers: { 'X-CSRF-TOKEN': csrf },
                });
            }

            await fetchServices();
            resetForm();
        } catch (err) {
            setError((err as Error).message || 'Error saving service');
        }
    };

    const edit = (s: Service) => {
        setEditingId(s.id);
        setName(s.name);
        setIcon(s.icon ?? '');
        setSlug(s.slug ?? '');
        setDescription(s.description ?? '');
        setPageContent(s.page_content ?? '');
        setDisplayOrder(String(s.display_order ?? '0'));
    };

    const remove = async (id: number) => {
        if (!confirm('Delete this service?')) return;
        try {
            const csrf = getCsrf();
            if (!csrf) throw new Error('CSRF token not found');

            await axios.delete(`/services/${id}`, {
                headers: { 'X-CSRF-TOKEN': csrf },
            });
            await fetchServices();
        } catch (err) {
            alert((err as Error).message || 'Error deleting');
        }
    };

    return (
        <AppLayout breadcrumbs={[{ title: 'Services', href: '/services' }]}>
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
                                    onChange={(e) => setName(e.target.value)}
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
                                    onChange={(e) => setSlug(e.target.value)}
                                />
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
                                        <th className="px-3 py-2">Icon</th>
                                        <th className="px-3 py-2">Slug</th>
                                        <th className="px-3 py-2">Order</th>
                                        <th className="px-3 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {services.length === 0 && (
                                        <tr>
                                            <td
                                                colSpan={5}
                                                className="px-3 py-6 text-center text-sm text-muted-foreground"
                                            >
                                                No services found
                                            </td>
                                        </tr>
                                    )}

                                    {services.map((s) => (
                                        <tr key={s.id} className="border-t">
                                            <td className="max-w-xs truncate px-3 py-2 align-top">
                                                {s.name}
                                            </td>
                                            <td className="px-3 py-2 align-top text-xs">
                                                {s.icon}
                                            </td>
                                            <td className="px-3 py-2 align-top text-xs">
                                                {s.slug}
                                            </td>
                                            <td className="px-3 py-2 align-top">
                                                {s.display_order}
                                            </td>
                                            <td className="px-3 py-2 align-top">
                                                <div className="flex gap-2">
                                                    <button
                                                        onClick={() => edit(s)}
                                                        className="rounded border px-3 py-1 text-sm"
                                                    >
                                                        Edit
                                                    </button>
                                                    <button
                                                        onClick={() =>
                                                            remove(s.id)
                                                        }
                                                        className="rounded bg-red-600 px-3 py-1 text-sm text-white"
                                                    >
                                                        Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    ))}
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
