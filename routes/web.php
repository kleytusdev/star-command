<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SubuserController;
use App\Livewire\Category\Show;
use App\Livewire\Category\Store;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');

    Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');

    Route::get('/subusers', [SubuserController::class, 'index'])->name('subusers.index');

    Route::get('categories', Show::class)->name('categories.index');
    Route::post('categories', [Store::class, 'store'])->name('categories.store');
});

require __DIR__ . '/auth.php';
