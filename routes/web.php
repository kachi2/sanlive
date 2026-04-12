<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manage\ManualPaymentController;
use App\Http\Controllers\Manage\ProductController;
use App\Http\Controllers\SiteMapController as ControllersSiteMapController;
use App\Http\Controllers\UpdateProductTest;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\Users\SiteMapController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/user.php';


Route::get('/process/products/names', [ProductController::class, 'processImages'])->name('processImages');
Route::get('manual/payment/processes', [ManualPaymentController::class, 'ProcessPayment']);

/*
 * Cron endpoint — called every 24 hrs by an external cron service (e.g. cron-job.org).
 * Protected by a secret token stored in CRON_SECRET in .env.
 * Example URL: https://sanlivepharmacy.com/cron/google-indexing?token=YOUR_SECRET
 */
Route::get('/cron/google-indexing', function (\Illuminate\Http\Request $request) {
    $secret = config('app.cron_secret');

    if (!$secret || !hash_equals($secret, (string) $request->query('token'))) {
        abort(403, 'Forbidden');
    }

    Artisan::call('google:clear-redirects');

    return response()->json(['status' => 'ok', 'ran_at' => now()->toDateTimeString()]);
});

 

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/generate/sitemap.xml', [SiteMapController::class, 'SiteMap'])->name('sitemap')
  ->middleware([]);

Route::get('/sitemap.xml', [ControllersSiteMapController::class, 'SiteMap']);
Route::get('generate/slugs', [UpdateProductTest::class, 'Index']);
Route::get('generate/category/slugs', [UpdateProductTest::class, 'categorySlug']);


Route::get('/get/product/reviews', [UserReviewController::class, 'getReviews']);
Route::post('/store/product/reviews', [UserReviewController::class, 'storeReview']);
