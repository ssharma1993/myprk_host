import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem, type SharedData } from '@/types';
import { Head, Link, router, usePage } from '@inertiajs/react';
import { ChevronLeft, ChevronRight, Download, Trash2 } from 'lucide-react';

interface LogEntry {
    timestamp: string;
    level: string;
    message: string;
    file: string;
    context: Record<string, unknown>;
}

interface LogFile {
    name: string;
    path: string;
    size: string;
    sizeBytes: number;
    modified: string;
}

interface LogsIndexProps {
    logs: LogEntry[];
    currentPage: number;
    lastPage: number;
    total: number;
    perPage: number;
    logFiles: LogFile[];
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Logs',
        href: '/logs',
    },
];

const levelColors: Record<string, string> = {
    ERROR: 'text-red-600 bg-red-50 border-red-200',
    CRITICAL: 'text-red-700 bg-red-100 border-red-300',
    WARNING: 'text-yellow-600 bg-yellow-50 border-yellow-200',
    INFO: 'text-blue-600 bg-blue-50 border-blue-200',
    DEBUG: 'text-gray-600 bg-gray-50 border-gray-200',
    ALERT: 'text-orange-600 bg-orange-50 border-orange-200',
    NOTICE: 'text-cyan-600 bg-cyan-50 border-cyan-200',
};

