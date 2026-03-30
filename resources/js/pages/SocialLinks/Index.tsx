import AppLayout from '@/layouts/app-layout';
import { Head, useForm, usePage } from '@inertiajs/react';

interface SocialLinkItem {
    id: number;
    platform: string;
    label: string;
    icon_class: string | null;
    url: string | null;
    display_order: number;
    is_active: boolean;
}

interface Props {
    links: SocialLinkItem[];
}

export default function Index({ links }: Props) {
    const { flash } = usePage<{ flash?: { success?: string } }>().props;

    const { data, setData, post, processing, errors } = useForm<{
        links: SocialLinkItem[];
    }>({
        links,
    });

    const updateLink = <K extends keyof SocialLinkItem>(
        id: number,
        key: K,
        value: SocialLinkItem[K],
    ) => {
        setData(
            'links',
            data.links.map((item) =>
                item.id === id ? { ...item, [key]: value } : item,
            ),
        );
    };

    const submit = (event: React.FormEvent) => {
        event.preventDefault();
        post('/admin/social-links');
    };

    return (
        <>
            <Head title="Social Links" />
            <AppLayout breadcrumbs={[{ title: 'Social Links' }]}>
                <div className="space-y-6 p-6">
                    <div>
                        <h1 className="text-2xl font-semibold">Social Links</h1>
                        <p className="text-sm text-muted-foreground">
                            Add links for major social media platforms. Only
                            non-empty active links are shown in footer social
                            icons.
                        </p>
                    </div>

                    {flash?.success && (
                        <div className="rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                            {flash.success}
                        </div>
                    )}

                    <form onSubmit={submit} className="space-y-4">
                        <div className="overflow-x-auto rounded-lg border">
                            <table className="w-full min-w-[760px] text-sm">
                                <thead className="bg-muted/40 text-left">
                                    <tr>
                                        <th className="px-3 py-2">Platform</th>
                                        <th className="px-3 py-2">Icon</th>
                                        <th className="px-3 py-2">URL</th>
                                        <th className="px-3 py-2">Order</th>
                                        <th className="px-3 py-2">Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {data.links.map((link) => (
                                        <tr
                                            key={link.id}
                                            className="border-t align-top"
                                        >
                                            <td className="px-3 py-3 font-medium">
                                                {link.label}
                                            </td>
                                            <td className="px-3 py-3 text-xs text-muted-foreground">
                                                {link.icon_class}
                                            </td>
                                            <td className="px-3 py-3">
                                                <input
                                                    type="url"
                                                    className="w-full rounded-md border px-3 py-2"
                                                    placeholder={`https://${link.platform}.com/your-page`}
                                                    value={link.url ?? ''}
                                                    onChange={(event) =>
                                                        updateLink(
                                                            link.id,
                                                            'url',
                                                            event.target.value,
                                                        )
                                                    }
                                                />
                                            </td>
                                            <td className="px-3 py-3">
                                                <input
                                                    type="number"
                                                    min={0}
                                                    className="w-24 rounded-md border px-3 py-2"
                                                    value={link.display_order}
                                                    onChange={(event) =>
                                                        updateLink(
                                                            link.id,
                                                            'display_order',
                                                            Number(
                                                                event.target
                                                                    .value,
                                                            ) || 0,
                                                        )
                                                    }
                                                />
                                            </td>
                                            <td className="px-3 py-3">
                                                <input
                                                    type="checkbox"
                                                    checked={link.is_active}
                                                    onChange={(event) =>
                                                        updateLink(
                                                            link.id,
                                                            'is_active',
                                                            event.target
                                                                .checked,
                                                        )
                                                    }
                                                />
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>

                        {errors.links && (
                            <p className="text-sm text-red-600">
                                {errors.links}
                            </p>
                        )}

                        <div className="flex justify-end">
                            <button
                                type="submit"
                                disabled={processing}
                                className="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 disabled:opacity-70"
                            >
                                {processing ? 'Saving...' : 'Save Social Links'}
                            </button>
                        </div>
                    </form>
                </div>
            </AppLayout>
        </>
    );
}
