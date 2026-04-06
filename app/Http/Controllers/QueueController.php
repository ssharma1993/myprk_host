<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class QueueController extends Controller
{
    public function health(Request $request)
    {
        $pendingJobs = DB::table('jobs')->count();
        $failedJobs = DB::table('failed_jobs')->count();

        $payload = [
            'queue_connection' => config('queue.default'),
            'pending_jobs' => $pendingJobs,
            'failed_jobs' => $failedJobs,
            'status' => $failedJobs > 0 ? 'degraded' : 'healthy',
            'checked_at' => now()->toDateTimeString(),
        ];

        if ($request->expectsJson() || $request->query('format') === 'json') {
            return response()->json($payload);
        }

        return Inertia::render('Queue/Health', $payload);
    }

    public function run(): RedirectResponse
    {
        Artisan::call('queue:run-email', [
            '--max-jobs' => 25,
        ]);

        return redirect()->back()->with('success', 'Queue run started and processed pending email jobs.');
    }
}
