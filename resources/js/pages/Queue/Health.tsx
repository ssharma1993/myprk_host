import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem, type SharedData } from '@/types';
import { Head, router, usePage } from '@inertiajs/react';

interface QueueHealthProps {
    queue_connection: string;
    pending_jobs: number;
    failed_jobs: number;
    status: 'healthy' | 'degraded';
    checked_at: string;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Queue Health',
        href: '/queue-health',
    },
];

export default function QueueHealth({
    queue_connection,
    pending_jobs,
    failed_jobs,
    status,
    checked_at,
}: QueueHealthProps) {
    const { flash } = usePage<SharedData>().props;

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Queue Health" />
            <div className="space-y-4 rounded-xl p-4">
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

                <div className="rounded-xl border border-sidebar-border/70 bg-white p-6 dark:border-sidebar-border dark:bg-slate-950">
                    <h1 className="text-xl font-semibold text-slate-900 dark:text-white">
                        Queue Health
                    </h1>
                    <p className="mt-1 text-sm text-slate-500">
                        Last checked: {checked_at}
                    </p>

                    <div className="mt-4 grid gap-4 md:grid-cols-4">
                        <div className="rounded-lg border p-4">
                            <p className="text-xs text-slate-500">Connection</p>
                            <p className="mt-1 text-lg font-medium">
                                {queue_connection}
                            </p>
                        </div>
                        <div className="rounded-lg border p-4">
                            <p className="text-xs text-slate-500">
                                Pending Jobs
                            </p>
                            <p className="mt-1 text-lg font-medium">
                                {pending_jobs}
                            </p>
                        </div>
                        <div className="rounded-lg border p-4">
                            <p className="text-xs text-slate-500">
                                Failed Jobs
                            </p>
                            <p className="mt-1 text-lg font-medium">
                                {failed_jobs}
                            </p>
                        </div>
                        <div className="rounded-lg border p-4">
                            <p className="text-xs text-slate-500">Status</p>
                            <p
                                className={`mt-1 text-lg font-medium ${status === 'healthy' ? 'text-green-600' : 'text-amber-600'}`}
                            >
                                {status}
                            </p>
                        </div>
                    </div>

                    <div className="mt-6 flex gap-3">
                        <button
                            type="button"
                            onClick={() => router.post('/queue-run')}
                            className="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700"
                        >
                            Run Queued Emails
                        </button>
                        <button
                            type="button"
                            onClick={() => router.get('/queue-health')}
                            className="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                        >
                            Refresh
                        </button>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
