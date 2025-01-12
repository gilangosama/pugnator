<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventManagementController;
use App\Http\Controllers\Admin\CatalogManagementController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/products/{id}/purchase', [ProductController::class, 'purchase'])->name('products.purchase');
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::middleware(['auth'])->group(function () {
    Route::get('/events/{id}/register', [EventController::class, 'register'])->name('events.register');
    Route::post('/events/{id}/register', [EventController::class, 'registerStore'])->name('events.register.store');
    Route::get('/catalog/{id}', [CatalogController::class, 'show'])->name('catalog.show');
    Route::post('/catalog/{id}/purchase', [CatalogController::class, 'purchase'])->name('catalog.purchase');
    Route::get('/events/{id}/review', [EventController::class, 'review'])->name('events.review');
    Route::post('/events/{id}/review', [EventController::class, 'storeReview'])->name('events.review.store');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('events', EventManagementController::class);
    Route::resource('catalog', CatalogManagementController::class);
});

Route::patch('/admin/events/{id}/status', [EventManagementController::class, 'updateStatus'])
    ->name('admin.events.updateStatus');

require __DIR__.'/auth.php';
