<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('services', 'slug')) {
            return;
        }

        $services = DB::table('services')
            ->select('id', 'name', 'slug')
            ->orderBy('id')
            ->get();

        $usedSlugs = DB::table('services')
            ->whereNotNull('slug')
            ->where('slug', '!=', '')
            ->pluck('slug')
            ->map(fn($slug) => (string) $slug)
            ->values()
            ->all();

        $usedMap = array_fill_keys($usedSlugs, true);

        foreach ($services as $service) {
            $currentSlug = trim((string) ($service->slug ?? ''));

            if ($currentSlug !== '') {
                $usedMap[$currentSlug] = true;
                continue;
            }

            $baseSlug = Str::slug((string) ($service->name ?? ''));
            if ($baseSlug === '') {
                $baseSlug = 'service-' . $service->id;
            }

            $slug = $baseSlug;
            $counter = 2;

            while (isset($usedMap[$slug])) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            DB::table('services')
                ->where('id', $service->id)
                ->update(['slug' => $slug]);

            $usedMap[$slug] = true;
        }

        $driver = DB::getDriverName();

        if ($driver === 'mysql') {
            DB::statement('ALTER TABLE services MODIFY slug VARCHAR(255) NOT NULL');
        } elseif ($driver === 'pgsql') {
            DB::statement('ALTER TABLE services ALTER COLUMN slug SET NOT NULL');
        }
    }

    public function down(): void
    {
        if (! Schema::hasColumn('services', 'slug')) {
            return;
        }

        $driver = DB::getDriverName();

        if ($driver === 'mysql') {
            DB::statement('ALTER TABLE services MODIFY slug VARCHAR(255) NULL');
        } elseif ($driver === 'pgsql') {
            DB::statement('ALTER TABLE services ALTER COLUMN slug DROP NOT NULL');
        }
    }
};