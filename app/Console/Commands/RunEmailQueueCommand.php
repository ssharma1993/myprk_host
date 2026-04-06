<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RunEmailQueueCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:run-email {--max-jobs=25 : Maximum jobs to process in this run}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process queued email jobs in a short bounded worker run';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $maxJobs = (int) $this->option('max-jobs');

        if ($maxJobs < 1) {
            $maxJobs = 1;
        }

        $this->info("Processing queued jobs (max: {$maxJobs})...");

        Artisan::call('queue:work', [
            'connection' => config('queue.default'),
            '--queue' => 'default',
            '--stop-when-empty' => true,
            '--max-jobs' => $maxJobs,
            '--tries' => 3,
            '--timeout' => 120,
            '--no-interaction' => true,
        ]);

        $this->line(Artisan::output());
        $this->info('Queue run completed.');

        return self::SUCCESS;
    }
}
