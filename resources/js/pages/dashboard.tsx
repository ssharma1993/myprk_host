import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import { type BreadcrumbItem, type SharedData } from '@/types';
import { Head, router, usePage } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];

interface DashboardProps {
    visitorCount: number;
}

export default function Dashboard({ visitorCount }: DashboardProps) {
    const { flash } = usePage<SharedData>().props;

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="f`lex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
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

                <div className="grid auto-rows-min gap-4 md:grid-cols-3">
                    <div className="relative flex items-center justify-center rounded-xl border border-sidebar-border/70 bg-white p-6 text-center dark:border-sidebar-border dark:bg-slate-950">
                        <div>
                            <p className="text-sm text-slate-500">
                                Website Visits
                            </p>
                            <p className="mt-2 text-3xl font-semibold text-slate-900 dark:text-white">
                                {visitorCount.toLocaleString()}
                            </p>
                        </div>
                    </div>
                    <div className="relative flex items-center justify-center rounded-xl border border-sidebar-border/70 bg-white p-6 text-center dark:border-sidebar-border dark:bg-slate-950">
                        <div>
                            <p className="text-sm text-slate-500">
                                Queue Worker
                            </p>
                            <button
                                type="button"
                                onClick={() => router.post('/admin/queue-run')}
                                className="mt-3 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700"
                            >
                                Run Queued Emails
                            </button>
                        </div>
                    </div>
                    <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
                    </div>
                </div>
                <div className="relative min-h-[100vh] flex-1 overflow-hidden rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                    <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
                </div>
            </div>
        </AppLayout>
    );
}
