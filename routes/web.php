<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manage\ManualPaymentController;
use App\Http\Controllers\Manage\ProductController;
use App\Http\Controllers\UpdateProductTest;
use App\Http\Controllers\Users\SiteMapController;
use Inertia\Inertia;

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

 

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('sitemap.xml', [SiteMapController::class, 'SiteMap'])
  ->middleware([]);

Route::get('generate/slugs', [UpdateProductTest::class, 'Index']);
Route::get('generate/category/slugs', [UpdateProductTest::class, 'categorySlug']);


