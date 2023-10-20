<?php

namespace App\Livewire\Sale;

use App\Models\Product;
use Livewire\Component;
use App\Enums\SalePaymentMethodEnum;
use App\Models\Warehouse;

class Create extends Component
{
    public int $productId;

    public function render()
    {
        return view('livewire.sale.create', [
            'products' => Product::all(),
            'warehouses' => Warehouse::all(),
            'paymentMethods' => SalePaymentMethodEnum::cases(),
        ]);
    }

    public function store()
    {
    }
}
