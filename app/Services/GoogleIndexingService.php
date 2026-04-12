<?php

namespace App\Services;

use Google\Client as GoogleClient;
use Illuminate\Support\Facades\Log;

/**
 * Wraps Google Indexing API v3.
 *
 * Setup:
 *  1. In Google Cloud Console, create a Service Account and download the JSON key.
 *  2. In Google Search Console → Settings → Users and Permissions, add the
 *     service account email as an OWNER.
 *  3. Save the JSON key to storage/app/google-service-account.json
 *     (or point GOOGLE_SERVICE_ACCOUNT_JSON in .env to a different path).
 */
class GoogleIndexingService
{
    protected GoogleClient $client;

    public function __construct()
    {
        $keyPath = config('services.google_indexing.key_path',
            storage_path('app/google-service-account.json'));

        $this->client = new GoogleClient();
        $this->client->setAuthConfig($keyPath);
        $this->client->setScopes(['https://www.googleapis.com/auth/indexing']);
    }

    /**
     * Notify Google that a URL has been updated (or is new).
     * Use this for all canonical product / category / blog URLs.
     *
     * @param  string  $url  Absolute URL, e.g. https://sanlivepharmacy.com/products/paracetamol-500mg
     */
    public function notifyUpdated(string $url): array
    {
        return $this->send($url, 'URL_UPDATED');
    }

    /**
     * Notify Google that a URL has been permanently removed.
     * Use this for old hashid-based or index.php-prefixed URLs.
     *
     * @param  string  $url  Absolute old URL
     */
    public function notifyDeleted(string $url): array
    {
        return $this->send($url, 'URL_DELETED');
    }

    /**
     * Submit a batch of URLs (max 200 per call recommended by Google).
     *
     * @param  array<string, string>  $urls  ['https://...' => 'URL_UPDATED'|'URL_DELETED', ...]
     * @return array  ['success' => [...], 'failed' => [...]]
     */
    public function submitBatch(array $urls): array
    {
        $results = ['success' => [], 'failed' => []];

        foreach (array_chunk($urls, 200, true) as $chunk) {
            foreach ($chunk as $url => $type) {
                $result = $this->send($url, $type);
                if (isset($result['error'])) {
                    $results['failed'][] = ['url' => $url, 'error' => $result['error']];
                } else {
                    $results['success'][] = $url;
                }
            }
            // Google Indexing API quota: 200 requests/day per property by default.
            // Sleep 0.5s between batches to respect rate limits.
            //php artisan google:clear-redirects
            usleep(500000);
        }

        return $results;
    }

    // ──────────────────────────────────────────────────────────────
    // Internal
    // ──────────────────────────────────────────────────────────────

    protected function send(string $url, string $type): array
    {
        try {
            $httpClient = $this->client->authorize();

            $response = $httpClient->post(
                'https://indexing.googleapis.com/v3/urlNotifications:publish',
                ['json' => ['url' => $url, 'type' => $type]]
            );

            return json_decode((string) $response->getBody(), true) ?? [];
        } catch (\Exception $e) {
            Log::error("Google Indexing API error for {$url}: " . $e->getMessage());
            return ['error' => $e->getMessage()];
        }
    }
}
