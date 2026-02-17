import AppLayout from '@/layouts/app-layout';
import { useRoute } from '@/lib/route';
import type { SharedData } from '@/types';
import { Head, router, useForm, usePage } from '@inertiajs/react';

interface Subscriber {
    id: number;
    email: string;
    is_active: boolean;
    created_at: string;
}

interface Stats {
    total: number;
    active: number;
    inactive: number;
}

interface IndexProps {
    subscribers: Subscriber[];
    stats: Stats;
}

export default function Index({ subscribers, stats }: IndexProps) {
    const route = useRoute();
    const { flash } = usePage<SharedData>().props;
    const newsletterStatus = flash?.newsletterStatus;
    const { data, setData, post, processing, errors, reset } = useForm({
        subject: '',
        content: '',
    });

    const buildPreviewUrl = () => {
        const subject = data.subject || 'Newsletter Preview';
        const content =
            data.content || 'This is a preview of your newsletter message.';
        const query = new URLSearchParams({ subject, content });
        return `${route('newsletter.preview')}?${query.toString()}`;
    };

    const submit = (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        post(route('newsletter.send'), {
            onSuccess: () => reset('subject', 'content'),
        });
    };

    const handleDelete = (subscriberId: number) => {
        if (!confirm('Delete this subscriber?')) {
            return;
        }

        router.delete(route('newsletter.subscribers.destroy', subscriberId), {
            preserveScroll: true,
        });
    };

    return (
        <>
            <Head title="Newsletter" />
            <AppLayout breadcrumbs={[{ title: 'Newsletter' }]}>
                <div className="space-y-8">
                    <div className="grid gap-4 md:grid-cols-3">
                        <div className="rounded-lg border border-gray-200 bg-white p-4">
                            <p className="text-sm text-gray-500">Total</p>
                            <p className="text-2xl font-semibold text-gray-900">
                                {stats.total}
                            </p>
                        </div>
                        <div className="rounded-lg border border-gray-200 bg-white p-4">
                            <p className="text-sm text-gray-500">Active</p>
                            <p className="text-2xl font-semibold text-green-600">
                                {stats.active}
                            </p>
                        </div>
                        <div className="rounded-lg border border-gray-200 bg-white p-4">
                            <p className="text-sm text-gray-500">
                                Unsubscribed
                            </p>
                            <p className="text-2xl font-semibold text-gray-600">
                                {stats.inactive}
                            </p>
                        </div>
                    </div>

                    <div className="rounded-lg border border-gray-200 bg-white p-6">
                        <h2 className="text-xl font-semibold text-gray-900">
                            Send Newsletter
                        </h2>
                        <p className="mt-1 text-sm text-gray-600">
                            This will send to all active subscribers.
                        </p>

                        {flash?.success && (
                            <div className="mt-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                                {flash.success}
                            </div>
                        )}

                        {flash?.warning && (
                            <div className="mt-4 rounded-lg border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-800">
                                {flash.warning}
                            </div>
                        )}

                        {newsletterStatus && (
                            <div className="mt-4 rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-800">
                                <p>
                                    Send status: {newsletterStatus.sent}/
                                    {newsletterStatus.total} sent,{' '}
                                    {newsletterStatus.failed} failed.
                                </p>
                                {newsletterStatus.failed > 0 && (
                                    <p className="mt-1 text-xs break-all text-gray-600">
                                        Failed emails:{' '}
                                        {newsletterStatus.failed_emails.join(
                                            ', ',
                                        )}
                                    </p>
                                )}
                            </div>
                        )}

                        <form onSubmit={submit} className="mt-6 space-y-4">
                            <div>
                                <label className="mb-2 block text-sm font-medium text-gray-900">
                                    Subject
                                </label>
                                <input
                                    className={`w-full rounded-lg border px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500 ${errors.subject ? 'border-red-500 bg-red-50' : 'border-gray-300'}`}
                                    value={data.subject}
                                    onChange={(e) =>
                                        setData('subject', e.target.value)
                                    }
                                    required
                                />
                            </div>
                            <div>
                                <label className="mb-2 block text-sm font-medium text-gray-900">
                                    Message
                                </label>
                                <textarea
                                    className={`w-full rounded-lg border px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500 ${errors.content ? 'border-red-500 bg-red-50' : 'border-gray-300'}`}
                                    rows={6}
                                    value={data.content}
                                    onChange={(e) =>
                                        setData('content', e.target.value)
                                    }
                                    required
                                />
                            </div>
                            <div className="flex flex-wrap gap-3">
                                <button
                                    type="submit"
                                    className="rounded-lg bg-blue-600 px-6 py-2 font-medium text-white transition hover:bg-blue-700 disabled:opacity-50"
                                    disabled={processing}
                                >
                                    {processing ? 'Sending...' : 'Send Email'}
                                </button>
                                <button
                                    type="button"
                                    className="rounded-lg border border-gray-300 bg-white px-6 py-2 font-medium text-gray-700 transition hover:bg-gray-50"
                                    onClick={() =>
                                        window.open(
                                            buildPreviewUrl(),
                                            '_blank',
                                            'noopener,noreferrer',
                                        )
                                    }
                                >
                                    Preview Email
                                </button>
                            </div>
                        </form>
                    </div>

                    <div className="rounded-lg border border-gray-200 bg-white p-6">
                        <h2 className="text-xl font-semibold text-gray-900">
                            Subscribers
                        </h2>
                        <div className="mt-4 overflow-x-auto">
                            <table className="w-full table-auto text-sm">
                                <thead>
                                    <tr className="text-left">
                                        <th className="px-3 py-2">Email</th>
                                        <th className="px-3 py-2">Status</th>
                                        <th className="px-3 py-2">
                                            Subscribed
                                        </th>
                                        <th className="px-3 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {subscribers.length === 0 && (
                                        <tr>
                                            <td
                                                colSpan={4}
                                                className="px-3 py-6 text-center text-sm text-gray-500"
                                            >
                                                No subscribers yet
                                            </td>
                                        </tr>
                                    )}
                                    {subscribers.map((subscriber) => (
                                        <tr
                                            key={subscriber.id}
                                            className="border-t"
                                        >
                                            <td className="px-3 py-2">
                                                {subscriber.email}
                                            </td>
                                            <td className="px-3 py-2">
                                                <span
                                                    className={`rounded-full px-2 py-1 text-xs ${subscriber.is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600'}`}
                                                >
                                                    {subscriber.is_active
                                                        ? 'Active'
                                                        : 'Unsubscribed'}
                                                </span>
                                            </td>
                                            <td className="px-3 py-2 text-gray-500">
                                                {new Date(
                                                    subscriber.created_at,
                                                ).toLocaleDateString()}
                                            </td>
                                            <td className="px-3 py-2">
                                                <button
                                                    onClick={() =>
                                                        handleDelete(
                                                            subscriber.id,
                                                        )
                                                    }
                                                    className="text-sm font-medium text-red-600 hover:text-red-700"
                                                >
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </AppLayout>
        </>
    );
}
