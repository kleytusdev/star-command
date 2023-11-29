<?php

use App\Api\ApiPeru;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Livewire\Sale\Index as SaleIndex;
use App\Livewire\Sale\Create as SaleCreate;
use App\Livewire\Product\Show as ProductShow;
use App\Livewire\Product\Index as ProductIndex;
use App\Livewire\Category\Show as CategoryShow;
use App\Livewire\Warehouse\Show as WarehouseShow;
use App\Livewire\ExitGuide\Index as ExitGuideIndex;
use App\Livewire\Dashboard\Index as DashboardIndex;
use App\Livewire\EntryGuide\Index as EntryGuideIndex;
use App\Livewire\EntryGuide\Create as EntryGuideCreate;

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('dashboard', DashboardIndex::class)->name('dashboard');

    Route::get('products', ProductIndex::class)->name('products.index');
    Route::get('product/{productId}', ProductShow::class)->name('products.show');

    Route::get('categories', CategoryShow::class)->name('categories.index');
    Route::get('warehouses', WarehouseShow::class)->name('warehouses.index');
    Route::get('sales', SaleIndex::class)->name('sales.index');
    Route::get('sales/create', SaleCreate::class)->name('sales.create');

    Route::get('entry-guides', EntryGuideIndex::class)->name('entry-guides.index');
    Route::get('entry-guides/create', EntryGuideCreate::class)->name('entry-guides.create');

    Route::get('exit-guides', ExitGuideIndex::class)->name('exit-guides.index');

    // Api Perú
    Route::get('api/dni/{dni}', [ApiPeru::class, 'getDni'])->name('dni.get');
    Route::get('api/ruc/{ruc}', [ApiPeru::class, 'getRuc'])->name('ruc.get');
});

require __DIR__ . '/auth.php';
