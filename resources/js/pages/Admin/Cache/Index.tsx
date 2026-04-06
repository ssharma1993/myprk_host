import { Button } from '@/components/ui/button';
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from '@/components/ui/card';
import AppLayout from '@/layouts/app-layout';
import { router } from '@inertiajs/react';
import {
    AlertCircle,
    CheckCircle2,
    Flame,
    HardDrive,
    Trash2,
    Zap,
} from 'lucide-react';
import { useState } from 'react';

interface CacheItem {
    name: string;
    key: string;
    duration: string;
    type: string;
}

interface CacheStatus {
    store: string;
    entries: number;
    size: string;
    items: CacheItem[];
}

interface Props {
    cacheStatus: CacheStatus;
}

export default function CacheManagement({ cacheStatus }: Props) {
    const [loading, setLoading] = useState(false);

    const handleClearAll = () => {
        if (
            confirm(
                'Are you sure you want to clear ALL caches? This may temporarily slow down the site.',
            )
        ) {
            setLoading(true);
            router.post(
                '/admin/cache/clear-all',
                {},
                {
                    onFinish: () => setLoading(false),
                },
            );
        }
    };

    const handleClearType = (type: string) => {
        if (confirm(`Clear ${type} cache?`)) {
            setLoading(true);
            router.post(
                `/admin/cache/clear/${type}`,
                {},
                {
                    onFinish: () => setLoading(false),
                },
            );
        }
    };

    const handleWarmAll = () => {
        setLoading(true);
        router.post(
            '/admin/cache/warm',
            {},
            {
                onFinish: () => setLoading(false),
            },
        );
    };

    const handleWarmType = (type: string) => {
        setLoading(true);
        router.post(
            `/admin/cache/warm/${type}`,
            {},
            {
                onFinish: () => setLoading(false),
            },
        );
    };

    return (
        <AppLayout>
            <div className="space-y-6">
                {/* Header */}
                <div>
                    <h1 className="text-3xl font-bold tracking-tight">
                        Cache Management
                    </h1>
                    <p className="mt-2 text-gray-600">
                        Monitor and manage your application cache to optimize
                        performance
                    </p>
                </div>

                {/* Quick Stats */}
                <div className="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <Card>
                        <CardHeader className="pb-3">
                            <CardTitle className="flex items-center gap-2 text-sm font-medium">
                                <HardDrive className="h-4 w-4" />
                                Cache Store
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <p className="text-2xl font-bold capitalize">
                                {cacheStatus.store}
                            </p>
                            <p className="mt-1 text-xs text-gray-600">
                                {cacheStatus.store === 'database'
                                    ? 'Database-backed'
                                    : 'File-based'}{' '}
                                caching
                            </p>
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader className="pb-3">
                            <CardTitle className="flex items-center gap-2 text-sm font-medium">
                                <Zap className="h-4 w-4" />
                                Cache Entries
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <p className="text-2xl font-bold">
                                {cacheStatus.entries}
                            </p>
                            <p className="mt-1 text-xs text-gray-600">
                                Total stored items
                            </p>
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader className="pb-3">
                            <CardTitle className="flex items-center gap-2 text-sm font-medium">
                                <HardDrive className="h-4 w-4" />
                                Cache Size
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <p className="text-2xl font-bold">
                                {cacheStatus.size}
                            </p>
                            <p className="mt-1 text-xs text-gray-600">
                                Disk usage
                            </p>
                        </CardContent>
                    </Card>
                </div>

                {/* Cached Items Overview */}
                <Card>
                    <CardHeader>
                        <CardTitle>Cached Items</CardTitle>
                        <CardDescription>
                            Display all cached data and their TTL (Time To Live)
                        </CardDescription>
                    </CardHeader>
                    <CardContent>
                        <div className="space-y-4">
                            {cacheStatus.items.map((item, index) => (
                                <div
                                    key={index}
                                    className="flex items-start justify-between rounded-lg border p-3"
                                >
                                    <div className="flex-1">
                                        <p className="text-sm font-medium">
                                            {item.name}
                                        </p>
                                        <p className="mt-1 text-xs text-gray-600">
                                            Key:{' '}
                                            <code className="rounded bg-gray-100 px-2 py-1">
                                                {item.key}
                                            </code>
                                        </p>
                                        <p className="mt-1 text-xs text-gray-500">
                                            TTL: {item.duration}
                                        </p>
                                    </div>
                                    <Button
                                        variant="outline"
                                        size="sm"
                                        onClick={() =>
                                            handleClearType(item.type)
                                        }
                                        disabled={loading}
                                        className="ml-2"
                                    >
                                        <Trash2 className="mr-1 h-3 w-3" />
                                        Clear
                                    </Button>
                                </div>
                            ))}
                        </div>
                    </CardContent>
                </Card>

                {/* Info Cards */}
                <div className="grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <Card className="border-blue-200 bg-blue-50">
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2 text-sm">
                                <AlertCircle className="h-4 w-4 text-blue-600" />
                                Cache Auto-Invalidation
                            </CardTitle>
                        </CardHeader>
                        <CardContent className="text-sm text-blue-900">
                            <ul className="list-inside list-disc space-y-1">
                                <li>
                                    When you update a Service, its cache is
                                    cleared automatically
                                </li>
                                <li>
                                    When you update Gallery items, gallery cache
                                    is cleared automatically
                                </li>
                                <li>
                                    When you update Sponsors, sponsor cache is
                                    cleared automatically
                                </li>
                                <li>
                                    No manual cache clearing needed for content
                                    updates
                                </li>
                            </ul>
                        </CardContent>
                    </Card>

                    <Card className="border-green-200 bg-green-50">
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2 text-sm">
                                <CheckCircle2 className="h-4 w-4 text-green-600" />
                                Performance Impact
                            </CardTitle>
                        </CardHeader>
                        <CardContent className="text-sm text-green-900">
                            <ul className="list-inside list-disc space-y-1">
                                <li>
                                    Database queries reduced: 50-80% improvement
                                </li>
                                <li>
                                    Browser caching: Static assets cached for 1
                                    year
                                </li>
                                <li>Public pages: Cached for 1-24 hours</li>
                                <li>
                                    Expected page load improvement: 40-60% for
                                    repeat visitors
                                </li>
                            </ul>
                        </CardContent>
                    </Card>
                </div>

                {/* Clear Cache Section */}
                <Card>
                    <CardHeader>
                        <CardTitle>Clear Cache</CardTitle>
                        <CardDescription>
                            Remove cached data to force fresh database queries
                        </CardDescription>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        <div>
                            <h4 className="mb-3 font-medium">
                                Clear Individual Caches
                            </h4>
                            <div className="grid grid-cols-1 gap-2 md:grid-cols-2">
                                <Button
                                    variant="destructive"
                                    onClick={() => handleClearType('services')}
                                    disabled={loading}
                                >
                                    <Trash2 className="mr-2 h-4 w-4" />
                                    Clear Services Cache
                                </Button>
                                <Button
                                    variant="destructive"
                                    onClick={() => handleClearType('galleries')}
                                    disabled={loading}
                                >
                                    <Trash2 className="mr-2 h-4 w-4" />
                                    Clear Gallery Cache
                                </Button>
                                <Button
                                    variant="destructive"
                                    onClick={() => handleClearType('sponsors')}
                                    disabled={loading}
                                >
                                    <Trash2 className="mr-2 h-4 w-4" />
                                    Clear Sponsors Cache
                                </Button>
                            </div>
                        </div>

                        <div className="rounded-lg border-2 border-red-300 bg-red-50 p-4">
                            <h4 className="mb-3 font-medium text-red-900">
                                Nuclear Option
                            </h4>
                            <p className="mb-3 text-sm text-red-700">
                                Clear ALL caches at once. This will force the
                                site to query the database fresh for everything.
                            </p>
                            <Button
                                variant="destructive"
                                size="lg"
                                onClick={handleClearAll}
                                disabled={loading}
                                className="w-full"
                            >
                                <Trash2 className="mr-2 h-4 w-4" />
                                Clear All Caches
                            </Button>
                        </div>
                    </CardContent>
                </Card>

                {/* Warm Cache Section */}
                <Card>
                    <CardHeader>
                        <CardTitle>Warm Cache</CardTitle>
                        <CardDescription>
                            Pre-load cache to ensure instant responses for
                            repeat visitors
                        </CardDescription>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        <div>
                            <h4 className="mb-3 font-medium">
                                Warm Individual Caches
                            </h4>
                            <div className="grid grid-cols-1 gap-2 md:grid-cols-2">
                                <Button
                                    variant="outline"
                                    onClick={() => handleWarmType('services')}
                                    disabled={loading}
                                >
                                    <Zap className="mr-2 h-4 w-4" />
                                    Warm Services
                                </Button>
                                <Button
                                    variant="outline"
                                    onClick={() => handleWarmType('galleries')}
                                    disabled={loading}
                                >
                                    <Zap className="mr-2 h-4 w-4" />
                                    Warm Gallery
                                </Button>
                                <Button
                                    variant="outline"
                                    onClick={() => handleWarmType('sponsors')}
                                    disabled={loading}
                                >
                                    <Zap className="mr-2 h-4 w-4" />
                                    Warm Sponsors
                                </Button>
                            </div>
                        </div>

                        <div className="rounded-lg border-2 border-green-300 bg-green-50 p-4">
                            <h4 className="mb-3 font-medium text-green-900">
                                Warm Everything
                            </h4>
                            <p className="mb-3 text-sm text-green-700">
                                Pre-load all application caches to ensure
                                instant responses
                            </p>
                            <Button
                                onClick={handleWarmAll}
                                disabled={loading}
                                className="w-full"
                            >
                                <Flame className="mr-2 h-4 w-4" />
                                Warm All Caches
                            </Button>
                        </div>
                    </CardContent>
                </Card>

                {/* Tips Section */}
                <Card className="bg-gray-50">
                    <CardHeader>
                        <CardTitle className="text-sm">
                            💡 Tips & Best Practices
                        </CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-2 text-sm text-gray-700">
                        <p>
                            <strong>Best Practice:</strong> Clear cache after
                            bulk updates (services, gallery changes, etc.)
                        </p>
                        <p>
                            <strong>Deployment:</strong> Clear all caches after
                            deploying new code to ensure visitors see updates
                        </p>
                        <p>
                            <strong>Performance:</strong> Use "Warm All Caches"
                            after clearing for optimal performance
                        </p>
                        <p>
                            <strong>Monitoring:</strong> Check cache size
                            regularly; clear if it grows too large
                        </p>
                        <p>
                            <strong>Auto-Invalidation:</strong> The system
                            automatically clears cache when you edit services,
                            galleries, or sponsors
                        </p>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}
