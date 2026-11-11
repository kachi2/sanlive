<?php

namespace App\Console;

use App\Console\Commands\ClearGoogleRedirectPages;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Run every day at 2:00am — sends the next batch of 200 URLs to Google
        // until all old redirect URLs are cleared and canonical URLs are submitted.
        // Progress is saved in storage/app/google-indexing-progress.json
        $schedule->command(ClearGoogleRedirectPages::class)
            ->dailyAt('02:00')
            ->withoutOverlapping()
            ->runInBackground()
            ->appendOutputTo(storage_path('logs/google-indexing.log'));

        // Rebuild public/sitemap.xml daily so new products/blogs are listed
        $schedule->call(fn () => app(\App\Services\SitemapService::class)->generate())
            ->name('generate-sitemap')
            ->dailyAt('03:00')
            ->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
