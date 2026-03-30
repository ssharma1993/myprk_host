import AppLayout from '@/layouts/app-layout';
import { Head, useForm, usePage } from '@inertiajs/react';

interface SeoSettingItem {
    key: string;
    label: string;
    group: string;
    value: string;
}

type SettingsMap = Record<string, SeoSettingItem>;

interface IndexProps {
    settings: SettingsMap;
}

const GROUP_LABELS: Record<string, string> = {
    general: 'General SEO',
    analytics: 'Analytics & Tracking',
    social: 'Social Media',
    verification: 'Site Verification',
    advanced: 'Advanced / Custom Scripts',
};

const TEXTAREA_KEYS = [
    'meta_description',
    'meta_keywords',
    'custom_head_scripts',
    'custom_body_scripts',
];

export default function Index({ settings }: IndexProps) {
    const { flash } = usePage<{
        flash?: { success?: string; error?: string };
    }>().props;

    const initialValues: Record<string, string> = {};
    Object.values(settings).forEach((s) => {
        initialValues[s.key] = s.value ?? '';
    });

    const { data, setData, post, processing } = useForm<{
        settings: { key: string; value: string }[];
    }>({
        settings: Object.values(settings).map((s) => ({
            key: s.key,
            value: s.value ?? '',
        })),
    });

    const getValue = (key: string) =>
        data.settings.find((s) => s.key === key)?.value ?? '';

    const setValue = (key: string, value: string) => {
        setData(
            'settings',
            data.settings.map((s) => (s.key === key ? { ...s, value } : s)),
        );
    };

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        post('/admin/seo');
    };

    // Group settings by their group field
    const grouped: Record<string, SeoSettingItem[]> = {};
    Object.values(settings).forEach((s) => {
        if (!grouped[s.group]) grouped[s.group] = [];
        grouped[s.group].push(s);
    });

    const groupOrder = [
        'general',
        'analytics',
        'social',
        'verification',
        'advanced',
    ];

    return (
        <>
            <Head title="SEO Settings" />
            <AppLayout breadcrumbs={[{ title: 'SEO Settings' }]}>
                <div className="mx-auto max-w-3xl space-y-6 px-4 py-6">
                    <div>
                        <h1 className="text-2xl font-bold text-gray-900">
                            SEO Settings
                        </h1>
                        <p className="mt-1 text-sm text-gray-500">
                            Manage meta tags, analytics IDs, and social media
                            settings that appear across your website.
                        </p>
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

                    <form onSubmit={submit} className="space-y-6">
                        {groupOrder
                            .filter((g) => grouped[g]?.length)
                            .map((group) => (
                                <div
                                    key={group}
                                    className="rounded-xl border border-gray-200 bg-white shadow-sm"
                                >
                                    <div className="border-b border-gray-100 px-6 py-4">
                                        <h2 className="text-base font-semibold text-gray-800">
                                            {GROUP_LABELS[group] ?? group}
                                        </h2>
                                    </div>
                                    <div className="space-y-5 px-6 py-5">
                                        {grouped[group].map((s) => (
                                            <div key={s.key}>
                                                <label className="mb-1.5 block text-sm font-medium text-gray-700">
                                                    {s.label}
                                                </label>
                                                {TEXTAREA_KEYS.includes(
                                                    s.key,
                                                ) ? (
                                                    <textarea
                                                        className="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm transition outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                                        rows={
                                                            s.key.includes(
                                                                'script',
                                                            )
                                                                ? 5
                                                                : 3
                                                        }
                                                        value={getValue(s.key)}
                                                        onChange={(e) =>
                                                            setValue(
                                                                s.key,
                                                                e.target.value,
                                                            )
                                                        }
                                                        placeholder={
                                                            s.key.includes(
                                                                'script',
                                                            )
                                                                ? '<!-- paste your script tags here -->'
                                                                : ''
                                                        }
                                                    />
                                                ) : (
                                                    <input
                                                        type="text"
                                                        className="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm transition outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                                        value={getValue(s.key)}
                                                        onChange={(e) =>
                                                            setValue(
                                                                s.key,
                                                                e.target.value,
                                                            )
                                                        }
                                                        placeholder={
                                                            s.key ===
                                                            'google_analytics_id'
                                                                ? 'G-XXXXXXXXXX'
                                                                : s.key ===
                                                                    'google_tag_manager_id'
                                                                  ? 'GTM-XXXXXXX'
                                                                  : s.key ===
                                                                      'facebook_pixel_id'
                                                                    ? '1234567890'
                                                                    : ''
                                                        }
                                                    />
                                                )}
                                                {(s.key ===
                                                    'google_analytics_id' ||
                                                    s.key ===
                                                        'google_tag_manager_id' ||
                                                    s.key ===
                                                        'facebook_pixel_id') && (
                                                    <p className="mt-1 text-xs text-gray-400">
                                                        {s.key ===
                                                            'google_analytics_id' &&
                                                            'Found in your Google Analytics property settings. Starts with G-.'}
                                                        {s.key ===
                                                            'google_tag_manager_id' &&
                                                            'Found in your Google Tag Manager container. Starts with GTM-.'}
                                                        {s.key ===
                                                            'facebook_pixel_id' &&
                                                            'Found in your Facebook Events Manager.'}
                                                    </p>
                                                )}
                                            </div>
                                        ))}
                                    </div>
                                </div>
                            ))}

                        <div className="flex justify-end">
                            <button
                                type="submit"
                                disabled={processing}
                                className="rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700 disabled:opacity-60"
                            >
                                {processing ? 'Saving…' : 'Save Settings'}
                            </button>
                        </div>
                    </form>
                </div>
            </AppLayout>
        </>
    );
}
