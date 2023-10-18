<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SubuserController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Sale\Index as SaleIndex;
use App\Livewire\Product\Show as ProductShow;
use App\Livewire\Category\Show as CategoryShow;
use App\Livewire\Warehouse\Show as WarehouseShow;

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
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('products', ProductShow::class)->name('products.index');
    Route::get('categories', CategoryShow::class)->name('categories.index');
    Route::get('warehouses', WarehouseShow::class)->name('warehouses.index');
    Route::get('sales', SaleIndex::class)->name('sales.index');

    Route::get('subusers', [SubuserController::class, 'index'])->name('subusers.index');
});

require __DIR__ . '/auth.php';