export default function LogsIndex({
    logs,
    currentPage,
    lastPage,
    total,
    perPage,
    logFiles,
}: LogsIndexProps) {
    const { flash } = usePage<SharedData>().props;

    const getLevelColor = (level: string) => {
        return levelColors[level] || 'text-gray-600 bg-gray-50 border-gray-200';
    };

    const handleClearLogs = () => {
        if (
            confirm(
                'Are you sure you want to clear all log files? This action cannot be undone.',
            )
        ) {
            router.post('/logs/clear');
        }
    };

    const handleDownload = (filePath: string) => {
        window.location.href = `/logs/download?file=${filePath}`;
    };

    const startEntry = (currentPage - 1) * perPage + 1;
    const endEntry = Math.min(currentPage * perPage, total);

    return (
        <>
            <Head title="Logs" />
            <AppLayout breadcrumbs={breadcrumbs}>
                <div className="space-y-6">
                    {/* Alert Messages */}
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

                    {/* Stats & Controls */}
                    <div className="rounded-xl border border-sidebar-border/70 bg-white p-6 dark:border-sidebar-border dark:bg-slate-950">
                        <div className="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h1 className="text-2xl font-semibold text-slate-900 dark:text-white">
                                    Application Logs
                                </h1>
                                <p className="mt-1 text-sm text-slate-500">
                                    Total entries:{' '}
                                    <span className="font-semibold">
                                        {total}
                                    </span>
                                </p>
                            </div>
                            <button
                                onClick={handleClearLogs}
                                className="inline-flex items-center gap-2 rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700 disabled:opacity-50"
                            >
                                <Trash2 className="h-4 w-4" />
                                Clear All Logs
                            </button>
                        </div>

                        {/* Log Files Info */}
                        {logFiles.length > 0 && (
                            <div className="mb-6 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                                {logFiles.map((file) => (
                                    <div
                                        key={file.name}
                                        className="rounded-lg border border-gray-200 bg-gray-50 p-3"
                                    >
                                        <p className="truncate text-sm font-medium text-gray-900">
                                            {file.name}
                                        </p>
                                        <p className="mt-1 text-xs text-gray-600">
                                            Size: {file.size}
                                        </p>
                                        <p className="text-xs text-gray-600">
                                            Modified: {file.modified}
                                        </p>
                                        <button
                                            onClick={() =>
                                                handleDownload(file.path)
                                            }
                                            className="mt-2 inline-flex items-center gap-1 text-xs font-medium text-blue-600 hover:text-blue-700"
                                        >
                                            <Download className="h-3 w-3" />
                                            Download
                                        </button>
                                    </div>
                                ))}
                            </div>
                        )}
                    </div>

                    {/* Logs Table */}
                    <div className="rounded-xl border border-sidebar-border/70 bg-white dark:border-sidebar-border dark:bg-slate-950">
                        <div className="overflow-x-auto">
                            <table className="w-full text-sm">
                                <thead className="border-b border-gray-200 bg-gray-50 dark:border-slate-700 dark:bg-slate-900">
                                    <tr>
                                        <th className="px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">
                                            Timestamp
                                        </th>
                                        <th className="px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">
                                            Level
                                        </th>
                                        <th className="px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">
                                            File
                                        </th>
                                        <th className="px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">
                                            Message
                                        </th>
                                    </tr>
                                </thead>
                                <tbody className="divide-y divide-gray-200 dark:divide-slate-700">
                                    {logs.length === 0 ? (
                                        <tr>
                                            <td
                                                colSpan={4}
                                                className="px-4 py-8 text-center text-gray-500"
                                            >
                                                No logs found
                                            </td>
                                        </tr>
                                    ) : (
                                        logs.map((log, idx) => (
                                            <tr
                                                key={`${log.file}-${idx}`}
                                                className="hover:bg-gray-50 dark:hover:bg-slate-800"
                                            >
                                                <td className="px-4 py-3 whitespace-nowrap text-gray-700 dark:text-gray-300">
                                                    {log.timestamp}
                                                </td>
                                                <td className="px-4 py-3">
                                                    <span
                                                        className={`inline-flex rounded-full border px-2.5 py-0.5 text-xs font-medium ${getLevelColor(log.level)}`}
                                                    >
                                                        {log.level}
                                                    </span>
                                                </td>
                                                <td className="px-4 py-3 text-xs whitespace-nowrap text-gray-600 dark:text-gray-400">
                                                    {log.file}
                                                </td>
                                                <td className="max-w-lg px-4 py-3 text-gray-700 dark:text-gray-300">
                                                    <pre className="rounded bg-gray-50 p-2 text-xs break-words whitespace-pre-wrap dark:bg-slate-900">
                                                        {log.message.substring(
                                                            0,
                                                            200,
                                                        )}
                                                        {log.message.length >
                                                            200 && '...'}
                                                    </pre>
                                                </td>
                                            </tr>
                                        ))
                                    )}
                                </tbody>
                            </table>
                        </div>

                        {/* Pagination */}
                        {lastPage > 1 && (
                            <div className="flex items-center justify-between border-t border-gray-200 bg-gray-50 px-4 py-3 dark:border-slate-700 dark:bg-slate-900">
                                <p className="text-sm text-gray-600 dark:text-gray-400">
                                    Showing {startEntry} to {endEntry} of{' '}
                                    {total} entries
                                </p>
                                <div className="flex gap-2">
                                    <Link
                                        href={
                                            currentPage > 1
                                                ? `/logs?page=${currentPage - 1}`
                                                : '#'
                                        }
                                        className={`inline-flex items-center gap-1 rounded-lg px-3 py-1.5 text-sm font-medium ${
                                            currentPage > 1
                                                ? 'bg-white text-gray-700 hover:bg-gray-50 dark:bg-slate-800 dark:text-gray-300'
                                                : 'bg-gray-100 text-gray-400 dark:bg-slate-800'
                                        }`}
                                    >
                                        <ChevronLeft className="h-4 w-4" />
                                        Previous
                                    </Link>

                                    <div className="flex items-center gap-1">
                                        {Array.from(
                                            { length: lastPage },
                                            (_, i) => i + 1,
                                        )
                                            .slice(
                                                Math.max(0, currentPage - 2),
                                                Math.min(
                                                    lastPage,
                                                    currentPage + 1,
                                                ),
                                            )
                                            .map((page) => (
                                                <Link
                                                    key={page}
                                                    href={`/logs?page=${page}`}
                                                    className={`rounded px-3 py-1.5 text-sm font-medium ${
                                                        page === currentPage
                                                            ? 'bg-blue-600 text-white'
                                                            : 'bg-white text-gray-700 hover:bg-gray-50 dark:bg-slate-800 dark:text-gray-300'
                                                    }`}
                                                >
                                                    {page}
                                                </Link>
                                            ))}
                                    </div>

                                    <Link
                                        href={
                                            currentPage < lastPage
                                                ? `/logs?page=${currentPage + 1}`
                                                : '#'
                                        }
                                        className={`inline-flex items-center gap-1 rounded-lg px-3 py-1.5 text-sm font-medium ${
                                            currentPage < lastPage
                                                ? 'bg-white text-gray-700 hover:bg-gray-50 dark:bg-slate-800 dark:text-gray-300'
                                                : 'bg-gray-100 text-gray-400 dark:bg-slate-800'
                                        }`}
                                    >
                                        Next
                                        <ChevronRight className="h-4 w-4" />
                                    </Link>
                                </div>
                            </div>
                        )}
                    </div>
                </div>
            </AppLayout>
        </>
    );
}
