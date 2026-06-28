<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Services\GoogleIndexingService;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    public function index()
    {
        return view('manage.commands.index')
            ->with('bheading', 'Command')
            ->with('breadcrumb', 'Reindex URLs');
    }

    public function run(Request $request, GoogleIndexingService $indexing)
    {
        $request->validate([
            'urls' => 'required|string',
        ]);

        $urls = collect(preg_split('/\r\n|\r|\n/', $request->urls))
            ->map(fn ($url) => trim($url))
            ->filter(fn ($url) => str_starts_with($url, 'http://') || str_starts_with($url, 'https://'))
            ->unique()
            ->values();

        if ($urls->isEmpty()) {
            return back()->withInput()->withErrors(['urls' => 'No valid http(s) URLs found. Paste one URL per line.']);
        }

        // Stay within the Indexing API's 200-requests/day/property quota per run.
        $batch = $urls->take(200);

        $results = $batch->map(function ($url) use ($indexing) {
            $result = $indexing->notifyUpdated($url);

            return [
                'url' => $url,
                'success' => !isset($result['error']),
                'error' => $result['error'] ?? null,
            ];
        });

        return back()
            ->with('results', $results)
            ->with('skipped', $urls->count() - $batch->count());
    }
}
