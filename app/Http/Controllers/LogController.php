<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\File;
use SplFileObject;
use SplPriorityQueue;

class LogController extends Controller
{
    private const LOGS_PER_PAGE = 100;
    private const MAX_MESSAGE_LENGTH = 5000;

    public function index(Request $request)
    {
        $page = max(1, (int)$request->get('page', 1));
        $perPage = self::LOGS_PER_PAGE;
        $pagination = $this->getPaginatedLogEntries($page, $perPage);

        $total = $pagination['total'];
        $lastPage = max(1, (int)ceil($total / $perPage));
        $currentPage = min($page, $lastPage);
        $offset = ($currentPage - 1) * $perPage;

        // Get available log files
        $logFiles = $this->getLogFiles();

        return Inertia::render('Admin/Logs/Index', [
            'logs' => array_slice($pagination['entries'], max(0, $offset), $perPage),
            'currentPage' => $currentPage,
            'lastPage' => $lastPage,
            'total' => $total,
            'perPage' => $perPage,
            'logFiles' => $logFiles,
        ]);
    }

    public function clear(Request $request)
    {
        try {
            $logPath = storage_path('logs');

            if (File::exists($logPath)) {
                $files = File::glob($logPath . '/*.log');
                foreach ($files as $file) {
                    File::delete($file);
                }
            }

            return redirect()->route('logs.index')
                ->with('success', 'All log files have been cleared successfully.');
        } catch (\Exception $e) {
            return redirect()->route('logs.index')
                ->with('error', 'Error clearing logs: ' . $e->getMessage());
        }
    }

    public function download(Request $request)
    {
        $filename = $request->get('file', 'laravel.log');
        $path = storage_path('logs/' . basename($filename));

        if (!File::exists($path)) {
            return redirect()->route('logs.index')
                ->with('error', 'Log file not found.');
        }

        return response()->download($path);
    }

    private function getPaginatedLogEntries(int $currentPage, int $perPage): array
    {
        $limit = $currentPage * $perPage;
        $total = 0;

        $heap = new SplPriorityQueue();
        $heap->setExtractFlags(SplPriorityQueue::EXTR_DATA);

        $logPath = storage_path('logs');

        if (!File::exists($logPath)) {
            return [
                'total' => 0,
                'entries' => [],
            ];
        }

        $files = File::glob($logPath . '/*.log');
        usort($files, function ($a, $b) {
            return File::lastModified($b) <=> File::lastModified($a);
        });

        $sequence = 0;

        foreach ($files as $file) {
            $fileObject = new SplFileObject($file, 'r');
            $currentEntry = null;
            $filename = basename($file);

            while (!$fileObject->eof()) {
                $line = rtrim((string)$fileObject->fgets(), "\r\n");

                $timestamp = null;
                if ($this->isLogStartLine($line, $timestamp)) {
                    if ($currentEntry !== null) {
                        $total++;
                        $this->pushBoundedEntry($heap, $currentEntry, $limit, $sequence++);
                    }

                    $currentEntry = [
                        'timestamp' => $timestamp,
                        'level' => $this->extractLevel($line),
                        'message' => $line,
                        'file' => $filename,
                        'context' => [],
                    ];
                    continue;
                }

                if ($currentEntry !== null && $line !== '') {
                    $currentEntry['message'] = $this->appendMessage($currentEntry['message'], $line);
                }
            }

            if ($currentEntry !== null) {
                $total++;
                $this->pushBoundedEntry($heap, $currentEntry, $limit, $sequence++);
            }
        }

        $entries = [];
        while (!$heap->isEmpty()) {
            $entries[] = $heap->extract();
        }

        usort($entries, function ($a, $b) {
            return strtotime($b['timestamp']) <=> strtotime($a['timestamp']);
        });

        return [
            'total' => $total,
            'entries' => $entries,
        ];
    }

    private function isLogStartLine(string $line, ?string &$timestamp): bool
    {
        if (preg_match('/^\[(\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})\]/', $line, $matches)) {
            $timestamp = $matches[1];
            return true;
        }

        return false;
    }

    private function appendMessage(string $existing, string $line): string
    {
        if (strlen($existing) >= self::MAX_MESSAGE_LENGTH) {
            return $existing;
        }

        $combined = $existing . "\n" . $line;
        if (strlen($combined) > self::MAX_MESSAGE_LENGTH) {
            return substr($combined, 0, self::MAX_MESSAGE_LENGTH) . '\n...[truncated]';
        }

        return $combined;
    }

    private function pushBoundedEntry(SplPriorityQueue $heap, array $entry, int $limit, int $sequence): void
    {
        if ($limit <= 0) {
            return;
        }

        $timestamp = strtotime($entry['timestamp']) ?: 0;
        $heap->insert($entry, [-$timestamp, -$sequence]);

        if ($heap->count() > $limit) {
            $heap->extract();
        }
    }

    /**
     * Extract log level from log line
     */
    private function extractLevel(string $line): string
    {
        if (preg_match('/\[(ERROR|Debug|DEBUG|INFO|WARNING|ALERT|CRITICAL|NOTICE|WARNING)\]/', $line, $matches)) {
            return strtoupper($matches[1]);
        }

        if (preg_match('/\[(\w+)\].*?\.(\w+)/', $line, $matches)) {
            return strtoupper($matches[2]);
        }

        return 'INFO';
    }

    /**
     * Get list of available log files
     */
    private function getLogFiles(): array
    {
        $logPath = storage_path('logs');
        $files = [];

        if (File::exists($logPath)) {
            $logFiles = File::glob($logPath . '/*.log');
            foreach ($logFiles as $file) {
                $filename = basename($file);
                $size = File::size($file);
                $modified = File::lastModified($file);

                $files[] = [
                    'name' => $filename,
                    'path' => $filename,
                    'size' => $this->formatBytes($size),
                    'sizeBytes' => $size,
                    'modified' => date('Y-m-d H:i:s', $modified),
                ];
            }
        }

        // Sort by modified date descending
        usort($files, function ($a, $b) {
            return strcmp($b['modified'], $a['modified']);
        });

        return $files;
    }

    /**
     * Format bytes to human readable format
     */
    private function formatBytes(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));

        return round($bytes, 2) . ' ' . $units[$pow];
    }
}